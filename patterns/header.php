<?php
return array(
	'title'         => __( 'Header', 'dhali' ),
	'categories'    => array( 'dhali-web-development', 'header' ),
	'description'   => _x( 'A full-width header with a preheader bar containing contact info and social links, and a main nav row with logo, navigation, and a secondary nav button group.', 'Block pattern description', 'dhali' ),
	'keywords'      => array( 'header', 'navigation', 'nav', 'preheader', 'social', 'logo' ),
	'viewportWidth' => 1280,
	'blockTypes'    => array( 'core/group' ),
	'content'       => '
        <!-- wp:group {"metadata":{"name":"Header"},"align":"full","style":{"spacing":{"blockGap":"0"}},"layout":{"type":"constrained"}} -->
        <div class="wp-block-group alignfull"><!-- wp:columns {"isStackedOnMobile":false,"metadata":{"name":"Preheader"},"align":"full","style":{"spacing":{"blockGap":{"left":"0"}}},"animationType":"fadeInDown"} -->
        <div class="wp-block-columns alignfull is-not-stacked-on-mobile"><!-- wp:column {"verticalAlignment":"stretch","width":"15%","backgroundColor":"custom-color-2"} -->
        <div class="wp-block-column is-vertically-aligned-stretch has-custom-color-2-background-color has-background" style="flex-basis:15%"><!-- wp:group {"style":{"dimensions":{"minHeight":"100%"}},"layout":{"type":"flex","orientation":"vertical","justifyContent":"center","verticalAlignment":"center"}} -->
        <div class="wp-block-group" style="min-height:100%"><!-- wp:group {"layout":{"type":"constrained"},"href":"#","linkDestination":"custom","animationType":"scaleOnHover"} -->
        <div class="wp-block-group"><!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|small","padding":{"right":"0","left":"0"}}},"layout":{"type":"flex","flexWrap":"nowrap"}} -->
        <div class="wp-block-group" style="padding-right:0;padding-left:0"><!-- wp:outermost/icon-block {"iconName":"ollie-phosphor-phone","iconColor":"base","iconColorValue":"#fff","width":"1.75rem"} -->
        <div class="wp-block-outermost-icon-block"><div class="icon-container has-icon-color has-base-color" style="color:#fff;width:1.75rem;transform:rotate(0deg) scaleX(1) scaleY(1)"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 256 256" fill="currentColor"><path d="M222.37,158.46l-47.11-21.11-.13-.06a16,16,0,0,0-15.17,1.4,8.12,8.12,0,0,0-.75.56L134.87,160c-15.42-7.49-31.34-23.29-38.83-38.51l20.78-24.71c.2-.25.39-.5.57-.77a16,16,0,0,0,1.32-15.06l0-.12L97.54,33.64a16,16,0,0,0-16.62-9.52A56.26,56.26,0,0,0,32,80c0,79.4,64.6,144,144,144a56.26,56.26,0,0,0,55.88-48.92A16,16,0,0,0,222.37,158.46ZM176,208A128.14,128.14,0,0,1,48,80,40.2,40.2,0,0,1,82.87,40a.61.61,0,0,0,0,.12l21,47L83.2,111.86a6.13,6.13,0,0,0-.57.77,16,16,0,0,0-1,15.7c9.06,18.53,27.73,37.06,46.46,46.11a16,16,0,0,0,15.75-1.14,8.44,8.44,0,0,0,.74-.56L168.89,152l47,21.05h0s.08,0,.11,0A40.21,40.21,0,0,1,176,208Z"></path></svg></div></div>
        <!-- /wp:outermost/icon-block -->

        <!-- wp:paragraph {"align":"center","className":"hide-on-tablet","style":{"elements":{"link":{"color":{"text":"var:preset|color|base"}}}},"textColor":"base","ollieCustomClasses":["hide-on-tablet"]} -->
        <p class="has-text-align-center hide-on-tablet has-base-color has-text-color has-link-color">(111) 111-1111</p>
        <!-- /wp:paragraph --></div>
        <!-- /wp:group --></div>
        <!-- /wp:group --></div>
        <!-- /wp:group --></div>
        <!-- /wp:column -->

        <!-- wp:column {"width":"85%","backgroundColor":"custom-color-1"} -->
        <div class="wp-block-column has-custom-color-1-background-color has-background" style="flex-basis:85%"><!-- wp:group {"style":{"spacing":{"padding":{"left":"var:preset|spacing|small","right":"var:preset|spacing|small","top":"var:preset|spacing|small","bottom":"var:preset|spacing|small"}},"dimensions":{"minHeight":"100%"}},"layout":{"type":"flex","flexWrap":"nowrap","justifyContent":"space-between"}} -->
        <div class="wp-block-group" style="min-height:100%;padding-top:var(--wp--preset--spacing--small);padding-right:var(--wp--preset--spacing--small);padding-bottom:var(--wp--preset--spacing--small);padding-left:var(--wp--preset--spacing--small)"><!-- wp:group {"layout":{"type":"flex","flexWrap":"nowrap"}} -->
        <div class="wp-block-group"><!-- wp:group {"layout":{"type":"constrained"},"href":"#","linkDestination":"custom","animationType":"scaleOnHover"} -->
        <div class="wp-block-group"><!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|small"}},"layout":{"type":"flex","flexWrap":"nowrap"}} -->
        <div class="wp-block-group"><!-- wp:outermost/icon-block {"iconName":"ollie-phosphor-envelope","iconColor":"custom-color-2","iconColorValue":"#0572aa","width":"1.75rem"} -->
        <div class="wp-block-outermost-icon-block"><div class="icon-container has-icon-color has-custom-color-2-color" style="color:#0572aa;width:1.75rem;transform:rotate(0deg) scaleX(1) scaleY(1)"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 256 256" fill="currentColor"><path d="M224,48H32a8,8,0,0,0-8,8V192a16,16,0,0,0,16,16H216a16,16,0,0,0,16-16V56A8,8,0,0,0,224,48Zm-96,85.15L52.57,64H203.43ZM98.71,128,40,181.81V74.19Zm11.84,10.85,12,11.05a8,8,0,0,0,10.82,0l12-11.05,58,53.15H52.57ZM157.29,128,216,74.18V181.82Z"></path></svg></div></div>
        <!-- /wp:outermost/icon-block -->

        <!-- wp:paragraph {"className":"hide-on-tablet","style":{"elements":{"link":{"color":{"text":"var:preset|color|base"}}}},"textColor":"base","ollieCustomClasses":["hide-on-tablet"]} -->
        <p class="hide-on-tablet has-base-color has-text-color has-link-color">support@email.com</p>
        <!-- /wp:paragraph --></div>
        <!-- /wp:group --></div>
        <!-- /wp:group -->

        <!-- wp:group {"layout":{"type":"constrained"},"href":"#","linkDestination":"custom","animationType":"scaleOnHover"} -->
        <div class="wp-block-group"><!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|small"}},"layout":{"type":"flex","flexWrap":"nowrap"}} -->
        <div class="wp-block-group"><!-- wp:outermost/icon-block {"iconName":"ollie-phosphor-map-pin","iconColor":"custom-color-2","iconColorValue":"#0572aa","width":"1.75rem"} -->
        <div class="wp-block-outermost-icon-block"><div class="icon-container has-icon-color has-custom-color-2-color" style="color:#0572aa;width:1.75rem;transform:rotate(0deg) scaleX(1) scaleY(1)"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 256 256" fill="currentColor"><path d="M128,64a40,40,0,1,0,40,40A40,40,0,0,0,128,64Zm0,64a24,24,0,1,1,24-24A24,24,0,0,1,128,128Zm0-112a88.1,88.1,0,0,0-88,88c0,31.4,14.51,64.68,42,96.25a254.19,254.19,0,0,0,41.45,38.3,8,8,0,0,0,9.18,0A254.19,254.19,0,0,0,174,200.25c27.45-31.57,42-64.85,42-96.25A88.1,88.1,0,0,0,128,16Zm0,206c-16.53-13-72-60.75-72-118a72,72,0,0,1,144,0C200,161.23,144.53,209,128,222Z"></path></svg></div></div>
        <!-- /wp:outermost/icon-block -->

        <!-- wp:paragraph {"className":"hide-on-tablet","style":{"elements":{"link":{"color":{"text":"var:preset|color|base"}}}},"textColor":"base","ollieCustomClasses":["hide-on-tablet"]} -->
        <p class="hide-on-tablet has-base-color has-text-color has-link-color">123 Main St. Anytown, USA</p>
        <!-- /wp:paragraph --></div>
        <!-- /wp:group --></div>
        <!-- /wp:group --></div>
        <!-- /wp:group -->

        <!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|small","padding":{"top":"0","bottom":"0"}}},"layout":{"type":"flex","flexWrap":"nowrap","justifyContent":"right"}} -->
        <div class="wp-block-group" style="padding-top:0;padding-bottom:0"><!-- wp:group {"style":{"elements":{"link":{"color":{"text":"var:preset|color|base"}}},"spacing":{"padding":{"top":"12px","bottom":"12px","left":"12px","right":"12px"}}},"backgroundColor":"custom-color-2","textColor":"base","layout":{"type":"constrained"},"href":"#","linkDestination":"custom","animationType":"scaleOnHover"} -->
        <div class="wp-block-group has-base-color has-custom-color-2-background-color has-text-color has-background has-link-color" style="padding-top:12px;padding-right:12px;padding-bottom:12px;padding-left:12px"><!-- wp:outermost/icon-block {"iconName":"wordpress-facebook","iconColor":"base","iconColorValue":"#fff","width":"1.75rem"} -->
        <div class="wp-block-outermost-icon-block"><div class="icon-container has-icon-color has-base-color" style="color:#fff;width:1.75rem;transform:rotate(0deg) scaleX(1) scaleY(1)"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" aria-hidden="true"><path d="M12 2C6.5 2 2 6.5 2 12c0 5 3.7 9.1 8.4 9.9v-7H7.9V12h2.5V9.8c0-2.5 1.5-3.9 3.8-3.9 1.1 0 2.2.2 2.2.2v2.5h-1.3c-1.2 0-1.6.8-1.6 1.6V12h2.8l-.4 2.9h-2.3v7C18.3 21.1 22 17 22 12c0-5.5-4.5-10-10-10z"></path></svg></div></div>
        <!-- /wp:outermost/icon-block --></div>
        <!-- /wp:group -->

        <!-- wp:group {"style":{"elements":{"link":{"color":{"text":"var:preset|color|base"}}},"spacing":{"padding":{"top":"12px","bottom":"12px","left":"12px","right":"12px"}}},"backgroundColor":"custom-color-2","textColor":"base","layout":{"type":"constrained"},"href":"#","linkDestination":"custom","animationType":"scaleOnHover"} -->
        <div class="wp-block-group has-base-color has-custom-color-2-background-color has-text-color has-background has-link-color" style="padding-top:12px;padding-right:12px;padding-bottom:12px;padding-left:12px"><!-- wp:outermost/icon-block {"iconName":"wordpress-x","iconColor":"base","iconColorValue":"#fff","width":"1.75rem"} -->
        <div class="wp-block-outermost-icon-block"><div class="icon-container has-icon-color has-base-color" style="color:#fff;width:1.75rem;transform:rotate(0deg) scaleX(1) scaleY(1)"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" aria-hidden="true"><path d="M13.982 10.622 20.54 3h-1.554l-5.693 6.618L8.745 3H3.5l6.876 10.007L3.5 21h1.554l6.012-6.989L15.868 21h5.245l-7.131-10.378Zm-2.128 2.474-.697-.997-5.543-7.93H8l4.474 6.4.697.996 5.815 8.318h-2.387l-4.745-6.787Z"></path></svg></div></div>
        <!-- /wp:outermost/icon-block --></div>
        <!-- /wp:group -->

        <!-- wp:group {"style":{"elements":{"link":{"color":{"text":"var:preset|color|base"}}},"spacing":{"padding":{"top":"12px","bottom":"12px","left":"12px","right":"12px"}}},"backgroundColor":"custom-color-2","textColor":"base","layout":{"type":"constrained"},"href":"#","linkDestination":"custom","animationType":"scaleOnHover"} -->
        <div class="wp-block-group has-base-color has-custom-color-2-background-color has-text-color has-background has-link-color" style="padding-top:12px;padding-right:12px;padding-bottom:12px;padding-left:12px"><!-- wp:outermost/icon-block {"iconName":"wordpress-instagram","iconColor":"base","iconColorValue":"#fff","width":"1.75rem"} -->
        <div class="wp-block-outermost-icon-block"><div class="icon-container has-icon-color has-base-color" style="color:#fff;width:1.75rem;transform:rotate(0deg) scaleX(1) scaleY(1)"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" aria-hidden="true"><path d="M12,4.622c2.403,0,2.688,0.009,3.637,0.052c0.877,0.04,1.354,0.187,1.671,0.31c0.42,0.163,0.72,0.358,1.035,0.673 c0.315,0.315,0.51,0.615,0.673,1.035c0.123,0.317,0.27,0.794,0.31,1.671c0.043,0.949,0.052,1.234,0.052,3.637 s-0.009,2.688-0.052,3.637c-0.04,0.877-0.187,1.354-0.31,1.671c-0.163,0.42-0.358,0.72-0.673,1.035 c-0.315,0.315-0.615,0.51-1.035,0.673c-0.317,0.123-0.794,0.27-1.671,0.31c-0.949,0.043-1.233,0.052-3.637,0.052 s-2.688-0.009-3.637-0.052c-0.877-0.04-1.354-0.187-1.671-0.31c-0.42-0.163-0.72-0.358-1.035-0.673 c-0.315-0.315-0.51-0.615-0.673-1.035c-0.123-0.317-0.27-0.794-0.31-1.671C4.631,14.688,4.622,14.403,4.622,12 s0.009-2.688,0.052-3.637c0.04-0.877,0.187-1.354,0.31-1.671c0.163-0.42,0.358-0.72,0.673-1.035 c0.315-0.315,0.615-0.51,1.035-0.673c0.317-0.123,0.794-0.27,1.671-0.31C9.312,4.631,9.597,4.622,12,4.622 M12,3 C9.556,3,9.249,3.01,8.289,3.054C7.331,3.098,6.677,3.25,6.105,3.472C5.513,3.702,5.011,4.01,4.511,4.511 c-0.5,0.5-0.808,1.002-1.038,1.594C3.25,6.677,3.098,7.331,3.054,8.289C3.01,9.249,3,9.556,3,12c0,2.444,0.01,2.751,0.054,3.711 c0.044,0.958,0.196,1.612,0.418,2.185c0.23,0.592,0.538,1.094,1.038,1.594c0.5,0.5,1.002,0.808,1.594,1.038 c0.572,0.222,1.227,0.375,2.185,0.418C9.249,20.99,9.556,21,12,21s2.751-0.01,3.711-0.054c0.958-0.044,1.612-0.196,2.185-0.418 c0.592-0.23,1.094-0.538,1.594-1.038c0.5-0.5,0.808-1.002,1.038-1.594c0.222-0.572,0.375-1.227,0.418-2.185 C20.99,14.751,21,14.444,21,12s-0.01-2.751-0.054-3.711c-0.044-0.958-0.196-1.612-0.418-2.185c-0.23-0.592-0.538-1.094-1.038-1.594 c-0.5-0.5-1.002-0.808-1.594-1.038c-0.572-0.222-1.227-0.375-2.185-0.418C14.751,3.01,14.444,3,12,3L12,3z M12,7.378 c-2.552,0-4.622,2.069-4.622,4.622S9.448,16.622,12,16.622s4.622-2.069,4.622-4.622S14.552,7.378,12,7.378z M12,15 c-1.657,0-3-1.343-3-3s1.343-3,3-3s3,1.343,3,3S13.657,15,12,15z M16.804,6.116c-0.596,0-1.08,0.484-1.08,1.08 s0.484,1.08,1.08,1.08c0.596,0,1.08-0.484,1.08-1.08S17.401,6.116,16.804,6.116z"></path></svg></div></div>
        <!-- /wp:outermost/icon-block --></div>
        <!-- /wp:group -->

        <!-- wp:group {"style":{"elements":{"link":{"color":{"text":"var:preset|color|base"}}},"spacing":{"padding":{"top":"12px","bottom":"12px","left":"12px","right":"12px"}}},"backgroundColor":"custom-color-2","textColor":"base","layout":{"type":"constrained"},"href":"#","linkDestination":"custom","animationType":"scaleOnHover"} -->
        <div class="wp-block-group has-base-color has-custom-color-2-background-color has-text-color has-background has-link-color" style="padding-top:12px;padding-right:12px;padding-bottom:12px;padding-left:12px"><!-- wp:outermost/icon-block {"iconName":"wordpress-youtube","iconColor":"base","iconColorValue":"#fff","width":"1.75rem"} -->
        <div class="wp-block-outermost-icon-block"><div class="icon-container has-icon-color has-base-color" style="color:#fff;width:1.75rem;transform:rotate(0deg) scaleX(1) scaleY(1)"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" aria-hidden="true"><path d="M21.8,8.001c0,0-0.195-1.378-0.795-1.985c-0.76-0.797-1.613-0.801-2.004-0.847c-2.799-0.202-6.997-0.202-6.997-0.202 h-0.009c0,0-4.198,0-6.997,0.202C4.608,5.216,3.756,5.22,2.995,6.016C2.395,6.623,2.2,8.001,2.2,8.001S2,9.62,2,11.238v1.517 c0,1.618,0.2,3.237,0.2,3.237s0.195,1.378,0.795,1.985c0.761,0.797,1.76,0.771,2.205,0.855c1.6,0.153,6.8,0.201,6.8,0.201 s4.203-0.006,7.001-0.209c0.391-0.047,1.243-0.051,2.004-0.847c0.6-0.607,0.795-1.985,0.795-1.985s0.2-1.618,0.2-3.237v-1.517 C22,9.62,21.8,8.001,21.8,8.001z M9.935,14.594l-0.001-5.62l5.404,2.82L9.935,14.594z"></path></svg></div></div>
        <!-- /wp:outermost/icon-block --></div>
        <!-- /wp:group --></div>
        <!-- /wp:group --></div>
        <!-- /wp:group --></div>
        <!-- /wp:column --></div>
        <!-- /wp:columns -->

        <!-- wp:group {"metadata":{"name":"Logo and Navs"},"align":"full","style":{"spacing":{"padding":{"top":"var:preset|spacing|medium","bottom":"var:preset|spacing|medium","right":"var:preset|spacing|medium","left":"var:preset|spacing|medium"},"margin":{"top":"0px"}},"elements":{"link":{"color":{"text":"var:preset|color|main"}}},"border":{"bottom":{"color":"var:preset|color|border-light","width":"1px"},"top":[],"right":[],"left":[]}},"layout":{"inherit":true,"type":"constrained"}} -->
        <div class="wp-block-group alignfull has-link-color" style="border-bottom-color:var(--wp--preset--color--border-light);border-bottom-width:1px;margin-top:0px;padding-top:var(--wp--preset--spacing--medium);padding-right:var(--wp--preset--spacing--medium);padding-bottom:var(--wp--preset--spacing--medium);padding-left:var(--wp--preset--spacing--medium)"><!-- wp:group {"align":"wide","style":{"spacing":{"padding":{"left":"0"}}},"layout":{"type":"flex","justifyContent":"space-between","flexWrap":"nowrap"}} -->
        <div class="wp-block-group alignwide" style="padding-left:0"><!-- wp:site-logo {"width":200,"className":"z-1","style":{"spacing":{"margin":{"bottom":"-150px"}}},"ollieCustomClasses":["z-1"]} /-->

        <!-- wp:navigation {"ref":2951,"textColor":"custom-color-6","mobileMenuSlug":"mobile-menu"} /-->

        <!-- wp:group {"className":"","style":{"elements":{"link":{"color":{"text":"var:preset|color|base"}}},"spacing":{"padding":{"top":"0.5rem","bottom":"0.5rem","left":"1rem","right":"1rem"}}},"backgroundColor":"custom-color-2","textColor":"base","layout":{"type":"constrained"},"animationDuration":1.5,"animationDelay":0.5,"animationScale":1.25} -->
        <div class="wp-block-group has-base-color has-custom-color-2-background-color has-text-color has-background has-link-color" style="padding-top:0.5rem;padding-right:1rem;padding-bottom:0.5rem;padding-left:1rem"><!-- wp:navigation {"ref":2095,"overlayMenu":"never"} /--></div>
        <!-- /wp:group --></div>
        <!-- /wp:group --></div>
        <!-- /wp:group --></div>
        <!-- /wp:group -->
    ',
);
