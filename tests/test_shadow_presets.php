<?php
/** Standalone, read-only smoke tests: php tests/test_shadow_presets.php */

define( 'ABSPATH', __DIR__ . '/' );
$GLOBALS['dhali_test_actions'] = array();
$GLOBALS['dhali_test_filters'] = array();
$GLOBALS['dhali_test_has_theme_json'] = true;

function add_action( $hook, $callback ) {
	$GLOBALS['dhali_test_actions'][ $hook ] = $callback;
}
function add_filter( $hook, $callback ) {
	$GLOBALS['dhali_test_filters'][ $hook ] = $callback;
}
function wp_theme_has_theme_json() {
	return $GLOBALS['dhali_test_has_theme_json'];
}
function __( $text, $domain ) {
	return $text;
}

class DhaliFakeThemeJsonData {
	private $data;
	public function __construct( $presets ) {
		$this->data = array(
			'version'  => 3,
			'settings' => array(
				'shadow' => array(
					'defaultPresets' => false,
					'presets'       => $presets,
				),
			),
		);
	}
	public function get_data() {
		return $this->data;
	}
	public function update_with( $new_data ) {
		$this->data['settings']['shadow']['presets'] = $new_data['settings']['shadow']['presets'];
		return $this;
	}
}

function dhali_assert( $condition, $message ) {
	if ( ! $condition ) {
		fwrite( STDERR, "FAIL: {$message}\n" );
		exit( 1 );
	}
}

require __DIR__ . '/../includes/design-presets/shadows.php';

dhali_assert( isset( $GLOBALS['dhali_test_actions']['after_setup_theme'] ), 'Setup hook registered' );
call_user_func( $GLOBALS['dhali_test_actions']['after_setup_theme'] );
dhali_assert( isset( $GLOBALS['dhali_test_filters']['wp_theme_json_data_theme'] ), 'Theme JSON filter registered' );

$callback = $GLOBALS['dhali_test_filters']['wp_theme_json_data_theme'];
$original = array( array( 'name' => 'Theme Small', 'slug' => 'small-dark', 'shadow' => '0 1px 3px black' ) );
$data     = new DhaliFakeThemeJsonData( $original );
$callback( $data );
$presets = $data->get_data()['settings']['shadow']['presets'];
dhali_assert( count( $presets ) === 2, 'New preset appended' );
dhali_assert( $presets[0] === $original[0], 'Existing shadow unchanged' );
dhali_assert( $presets[1]['slug'] === 'dhali-offset-blue', 'Expected slug' );
dhali_assert( $presets[1]['shadow'] === '16px 16px 0 0 #12648a47', 'Exact shadow value' );
$callback( $data );
dhali_assert( count( $data->get_data()['settings']['shadow']['presets'] ) === 2, 'Repeated filter is idempotent' );

$conflicting = new DhaliFakeThemeJsonData( array( array(
	'name' => 'Theme Override', 'slug' => 'dhali-offset-blue', 'shadow' => '1px 1px 0 red',
) ) );
$callback( $conflicting );
$conflict_presets = $conflicting->get_data()['settings']['shadow']['presets'];
dhali_assert( count( $conflict_presets ) === 1, 'Collision does not duplicate preset' );
dhali_assert( $conflict_presets[0]['shadow'] === '1px 1px 0 red', 'Existing slug is not overwritten' );

// WP_Theme_JSON_Data returns raw shadow presets grouped by origin. This
// regression test reproduces the structure observed in wp_get_global_settings().
class DhaliFakeGroupedThemeJsonData {
	private $data;
	public function __construct( $theme_presets, $custom_presets = array() ) {
		$this->data = array(
			'version' => 3,
			'settings' => array(
				'shadow' => array(
					'presets' => array(
						'theme' => $theme_presets,
						'custom' => $custom_presets,
					),
				),
			),
		);
	}
	public function get_data() {
		return $this->data;
	}
	public function update_with( $new_data ) {
		// Real WordPress merges a flat new theme.json preset list into the
		// internally grouped 'theme' origin; it must not receive an origin map.
		$updated = $new_data['settings']['shadow']['presets'];
		foreach ( $updated as $preset ) {
			if ( ! isset( $preset['slug'], $preset['shadow'] ) ) {
				throw new Exception( 'Non-flat preset passed to update_with()' );
			}
		}
		$this->data['settings']['shadow']['presets']['theme'] = $updated;
		return $this;
	}
}

$custom = array( array( 'name' => 'Editor Custom', 'slug' => 'shadow-1', 'shadow' => '16px 16px 9px #12648a47' ) );
$grouped = new DhaliFakeGroupedThemeJsonData( $original, $custom );
$callback( $grouped );
$raw = $grouped->get_data()['settings']['shadow']['presets'];
dhali_assert( array_keys( $raw ) === array( 'theme', 'custom' ), 'Origin-grouped shape stays intact' );
dhali_assert( count( $raw['theme'] ) === 2, 'Dhali preset appended to theme origin only' );
dhali_assert( $raw['theme'][0] === $original[0], 'Original Ollie preset preserved' );
dhali_assert( $raw['theme'][1]['slug'] === 'dhali-offset-blue', 'New preset has expected slug' );
dhali_assert( $raw['custom'] === $custom, 'Saved user custom presets preserved' );
$callback( $grouped );
dhali_assert( count( $grouped->get_data()['settings']['shadow']['presets']['theme'] ) === 2, 'Grouped update idempotent' );

$grouped_conflict = new DhaliFakeGroupedThemeJsonData( $original, array( array(
	'name' => 'User Copy', 'slug' => 'dhali-offset-blue', 'shadow' => '2px 2px black',
) ) );
$callback( $grouped_conflict );
dhali_assert( count( $grouped_conflict->get_data()['settings']['shadow']['presets']['theme'] ) === 1, 'User custom slug collision respected' );

$GLOBALS['dhali_test_has_theme_json'] = false;
$GLOBALS['dhali_test_filters'] = array();
call_user_func( $GLOBALS['dhali_test_actions']['after_setup_theme'] );
dhali_assert( ! isset( $GLOBALS['dhali_test_filters']['wp_theme_json_data_theme'] ), 'Non-block theme skipped' );

echo "PASS shared shadow presets\n";
