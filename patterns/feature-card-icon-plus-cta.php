<?php
return array(
	'title'         => __( 'Feature Card with Icon and Plus CTA', 'dhali' ),
	'categories'    => array( 'dhali-web-development', 'card' ),
	'description'   => _x( 'A static feature card with a decorative icon, heading, body text, and a circular plus CTA.', 'Block pattern description', 'dhali' ),
	'keywords'      => array( 'feature', 'card', 'icon', 'cta' ),
	'viewportWidth' => 1500,
	'blockTypes'    => array( 'core/group' ),
	'content'       => '
<!-- wp:group {"align":"full","style":{"spacing":{"padding":{"top":"var:preset|spacing|xx-large","right":"var:preset|spacing|medium","bottom":"var:preset|spacing|xx-large","left":"var:preset|spacing|medium"},"margin":{"top":"0","bottom":"0"}}},"backgroundColor":"base","layout":{"type":"constrained"}} -->
<div class="wp-block-group alignfull has-base-background-color has-background" style="margin-top:0;margin-bottom:0;padding-top:var(--wp--preset--spacing--xx-large);padding-right:var(--wp--preset--spacing--medium);padding-bottom:var(--wp--preset--spacing--xx-large);padding-left:var(--wp--preset--spacing--medium)">

<!-- wp:group {"metadata":{"name":"Feature Card"},"className":"is-layout-flex is-vertical wp-block-group-is-layout-flex","style":{"spacing":{"padding":{"top":"var:preset|spacing|large","right":"var:preset|spacing|large","bottom":"var:preset|spacing|large","left":"var:preset|spacing|large"},"blockGap":"var:preset|spacing|medium"},"border":{"radius":"var:preset|border-radius|lg"},"shadow":"var:preset|shadow|small-light"},"backgroundColor":"base","layout":{"type":"flex","orientation":"vertical","flexWrap":"nowrap"}} -->
<div class="wp-block-group is-layout-flex is-vertical wp-block-group-is-layout-flex has-base-background-color has-background" style="border-radius:var(--wp--preset--border-radius--lg);padding-top:var(--wp--preset--spacing--large);padding-right:var(--wp--preset--spacing--large);padding-bottom:var(--wp--preset--spacing--large);padding-left:var(--wp--preset--spacing--large);box-shadow:var(--wp--preset--shadow--small-light)">

<!-- wp:outermost/icon-block {"iconName":"","width":"64px"} -->
<div class="wp-block-outermost-icon-block"><div class="icon-container" style="width:64px;transform:rotate(0deg) scaleX(1) scaleY(1)"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 64 64" focusable="false"><rect x="29" y="30" width="6" height="32" rx="3" fill="#7f8b72"/><path fill="#7f8b72" d="M29 56 C13 54 8 40 14 30 C16 40 22 50 29 52Z"/><path fill="#7f8b72" d="M35 48 C50 46 56 32 50 22 C48 32 42 42 35 44Z"/><rect x="29" y="3" width="6" height="14" rx="3" fill="#7f8b72"/><rect x="29" y="3" width="6" height="14" rx="3" fill="#7f8b72" transform="rotate(60 32 20)"/><rect x="29" y="3" width="6" height="14" rx="3" fill="#7f8b72" transform="rotate(120 32 20)"/><rect x="29" y="3" width="6" height="14" rx="3" fill="#7f8b72" transform="rotate(180 32 20)"/><rect x="29" y="3" width="6" height="14" rx="3" fill="#7f8b72" transform="rotate(240 32 20)"/><rect x="29" y="3" width="6" height="14" rx="3" fill="#7f8b72" transform="rotate(300 32 20)"/><circle cx="32" cy="20" r="10" fill="#7f8b72"/><circle cx="32" cy="20" r="5" fill="#ffffff"/><circle cx="32" cy="20" r="3" fill="#7f8b72"/></svg></div></div>
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

</div>
<!-- /wp:group -->
',
);
