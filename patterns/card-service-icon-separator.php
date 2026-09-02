<?php
return array(
	'title'         => __( 'Service Card — Icon Separator', 'dhali' ),
	'categories'    => array( 'dhali-web-development', 'card' ),
	'description'   => _x( 'A service tile card with a bold heading and decorative icon in a space-between row, a thin separator, and a body paragraph.', 'Block pattern description', 'dhali' ),
	'keywords'      => array( 'service', 'card', 'icon', 'separator', 'tile' ),
	'viewportWidth' => 1500,
	'blockTypes'    => array( 'core/group' ),
	'content'       => '
<!-- wp:group {"metadata":{"name":"Service Card"},"style":{"spacing":{"padding":{"top":"var:preset|spacing|medium","right":"var:preset|spacing|medium","bottom":"var:preset|spacing|medium","left":"var:preset|spacing|medium"}},"border":{"radius":"var:preset|border-radius|lg"},"shadow":"var:preset|shadow|small-light"},"backgroundColor":"base","layout":{"type":"constrained"}} -->
<div class="wp-block-group has-base-background-color has-background" style="border-radius:var(--wp--preset--border-radius--lg);padding-top:var(--wp--preset--spacing--medium);padding-right:var(--wp--preset--spacing--medium);padding-bottom:var(--wp--preset--spacing--medium);padding-left:var(--wp--preset--spacing--medium);box-shadow:var(--wp--preset--shadow--small-light)">

<!-- wp:group {"metadata":{"name":"Title Row"},"className":"is-layout-flex is-horizontal wp-block-group-is-layout-flex items-justified-space-between","style":{"spacing":{"blockGap":"var:preset|spacing|small"}},"layout":{"type":"flex","orientation":"horizontal","flexWrap":"nowrap","justifyContent":"space-between","verticalAlignment":"center"}} -->
<div class="wp-block-group is-layout-flex is-horizontal wp-block-group-is-layout-flex items-justified-space-between">

<!-- wp:heading {"level":2,"textColor":"main","fontSize":"large"} -->
<h2 class="wp-block-heading has-main-color has-text-color has-large-font-size">' . esc_html__( 'This is a title', 'dhali' ) . '</h2>
<!-- /wp:heading -->

<!-- wp:outermost/icon-block {"iconName":"","width":"56px"} -->
<div class="wp-block-outermost-icon-block"><div class="icon-container" style="width:56px;transform:rotate(0deg) scaleX(1) scaleY(1)"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 64 64" role="img" aria-label="Question mark placeholder icon"><rect x="6" y="6" width="52" height="52" rx="12" fill="currentColor" opacity="0.1"/><path fill="currentColor" d="M29.5 40.5h5.7v-4.2c0-2.4.9-3.6 3.3-5.2 4.7-3 6.9-6.4 6.9-11 0-7.3-5.3-12.1-13.4-12.1-8.3 0-13.7 5-14.1 13.1h6.3c.3-4.8 3-7.4 7.5-7.4 4.3 0 7.1 2.6 7.1 6.5 0 2.7-1.4 4.7-4.8 6.8-3.6 2.3-4.5 4.1-4.5 8.2v5.3Zm-.5 11.2h6.8v-6.8H29v6.8Z"/></svg></div></div>
<!-- /wp:outermost/icon-block -->

</div>
<!-- /wp:group -->

<!-- wp:separator {"className":"is-style-separator-thin"} -->
<hr class="wp-block-separator has-alpha-channel-opacity is-style-separator-thin"/>
<!-- /wp:separator -->

<!-- wp:paragraph {"textColor":"main"} -->
<p class="has-main-color has-text-color">' . esc_html__( 'This is an example of paragraph text', 'dhali' ) . '</p>
<!-- /wp:paragraph -->

</div>
<!-- /wp:group -->
',
);
