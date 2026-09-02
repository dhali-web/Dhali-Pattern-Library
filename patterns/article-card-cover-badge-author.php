<?php
return array(
	'title'         => __( 'Article Card Cover with Badge and Author', 'dhali' ),
	'categories'    => array( 'dhali-web-development', 'card' ),
	'description'   => _x( 'A standalone article card with an edge-to-edge cover image, a category badge pill, an author byline, a heading, and an excerpt.', 'Block pattern description', 'dhali' ),
	'keywords'      => array( 'article', 'card', 'badge', 'author', 'cover', 'post' ),
	'viewportWidth' => 1500,
	'blockTypes'    => array( 'core/group' ),
	'content'       => '
<!-- wp:group {"metadata":{"name":"Article Card"},"style":{"border":{"radius":"var:preset|border-radius|lg"},"shadow":"var:preset|shadow|small-light"},"backgroundColor":"base","layout":{"type":"constrained"}} -->
<div class="wp-block-group has-base-background-color has-background" style="border-radius:var(--wp--preset--border-radius--lg);box-shadow:var(--wp--preset--shadow--small-light)">

<!-- wp:cover {"url":"' . esc_url( plugin_dir_url( dirname( __FILE__ ) ) . 'assets/images/placeholder-wide-16x9.webp' ) . '","dimRatio":0,"customOverlayColor":"#c8cecf","isUserOverlayColor":true,"minHeight":240,"sizeSlug":"full","contentPosition":"top left","isDark":false,"style":{"border":{"radius":{"topLeft":"var:preset|border-radius|lg","topRight":"var:preset|border-radius|lg","bottomLeft":"0","bottomRight":"0"}}}} -->
<div class="wp-block-cover is-light has-custom-content-position is-position-top-left" style="border-top-left-radius:var(--wp--preset--border-radius--lg);border-top-right-radius:var(--wp--preset--border-radius--lg);border-bottom-left-radius:0;border-bottom-right-radius:0;min-height:240px"><img class="wp-block-cover__image-background size-full" alt="" src="' . esc_url( plugin_dir_url( dirname( __FILE__ ) ) . 'assets/images/placeholder-wide-16x9.webp' ) . '" data-object-fit="cover"/><span aria-hidden="true" class="wp-block-cover__background has-background-dim-0 has-background-dim" style="background-color:#c8cecf"></span><div class="wp-block-cover__inner-container">
<!-- wp:group {"style":{"spacing":{"margin":{"top":"1.25rem","left":"1.25rem"},"padding":{"top":"0.25rem","right":"0.75rem","bottom":"0.25rem","left":"0.75rem"}},"border":{"radius":"var:preset|border-radius|full"}},"backgroundColor":"primary-accent","layout":{"type":"constrained"}} -->
<div class="wp-block-group has-primary-accent-background-color has-background" style="margin-top:1.25rem;margin-left:1.25rem;border-radius:var(--wp--preset--border-radius--full);padding-top:0.25rem;padding-right:0.75rem;padding-bottom:0.25rem;padding-left:0.75rem">
<!-- wp:paragraph {"style":{"typography":{"fontWeight":"500"}},"textColor":"main","fontSize":"x-small"} -->
<p class="has-main-color has-text-color has-x-small-font-size" style="font-weight:500">' . esc_html__( 'Category', 'dhali' ) . '</p>
<!-- /wp:paragraph -->
</div>
<!-- /wp:group -->
</div></div>
<!-- /wp:cover -->

<!-- wp:group {"style":{"spacing":{"padding":{"top":"var:preset|spacing|medium","right":"var:preset|spacing|medium","bottom":"var:preset|spacing|medium","left":"var:preset|spacing|medium"}}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group" style="padding-top:var(--wp--preset--spacing--medium);padding-right:var(--wp--preset--spacing--medium);padding-bottom:var(--wp--preset--spacing--medium);padding-left:var(--wp--preset--spacing--medium)">

<!-- wp:paragraph {"textColor":"main-accent","fontSize":"x-small"} -->
<p class="has-main-accent-color has-text-color has-x-small-font-size">' . esc_html__( 'By Author Name', 'dhali' ) . '</p>
<!-- /wp:paragraph -->

<!-- wp:heading {"level":3,"style":{"typography":{"fontWeight":"700","lineHeight":"1.2"}},"fontSize":"large"} -->
<h3 class="wp-block-heading has-large-font-size" style="font-weight:700;line-height:1.2">' . esc_html__( 'This is a title', 'dhali' ) . '</h3>
<!-- /wp:heading -->

<!-- wp:paragraph {"fontSize":"small"} -->
<p class="has-small-font-size">' . esc_html__( 'This is an example of paragraph text', 'dhali' ) . '</p>
<!-- /wp:paragraph -->

</div>
<!-- /wp:group -->

</div>
<!-- /wp:group -->
',
);
