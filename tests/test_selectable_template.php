<?php
/**
 * Standalone, read-only regression checks for the selectable Interior Page
 * template (includes/selectable-templates.php and
 * templates/selectable/dhali-interior-page.html).
 * Run: php tests/test_selectable_template.php
 *
 * Uses minimal WordPress stubs. Scenarios that need a different stub set
 * (no register_block_template API; the existing hierarchy provider) run in
 * child PHP processes of this same file. No WordPress bootstrap, database,
 * or network access.
 */

define( 'ABSPATH', __DIR__ . '/' );

$plugin_dir    = dirname( __DIR__ );
$template_file = $plugin_dir . '/templates/selectable/dhali-interior-page.html';
$name          = 'dhali-pattern-library//dhali-interior-page';
$sidebar_file  = $plugin_dir . '/templates/selectable/dhali-interior-page-sidebar.html';
$sidebar_name  = 'dhali-pattern-library//dhali-interior-page-sidebar';
$child         = null;
foreach ( $argv as $arg ) {
	if ( 0 === strpos( $arg, '--child=' ) ) {
		$child = substr( $arg, 8 );
	}
}

// ---------------------------------------------------------------------------
// Child: existing hierarchy provider must not see the selectable template.
// Stubs mirror tests/test_template_registration.php.
// ---------------------------------------------------------------------------
if ( 'provider' === $child ) {
	$GLOBALS['dhali_test_filters'] = array();
	function add_action( $hook, $callback, $priority = 10, $accepted_args = 1 ) {}
	function add_filter( $hook, $callback, $priority = 10, $accepted_args = 1 ) {
		$GLOBALS['dhali_test_filters'][ $hook ][] = $callback;
	}
	function plugin_basename( $file ) {
		return basename( $file );
	}
	function get_file_data( $file, $headers ) {
		return array( 'UpdateURI' => '' );
	}
	function plugin_dir_path( $file ) {
		return dirname( $file ) . '/';
	}
	function get_stylesheet() {
		return 'test-theme';
	}
	function __( $text, $domain ) {
		return $text;
	}
	function trailingslashit( $path ) {
		return rtrim( $path, '/\\' ) . '/';
	}
	#[AllowDynamicProperties]
	class WP_Block_Template {}

	require $plugin_dir . '/dhali-pattern-library.php';

	$all     = dhali_register_block_templates( array(), array(), 'wp_template' );
	$by_slug = dhali_register_block_templates( array(), array( 'slug__in' => array( 'dhali-interior-page', 'dhali-interior-page-sidebar' ) ), 'wp_template' );
	$single  = dhali_get_block_template( null, 'test-theme//dhali-interior-page', 'wp_template' );
	$single2 = dhali_get_block_template( null, 'test-theme//dhali-interior-page-sidebar', 'wp_template' );
	echo json_encode(
		array(
			'list_slugs'      => array_map( fn( $t ) => $t->slug, $all ),
			'slug_query'      => count( $by_slug ),
			'single_is_null'  => null === $single && null === $single2,
			'module_required' => function_exists( 'dhali_register_selectable_templates' ),
		)
	);
	exit( 0 );
}

// Declarations below are conditional so each child process gets only its own
// stub set (PHP early-binds unconditional top-level functions and classes).
if ( 'provider' !== $child ) {
	// ---------------------------------------------------------------------------
	// Shared stubs for the main run and the no-API child.
	// ---------------------------------------------------------------------------
	$GLOBALS['dhali_test_hooks']      = array();
	$GLOBALS['dhali_test_registered'] = array();
	$GLOBALS['dhali_test_calls']      = 0;

	function add_action( $hook, $callback, $priority = 10, $accepted_args = 1 ) {
		$GLOBALS['dhali_test_hooks'][ $hook ][] = array( $callback, $priority, $accepted_args );
	}
	function add_filter( $hook, $callback, $priority = 10, $accepted_args = 1 ) {
		$GLOBALS['dhali_test_hooks'][ $hook ][] = array( $callback, $priority, $accepted_args );
	}
	function __( $text, $domain ) {
		return $text;
	}
	#[AllowDynamicProperties]
	class WP_Block_Template {}
	class WP_Error {
		public $code;
		public function __construct( $code = '' ) {
			$this->code = $code;
		}
	}
	class WP_Block_Templates_Registry {
		private static $instance;
		public static function get_instance() {
			return self::$instance ?? ( self::$instance = new self() );
		}
		public function is_registered( $name ) {
			return isset( $GLOBALS['dhali_test_registered'][ $name ] );
		}
	}

	require $plugin_dir . '/includes/selectable-templates.php';

	if ( 'no-api' === $child ) {
		echo json_encode( dhali_register_selectable_templates() );
		exit( 0 );
	}

	// Mirrors WP_Block_Templates_Registry::register() (WP 6.7+): validation,
	// WP_Error on failure, "{stylesheet}//{slug}" id, plugin association.
	function register_block_template( $template_name, $args = array() ) {
		++$GLOBALS['dhali_test_calls'];
		if ( isset( $GLOBALS['dhali_test_registered'][ $template_name ] ) ) {
			return new WP_Error( 'template_already_registered' );
		}
		if ( preg_match( '/[A-Z]+/', $template_name ) || ! preg_match( '/^[a-z0-9_\-]+\/\/[a-z0-9_\-]+$/', $template_name ) ) {
			return new WP_Error( 'template_name_invalid' );
		}
		list( $plugin, $slug ) = explode( '//', $template_name );
		$t             = new WP_Block_Template();
		$t->id         = 'test-theme//' . $slug;
		$t->theme      = 'test-theme';
		$t->plugin     = $plugin;
		$t->slug       = $slug;
		$t->source     = 'plugin';
		$t->origin     = 'plugin';
		$t->type       = 'wp_template';
		$t->title      = $args['title'] ?? $template_name;
		$t->content    = $args['content'] ?? '';
		$t->post_types = $args['post_types'] ?? array();
		$GLOBALS['dhali_test_registered'][ $template_name ] = $t;
		return $t;
	}

	$pass = 0;
	function t( $condition, $message ) {
		global $pass;
		if ( ! $condition ) {
			fwrite( STDERR, "FAIL: {$message}\n" );
			exit( 1 );
		}
		++$pass;
		echo "ok - {$message}\n";
	}
	function child( $mode ) {
		$cmd = escapeshellarg( PHP_BINARY ) . ' -d error_reporting=' . escapeshellarg( 'E_ALL & ~E_DEPRECATED' ) . ' ' . escapeshellarg( __FILE__ ) . ' --child=' . $mode . ' 2>&1';
		exec( $cmd, $out, $code );
		return array( $code, json_decode( implode( "\n", $out ), true ), implode( "\n", $out ) );
	}

	// --- Hooks and definitions. ---
	t( array( 'dhali_register_selectable_templates', 10, 1 ) === $GLOBALS['dhali_test_hooks']['init'][0], 'Registration hooked to init' );
	t( 1 === count( $GLOBALS['dhali_test_hooks'] ), 'No other hooks added' );
	t( 0 === $GLOBALS['dhali_test_calls'], 'Nothing registered at file load' );
	$defs = dhali_selectable_template_definitions();
	t( array( $name, $sidebar_name ) === array_keys( $defs ), 'Exactly two definitions: ' . $name . ', ' . $sidebar_name );
	foreach ( array( $name => $template_file, $sidebar_name => $sidebar_file ) as $def_name => $def_file ) {
		t( ! preg_match( '/[A-Z]/', $def_name ) && preg_match( '/^[a-z0-9_\-]+\/\/[a-z0-9_\-]+$/', $def_name ), "{$def_name}: name is lowercase plugin//slug" );
		t( array( 'page' ) === $defs[ $def_name ]['post_types'], "{$def_name}: post_types is exactly [page]" );
		t( realpath( $defs[ $def_name ]['file'] ) === realpath( $def_file ), "{$def_name}: definition points at " . basename( $def_file ) );
	}

	// --- Successful registration via the init hook signature ('' arg). ---
	$result = dhali_register_selectable_templates( '' );
	t( array( $name, $sidebar_name ) === $result, 'Hook call registers both templates' );
	$side = $GLOBALS['dhali_test_registered'][ $sidebar_name ];
	t( 'test-theme//dhali-interior-page-sidebar' === $side->id && 'dhali-interior-page-sidebar' === $side->slug, 'Sidebar template identity is {stylesheet}//dhali-interior-page-sidebar' );
	t( 'dhali-pattern-library' === $side->plugin && 'wp_template' === $side->type && array( 'page' ) === $side->post_types, 'Sidebar template: plugin dhali-pattern-library, wp_template, Pages only' );
	t( 'Interior Page with Sidebar' === $side->title, 'Sidebar template title is Interior Page with Sidebar' );
	t( file_get_contents( $sidebar_file ) === $side->content, 'Sidebar template content is the source file, unmodified' );
	$tpl = $GLOBALS['dhali_test_registered'][ $name ];
	t( 'test-theme//dhali-interior-page' === $tpl->id, 'Template identity is {stylesheet}//dhali-interior-page' );
	t( 'dhali-pattern-library' === $tpl->plugin && 'plugin' === $tpl->source, 'Plugin association dhali-pattern-library, source plugin' );
	t( 'dhali-interior-page' === $tpl->slug && 'wp_template' === $tpl->type, 'Slug dhali-interior-page, type wp_template' );
	t( array( 'page' ) === $tpl->post_types, 'Registered template eligible for Pages only' );
	t( 'Interior Page' === $tpl->title, 'Title is Interior Page' );
	t( file_get_contents( $template_file ) === $tpl->content, 'Content is the source file, unmodified' );

	// --- Duplicate registration: skipped, no second API call. ---
	$calls = $GLOBALS['dhali_test_calls'];
	t( array() === dhali_register_selectable_templates(), 'Second run registers nothing' );
	t( $calls === $GLOBALS['dhali_test_calls'], 'Second run never calls register_block_template' );
	t( $tpl === $GLOBALS['dhali_test_registered'][ $name ], 'Existing registration left untouched' );

	// --- Missing / empty file and API error: skipped without side effects. ---
	$GLOBALS['dhali_test_registered'] = array();
	$calls = $GLOBALS['dhali_test_calls'];
	$missing = array( 'dhali-pattern-library//missing' => array( 'file' => $plugin_dir . '/templates/selectable/does-not-exist.html', 'title' => 'x', 'description' => '', 'post_types' => array( 'page' ) ) );
	t( array() === dhali_register_selectable_templates( $missing ), 'Missing file: nothing registered' );
	$empty_file = tempnam( sys_get_temp_dir(), 'dhali' );
	file_put_contents( $empty_file, "  \n" );
	$empty = array( 'dhali-pattern-library//empty' => array( 'file' => $empty_file, 'title' => 'x', 'description' => '', 'post_types' => array( 'page' ) ) );
	t( array() === dhali_register_selectable_templates( $empty ), 'Empty file: nothing registered' );
	unlink( $empty_file );
	t( $calls === $GLOBALS['dhali_test_calls'] && array() === $GLOBALS['dhali_test_registered'], 'Missing/empty file never calls the API' );
	$bad = array( 'Dhali-Pattern-Library//bad' => $defs[ $name ] );
	t( array() === dhali_register_selectable_templates( $bad ), 'WP_Error from the API (uppercase name) is not reported as registered' );
	t( array() === $GLOBALS['dhali_test_registered'], 'Failed registration leaves the registry unchanged' );

	// --- No register_block_template API. ---
	list( $code, $json, $raw ) = child( 'no-api' );
	t( 0 === $code && array() === $json, 'Without register_block_template: no-op, no fatal (' . trim( $raw ) . ')' );

	// --- Existing hierarchy provider does not serve the selectable template. ---
	$top_level = array_map( 'realpath', glob( $plugin_dir . '/templates/*.html' ) );
	foreach ( array( $template_file, $sidebar_file ) as $f ) {
		t( ! in_array( realpath( $f ), $top_level, true ), basename( $f ) . ' is outside the top-level templates/*.html glob' );
		t( ! file_exists( $plugin_dir . '/templates/' . basename( $f ) ), 'No top-level templates/' . basename( $f ) . ' for the slug lookup' );
	}
	list( $code, $json, $raw ) = child( 'provider' );
	t( 0 === $code && is_array( $json ), 'Provider child ran (' . substr( $raw, 0, 200 ) . ')' );
	t( ! array_intersect( array( 'dhali-interior-page', 'dhali-interior-page-sidebar' ), $json['list_slugs'] ), 'Provider list excludes both selectable templates (lists: ' . implode( ',', $json['list_slugs'] ) . ')' );
	t( 0 === $json['slug_query'], 'Provider slug__in query returns nothing for the selectable templates' );
	t( true === $json['single_is_null'], 'Provider single lookups return null for the selectable templates' );
	t( true === $json['module_required'], 'Plugin bootstrap loads the selectable-template module' );

	// --- Template markup (run for each selectable template). ---
	$expect = array( 'core/heading' => 'dhali_banner_headline', 'core/paragraph' => 'dhali_banner_intro' );
	$header = array( 'slug' => 'dhali-header-utility-bar-logo-nav-cta', 'theme' => 'ollie', 'area' => 'header' );
	$footer = array( 'slug' => 'dhali-footer-brand-links-legal', 'theme' => 'ollie', 'area' => 'footer' );
	$sidebar_part = array( 'slug' => 'dhali-sidebar-contact-card', 'theme' => 'ollie', 'tagName' => 'aside', 'area' => 'sidebar' );
	$suites = array(
		$template_file => array(
			'allowed' => array( 'core/template-part', 'core/group', 'create-block/dhali-breadcrumbs', 'core/post-title', 'core/heading', 'core/paragraph', 'core/post-content' ),
			'parts'   => array( $header, $footer ),
		),
		$sidebar_file  => array(
			'allowed' => array( 'core/template-part', 'core/group', 'create-block/dhali-breadcrumbs', 'core/post-title', 'core/heading', 'core/paragraph', 'core/post-content', 'core/columns', 'core/column' ),
			'parts'   => array( $header, $sidebar_part, $footer ),
		),
	);
	foreach ( $suites as $suite_file => $suite ) {
	$label = basename( $suite_file ) . ': ';
	$html  = file_get_contents( $suite_file );
	preg_match_all( '/<!--\s+(\/)?wp:([a-z0-9-]+(?:\/[a-z0-9-]+)?)(?:\s+(\{.*?\}))?\s*(\/)?-->/s', $html, $m, PREG_SET_ORDER );
	$blocks = array();
	$depth  = 0;
	$stack  = array();
	foreach ( $m as $tok ) {
		$closing = '/' === $tok[1];
		$bname   = false === strpos( $tok[2], '/' ) ? 'core/' . $tok[2] : $tok[2];
		if ( $closing ) {
			t( array_pop( $stack ) === $bname, "Closing comment for {$bname} matches its opener" );
			continue;
		}
		$attrs = isset( $tok[3] ) && '' !== $tok[3] ? json_decode( $tok[3], true ) : array();
		t( is_array( $attrs ), "{$bname} attributes are valid JSON" );
		$blocks[] = array( 'name' => $bname, 'attrs' => $attrs, 'depth' => count( $stack ) );
		if ( empty( $tok[4] ) ) {
			$stack[] = $bname;
		}
	}
	t( array() === $stack, 'All block comments balanced' );

	$count = function ( $n, $filter = null ) use ( $blocks ) {
		return count( array_filter( $blocks, fn( $b ) => $b['name'] === $n && ( ! $filter || $filter( $b['attrs'] ) ) ) );
	};
	$unexpected = array_diff( array_unique( array_column( $blocks, 'name' ) ), $suite['allowed'] );
	t( array() === $unexpected, $label . 'Only expected blocks used (' . implode( ', ', array_unique( array_column( $blocks, 'name' ) ) ) . ')' );

	$parts = array_values( array_filter( $blocks, fn( $b ) => 'core/template-part' === $b['name'] ) );
	t( count( $suite['parts'] ) === count( $parts ), $label . 'Exactly ' . count( $suite['parts'] ) . ' template parts' );
	foreach ( $suite['parts'] as $i => $want ) {
		t( $want === $parts[ $i ]['attrs'], $label . "Part {$i} is {$want['slug']} ({$want['area']})" );
		t( file_exists( $plugin_dir . '/parts/' . $want['slug'] . '.html' ), $label . "Referenced part source parts/{$want['slug']}.html exists" );
	}
	t( 'core/template-part' === $blocks[0]['name'] && 'core/template-part' === end( $blocks )['name'], $label . 'Header first, footer last' );

	t( 1 === $count( 'create-block/dhali-breadcrumbs' ), $label . 'Exactly one Dhali Breadcrumbs block' );
	t( 1 === $count( 'core/post-content' ), $label . 'Exactly one core/post-content' );
	t( 1 === $count( 'core/heading', fn( $a ) => 1 === ( $a['level'] ?? 2 ) ), $label . 'Exactly one H1 heading block' );
	t( 1 === preg_match_all( '/<h1\b/', $html ), $label . 'Exactly one <h1> in saved markup' );
	t( 1 === $count( 'core/post-title' ) && 0 === $count( 'core/post-title', fn( $a ) => ( $a['level'] ?? 2 ) > 0 ), $label . 'One post-title rendered as <p> (level 0), not a heading' );
	t( 1 === $count( 'core/group', fn( $a ) => 'main' === ( $a['tagName'] ?? '' ) ), $label . 'One <main> group' );
	t( 0 === preg_match( '/Racers|Records|record archive|tryout|LASC|@/i', $html ), $label . 'No Page-specific copy or contact data baked into the template' );

	$bound = array_values( array_filter( $blocks, fn( $b ) => isset( $b['attrs']['metadata']['bindings'] ) ) );
	t( 2 === count( $bound ), $label . 'Exactly two bound blocks' );
	foreach ( $bound as $b ) {
		$bindings = $b['attrs']['metadata']['bindings'];
		t( array( 'content' ) === array_keys( $bindings ), $label . "{$b['name']} binds only content" );
		t( 'core/post-meta' === $bindings['content']['source'], $label . "{$b['name']} uses core/post-meta" );
		t( isset( $expect[ $b['name'] ] ) && array( 'key' => $expect[ $b['name'] ] ) === $bindings['content']['args'], $label . "{$b['name']} bound to {$expect[ $b['name'] ]}" );
	}
	t( 1 === ( $bound[0]['attrs']['level'] ?? null ), $label . 'The bound heading is the H1' );

	if ( $suite_file === $sidebar_file ) {
		// post-content and the sidebar part sit in sibling columns of one columns block.
		$cols = array_values( array_filter( $blocks, fn( $b ) => 'core/column' === $b['name'] ) );
		t( 1 === $count( 'core/columns' ) && 2 === count( $cols ), $label . 'One columns block with two columns' );
		t( '66.66%' === ( $cols[0]['attrs']['width'] ?? '' ) && '33.33%' === ( $cols[1]['attrs']['width'] ?? '' ), $label . 'Column widths 66.66% / 33.33%' );
		$names = array_column( $blocks, 'name' );
		$pc    = array_search( 'core/post-content', $names, true );
		$sp    = array_search( $sidebar_part, array_column( $blocks, 'attrs' ), true );
		t( false !== $pc && false !== $sp && $pc < $sp && $blocks[ $pc ]['depth'] === $blocks[ $sp ]['depth'], $label . 'post-content precedes the sidebar part, at the same column depth' );
		t( 1 === substr_count( $html, 'dhali-sidebar-contact-card' ) && false === strpos( $html, 'dhali-card-sidebar-contact' ), $label . 'Sidebar card appears once, only via its template part' );
	}
	}

	// --- Sidebar template part source. ---
	t( '<!-- wp:pattern {"slug":"dhali-patterns/dhali-card-sidebar-contact"} /-->' === trim( file_get_contents( $plugin_dir . '/parts/dhali-sidebar-contact-card.html' ) ), 'Sidebar part is a single reference to the card pattern' );
	t( file_exists( $plugin_dir . '/patterns/dhali-card-sidebar-contact.php' ), 'Referenced card pattern source exists' );

	// Keys match the Stage 1 metadata module.
	function register_post_meta() {}
	function user_can() {}
	require $plugin_dir . '/includes/page-banner-meta.php';
	t( array_values( $expect ) === array_keys( dhali_page_banner_meta_fields() ), 'Bound keys match the registered banner meta keys' );

	echo "PASS: {$pass} checks\n";
}
