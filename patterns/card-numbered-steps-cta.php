<?php
/**
 * Numbered Steps with CTA.
 *
 * Content-column section: eyebrow, heading and intro, two bordered step cards
 * with a number beside the title and description, then a brand button with an
 * Ollie external icon, a short note and a text-link button. Destinations are
 * intentionally left unset for editors to add.
 */
return array(
	'title'         => __( 'Numbered Steps with CTA', 'dhali' ),
	'categories'    => array( 'dhali-web-development', 'card' ),
	'description'   => _x( 'An eyebrow, heading and intro followed by bordered numbered step cards, a brand button with a note, and a text link.', 'Block pattern description', 'dhali' ),
	'keywords'      => array( 'steps', 'process', 'numbered', 'card', 'how it works', 'cta' ),
	'viewportWidth' => 1500,
	'content'       => '
<!-- wp:group {"tagName":"section","metadata":{"name":"Numbered Steps with CTA","categories":["card"],"patternName":"dhali-patterns/card-numbered-steps-cta"},"style":{"spacing":{"margin":{"top":"0","bottom":"0"},"blockGap":"var:preset|spacing|large"}},"layout":{"type":"default"}} -->
<section class="wp-block-group" style="margin-top:0;margin-bottom:0"><!-- wp:group {"metadata":{"name":"Intro"},"style":{"spacing":{"blockGap":"var:preset|spacing|small"}},"layout":{"type":"default"}} -->
<div class="wp-block-group"><!-- wp:paragraph {"metadata":{"name":"Eyebrow"},"style":{"typography":{"textTransform":"uppercase","fontWeight":"700","letterSpacing":"0.12em"}},"textColor":"primary","fontSize":"x-small"} -->
<p class="has-primary-color has-text-color has-x-small-font-size" style="font-weight:700;letter-spacing:0.12em;text-transform:uppercase">' . esc_html__( 'Eyebrow', 'dhali' ) . '</p>
<!-- /wp:paragraph -->

<!-- wp:heading {"textColor":"primary-alt","fontSize":"x-large"} -->
<h2 class="wp-block-heading has-primary-alt-color has-text-color has-x-large-font-size">' . esc_html__( 'This is a title', 'dhali' ) . '</h2>
<!-- /wp:heading -->

<!-- wp:paragraph {"textColor":"main"} -->
<p class="has-main-color has-text-color">' . esc_html__( 'This is an example of paragraph text', 'dhali' ) . '</p>
<!-- /wp:paragraph --></div>
<!-- /wp:group -->

<!-- wp:group {"metadata":{"name":"Steps"},"style":{"spacing":{"blockGap":"var:preset|spacing|medium"}},"layout":{"type":"default"}} -->
<div class="wp-block-group"><!-- wp:group {"metadata":{"name":"Step Card"},"style":{"border":{"width":"1px"},"spacing":{"padding":{"top":"var:preset|spacing|medium","right":"var:preset|spacing|medium","bottom":"var:preset|spacing|medium","left":"var:preset|spacing|medium"},"blockGap":"var:preset|spacing|medium"}},"backgroundColor":"base","borderColor":"border-light","layout":{"type":"flex","flexWrap":"nowrap","verticalAlignment":"center"}} -->
<div class="wp-block-group has-border-color has-border-light-border-color has-base-background-color has-background" style="border-width:1px;padding-top:var(--wp--preset--spacing--medium);padding-right:var(--wp--preset--spacing--medium);padding-bottom:var(--wp--preset--spacing--medium);padding-left:var(--wp--preset--spacing--medium)"><!-- wp:paragraph {"metadata":{"name":"Number"},"style":{"layout":{"selfStretch":"fixedNoShrink","flexSize":"1.2em"},"typography":{"fontWeight":"600","lineHeight":"1"}},"textColor":"primary","fontSize":"x-large","fontFamily":"barlow-condensed"} -->
<p class="has-primary-color has-text-color has-barlow-condensed-font-family has-x-large-font-size" style="font-weight:600;line-height:1">01</p>
<!-- /wp:paragraph -->

<!-- wp:group {"metadata":{"name":"Step Content"},"style":{"spacing":{"blockGap":"var:preset|spacing|small"}},"layout":{"type":"default"}} -->
<div class="wp-block-group"><!-- wp:heading {"level":3,"textColor":"primary-alt","fontSize":"medium"} -->
<h3 class="wp-block-heading has-primary-alt-color has-text-color has-medium-font-size">' . esc_html__( 'This is a title', 'dhali' ) . '</h3>
<!-- /wp:heading -->

<!-- wp:paragraph {"textColor":"main","fontSize":"small"} -->
<p class="has-main-color has-text-color has-small-font-size">' . esc_html__( 'This is an example of paragraph text', 'dhali' ) . '</p>
<!-- /wp:paragraph --></div>
<!-- /wp:group --></div>
<!-- /wp:group -->

<!-- wp:group {"metadata":{"name":"Step Card"},"style":{"border":{"width":"1px"},"spacing":{"padding":{"top":"var:preset|spacing|medium","right":"var:preset|spacing|medium","bottom":"var:preset|spacing|medium","left":"var:preset|spacing|medium"},"blockGap":"var:preset|spacing|medium"}},"backgroundColor":"base","borderColor":"border-light","layout":{"type":"flex","flexWrap":"nowrap","verticalAlignment":"center"}} -->
<div class="wp-block-group has-border-color has-border-light-border-color has-base-background-color has-background" style="border-width:1px;padding-top:var(--wp--preset--spacing--medium);padding-right:var(--wp--preset--spacing--medium);padding-bottom:var(--wp--preset--spacing--medium);padding-left:var(--wp--preset--spacing--medium)"><!-- wp:paragraph {"metadata":{"name":"Number"},"style":{"layout":{"selfStretch":"fixedNoShrink","flexSize":"1.2em"},"typography":{"fontWeight":"600","lineHeight":"1"}},"textColor":"primary","fontSize":"x-large","fontFamily":"barlow-condensed"} -->
<p class="has-primary-color has-text-color has-barlow-condensed-font-family has-x-large-font-size" style="font-weight:600;line-height:1">02</p>
<!-- /wp:paragraph -->

<!-- wp:group {"metadata":{"name":"Step Content"},"style":{"spacing":{"blockGap":"var:preset|spacing|small"}},"layout":{"type":"default"}} -->
<div class="wp-block-group"><!-- wp:heading {"level":3,"textColor":"primary-alt","fontSize":"medium"} -->
<h3 class="wp-block-heading has-primary-alt-color has-text-color has-medium-font-size">' . esc_html__( 'This is a title', 'dhali' ) . '</h3>
<!-- /wp:heading -->

<!-- wp:paragraph {"textColor":"main","fontSize":"small"} -->
<p class="has-main-color has-text-color has-small-font-size">' . esc_html__( 'This is an example of paragraph text', 'dhali' ) . '</p>
<!-- /wp:paragraph --></div>
<!-- /wp:group --></div>
<!-- /wp:group --></div>
<!-- /wp:group -->

<!-- wp:group {"metadata":{"name":"Actions"},"style":{"spacing":{"blockGap":"var:preset|spacing|medium"}},"layout":{"type":"default"}} -->
<div class="wp-block-group"><!-- wp:group {"metadata":{"name":"Primary Action"},"style":{"spacing":{"blockGap":"var:preset|spacing|small"}},"layout":{"type":"flex","flexWrap":"wrap","verticalAlignment":"center"}} -->
<div class="wp-block-group"><!-- wp:buttons -->
<div class="wp-block-buttons"><!-- wp:button {"className":"is-style-button-brand","icon":"external"} -->
<div class="wp-block-button is-style-button-brand"><a class="wp-block-button__link wp-element-button">' . esc_html__( 'Button label', 'dhali' ) . '</a></div>
<!-- /wp:button --></div>
<!-- /wp:buttons -->

<!-- wp:paragraph {"metadata":{"name":"Note"},"textColor":"main","fontSize":"x-small"} -->
<p class="has-main-color has-text-color has-x-small-font-size">' . esc_html__( 'This is a short supporting note', 'dhali' ) . '</p>
<!-- /wp:paragraph --></div>
<!-- /wp:group -->

<!-- wp:buttons -->
<div class="wp-block-buttons"><!-- wp:button {"textColor":"primary","metadata":{"name":"Text Link"},"style":{"color":{"background":"#00000000"},"typography":{"fontWeight":"600"},"spacing":{"padding":{"top":"0","right":"0","bottom":"0","left":"0"}}},"fontSize":"small","icon":"external"} -->
<div class="wp-block-button"><a class="wp-block-button__link has-primary-color has-text-color has-background has-small-font-size has-custom-font-size wp-element-button" style="background-color:#00000000;padding-top:0;padding-right:0;padding-bottom:0;padding-left:0;font-weight:600">' . esc_html__( 'Text link label', 'dhali' ) . '</a></div>
<!-- /wp:button --></div>
<!-- /wp:buttons --></div>
<!-- /wp:group --></section>
<!-- /wp:group -->
',
);
