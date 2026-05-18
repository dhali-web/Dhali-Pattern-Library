<?php
return array(
	'title'         => __( 'Off Canvas Mobile Menu', 'dhali' ),
	'categories'    => array( 'dhali-web-development', 'template-part' ),
	'description'   => _x( 'An off-canvas style mobile menu with site logo, search, navigation links, grouped footer links, and social icons.', 'Block pattern description', 'dhali' ),
	'keywords'      => array( 'menu', 'mobile', 'off-canvas', 'navigation', 'sidebar' ),
	'viewportWidth' => 400,
	'blockTypes'    => array( 'core/group' ),
	'content'       => '
        <!-- wp:group {"metadata":{"name":"Menu"},"className":"is-style-background-blur","style":{"position":{"type":""},"spacing":{"padding":{"right":"0","left":"0"},"blockGap":"0"},"border":{"radius":"10px"}},"backgroundColor":"base","layout":{"type":"constrained","justifyContent":"left"}} -->
        <div class="wp-block-group is-style-background-blur has-base-background-color has-background" style="border-radius:10px;padding-right:0;padding-left:0"><!-- wp:group {"style":{"spacing":{"padding":{"top":"var:preset|spacing|medium","bottom":"var:preset|spacing|medium"}}},"layout":{"type":"flex","orientation":"vertical","justifyContent":"center"}} -->
        <div class="wp-block-group" style="padding-top:var(--wp--preset--spacing--medium);padding-bottom:var(--wp--preset--spacing--medium)"><!-- wp:site-logo {"width":180} /-->

        <!-- wp:paragraph {"style":{"elements":{"link":{"color":{"text":"var:preset|color|custom-color-6"}}}},"textColor":"custom-color-6"} -->
        <p class="has-custom-color-6-color has-text-color has-link-color">Your tagline here</p>
        <!-- /wp:paragraph --></div>
        <!-- /wp:group -->

        <!-- wp:group {"metadata":{"name":"Section"},"style":{"spacing":{"padding":{"right":"var:preset|spacing|medium","left":"var:preset|spacing|medium","top":"var:preset|spacing|medium","bottom":"var:preset|spacing|medium"},"blockGap":"var:preset|spacing|large"}},"layout":{"type":"constrained"}} -->
        <div class="wp-block-group" style="padding-top:var(--wp--preset--spacing--medium);padding-right:var(--wp--preset--spacing--medium);padding-bottom:var(--wp--preset--spacing--medium);padding-left:var(--wp--preset--spacing--medium)"><!-- wp:search {"label":"Search","showLabel":false,"placeholder":"Search our site","buttonText":"Search","buttonUseIcon":true} /-->

        <!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|small"}},"layout":{"type":"constrained"}} -->
        <div class="wp-block-group"><!-- wp:buttons {"style":{"spacing":{"blockGap":{"top":"var:preset|spacing|small"}}},"fontSize":"base","animationType":"scaleOnHover"} -->
        <div class="wp-block-buttons has-custom-font-size has-base-font-size"><!-- wp:button {"textAlign":"left","width":100,"className":"is-style-secondary-button"} -->
        <div class="wp-block-button has-custom-width wp-block-button__width-100 is-style-secondary-button"><a class="wp-block-button__link has-text-align-left wp-element-button" href="#">Home</a></div>
        <!-- /wp:button --></div>
        <!-- /wp:buttons -->

        <!-- wp:buttons {"style":{"spacing":{"blockGap":{"top":"var:preset|spacing|small"}}},"fontSize":"base","animationType":"scaleOnHover"} -->
        <div class="wp-block-buttons has-custom-font-size has-base-font-size"><!-- wp:button {"textAlign":"left","width":100,"className":"is-style-secondary-button"} -->
        <div class="wp-block-button has-custom-width wp-block-button__width-100 is-style-secondary-button"><a class="wp-block-button__link has-text-align-left wp-element-button" href="#">Nav Link</a></div>
        <!-- /wp:button --></div>
        <!-- /wp:buttons -->

        <!-- wp:buttons {"style":{"spacing":{"blockGap":{"top":"var:preset|spacing|small"}}},"fontSize":"base","animationType":"scaleOnHover"} -->
        <div class="wp-block-buttons has-custom-font-size has-base-font-size"><!-- wp:button {"textAlign":"left","width":100,"className":"is-style-secondary-button"} -->
        <div class="wp-block-button has-custom-width wp-block-button__width-100 is-style-secondary-button"><a class="wp-block-button__link has-text-align-left wp-element-button" href="#">Nav Link</a></div>
        <!-- /wp:button --></div>
        <!-- /wp:buttons -->

        <!-- wp:buttons {"style":{"spacing":{"blockGap":{"top":"var:preset|spacing|small"}}},"fontSize":"base","animationType":"scaleOnHover"} -->
        <div class="wp-block-buttons has-custom-font-size has-base-font-size"><!-- wp:button {"textAlign":"left","width":100,"className":"is-style-secondary-button"} -->
        <div class="wp-block-button has-custom-width wp-block-button__width-100 is-style-secondary-button"><a class="wp-block-button__link has-text-align-left wp-element-button" href="#">Nav Link</a></div>
        <!-- /wp:button --></div>
        <!-- /wp:buttons -->

        <!-- wp:buttons {"style":{"spacing":{"blockGap":{"top":"var:preset|spacing|small"}}},"fontSize":"base","animationType":"scaleOnHover"} -->
        <div class="wp-block-buttons has-custom-font-size has-base-font-size"><!-- wp:button {"textAlign":"left","width":100,"className":"is-style-secondary-button"} -->
        <div class="wp-block-button has-custom-width wp-block-button__width-100 is-style-secondary-button"><a class="wp-block-button__link has-text-align-left wp-element-button" href="#">Contact Us</a></div>
        <!-- /wp:button --></div>
        <!-- /wp:buttons --></div>
        <!-- /wp:group --></div>
        <!-- /wp:group -->

        <!-- wp:group {"metadata":{"name":"Section"},"style":{"spacing":{"padding":{"right":"var:preset|spacing|medium","left":"var:preset|spacing|medium","top":"var:preset|spacing|medium","bottom":"var:preset|spacing|medium"},"blockGap":"var:preset|spacing|small"},"elements":{"link":{"color":{"text":"var:preset|color|custom-color-6"}}}},"textColor":"custom-color-6","layout":{"type":"constrained"}} -->
        <div class="wp-block-group has-custom-color-6-color has-text-color has-link-color" style="padding-top:var(--wp--preset--spacing--medium);padding-right:var(--wp--preset--spacing--medium);padding-bottom:var(--wp--preset--spacing--medium);padding-left:var(--wp--preset--spacing--medium)"><!-- wp:columns {"isStackedOnMobile":false} -->
        <div class="wp-block-columns is-not-stacked-on-mobile"><!-- wp:column -->
        <div class="wp-block-column"><!-- wp:paragraph {"style":{"typography":{"textTransform":"uppercase"}},"fontSize":"small"} -->
        <p class="has-small-font-size" style="text-transform:uppercase"><strong>Locations</strong></p>
        <!-- /wp:paragraph -->

        <!-- wp:group {"metadata":{"name":"Links"},"style":{"spacing":{"blockGap":"var:preset|spacing|small"}},"layout":{"type":"constrained"}} -->
        <div class="wp-block-group"><!-- wp:paragraph {"fontSize":"base"} -->
        <p class="has-base-font-size"><a href="#">Location</a></p>
        <!-- /wp:paragraph -->

        <!-- wp:paragraph -->
        <p><a href="#">Location</a></p>
        <!-- /wp:paragraph -->

        <!-- wp:paragraph -->
        <p><a href="#">Location</a></p>
        <!-- /wp:paragraph -->

        <!-- wp:paragraph -->
        <p><a href="#">Location</a></p>
        <!-- /wp:paragraph --></div>
        <!-- /wp:group --></div>
        <!-- /wp:column -->

        <!-- wp:column -->
        <div class="wp-block-column"><!-- wp:paragraph {"style":{"typography":{"textTransform":"uppercase"}},"fontSize":"small"} -->
        <p class="has-small-font-size" style="text-transform:uppercase"><strong>Quick Links</strong></p>
        <!-- /wp:paragraph -->

        <!-- wp:group {"metadata":{"name":"Links"},"style":{"spacing":{"blockGap":"var:preset|spacing|small"}},"layout":{"type":"constrained"}} -->
        <div class="wp-block-group"><!-- wp:paragraph {"fontSize":"base"} -->
        <p class="has-base-font-size"><a href="#">Quick Link</a></p>
        <!-- /wp:paragraph -->

        <!-- wp:paragraph {"fontSize":"base"} -->
        <p class="has-base-font-size"><a href="#">Quick Link</a></p>
        <!-- /wp:paragraph -->

        <!-- wp:paragraph {"fontSize":"base"} -->
        <p class="has-base-font-size"><a href="#">Quick Link</a></p>
        <!-- /wp:paragraph -->

        <!-- wp:paragraph {"fontSize":"base"} -->
        <p class="has-base-font-size"><a href="#">Quick Link</a></p>
        <!-- /wp:paragraph --></div>
        <!-- /wp:group --></div>
        <!-- /wp:column --></div>
        <!-- /wp:columns --></div>
        <!-- /wp:group -->

        <!-- wp:group {"metadata":{"name":"Section"},"style":{"spacing":{"padding":{"right":"var:preset|spacing|medium","left":"var:preset|spacing|medium","top":"var:preset|spacing|medium","bottom":"var:preset|spacing|medium"},"blockGap":"var:preset|spacing|small"}},"layout":{"type":"constrained"}} -->
        <div class="wp-block-group" style="padding-top:var(--wp--preset--spacing--medium);padding-right:var(--wp--preset--spacing--medium);padding-bottom:var(--wp--preset--spacing--medium);padding-left:var(--wp--preset--spacing--medium)"><!-- wp:social-links {"iconColor":"base","iconColorValue":"#fff","iconBackgroundColor":"custom-color-1","iconBackgroundColorValue":"#05456d","className":"is-style-pill-shape","style":{"spacing":{"blockGap":{"left":"var:preset|spacing|small"}}}} -->
        <ul class="wp-block-social-links has-icon-color has-icon-background-color is-style-pill-shape"><!-- wp:social-link {"url":"#","service":"facebook"} /-->

        <!-- wp:social-link {"url":"#","service":"x"} /-->

        <!-- wp:social-link {"url":"#","service":"instagram"} /-->

        <!-- wp:social-link {"url":"#","service":"youtube"} /--></ul>
        <!-- /wp:social-links --></div>
        <!-- /wp:group --></div>
        <!-- /wp:group -->
    ',
);
