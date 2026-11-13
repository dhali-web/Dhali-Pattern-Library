<?php
/**
 * Standalone, read-only template-type regression checks.
 * Run: php tests/test_template_registration.php
 *
 * Exercise the real plugin callbacks with minimal WordPress stubs. This test
 * does not bootstrap a WordPress database or write any WordPress records.
 */

define( 'ABSPATH', __DIR__ . '/' );
$GLOBALS['dhali_test_filters'] = array();

function add_action( $hook, $callback, $priority = 10, $accepted_args = 1 ) {}
function add_filter( $hook, $callback, $priority = 10, $accepted_args = 1 ) {
	$GLOBALS['dhali_test_filters'][ $hook ][] = $callback;
}
function plugin_basename( $file ) {
	return basename( $file );
}
function get_file_data( $file, $headers ) {
	// Prevent the updater from installing network-related hooks.
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
class WP_Block_Template {}

function dhali_template_test_assert( $condition, $message ) {
	if ( ! $condition ) {
		fwrite( STDERR, "FAIL: {$message}\n" );
		exit( 1 );
	}
}

require __DIR__ . '/../dhali-pattern-library.php';

$queries = $GLOBALS['dhali_test_filters']['get_block_templates'];
$files   = $GLOBALS['dhali_test_filters']['get_block_file_template'];
dhali_template_test_assert( in_array( 'dhali_register_block_templates', $queries, true ), 'Plugin template list filter registered' );
dhali_template_test_assert( in_array( 'dhali_get_block_template', $files, true ), 'Plugin single template filter registered' );

// Existing template-part sources and results must not be changed by the
// full-page template provider, regardless of a coincident slug.
$existing_part = new WP_Block_Template();
$existing_part->slug = 'single';
$part_results = array( $existing_part );
foreach ( array( 'wp_template_part', 'other' ) as $type ) {
	$result = dhali_register_block_templates( $part_results, array(), $type );
	dhali_template_test_assert( $result === $part_results, "List lookup of type {$type} unchanged" );
	dhali_template_test_assert( dhali_get_block_template( null, 'test-theme//single', $type ) === null, "Single lookup of type {$type} unchanged" );
	dhali_template_test_assert( dhali_get_block_template( $existing_part, 'test-theme//single', $type ) === $existing_part, "Existing object of type {$type} preserved" );
}

// Full-page templates should still be registered normally.
$results = dhali_register_block_templates( array(), array( 'slug__in' => array( 'single' ) ), 'wp_template' );
dhali_template_test_assert( count( $results ) === 1, 'Requested single template returned once' );
dhali_template_test_assert( $results[0]->slug === 'single', 'Requested slug returned' );
dhali_template_test_assert( $results[0]->type === 'wp_template', 'Returned template type is wp_template' );
dhali_template_test_assert( $results[0]->source === 'plugin', 'Template source is plugin' );
dhali_template_test_assert( trim( $results[0]->content ) !== '', 'Template content is present' );

$all = dhali_register_block_templates( array(), array(), 'wp_template' );
dhali_template_test_assert( count( $all ) === 2, 'Both existing plugin templates returned' );

// WordPress/theme-provided content takes precedence and unrelated slugs do not leak.
$existing = new WP_Block_Template();
$existing->slug = 'single';
$existing->source = 'theme';
$merged = dhali_register_block_templates( array( $existing ), array( 'slug__in' => array( 'single', 'single-flex' ) ), 'wp_template' );
dhali_template_test_assert( count( $merged ) === 2, 'Only missing requested template appended' );
dhali_template_test_assert( $merged[0] === $existing, 'Existing template is not overwritten' );
dhali_template_test_assert( $merged[1]->slug === 'single-flex', 'Other requested template appended' );
dhali_template_test_assert( dhali_register_block_templates( array(), array( 'slug__in' => array( 'nonexistent' ) ), 'wp_template' ) === array(), 'Unrequested template excluded' );

$one = dhali_get_block_template( null, 'test-theme//single', 'wp_template' );
dhali_template_test_assert( $one instanceof WP_Block_Template, 'Direct template lookup returns an object' );
dhali_template_test_assert( $one->type === 'wp_template', 'Direct lookup has correct type' );
dhali_template_test_assert( $one->slug === 'single', 'Direct lookup has correct slug' );
dhali_template_test_assert( dhali_get_block_template( $existing, 'test-theme//single', 'wp_template' ) === $existing, 'Direct lookup respects existing result' );
dhali_template_test_assert( dhali_get_block_template( null, 'bad-format', 'wp_template' ) === null, 'Malformed ID ignored' );
dhali_template_test_assert( dhali_get_block_template( null, 'test-theme//not-present', 'wp_template' ) === null, 'Missing template ignored' );

// The pre-existing plugin template-part callbacks retain their authority.
$parts = dhali_pattern_library_get_parts( array(), array(), 'wp_template_part' );
dhali_template_test_assert( count( $parts ) === 4, 'Provider exposes the three header/footer parts plus the sidebar part' );
foreach ( $parts as $part ) {
	dhali_template_test_assert( $part->type === 'wp_template_part', 'Plugin part type remains unchanged' );
}

// Sidebar prefix maps to the sidebar area; other names stay ignored.
dhali_template_test_assert( dhali_pattern_library_part_area( 'dhali-sidebar-contact-card' ) === 'sidebar', 'dhali-sidebar-* maps to sidebar area' );
dhali_template_test_assert( dhali_pattern_library_part_area( 'dhali-header-x' ) === 'header' && dhali_pattern_library_part_area( 'dhali-footer-x' ) === 'footer', 'Header/footer mapping unchanged' );
foreach ( array( 'sidebar', 'dhali-sidebar-', 'dhali-sidebar-Bad', 'dhali-aside-x', 'dhali-sidebar_x' ) as $bad_slug ) {
	dhali_template_test_assert( dhali_pattern_library_part_area( $bad_slug ) === null, "Slug {$bad_slug} ignored" );
}
$sidebar_parts = dhali_pattern_library_get_parts( array(), array( 'area' => 'sidebar' ), 'wp_template_part' );
dhali_template_test_assert( count( $sidebar_parts ) === 1 && $sidebar_parts[0]->slug === 'dhali-sidebar-contact-card', 'Area query returns only the sidebar part' );
dhali_template_test_assert( $sidebar_parts[0]->area === 'sidebar' && $sidebar_parts[0]->id === 'test-theme//dhali-sidebar-contact-card', 'Sidebar part identity and area' );
dhali_template_test_assert( trim( $sidebar_parts[0]->content ) === '<!-- wp:pattern {"slug":"dhali-patterns/dhali-card-sidebar-contact"} /-->', 'Sidebar part content is a single card pattern reference' );
dhali_template_test_assert( count( dhali_pattern_library_get_parts( array(), array( 'area' => 'header' ), 'wp_template_part' ) ) === 2, 'Header area query unaffected by sidebar part' );
$saved_sidebar = new WP_Block_Template();
$saved_sidebar->slug = 'dhali-sidebar-contact-card';
$with_saved = dhali_pattern_library_get_parts( array( $saved_sidebar ), array( 'slug__in' => array( 'dhali-sidebar-contact-card' ) ), 'wp_template_part' );
dhali_template_test_assert( $with_saved === array( $saved_sidebar ), 'Saved/database sidebar part takes precedence over the file' );
dhali_template_test_assert( dhali_pattern_library_get_part_file( null, 'test-theme//dhali-sidebar-contact-card', 'wp_template_part' )->area === 'sidebar', 'Direct sidebar part lookup' );
dhali_template_test_assert( dhali_pattern_library_get_part_file( null, 'test-theme//dhali-sidebar-contact-card', 'wp_template' ) === null, 'Sidebar part never served as a wp_template' );
dhali_template_test_assert( dhali_register_block_templates( array(), array( 'slug__in' => array( 'dhali-sidebar-contact-card' ) ), 'wp_template' ) === array(), 'Full-template provider does not see the sidebar part' );
$parts_after_template_provider = dhali_register_block_templates( $parts, array(), 'wp_template_part' );
dhali_template_test_assert( $parts_after_template_provider === $parts, 'Full-page provider never alters part query' );

echo "PASS template type isolation and precedence\n";
