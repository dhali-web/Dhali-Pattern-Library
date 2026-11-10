<?php
/**
 * Resource Link Card.
 *
 * Standalone card: small outline icon, heading, muted text and an underlined
 * text-style CTA. Vertical flex + space-between with min-height 100% lets the
 * card match sibling heights in native Grid/Columns parents. The CTA URL is
 * intentionally unset; editors add the link after insertion.
 */
return array(
	'title'         => __( 'Resource Link Card', 'dhali' ),
	'categories'    => array( 'dhali-web-development', 'card' ),
	'description'   => _x( 'A standalone card with a top accent border, small icon, heading, muted text and an underlined arrow link that stays at the bottom when cards share a row.', 'Block pattern description', 'dhali' ),
	'keywords'      => array( 'card', 'resource', 'link', 'icon', 'cta', 'accent' ),
	'viewportWidth' => 1500,
	'content'       => '<!-- wp:group {"metadata":{"name":"Resource Link Card","categories":["dhali-web-development","card"],"patternName":"dhali-patterns/card-resource-link"},"style":{"dimensions":{"minHeight":"100%"},"border":{"top":{"color":"var:preset|color|primary-accent","width":"4px"}},"spacing":{"padding":{"top":"var:preset|spacing|large","right":"var:preset|spacing|large","bottom":"var:preset|spacing|large","left":"var:preset|spacing|large"},"blockGap":"var:preset|spacing|medium"},"shadow":"var:preset|shadow|dhali-soft-blue","@mobile":{"spacing":{"padding":{"top":"var:preset|spacing|medium","right":"var:preset|spacing|medium","bottom":"var:preset|spacing|medium","left":"var:preset|spacing|medium"}}}},"backgroundColor":"base","layout":{"type":"flex","orientation":"vertical","justifyContent":"stretch","verticalAlignment":"space-between","flexWrap":"nowrap"}} -->
<div class="wp-block-group has-base-background-color has-background" style="border-top-color:var(--wp--preset--color--primary-accent);border-top-width:4px;min-height:100%;padding-top:var(--wp--preset--spacing--large);padding-right:var(--wp--preset--spacing--large);padding-bottom:var(--wp--preset--spacing--large);padding-left:var(--wp--preset--spacing--large);box-shadow:var(--wp--preset--shadow--dhali-soft-blue)"><!-- wp:group {"metadata":{"name":"Card Content"},"style":{"spacing":{"blockGap":"var:preset|spacing|small"}},"layout":{"type":"flex","orientation":"vertical","justifyContent":"stretch"}} -->
<div class="wp-block-group"><!-- wp:icon {"icon":"ollie/heart","textColor":"primary","style":{"dimensions":{"width":"28px"}}} /-->

<!-- wp:heading {"level":3,"textColor":"primary-alt","fontSize":"large"} -->
<h3 class="wp-block-heading has-primary-alt-color has-text-color has-large-font-size">' . esc_html__( 'This is a title', 'dhali' ) . '</h3>
<!-- /wp:heading -->

<!-- wp:paragraph {"textColor":"main-accent"} -->
<p class="has-main-accent-color has-text-color">' . esc_html__( 'This is an example of paragraph text', 'dhali' ) . '</p>
<!-- /wp:paragraph --></div>
<!-- /wp:group -->

<!-- wp:buttons -->
<div class="wp-block-buttons"><!-- wp:button {"textColor":"primary","style":{"color":{"background":"#00000000"},"border":{"bottom":{"color":"var:preset|color|primary-accent","width":"2px"},"radius":"0px"},"spacing":{"padding":{"left":"0","right":"0"}}},"icon":"arrow-right"} -->
<div class="wp-block-button"><a class="wp-block-button__link has-primary-color has-text-color has-background wp-element-button" style="border-radius:0px;border-bottom-color:var(--wp--preset--color--primary-accent);border-bottom-width:2px;background-color:#00000000;padding-right:0;padding-left:0">' . esc_html__( 'Learn more', 'dhali' ) . '</a></div>
<!-- /wp:button --></div>
<!-- /wp:buttons --></div>
<!-- /wp:group -->',
);
