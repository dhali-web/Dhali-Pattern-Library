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
$expected_offset = array( 'name' => 'Dhali Offset Blue', 'slug' => 'dhali-offset-blue', 'shadow' => '16px 16px 0 0 #12648a47' );
$expected_soft   = array( 'name' => 'Dhali Soft Blue', 'slug' => 'dhali-soft-blue', 'shadow' => '0 6px 20px #123d560f' );
dhali_assert( count( $presets ) === 3, 'Both Dhali presets appended' );
dhali_assert( $presets[0] === $original[0], 'Existing shadow unchanged' );
dhali_assert( $presets[1] === $expected_offset, 'Offset blue exact name, slug and value' );
dhali_assert( $presets[2] === $expected_soft, 'Soft blue exact name, slug and value' );
$callback( $data );
dhali_assert( $data->get_data()['settings']['shadow']['presets'] === $presets, 'Repeated filter is idempotent' );

$conflicting = new DhaliFakeThemeJsonData( array( array(
	'name' => 'Theme Override', 'slug' => 'dhali-offset-blue', 'shadow' => '1px 1px 0 red',
) ) );
$callback( $conflicting );
$conflict_presets = $conflicting->get_data()['settings']['shadow']['presets'];
dhali_assert( count( $conflict_presets ) === 2, 'Collision does not duplicate preset' );
dhali_assert( $conflict_presets[0]['shadow'] === '1px 1px 0 red', 'Existing slug is not overwritten' );
dhali_assert( $conflict_presets[1] === $expected_soft, 'Non-colliding soft blue still added' );

$soft_conflicting = new DhaliFakeThemeJsonData( array( array(
	'name' => 'Theme Soft Override', 'slug' => 'dhali-soft-blue', 'shadow' => '0 0 1px green',
) ) );
$callback( $soft_conflicting );
$soft_conflict_presets = $soft_conflicting->get_data()['settings']['shadow']['presets'];
dhali_assert( count( $soft_conflict_presets ) === 2, 'Soft blue collision does not duplicate preset' );
dhali_assert( $soft_conflict_presets[0]['shadow'] === '0 0 1px green', 'Existing soft blue slug is not overwritten' );
dhali_assert( $soft_conflict_presets[1] === $expected_offset, 'Non-colliding offset blue still added' );

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
dhali_assert( count( $raw['theme'] ) === 3, 'Dhali presets appended to theme origin only' );
dhali_assert( $raw['theme'][0] === $original[0], 'Original Ollie preset preserved' );
dhali_assert( $raw['theme'][1] === $expected_offset, 'Grouped offset blue exact' );
dhali_assert( $raw['theme'][2] === $expected_soft, 'Grouped soft blue exact' );
dhali_assert( $raw['custom'] === $custom, 'Saved user custom presets preserved' );
$callback( $grouped );
dhali_assert( $grouped->get_data()['settings']['shadow']['presets'] === $raw, 'Grouped update idempotent' );

$grouped_conflict = new DhaliFakeGroupedThemeJsonData( $original, array( array(
	'name' => 'User Copy', 'slug' => 'dhali-offset-blue', 'shadow' => '2px 2px black',
) ) );
$callback( $grouped_conflict );
$grouped_conflict_raw = $grouped_conflict->get_data()['settings']['shadow']['presets'];
dhali_assert( $grouped_conflict_raw['theme'] === array( $original[0], $expected_soft ), 'User custom offset blue collision respected' );
dhali_assert( $grouped_conflict_raw['custom'][0]['shadow'] === '2px 2px black', 'User custom offset blue unchanged' );

$grouped_soft_conflict = new DhaliFakeGroupedThemeJsonData( $original, array( array(
	'name' => 'User Soft Copy', 'slug' => 'dhali-soft-blue', 'shadow' => '0 0 2px black',
) ) );
$callback( $grouped_soft_conflict );
$grouped_soft_raw = $grouped_soft_conflict->get_data()['settings']['shadow']['presets'];
dhali_assert( $grouped_soft_raw['theme'] === array( $original[0], $expected_offset ), 'User custom soft blue collision respected' );
dhali_assert( $grouped_soft_raw['custom'][0]['shadow'] === '0 0 2px black', 'User custom soft blue unchanged' );

$GLOBALS['dhali_test_has_theme_json'] = false;
$GLOBALS['dhali_test_filters'] = array();
call_user_func( $GLOBALS['dhali_test_actions']['after_setup_theme'] );
dhali_assert( ! isset( $GLOBALS['dhali_test_filters']['wp_theme_json_data_theme'] ), 'Non-block theme skipped' );

echo "PASS shared shadow presets\n";
