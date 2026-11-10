<?php
/** Standalone registration test: php tests/test_hover_lift.php */

define( 'ABSPATH', __DIR__ . '/' );
$GLOBALS['dhali_actions'] = array();
$GLOBALS['dhali_styles'] = array();
$GLOBALS['dhali_enqueues'] = array();

function add_action( $hook, $callback ) {
    $GLOBALS['dhali_actions'][ $hook ] = $callback;
}
function register_block_style( $block_name, $options ) {
    $GLOBALS['dhali_styles'][ $block_name ] = $options;
}
function wp_enqueue_style( $handle, $url, $deps, $version ) {
    $GLOBALS['dhali_enqueues'][ $handle ] = compact( 'url', 'deps', 'version' );
}
function plugin_dir_url( $file ) {
    return 'https://example.test/wp-content/plugins/Dhali-Pattern-Library/';
}
function __( $text, $domain ) {
    return $text;
}
function dhali_test( $condition, $message ) {
    if ( ! $condition ) {
        fwrite( STDERR, "FAIL: {$message}\n" );
        exit( 1 );
    }
}

require __DIR__ . '/../includes/design-presets/hover-lift.php';

dhali_test( isset( $GLOBALS['dhali_actions']['init'] ), 'Registration hook installed' );
dhali_test( isset( $GLOBALS['dhali_actions']['enqueue_block_assets'] ), 'Editor/frontend enqueue hook installed' );
call_user_func( $GLOBALS['dhali_actions']['init'] );
dhali_test( count( $GLOBALS['dhali_styles'] ) === 3, 'Exactly three core block styles registered' );
foreach ( array( 'core/button', 'core/group', 'core/paragraph' ) as $block ) {
    $options = $GLOBALS['dhali_styles'][ $block ];
    dhali_test( 'dhali-hover-lift' === $options['name'], 'Opt-in slug for ' . $block );
    dhali_test( 'Dhali Lift on Hover' === $options['label'], 'Visible label for ' . $block );
}
call_user_func( $GLOBALS['dhali_actions']['enqueue_block_assets'] );
dhali_test( isset( $GLOBALS['dhali_enqueues']['dhali-hover-lift'] ), 'CSS enqueued' );
dhali_test( str_ends_with( $GLOBALS['dhali_enqueues']['dhali-hover-lift']['url'], '/assets/css/dhali-hover-lift.css' ), 'Plugin-owned CSS URL' );

$css = file_get_contents( __DIR__ . '/../assets/css/dhali-hover-lift.css' );
dhali_test( str_contains( $css, 'transform: translateY(-2px)' ), '2px lift effect' );
dhali_test( str_contains( $css, '.dhali-hover-lift' ), 'Composable CSS class supported' );
dhali_test( str_contains( $css, 'prefers-reduced-motion: reduce' ), 'Reduced-motion override' );
dhali_test( str_contains( $css, ':focus-visible' ), 'Accessible focus state' );
echo "PASS Dhali hover lift registration and CSS\n";
