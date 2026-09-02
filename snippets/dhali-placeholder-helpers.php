<?php
/**
 * Add these lines to dhali-pattern-library.php immediately after the
 * opening ABSPATH check (after the `exit;` line).
 *
 * This registers the asset URL helper functions so patterns can use
 * dhali_pattern_library_image_url() and dhali_pattern_library_icon_url()
 * without causing fatal PHP errors at pattern registration time.
 *
 * Until these are added, all patterns MUST use:
 *   plugin_dir_url( dirname( __FILE__ ) ) . 'assets/images/FILENAME'
 * from inside a pattern file (not the helpers).
 */

// ─── Asset URL helpers ───────────────────────────────────────────────────────

if ( ! function_exists( 'dhali_pattern_library_asset_url' ) ) {
	/**
	 * Returns a URL to a file inside the plugin's assets/ directory.
	 *
	 * @param string $path Path relative to assets/ (e.g. 'images/placeholder-wide-16x9.webp').
	 * @return string
	 */
	function dhali_pattern_library_asset_url( string $path ): string {
		return plugin_dir_url( __FILE__ ) . 'assets/' . ltrim( $path, '/' );
	}
}

if ( ! function_exists( 'dhali_pattern_library_image_url' ) ) {
	/**
	 * Returns a URL to a placeholder image inside assets/images/.
	 *
	 * Usage inside a pattern content string:
	 *   ' . esc_url( dhali_pattern_library_image_url( 'placeholder-wide-16x9.webp' ) ) . '
	 *
	 * @param string $filename Filename only (e.g. 'placeholder-wide-16x9.webp').
	 * @return string
	 */
	function dhali_pattern_library_image_url( string $filename ): string {
		return dhali_pattern_library_asset_url( 'images/' . ltrim( $filename, '/' ) );
	}
}

if ( ! function_exists( 'dhali_pattern_library_icon_url' ) ) {
	/**
	 * Returns a URL to an icon SVG inside assets/icons/.
	 *
	 * Usage inside a pattern content string:
	 *   ' . esc_url( dhali_pattern_library_icon_url( 'check.svg' ) ) . '
	 *
	 * @param string $filename Filename only (e.g. 'check.svg').
	 * @return string
	 */
	function dhali_pattern_library_icon_url( string $filename ): string {
		return dhali_pattern_library_asset_url( 'icons/' . ltrim( $filename, '/' ) );
	}
}
