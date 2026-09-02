<?php
return array(
	'title'         => __( 'Feature Card — Leaf Icon with Plus CTA', 'dhali' ),
	'categories'    => array( 'dhali-web-development', 'card' ),
	'description'   => _x( 'A standalone feature card with a decorative leaf icon, heading, body text, and a circular plus CTA.', 'Block pattern description', 'dhali' ),
	'keywords'      => array( 'feature', 'card', 'icon', 'leaf', 'cta', 'plus' ),
	'viewportWidth' => 1500,
	'blockTypes'    => array( 'core/group' ),
	'content'       => '
<!-- wp:group {"metadata":{"name":"Feature Card"},"className":"is-layout-flex is-vertical wp-block-group-is-layout-flex","style":{"spacing":{"padding":{"top":"var:preset|spacing|large","right":"var:preset|spacing|large","bottom":"var:preset|spacing|large","left":"var:preset|spacing|large"},"blockGap":"var:preset|spacing|medium"},"border":{"radius":"var:preset|border-radius|lg"},"shadow":"var:preset|shadow|small-light"},"backgroundColor":"base","layout":{"type":"flex","orientation":"vertical","flexWrap":"nowrap"}} -->
<div class="wp-block-group is-layout-flex is-vertical wp-block-group-is-layout-flex has-base-background-color has-background" style="border-radius:var(--wp--preset--border-radius--lg);padding-top:var(--wp--preset--spacing--large);padding-right:var(--wp--preset--spacing--large);padding-bottom:var(--wp--preset--spacing--large);padding-left:var(--wp--preset--spacing--large);box-shadow:var(--wp--preset--shadow--small-light)">

<!-- wp:outermost/icon-block {"iconName":"","width":"56px"} -->
<div class="wp-block-outermost-icon-block"><div class="icon-container" style="width:56px;transform:rotate(0deg) scaleX(1) scaleY(1)"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 64 64" focusable="false"><rect x="30" y="36" width="4" height="24" rx="2" fill="#7f8b72"/><path fill="#7f8b72" d="M32 38 C20 38 10 28 10 14 C10 14 24 12 30 24 C32 30 32 38 32 38Z"/><path fill="#7f8b72" d="M32 28 C44 28 54 18 54 4 C54 4 40 2 34 14 C32 20 32 28 32 28Z"/></svg></div></div>
<!-- /wp:outermost/icon-block -->

<!-- wp:heading {"level":3,"fontSize":"large"} -->
<h3 class="wp-block-heading has-large-font-size">' . esc_html__( 'This is a title', 'dhali' ) . '</h3>
<!-- /wp:heading -->

<!-- wp:paragraph {"fontSize":"base"} -->
<p class="has-base-font-size">' . esc_html__( 'This is an example of paragraph text', 'dhali' ) . '</p>
<!-- /wp:paragraph -->

<!-- wp:group {"style":{"color":{"background":"#fff29e"},"border":{"radius":{"topLeft":"var:preset|border-radius|full","topRight":"var:preset|border-radius|full","bottomLeft":"var:preset|border-radius|full","bottomRight":"var:preset|border-radius|full"}},"spacing":{"padding":{"top":"0.5rem","bottom":"0.5rem","left":"0.5rem","right":"0.5rem"}}},"layout":{"type":"constrained"},"href":"#","linkDestination":"custom","animationType":"scaleOnHover"} -->
<div class="wp-block-group has-background" style="border-top-left-radius:var(--wp--preset--border-radius--full);border-top-right-radius:var(--wp--preset--border-radius--full);border-bottom-left-radius:var(--wp--preset--border-radius--full);border-bottom-right-radius:var(--wp--preset--border-radius--full);background-color:#fff29e;padding-top:0.5rem;padding-right:0.5rem;padding-bottom:0.5rem;padding-left:0.5rem"><!-- wp:outermost/icon-block {"iconName":"wordpress-plus","customIconBackgroundColor":"#fff29e","width":"30px"} --><div class="wp-block-outermost-icon-block"><div class="icon-container" style="width:30px;transform:rotate(0deg) scaleX(1) scaleY(1)"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" aria-hidden="true"><path d="M11 12.5V17.5H12.5V12.5H17.5V11H12.5V6H11V11H6V12.5H11Z"></path></svg></div></div><!-- /wp:outermost/icon-block --></div>
<!-- /wp:group -->

</div>
<!-- /wp:group -->
',
);
