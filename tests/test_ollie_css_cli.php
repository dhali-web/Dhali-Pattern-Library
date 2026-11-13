<?php
/** Standalone in-memory WP-CLI simulation: php tests/test_ollie_css_cli.php */

namespace olpo\Extensions\ClassManager {
	function sanitize_css( $css ) {
		return false !== strpos( $css, '@import' ) ? '' : trim( $css );
	}
	function save_css_class() {}
}

namespace {
	define( 'ABSPATH', __DIR__ . '/' );
	define( 'WP_CLI', true );

	class WP_CLI {
		public static $commands = array();
		public static $output   = array();
		public static function add_command( $name, $callback ) { self::$commands[ $name ] = $callback; }
		public static function log( $message ) { self::$output[] = $message; }
		public static function success( $message ) { self::$output[] = $message; }
		public static function warning( $message ) { self::$output[] = $message; }
		public static function error( $message ) { throw new \RuntimeException( $message ); }
	}

	class WP_REST_Request {
		public $data;
		public $route;
		public function __construct( $method, $route ) { $this->route = $route; }
		public function set_body_params( $data ) { $this->data = $data; }
	}
	class DhaliFakeResponse {
		public function is_error() { return false; }
	}

	$GLOBALS['dhali_test_options'] = array(
		'ollie_pro_css_classes' => array(
			'dhali-media-text-photo-frame' => array(
				'css' => '', 'hoverCss' => '', 'focusCss' => '', 'activeCss' => '', 'disabledCss' => '',
				'loadGlobal' => false, 'usage' => array( 249 ),
			),
			'site-owned-card' => array( 'css' => 'color: red;', 'loadGlobal' => true, 'usage' => array( 123 ) ),
		),
	);
	$GLOBALS['dhali_test_writes'] = 0;
	$GLOBALS['dhali_test_rest']   = 0;
	$GLOBALS['dhali_test_admin']  = false;

	function add_action() {}
	function get_option( $name, $default = false ) {
		return array_key_exists( $name, $GLOBALS['dhali_test_options'] ) ? $GLOBALS['dhali_test_options'][ $name ] : $default;
	}
	function update_option( $name, $data, $autoload = null ) {
		++$GLOBALS['dhali_test_writes'];
		$GLOBALS['dhali_test_options'][ $name ] = $data;
	}
	function current_user_can( $capability ) { return $GLOBALS['dhali_test_admin']; }
	function is_wp_error( $value ) { return false; }
	function rest_do_request( $request ) {
		++$GLOBALS['dhali_test_rest'];
		if ( '/ollie-pro/v1/css-classes' !== $request->route ) {
			throw new \RuntimeException( 'Unexpected REST route' );
		}
		$data = $request->data;
		$name = $data['className'];
		$classes = get_option( 'ollie_pro_css_classes', array() );
		$usage = isset( $classes[ $name ]['usage'] ) ? $classes[ $name ]['usage'] : array();
		$classes[ $name ] = array(
			'css' => olpo\Extensions\ClassManager\sanitize_css( $data['css'] ),
			'hoverCss' => $data['hoverCss'], 'focusCss' => $data['focusCss'],
			'activeCss' => $data['activeCss'], 'disabledCss' => $data['disabledCss'],
			'loadGlobal' => $data['loadGlobal'], 'usage' => $usage,
		);
		update_option( 'ollie_pro_css_classes', $classes );
		return new DhaliFakeResponse();
	}
	function test_assert( $condition, $message ) {
		if ( ! $condition ) { throw new \RuntimeException( $message ); }
	}

	require __DIR__ . '/../includes/ollie-css/bootstrap.php';
	test_assert( isset( WP_CLI::$commands['dhali ollie-css'] ), 'Registered only existing CLI entry point' );
	$cmd = new Dhali_Ollie_CSS_Command();
	$original = get_option( 'ollie_pro_css_classes' );

	$cmd->import( array(), array() );
	test_assert( $original === get_option( 'ollie_pro_css_classes' ), 'Dry run preserves all class records' );
	test_assert( 0 === $GLOBALS['dhali_test_writes'] && 0 === $GLOBALS['dhali_test_rest'], 'Dry run never writes' );
	test_assert( 3 === count( WP_CLI::$output ), 'Dry run reports three classes' );
	test_assert( false !== strpos( WP_CLI::$output[0], 'empty' ), 'Existing empty record classified' );
	test_assert( false !== strpos( WP_CLI::$output[1], 'missing' ), 'Missing record classified' );

	$blocked = false;
	try { $cmd->import( array(), array( 'apply' => true ) ); }
	catch ( \RuntimeException $e ) { $blocked = true; }
	test_assert( $blocked && 0 === $GLOBALS['dhali_test_writes'], 'Import requires authorized admin' );

	$GLOBALS['dhali_test_admin'] = true;
	$cmd->import( array(), array( 'apply' => true ) );
	$classes = get_option( 'ollie_pro_css_classes' );
	test_assert( 3 === $GLOBALS['dhali_test_rest'], 'Only approved missing/empty classes imported' );
	test_assert( $classes['site-owned-card'] === $original['site-owned-card'], 'Unrelated record untouched' );
	test_assert( $classes['dhali-media-text-photo-frame']['usage'] === array( 249 ), 'Existing usage preserved by Ollie save handler' );
	test_assert( true === $classes['dhali-media-text-photo-caption']['loadGlobal'], 'Global class loading provisioned' );
	test_assert( true === $classes['dhali-sidebar-sticky-container']['loadGlobal'], 'Sticky sidebar registered for Ollie global loading' );
	test_assert( 3 === count( get_option( 'dhali_ollie_css_imports' ) ), 'Import metadata recorded' );
	test_assert( ! isset( get_option( 'dhali_ollie_css_ownership', array() )['dhali-media-text-photo-frame'] ), 'Import does not set Dhali ownership' );

	$rest_before = $GLOBALS['dhali_test_rest'];
	$cmd->import( array(), array( 'apply' => true ) );
	test_assert( $GLOBALS['dhali_test_rest'] === $rest_before, 'Second import is idempotent' );

	$cmd->activate( array(), array( 'class' => 'dhali-media-text-photo-frame', 'apply' => true ) );
	test_assert( get_option( 'dhali_ollie_css_ownership' )['dhali-media-text-photo-frame']['active'], 'Explicit activation opts into Ollie' );

	$cmd->deactivate( array(), array( 'class' => 'dhali-media-text-photo-frame', 'apply' => true ) );
	test_assert( false === get_option( 'dhali_ollie_css_ownership' )['dhali-media-text-photo-frame']['active'], 'Deactivation restores plugin fallback ownership' );

	echo "PASS Ollie CSS CLI dry-run, permission gate, import, and activation (in memory)\n";
}
