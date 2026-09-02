<?php
return array(
	'title'         => __( 'Testimonial: Single Card with Avatar', 'dhali' ),
	'categories'    => array( 'dhali-web-development', 'testimonial' ),
	'description'   => _x( 'A single centered testimonial card with a circular avatar, quote badge, centered quote text, and name with role.', 'Block pattern description', 'dhali' ),
	'keywords'      => array( 'testimonial', 'quote', 'review', 'avatar', 'customer' ),
	'viewportWidth' => 1500,
	'blockTypes'    => array( 'core/group' ),
	'content'       => '
<!-- wp:group {"align":"full","metadata":{"name":"Testimonial: Single Card with Avatar","categories":["dhali-web-development","testimonial"],"patternName":"dhali/testimonial-card-avatar-quote"},"style":{"spacing":{"padding":{"top":"var:preset|spacing|xxx-large","right":"var:preset|spacing|medium","bottom":"var:preset|spacing|xxx-large","left":"var:preset|spacing|medium"},"margin":{"top":"0","bottom":"0"}}},"backgroundColor":"tertiary","layout":{"type":"constrained","contentSize":"480px"}} -->
<div class="wp-block-group alignfull has-tertiary-background-color has-background" style="margin-top:0;margin-bottom:0;padding-top:var(--wp--preset--spacing--xxx-large);padding-right:var(--wp--preset--spacing--medium);padding-bottom:var(--wp--preset--spacing--xxx-large);padding-left:var(--wp--preset--spacing--medium)">

<!-- wp:group {"style":{"spacing":{"padding":{"top":"var:preset|spacing|x-large","right":"var:preset|spacing|x-large","bottom":"var:preset|spacing|x-large","left":"var:preset|spacing|x-large"},"blockGap":"var:preset|spacing|large"},"border":{"radius":"var:preset|border-radius|xl"},"shadow":"var:preset|shadow|medium-light"},"backgroundColor":"base","layout":{"type":"constrained"}} -->
<div class="wp-block-group has-base-background-color has-background" style="border-radius:var(--wp--preset--border-radius--xl);box-shadow:var(--wp--preset--shadow--medium-light);padding-top:var(--wp--preset--spacing--x-large);padding-right:var(--wp--preset--spacing--x-large);padding-bottom:var(--wp--preset--spacing--x-large);padding-left:var(--wp--preset--spacing--x-large)">

<!-- wp:group {"className":"is-layout-flex is-vertical wp-block-group-is-layout-flex","style":{"spacing":{"blockGap":"0"}},"layout":{"type":"flex","orientation":"vertical","flexWrap":"nowrap","justifyContent":"center"}} -->
<div class="wp-block-group is-layout-flex is-vertical wp-block-group-is-layout-flex">

<!-- wp:image {"align":"center","width":90,"height":90,"sizeSlug":"full","className":"is-style-rounded-full"} -->
<figure class="wp-block-image aligncenter size-full is-resized is-style-rounded-full"><img src="' . esc_url( plugin_dir_url( dirname( __FILE__ ) ) . 'assets/images/avatar-placeholder.webp' ) . '" alt="" style="width:90px;height:90px"/></figure>
<!-- /wp:image -->

<!-- wp:group {"className":"is-layout-flex is-horizontal wp-block-group-is-layout-flex","style":{"spacing":{"blockGap":"0"}},"layout":{"type":"flex","orientation":"horizontal","flexWrap":"nowrap","justifyContent":"center"}} -->
<div class="wp-block-group is-layout-flex is-horizontal wp-block-group-is-layout-flex">

<!-- wp:group {"style":{"spacing":{"padding":{"top":"var:preset|spacing|small","right":"var:preset|spacing|medium","bottom":"var:preset|spacing|small","left":"var:preset|spacing|medium"},"margin":{"top":"-0.75rem"}},"border":{"radius":"var:preset|border-radius|full"}},"backgroundColor":"primary","layout":{"type":"constrained"}} -->
<div class="wp-block-group has-primary-background-color has-background" style="border-radius:var(--wp--preset--border-radius--full);margin-top:-0.75rem;padding-top:var(--wp--preset--spacing--small);padding-right:var(--wp--preset--spacing--medium);padding-bottom:var(--wp--preset--spacing--small);padding-left:var(--wp--preset--spacing--medium)">
<!-- wp:paragraph {"textAlign":"center","textColor":"base","fontSize":"small","style":{"typography":{"fontWeight":"700","lineHeight":"1"}}} -->
<p class="has-text-align-center has-base-color has-text-color has-small-font-size" style="font-weight:700;line-height:1">❝</p>
<!-- /wp:paragraph -->
</div>
<!-- /wp:group -->

</div>
<!-- /wp:group -->

</div>
<!-- /wp:group -->

<!-- wp:paragraph {"textAlign":"center","textColor":"main","fontSize":"medium","style":{"typography":{"lineHeight":"1.6"}}} -->
<p class="has-text-align-center has-main-color has-text-color has-medium-font-size" style="line-height:1.6">' . esc_html__( 'This is an example of paragraph text', 'dhali' ) . '</p>
<!-- /wp:paragraph -->

<!-- wp:separator {"className":"is-style-separator-thin"} -->
<hr class="wp-block-separator is-style-separator-thin has-alpha-channel-opacity"/>
<!-- /wp:separator -->

<!-- wp:paragraph {"textAlign":"center","fontFamily":"expanded","textColor":"main","fontSize":"base","style":{"typography":{"fontWeight":"700"}}} -->
<p class="has-text-align-center has-main-color has-text-color has-base-font-size has-expanded-font-family" style="font-weight:700">' . esc_html__( 'This is a title', 'dhali' ) . '</p>
<!-- /wp:paragraph -->

<!-- wp:paragraph {"textAlign":"center","textColor":"primary","fontSize":"x-small","style":{"typography":{"fontWeight":"600","letterSpacing":"0.05em","textTransform":"uppercase"}}} -->
<p class="has-text-align-center has-primary-color has-text-color has-x-small-font-size" style="font-weight:600;letter-spacing:0.05em;text-transform:uppercase">' . esc_html__( 'This is an example of paragraph text', 'dhali' ) . '</p>
<!-- /wp:paragraph -->

</div>
<!-- /wp:group -->

</div>
<!-- /wp:group -->
',
);
