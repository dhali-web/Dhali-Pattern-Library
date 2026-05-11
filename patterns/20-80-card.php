<?php
return array(
    'title'         => __( '20/80 Text Card', 'dhali' ),
    'categories' => array( 'dhali-web-development', 'card' ),
    'description'   => _x( 'A 20/80 split card featuring a text cube on the left, and a text box on the right.', 'Block pattern description', 'dhali' ),
    'keywords'      => array( 'split' ),
    'viewportWidth' => 1000,
    'blockTypes'    => array( 'core/columns' ),
    'content'    => '
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
        ',
);
