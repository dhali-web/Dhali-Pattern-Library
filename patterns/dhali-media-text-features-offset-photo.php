<?php
/**
 * Media + Text: copy with feature grid and offset photo.
 *
 * Copy column (eyebrow, H2, intro, 2x2 icon features, text CTA) beside a square
 * photo with a decorative backing and overlapping caption. Backing and caption
 * positioning come from assets/css/dhali-media-text-photo.css via the
 * .dhali-media-text-photo-frame and .dhali-media-text-photo-caption classes.
 */
return array(
	'title'         => __( 'Media Text – Copy Features + Offset Photo', 'dhali' ),
	'categories'    => array( 'dhali-web-development' ),
	'description'   => _x( 'A media and text section with eyebrow, heading, intro, a 2x2 icon feature grid and text link beside a square photo with a decorative backing and overlapping caption.', 'Block pattern description', 'dhali' ),
	'keywords'      => array( 'media', 'text', 'image', 'features', 'icons', 'caption', 'split' ),
	'viewportWidth' => 1500,
	'content'       => '
<!-- wp:group {"metadata":{"name":"Media Text – Copy Features + Offset Photo","categories":["dhali-web-development"],"patternName":"dhali-patterns/dhali-media-text-features-offset-photo"},"tagName":"section","align":"full","className":"dhali-media-text-features-offset-photo","style":{"spacing":{"margin":{"top":"0","bottom":"0"},"padding":{"top":"var:preset|spacing|x-large","bottom":"var:preset|spacing|x-large","left":"var:preset|spacing|medium","right":"var:preset|spacing|medium"}}},"backgroundColor":"base","layout":{"type":"constrained"}} -->
<section class="wp-block-group alignfull dhali-media-text-features-offset-photo has-base-background-color has-background" style="margin-top:0;margin-bottom:0;padding-top:var(--wp--preset--spacing--x-large);padding-right:var(--wp--preset--spacing--medium);padding-bottom:var(--wp--preset--spacing--x-large);padding-left:var(--wp--preset--spacing--medium)"><!-- wp:columns {"verticalAlignment":"center","align":"wide","style":{"spacing":{"blockGap":{"top":"var:preset|spacing|x-large","left":"var:preset|spacing|x-large"}}}} -->
<div class="wp-block-columns alignwide are-vertically-aligned-center"><!-- wp:column {"verticalAlignment":"center","width":"55%","metadata":{"name":"Copy"},"style":{"spacing":{"blockGap":"var:preset|spacing|medium"}}} -->
<div class="wp-block-column is-vertically-aligned-center" style="flex-basis:55%"><!-- wp:paragraph {"style":{"typography":{"textTransform":"uppercase","letterSpacing":"0.15em","fontWeight":"600"}},"textColor":"primary","fontSize":"x-small"} -->
<p class="has-primary-color has-text-color has-x-small-font-size" style="font-weight:600;letter-spacing:0.15em;text-transform:uppercase">' . esc_html__( 'Eyebrow text', 'dhali' ) . '</p>
<!-- /wp:paragraph -->

<!-- wp:heading {"style":{"typography":{"lineHeight":"1.05"}},"textColor":"primary-alt","fontSize":"xx-large"} -->
<h2 class="wp-block-heading has-primary-alt-color has-text-color has-xx-large-font-size" style="line-height:1.05">' . esc_html__( 'This is a title', 'dhali' ) . '</h2>
<!-- /wp:heading -->

<!-- wp:paragraph {"textColor":"main-accent","fontSize":"base"} -->
<p class="has-main-accent-color has-text-color has-base-font-size">' . esc_html__( 'This is an example of paragraph text', 'dhali' ) . '</p>
<!-- /wp:paragraph -->

<!-- wp:group {"metadata":{"name":"Features"},"style":{"spacing":{"blockGap":"var:preset|spacing|medium","margin":{"top":"var:preset|spacing|medium"}}},"layout":{"type":"grid","columnCount":2,"minimumColumnWidth":"14rem"}} -->
<div class="wp-block-group" style="margin-top:var(--wp--preset--spacing--medium)">
<!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|small"}},"layout":{"type":"flex","flexWrap":"nowrap","verticalAlignment":"top"}} -->
<div class="wp-block-group"><!-- wp:group {"style":{"dimensions":{"minHeight":"3rem"},"layout":{"selfStretch":"fixed","flexSize":"3rem"}},"backgroundColor":"secondary","layout":{"type":"flex","orientation":"vertical","justifyContent":"center","verticalAlignment":"center"}} -->
<div class="wp-block-group has-secondary-background-color has-background" style="min-height:3rem"><!-- wp:icon {"icon":"ollie/swimming-pool","textColor":"primary","style":{"dimensions":{"width":"24px"}}} /--></div>
<!-- /wp:group -->

<!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|20"}},"layout":{"type":"flex","orientation":"vertical"}} -->
<div class="wp-block-group"><!-- wp:heading {"level":3,"textColor":"primary-alt","fontSize":"medium"} -->
<h3 class="wp-block-heading has-primary-alt-color has-text-color has-medium-font-size">' . esc_html__( 'Feature title', 'dhali' ) . '</h3>
<!-- /wp:heading -->

<!-- wp:paragraph {"textColor":"main-accent","fontSize":"small"} -->
<p class="has-main-accent-color has-text-color has-small-font-size">' . esc_html__( 'This is an example of paragraph text', 'dhali' ) . '</p>
<!-- /wp:paragraph --></div>
<!-- /wp:group --></div>
<!-- /wp:group -->

<!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|small"}},"layout":{"type":"flex","flexWrap":"nowrap","verticalAlignment":"top"}} -->
<div class="wp-block-group"><!-- wp:group {"style":{"dimensions":{"minHeight":"3rem"},"layout":{"selfStretch":"fixed","flexSize":"3rem"}},"backgroundColor":"secondary","layout":{"type":"flex","orientation":"vertical","justifyContent":"center","verticalAlignment":"center"}} -->
<div class="wp-block-group has-secondary-background-color has-background" style="min-height:3rem"><!-- wp:icon {"icon":"ollie/crosshair","textColor":"primary","style":{"dimensions":{"width":"24px"}}} /--></div>
<!-- /wp:group -->

<!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|20"}},"layout":{"type":"flex","orientation":"vertical"}} -->
<div class="wp-block-group"><!-- wp:heading {"level":3,"textColor":"primary-alt","fontSize":"medium"} -->
<h3 class="wp-block-heading has-primary-alt-color has-text-color has-medium-font-size">' . esc_html__( 'Feature title', 'dhali' ) . '</h3>
<!-- /wp:heading -->

<!-- wp:paragraph {"textColor":"main-accent","fontSize":"small"} -->
<p class="has-main-accent-color has-text-color has-small-font-size">' . esc_html__( 'This is an example of paragraph text', 'dhali' ) . '</p>
<!-- /wp:paragraph --></div>
<!-- /wp:group --></div>
<!-- /wp:group -->

<!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|small"}},"layout":{"type":"flex","flexWrap":"nowrap","verticalAlignment":"top"}} -->
<div class="wp-block-group"><!-- wp:group {"style":{"dimensions":{"minHeight":"3rem"},"layout":{"selfStretch":"fixed","flexSize":"3rem"}},"backgroundColor":"secondary","layout":{"type":"flex","orientation":"vertical","justifyContent":"center","verticalAlignment":"center"}} -->
<div class="wp-block-group has-secondary-background-color has-background" style="min-height:3rem"><!-- wp:icon {"icon":"ollie/users-three","textColor":"primary","style":{"dimensions":{"width":"24px"}}} /--></div>
<!-- /wp:group -->

<!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|20"}},"layout":{"type":"flex","orientation":"vertical"}} -->
<div class="wp-block-group"><!-- wp:heading {"level":3,"textColor":"primary-alt","fontSize":"medium"} -->
<h3 class="wp-block-heading has-primary-alt-color has-text-color has-medium-font-size">' . esc_html__( 'Feature title', 'dhali' ) . '</h3>
<!-- /wp:heading -->

<!-- wp:paragraph {"textColor":"main-accent","fontSize":"small"} -->
<p class="has-main-accent-color has-text-color has-small-font-size">' . esc_html__( 'This is an example of paragraph text', 'dhali' ) . '</p>
<!-- /wp:paragraph --></div>
<!-- /wp:group --></div>
<!-- /wp:group -->

<!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|small"}},"layout":{"type":"flex","flexWrap":"nowrap","verticalAlignment":"top"}} -->
<div class="wp-block-group"><!-- wp:group {"style":{"dimensions":{"minHeight":"3rem"},"layout":{"selfStretch":"fixed","flexSize":"3rem"}},"backgroundColor":"secondary","layout":{"type":"flex","orientation":"vertical","justifyContent":"center","verticalAlignment":"center"}} -->
<div class="wp-block-group has-secondary-background-color has-background" style="min-height:3rem"><!-- wp:icon {"icon":"ollie/heart","textColor":"primary","style":{"dimensions":{"width":"24px"}}} /--></div>
<!-- /wp:group -->

<!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|20"}},"layout":{"type":"flex","orientation":"vertical"}} -->
<div class="wp-block-group"><!-- wp:heading {"level":3,"textColor":"primary-alt","fontSize":"medium"} -->
<h3 class="wp-block-heading has-primary-alt-color has-text-color has-medium-font-size">' . esc_html__( 'Feature title', 'dhali' ) . '</h3>
<!-- /wp:heading -->

<!-- wp:paragraph {"textColor":"main-accent","fontSize":"small"} -->
<p class="has-main-accent-color has-text-color has-small-font-size">' . esc_html__( 'This is an example of paragraph text', 'dhali' ) . '</p>
<!-- /wp:paragraph --></div>
<!-- /wp:group --></div>
<!-- /wp:group -->
</div>
<!-- /wp:group -->

<!-- wp:buttons {"style":{"spacing":{"margin":{"top":"var:preset|spacing|medium"}}}} -->
<div class="wp-block-buttons" style="margin-top:var(--wp--preset--spacing--medium)"><!-- wp:button {"textColor":"primary","style":{"color":{"background":"transparent"},"spacing":{"padding":{"left":"0","right":"0","top":"var:preset|spacing|20","bottom":"var:preset|spacing|20"}},"border":{"bottom":{"color":"var:preset|color|primary-accent","width":"2px"},"radius":"0"}}} -->
<div class="wp-block-button"><a class="wp-block-button__link has-primary-color has-text-color has-background wp-element-button" style="border-radius:0;border-bottom-color:var(--wp--preset--color--primary-accent);border-bottom-width:2px;background-color:transparent;padding-top:var(--wp--preset--spacing--20);padding-right:0;padding-bottom:var(--wp--preset--spacing--20);padding-left:0">' . esc_html__( 'Learn more →', 'dhali' ) . '</a></div>
<!-- /wp:button --></div>
<!-- /wp:buttons --></div>
<!-- /wp:column -->

<!-- wp:column {"verticalAlignment":"center","width":"45%","metadata":{"name":"Media"}} -->
<div class="wp-block-column is-vertically-aligned-center" style="flex-basis:45%"><!-- wp:group {"metadata":{"name":"Media frame"},"className":"dhali-media-text-photo-frame","layout":{"type":"default"}} -->
<div class="wp-block-group dhali-media-text-photo-frame"><!-- wp:image {"aspectRatio":"1","scale":"cover","sizeSlug":"full","style":{"spacing":{"margin":{"bottom":"0"}}}} -->
<figure class="wp-block-image size-full" style="margin-bottom:0"><img src="' . esc_url( plugin_dir_url( dirname( __FILE__ ) ) . 'assets/images/placeholder-square-1x1.webp' ) . '" alt="" style="aspect-ratio:1;object-fit:cover"/></figure>
<!-- /wp:image -->

<!-- wp:group {"metadata":{"name":"Caption badge"},"className":"dhali-media-text-photo-caption","style":{"spacing":{"padding":{"top":"var:preset|spacing|small","bottom":"var:preset|spacing|small","left":"var:preset|spacing|medium","right":"var:preset|spacing|medium"},"blockGap":"var:preset|spacing|20"},"shadow":"var:preset|shadow|medium-dark"},"backgroundColor":"primary-alt","layout":{"type":"flex","orientation":"vertical"}} -->
<div class="wp-block-group dhali-media-text-photo-caption has-primary-alt-background-color has-background" style="padding-top:var(--wp--preset--spacing--small);padding-right:var(--wp--preset--spacing--medium);padding-bottom:var(--wp--preset--spacing--small);padding-left:var(--wp--preset--spacing--medium);box-shadow:var(--wp--preset--shadow--medium-dark)"><!-- wp:paragraph {"style":{"typography":{"textTransform":"uppercase","letterSpacing":"0.15em"}},"textColor":"primary-accent","fontSize":"x-small"} -->
<p class="has-primary-accent-color has-text-color has-x-small-font-size" style="letter-spacing:0.15em;text-transform:uppercase">' . esc_html__( 'Caption label', 'dhali' ) . '</p>
<!-- /wp:paragraph -->

<!-- wp:paragraph {"style":{"typography":{"fontFamily":"var:preset|font-family|barlow-condensed","fontWeight":"700"}},"textColor":"base","fontSize":"medium"} -->
<p class="has-base-color has-text-color has-medium-font-size" style="font-family:var(--wp--preset--font-family--barlow-condensed);font-weight:700">' . esc_html__( 'Short caption', 'dhali' ) . '</p>
<!-- /wp:paragraph --></div>
<!-- /wp:group --></div>
<!-- /wp:group --></div>
<!-- /wp:column --></div>
<!-- /wp:columns --></section>
<!-- /wp:group -->
',
);
