<?php
return array(
	'title'         => __( 'Dropdown Menu - Locations', 'dhali' ),
	'categories'    => array( 'dhali-web-development', 'navigation' ),
	'description'   => _x( 'A dropdown menu card list for the Ollie Pro menu builder, displaying multiple location links with a title, tagline, and arrow indicator.', 'Block pattern description', 'dhali' ),
	'keywords'      => array( 'menu', 'dropdown', 'locations', 'navigation', 'card' ),
	'viewportWidth' => 400,
	'blockTypes'    => array( 'core/group' ),
	'content'       => '
        <!-- wp:group {"metadata":{"name":"Menu"},"className":"current-menu-item","style":{"spacing":{"blockGap":"var:preset|spacing|small","padding":{"top":"var:preset|spacing|medium","bottom":"var:preset|spacing|medium","left":"var:preset|spacing|large","right":"var:preset|spacing|large"}},"dimensions":{"minHeight":""},"border":{"radius":"10px"},"shadow":"var:preset|shadow|small-light"},"backgroundColor":"base","borderColor":"border-light","layout":{"type":"constrained"},"ollieCustomClasses":["current-menu-item"]} -->
        <div class="wp-block-group current-menu-item has-border-color has-border-light-border-color has-base-background-color has-background" style="border-radius:10px;padding-top:var(--wp--preset--spacing--medium);padding-right:var(--wp--preset--spacing--large);padding-bottom:var(--wp--preset--spacing--medium);padding-left:var(--wp--preset--spacing--large);box-shadow:var(--wp--preset--shadow--small-light)">

            <!-- wp:group {"className":"menu-card-location-1","layout":{"type":"constrained"},"href":"#","linkDestination":"custom","ollieCustomClasses":["menu-card-location-1"]} -->
            <div class="wp-block-group menu-card-location-1"><!-- wp:group {"metadata":{"name":"Icon and Text"},"style":{"spacing":{"blockGap":"var:preset|spacing|medium"}},"layout":{"type":"flex","flexWrap":"nowrap","justifyContent":"space-between"},"animationType":"scaleOnHover"} -->
            <div class="wp-block-group"><!-- wp:group {"metadata":{"name":"Text"},"style":{"spacing":{"blockGap":"5px"}},"layout":{"type":"constrained"}} -->
            <div class="wp-block-group"><!-- wp:paragraph {"style":{"elements":{"link":{"color":{"text":"var:preset|color|custom-color-1"}}}},"textColor":"custom-color-1","fontSize":"small"} -->
            <p class="has-custom-color-1-color has-text-color has-link-color has-small-font-size"><strong>Location 1</strong></p>
            <!-- /wp:paragraph -->
            <!-- wp:paragraph {"style":{"elements":{"link":{"color":{"text":"var:preset|color|custom-color-6"}}}},"textColor":"custom-color-6","fontSize":"x-small"} -->
            <p class="has-custom-color-6-color has-text-color has-link-color has-x-small-font-size">Location tagline or description</p>
            <!-- /wp:paragraph --></div>
            <!-- /wp:group -->
            <!-- wp:paragraph {"align":"center","style":{"spacing":{"padding":{"top":"12px","bottom":"12px","left":"12px","right":"12px"}},"layout":{"selfStretch":"fixed","flexSize":"50px"},"border":{"radius":"10px"},"elements":{"link":{"color":{"text":"var:preset|color|custom-color-2"}}}},"backgroundColor":"tertiary","textColor":"custom-color-2"} -->
            <p class="has-text-align-center has-custom-color-2-color has-tertiary-background-color has-text-color has-background has-link-color" style="border-radius:10px;padding-top:12px;padding-right:12px;padding-bottom:12px;padding-left:12px"><strong>›</strong></p>
            <!-- /wp:paragraph --></div>
            <!-- /wp:group --></div>
            <!-- /wp:group -->

            <!-- wp:separator {"className":"is-style-separator-thin","backgroundColor":"border-light"} -->
            <hr class="wp-block-separator has-text-color has-border-light-color has-alpha-channel-opacity has-border-light-background-color has-background is-style-separator-thin"/>
            <!-- /wp:separator -->

            <!-- wp:group {"className":"menu-card-location-2","layout":{"type":"constrained"},"href":"#","linkDestination":"custom","ollieCustomClasses":["menu-card-location-2"]} -->
            <div class="wp-block-group menu-card-location-2"><!-- wp:group {"metadata":{"name":"Icon and Text"},"style":{"spacing":{"blockGap":"var:preset|spacing|medium"}},"layout":{"type":"flex","flexWrap":"nowrap","justifyContent":"space-between"},"animationType":"scaleOnHover"} -->
            <div class="wp-block-group"><!-- wp:group {"metadata":{"name":"Text"},"style":{"spacing":{"blockGap":"5px"}},"layout":{"type":"constrained"}} -->
            <div class="wp-block-group"><!-- wp:paragraph {"style":{"elements":{"link":{"color":{"text":"var:preset|color|custom-color-1"}}}},"textColor":"custom-color-1","fontSize":"small"} -->
            <p class="has-custom-color-1-color has-text-color has-link-color has-small-font-size"><strong>Location 2</strong></p>
            <!-- /wp:paragraph -->
            <!-- wp:paragraph {"style":{"elements":{"link":{"color":{"text":"var:preset|color|custom-color-6"}}}},"textColor":"custom-color-6","fontSize":"x-small"} -->
            <p class="has-custom-color-6-color has-text-color has-link-color has-x-small-font-size">Location tagline or description</p>
            <!-- /wp:paragraph --></div>
            <!-- /wp:group -->
            <!-- wp:paragraph {"align":"center","style":{"spacing":{"padding":{"top":"12px","bottom":"12px","left":"12px","right":"12px"}},"layout":{"selfStretch":"fixed","flexSize":"50px"},"border":{"radius":"10px"},"elements":{"link":{"color":{"text":"var:preset|color|custom-color-3"}}}},"backgroundColor":"tertiary","textColor":"custom-color-3"} -->
            <p class="has-text-align-center has-custom-color-3-color has-tertiary-background-color has-text-color has-background has-link-color" style="border-radius:10px;padding-top:12px;padding-right:12px;padding-bottom:12px;padding-left:12px"><strong>›</strong></p>
            <!-- /wp:paragraph --></div>
            <!-- /wp:group --></div>
            <!-- /wp:group -->

            <!-- wp:separator {"className":"is-style-separator-thin","backgroundColor":"border-light"} -->
            <hr class="wp-block-separator has-text-color has-border-light-color has-alpha-channel-opacity has-border-light-background-color has-background is-style-separator-thin"/>
            <!-- /wp:separator -->

            <!-- wp:group {"className":"menu-card-location-3","layout":{"type":"constrained"},"href":"#","linkDestination":"custom","ollieCustomClasses":["menu-card-location-3"]} -->
            <div class="wp-block-group menu-card-location-3"><!-- wp:group {"metadata":{"name":"Icon and Text"},"style":{"spacing":{"blockGap":"var:preset|spacing|medium"}},"layout":{"type":"flex","flexWrap":"nowrap","justifyContent":"space-between"},"animationType":"scaleOnHover"} -->
            <div class="wp-block-group"><!-- wp:group {"metadata":{"name":"Text"},"style":{"spacing":{"blockGap":"5px"}},"layout":{"type":"constrained"}} -->
            <div class="wp-block-group"><!-- wp:paragraph {"style":{"elements":{"link":{"color":{"text":"var:preset|color|custom-color-1"}}}},"textColor":"custom-color-1","fontSize":"small"} -->
            <p class="has-custom-color-1-color has-text-color has-link-color has-small-font-size"><strong>Location 3</strong></p>
            <!-- /wp:paragraph -->
            <!-- wp:paragraph {"style":{"elements":{"link":{"color":{"text":"var:preset|color|custom-color-6"}}}},"textColor":"custom-color-6","fontSize":"x-small"} -->
            <p class="has-custom-color-6-color has-text-color has-link-color has-x-small-font-size">Location tagline or description</p>
            <!-- /wp:paragraph --></div>
            <!-- /wp:group -->
            <!-- wp:paragraph {"align":"center","style":{"spacing":{"padding":{"top":"12px","bottom":"12px","left":"12px","right":"12px"}},"layout":{"selfStretch":"fixed","flexSize":"50px"},"border":{"radius":"10px"},"elements":{"link":{"color":{"text":"var:preset|color|custom-color-1"}}}},"backgroundColor":"tertiary","textColor":"custom-color-1"} -->
            <p class="has-text-align-center has-custom-color-1-color has-tertiary-background-color has-text-color has-background has-link-color" style="border-radius:10px;padding-top:12px;padding-right:12px;padding-bottom:12px;padding-left:12px"><strong>›</strong></p>
            <!-- /wp:paragraph --></div>
            <!-- /wp:group --></div>
            <!-- /wp:group -->

            <!-- wp:separator {"className":"is-style-separator-thin","backgroundColor":"border-light"} -->
            <hr class="wp-block-separator has-text-color has-border-light-color has-alpha-channel-opacity has-border-light-background-color has-background is-style-separator-thin"/>
            <!-- /wp:separator -->

            <!-- wp:group {"className":"menu-card-location-4","layout":{"type":"constrained"},"href":"#","linkDestination":"custom","ollieCustomClasses":["menu-card-location-4"]} -->
            <div class="wp-block-group menu-card-location-4"><!-- wp:group {"metadata":{"name":"Icon and Text"},"style":{"spacing":{"blockGap":"var:preset|spacing|medium"}},"layout":{"type":"flex","flexWrap":"nowrap","justifyContent":"space-between"},"animationType":"scaleOnHover"} -->
            <div class="wp-block-group"><!-- wp:group {"metadata":{"name":"Text"},"style":{"spacing":{"blockGap":"5px"}},"layout":{"type":"constrained"}} -->
            <div class="wp-block-group"><!-- wp:paragraph {"style":{"elements":{"link":{"color":{"text":"var:preset|color|custom-color-1"}}}},"textColor":"custom-color-1","fontSize":"small"} -->
            <p class="has-custom-color-1-color has-text-color has-link-color has-small-font-size"><strong>Location 4</strong></p>
            <!-- /wp:paragraph -->
            <!-- wp:paragraph {"style":{"elements":{"link":{"color":{"text":"var:preset|color|custom-color-6"}}}},"textColor":"custom-color-6","fontSize":"x-small"} -->
            <p class="has-custom-color-6-color has-text-color has-link-color has-x-small-font-size">Location tagline or description</p>
            <!-- /wp:paragraph --></div>
            <!-- /wp:group -->
            <!-- wp:paragraph {"align":"center","style":{"spacing":{"padding":{"top":"12px","bottom":"12px","left":"12px","right":"12px"}},"layout":{"selfStretch":"fixed","flexSize":"50px"},"border":{"radius":"10px"},"elements":{"link":{"color":{"text":"var:preset|color|custom-color-1"}}}},"backgroundColor":"tertiary","textColor":"custom-color-1"} -->
            <p class="has-text-align-center has-custom-color-1-color has-tertiary-background-color has-text-color has-background has-link-color" style="border-radius:10px;padding-top:12px;padding-right:12px;padding-bottom:12px;padding-left:12px"><strong>›</strong></p>
            <!-- /wp:paragraph --></div>
            <!-- /wp:group --></div>
            <!-- /wp:group -->

        </div>
        <!-- /wp:group -->
    ',
);
