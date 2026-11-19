<?php
/**
 * Card: numbered rail + image + tags + text link.
 *
 * Standalone static "Numbered Image Card". The outer Card group is a native 20-column Grid
 * with two children: a full-height Number Rail (span 1; @tablet/@mobile span 2) and a
 * Card Body (span 19; @tablet/@mobile span 18). The Card Body is a nested 19-column Grid:
 * Image (span 7) + Content (span 12) sit side by side (≈5% / 35% / 60% overall) and both
 * span 19 on @mobile, so the image stacks above the content while the rail keeps spanning
 * the full card height. The CTA button ships without a URL (set it during page composition;
 * switch its icon to "external" only for an off-site destination).
 * No Section wrapper (approved exception) so it can sit inside constrained content or a
 * parent Grid. No custom CSS, no shadow, square corners.
 */
return array(
	'title'         => __( 'Card – Numbered Image + Tags + Link', 'dhali' ),
	'categories'    => array( 'dhali-web-development', 'card' ),
	'description'   => _x( 'A horizontal card with a full-height number rail, a cover-cropped image, a heading, short description, wrapping tag chips and a text link. On mobile the image stacks above the content beside the rail.', 'Block pattern description', 'dhali' ),
	'keywords'      => array( 'card', 'numbered', 'number', 'step', 'image', 'tags', 'chips', 'grid', 'link' ),
	'viewportWidth' => 1500,
	'content'       => '<!-- wp:group {"metadata":{"name":"Numbered Image Card","categories":["dhali-web-development","card"],"patternName":"dhali-patterns/card-numbered-image-tags-link"},"style":{"border":{"width":"1px"},"spacing":{"padding":{"top":"0","right":"0","bottom":"0","left":"0"},"blockGap":"0"}},"backgroundColor":"base","borderColor":"border-light","layout":{"type":"grid","columnCount":20}} -->
<div class="wp-block-group has-border-color has-border-light-border-color has-base-background-color has-background" style="border-width:1px;padding-top:0;padding-right:0;padding-bottom:0;padding-left:0"><!-- wp:group {"metadata":{"name":"Number Rail"},"style":{"layout":{"columnSpan":1},"@tablet":{"layout":{"columnSpan":2}},"@mobile":{"layout":{"columnSpan":2}},"spacing":{"padding":{"top":"var:preset|spacing|medium","right":"0","bottom":"var:preset|spacing|medium","left":"0"}}},"backgroundColor":"primary","textColor":"base","layout":{"type":"default"}} -->
<div class="wp-block-group has-base-color has-primary-background-color has-text-color has-background" style="padding-top:var(--wp--preset--spacing--medium);padding-right:0;padding-bottom:var(--wp--preset--spacing--medium);padding-left:0"><!-- wp:paragraph {"style":{"typography":{"fontWeight":"700","textAlign":"center"}},"fontSize":"base","fontFamily":"barlow-condensed"} -->
<p class="has-text-align-center has-barlow-condensed-font-family has-base-font-size" style="font-weight:700">' . esc_html__( '01', 'dhali' ) . '</p>
<!-- /wp:paragraph --></div>
<!-- /wp:group -->

<!-- wp:group {"metadata":{"name":"Card Body"},"style":{"layout":{"columnSpan":19},"@tablet":{"layout":{"columnSpan":18}},"@mobile":{"layout":{"columnSpan":18}},"spacing":{"blockGap":"0"}},"layout":{"type":"grid","columnCount":19}} -->
<div class="wp-block-group"><!-- wp:image {"width":"100%","height":"100%","scale":"cover","style":{"layout":{"columnSpan":7},"@mobile":{"layout":{"columnSpan":19}}}} -->
<figure class="wp-block-image is-resized"><img src="' . esc_url( plugin_dir_url( dirname( __FILE__ ) ) . 'assets/images/placeholder-wide-16x9.webp' ) . '" alt="' . esc_attr__( 'Placeholder image', 'dhali' ) . '" style="object-fit:cover;width:100%;height:100%"/></figure>
<!-- /wp:image -->

<!-- wp:group {"metadata":{"name":"Content"},"style":{"layout":{"columnSpan":12},"@mobile":{"layout":{"columnSpan":19}},"spacing":{"padding":{"top":"var:preset|spacing|medium","right":"var:preset|spacing|medium","bottom":"var:preset|spacing|medium","left":"var:preset|spacing|medium"},"blockGap":"var:preset|spacing|medium"}},"layout":{"type":"flex","orientation":"vertical"}} -->
<div class="wp-block-group" style="padding-top:var(--wp--preset--spacing--medium);padding-right:var(--wp--preset--spacing--medium);padding-bottom:var(--wp--preset--spacing--medium);padding-left:var(--wp--preset--spacing--medium)"><!-- wp:group {"metadata":{"name":"Text"},"style":{"spacing":{"blockGap":"var:preset|spacing|small"}},"layout":{"type":"flex","orientation":"vertical"}} -->
<div class="wp-block-group"><!-- wp:heading {"level":3,"textColor":"primary","fontSize":"large"} -->
<h3 class="wp-block-heading has-primary-color has-text-color has-large-font-size">' . esc_html__( 'This is a title', 'dhali' ) . '</h3>
<!-- /wp:heading -->

<!-- wp:paragraph {"textColor":"main-accent"} -->
<p class="has-main-accent-color has-text-color">' . esc_html__( 'This is an example of paragraph text', 'dhali' ) . '</p>
<!-- /wp:paragraph --></div>
<!-- /wp:group -->

<!-- wp:group {"metadata":{"name":"Tags"},"style":{"spacing":{"blockGap":"var:preset|spacing|20"}},"layout":{"type":"flex","flexWrap":"wrap"}} -->
<div class="wp-block-group"><!-- wp:paragraph {"style":{"spacing":{"padding":{"top":"var:preset|spacing|20","right":"var:preset|spacing|30","bottom":"var:preset|spacing|20","left":"var:preset|spacing|30"}},"typography":{"fontWeight":"700"}},"backgroundColor":"primary-alt-accent","textColor":"primary","fontSize":"x-small"} -->
<p class="has-primary-color has-primary-alt-accent-background-color has-text-color has-background has-x-small-font-size" style="padding-top:var(--wp--preset--spacing--20);padding-right:var(--wp--preset--spacing--30);padding-bottom:var(--wp--preset--spacing--20);padding-left:var(--wp--preset--spacing--30);font-weight:700">' . esc_html__( 'Tag one', 'dhali' ) . '</p>
<!-- /wp:paragraph -->

<!-- wp:paragraph {"style":{"spacing":{"padding":{"top":"var:preset|spacing|20","right":"var:preset|spacing|30","bottom":"var:preset|spacing|20","left":"var:preset|spacing|30"}},"typography":{"fontWeight":"700"}},"backgroundColor":"primary-alt-accent","textColor":"primary","fontSize":"x-small"} -->
<p class="has-primary-color has-primary-alt-accent-background-color has-text-color has-background has-x-small-font-size" style="padding-top:var(--wp--preset--spacing--20);padding-right:var(--wp--preset--spacing--30);padding-bottom:var(--wp--preset--spacing--20);padding-left:var(--wp--preset--spacing--30);font-weight:700">' . esc_html__( 'Tag two', 'dhali' ) . '</p>
<!-- /wp:paragraph -->

<!-- wp:paragraph {"style":{"spacing":{"padding":{"top":"var:preset|spacing|20","right":"var:preset|spacing|30","bottom":"var:preset|spacing|20","left":"var:preset|spacing|30"}},"typography":{"fontWeight":"700"}},"backgroundColor":"primary-alt-accent","textColor":"primary","fontSize":"x-small"} -->
<p class="has-primary-color has-primary-alt-accent-background-color has-text-color has-background has-x-small-font-size" style="padding-top:var(--wp--preset--spacing--20);padding-right:var(--wp--preset--spacing--30);padding-bottom:var(--wp--preset--spacing--20);padding-left:var(--wp--preset--spacing--30);font-weight:700">' . esc_html__( 'Longer tag label', 'dhali' ) . '</p>
<!-- /wp:paragraph -->

<!-- wp:paragraph {"style":{"spacing":{"padding":{"top":"var:preset|spacing|20","right":"var:preset|spacing|30","bottom":"var:preset|spacing|20","left":"var:preset|spacing|30"}},"typography":{"fontWeight":"700"}},"backgroundColor":"primary-alt-accent","textColor":"primary","fontSize":"x-small"} -->
<p class="has-primary-color has-primary-alt-accent-background-color has-text-color has-background has-x-small-font-size" style="padding-top:var(--wp--preset--spacing--20);padding-right:var(--wp--preset--spacing--30);padding-bottom:var(--wp--preset--spacing--20);padding-left:var(--wp--preset--spacing--30);font-weight:700">' . esc_html__( 'Another longer tag label', 'dhali' ) . '</p>
<!-- /wp:paragraph --></div>
<!-- /wp:group -->

<!-- wp:buttons -->
<div class="wp-block-buttons"><!-- wp:button {"textColor":"primary-alt","style":{"color":{"background":"#00000000"},"border":{"radius":"0px"},"spacing":{"padding":{"left":"0","right":"0"}}},"icon":"arrow-right"} -->
<div class="wp-block-button"><a class="wp-block-button__link has-primary-alt-color has-text-color has-background wp-element-button" style="border-radius:0px;background-color:#00000000;padding-right:0;padding-left:0">' . esc_html__( 'Learn more', 'dhali' ) . '</a></div>
<!-- /wp:button --></div>
<!-- /wp:buttons --></div>
<!-- /wp:group --></div>
<!-- /wp:group --></div>
<!-- /wp:group -->',
);
