<?php
return array(
    'title'         => __( '50/50 Text Image Card', 'dhali' ),
    'categories' => array( 'dhali-web-development', 'query' ),
    'description'   => _x( 'A 50/50 split card featuring text and pricing on the left, and an image with a call to action button on the right.', 'Block pattern description', 'dhali' ),
    'keywords'      => array( 'split', 'pricing', 'image', 'call to action', 'cta' ),
    'viewportWidth' => 1000,
    'blockTypes'    => array( 'core/query' ),
    'content'    => '
        <!-- wp:query {"queryId":1,"query":{"perPage":2,"pages":0,"offset":0,"postType":"camps","order":"desc","orderBy":"date","author":"","search":"","exclude":[],"sticky":"exclude","inherit":false,"parents":[],"format":[],"meta_query":{"queries":[],"relation":"OR"},"disable_pagination":true},"namespace":"advanced-query-loop","align":"wide"} -->
        <div class="wp-block-query alignwide"><!-- wp:post-template {"layout":{"type":"grid","columnCount":2}} -->
        <!-- wp:group {"align":"wide","layout":{"type":"constrained"},"animationType":"scaleOnHover"} -->
        <div class="wp-block-group alignwide"><!-- wp:columns {"isStackedOnMobile":false,"align":"wide","style":{"spacing":{"blockGap":{"top":"0","left":"0"}}}} -->
        <div class="wp-block-columns alignwide is-not-stacked-on-mobile"><!-- wp:column -->
        <div class="wp-block-column"><!-- wp:group {"style":{"dimensions":{"minHeight":"100%"},"elements":{"link":{"color":{"text":"var:preset|color|custom-color-6"}}},"spacing":{"blockGap":"0","padding":{"top":"var:preset|spacing|small","bottom":"var:preset|spacing|small","left":"var:preset|spacing|small","right":"var:preset|spacing|small"}},"shadow":"var:preset|shadow|medium-dark"},"textColor":"custom-color-6","layout":{"type":"flex","orientation":"vertical","verticalAlignment":"space-between"}} -->
        <div class="wp-block-group has-custom-color-6-color has-text-color has-link-color" style="min-height:100%;padding-top:var(--wp--preset--spacing--small);padding-right:var(--wp--preset--spacing--small);padding-bottom:var(--wp--preset--spacing--small);padding-left:var(--wp--preset--spacing--small);box-shadow:var(--wp--preset--shadow--medium-dark)"><!-- wp:post-title {"isLink":true,"className":""} /-->

        <!-- wp:post-content /-->

        <!-- wp:group {"layout":{"type":"flex","flexWrap":"nowrap","justifyContent":"left"}} -->
        <div class="wp-block-group"><!-- wp:group {"style":{"spacing":{"blockGap":"0"}},"layout":{"type":"flex","orientation":"vertical","verticalAlignment":"center","justifyContent":"center"}} -->
        <div class="wp-block-group"><!-- wp:mfb/meta-field-block {"fieldType":"acf","fieldName":"age","style":{"typography":{"fontStyle":"normal","fontWeight":"700"}},"fontFamily":"montserrat"} /-->

        <!-- wp:paragraph {"style":{"typography":{"fontStyle":"normal","fontWeight":"700"}},"fontFamily":"montserrat"} -->
        <p class="has-montserrat-font-family" style="font-style:normal;font-weight:700">Years</p>
        <!-- /wp:paragraph --></div>
        <!-- /wp:group -->

        <!-- wp:group {"style":{"spacing":{"blockGap":"0"}},"layout":{"type":"flex","orientation":"vertical","justifyContent":"center","verticalAlignment":"center"}} -->
        <div class="wp-block-group"><!-- wp:mfb/meta-field-block {"fieldType":"acf","fieldName":"price","fieldSettings":{"type":"text","key":"field_69c45118b9420"},"style":{"typography":{"fontStyle":"normal","fontWeight":"700"}},"fontFamily":"montserrat"} /-->

        <!-- wp:paragraph {"style":{"typography":{"fontStyle":"normal","fontWeight":"700"}},"fontFamily":"montserrat"} -->
        <p class="has-montserrat-font-family" style="font-style:normal;font-weight:700">Price</p>
        <!-- /wp:paragraph --></div>
        <!-- /wp:group --></div>
        <!-- /wp:group --></div>
        <!-- /wp:group --></div>
        <!-- /wp:column -->

        <!-- wp:column -->
        <div class="wp-block-column"><!-- wp:post-featured-image {"isLink":true,"width":"100%","height":"100%","className":"","style":{"shadow":"var:preset|shadow|medium-dark"}} /-->

        <!-- wp:group {"style":{"spacing":{"margin":{"top":"-20px"}}},"layout":{"type":"constrained","justifyContent":"right"}} -->
        <div class="wp-block-group" style="margin-top:-20px"><!-- wp:read-more {"style":{"elements":{"link":{"color":{"text":"var:preset|color|custom-color-6"}}},"spacing":{"padding":{"top":"0.5rem","bottom":"0.5rem","left":"1rem","right":"1rem"}},"typography":{"fontStyle":"normal","fontWeight":"600"}},"backgroundColor":"custom-color-5","textColor":"custom-color-6"} /--></div>
        <!-- /wp:group --></div>
        <!-- /wp:column --></div>
        <!-- /wp:columns --></div>
        <!-- /wp:group -->
        <!-- /wp:post-template --></div>
        <!-- /wp:query -->
    ',
);
