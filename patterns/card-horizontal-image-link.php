<?php
/**
 * Card: horizontal image + text link.
 *
 * Standalone "Program Card" Group using a native 5-track Grid layout: a cover-cropped
 * core/image spans 2 tracks (≈40%) and a vertical-flex Content group spans 3 (≈60%),
 * with a bottom-aligned underlined text-style CTA. @mobile column spans of 5 stack the
 * image above the content. No section wrapper (approved exception) so the card can be
 * placed directly in a parent Grid or an Advanced Query Loop post template.
 * No custom CSS, no shadow.
 */
return array(
	'title'         => __( 'Card – Horizontal Image + Text Link', 'dhali' ),
	'categories'    => array( 'dhali-web-development', 'card' ),
	'description'   => _x( 'A horizontal card with a cover-cropped image on the left and a heading, short description and underlined text link on the right. Stacks on mobile.', 'Block pattern description', 'dhali' ),
	'keywords'      => array( 'card', 'horizontal', 'image', 'grid', 'program', 'link', 'cta' ),
	'viewportWidth' => 1500,
	'content'       => '<!-- wp:group {"metadata":{"name":"Program Card","categories":["dhali-web-development","card"],"patternName":"dhali-patterns/card-horizontal-image-link"},"style":{"border":{"width":"1px","radius":"var:preset|border-radius|xs"},"spacing":{"padding":{"top":"0","right":"0","bottom":"0","left":"0"},"blockGap":"0"}},"backgroundColor":"base","borderColor":"border-light","layout":{"type":"grid","columnCount":5}} -->
<div class="wp-block-group has-border-color has-border-light-border-color has-base-background-color has-background" style="border-width:1px;border-radius:var(--wp--preset--border-radius--xs);padding-top:0;padding-right:0;padding-bottom:0;padding-left:0"><!-- wp:image {"height":"100%","aspectRatio":"1","scale":"cover","style":{"layout":{"columnSpan":2},"@mobile":{"layout":{"columnSpan":5}},"border":{"radius":{"topLeft":"var:preset|border-radius|xs","bottomLeft":"var:preset|border-radius|xs"}}}} -->
<figure class="wp-block-image is-resized has-custom-border"><img src="' . esc_url( plugin_dir_url( dirname( __FILE__ ) ) . 'assets/images/placeholder-square-1x1.webp' ) . '" alt="' . esc_attr__( 'Placeholder image', 'dhali' ) . '" style="border-top-left-radius:var(--wp--preset--border-radius--xs);border-bottom-left-radius:var(--wp--preset--border-radius--xs);aspect-ratio:1;object-fit:cover;height:100%"/></figure>
<!-- /wp:image -->

<!-- wp:group {"metadata":{"name":"Content"},"style":{"layout":{"columnSpan":3},"@mobile":{"layout":{"columnSpan":5}},"spacing":{"padding":{"top":"var:preset|spacing|medium","right":"var:preset|spacing|medium","bottom":"var:preset|spacing|medium","left":"var:preset|spacing|medium"}}},"layout":{"type":"flex","orientation":"vertical","verticalAlignment":"space-between"}} -->
<div class="wp-block-group" style="padding-top:var(--wp--preset--spacing--medium);padding-right:var(--wp--preset--spacing--medium);padding-bottom:var(--wp--preset--spacing--medium);padding-left:var(--wp--preset--spacing--medium)"><!-- wp:group {"metadata":{"name":"Text"},"style":{"spacing":{"blockGap":"var:preset|spacing|small"}},"layout":{"type":"flex","orientation":"vertical"}} -->
<div class="wp-block-group"><!-- wp:heading {"level":3,"fontSize":"medium"} -->
<h3 class="wp-block-heading has-medium-font-size">' . esc_html__( 'This is a title', 'dhali' ) . '</h3>
<!-- /wp:heading -->

<!-- wp:paragraph {"textColor":"main-accent"} -->
<p class="has-main-accent-color has-text-color">' . esc_html__( 'This is an example of paragraph text', 'dhali' ) . '</p>
<!-- /wp:paragraph --></div>
<!-- /wp:group -->

<!-- wp:buttons -->
<div class="wp-block-buttons"><!-- wp:button {"textColor":"primary","style":{"color":{"background":"#00000000"},"border":{"bottom":{"color":"var:preset|color|primary-accent","width":"2px"},"radius":"0px"},"spacing":{"padding":{"left":"0","right":"0"}}},"icon":"arrow-right"} -->
<div class="wp-block-button"><a class="wp-block-button__link has-primary-color has-text-color has-background wp-element-button" href="#" style="border-radius:0px;border-bottom-color:var(--wp--preset--color--primary-accent);border-bottom-width:2px;background-color:#00000000;padding-right:0;padding-left:0">' . esc_html__( 'Learn more', 'dhali' ) . '</a></div>
<!-- /wp:button --></div>
<!-- /wp:buttons --></div>
<!-- /wp:group --></div>
<!-- /wp:group -->',
);
