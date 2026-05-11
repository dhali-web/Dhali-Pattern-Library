<?php
/**
 * Plugin Name: Dhali Pattern Library
 * Description: A centralized, version-controlled repository for our custom block patterns.
 * Version: 1.0.0
 * Author: Dhali
 */

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

function dhali_register_agency_patterns() {
    // 1. Register a custom category for your agency so they are easy to find
    register_block_pattern_category(
        'dhali-web-development',
        array( 'label' => __( 'Dhali Patterns', 'dhali' ) )
    );

    // 2. Auto-load all patterns from the /patterns/ directory
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
