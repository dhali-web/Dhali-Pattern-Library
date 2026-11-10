<?php
/**
 * Opt-in Dhali Lift on Hover treatment for native Gutenberg blocks.
 *
 * The Styles-panel variation gives editors a named choice. The matching
 * `dhali-hover-lift` Additional CSS Class is available when the block needs
 * to keep an existing Ollie style variation (e.g. button-brand).
 * This is NOT a new Ollie Animation Designer animation type.
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

/** Register the native block style choice without changing any defaults. */
function dhali_pattern_library_register_hover_lift_styles() {
    foreach ( array( 'core/button', 'core/group', 'core/paragraph' ) as $block_name ) {
        register_block_style(
            $block_name,
            array(
                'name'  => 'dhali-hover-lift',
                'label' => __( 'Dhali Lift on Hover', 'dhali' ),
            )
        );
    }
}
add_action( 'init', 'dhali_pattern_library_register_hover_lift_styles' );

/**
 * Load the tiny shared stylesheet in the frontend and the editor canvas.
 * enqueue_block_assets supports iframe-based editors; CSS lives in the plugin.
 */
function dhali_pattern_library_enqueue_hover_lift() {
    $plugin_root = dirname( __DIR__, 2 );
    $relative    = 'assets/css/dhali-hover-lift.css';
    $path        = $plugin_root . '/' . $relative;

    if ( ! is_readable( $path ) ) {
        return;
    }

    wp_enqueue_style(
        'dhali-hover-lift',
        plugin_dir_url( $plugin_root . '/dhali-pattern-library.php' ) . $relative,
        array(),
        (string) filemtime( $path )
    );
}
add_action( 'enqueue_block_assets', 'dhali_pattern_library_enqueue_hover_lift' );
