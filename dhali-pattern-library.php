<?php
/**
 * Plugin Name: Dhali Pattern Library
 * Description: A centralized, version-controlled repository for our custom block patterns and FSE templates.
 * Version: 1.2.0
 * Author: Dhali
 */

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Enqueue utility classes on the front end.
 *
 * These are the CSS classes that non-technical users apply via the Ollie Pro
 * CSS class picker. Keeping the styles here (rather than only in the Ollie Pro
 * database) means the plugin is the single source of truth and styles travel
 * with the codebase between sites.
 */
function dhali_enqueue_utility_classes() {
	wp_enqueue_style(
		'dhali-utility-classes',
		plugin_dir_url( __FILE__ ) . 'assets/css/dhali-classes.css',
		array(),
		'1.2.0'
	);
}
add_action( 'wp_enqueue_scripts', 'dhali_enqueue_utility_classes' );

/**
 * Enqueue the same utility classes inside the block editor.
 *
 * This ensures that what non-technical users see in the editor (when they
 * apply a class via the Ollie picker) matches the front end exactly.
 */
function dhali_enqueue_editor_utility_classes() {
	wp_enqueue_style(
		'dhali-utility-classes-editor',
		plugin_dir_url( __FILE__ ) . 'assets/css/dhali-classes.css',
		array(),
		'1.2.0'
	);
}
add_action( 'enqueue_block_editor_assets', 'dhali_enqueue_editor_utility_classes' );

/**
 * Register custom block patterns and the Dhali pattern category.
 */
function dhali_register_agency_patterns() {
	// 1. Register a custom category for your agency so they are easy to find.
	register_block_pattern_category(
		'dhali-web-development',
		array( 'label' => __( 'Dhali Patterns', 'dhali' ) )
	);

	// 2. Auto-load all patterns from the /patterns/ directory.
	$pattern_directory = plugin_dir_path( __FILE__ ) . 'patterns/';

	if ( is_dir( $pattern_directory ) ) {
		$patterns = glob( $pattern_directory . '*.php' );
		foreach ( $patterns as $pattern_file ) {
			register_block_pattern(
				'dhali-patterns/' . basename( $pattern_file, '.php' ),
				require $pattern_file
			);
		}
	}
}
add_action( 'init', 'dhali_register_agency_patterns' );

/**
 * Register custom FSE block templates from the /templates/ directory.
 *
 * Each .html file becomes a block template available to any post type whose
 * slug is encoded in the filename, following WordPress naming conventions:
 *
 *   single-{post-type}.html  →  single post view for that post type
 *   archive-{post-type}.html →  archive view for that post type
 *   page-{slug}.html         →  specific page by slug
 *
 * Templates are injected into the active theme's template hierarchy so
 * WordPress will use them automatically without modifying the theme files.
 */
function dhali_register_block_templates( $query, $template_type ) {
	$template_directory = plugin_dir_path( __FILE__ ) . 'templates/';

	if ( ! is_dir( $template_directory ) ) {
		return $query;
	}

	$template_files = glob( $template_directory . '*.html' );

	foreach ( $template_files as $template_file ) {
		$slug     = basename( $template_file, '.html' );
		$template = new WP_Block_Template();

		$template->type           = $template_type;
		$template->theme          = get_stylesheet();
		$template->slug           = $slug;
		$template->id             = get_stylesheet() . '//' . $slug;
		$template->title          = ucwords( str_replace( array( '-', '_' ), ' ', $slug ) );
		$template->description    = '';
		$template->status         = 'publish';
		$template->has_theme_file = true;
		$template->is_custom      = false;
		$template->content        = file_get_contents( $template_file );
		$template->source         = 'plugin';

		// Only add if a template with this slug isn't already registered
		// (lets a theme or user-saved DB template take precedence).
		$already_registered = false;
		foreach ( $query as $existing ) {
			if ( $existing->slug === $slug ) {
				$already_registered = true;
				break;
			}
		}

		if ( ! $already_registered ) {
			$query[] = $template;
		}
	}

	return $query;
}
add_filter( 'get_block_templates', 'dhali_register_block_templates', 10, 2 );

/**
 * Serve a single plugin template when WordPress resolves it by slug.
 *
 * This covers direct calls to get_block_template() — e.g. from the
 * Site Editor when a user opens or previews an individual template.
 */
function dhali_get_block_template( $template, $id, $template_type ) {
	// If WordPress already found a template, respect it.
	if ( $template ) {
		return $template;
	}

	// $id is formatted as "{theme}//{slug}".
	$parts = explode( '//', $id );
	if ( count( $parts ) !== 2 ) {
		return $template;
	}

	$slug          = $parts[1];
	$template_file = plugin_dir_path( __FILE__ ) . 'templates/' . $slug . '.html';

	if ( ! file_exists( $template_file ) ) {
		return $template;
	}

	$block_template = new WP_Block_Template();

	$block_template->type           = $template_type;
	$block_template->theme          = get_stylesheet();
	$block_template->slug           = $slug;
	$block_template->id             = $id;
	$block_template->title          = ucwords( str_replace( array( '-', '_' ), ' ', $slug ) );
	$block_template->description    = '';
	$block_template->status         = 'publish';
	$block_template->has_theme_file = true;
	$block_template->is_custom      = false;
	$block_template->content        = file_get_contents( $template_file );
	$block_template->source         = 'plugin';

	return $block_template;
}
add_filter( 'get_block_file_template', 'dhali_get_block_template', 10, 3 );
