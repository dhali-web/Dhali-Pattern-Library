<?php
/**
 * Read-only, file-backed FSE template part provider.
 *
 * Canonical source: this plugin's parts/*.html. No database writes occur here.
 * Only names prefixed with `dhali-header-`, `dhali-footer-` or
 * `dhali-sidebar-` are exposed. Existing WordPress theme/database results
 * always take precedence.
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Determine area from the file slug. An ambiguous filename is ignored.
 *
 * @param string $slug File slug.
 * @return string|null Header/footer/sidebar area or null.
 */
function dhali_pattern_library_part_area( $slug ) {
	if ( preg_match( '/^dhali-header-[a-z0-9][a-z0-9-]*$/', $slug ) ) {
		return 'header';
	}
	if ( preg_match( '/^dhali-footer-[a-z0-9][a-z0-9-]*$/', $slug ) ) {
		return 'footer';
	}
	if ( preg_match( '/^dhali-sidebar-[a-z0-9][a-z0-9-]*$/', $slug ) ) {
		return 'sidebar';
	}
	return null;
}

/**
 * Fetch plugin-owned template part files, keyed by slug.
 *
 * @return array<string, array{area:string,path:string}>
 */
function dhali_pattern_library_part_files() {
	$dir   = trailingslashit( dirname( __DIR__ ) ) . 'parts/';
	$files = array();
	if ( ! is_dir( $dir ) ) {
		return $files;
	}
	foreach ( glob( $dir . '*.html' ) ?: array() as $path ) {
		$slug = basename( $path, '.html' );
		$area = dhali_pattern_library_part_area( $slug );
		if ( null !== $area && is_readable( $path ) ) {
			$files[ $slug ] = array( 'area' => $area, 'path' => $path );
		}
	}
	return $files;
}

/**
 * Construct a template part from canonical plugin HTML.
 *
 * @param string $slug Part slug.
 * @param array  $item Validated area/path pair.
 * @return WP_Block_Template
 */
function dhali_pattern_library_build_part( $slug, $item ) {
	$part                 = new WP_Block_Template();
	$part->id             = get_stylesheet() . '//' . $slug;
	$part->theme          = get_stylesheet();
	$part->slug           = $slug;
	$part->type           = 'wp_template_part';
	$part->area           = $item['area'];
	$part->title          = ucwords( str_replace( '-', ' ', preg_replace( '/^dhali-/', '', $slug ) ) );
	$part->description    = __( 'Plugin-provided Dhali template part.', 'Dhali-Pattern-Library' );
	$part->content        = file_get_contents( $item['path'] );
	$part->source         = 'plugin';
	$part->status         = 'publish';
	$part->has_theme_file = false;
	$part->is_custom      = false;
	$part->is_customized  = false;
	return $part;
}

/**
 * Append only requested plugin parts not already returned by WordPress.
 *
 * @param WP_Block_Template[] $results Existing query results.
 * @param array               $query Query arguments, including area/slug__in.
 * @param string              $type Template type.
 * @return WP_Block_Template[]
 */
function dhali_pattern_library_get_parts( $results, $query, $type ) {
	if ( 'wp_template_part' !== $type || ! is_array( $results ) ) {
		return $results;
	}
	if ( isset( $query['wp_id'] ) ) {
		return $results;
	}

	$existing = array();
	foreach ( $results as $part ) {
		if ( isset( $part->slug ) ) {
			$existing[ $part->slug ] = true;
		}
	}

	foreach ( dhali_pattern_library_part_files() as $slug => $item ) {
		if ( isset( $existing[ $slug ] ) ) {
			continue;
		}
		if ( isset( $query['slug__in'] ) && ! in_array( $slug, (array) $query['slug__in'], true ) ) {
			continue;
		}
		if ( isset( $query['area'] ) && $query['area'] !== $item['area'] ) {
			continue;
		}
		$results[] = dhali_pattern_library_build_part( $slug, $item );
	}
	return $results;
}
add_filter( 'get_block_templates', 'dhali_pattern_library_get_parts', 10, 3 );

/**
 * Support direct file template lookup. Core/theme result always wins.
 *
 * @param WP_Block_Template|null $part Existing result.
 * @param string                 $id Requested theme//slug.
 * @param string                 $type Requested template type.
 * @return WP_Block_Template|null
 */
function dhali_pattern_library_get_part_file( $part, $id, $type ) {
	if ( null !== $part || 'wp_template_part' !== $type ) {
		return $part;
	}
	$pieces = explode( '//', $id, 2 );
	if ( count( $pieces ) !== 2 || $pieces[0] !== get_stylesheet() ) {
		return $part;
	}
	$files = dhali_pattern_library_part_files();
	$slug  = $pieces[1];
	return isset( $files[ $slug ] ) ? dhali_pattern_library_build_part( $slug, $files[ $slug ] ) : $part;
}
add_filter( 'get_block_file_template', 'dhali_pattern_library_get_part_file', 10, 3 );
