<?php
return array(
    'title'         => __( '50/50 20/80 Card Block', 'dhali' ),
    'categories' => array( 'dhali-web-development', 'block' ),
    'description'   => _x( 'A block using the 50/50 Image Text Card and the 20/80 split card.', 'Block pattern description', 'dhali' ),
    'keywords'      => array( 'split' ),
    'viewportWidth' => 1000,
    'blockTypes'    => array( 'core/columns' ),
    'content'    => '
            <!-- wp:group {"metadata":{"name":"Events"},"align":"wide","layout":{"type":"constrained"}} -->
            <div class="wp-block-group alignwide"><!-- wp:spacer {"height":"50px"} -->
            <div style="height:50px" aria-hidden="true" class="wp-block-spacer"></div>
            <!-- /wp:spacer -->

            <!-- wp:group {"style":{"spacing":{"blockGap":"0"}},"layout":{"type":"flex","orientation":"vertical","justifyContent":"center"},"animationType":"fadeInDown","animateOnScroll":true} -->
            <div class="wp-block-group"><!-- wp:heading {"textAlign":"left","level":3,"style":{"elements":{"link":{"color":{"text":"var:preset|color|custom-color-3"}}}},"textColor":"custom-color-3"} -->
            <h3 class="wp-block-heading has-text-align-left has-custom-color-3-color has-text-color has-link-color">Events</h3>
            <!-- /wp:heading -->

            <!-- wp:heading {"style":{"elements":{"link":{"color":{"text":"var:preset|color|custom-color-1"}}}},"textColor":"custom-color-1"} -->
            <h2 class="wp-block-heading has-custom-color-1-color has-text-color has-link-color">Our Upcoming Events</h2>
            <!-- /wp:heading --></div>
            <!-- /wp:group -->

            <!-- wp:spacer {"height":"50px","style":{"layout":[]}} -->
            <div style="height:50px" aria-hidden="true" class="wp-block-spacer"></div>
            <!-- /wp:spacer -->

            <!-- wp:columns {"metadata":{"name":"Camp Event"},"align":"wide"} -->
            <div class="wp-block-columns alignwide"><!-- wp:column {"style":{"spacing":{"padding":{"bottom":"20px"}}},"animationType":"fadeInRight","animateOnScroll":true} -->
            <div class="wp-block-column" style="padding-bottom:20px"><!-- wp:group {"layout":{"type":"constrained"},"href":"#","linkDestination":"custom","animationType":"scaleOnHover"} -->
            <div class="wp-block-group"><!-- wp:columns {"isStackedOnMobile":false,"style":{"spacing":{"blockGap":{"top":"0","left":"0"}},"layout":{"selfStretch":"fit","flexSize":null},"shadow":"var:preset|shadow|medium-dark"}} -->
            <div class="wp-block-columns is-not-stacked-on-mobile" style="box-shadow:var(--wp--preset--shadow--medium-dark)"><!-- wp:column {"style":{"spacing":{"padding":{"top":"var:preset|spacing|small","bottom":"var:preset|spacing|small","left":"var:preset|spacing|small","right":"var:preset|spacing|small"}}}} -->
            <div class="wp-block-column" style="padding-top:var(--wp--preset--spacing--small);padding-right:var(--wp--preset--spacing--small);padding-bottom:var(--wp--preset--spacing--small);padding-left:var(--wp--preset--spacing--small)"><!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|small"},"elements":{"link":{"color":{"text":"var:preset|color|custom-color-6"}}}},"textColor":"custom-color-6","layout":{"type":"constrained"}} -->
            <div class="wp-block-group has-custom-color-6-color has-text-color has-link-color"><!-- wp:heading {"level":3} -->
            <h3 class="wp-block-heading">Funny Cooking</h3>
            <!-- /wp:heading -->

            <!-- wp:paragraph -->
            <p>Lorem ipsum dolor sit amet,<br>consectetur adipiscing elitz</p>
            <!-- /wp:paragraph -->

            <!-- wp:group {"layout":{"type":"flex","flexWrap":"nowrap"}} -->
            <div class="wp-block-group"><!-- wp:group {"style":{"spacing":{"blockGap":"0"}},"layout":{"type":"flex","orientation":"vertical","verticalAlignment":"top","justifyContent":"center"}} -->
            <div class="wp-block-group"><!-- wp:heading {"textAlign":"center","level":3} -->
            <h3 class="wp-block-heading has-text-align-center">4 - 6</h3>
            <!-- /wp:heading -->

            <!-- wp:heading {"textAlign":"center","level":3} -->
            <h3 class="wp-block-heading has-text-align-center">Years</h3>
            <!-- /wp:heading --></div>
            <!-- /wp:group -->

            <!-- wp:group {"style":{"spacing":{"blockGap":"0"}},"layout":{"type":"flex","orientation":"vertical","justifyContent":"center"}} -->
            <div class="wp-block-group"><!-- wp:heading {"textAlign":"center","level":3} -->
            <h3 class="wp-block-heading has-text-align-center">$$</h3>
            <!-- /wp:heading -->

            <!-- wp:heading {"textAlign":"center","level":3} -->
            <h3 class="wp-block-heading has-text-align-center">Price</h3>
            <!-- /wp:heading --></div>
            <!-- /wp:group --></div>
            <!-- /wp:group --></div>
            <!-- /wp:group --></div>
            <!-- /wp:column -->

            <!-- wp:column -->

            <div class="wp-block-column"><!-- wp:group {"style":{"dimensions":{"minHeight":"100%"},"background":{"backgroundImage":{"url":"' . esc_url( plugin_dir_url( dirname( __FILE__ ) ) . 'assets/images/logoipsum-419.png' ) . '","source":"url"},"backgroundSize":"contain", "backgroundRepeat":"no-repeat", "backgroundPosition":"center"}},"layout":{"type":"flex","orientation":"vertical","verticalAlignment":"bottom","justifyContent":"right"}} -->
            <div class="wp-block-group" style="min-height:100%"><!-- wp:buttons {"style":{"spacing":{"margin":{"bottom":"-20px"}}},"layout":{"type":"flex","verticalAlignment":"top","justifyContent":"right","orientation":"horizontal","flexWrap":"nowrap"}} -->
            <div class="wp-block-buttons" style="margin-bottom:-20px"><!-- wp:button {"backgroundColor":"custom-color-5","textColor":"custom-color-6","style":{"border":{"radius":{"topLeft":"0px","topRight":"0px","bottomLeft":"0px","bottomRight":"0px"}},"elements":{"link":{"color":{"text":"var:preset|color|custom-color-6"}}}}} -->
            <div class="wp-block-button"><a class="wp-block-button__link has-custom-color-6-color has-custom-color-5-background-color has-text-color has-background has-link-color wp-element-button" style="border-top-left-radius:0px;border-top-right-radius:0px;border-bottom-left-radius:0px;border-bottom-right-radius:0px">Read More</a></div>
            <!-- /wp:button --></div>
            <!-- /wp:buttons --></div>
            <!-- /wp:group --></div>
            <!-- /wp:column --></div>
            <!-- /wp:columns --></div>
            <!-- /wp:group -->

            <!-- wp:group {"layout":{"type":"constrained"},"href":"#","linkDestination":"custom","animationType":"scaleOnHover"} -->
            <div class="wp-block-group"><!-- wp:columns {"isStackedOnMobile":false,"style":{"spacing":{"blockGap":{"top":"0","left":"0"}},"layout":{"selfStretch":"fit","flexSize":null},"shadow":"var:preset|shadow|medium-dark"}} -->
            <div class="wp-block-columns is-not-stacked-on-mobile" style="box-shadow:var(--wp--preset--shadow--medium-dark)"><!-- wp:column {"style":{"spacing":{"padding":{"top":"var:preset|spacing|small","bottom":"var:preset|spacing|small","left":"var:preset|spacing|small","right":"var:preset|spacing|small"}}}} -->
            <div class="wp-block-column" style="padding-top:var(--wp--preset--spacing--small);padding-right:var(--wp--preset--spacing--small);padding-bottom:var(--wp--preset--spacing--small);padding-left:var(--wp--preset--spacing--small)"><!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|small"},"elements":{"link":{"color":{"text":"var:preset|color|custom-color-6"}}}},"textColor":"custom-color-6","layout":{"type":"constrained"}} -->
            <div class="wp-block-group has-custom-color-6-color has-text-color has-link-color"><!-- wp:heading {"level":3} -->
            <h3 class="wp-block-heading">Funny Cooking</h3>
            <!-- /wp:heading -->

            <!-- wp:paragraph -->
            <p>Lorem ipsum dolor sit amet,<br>consectetur adipiscing elitz</p>
            <!-- /wp:paragraph -->

            <!-- wp:group {"layout":{"type":"flex","flexWrap":"nowrap"}} -->
            <div class="wp-block-group"><!-- wp:group {"style":{"spacing":{"blockGap":"0"}},"layout":{"type":"flex","orientation":"vertical","verticalAlignment":"top","justifyContent":"center"}} -->
            <div class="wp-block-group"><!-- wp:heading {"textAlign":"center","level":3} -->
            <h3 class="wp-block-heading has-text-align-center">4 - 6</h3>
            <!-- /wp:heading -->

            <!-- wp:heading {"textAlign":"center","level":3} -->
            <h3 class="wp-block-heading has-text-align-center">Years</h3>
            <!-- /wp:heading --></div>
            <!-- /wp:group -->

            <!-- wp:group {"style":{"spacing":{"blockGap":"0"}},"layout":{"type":"flex","orientation":"vertical","justifyContent":"center"}} -->
            <div class="wp-block-group"><!-- wp:heading {"textAlign":"center","level":3} -->
            <h3 class="wp-block-heading has-text-align-center">$$</h3>
            <!-- /wp:heading -->

            <!-- wp:heading {"textAlign":"center","level":3} -->
            <h3 class="wp-block-heading has-text-align-center">Price</h3>
            <!-- /wp:heading --></div>
            <!-- /wp:group --></div>
            <!-- /wp:group --></div>
            <!-- /wp:group --></div>
            <!-- /wp:column -->

            <!-- wp:column -->


            <div class="wp-block-column"><!-- wp:group {"style":{"dimensions":{"minHeight":"100%"},"background":{"backgroundImage":{"url":"' . esc_url( plugin_dir_url( dirname( __FILE__ ) ) . 'assets/images/logoipsum-419.png' ) . '","source":"url"},"backgroundSize":"contain", "backgroundRepeat":"no-repeat", "backgroundPosition":"center"}},"layout":{"type":"flex","orientation":"vertical","verticalAlignment":"bottom","justifyContent":"right"}} -->
            <div class="wp-block-group" style="min-height:100%"><!-- wp:buttons {"style":{"spacing":{"margin":{"bottom":"-20px"}}},"layout":{"type":"flex","verticalAlignment":"top","justifyContent":"right","orientation":"horizontal","flexWrap":"nowrap"}} -->
            <div class="wp-block-buttons" style="margin-bottom:-20px"><!-- wp:button {"backgroundColor":"custom-color-5","textColor":"custom-color-6","style":{"border":{"radius":{"topLeft":"0px","topRight":"0px","bottomLeft":"0px","bottomRight":"0px"}},"elements":{"link":{"color":{"text":"var:preset|color|custom-color-6"}}}}} -->
            <div class="wp-block-button"><a class="wp-block-button__link has-custom-color-6-color has-custom-color-5-background-color has-text-color has-background has-link-color wp-element-button" style="border-top-left-radius:0px;border-top-right-radius:0px;border-bottom-left-radius:0px;border-bottom-right-radius:0px">Read More</a></div>
            <!-- /wp:button --></div>
            <!-- /wp:buttons --></div>
            <!-- /wp:group --></div>
            <!-- /wp:column --></div>
            <!-- /wp:columns --></div>
            <!-- /wp:group --></div>
            <!-- /wp:column -->

            <!-- wp:column {"animationType":"fadeInLeft","animateOnScroll":true} -->
            <div class="wp-block-column"><!-- wp:group {"metadata":{"name":"Card"},"style":{"spacing":{"blockGap":"0"},"shadow":"var:preset|shadow|small-dark"},"layout":{"type":"grid","columnCount":5,"minimumColumnWidth":null},"href":"#","linkDestination":"custom","animationType":"scaleOnHover"} -->
            <div class="wp-block-group" style="box-shadow:var(--wp--preset--shadow--small-dark)"><!-- wp:group {"style":{"spacing":{"padding":{"top":"0","bottom":"0","left":"0","right":"0"}},"elements":{"link":{"color":{"text":"var:preset|color|base"}}},"layout":{"selfStretch":"fixed","flexSize":"150px"},"dimensions":{"minHeight":"150px"}},"backgroundColor":"custom-color-1","textColor":"base","layout":{"type":"flex","orientation":"vertical","verticalAlignment":"center","justifyContent":"center"}} -->
            <div class="wp-block-group has-base-color has-custom-color-1-background-color has-text-color has-background has-link-color" style="min-height:150px;padding-top:0;padding-right:0;padding-bottom:0;padding-left:0"><!-- wp:paragraph {"align":"center","style":{"typography":{"fontStyle":"normal","fontWeight":"700"}},"fontSize":"medium"} -->
            <p class="has-text-align-center has-medium-font-size" style="font-style:normal;font-weight:700">28<br>May</p>
            <!-- /wp:paragraph --></div>
            <!-- /wp:group -->

            <!-- wp:group {"style":{"dimensions":{"minHeight":"100%"},"spacing":{"padding":{"top":"var:preset|spacing|small","bottom":"var:preset|spacing|small","left":"var:preset|spacing|small","right":"var:preset|spacing|small"},"blockGap":"var:preset|spacing|small"},"layout":{"columnSpan":4}},"layout":{"type":"constrained"}} -->
            <div class="wp-block-group" style="min-height:100%;padding-top:var(--wp--preset--spacing--small);padding-right:var(--wp--preset--spacing--small);padding-bottom:var(--wp--preset--spacing--small);padding-left:var(--wp--preset--spacing--small)"><!-- wp:heading {"style":{"elements":{"link":{"color":{"text":"var:preset|color|custom-color-1"}}}},"textColor":"custom-color-1"} -->
            <h2 class="wp-block-heading has-custom-color-1-color has-text-color has-link-color">Initial Education Day</h2>
            <!-- /wp:heading -->

            <!-- wp:paragraph {"style":{"elements":{"link":{"color":{"text":"var:preset|color|custom-color-6"}}}},"textColor":"custom-color-6"} -->
            <p class="has-custom-color-6-color has-text-color has-link-color">Lorem ipsum dolor sit amet, consectetur adipiscing elit</p>
            <!-- /wp:paragraph --></div>
            <!-- /wp:group --></div>
            <!-- /wp:group -->

            <!-- wp:group {"metadata":{"name":"Card"},"style":{"spacing":{"blockGap":"0"},"shadow":"var:preset|shadow|small-dark"},"layout":{"type":"grid","columnCount":5,"minimumColumnWidth":null},"href":"#","linkDestination":"custom","animationType":"scaleOnHover"} -->
            <div class="wp-block-group" style="box-shadow:var(--wp--preset--shadow--small-dark)"><!-- wp:group {"style":{"spacing":{"padding":{"top":"0","bottom":"0","left":"0","right":"0"}},"elements":{"link":{"color":{"text":"var:preset|color|base"}}},"layout":{"selfStretch":"fixed","flexSize":"150px"},"dimensions":{"minHeight":"150px"}},"backgroundColor":"custom-color-1","textColor":"base","layout":{"type":"flex","orientation":"vertical","verticalAlignment":"center","justifyContent":"center"}} -->
            <div class="wp-block-group has-base-color has-custom-color-1-background-color has-text-color has-background has-link-color" style="min-height:150px;padding-top:0;padding-right:0;padding-bottom:0;padding-left:0"><!-- wp:paragraph {"align":"center","style":{"typography":{"fontStyle":"normal","fontWeight":"700"}},"fontSize":"medium"} -->
            <p class="has-text-align-center has-medium-font-size" style="font-style:normal;font-weight:700">28<br>May</p>
            <!-- /wp:paragraph --></div>
            <!-- /wp:group -->

            <!-- wp:group {"style":{"dimensions":{"minHeight":"100%"},"spacing":{"padding":{"top":"var:preset|spacing|small","bottom":"var:preset|spacing|small","left":"var:preset|spacing|small","right":"var:preset|spacing|small"},"blockGap":"var:preset|spacing|small"},"layout":{"columnSpan":4}},"layout":{"type":"constrained"}} -->
            <div class="wp-block-group" style="min-height:100%;padding-top:var(--wp--preset--spacing--small);padding-right:var(--wp--preset--spacing--small);padding-bottom:var(--wp--preset--spacing--small);padding-left:var(--wp--preset--spacing--small)"><!-- wp:heading {"style":{"elements":{"link":{"color":{"text":"var:preset|color|custom-color-1"}}}},"textColor":"custom-color-1"} -->
            <h2 class="wp-block-heading has-custom-color-1-color has-text-color has-link-color">Initial Education Day</h2>
            <!-- /wp:heading -->

            <!-- wp:paragraph {"style":{"elements":{"link":{"color":{"text":"var:preset|color|custom-color-6"}}}},"textColor":"custom-color-6"} -->
            <p class="has-custom-color-6-color has-text-color has-link-color">Lorem ipsum dolor sit amet, consectetur adipiscing elit</p>
            <!-- /wp:paragraph --></div>
            <!-- /wp:group --></div>
            <!-- /wp:group -->

            <!-- wp:group {"metadata":{"name":"Card"},"style":{"spacing":{"blockGap":"0"},"shadow":"var:preset|shadow|small-dark"},"layout":{"type":"grid","columnCount":5,"minimumColumnWidth":null},"href":"#","linkDestination":"custom","animationType":"scaleOnHover"} -->
            <div class="wp-block-group" style="box-shadow:var(--wp--preset--shadow--small-dark)"><!-- wp:group {"style":{"spacing":{"padding":{"top":"0","bottom":"0","left":"0","right":"0"}},"elements":{"link":{"color":{"text":"var:preset|color|base"}}},"layout":{"selfStretch":"fixed","flexSize":"150px"},"dimensions":{"minHeight":"150px"}},"backgroundColor":"custom-color-1","textColor":"base","layout":{"type":"flex","orientation":"vertical","verticalAlignment":"center","justifyContent":"center"}} -->
            <div class="wp-block-group has-base-color has-custom-color-1-background-color has-text-color has-background has-link-color" style="min-height:150px;padding-top:0;padding-right:0;padding-bottom:0;padding-left:0"><!-- wp:paragraph {"align":"center","style":{"typography":{"fontStyle":"normal","fontWeight":"700"}},"fontSize":"medium"} -->
            <p class="has-text-align-center has-medium-font-size" style="font-style:normal;font-weight:700">28<br>May</p>
            <!-- /wp:paragraph --></div>
            <!-- /wp:group -->

            <!-- wp:group {"style":{"dimensions":{"minHeight":"100%"},"spacing":{"padding":{"top":"var:preset|spacing|small","bottom":"var:preset|spacing|small","left":"var:preset|spacing|small","right":"var:preset|spacing|small"},"blockGap":"var:preset|spacing|small"},"layout":{"columnSpan":4}},"layout":{"type":"constrained"}} -->
            <div class="wp-block-group" style="min-height:100%;padding-top:var(--wp--preset--spacing--small);padding-right:var(--wp--preset--spacing--small);padding-bottom:var(--wp--preset--spacing--small);padding-left:var(--wp--preset--spacing--small)"><!-- wp:heading {"style":{"elements":{"link":{"color":{"text":"var:preset|color|custom-color-1"}}}},"textColor":"custom-color-1"} -->
            <h2 class="wp-block-heading has-custom-color-1-color has-text-color has-link-color">Initial Education Day</h2>
            <!-- /wp:heading -->

            <!-- wp:paragraph {"style":{"elements":{"link":{"color":{"text":"var:preset|color|custom-color-6"}}}},"textColor":"custom-color-6"} -->
            <p class="has-custom-color-6-color has-text-color has-link-color">Lorem ipsum dolor sit amet, consectetur adipiscing elit</p>
            <!-- /wp:paragraph --></div>
            <!-- /wp:group --></div>
            <!-- /wp:group --></div>
            <!-- /wp:column --></div>
            <!-- /wp:columns --></div>
            <!-- /wp:group -->
        ',
);
