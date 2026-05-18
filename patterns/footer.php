<?php
return array(
	'title'         => __( 'Footer', 'dhali' ),
	'categories'    => array( 'dhali-web-development', 'footer' ),
	'description'   => _x( 'A full-width footer with logo, hours, and location links.', 'Block pattern description', 'dhali' ),
	'keywords'      => array( 'footer', 'hours', 'locations', 'logo' ),
	'viewportWidth' => 1000,
	'blockTypes'    => array( 'core/group' ),
	'content'       => '
        <!-- wp:group {"metadata":{"name":"Footer"},"align":"full","style":{"spacing":{"padding":{"top":"var:preset|spacing|medium","bottom":"var:preset|spacing|medium","right":"var:preset|spacing|medium","left":"var:preset|spacing|medium"},"margin":{"top":"0px"},"blockGap":"var:preset|spacing|large"},"elements":{"link":{"color":{"text":"var:preset|color|base"}}},"border":{"top":{"color":"var:preset|color|border-light","width":"1px"},"right":[],"bottom":[],"left":[]}},"backgroundColor":"custom-color-1","textColor":"base","layout":{"inherit":true,"type":"constrained"}} -->
        <div class="wp-block-group alignfull has-base-color has-custom-color-1-background-color has-text-color has-background has-link-color" style="border-top-color:var(--wp--preset--color--border-light);border-top-width:1px;margin-top:0px;padding-top:var(--wp--preset--spacing--medium);padding-right:var(--wp--preset--spacing--medium);padding-bottom:var(--wp--preset--spacing--medium);padding-left:var(--wp--preset--spacing--medium)"><!-- wp:columns {"align":"full"} -->
        <div class="wp-block-columns alignfull"><!-- wp:column -->
        <div class="wp-block-column"><!-- wp:group {"style":{"spacing":{"margin":{"top":"-105px"}}},"layout":{"type":"constrained","contentSize":""},"animationType":"fadeInRight","animateOnScroll":true} -->
        <div class="wp-block-group" style="margin-top:-105px"><!-- wp:site-logo {"width":200,"align":"center"} /-->
        <!-- wp:paragraph {"align":"center"} -->
        <p class="has-text-align-center">Educate, Enrich, and Inspire</p>
        <!-- /wp:paragraph --></div>
        <!-- /wp:group --></div>
        <!-- /wp:column -->
        <!-- wp:column -->
        <div class="wp-block-column"><!-- wp:group {"layout":{"type":"flex","orientation":"vertical","justifyContent":"center"},"animationType":"fadeInDown","animateOnScroll":true} -->
        <div class="wp-block-group"><!-- wp:heading -->
        <h2 class="wp-block-heading">Hours</h2>
        <!-- /wp:heading -->
        <!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|small"}},"layout":{"type":"flex","orientation":"vertical","justifyContent":"center"}} -->
        <div class="wp-block-group"><!-- wp:paragraph -->
        <p><strong>Open</strong>: Monday &#8211; Saturday</p>
        <!-- /wp:paragraph -->
        <!-- wp:paragraph -->
        <p><strong>Closed</strong>: Sunday</p>
        <!-- /wp:paragraph --></div>
        <!-- /wp:group --></div>
        <!-- /wp:group --></div>
        <!-- /wp:column -->
        <!-- wp:column -->
        <div class="wp-block-column"><!-- wp:group {"layout":{"type":"flex","orientation":"vertical","justifyContent":"center"},"animationType":"fadeInLeft","animateOnScroll":true} -->
        <div class="wp-block-group"><!-- wp:heading -->
        <h2 class="wp-block-heading">Locations</h2>
        <!-- /wp:heading -->
        <!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|small"}},"layout":{"type":"flex","orientation":"vertical"}} -->
        <div class="wp-block-group"><!-- wp:paragraph {"style":{"typography":{"textDecoration":"underline"}}} -->
        <p style="text-decoration:underline">Location</p>
        <!-- /wp:paragraph -->
        <!-- wp:paragraph {"style":{"typography":{"textDecoration":"none"}},"textDecorationHover":"underline"} -->
        <p style="text-decoration:none" data-hover-decoration="underline"><a href="#" data-type="link" data-id="#">Location</a></p>
        <!-- /wp:paragraph -->
        <!-- wp:paragraph {"style":{"typography":{"textDecoration":"none"}},"textDecorationHover":"underline"} -->
        <p style="text-decoration:none" data-hover-decoration="underline"><a href="#" data-type="link" data-id="#">Location</a></p>
        <!-- /wp:paragraph -->
        <!-- wp:paragraph {"style":{"typography":{"textDecoration":"none"}},"textDecorationHover":"underline"} -->
        <p style="text-decoration:none" data-hover-decoration="underline"><a href="#" data-type="link" data-id="#">Location</a></p>
        <!-- /wp:paragraph --></div>
        <!-- /wp:group --></div>
        <!-- /wp:group --></div>
        <!-- /wp:column --></div>
        <!-- /wp:columns -->
        <!-- wp:group {"align":"wide","style":{"spacing":{"blockGap":"var:preset|spacing|small"}},"layout":{"type":"flex","flexWrap":"wrap","justifyContent":"center"},"animationType":"fadeInUp","animateOnScroll":true} -->
        <div class="wp-block-group alignwide"><!-- wp:create-block/dhali-copyright {"companyName":"Company Name"} /--></div>
        <!-- /wp:group --></div>
        <!-- /wp:group -->
    ',
);
