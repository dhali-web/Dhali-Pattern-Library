<?php
return array(
	'title'         => __( 'Icon Service Card', 'dhali' ),
	'categories'    => array( 'dhali-web-development', 'card' ),
	'description'   => _x( 'A card with a bold heading, decorative windmill icon, divider, and body text.', 'Block pattern description', 'dhali' ),
	'keywords'      => array( 'service', 'card', 'icon', 'heading' ),
	'viewportWidth' => 1500,
	'blockTypes'    => array( 'core/group' ),
	'content'       => '
<!-- wp:group {"style":{"spacing":{"padding":{"top":"var:preset|spacing|medium","right":"var:preset|spacing|medium","bottom":"var:preset|spacing|medium","left":"var:preset|spacing|medium"}},"border":{"radius":"var:preset|border-radius|lg"},"shadow":"var:preset|shadow|small-light"},"backgroundColor":"base","layout":{"type":"constrained"}} -->
<div class="wp-block-group has-base-background-color has-background" style="border-radius:var(--wp--preset--border-radius--lg);padding-top:var(--wp--preset--spacing--medium);padding-right:var(--wp--preset--spacing--medium);padding-bottom:var(--wp--preset--spacing--medium);padding-left:var(--wp--preset--spacing--medium);box-shadow:var(--wp--preset--shadow--small-light)">

<!-- wp:group {"className":"is-layout-flex is-horizontal wp-block-group-is-layout-flex items-justified-space-between","style":{"spacing":{"blockGap":"var:preset|spacing|medium"}},"layout":{"type":"flex","orientation":"horizontal","flexWrap":"nowrap","justifyContent":"space-between","verticalAlignment":"center"}} -->
<div class="wp-block-group is-layout-flex is-horizontal wp-block-group-is-layout-flex items-justified-space-between">

<!-- wp:heading {"level":2,"style":{"typography":{"fontWeight":"700"}},"textColor":"main","fontSize":"large"} -->
<h2 class="wp-block-heading has-main-color has-text-color has-large-font-size" style="font-weight:700">' . esc_html__( 'This is a title', 'dhali' ) . '</h2>
<!-- /wp:heading -->

<!-- wp:html -->
<div style="width:56px;flex-shrink:0;line-height:0" aria-hidden="true"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 56 56" fill="none"><path d="M27 27 L27 4 A23 23 0 0 0 4 27 Z" fill="#C8A84A" fill-opacity="0.15" stroke="#C8A84A" stroke-width="1.5"/><path d="M29 27 L29 4 A23 23 0 0 1 52 27 Z" fill="#C8A84A" fill-opacity="0.15" stroke="#C8A84A" stroke-width="1.5"/><path d="M27 29 L4 29 A23 23 0 0 0 27 52 Z" fill="#C8A84A" fill-opacity="0.15" stroke="#C8A84A" stroke-width="1.5"/><path d="M29 29 L52 29 A23 23 0 0 1 29 52 Z" fill="#C8A84A" fill-opacity="0.15" stroke="#C8A84A" stroke-width="1.5"/></svg></div>
<!-- /wp:html -->

</div>
<!-- /wp:group -->

<!-- wp:separator {"className":"is-style-separator-thin"} -->
<hr class="wp-block-separator is-style-separator-thin has-alpha-channel-opacity"/>
<!-- /wp:separator -->

<!-- wp:paragraph {"textColor":"main","fontSize":"base"} -->
<p class="has-main-color has-text-color has-base-font-size">' . esc_html__( 'This is an example of paragraph text', 'dhali' ) . '</p>
<!-- /wp:paragraph -->

</div>
<!-- /wp:group -->
',
);
