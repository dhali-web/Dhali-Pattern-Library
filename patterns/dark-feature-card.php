<?php
return array(
    'title'         => __( 'Dark Feature Card', 'dhali' ),
    'categories'    => array( 'dhali-web-development', 'featured' ),
    'description'   => _x( 'A dark gradient card with a branded icon badge, heading, and body text for showcasing features or benefits.', 'Block pattern description', 'dhali' ),
    'keywords'      => array( 'feature', 'card', 'icon', 'dark', 'benefit' ),
    'viewportWidth' => 480,
    'blockTypes'    => array( 'core/group' ),
    'content'       => '
            <!-- wp:group {"metadata":{"name":"Dark Feature Card"},"gradient":"black","style":{"spacing":{"padding":{"top":"var:preset|spacing|medium","bottom":"var:preset|spacing|medium","left":"var:preset|spacing|medium","right":"var:preset|spacing|medium"},"blockGap":"var:preset|spacing|small"},"border":{"radius":{"topLeft":"var:preset|border-radius|lg","topRight":"var:preset|border-radius|lg","bottomLeft":"var:preset|border-radius|lg","bottomRight":"var:preset|border-radius|lg"}}},"layout":{"type":"flex","orientation":"vertical","justifyContent":"left"},"animationType":"scaleOnHover"} -->
            <div class="wp-block-group has-black-gradient-background has-background" style="border-top-left-radius:var(--wp--preset--border-radius--lg);border-top-right-radius:var(--wp--preset--border-radius--lg);border-bottom-left-radius:var(--wp--preset--border-radius--lg);border-bottom-right-radius:var(--wp--preset--border-radius--lg);padding-top:var(--wp--preset--spacing--medium);padding-right:var(--wp--preset--spacing--medium);padding-bottom:var(--wp--preset--spacing--medium);padding-left:var(--wp--preset--spacing--medium)"><!-- wp:group {"style":{"dimensions":{"width":"3.5rem","height":"3.5rem"},"border":{"radius":{"topLeft":"var:preset|border-radius|lg","topRight":"var:preset|border-radius|lg","bottomLeft":"var:preset|border-radius|lg","bottomRight":"var:preset|border-radius|lg"}}},"backgroundColor":"primary","layout":{"type":"flex","verticalAlignment":"center","justifyContent":"center"}} -->
            <div class="wp-block-group has-primary-background-color has-background" style="width:3.5rem;height:3.5rem;border-top-left-radius:var(--wp--preset--border-radius--lg);border-top-right-radius:var(--wp--preset--border-radius--lg);border-bottom-left-radius:var(--wp--preset--border-radius--lg);border-bottom-right-radius:var(--wp--preset--border-radius--lg)"><!-- wp:outermost/icon-block {"iconName":"ollie-phosphor-arrows-clockwise","iconColor":"base","iconColorValue":"#ffffff","width":"2rem"} -->
            <div class="wp-block-outermost-icon-block"><div class="icon-container has-icon-color has-base-color" style="color:#ffffff;width:2rem;transform:rotate(0deg) scaleX(1) scaleY(1)"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 256 256" fill="currentColor"><path d="M224,48V96a8,8,0,0,1-8,8H168a8,8,0,0,1,0-16h28.69L182.06,73.37a79.56,79.56,0,0,0-56.13-23.43h-.45A79.52,79.52,0,0,0,69.59,72.71,8,8,0,0,1,58.41,61.27a96,96,0,0,1,135,.79L208,76.69V48a8,8,0,0,1,16,0ZM186.41,183.29a80,80,0,0,1-112.47-.66L59.31,168H88a8,8,0,0,0,0-16H40a8,8,0,0,0-8,8v48a8,8,0,0,0,16,0V179.31l14.63,14.63A95.43,95.43,0,0,0,130,222.06h.53a95.36,95.36,0,0,0,67.07-27.33,8,8,0,0,0-11.18-11.44Z"/></svg></div></div>
            <!-- /wp:outermost/icon-block --></div>
            <!-- /wp:group -->

            <!-- wp:heading {"level":3,"style":{"typography":{"fontStyle":"normal","fontWeight":"700"}},"textColor":"base"} -->
            <h3 class="wp-block-heading has-base-color has-text-color" style="font-style:normal;font-weight:700">Lifetime Free Updates</h3>
            <!-- /wp:heading -->

            <!-- wp:paragraph {"textColor":"main-accent"} -->
            <p class="has-main-accent-color has-text-color">Enjoy continuous improvements and new features with free updates for life.</p>
            <!-- /wp:paragraph --></div>
            <!-- /wp:group -->
        ',
);
