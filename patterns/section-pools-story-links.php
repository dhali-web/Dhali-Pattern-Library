<?php
/**
 * Pools, story and links section: three stacked bands divided by light
 * border separators. Band one has an eyebrow, heading, two tinted location
 * tiles with an Ollie map-pin icon and a text-link button. Bands two and
 * three pair an eyebrow, heading and paragraph with a right-aligned button
 * (outline, then brand) that wraps below the text on narrow screens.
 */

$dhali_pool_tile = '<!-- wp:column -->
<div class="wp-block-column"><!-- wp:group {"metadata":{"name":"Pool Tile"},"style":{"dimensions":{"minHeight":"100%"},"spacing":{"padding":{"top":"var:preset|spacing|medium","right":"var:preset|spacing|medium","bottom":"var:preset|spacing|medium","left":"var:preset|spacing|medium"},"blockGap":"var:preset|spacing|small"}},"backgroundColor":"secondary","layout":{"type":"flex","flexWrap":"nowrap","verticalAlignment":"center"}} -->
<div class="wp-block-group has-secondary-background-color has-background" style="min-height:100%;padding-top:var(--wp--preset--spacing--medium);padding-right:var(--wp--preset--spacing--medium);padding-bottom:var(--wp--preset--spacing--medium);padding-left:var(--wp--preset--spacing--medium)"><!-- wp:icon {"icon":"ollie/map-pin","style":{"dimensions":{"width":"24px"}},"textColor":"primary"} /-->

<!-- wp:heading {"level":3,"fontSize":"small"} -->
<h3 class="wp-block-heading has-small-font-size">' . esc_html__( 'This is a title', 'dhali' ) . '</h3>
<!-- /wp:heading --></div>
<!-- /wp:group --></div>
<!-- /wp:column -->';

$dhali_band_text = '<!-- wp:group {"metadata":{"name":"Band Text"},"style":{"spacing":{"blockGap":"var:preset|spacing|small"},"layout":{"selfStretch":"fixed","flexSize":"var(\u002d\u002dwp\u002d\u002dstyle\u002d\u002dglobal\u002d\u002dcontent-size)"}},"layout":{"type":"default"}} -->
<div class="wp-block-group"><!-- wp:paragraph {"style":{"typography":{"fontWeight":"700","textTransform":"uppercase","letterSpacing":"0.1em"}},"textColor":"primary","fontSize":"x-small"} -->
<p class="has-primary-color has-text-color has-x-small-font-size" style="font-weight:700;letter-spacing:0.1em;text-transform:uppercase">' . esc_html__( 'Section label', 'dhali' ) . '</p>
<!-- /wp:paragraph -->

<!-- wp:heading {"fontSize":"xx-large"} -->
<h2 class="wp-block-heading has-xx-large-font-size">' . esc_html__( 'This is a title', 'dhali' ) . '</h2>
<!-- /wp:heading -->

<!-- wp:paragraph {"textColor":"main"} -->
<p class="has-main-color has-text-color">' . esc_html__( 'This is an example of paragraph text', 'dhali' ) . '</p>
<!-- /wp:paragraph --></div>
<!-- /wp:group -->';

return array(
	'title'         => __( 'Section: Pools, Story and Links', 'dhali' ),
	'categories'    => array( 'dhali-web-development' ),
	'description'   => _x( 'Three stacked bands divided by light separators: an eyebrow and heading with two tinted location tiles and a text link, then two eyebrow, heading and paragraph bands with right-aligned outline and brand buttons that wrap below the text on small screens.', 'Block pattern description', 'dhali' ),
	'keywords'      => array( 'locations', 'pools', 'facilities', 'story', 'history', 'links', 'call to action', 'section' ),
	'viewportWidth' => 1500,
	'content'       => '<!-- wp:group {"tagName":"section","metadata":{"name":"Pools Story Links","categories":["dhali-web-development"],"patternName":"dhali-patterns/section-pools-story-links"},"align":"full","style":{"spacing":{"margin":{"top":"0","bottom":"0"},"padding":{"top":"var:preset|spacing|medium","bottom":"var:preset|spacing|medium","right":"var:preset|spacing|medium","left":"var:preset|spacing|medium"},"blockGap":"0"}},"layout":{"type":"constrained"}} -->
<section class="wp-block-group alignfull" style="margin-top:0;margin-bottom:0;padding-top:var(--wp--preset--spacing--medium);padding-right:var(--wp--preset--spacing--medium);padding-bottom:var(--wp--preset--spacing--medium);padding-left:var(--wp--preset--spacing--medium)"><!-- wp:group {"metadata":{"name":"Pools Band"},"align":"wide","style":{"border":{"top":{"color":"var:preset|color|border-light","width":"1px"}},"spacing":{"padding":{"top":"var:preset|spacing|large","bottom":"var:preset|spacing|large"},"blockGap":"var:preset|spacing|medium"}},"layout":{"type":"default"}} -->
<div class="wp-block-group alignwide" style="border-top-color:var(--wp--preset--color--border-light);border-top-width:1px;padding-top:var(--wp--preset--spacing--large);padding-bottom:var(--wp--preset--spacing--large)"><!-- wp:group {"metadata":{"name":"Titles"},"style":{"spacing":{"blockGap":"var:preset|spacing|small"}},"layout":{"type":"default"}} -->
<div class="wp-block-group"><!-- wp:paragraph {"style":{"typography":{"fontWeight":"700","textTransform":"uppercase","letterSpacing":"0.1em"}},"textColor":"primary","fontSize":"x-small"} -->
<p class="has-primary-color has-text-color has-x-small-font-size" style="font-weight:700;letter-spacing:0.1em;text-transform:uppercase">' . esc_html__( 'Section label', 'dhali' ) . '</p>
<!-- /wp:paragraph -->

<!-- wp:heading {"fontSize":"xx-large"} -->
<h2 class="wp-block-heading has-xx-large-font-size">' . esc_html__( 'This is a title', 'dhali' ) . '</h2>
<!-- /wp:heading --></div>
<!-- /wp:group -->

<!-- wp:columns {"metadata":{"name":"Pool Tiles"},"style":{"spacing":{"blockGap":{"top":"var:preset|spacing|small","left":"var:preset|spacing|small"}}}} -->
<div class="wp-block-columns">' . $dhali_pool_tile . '

' . $dhali_pool_tile . '</div>
<!-- /wp:columns -->

<!-- wp:buttons -->
<div class="wp-block-buttons"><!-- wp:button {"textColor":"primary","className":"is-style-button-light","style":{"spacing":{"padding":{"top":"0","right":"0","bottom":"0","left":"0"}}},"icon":"external"} -->
<div class="wp-block-button is-style-button-light"><a class="wp-block-button__link has-primary-color has-text-color wp-element-button" style="padding-top:0;padding-right:0;padding-bottom:0;padding-left:0">' . esc_html__( 'Learn more', 'dhali' ) . '</a></div>
<!-- /wp:button --></div>
<!-- /wp:buttons --></div>
<!-- /wp:group -->

<!-- wp:group {"metadata":{"name":"Story Band"},"align":"wide","className":"items-justified-space-between","style":{"border":{"top":{"color":"var:preset|color|border-light","width":"1px"}},"spacing":{"padding":{"top":"var:preset|spacing|large","bottom":"var:preset|spacing|large"},"blockGap":"var:preset|spacing|medium"}},"layout":{"type":"flex","flexWrap":"wrap","justifyContent":"space-between","verticalAlignment":"bottom"}} -->
<div class="wp-block-group alignwide items-justified-space-between" style="border-top-color:var(--wp--preset--color--border-light);border-top-width:1px;padding-top:var(--wp--preset--spacing--large);padding-bottom:var(--wp--preset--spacing--large)">' . $dhali_band_text . '

<!-- wp:buttons -->
<div class="wp-block-buttons"><!-- wp:button {"textColor":"primary","className":"is-style-outline","icon":"external"} -->
<div class="wp-block-button is-style-outline"><a class="wp-block-button__link has-primary-color has-text-color wp-element-button">' . esc_html__( 'Learn more', 'dhali' ) . '</a></div>
<!-- /wp:button --></div>
<!-- /wp:buttons --></div>
<!-- /wp:group -->

<!-- wp:group {"metadata":{"name":"Links Band"},"align":"wide","className":"items-justified-space-between","style":{"border":{"top":{"color":"var:preset|color|border-light","width":"1px"},"bottom":{"color":"var:preset|color|border-light","width":"1px"}},"spacing":{"padding":{"top":"var:preset|spacing|large","bottom":"var:preset|spacing|large"},"blockGap":"var:preset|spacing|medium"}},"layout":{"type":"flex","flexWrap":"wrap","justifyContent":"space-between","verticalAlignment":"bottom"}} -->
<div class="wp-block-group alignwide items-justified-space-between" style="border-top-color:var(--wp--preset--color--border-light);border-top-width:1px;border-bottom-color:var(--wp--preset--color--border-light);border-bottom-width:1px;padding-top:var(--wp--preset--spacing--large);padding-bottom:var(--wp--preset--spacing--large)">' . $dhali_band_text . '

<!-- wp:buttons -->
<div class="wp-block-buttons"><!-- wp:button {"className":"is-style-button-brand","icon":"external"} -->
<div class="wp-block-button is-style-button-brand"><a class="wp-block-button__link wp-element-button">' . esc_html__( 'Learn more', 'dhali' ) . '</a></div>
<!-- /wp:button --></div>
<!-- /wp:buttons --></div>
<!-- /wp:group --></section>
<!-- /wp:group -->',
);
