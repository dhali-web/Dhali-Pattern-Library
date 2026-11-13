<?php
/** Standalone, read-only integration contract: php tests/test_ollie_css_integration.php */

namespace olpo\Extensions\ClassManager {
	// Simulate the vendor's sanitize-on-output contract without loading Ollie.
	function sanitize_css( $css ) {
		return false !== strpos( $css, '@import' ) ? '' : trim( $css );
	}
	function save_css_class() {}
}

namespace {
	define( 'ABSPATH', __DIR__ . '/' );
	$GLOBALS['dhali_test_actions'] = array();
	$GLOBALS['dhali_test_options'] = array();
	$GLOBALS['dhali_test_styles']  = array();

	function add_action( $name, $callback ) {
		$GLOBALS['dhali_test_actions'][ $name ][] = $callback;
	}
	function get_option( $name, $default = false ) {
		return isset( $GLOBALS['dhali_test_options'][ $name ] ) ? $GLOBALS['dhali_test_options'][ $name ] : $default;
	}
	function update_option() {
		throw new \RuntimeException( 'Unapproved WordPress option write' );
	}
	function wp_register_style( $name, $src, $deps, $version ) {
		$GLOBALS['dhali_test_styles']['registered'][ $name ] = compact( 'src', 'deps', 'version' );
	}
	function wp_enqueue_style( $name ) {
		$GLOBALS['dhali_test_styles']['enqueued'][] = $name;
	}
	function wp_add_inline_style( $name, $css ) {
		$GLOBALS['dhali_test_styles']['inline'][ $name ] = $css;
	}
	function test_assert( $condition, $message ) {
		if ( ! $condition ) {
			throw new \RuntimeException( $message );
		}
	}

	require __DIR__ . '/../includes/ollie-css/bootstrap.php';
	$registry = dhali_ollie_css_registry();
	$names    = array_keys( $registry );
	test_assert( $names === array( 'dhali-media-text-photo-frame', 'dhali-media-text-photo-caption', 'dhali-sidebar-sticky-container' ), 'Exactly three approved classes' );
	test_assert( isset( $GLOBALS['dhali_test_actions']['enqueue_block_assets'] ), 'Block-content asset hook exists' );
	test_assert( count( $GLOBALS['dhali_test_actions']['enqueue_block_assets'] ) === 1, 'Fallback is only hooked once' );

	$frame   = dhali_ollie_css_source( $names[0] );
	$caption = dhali_ollie_css_source( $names[1] );
	$sticky  = dhali_ollie_css_source( $names[2] );
	test_assert( is_string( $sticky ) && false !== strpos( $sticky, '& > .wp-block-template-part' ), 'Sticky Column targets its immediate template part' );
	test_assert( false !== strpos( $sticky, 'position: sticky;' ) && false !== strpos( $sticky, 'max-width: 781px' ), 'Sticky CSS and stacked layout fallback present' );
	test_assert( is_string( $frame ) && is_string( $caption ), 'Class fragments exist and load' );
	test_assert( false !== strpos( $frame, '&::before' ), 'Nested frame pseudo-element retained' );
	test_assert( false !== strpos( $frame, 'position: relative;' ), 'Frame positioning retained' );
	test_assert( false !== strpos( $caption, 'position: absolute;' ), 'Caption positioning retained' );

	$legacy = file_get_contents( __DIR__ . '/../assets/css/dhali-media-text-photo.css' );
	foreach ( array(
		'position: relative;',
		'isolation: isolate;',
		'top: var(--dhali-backing-top, 38%);',
		'left: var(--dhali-backing-left, 32%);',
		'pointer-events: none;',
	) as $declaration ) {
		test_assert( false !== strpos( $legacy, $declaration ) && false !== strpos( $frame, $declaration ), 'Frame drift: ' . $declaration );
	}
	foreach ( array(
		'position: absolute;',
		'left: calc(-1 * var(--dhali-caption-overhang, clamp(0.5rem, 2vw, 1.75rem)));',
		'bottom: var(--dhali-caption-bottom, clamp(1rem, 5%, 1.5rem));',
	) as $declaration ) {
		test_assert( false !== strpos( $legacy, $declaration ) && false !== strpos( $caption, $declaration ), 'Caption drift: ' . $declaration );
	}

	$full_fallback = dhali_ollie_css_build_fallback( array(), array(), false );
	test_assert( false !== strpos( $full_fallback, '.dhali-media-text-photo-frame {' ), 'Frame fallback generated' );
	test_assert( false !== strpos( $full_fallback, '.dhali-media-text-photo-caption {' ), 'Caption fallback generated' );
	test_assert( false !== strpos( $full_fallback, '.dhali-sidebar-sticky-container {' ), 'Sticky sidebar fallback generated' );
	test_assert( false !== strpos( $full_fallback, '.dhali-media-text-photo-caption.block-editor-block-list__block {' ), 'Editor caption fix preserved' );
	test_assert( false !== strpos( $full_fallback, '&::before {' ), 'Nested pseudo-element in fallback' );

	$frame_record = array( 'css' => $frame, 'loadGlobal' => true );
	$owned = array( $names[0] => array( 'active' => true ) );
	$frame_managed = dhali_ollie_css_build_fallback( array( $names[0] => $frame_record ), $owned, true );
	test_assert( false === strpos( $frame_managed, '.dhali-media-text-photo-frame {' ), 'Managed frame fallback suppressed' );
	test_assert( false !== strpos( $frame_managed, '.dhali-media-text-photo-caption {' ), 'Caption fallback retained when frame managed' );
	test_assert( false !== strpos( $frame_managed, '.dhali-sidebar-sticky-container {' ), 'Sticky fallback remains when frame managed' );
	test_assert( false !== strpos( $frame_managed, '.dhali-media-text-photo-caption.block-editor-block-list__block {' ), 'Editor caption fix retained' );

	$record_not_global = $frame_record;
	$record_not_global['loadGlobal'] = false;
	test_assert( ! dhali_ollie_css_is_managed( $names[0], $record_not_global, $owned, true ), 'Non-global record uses fallback' );
	test_assert( ! dhali_ollie_css_is_managed( $names[0], $frame_record, $owned, false ), 'Missing vendor uses fallback' );
	test_assert( ! dhali_ollie_css_is_managed( $names[0], array( 'css' => '@import url(unsafe.css);', 'loadGlobal' => true ), $owned, true ), 'Rejected CSS uses fallback' );
	test_assert( ! dhali_ollie_css_is_managed( $names[0], $frame_record, array(), true ), 'Unactivated record uses fallback' );
	test_assert( ! dhali_ollie_css_is_managed( $names[0], array( 'css' => '', 'loadGlobal' => true ), $owned, true ), 'Empty record uses fallback' );

	$records = array( $names[0] => array( 'css' => '', 'hoverCss' => '', 'loadGlobal' => false ) );
	test_assert( dhali_ollie_css_classify( $names[1], $records, array() ) === 'missing', 'Missing class detected' );
	test_assert( dhali_ollie_css_classify( $names[0], $records, array() ) === 'empty', 'Empty class detected' );
	$records[ $names[0] ]['hoverCss'] = 'color: red;';
	test_assert( dhali_ollie_css_classify( $names[0], $records, array() ) === 'customized', 'State CSS prevents overwrite' );
	$records[ $names[0] ] = array( 'css' => $frame );
	test_assert( dhali_ollie_css_classify( $names[0], $records, array() ) === 'current', 'Matching source detected' );
	$records[ $names[0] ] = array( 'css' => 'position: static;' );
	test_assert( dhali_ollie_css_classify( $names[0], $records, array() ) === 'customized', 'Untracked nonempty CSS protected' );
	test_assert( dhali_ollie_css_classify( $names[0], $records, array( $names[0] => array( 'import_hash' => 'test' ) ) ) === 'edited', 'Imported edit detected' );

	$GLOBALS['dhali_test_options']['ollie_pro_css_classes']  = array();
	$GLOBALS['dhali_test_options']['dhali_ollie_css_ownership'] = array();
	dhali_ollie_css_enqueue_fallback();
	test_assert( isset( $GLOBALS['dhali_test_styles']['enqueued'][0] ), 'Fallback enqueued' );
	test_assert( $GLOBALS['dhali_test_styles']['inline']['dhali-ollie-css-fallback'] === $full_fallback, 'Enqueued CSS matches the pure builder' );

	echo "PASS Ollie CSS registry, fallback, ownership, and classification\n";
}
