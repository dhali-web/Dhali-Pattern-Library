<?php
/**
 * Interior Page banner metadata.
 *
 * Registers two Page meta fields that the Interior Page template binds to with
 * native Block Bindings (core/post-meta):
 *
 *   dhali_banner_headline → banner H1 (core/heading content)
 *   dhali_banner_intro    → banner introduction (core/paragraph content)
 *
 * Also provides one narrowly scoped server-side fallback: when the headline is
 * blank, the bound banner heading renders the Page title instead of an empty
 * <h1>. No other binding, key, attribute or block is affected.
 *
 * No database writes occur here.
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Registered banner meta keys and their field definitions.
 *
 * Keys are deliberately not prefixed with "_": protected meta is never
 * returned by the core/post-meta binding source.
 *
 * @return array<string, array{label: string, description: string, sanitize: callable}>
 */
function dhali_page_banner_meta_fields() {
	return array(
		'dhali_banner_headline' => array(
			'label'       => __( 'Banner headline', 'Dhali-Pattern-Library' ),
			'description' => __( 'Marketing headline shown as the Interior Page banner H1. Falls back to the Page title when blank.', 'Dhali-Pattern-Library' ),
			'sanitize'    => 'sanitize_text_field',
		),
		'dhali_banner_intro'    => array(
			'label'       => __( 'Banner introduction', 'Dhali-Pattern-Library' ),
			'description' => __( 'Short introduction shown below the Interior Page banner headline.', 'Dhali-Pattern-Library' ),
			'sanitize'    => 'sanitize_textarea_field',
		),
	);
}

/**
 * Only users who can edit the specific Page may change its banner meta.
 *
 * @param bool   $allowed   Default permission.
 * @param string $meta_key  Meta key.
 * @param int    $object_id Page ID.
 * @param int    $user_id   User ID.
 * @return bool
 */
function dhali_page_banner_meta_auth( $allowed, $meta_key, $object_id, $user_id ) {
	return (bool) user_can( $user_id, 'edit_post', $object_id );
}

/**
 * Register the banner meta fields on the Page post type.
 */
function dhali_register_page_banner_meta() {
	foreach ( dhali_page_banner_meta_fields() as $meta_key => $field ) {
		register_post_meta(
			'page',
			$meta_key,
			array(
				'type'              => 'string',
				'label'             => $field['label'],
				'description'       => $field['description'],
				'single'            => true,
				'default'           => '',
				'show_in_rest'      => true,
				'sanitize_callback' => $field['sanitize'],
				'auth_callback'     => 'dhali_page_banner_meta_auth',
				'revisions_enabled' => true,
			)
		);
	}
}
add_action( 'init', 'dhali_register_page_banner_meta' );

/**
 * Fall back to the Page title when the bound banner headline is blank.
 *
 * Applies only when all of these match: source core/post-meta, key
 * dhali_banner_headline, attribute content, block core/heading, and a Page
 * postId in the block's context. A null value (source denied access) is left
 * untouched so the fallback can never expose a title the source withheld.
 *
 * @param mixed    $value          Value computed by the binding source.
 * @param string   $source_name    Binding source name.
 * @param array    $source_args    Binding source arguments.
 * @param WP_Block $block_instance Bound block.
 * @param string   $attribute_name Bound attribute.
 * @return mixed
 */
function dhali_page_banner_headline_fallback( $value, $source_name, $source_args, $block_instance, $attribute_name ) {
	if ( 'core/post-meta' !== $source_name
		|| ! is_array( $source_args )
		|| ! isset( $source_args['key'] )
		|| 'dhali_banner_headline' !== $source_args['key']
		|| 'content' !== $attribute_name
		|| ! is_object( $block_instance )
		|| ! isset( $block_instance->name )
		|| 'core/heading' !== $block_instance->name
	) {
		return $value;
	}

	// Only blank strings count as missing; null and non-strings pass through.
	if ( ! is_string( $value ) || '' !== trim( $value ) ) {
		return $value;
	}

	$context = isset( $block_instance->context ) && is_array( $block_instance->context ) ? $block_instance->context : array();
	if ( empty( $context['postId'] ) || ! isset( $context['postType'] ) || 'page' !== $context['postType'] ) {
		return $value;
	}

	$page = get_post( (int) $context['postId'] );
	if ( ! $page || 'page' !== $page->post_type ) {
		return $value;
	}

	$title = get_the_title( $page );

	return ( is_string( $title ) && '' !== trim( $title ) ) ? $title : $value;
}
add_filter( 'block_bindings_source_value', 'dhali_page_banner_headline_fallback', 10, 5 );
