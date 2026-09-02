<?php
return array(
	'title'         => __( 'Article Card with Badge', 'dhali' ),
	'categories'    => array( 'dhali-web-development', 'card' ),
	'description'   => _x( 'A static article card with a full-width image area, category badge overlay, date, heading, and text link CTA.', 'Block pattern description', 'dhali' ),
	'keywords'      => array( 'article', 'card', 'blog', 'badge', 'post' ),
	'viewportWidth' => 1500,
	'blockTypes'    => array( 'core/group' ),
	'content'       => '
<!-- wp:group {"align":"full","style":{"spacing":{"padding":{"top":"var:preset|spacing|xx-large","right":"var:preset|spacing|medium","bottom":"var:preset|spacing|xx-large","left":"var:preset|spacing|medium"},"margin":{"top":"0","bottom":"0"}}},"backgroundColor":"secondary","layout":{"type":"constrained"}} -->
<div class="wp-block-group alignfull has-secondary-background-color has-background" style="margin-top:0;margin-bottom:0;padding-top:var(--wp--preset--spacing--xx-large);padding-right:var(--wp--preset--spacing--medium);padding-bottom:var(--wp--preset--spacing--xx-large);padding-left:var(--wp--preset--spacing--medium)">

<!-- wp:group {"style":{"border":{"radius":"var:preset|border-radius|lg"},"shadow":"var:preset|shadow|small-light"},"backgroundColor":"base","layout":{"type":"constrained"}} -->
<div class="wp-block-group has-base-background-color has-background" style="border-radius:var(--wp--preset--border-radius--lg);box-shadow:var(--wp--preset--shadow--small-light)">

<!-- wp:group {"style":{"dimensions":{"minHeight":"240px"},"background":{"backgroundImage":{"url":"' . esc_url( plugin_dir_url( dirname( __FILE__ ) ) . 'assets/images/placeholder-wide-16x9.webp' ) . '","source":"url"},"backgroundSize":"cover","backgroundPosition":"center"},"border":{"radius":{"topLeft":"var:preset|border-radius|lg","topRight":"var:preset|border-radius|lg","bottomLeft":"0","bottomRight":"0"}}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group" style="min-height:240px;border-top-left-radius:var(--wp--preset--border-radius--lg);border-top-right-radius:var(--wp--preset--border-radius--lg);border-bottom-left-radius:0;border-bottom-right-radius:0">
<!-- wp:group {"style":{"spacing":{"margin":{"top":"1.25rem","left":"1.25rem"},"padding":{"top":"0.25rem","right":"0.75rem","bottom":"0.25rem","left":"0.75rem"}},"border":{"radius":"var:preset|border-radius|full"}},"backgroundColor":"primary-accent","layout":{"type":"constrained"}} -->
<div class="wp-block-group has-primary-accent-background-color has-background" style="margin-top:1.25rem;margin-left:1.25rem;border-radius:var(--wp--preset--border-radius--full);padding-top:0.25rem;padding-right:0.75rem;padding-bottom:0.25rem;padding-left:0.75rem">
<!-- wp:paragraph {"style":{"typography":{"fontWeight":"500"}},"textColor":"main","fontSize":"x-small"} -->
<p class="has-main-color has-text-color has-x-small-font-size" style="font-weight:500">' . esc_html__( 'Category', 'dhali' ) . '</p>
<!-- /wp:paragraph -->
</div>
<!-- /wp:group -->
</div>
<!-- /wp:group -->

<!-- wp:group {"style":{"spacing":{"padding":{"top":"var:preset|spacing|medium","right":"var:preset|spacing|medium","bottom":"var:preset|spacing|medium","left":"var:preset|spacing|medium"}}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group" style="padding-top:var(--wp--preset--spacing--medium);padding-right:var(--wp--preset--spacing--medium);padding-bottom:var(--wp--preset--spacing--medium);padding-left:var(--wp--preset--spacing--medium)">

<!-- wp:paragraph {"style":{"typography":{"textTransform":"uppercase","letterSpacing":"0.05em"}},"textColor":"main-accent","fontSize":"x-small"} -->
<p class="has-main-accent-color has-text-color has-x-small-font-size" style="text-transform:uppercase;letter-spacing:0.05em">' . esc_html__( 'January 1, 2025', 'dhali' ) . '</p>
<!-- /wp:paragraph -->

<!-- wp:heading {"level":2,"textColor":"main","fontSize":"large"} -->
<h2 class="wp-block-heading has-main-color has-text-color has-large-font-size">' . esc_html__( 'This is a title', 'dhali' ) . '</h2>
<!-- /wp:heading -->

<!-- wp:paragraph {"fontSize":"small"} -->
<p class="has-small-font-size">&#x2022; <a href="#">' . esc_html__( 'Learn more', 'dhali' ) . '</a></p>
<!-- /wp:paragraph -->

</div>
<!-- /wp:group -->

</div>
<!-- /wp:group -->

</div>
<!-- /wp:group -->
',
);
