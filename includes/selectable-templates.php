<?php
/**
 * Selectable, plugin-owned Page templates.
 *
 * Registers templates with WordPress's native register_block_template() so
 * they appear in the Page editor's Template picker. Sources live in
 * templates/selectable/, deliberately outside the top-level templates/*.html
 * glob used by dhali_register_block_templates(), so the existing hierarchy
 * provider never serves them a second time.
 *
 * Registration is skipped (never forced) when the API is unavailable, the
 * name is already registered, or the source file is missing/empty. Existing
 * theme, plugin and database templates are not modified. No database writes.
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Selectable template definitions, keyed by registration name.
 *
 * The name must be lowercase "plugin//slug"; WordPress then exposes the
 * template as "{stylesheet}//{slug}" with plugin "dhali-pattern-library".
 *
 * @return array<string, array{file: string, title: string, description: string, post_types: string[]}>
 */
function dhali_selectable_template_definitions() {
	return array(
		'dhali-pattern-library//dhali-interior-page' => array(
			'file'        => dirname( __DIR__ ) . '/templates/selectable/dhali-interior-page.html',
			'title'       => __( 'Interior Page', 'Dhali-Pattern-Library' ),
			'description' => __( 'Shared header and footer, a gradient banner with breadcrumbs, the Page title as eyebrow, a per-Page headline and introduction (Page banner fields), then the Page content.', 'Dhali-Pattern-Library' ),
			'post_types'  => array( 'page' ),
		),
	);
}

/**
 * Register the selectable templates.
 *
 * @param array|mixed $definitions Optional definitions (tests). Hook callers
 *                                 pass '' and receive the defaults.
 * @return string[] Names registered by this call.
 */
function dhali_register_selectable_templates( $definitions = null ) {
	if ( ! is_array( $definitions ) ) {
		$definitions = dhali_selectable_template_definitions();
	}

	if ( ! function_exists( 'register_block_template' ) || ! class_exists( 'WP_Block_Templates_Registry' ) ) {
		return array();
	}

	$registry   = WP_Block_Templates_Registry::get_instance();
	$registered = array();

	foreach ( $definitions as $name => $definition ) {
		if ( $registry->is_registered( $name ) ) {
			continue;
		}

		if ( empty( $definition['file'] ) || ! is_readable( $definition['file'] ) ) {
			continue;
		}

		$content = file_get_contents( $definition['file'] );
		if ( false === $content || '' === trim( $content ) ) {
			continue;
		}

		$result = register_block_template(
			$name,
			array(
				'title'       => $definition['title'],
				'description' => $definition['description'],
				'content'     => $content,
				'post_types'  => $definition['post_types'],
			)
		);

		if ( $result instanceof WP_Block_Template ) {
			$registered[] = $name;
		}
	}

	return $registered;
}
add_action( 'init', 'dhali_register_selectable_templates' );
