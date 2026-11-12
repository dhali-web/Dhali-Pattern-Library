<?php
/**
 * Optional Dhali → Ollie Class Manager integration.
 *
 * Nothing here writes to WordPress options on a normal request. The portable
 * fallback is always available; an administrator explicitly imports and
 * activates classes through WP-CLI after verifying the target environment.
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

require_once __DIR__ . '/registry.php';

/** Read the canonical, Ollie-ready declarations for a registered class. */
function dhali_ollie_css_source( $class_name ) {
	$registry = dhali_ollie_css_registry();
	if ( ! isset( $registry[ $class_name ] ) ) {
		return false;
	}

	$path = dirname( __DIR__, 2 ) . '/' . $registry[ $class_name ]['file'];
	if ( ! is_readable( $path ) ) {
		return false;
	}

	$css = file_get_contents( $path );
	return is_string( $css ) && '' !== trim( $css ) ? trim( $css ) : false;
}

/** Ollie internals are optional, version-specific, and must be present. */
function dhali_ollie_css_vendor_available() {
	return function_exists( '\\olpo\\Extensions\\ClassManager\\sanitize_css' )
		&& function_exists( '\\olpo\\Extensions\\ClassManager\\save_css_class' );
}

/**
 * Active ownership requires an explicit Dhali opt-in and reliable Ollie
 * output on every page. Otherwise retain the plugin-provided class CSS.
 */
function dhali_ollie_css_is_managed( $class_name, $record, $ownership, $vendor_available ) {
	if (
		! $vendor_available ||
		! isset( $ownership[ $class_name ]['active'] ) ||
		true !== $ownership[ $class_name ]['active'] ||
		! is_array( $record ) ||
		! isset( $record['loadGlobal'] ) ||
		true !== $record['loadGlobal'] ||
		! isset( $record['css'] ) ||
		! is_string( $record['css'] ) ||
		'' === trim( $record['css'] )
	) {
		return false;
	}

	// Ollie also sanitizes on output; a rejected record must not turn off fallback.
	$sanitizer = '\\olpo\\Extensions\\ClassManager\\sanitize_css';
	return is_callable( $sanitizer ) && '' !== $sanitizer( $record['css'] );
}

/**
 * Render only unmanaged classes from the version-controlled fragments.
 * Editor-only caption specificity rule remains with the caption fallback.
 */
function dhali_ollie_css_build_fallback( $records, $ownership, $vendor_available ) {
	$css = '';
	foreach ( dhali_ollie_css_registry() as $class_name => $definition ) {
		$source = dhali_ollie_css_source( $class_name );
		if ( false === $source ) {
			continue;
		}

		$record = isset( $records[ $class_name ] ) ? $records[ $class_name ] : null;
		if ( dhali_ollie_css_is_managed( $class_name, $record, $ownership, $vendor_available ) ) {
			continue;
		}

		$css .= '.' . $class_name . " {\n" . $source . "\n}\n";
		if ( 'dhali-media-text-photo-caption' === $class_name ) {
			// Core's editor wrapper selector outranks the normal caption rule.
			$css .= ".dhali-media-text-photo-caption.block-editor-block-list__block {\n\tposition: absolute;\n}\n";
		}
	}
	return $css;
}

/** Load fallback rules in frontend and block editor content iframe. */
function dhali_ollie_css_enqueue_fallback() {
	$records   = get_option( 'ollie_pro_css_classes', array() );
	$ownership = get_option( 'dhali_ollie_css_ownership', array() );
	$css       = dhali_ollie_css_build_fallback(
		is_array( $records ) ? $records : array(),
		is_array( $ownership ) ? $ownership : array(),
		dhali_ollie_css_vendor_available()
	);

	if ( '' === $css ) {
		return;
	}

	wp_register_style( 'dhali-ollie-css-fallback', false, array(), '1.0.0' );
	wp_enqueue_style( 'dhali-ollie-css-fallback' );
	wp_add_inline_style( 'dhali-ollie-css-fallback', $css );
}
add_action( 'enqueue_block_assets', 'dhali_ollie_css_enqueue_fallback' );

/** Read-only classification for CLI planning and tests. */
function dhali_ollie_css_classify( $class_name, $records, $metadata ) {
	if ( ! array_key_exists( $class_name, $records ) ) {
		return 'missing';
	}

	$record = $records[ $class_name ];
	$fields = array( 'css', 'hoverCss', 'focusCss', 'activeCss', 'disabledCss' );
	$empty  = true;
	foreach ( $fields as $field ) {
		$value = is_array( $record ) ? ( isset( $record[ $field ] ) ? $record[ $field ] : '' ) : ( 'css' === $field ? $record : '' );
		if ( ! is_string( $value ) || '' !== trim( $value ) ) {
			$empty = false;
			break;
		}
	}
	if ( $empty ) {
		return 'empty';
	}

	$current_css = is_array( $record ) ? ( isset( $record['css'] ) ? $record['css'] : '' ) : $record;
	$source      = dhali_ollie_css_source( $class_name );
	if ( is_string( $source ) && is_string( $current_css ) && trim( $current_css ) === $source ) {
		return 'current';
	}

	if ( isset( $metadata[ $class_name ]['import_hash'] ) ) {
		return 'edited';
	}
	return 'customized';
}

/**
 * WP-CLI entry point. Import and ownership are always explicitly requested.
 * No importer runs during plugin load or on a website request.
 */
if ( defined( 'WP_CLI' ) && WP_CLI && class_exists( 'WP_CLI' ) ) {
	class Dhali_Ollie_CSS_Command {
		/**
		 * Inspect or import approved CSS classes.
		 *
		 * ## OPTIONS
		 * [--class=<name>]
		 * : Restrict to one registered class.
		 * [--dry-run]
		 * : Explicit read-only preview (also the default when --apply is absent).
		 * [--apply]
		 * : Explicitly perform the import; without this flag, dry-run only.
		 *
		 * ## EXAMPLES
		 *     wp dhali ollie-css import
		 *     wp dhali ollie-css import --class=dhali-media-text-photo-frame
		 *     wp dhali ollie-css import --apply --user=admin
		 */
		public function import( $args, $assoc_args ) {
			$registry = dhali_ollie_css_registry();
			if ( isset( $assoc_args['class'] ) ) {
				$name = $assoc_args['class'];
				if ( ! isset( $registry[ $name ] ) ) {
					\WP_CLI::error( 'Class is not in Dhali Ollie CSS registry.' );
				}
				$registry = array( $name => $registry[ $name ] );
			}

			if ( isset( $assoc_args['dry-run'], $assoc_args['apply'] ) ) {
				\WP_CLI::error( '--dry-run and --apply are mutually exclusive.' );
			}
			$apply   = isset( $assoc_args['apply'] );
			$records = get_option( 'ollie_pro_css_classes', array() );
			$records = is_array( $records ) ? $records : array();
			$meta    = get_option( 'dhali_ollie_css_imports', array() );
			$meta    = is_array( $meta ) ? $meta : array();

			if ( $apply ) {
				$this->require_vendor_editor();
			}

			foreach ( $registry as $name => $definition ) {
				$state  = dhali_ollie_css_classify( $name, $records, $meta );
				$source = dhali_ollie_css_source( $name );
				if ( false === $source ) {
					\WP_CLI::warning( "{$name}: source file missing or empty" );
					continue;
				}

				\WP_CLI::log( sprintf( '%s: %s%s', $name, $state, $apply ? ' (apply requested)' : ' (dry run)' ) );
				if ( ! $apply || ! in_array( $state, array( 'missing', 'empty' ), true ) ) {
					continue;
				}

				// Re-read immediately before writing to avoid overwriting another edit.
				$latest = get_option( 'ollie_pro_css_classes', array() );
				$latest = is_array( $latest ) ? $latest : array();
				if ( ! in_array( dhali_ollie_css_classify( $name, $latest, $meta ), array( 'missing', 'empty' ), true ) ) {
					\WP_CLI::warning( "{$name}: changed since preview; skipped" );
					continue;
				}

				$request = new \WP_REST_Request( 'POST', '/ollie-pro/v1/css-classes' );
				$request->set_body_params( array(
					'className'   => $name,
					'css'         => $source,
					'hoverCss'    => '',
					'focusCss'    => '',
					'activeCss'   => '',
					'disabledCss' => '',
					'loadGlobal'  => true,
				) );
				$response = rest_do_request( $request );
				if ( is_wp_error( $response ) || $response->is_error() ) {
					\WP_CLI::warning( "{$name}: Ollie REST import failed" );
					continue;
				}

				$saved = get_option( 'ollie_pro_css_classes', array() );
				$got   = is_array( $saved ) && isset( $saved[ $name ] ) ? $saved[ $name ] : array();
				if ( ! is_array( $got ) || ! isset( $got['css'], $got['loadGlobal'] ) || ! is_string( $got['css'] ) || trim( $got['css'] ) !== $source || true !== $got['loadGlobal'] ) {
					\WP_CLI::warning( "{$name}: Ollie readback differs; ownership NOT activated" );
					continue;
				}

				$meta[ $name ] = array(
					'import_hash' => hash( 'sha256', $source ),
				);
				update_option( 'dhali_ollie_css_imports', $meta, false );
				// The imported class already loads globally through Ollie. Before
				// activation, the plugin also supplies identical baseline rules.
				// Thus import is a CSS-affecting WordPress write even while the
				// plugin fallback remains enabled.
				\WP_CLI::success( "{$name}: imported globally; plugin fallback remains until separately activated" );
			}
		}

		/**
		 * Activate one previously imported, globally loaded class.
		 *
		 * ## OPTIONS
		 * --class=<name>
		 * : An approved Dhali class name.
		 * [--apply]
		 * : Confirm the ownership change.
		 */
		public function activate( $args, $assoc_args ) {
			$this->set_ownership( $assoc_args, true );
		}

		/**
		 * Deactivate one managed class and enqueue the plugin fallback again.
		 *
		 * This does not remove the Ollie record: it can still affect associated
		 * blocks or globally loaded pages. Rollback of that record is separate.
		 *
		 * ## OPTIONS
		 * --class=<name>
		 * : An approved Dhali class name.
		 * [--apply]
		 * : Confirm the ownership change.
		 */
		public function deactivate( $args, $assoc_args ) {
			$this->set_ownership( $assoc_args, false );
		}

		private function set_ownership( $assoc_args, $active ) {
			$this->require_admin();
			if ( $active && ! dhali_ollie_css_vendor_available() ) {
				\WP_CLI::error( 'Ollie Class Manager unavailable; activation refused.' );
			}
			if ( ! isset( $assoc_args['apply'], $assoc_args['class'] ) ) {
				\WP_CLI::error( 'Require both --class=<name> and --apply; no changes made.' );
			}
			$name = $assoc_args['class'];
			if ( ! isset( dhali_ollie_css_registry()[ $name ] ) ) {
				\WP_CLI::error( 'Class is not registered.' );
			}
			$meta    = get_option( 'dhali_ollie_css_imports', array() );
			$records = get_option( 'ollie_pro_css_classes', array() );
			if ( ! isset( $meta[ $name ]['import_hash'] ) ) {
				\WP_CLI::error( 'Class has not been imported by Dhali; refusing ownership.' );
			}
			if ( $active && ! dhali_ollie_css_is_managed( $name, $records[ $name ] ?? null, array( $name => array( 'active' => true ) ), true ) ) {
				\WP_CLI::error( 'Ollie class must have safe nonempty CSS and loadGlobal=true.' );
			}
			$ownership = get_option( 'dhali_ollie_css_ownership', array() );
			$ownership = is_array( $ownership ) ? $ownership : array();
			$ownership[ $name ] = array( 'active' => $active );
			update_option( 'dhali_ollie_css_ownership', $ownership, false );
			\WP_CLI::success( $name . ( $active ? ': Ollie now owns class CSS' : ': plugin fallback enabled; Ollie record is retained' ) );
		}

		private function require_admin() {
			if ( ! current_user_can( 'edit_theme_options' ) ) {
				\WP_CLI::error( 'Choose an authorized user with --user=<admin>; no changes made.' );
			}
		}

		private function require_vendor_editor() {
			$this->require_admin();
			if ( ! dhali_ollie_css_vendor_available() ) {
				\WP_CLI::error( 'Ollie Class Manager is unavailable; no changes made.' );
			}
		}
	}

	\WP_CLI::add_command( 'dhali ollie-css', 'Dhali_Ollie_CSS_Command' );
}
