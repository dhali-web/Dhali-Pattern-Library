<?php
/**
 * Card: icon, decorative number + text link.
 *
 * Standalone "Icon Number Link Card" Group: a top row (flex, space-between) holds a small
 * Ollie map-pin core/icon in a tinted box and an oversized pale step number; a theme h3
 * and a text-style core/button with the Ollie "external" button icon follow. The CTA has
 * no URL until an editor sets one. No section wrapper (approved exception) so the card can
 * be placed directly in a parent Grid or Columns layout. Fluid theme tokens only; no
 * responsive overrides, no custom CSS, no shadow.
 */
return array(
	'title'         => __( 'Card – Icon, Number + Text Link', 'dhali' ),
	'categories'    => array( 'dhali-web-development', 'card' ),
	'description'   => _x( 'A bordered card with a small icon, an oversized decorative number, a heading and a text link with an external-link icon.', 'Block pattern description', 'dhali' ),
	'keywords'      => array( 'card', 'icon', 'number', 'location', 'link', 'external', 'cta' ),
	'viewportWidth' => 1500,
	'content'       => '<!-- wp:group {"metadata":{"name":"Icon Number Link Card","categories":["dhali-web-development","card"],"patternName":"dhali-patterns/card-icon-number-link"},"style":{"border":{"width":"1px"},"spacing":{"padding":{"top":"var:preset|spacing|large","right":"var:preset|spacing|large","bottom":"var:preset|spacing|large","left":"var:preset|spacing|large"},"blockGap":"var:preset|spacing|medium"}},"backgroundColor":"base","borderColor":"border-light","layout":{"type":"default"}} -->
<div class="wp-block-group has-border-color has-border-light-border-color has-base-background-color has-background" style="border-width:1px;padding-top:var(--wp--preset--spacing--large);padding-right:var(--wp--preset--spacing--large);padding-bottom:var(--wp--preset--spacing--large);padding-left:var(--wp--preset--spacing--large)"><!-- wp:group {"metadata":{"name":"Top Row"},"layout":{"type":"flex","flexWrap":"nowrap","justifyContent":"space-between","verticalAlignment":"top"}} -->
<div class="wp-block-group"><!-- wp:group {"metadata":{"name":"Icon Box"},"style":{"spacing":{"padding":{"top":"var:preset|spacing|small","right":"var:preset|spacing|small","bottom":"var:preset|spacing|small","left":"var:preset|spacing|small"}}},"backgroundColor":"secondary","layout":{"type":"constrained"}} -->
<div class="wp-block-group has-secondary-background-color has-background" style="padding-top:var(--wp--preset--spacing--small);padding-right:var(--wp--preset--spacing--small);padding-bottom:var(--wp--preset--spacing--small);padding-left:var(--wp--preset--spacing--small)"><!-- wp:icon {"icon":"ollie/map-pin","textColor":"primary","style":{"dimensions":{"width":"24px"}}} /--></div>
<!-- /wp:group -->

<!-- wp:paragraph {"style":{"typography":{"fontWeight":"700","lineHeight":"1"}},"textColor":"secondary","fontSize":"xx-large"} -->
<p class="has-secondary-color has-text-color has-xx-large-font-size" style="font-weight:700;line-height:1">01</p>
<!-- /wp:paragraph --></div>
<!-- /wp:group -->

<!-- wp:heading {"level":3} -->
<h3 class="wp-block-heading">' . esc_html__( 'This is a title', 'dhali' ) . '</h3>
<!-- /wp:heading -->

<!-- wp:buttons -->
<div class="wp-block-buttons"><!-- wp:button {"textColor":"primary","style":{"color":{"background":"#00000000"},"typography":{"fontWeight":"600"},"spacing":{"padding":{"top":"0","right":"0","bottom":"0","left":"0"}}},"fontSize":"small","icon":"external"} -->
<div class="wp-block-button has-custom-font-size has-small-font-size"><a class="wp-block-button__link has-primary-color has-text-color has-background has-small-font-size has-custom-font-size wp-element-button" style="background-color:#00000000;padding-top:0;padding-right:0;padding-bottom:0;padding-left:0;font-weight:600">' . esc_html__( 'View details', 'dhali' ) . '</a></div>
<!-- /wp:button --></div>
<!-- /wp:buttons --></div>
<!-- /wp:group -->',
);
