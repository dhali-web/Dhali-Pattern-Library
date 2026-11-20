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
	$GLOBALS['dhali_test_is_admin'] = false;
	function is_admin() {
		return $GLOBALS['dhali_test_is_admin'];
	}
	function test_assert( $condition, $message ) {
		if ( ! $condition ) {
			throw new \RuntimeException( $message );
		}
	}

	require __DIR__ . '/../includes/ollie-css/bootstrap.php';
	$registry = dhali_ollie_css_registry();
	$names    = array_keys( $registry );
	test_assert( $names === array( 'dhali-media-text-photo-frame', 'dhali-media-text-photo-caption', 'dhali-sidebar-sticky-container', 'dhali-query-numbered', 'dhali-term-chips', 'dhali-menu-numbered' ), 'Exactly six approved classes' );
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

	$numbered = dhali_ollie_css_source( $names[3] );
	$chips    = dhali_ollie_css_source( $names[4] );
	test_assert( is_string( $numbered ) && is_string( $chips ), 'Query numbering and term chip fragments exist and load' );
	test_assert( 0 === strpos( trim( preg_replace( '#/\*.*?\*/#s', '', $numbered ) ), 'counter-reset: dhali-query-number;' ), 'Counter resets on the Post Template itself (per-loop scope)' );
	test_assert( false !== strpos( $numbered, '& > .wp-block-post {' ) && false !== strpos( $numbered, 'counter-increment: dhali-query-number;' ), 'Counter increments only on direct post items' );
	test_assert( false !== strpos( $numbered, '& .dhali-query-number::before {' ) && false !== strpos( $numbered, 'counter(dhali-query-number, decimal-leading-zero)' ), 'Zero-padded number rendered in the rail hook' );
	test_assert( false !== strpos( $numbered, 'display: block;' ) && false !== strpos( $numbered, 'text-align: center;' ), 'Rail number is centred as a block pseudo-element' );
	$numbered_rules = preg_replace( '#/\*.*?\*/#s', '', $numbered );
	test_assert( false === strpos( $numbered_rules, ':empty' ) && false === strpos( $numbered_rules, 'data-empty' ) && false === strpos( $numbered_rules, 'block-preview' ), 'Numbering does not depend on empty-paragraph state or override editor preview rules' );
	test_assert( false === strpos( $numbered_rules, 'font-' ) && false === strpos( $numbered_rules, 'color' ), 'Number typography and color stay with the native rail group settings' );
	test_assert( false !== strpos( $chips, 'flex-wrap: wrap;' ) && false !== strpos( $chips, '& .wp-block-post-terms__separator {' ), 'Chips wrap and hide separators' );
	test_assert( false !== strpos( $chips, 'var(--wp--preset--color--primary-alt-accent)' ) && false === strpos( $chips, 'border-radius' ), 'Chips use the tint preset with square corners' );
	$menu       = dhali_ollie_css_source( $names[5] );
	test_assert( is_string( $menu ), 'Menu numbering fragment exists and loads' );
	$menu_rules = preg_replace( '#/\*.*?\*/#s', '', $menu );
	$menu_top   = '&.wp-block-navigation .wp-block-navigation__container > .wp-block-navigation-item';
	test_assert( 0 === strpos( trim( $menu_rules ), '&.wp-block-navigation .wp-block-navigation__container {' ) && false !== strpos( $menu_rules, 'counter-reset: dhali-menu-number;' ), 'Counter resets on each Navigation block\'s top-level list' );
	test_assert( false !== strpos( $menu_rules, $menu_top . ' {' ) && false !== strpos( $menu_rules, 'counter-increment: dhali-menu-number;' ), 'Counter increments only on top-level items' );
	test_assert( false === strpos( $menu_rules, 'submenu' ) && substr_count( $menu_rules, '{' ) === substr_count( $menu_rules, '&.wp-block-navigation .wp-block-navigation__container' ), 'Every rule is anchored to the top-level container, never to submenus' );
	test_assert( false !== strpos( $menu_rules, 'counter(dhali-menu-number, decimal-leading-zero) / "";' ), 'Zero-padded number is hidden from assistive tech' );
	test_assert( false !== strpos( $menu_rules, $menu_top . ':not(.has-child) > .wp-block-navigation-item__content::after {' ) && false !== strpos( $menu_rules, 'content: "\2192" / "";' ), 'Arrow skips submenu parents and is hidden from assistive tech' );
	test_assert( false !== strpos( $menu_rules, 'var(--wp--preset--spacing--small)' ) && false !== strpos( $menu_rules, 'var(--wp--preset--spacing--medium)' ) && false !== strpos( $menu_rules, 'var(--wp--preset--color--primary-accent, currentColor)' ), 'Row spacing and arrow color use presets' );
	test_assert( false !== strpos( $menu_rules, 'font-family: inherit;' ) && false !== strpos( $menu_rules, 'font-size: inherit;' ) && false === strpos( $menu_rules, 'font-weight' ) && false === strpos( $menu_rules, 'text-transform' ), 'Link typography is inherited from the Navigation block\'s native settings' );
	test_assert( ! preg_match( '/#[0-9a-f]{3,8}\b|\b(?:rgba?|hsla?)\(|shadow/i', $menu_rules ), 'No hardcoded colors or shadows' );

	foreach ( array( $numbered, $chips, $menu ) as $fragment ) {
		test_assert( false === strpos( $fragment, '!important' ) && false === strpos( $fragment, '@import' ), 'New fragments avoid !important and @import' );
	}

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
	test_assert( false !== strpos( $full_fallback, '.dhali-query-numbered {' ), 'Query numbering fallback generated' );
	test_assert( false !== strpos( $full_fallback, '.dhali-term-chips {' ), 'Term chips fallback generated' );
	test_assert( false !== strpos( $full_fallback, ".dhali-menu-numbered {\n" . $menu . "\n}" ), 'Menu numbering fallback wraps the canonical fragment' );
	test_assert( false !== strpos( $full_fallback, '.dhali-media-text-photo-caption.block-editor-block-list__block {' ), 'Editor caption fix preserved' );
	test_assert( false !== strpos( $full_fallback, '&::before {' ), 'Nested pseudo-element in fallback' );

	$frame_record = array( 'css' => $frame, 'loadGlobal' => true );
	$owned = array( $names[0] => array( 'active' => true ) );
	$frame_managed = dhali_ollie_css_build_fallback( array( $names[0] => $frame_record ), $owned, true );
	test_assert( false === strpos( $frame_managed, '.dhali-media-text-photo-frame {' ), 'Managed frame fallback suppressed' );
	test_assert( false !== strpos( $frame_managed, '.dhali-media-text-photo-caption {' ), 'Caption fallback retained when frame managed' );
	test_assert( false !== strpos( $frame_managed, '.dhali-sidebar-sticky-container {' ), 'Sticky fallback remains when frame managed' );
	test_assert( false !== strpos( $frame_managed, '.dhali-query-numbered {' ) && false !== strpos( $frame_managed, '.dhali-term-chips {' ), 'Query fallbacks remain when frame managed' );

	$chips_record  = array( 'css' => $chips, 'loadGlobal' => true );
	$chips_managed = dhali_ollie_css_build_fallback( array( $names[4] => $chips_record ), array( $names[4] => array( 'active' => true ) ), true );
	test_assert( false === strpos( $chips_managed, '.dhali-term-chips {' ), 'Managed chips fallback suppressed' );
	test_assert( false !== strpos( $chips_managed, '.dhali-query-numbered {' ), 'Numbering fallback retained when chips managed' );
	test_assert( false !== strpos( $chips_managed, '.dhali-menu-numbered {' ), 'Menu numbering fallback retained when chips managed' );
	test_assert( ! dhali_ollie_css_is_managed( $names[5], array( 'css' => $menu, 'loadGlobal' => true ), array(), true ), 'Unactivated menu numbering record uses fallback' );
	test_assert( ! dhali_ollie_css_is_managed( $names[3], array( 'css' => $numbered, 'loadGlobal' => true ), array(), true ), 'Unactivated numbering record uses fallback' );
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

	// Editor context: unmanaged output is identical; managed classes mirror Ollie's frontend rules.
	test_assert( dhali_ollie_css_build_fallback( array(), array(), false, 'editor' ) === $full_fallback, 'Unmanaged classes render identically in editor and frontend' );
	test_assert( dhali_ollie_css_build_fallback( array( $names[0] => $frame_record ), $owned, true, 'frontend' ) === $frame_managed, 'Frontend is the default context' );
	$frame_editor = dhali_ollie_css_build_fallback( array( $names[0] => $frame_record ), $owned, true, 'editor' );
	test_assert( 1 === substr_count( $frame_editor, '.dhali-media-text-photo-frame {' ) && false !== strpos( $frame_editor, ".dhali-media-text-photo-frame {\n" . $frame . "\n}" ), 'Managed class still styles the editor exactly once' );
	$edited_record = array( 'css' => str_replace( '32%', '12%', $frame ), 'hoverCss' => 'opacity: 0.9;', 'loadGlobal' => true );
	$edited_editor = dhali_ollie_css_build_fallback( array( $names[0] => $edited_record ), $owned, true, 'editor' );
	test_assert( false !== strpos( $edited_editor, 'var(--dhali-backing-left, 12%)' ) && false === strpos( $edited_editor, 'var(--dhali-backing-left, 32%)' ), 'Editor mirrors the Ollie record the frontend actually prints' );
	test_assert( false !== strpos( $edited_editor, ".dhali-media-text-photo-frame:hover {\nopacity: 0.9;\n}" ), 'Editor mirrors Ollie state CSS with the same selector' );
	test_assert( false === strpos( dhali_ollie_css_build_fallback( array( $names[0] => $edited_record ), $owned, true, 'frontend' ), '.dhali-media-text-photo-frame' ), 'Frontend never duplicates a managed class' );
	$caption_owned  = array( $names[1] => array( 'active' => true ) );
	$caption_record = array( $names[1] => array( 'css' => $caption, 'loadGlobal' => true ) );
	test_assert( false !== strpos( dhali_ollie_css_build_fallback( $caption_record, $caption_owned, true, 'editor' ), '.dhali-media-text-photo-caption.block-editor-block-list__block {' ), 'Editor caption fix survives caption activation' );
	test_assert( false === strpos( dhali_ollie_css_build_fallback( $caption_record, $caption_owned, true, 'frontend' ), '.dhali-media-text-photo-caption' ), 'Managed caption absent from frontend fallback' );
	test_assert( dhali_ollie_css_build_fallback( array( $names[0] => $frame_record ), $owned, false, 'editor' ) === $full_fallback, 'Missing vendor keeps the canonical fragment in the editor' );

	$GLOBALS['dhali_test_options']['ollie_pro_css_classes']  = array();
	$GLOBALS['dhali_test_options']['dhali_ollie_css_ownership'] = array();
	dhali_ollie_css_enqueue_fallback();
	test_assert( isset( $GLOBALS['dhali_test_styles']['enqueued'][0] ), 'Fallback enqueued' );
	test_assert( $GLOBALS['dhali_test_styles']['inline']['dhali-ollie-css-fallback'] === $full_fallback, 'Enqueued CSS matches the pure builder' );

	// Enqueue chooses the context from is_admin().
	$GLOBALS['dhali_test_options']['ollie_pro_css_classes']     = array( $names[0] => $frame_record );
	$GLOBALS['dhali_test_options']['dhali_ollie_css_ownership'] = $owned;
	dhali_ollie_css_enqueue_fallback();
	test_assert( $GLOBALS['dhali_test_styles']['inline']['dhali-ollie-css-fallback'] === $frame_managed, 'Frontend enqueue omits managed classes' );
	$GLOBALS['dhali_test_is_admin'] = true;
	dhali_ollie_css_enqueue_fallback();
	test_assert( $GLOBALS['dhali_test_styles']['inline']['dhali-ollie-css-fallback'] === $frame_editor, 'Editor enqueue mirrors managed classes' );
	$GLOBALS['dhali_test_is_admin'] = false;

	echo "PASS Ollie CSS registry, fallback, ownership, and classification\n";
}
