<?php
/**
 * Standalone, read-only regression checks for includes/page-banner-meta.php.
 * Run: php tests/test_page_banner_meta.php
 *
 * Exercises the real module with minimal WordPress stubs. No WordPress
 * bootstrap, database, or network access.
 */

define( 'ABSPATH', __DIR__ . '/' );

$GLOBALS['dhali_test_hooks'] = array();
$GLOBALS['dhali_test_meta']  = array();
$GLOBALS['dhali_test_caps']  = array();
$GLOBALS['dhali_test_posts'] = array();

function add_action( $hook, $callback, $priority = 10, $accepted_args = 1 ) {
	$GLOBALS['dhali_test_hooks'][ $hook ][] = array( $callback, $priority, $accepted_args );
}
function add_filter( $hook, $callback, $priority = 10, $accepted_args = 1 ) {
	$GLOBALS['dhali_test_hooks'][ $hook ][] = array( $callback, $priority, $accepted_args );
}
function __( $text, $domain ) {
	return $text;
}
function register_post_meta( $post_type, $meta_key, $args ) {
	$GLOBALS['dhali_test_meta'][] = array( $post_type, $meta_key, $args );
	return true;
}
function user_can( $user_id, $cap, ...$args ) {
	return ! empty( $GLOBALS['dhali_test_caps'][ $user_id ][ $cap ][ $args[0] ?? 0 ] );
}
function get_post( $id ) {
	return $GLOBALS['dhali_test_posts'][ $id ] ?? null;
}
function get_the_title( $post ) {
	return $post->post_title;
}
// Real behavior is checked under WP-CLI; here we only verify the wiring.
function sanitize_text_field( $s ) {
	return 'text:' . $s;
}
function sanitize_textarea_field( $s ) {
	return 'textarea:' . $s;
}

class WP_Block {
	public $name;
	public $context;
	public function __construct( $name, $context ) {
		$this->name    = $name;
		$this->context = $context;
	}
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

require __DIR__ . '/../includes/page-banner-meta.php';

// --- Hooks: nothing runs at load time except hook registration. ---
t( empty( $GLOBALS['dhali_test_meta'] ), 'No meta registered at file load (deferred to init)' );
t( array( 'dhali_register_page_banner_meta', 10, 1 ) === $GLOBALS['dhali_test_hooks']['init'][0], 'Registration hooked to init' );
t( array( 'dhali_page_banner_headline_fallback', 10, 5 ) === $GLOBALS['dhali_test_hooks']['block_bindings_source_value'][0], 'Fallback hooked to block_bindings_source_value with 5 args' );
t( 2 === count( $GLOBALS['dhali_test_hooks'] ), 'No other hooks added' );

// --- Registration args. ---
dhali_register_page_banner_meta();
$meta = $GLOBALS['dhali_test_meta'];
t( 2 === count( $meta ), 'Exactly two meta fields registered' );
$by_key = array();
foreach ( $meta as $m ) {
	$by_key[ $m[1] ] = $m;
}
t( array( 'dhali_banner_headline', 'dhali_banner_intro' ) === array_keys( $by_key ), 'Keys are dhali_banner_headline and dhali_banner_intro' );
foreach ( $by_key as $key => $m ) {
	list( $post_type, , $args ) = $m;
	t( 'page' === $post_type, "{$key}: registered on page only" );
	t( '_' !== $key[0], "{$key}: not protected (no leading underscore)" );
	t( 'string' === $args['type'] && true === $args['single'] && '' === $args['default'], "{$key}: single string, default ''" );
	t( true === $args['show_in_rest'], "{$key}: exposed in REST" );
	t( 'dhali_page_banner_meta_auth' === $args['auth_callback'], "{$key}: auth callback set" );
	t( true === $args['revisions_enabled'], "{$key}: revisions enabled" );
	t( '' !== $args['label'], "{$key}: has a label" );
}
t( 'sanitize_text_field' === $by_key['dhali_banner_headline'][2]['sanitize_callback'], 'Headline sanitized with sanitize_text_field' );
t( 'sanitize_textarea_field' === $by_key['dhali_banner_intro'][2]['sanitize_callback'], 'Intro sanitized with sanitize_textarea_field' );
t( 'text:x' === call_user_func( $by_key['dhali_banner_headline'][2]['sanitize_callback'], 'x' ), 'Headline sanitize callback callable' );

// --- Permissions: edit_post on that specific Page. ---
$GLOBALS['dhali_test_caps'][5]['edit_post'][9] = true;
t( true === dhali_page_banner_meta_auth( false, 'dhali_banner_headline', 9, 5 ), 'Editor of page 9 may edit its meta' );
t( false === dhali_page_banner_meta_auth( true, 'dhali_banner_headline', 10, 5 ), 'Same user denied on a page they cannot edit (ignores default true)' );
t( false === dhali_page_banner_meta_auth( true, 'dhali_banner_intro', 9, 0 ), 'Logged-out user denied' );

// --- Fallback behavior. ---
$GLOBALS['dhali_test_posts'][9]  = (object) array( 'post_type' => 'page', 'post_title' => 'Records' );
$GLOBALS['dhali_test_posts'][11] = (object) array( 'post_type' => 'page', 'post_title' => '' );
$GLOBALS['dhali_test_posts'][12] = (object) array( 'post_type' => 'post', 'post_title' => 'A Post' );

$page_ctx = array( 'postId' => 9, 'postType' => 'page' );
$heading  = new WP_Block( 'core/heading', $page_ctx );
$args_h   = array( 'key' => 'dhali_banner_headline' );
$f        = 'dhali_page_banner_headline_fallback';

t( 'Racers record archive.' === $f( 'Racers record archive.', 'core/post-meta', $args_h, $heading, 'content' ), 'Filled headline unchanged' );
t( 'Records' === $f( '', 'core/post-meta', $args_h, $heading, 'content' ), 'Blank headline → Page title' );
t( 'Records' === $f( "  \t\n ", 'core/post-meta', $args_h, $heading, 'content' ), 'Whitespace-only headline → Page title' );
t( null === $f( null, 'core/post-meta', $args_h, $heading, 'content' ), 'Null (source withheld value) left null' );
t( 0 === $f( 0, 'core/post-meta', $args_h, $heading, 'content' ), 'Non-string value unchanged' );
t( ' padded ' === $f( ' padded ', 'core/post-meta', $args_h, $heading, 'content' ), 'Non-blank value returned untrimmed' );

// Scope: every non-matching dimension leaves the blank value alone.
t( '' === $f( '', 'core/post-data', $args_h, $heading, 'content' ), 'Other source unaffected' );
t( '' === $f( '', 'core/pattern-overrides', $args_h, $heading, 'content' ), 'Pattern overrides unaffected' );
t( '' === $f( '', 'core/post-meta', array( 'key' => 'dhali_banner_intro' ), $heading, 'content' ), 'Intro key unaffected' );
t( '' === $f( '', 'core/post-meta', array( 'key' => 'other_key' ), $heading, 'content' ), 'Unrelated key unaffected' );
t( '' === $f( '', 'core/post-meta', array(), $heading, 'content' ), 'Missing key arg unaffected' );
t( '' === $f( '', 'core/post-meta', $args_h, new WP_Block( 'core/paragraph', $page_ctx ), 'content' ), 'core/paragraph bound to headline key unaffected' );
t( '' === $f( '', 'core/post-meta', $args_h, new WP_Block( 'core/button', $page_ctx ), 'text' ), 'Other block unaffected' );
t( '' === $f( '', 'core/post-meta', $args_h, $heading, 'anchor' ), 'Other heading attribute unaffected' );
t( '' === $f( '', 'core/post-meta', $args_h, null, 'content' ), 'Missing block instance unaffected' );

// Context: never guess a title.
t( '' === $f( '', 'core/post-meta', $args_h, new WP_Block( 'core/heading', array() ), 'content' ), 'No context → unchanged' );
t( '' === $f( '', 'core/post-meta', $args_h, new WP_Block( 'core/heading', array( 'postId' => 9 ) ), 'content' ), 'Missing postType → unchanged' );
t( '' === $f( '', 'core/post-meta', $args_h, new WP_Block( 'core/heading', array( 'postId' => 12, 'postType' => 'post' ) ), 'content' ), 'Non-page context → unchanged' );
t( '' === $f( '', 'core/post-meta', $args_h, new WP_Block( 'core/heading', array( 'postId' => 12, 'postType' => 'page' ) ), 'content' ), 'Context claims page but post is not a page → unchanged' );
t( '' === $f( '', 'core/post-meta', $args_h, new WP_Block( 'core/heading', array( 'postId' => 999, 'postType' => 'page' ) ), 'content' ), 'Nonexistent page → unchanged' );
t( '' === $f( '', 'core/post-meta', $args_h, new WP_Block( 'core/heading', array( 'postId' => 11, 'postType' => 'page' ) ), 'content' ), 'Page with empty title → unchanged' );

echo "PASS: {$pass} checks\n";
