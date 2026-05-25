<?php
/**
 * Placeholder asset helpers for the Dhali Pattern Library plugin.
 * Place these in dhali-pattern-library.php or an included helpers file.
 */

if ( ! function_exists( 'dhali_pattern_library_asset_url' ) ) {
	function dhali_pattern_library_asset_url( string $path ): string {
		return plugin_dir_url( __FILE__ ) . 'assets/' . ltrim( $path, '/' );
	}
}

if ( ! function_exists( 'dhali_pattern_library_image_url' ) ) {
	function dhali_pattern_library_image_url( string $filename ): string {
		return dhali_pattern_library_asset_url( 'images/' . ltrim( $filename, '/' ) );
	}
}

if ( ! function_exists( 'dhali_pattern_library_icon_url' ) ) {
	function dhali_pattern_library_icon_url( string $filename ): string {
		return dhali_pattern_library_asset_url( 'icons/' . ltrim( $filename, '/' ) );
	}
}
