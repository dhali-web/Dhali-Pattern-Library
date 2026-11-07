<?php
/**
 * Native Gutenberg shadow presets shared by Dhali patterns.
 *
 * Presets live in the plugin so pattern instances can use them on any site
 * with Dhali Pattern Library active. This does not write Global Styles or CSS.
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Add Dhali presets to the active theme layer without removing theme presets.
 *
 * @param WP_Theme_JSON_Data $theme_json Theme-layer data.
 * @return WP_Theme_JSON_Data
 */
function dhali_pattern_library_add_shadow_presets( $theme_json ) {
	$data        = $theme_json->get_data();
	$raw_presets = $data['settings']['shadow']['presets'] ?? array();

	if ( ! is_array( $raw_presets ) ) {
		$raw_presets = array();
	}

	// WP_Theme_JSON_Data::get_data() returns raw origin-grouped presets:
	// array( 'theme' => array( ... ), 'custom' => array( ... ) ).
	// Only the theme list belongs in the theme-layer update_with() payload.
	// Some older or mocked implementations supply a flat preset list.
	$presets = array();
	if ( isset( $raw_presets['theme'] ) && is_array( $raw_presets['theme'] ) ) {
		$presets = $raw_presets['theme'];
	} else {
		foreach ( $raw_presets as $candidate ) {
			if ( is_array( $candidate ) && isset( $candidate['slug'] ) ) {
				$presets[] = $candidate;
			}
		}
	}

	// Do not overwrite an existing theme or user-custom preset slug.
	$existing_slugs = array();
	foreach ( $presets as $preset ) {
		if ( is_array( $preset ) && isset( $preset['slug'] ) ) {
			$existing_slugs[] = $preset['slug'];
		}
	}
	foreach ( $raw_presets['custom'] ?? array() as $preset ) {
		if ( is_array( $preset ) && isset( $preset['slug'] ) ) {
			$existing_slugs[] = $preset['slug'];
		}
	}

	$dhali_presets = array(
		array(
			'name'   => __( 'Dhali Offset Blue', 'dhali' ),
			'slug'   => 'dhali-offset-blue',
			'shadow' => '16px 16px 0 0 #12648a47',
		),
	);

	$added = false;
	foreach ( $dhali_presets as $preset ) {
		if ( ! in_array( $preset['slug'], $existing_slugs, true ) ) {
			$presets[]        = $preset;
			$existing_slugs[] = $preset['slug'];
			$added            = true;
		}
	}

	if ( ! $added ) {
		return $theme_json;
	}

	return $theme_json->update_with(
		array(
			'version'  => 3,
			'settings' => array(
				'shadow' => array(
					'presets' => $presets,
				),
			),
		)
	);
}

/**
 * Theme-layer filters must be installed after theme setup when in a plugin.
 */
function dhali_pattern_library_register_shadow_presets() {
	if ( function_exists( 'wp_theme_has_theme_json' ) && wp_theme_has_theme_json() ) {
		add_filter( 'wp_theme_json_data_theme', 'dhali_pattern_library_add_shadow_presets' );
	}
}
add_action( 'after_setup_theme', 'dhali_pattern_library_register_shadow_presets' );
