<?php
/**
 * Link Tile Card Grid.
 *
 * Section with an eyebrow, heading and intro paragraph above a native
 * four-column Grid of eight equal-height bordered link tiles. Six tiles use
 * the base background with a circular arrow icon; the last two use the
 * secondary background with a caption and an external-link icon.
 *
 * Every tile shares one Group structure: Card Text + Card Footer. Tile links
 * are intentionally unset. To link a tile, select its "Link Card" Group and
 * use Ollie's group link control; enable "Open in new tab" for external
 * destinations and fill in "Screen reader label" so assistive technology
 * does not announce the raw URL. Icons are decorative (no aria label).
 */

$dhali_tile_text = '<!-- wp:group {"metadata":{"name":"Card Text"},"style":{"spacing":{"blockGap":"var:preset|spacing|small"}},"layout":{"type":"flex","orientation":"vertical","justifyContent":"stretch"}} -->
<div class="wp-block-group"><!-- wp:paragraph {"style":{"typography":{"fontWeight":"700","textTransform":"uppercase","letterSpacing":"0.1em"}},"textColor":"primary","fontSize":"x-small"} -->
<p class="has-primary-color has-text-color has-x-small-font-size" style="font-weight:700;letter-spacing:0.1em;text-transform:uppercase">' . esc_html__( 'Category', 'dhali' ) . '</p>
<!-- /wp:paragraph -->

<!-- wp:heading {"level":3,"fontSize":"large"} -->
<h3 class="wp-block-heading has-large-font-size">' . esc_html__( 'This is a title', 'dhali' ) . '</h3>
<!-- /wp:heading --></div>
<!-- /wp:group -->';

$dhali_tile_open = static function ( $background ) {
	return '<!-- wp:group {"metadata":{"name":"Link Card"},"style":{"dimensions":{"minHeight":"100%"},"border":{"width":"1px"},"spacing":{"padding":{"top":"var:preset|spacing|medium","right":"var:preset|spacing|medium","bottom":"var:preset|spacing|medium","left":"var:preset|spacing|medium"},"blockGap":"var:preset|spacing|medium"}},"backgroundColor":"' . $background . '","borderColor":"border-light","layout":{"type":"flex","orientation":"vertical","justifyContent":"stretch","verticalAlignment":"space-between","flexWrap":"nowrap"}} -->
<div class="wp-block-group has-border-color has-border-light-border-color has-' . $background . '-background-color has-background" style="border-width:1px;min-height:100%;padding-top:var(--wp--preset--spacing--medium);padding-right:var(--wp--preset--spacing--medium);padding-bottom:var(--wp--preset--spacing--medium);padding-left:var(--wp--preset--spacing--medium)">';
};

$dhali_tile_close = '</div>
<!-- /wp:group -->';

$dhali_arrow_footer = '<!-- wp:group {"metadata":{"name":"Card Footer"},"layout":{"type":"flex","flexWrap":"nowrap"}} -->
<div class="wp-block-group"><!-- wp:icon {"icon":"core/arrow-right","textColor":"primary","backgroundColor":"secondary","style":{"border":{"radius":"var:preset|border-radius|full"},"spacing":{"padding":{"top":"0.5rem","right":"0.5rem","bottom":"0.5rem","left":"0.5rem"}},"dimensions":{"width":"2.5rem"}}} /--></div>
<!-- /wp:group -->';

$dhali_external_footer = '<!-- wp:group {"metadata":{"name":"Card Footer"},"className":"is-layout-flex is-horizontal wp-block-group-is-layout-flex items-justified-space-between","style":{"spacing":{"blockGap":"var:preset|spacing|small"}},"layout":{"type":"flex","flexWrap":"nowrap","justifyContent":"space-between","verticalAlignment":"bottom"}} -->
<div class="wp-block-group is-layout-flex is-horizontal wp-block-group-is-layout-flex items-justified-space-between"><!-- wp:paragraph {"textColor":"main","fontSize":"small"} -->
<p class="has-main-color has-text-color has-small-font-size">' . esc_html__( 'This is an example of paragraph text', 'dhali' ) . '</p>
<!-- /wp:paragraph -->

<!-- wp:icon {"icon":"core/external","textColor":"primary","style":{"dimensions":{"width":"1.25rem"}}} /--></div>
<!-- /wp:group -->';

$dhali_arrow_tile    = $dhali_tile_open( 'base' ) . $dhali_tile_text . "\n\n" . $dhali_arrow_footer . $dhali_tile_close;
$dhali_external_tile = $dhali_tile_open( 'secondary' ) . $dhali_tile_text . "\n\n" . $dhali_external_footer . $dhali_tile_close;

return array(
	'title'         => __( 'Link Tile Card Grid', 'dhali' ),
	'categories'    => array( 'dhali-web-development', 'card' ),
	'description'   => _x( 'A section intro above a responsive four-column grid of eight equal-height bordered link tiles: six with a circular arrow and two tinted tiles with a caption and external-link icon.', 'Block pattern description', 'dhali' ),
	'keywords'      => array( 'card', 'grid', 'tiles', 'link', 'category', 'external', 'arrow' ),
	'viewportWidth' => 1500,
	'content'       => '<!-- wp:group {"tagName":"section","metadata":{"name":"Link Tile Card Grid","categories":["dhali-web-development","card"],"patternName":"dhali-patterns/card-grid-link-tiles"},"align":"full","style":{"spacing":{"margin":{"top":"0","bottom":"0"},"padding":{"top":"var:preset|spacing|x-large","bottom":"var:preset|spacing|x-large","right":"var:preset|spacing|medium","left":"var:preset|spacing|medium"}}},"backgroundColor":"base","layout":{"type":"constrained"}} -->
<section class="wp-block-group alignfull has-base-background-color has-background" style="margin-top:0;margin-bottom:0;padding-top:var(--wp--preset--spacing--x-large);padding-right:var(--wp--preset--spacing--medium);padding-bottom:var(--wp--preset--spacing--x-large);padding-left:var(--wp--preset--spacing--medium)"><!-- wp:group {"metadata":{"name":"Inner"},"align":"wide","style":{"spacing":{"blockGap":"var:preset|spacing|large"}},"layout":{"type":"default"}} -->
<div class="wp-block-group alignwide"><!-- wp:group {"metadata":{"name":"Section Intro"},"style":{"spacing":{"blockGap":"var:preset|spacing|small"}},"layout":{"type":"flex","orientation":"vertical","justifyContent":"stretch"}} -->
<div class="wp-block-group"><!-- wp:paragraph {"style":{"typography":{"fontWeight":"700","textTransform":"uppercase","letterSpacing":"0.1em"}},"textColor":"primary","fontSize":"x-small"} -->
<p class="has-primary-color has-text-color has-x-small-font-size" style="font-weight:700;letter-spacing:0.1em;text-transform:uppercase">' . esc_html__( 'Section label', 'dhali' ) . '</p>
<!-- /wp:paragraph -->

<!-- wp:heading {"fontSize":"x-large"} -->
<h2 class="wp-block-heading has-x-large-font-size">' . esc_html__( 'This is a title', 'dhali' ) . '</h2>
<!-- /wp:heading -->

<!-- wp:paragraph {"textColor":"main"} -->
<p class="has-main-color has-text-color">' . esc_html__( 'This is an example of paragraph text', 'dhali' ) . '</p>
<!-- /wp:paragraph --></div>
<!-- /wp:group -->

<!-- wp:group {"metadata":{"name":"Card Grid"},"style":{"spacing":{"blockGap":"var:preset|spacing|medium"}},"layout":{"type":"grid","columnCount":4,"minimumColumnWidth":"14rem"}} -->
<div class="wp-block-group">' . str_repeat( $dhali_arrow_tile . "\n\n", 6 ) . $dhali_external_tile . "\n\n" . $dhali_external_tile . '</div>
<!-- /wp:group --></div>
<!-- /wp:group --></section>
<!-- /wp:group -->',
);
