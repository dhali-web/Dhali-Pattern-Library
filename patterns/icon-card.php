<?php
return array(
    'title'         => __( 'Icon Card', 'dhali' ),
    'categories' => array( 'dhali-web-development', 'card' ),
    'description'   => _x( 'A block displaying programs with cards.', 'Block pattern description', 'dhali' ),
    'keywords'      => array( 'split' ),
    'viewportWidth' => 1000,
    'blockTypes'    => array( 'core/group' ),
    'content'    => '
            <!-- wp:group {"style":{"spacing":{"padding":{"top":"var:preset|spacing|medium","bottom":"var:preset|spacing|medium","left":"var:preset|spacing|medium","right":"var:preset|spacing|medium"}},"border":{"width":"2px","color":"#1da76d","radius":{"topLeft":"var:preset|border-radius|xs","topRight":"var:preset|border-radius|xs","bottomLeft":"var:preset|border-radius|xs","bottomRight":"var:preset|border-radius|xs"}},"elements":{"link":{"color":{"text":"var:preset|color|custom-color-6"}}}},"textColor":"custom-color-6","layout":{"type":"flex","orientation":"vertical","justifyContent":"center"}} -->
            <div class="wp-block-group has-border-color has-custom-color-6-color has-text-color has-link-color" style="border-color:#1da76d;border-width:2px;border-top-left-radius:var(--wp--preset--border-radius--xs);border-top-right-radius:var(--wp--preset--border-radius--xs);border-bottom-left-radius:var(--wp--preset--border-radius--xs);border-bottom-right-radius:var(--wp--preset--border-radius--xs);padding-top:var(--wp--preset--spacing--medium);padding-right:var(--wp--preset--spacing--medium);padding-bottom:var(--wp--preset--spacing--medium);padding-left:var(--wp--preset--spacing--medium)"><!-- wp:group {"style":{"color":{"background":"#8e8e93"},"spacing":{"padding":{"top":"0.5rem","bottom":"0.5rem","left":"0.5rem","right":"0.5rem"}},"border":{"radius":{"topLeft":"var:preset|border-radius|full","topRight":"var:preset|border-radius|full","bottomLeft":"var:preset|border-radius|full","bottomRight":"var:preset|border-radius|full"}}},"layout":{"type":"constrained"}} -->
            <div class="wp-block-group has-background" style="border-top-left-radius:var(--wp--preset--border-radius--full);border-top-right-radius:var(--wp--preset--border-radius--full);border-bottom-left-radius:var(--wp--preset--border-radius--full);border-bottom-right-radius:var(--wp--preset--border-radius--full);background-color:#8e8e93;padding-top:0.5rem;padding-right:0.5rem;padding-bottom:0.5rem;padding-left:0.5rem"><!-- wp:outermost/icon-block {"iconName":"ollie-phosphor-question","iconColor":"custom-color-3","iconColorValue":"#4a6f8a"} -->
            <div class="wp-block-outermost-icon-block"><div class="icon-container has-icon-color has-custom-color-3-color" style="color:#4a6f8a;width:48px;transform:rotate(0deg) scaleX(1) scaleY(1)"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 256 256" fill="currentColor"><path d="M140,180a12,12,0,1,1-12-12A12,12,0,0,1,140,180ZM128,72c-22.06,0-40,16.15-40,36v4a8,8,0,0,0,16,0v-4c0-11,10.77-20,24-20s24,9,24,20-10.77,20-24,20a8,8,0,0,0-8,8v8a8,8,0,0,0,16,0v-.72c18.24-3.35,32-17.9,32-35.28C168,88.15,150.06,72,128,72Zm104,56A104,104,0,1,1,128,24,104.11,104.11,0,0,1,232,128Zm-16,0a88,88,0,1,0-88,88A88.1,88.1,0,0,0,216,128Z"></path></svg></div></div>
            <!-- /wp:outermost/icon-block --></div>
            <!-- /wp:group -->

            <!-- wp:heading {"level":3,"style":{"typography":{"fontStyle":"normal","fontWeight":"700"}}} -->
            <h3 class="wp-block-heading" style="font-style:normal;font-weight:700">Gymnastics</h3>
            <!-- /wp:heading -->

            <!-- wp:paragraph -->
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit</p>
            <!-- /wp:paragraph --></div>
            <!-- /wp:group -->
        ',
);
