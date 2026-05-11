<?php
return array(
    'title'         => __( '50/50 Text Image Card', 'dhali' ),
    'categories' => array( 'dhali-web-development', 'card' ),
    'description'   => _x( 'A 50/50 split card featuring text and pricing on the left, and an image with a call to action button on the right.', 'Block pattern description', 'dhali' ),
    'keywords'      => array( 'split', 'pricing', 'image', 'call to action', 'cta' ),
    'viewportWidth' => 1000,
    'blockTypes'    => array( 'core/columns' ),
    'content'    => '
            <!-- wp:group {"metadata":{"name":"50 50 Image card"},"layout":{"type":"constrained"},"href":"#","linkDestination":"custom","animationType":"scaleOnHover"} -->
            <div class="wp-block-group"><!-- wp:columns {"isStackedOnMobile":false,"metadata":{"name":"Card"},"style":{"spacing":{"blockGap":{"top":"0","left":"0"}},"layout":{"selfStretch":"fit","flexSize":null},"shadow":"var:preset|shadow|medium-dark"}} -->
            <div class="wp-block-columns is-not-stacked-on-mobile" style="box-shadow:var(--wp--preset--shadow--medium-dark)"><!-- wp:column {"metadata":{"name":"Text"},"style":{"spacing":{"padding":{"top":"var:preset|spacing|small","bottom":"var:preset|spacing|small","left":"var:preset|spacing|small","right":"var:preset|spacing|small"}}}} -->
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

            <!-- wp:column {"metadata":{"name":"image"}} -->
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
        ',
);
