<?php
return array(
	'title'         => __( 'Article Card Cover with Date and Badge', 'dhali' ),
	'categories'    => array( 'dhali-web-development', 'card' ),
	'description'   => _x( 'Article card with a wide cover image, a category badge pill, an uppercase date line, a heading, and a bullet read-more link.', 'Block pattern description', 'dhali' ),
	'keywords'      => array( 'article', 'card', 'badge', 'date', 'cover' ),
	'viewportWidth' => 1500,
	'blockTypes'    => array( 'core/group' ),
	'content'       => '
<!-- wp:group {"metadata":{"name":"Article Card"},"style":{"spacing":{"padding":{"top":"var:preset|spacing|medium","right":"var:preset|spacing|medium","bottom":"var:preset|spacing|medium","left":"var:preset|spacing|medium"}},"border":{"radius":"var:preset|border-radius|lg"},"shadow":"var:preset|shadow|small-light"},"backgroundColor":"base","layout":{"type":"constrained"}} -->
<div class="wp-block-group has-base-background-color has-background" style="border-radius:var(--wp--preset--border-radius--lg);padding-top:var(--wp--preset--spacing--medium);padding-right:var(--wp--preset--spacing--medium);padding-bottom:var(--wp--preset--spacing--medium);padding-left:var(--wp--preset--spacing--medium);box-shadow:var(--wp--preset--shadow--small-light)">

<!-- wp:cover {"url":"' . esc_url( plugin_dir_url( dirname( __FILE__ ) ) . 'assets/images/placeholder-wide-16x9.webp' ) . '","dimRatio":0,"customOverlayColor":"#c8cecf","isUserOverlayColor":true,"sizeSlug":"full","contentPosition":"top left","isDark":false,"style":{"border":{"radius":"var:preset|border-radius|lg"}}} -->
<div class="wp-block-cover has-custom-content-position is-position-top-left is-light" style="border-radius:var(--wp--preset--border-radius--lg)"><span aria-hidden="true" class="wp-block-cover__background has-background-dim-0 has-background-dim" style="background-color:#c8cecf"></span><img class="wp-block-cover__image-background size-full" alt="" src="' . esc_url( plugin_dir_url( dirname( __FILE__ ) ) . 'assets/images/placeholder-wide-16x9.webp' ) . '" data-object-fit="cover"/><div class="wp-block-cover__inner-container">
<!-- wp:group {"style":{"spacing":{"margin":{"top":"1.25rem","left":"1.25rem"},"padding":{"top":"0.25rem","right":"0.75rem","bottom":"0.25rem","left":"0.75rem"}},"border":{"radius":"var:preset|border-radius|full"}},"backgroundColor":"primary-accent","layout":{"type":"constrained"}} -->
<div class="wp-block-group has-primary-accent-background-color has-background" style="margin-top:1.25rem;margin-left:1.25rem;border-radius:var(--wp--preset--border-radius--full);padding-top:0.25rem;padding-right:0.75rem;padding-bottom:0.25rem;padding-left:0.75rem"><!-- wp:paragraph {"style":{"typography":{"fontWeight":"500"}},"textColor":"main","fontSize":"x-small"} --><p class="has-main-color has-text-color has-x-small-font-size" style="font-weight:500">' . esc_html__( 'Category', 'dhali' ) . '</p><!-- /wp:paragraph --></div>
<!-- /wp:group -->
</div></div>
<!-- /wp:cover -->

<!-- wp:group {"style":{"spacing":{"padding":{"top":"var:preset|spacing|small"}}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group" style="padding-top:var(--wp--preset--spacing--small)">

<!-- wp:paragraph {"style":{"typography":{"textTransform":"uppercase","letterSpacing":"0.08em","fontWeight":"600"}},"textColor":"main-accent","fontSize":"x-small"} -->
<p class="has-main-accent-color has-text-color has-x-small-font-size" style="font-weight:600;letter-spacing:0.08em;text-transform:uppercase">' . esc_html__( 'January 1, 2025', 'dhali' ) . '</p>
<!-- /wp:paragraph -->

<!-- wp:heading {"level":3,"style":{"typography":{"fontWeight":"700","lineHeight":"1.2"}},"fontSize":"large"} -->
<h3 class="wp-block-heading has-large-font-size" style="font-weight:700;line-height:1.2">' . esc_html__( 'This is a title', 'dhali' ) . '</h3>
<!-- /wp:heading -->

<!-- wp:paragraph {"fontSize":"small"} -->
<p class="has-small-font-size">&#8226; <a href="#">' . esc_html__( 'Read more', 'dhali' ) . '</a></p>
<!-- /wp:paragraph -->

</div>
<!-- /wp:group -->

</div>
<!-- /wp:group -->
',
);
