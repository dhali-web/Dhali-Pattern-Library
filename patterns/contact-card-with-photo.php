<?php
return array(
	'title'         => __( 'Contact Card with Photo', 'dhali' ),
	'categories'    => array( 'dhali-web-development', 'contact' ),
	'description'   => _x( 'A contact card with a top photo, business name, tagline, hours, contact info line, and social media icons.', 'Block pattern description', 'dhali' ),
	'keywords'      => array( 'contact', 'card', 'hours', 'social', 'business' ),
	'viewportWidth' => 1500,
	'blockTypes'    => array( 'core/group' ),
	'content'       => '
<!-- wp:group {"align":"full","metadata":{"name":"Contact Card with Photo","categories":["dhali-web-development","contact"],"patternName":"dhali/contact-card-with-photo"},"style":{"spacing":{"padding":{"top":"var:preset|spacing|xx-large","right":"var:preset|spacing|medium","bottom":"var:preset|spacing|xx-large","left":"var:preset|spacing|medium"},"margin":{"top":"0","bottom":"0"}}},"backgroundColor":"primary","layout":{"type":"constrained"}} -->
<div class="wp-block-group alignfull has-primary-background-color has-background" style="margin-top:0;margin-bottom:0;padding-top:var(--wp--preset--spacing--xx-large);padding-right:var(--wp--preset--spacing--medium);padding-bottom:var(--wp--preset--spacing--xx-large);padding-left:var(--wp--preset--spacing--medium)">

<!-- wp:image {"align":"full","sizeSlug":"full"} -->
<figure class="wp-block-image alignfull size-full"><img src="' . esc_url( plugin_dir_url( dirname( __FILE__ ) ) . 'assets/images/placeholder-wide-16x9.webp' ) . '" alt=""/></figure>
<!-- /wp:image -->

<!-- wp:group {"style":{"spacing":{"padding":{"top":"var:preset|spacing|medium","right":"var:preset|spacing|medium","bottom":"var:preset|spacing|medium","left":"var:preset|spacing|medium"},"margin":{"top":"-3rem"}},"border":{"radius":"var:preset|border-radius|lg"},"shadow":"var:preset|shadow|small-light"},"backgroundColor":"base","layout":{"type":"constrained"}} -->
<div class="wp-block-group has-base-background-color has-background" style="border-radius:var(--wp--preset--border-radius--lg);box-shadow:var(--wp--preset--shadow--small-light);margin-top:-3rem;padding-top:var(--wp--preset--spacing--medium);padding-right:var(--wp--preset--spacing--medium);padding-bottom:var(--wp--preset--spacing--medium);padding-left:var(--wp--preset--spacing--medium)">

<!-- wp:heading {"textAlign":"center","level":2,"style":{"typography":{"fontWeight":"700"}},"textColor":"main","fontSize":"medium"} -->
<h2 class="wp-block-heading has-text-align-center has-main-color has-text-color has-medium-font-size" style="font-weight:700">' . esc_html__( 'This is a title', 'dhali' ) . '</h2>
<!-- /wp:heading -->

<!-- wp:paragraph {"textAlign":"center","textColor":"main-accent","fontSize":"small"} -->
<p class="has-text-align-center has-main-accent-color has-text-color has-small-font-size">' . esc_html__( 'This is an example of paragraph text', 'dhali' ) . '</p>
<!-- /wp:paragraph -->

<!-- wp:separator {"className":"is-style-separator-thin"} -->
<hr class="wp-block-separator has-alpha-channel-opacity is-style-separator-thin"/>
<!-- /wp:separator -->

<!-- wp:group {"className":"is-layout-flex is-vertical wp-block-group-is-layout-flex","style":{"spacing":{"blockGap":"var:preset|spacing|small"}},"layout":{"type":"flex","orientation":"vertical","flexWrap":"nowrap"}} -->
<div class="wp-block-group is-layout-flex is-vertical wp-block-group-is-layout-flex">

<!-- wp:paragraph {"textAlign":"center"} -->
<p class="has-text-align-center"><strong>' . esc_html__( 'Open:', 'dhali' ) . '</strong> ' . esc_html__( 'This is an example of paragraph text', 'dhali' ) . '</p>
<!-- /wp:paragraph -->

<!-- wp:paragraph {"textAlign":"center"} -->
<p class="has-text-align-center"><strong>' . esc_html__( 'Closed:', 'dhali' ) . '</strong> ' . esc_html__( 'This is an example of paragraph text', 'dhali' ) . '</p>
<!-- /wp:paragraph -->

</div>
<!-- /wp:group -->

<!-- wp:paragraph {"textAlign":"center","textColor":"main-accent","fontSize":"x-small"} -->
<p class="has-text-align-center has-main-accent-color has-text-color has-x-small-font-size">' . esc_html__( 'This is an example of paragraph text', 'dhali' ) . '</p>
<!-- /wp:paragraph -->

<!-- wp:social-links {"iconColor":"main","iconColorValue":"#1E1E26","className":"is-style-logos-only","layout":{"type":"flex","justifyContent":"center"}} -->
<ul class="wp-block-social-links has-icon-color is-style-logos-only"><!-- wp:social-link {"url":"#","service":"instagram"} /-->
<!-- wp:social-link {"url":"#","service":"facebook"} /-->
<!-- wp:social-link {"url":"#","service":"twitter"} /--></ul>
<!-- /wp:social-links -->

</div>
<!-- /wp:group -->

</div>
<!-- /wp:group -->
',
);
