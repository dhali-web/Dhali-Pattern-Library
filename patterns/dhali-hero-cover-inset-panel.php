<?php
/**
 * Hero: Cover with inset content panel.
 *
 * Full-width Cover with a token-based gradient overlay and a bordered,
 * left-aligned content panel (eyebrow, heading, text, two buttons).
 */
return array(
	'title'         => __( 'Hero – Cover with Inset Panel', 'dhali' ),
	'categories'    => array( 'dhali-web-development' ),
	'description'   => _x( 'A full-width hero with a background image, gradient overlay, and a bordered left-aligned content panel with eyebrow, heading, text and two buttons.', 'Block pattern description', 'dhali' ),
	'keywords'      => array( 'hero', 'cover', 'banner', 'panel', 'call to action', 'header image' ),
	'viewportWidth' => 1500,
	'content'       => '
<!-- wp:group {"metadata":{"name":"Hero – Cover with Inset Panel","categories":["dhali-web-development"],"patternName":"dhali-patterns/dhali-hero-cover-inset-panel"},"tagName":"section","align":"full","className":"dhali-hero-cover-inset-panel","style":{"spacing":{"margin":{"top":"0","bottom":"0"},"padding":{"top":"0","bottom":"0","left":"0","right":"0"}}},"layout":{"type":"default"}} -->
<section class="wp-block-group alignfull dhali-hero-cover-inset-panel" style="margin-top:0;margin-bottom:0;padding-top:0;padding-right:0;padding-bottom:0;padding-left:0"><!-- wp:cover {"url":"' . esc_url( plugin_dir_url( dirname( __FILE__ ) ) . 'assets/images/placeholder-wide-16x9.webp' ) . '","dimRatio":100,"customGradient":"linear-gradient(90deg,var(--wp--preset--color--primary-alt) 25%,transparent 65%)","focalPoint":{"x":0.7,"y":0.5},"minHeight":600,"minHeightUnit":"px","sizeSlug":"full","contentPosition":"center center","align":"full","style":{"spacing":{"padding":{"top":"var:preset|spacing|x-large","bottom":"var:preset|spacing|x-large","left":"var:preset|spacing|medium","right":"var:preset|spacing|medium"}}},"layout":{"type":"constrained"}} -->
<div class="wp-block-cover alignfull" style="padding-top:var(--wp--preset--spacing--x-large);padding-right:var(--wp--preset--spacing--medium);padding-bottom:var(--wp--preset--spacing--x-large);padding-left:var(--wp--preset--spacing--medium);min-height:600px"><img class="wp-block-cover__image-background size-full" alt="" src="' . esc_url( plugin_dir_url( dirname( __FILE__ ) ) . 'assets/images/placeholder-wide-16x9.webp' ) . '" style="object-position:70% 50%" data-object-fit="cover" data-object-position="70% 50%"/><span aria-hidden="true" class="wp-block-cover__background has-background-dim-100 has-background-dim wp-block-cover__gradient-background has-background-gradient" style="background:linear-gradient(90deg,var(--wp--preset--color--primary-alt) 25%,transparent 65%)"></span><div class="wp-block-cover__inner-container"><!-- wp:group {"align":"wide","layout":{"type":"constrained","contentSize":"36rem","justifyContent":"left"}} -->
<div class="wp-block-group alignwide"><!-- wp:group {"style":{"spacing":{"padding":{"top":"var:preset|spacing|large","bottom":"var:preset|spacing|large","left":"var:preset|spacing|large","right":"var:preset|spacing|large"},"blockGap":"var:preset|spacing|medium"},"border":{"width":"1px"},"shadow":"var:preset|shadow|dhali-offset-blue"},"backgroundColor":"primary-alt","borderColor":"border-dark","layout":{"type":"default"}} -->
<div class="wp-block-group has-border-color has-border-dark-border-color has-primary-alt-background-color has-background" style="border-width:1px;padding-top:var(--wp--preset--spacing--large);padding-right:var(--wp--preset--spacing--large);padding-bottom:var(--wp--preset--spacing--large);padding-left:var(--wp--preset--spacing--large);box-shadow:var(--wp--preset--shadow--dhali-offset-blue)"><!-- wp:paragraph {"style":{"typography":{"textTransform":"uppercase","letterSpacing":"0.15em","fontWeight":"600"}},"textColor":"primary-accent","fontSize":"x-small"} -->
<p class="has-primary-accent-color has-text-color has-x-small-font-size" style="font-weight:600;letter-spacing:0.15em;text-transform:uppercase">' . esc_html__( 'Eyebrow text', 'dhali' ) . '</p>
<!-- /wp:paragraph -->

<!-- wp:heading {"level":1,"style":{"typography":{"lineHeight":"1.05"}},"textColor":"base","fontSize":"xx-large"} -->
<h1 class="wp-block-heading has-base-color has-text-color has-xx-large-font-size" style="line-height:1.05">' . esc_html__( 'This is a title', 'dhali' ) . '</h1>
<!-- /wp:heading -->

<!-- wp:paragraph {"textColor":"base","fontSize":"base"} -->
<p class="has-base-color has-text-color has-base-font-size">' . esc_html__( 'This is an example of paragraph text', 'dhali' ) . '</p>
<!-- /wp:paragraph -->

<!-- wp:buttons {"style":{"spacing":{"margin":{"top":"var:preset|spacing|small"}}}} -->
<div class="wp-block-buttons" style="margin-top:var(--wp--preset--spacing--small)"><!-- wp:button {"className":"is-style-button-light"} -->
<div class="wp-block-button is-style-button-light"><a class="wp-block-button__link wp-element-button">' . esc_html__( 'Primary action', 'dhali' ) . '</a></div>
<!-- /wp:button -->

<!-- wp:button {"textColor":"base","borderColor":"base","style":{"color":{"background":"transparent"},"border":{"width":"1px"}}} -->
<div class="wp-block-button"><a class="wp-block-button__link has-base-color has-text-color has-background has-border-color has-base-border-color wp-element-button" style="border-width:1px;background-color:transparent">' . esc_html__( 'Secondary action', 'dhali' ) . '</a></div>
<!-- /wp:button --></div>
<!-- /wp:buttons --></div>
<!-- /wp:group --></div>
<!-- /wp:group --></div></div>
<!-- /wp:cover --></section>
<!-- /wp:group -->
',
);
