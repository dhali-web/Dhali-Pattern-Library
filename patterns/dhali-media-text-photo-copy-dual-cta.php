<?php
/**
 * Media + Text: photo left, copy right with two CTAs.
 *
 * Full-width gradient section with a wide 60/40 Columns row: a 16:9 cover-cropped
 * image beside an eyebrow, H2, paragraph and two native buttons. Columns stack
 * natively (image first) on narrow screens. No custom CSS or responsive overrides.
 */
return array(
	'title'         => __( 'Media Text – Photo + Copy Dual CTA', 'dhali' ),
	'categories'    => array( 'dhali-web-development' ),
	'description'   => _x( 'A full-width gradient media and text section with a 16:9 photo on the left and an eyebrow, heading, paragraph and two buttons on the right.', 'Block pattern description', 'dhali' ),
	'keywords'      => array( 'media', 'text', 'image', 'photo', 'split', 'cta', 'buttons', 'gradient' ),
	'viewportWidth' => 1500,
	'content'       => '
<!-- wp:group {"tagName":"section","metadata":{"name":"Media Text – Photo + Copy Dual CTA","categories":["dhali-web-development"],"patternName":"dhali-patterns/dhali-media-text-photo-copy-dual-cta"},"align":"full","className":"dhali-media-text-photo-copy-dual-cta","style":{"spacing":{"margin":{"top":"0","bottom":"0"},"padding":{"top":"var:preset|spacing|x-large","bottom":"var:preset|spacing|x-large","left":"var:preset|spacing|medium","right":"var:preset|spacing|medium"}},"color":{"gradient":"linear-gradient(135deg,var(--wp--preset--color--primary-alt) 0%,var(--wp--preset--color--primary) 100%)"}},"textColor":"base","layout":{"type":"constrained"}} -->
<section class="wp-block-group alignfull dhali-media-text-photo-copy-dual-cta has-base-color has-text-color has-background" style="background:linear-gradient(135deg,var(--wp--preset--color--primary-alt) 0%,var(--wp--preset--color--primary) 100%);margin-top:0;margin-bottom:0;padding-top:var(--wp--preset--spacing--x-large);padding-right:var(--wp--preset--spacing--medium);padding-bottom:var(--wp--preset--spacing--x-large);padding-left:var(--wp--preset--spacing--medium)"><!-- wp:columns {"verticalAlignment":"center","align":"wide","style":{"spacing":{"blockGap":{"top":"var:preset|spacing|large","left":"var:preset|spacing|x-large"}}}} -->
<div class="wp-block-columns alignwide are-vertically-aligned-center"><!-- wp:column {"verticalAlignment":"center","width":"60%","metadata":{"name":"Media"}} -->
<div class="wp-block-column is-vertically-aligned-center" style="flex-basis:60%"><!-- wp:image {"aspectRatio":"16/9","scale":"cover","sizeSlug":"full","style":{"spacing":{"margin":{"bottom":"0"}}}} -->
<figure class="wp-block-image size-full" style="margin-bottom:0"><img src="' . esc_url( plugin_dir_url( dirname( __FILE__ ) ) . 'assets/images/placeholder-wide-16x9.webp' ) . '" alt="" style="aspect-ratio:16/9;object-fit:cover"/></figure>
<!-- /wp:image --></div>
<!-- /wp:column -->

<!-- wp:column {"verticalAlignment":"center","width":"40%","metadata":{"name":"Copy"},"style":{"spacing":{"blockGap":"var:preset|spacing|small"}}} -->
<div class="wp-block-column is-vertically-aligned-center" style="flex-basis:40%"><!-- wp:paragraph {"style":{"typography":{"textTransform":"uppercase","letterSpacing":"0.15em","fontWeight":"600"}},"textColor":"primary-accent","fontSize":"x-small"} -->
<p class="has-primary-accent-color has-text-color has-x-small-font-size" style="font-weight:600;letter-spacing:0.15em;text-transform:uppercase">' . esc_html__( 'Eyebrow text', 'dhali' ) . '</p>
<!-- /wp:paragraph -->

<!-- wp:heading {"style":{"typography":{"lineHeight":"1.05"}},"textColor":"base","fontSize":"xx-large"} -->
<h2 class="wp-block-heading has-base-color has-text-color has-xx-large-font-size" style="line-height:1.05">' . esc_html__( 'This is a title', 'dhali' ) . '</h2>
<!-- /wp:heading -->

<!-- wp:paragraph {"style":{"typography":{"lineHeight":"1.7"}},"textColor":"primary-alt-accent","fontSize":"base"} -->
<p class="has-primary-alt-accent-color has-text-color has-base-font-size" style="line-height:1.7">' . esc_html__( 'This is an example of paragraph text', 'dhali' ) . '</p>
<!-- /wp:paragraph -->

<!-- wp:buttons {"style":{"spacing":{"margin":{"top":"var:preset|spacing|small"},"blockGap":"var:preset|spacing|small"}}} -->
<div class="wp-block-buttons" style="margin-top:var(--wp--preset--spacing--small)"><!-- wp:button {"className":"is-style-button-light","icon":"arrow-right"} -->
<div class="wp-block-button is-style-button-light"><a class="wp-block-button__link wp-element-button">' . esc_html__( 'Primary action', 'dhali' ) . '</a></div>
<!-- /wp:button -->

<!-- wp:button {"textColor":"base","className":"is-style-outline","icon":"arrow-right"} -->
<div class="wp-block-button is-style-outline"><a class="wp-block-button__link has-base-color has-text-color wp-element-button">' . esc_html__( 'Secondary action', 'dhali' ) . '</a></div>
<!-- /wp:button --></div>
<!-- /wp:buttons --></div>
<!-- /wp:column --></div>
<!-- /wp:columns --></section>
<!-- /wp:group -->
',
);
