<?php
/**
 * Card: gradient archive CTA panel.
 *
 * Wide, square-cornered Group using the Interior Page banner gradient
 * (120deg primary-alt → primary). A wrapping flex row holds an eyebrow,
 * H2 and paragraph on the left and a native Ollie Light button with an
 * arrow-right icon on the right; the button wraps beneath the text on
 * narrow screens. No custom CSS or responsive overrides.
 */
return array(
	'title'         => __( 'Card – Gradient Archive CTA', 'dhali' ),
	'categories'    => array( 'dhali-web-development', 'card' ),
	'description'   => _x( 'A wide gradient call-to-action panel with an eyebrow, heading and short description beside a light button with an arrow icon.', 'Block pattern description', 'dhali' ),
	'keywords'      => array( 'cta', 'call to action', 'gradient', 'archive', 'panel', 'banner', 'button' ),
	'viewportWidth' => 1400,
	'content'       => '
<!-- wp:group {"metadata":{"name":"Gradient Archive CTA","categories":["dhali-web-development","card"],"patternName":"dhali-patterns/card-gradient-archive-cta"},"align":"wide","style":{"color":{"gradient":"linear-gradient(120deg,var(--wp--preset--color--primary-alt) 0%,var(--wp--preset--color--primary) 100%)"},"spacing":{"padding":{"top":"var:preset|spacing|x-large","bottom":"var:preset|spacing|x-large","left":"var:preset|spacing|large","right":"var:preset|spacing|large"}}},"textColor":"base","layout":{"type":"default"}} -->
<div class="wp-block-group alignwide has-base-color has-text-color has-background" style="background:linear-gradient(120deg,var(--wp--preset--color--primary-alt) 0%,var(--wp--preset--color--primary) 100%);padding-top:var(--wp--preset--spacing--x-large);padding-right:var(--wp--preset--spacing--large);padding-bottom:var(--wp--preset--spacing--x-large);padding-left:var(--wp--preset--spacing--large)"><!-- wp:group {"metadata":{"name":"CTA Row"},"style":{"spacing":{"blockGap":"var:preset|spacing|medium"}},"layout":{"type":"flex","flexWrap":"wrap","justifyContent":"space-between","verticalAlignment":"center"}} -->
<div class="wp-block-group"><!-- wp:group {"metadata":{"name":"CTA Text"},"style":{"spacing":{"blockGap":"var:preset|spacing|small"}},"layout":{"type":"flex","orientation":"vertical"}} -->
<div class="wp-block-group"><!-- wp:paragraph {"style":{"typography":{"textTransform":"uppercase","letterSpacing":"0.15em","fontWeight":"600"}},"textColor":"primary-accent","fontSize":"x-small"} -->
<p class="has-primary-accent-color has-text-color has-x-small-font-size" style="font-weight:600;letter-spacing:0.15em;text-transform:uppercase">' . esc_html__( 'Section eyebrow', 'dhali' ) . '</p>
<!-- /wp:paragraph -->

<!-- wp:heading {"style":{"typography":{"lineHeight":"1.05"}},"textColor":"base","fontSize":"xx-large"} -->
<h2 class="wp-block-heading has-base-color has-text-color has-xx-large-font-size" style="line-height:1.05">' . esc_html__( 'Archive Heading', 'dhali' ) . '</h2>
<!-- /wp:heading -->

<!-- wp:paragraph {"textColor":"secondary"} -->
<p class="has-secondary-color has-text-color">' . esc_html__( 'Add a short sentence that explains what visitors will find in this collection.', 'dhali' ) . '</p>
<!-- /wp:paragraph --></div>
<!-- /wp:group -->

<!-- wp:buttons -->
<div class="wp-block-buttons"><!-- wp:button {"className":"is-style-button-light","icon":"arrow-right"} -->
<div class="wp-block-button is-style-button-light"><a class="wp-block-button__link wp-element-button">' . esc_html__( 'Explore the archive', 'dhali' ) . '</a></div>
<!-- /wp:button --></div>
<!-- /wp:buttons --></div>
<!-- /wp:group --></div>
<!-- /wp:group -->
',
);
