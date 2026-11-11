<?php
/**
 * Explicit, portable Dhali classes supported by Ollie Pro's Class Manager.
 *
 * Each file contains declarations that Ollie can place inside its Base CSS
 * editor, including native CSS nesting. No stylesheet discovery or parser.
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

function dhali_ollie_css_registry() {
	return array(
		'dhali-media-text-photo-frame'   => array(
			'file' => 'assets/css/ollie-classes/dhali-media-text-photo-frame.css',
		),
		'dhali-media-text-photo-caption' => array(
			'file' => 'assets/css/ollie-classes/dhali-media-text-photo-caption.css',
		),
	);
}
