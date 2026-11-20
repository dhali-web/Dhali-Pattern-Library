<?php
/**
 * Card: static article card with an inset horizontal thumbnail.
 *
 * Contained "Article Card" Group (border only, no shadow) using a native 3-track Grid:
 * an inset 4:3 cover-cropped core/image spans 1 track and a vertically centred Content
 * group spans 2, with an uppercase eyebrow, an H3 that inherits the site heading style,
 * and a text-style button using the Ollie arrow-right icon. Grid tracks are used instead
 * of a flex row because rendered tests showed long titles shrinking a flex-row image
 * (Core "fixed" child sizing sets flex-basis only). The button URL is intentionally
 * unset. No section wrapper, so the card can sit directly in a parent Grid/Columns.
 * No custom CSS, no responsive overrides.
 */
return array(
	'title'         => __( 'Card – Article Horizontal Thumbnail', 'dhali' ),
	'categories'    => array( 'dhali-web-development', 'card' ),
	'description'   => _x( 'A compact static article card with an inset thumbnail on the left and a category eyebrow, heading and arrow text link on the right.', 'Block pattern description', 'dhali' ),
	'keywords'      => array( 'card', 'article', 'horizontal', 'thumbnail', 'blog', 'category', 'link' ),
	'viewportWidth' => 1500,
	'content'       => '<!-- wp:group {"metadata":{"name":"Article Card","categories":["dhali-web-development","card"],"patternName":"dhali-patterns/card-article-horizontal-thumb"},"style":{"border":{"width":"1px","radius":"var:preset|border-radius|xs"},"spacing":{"padding":{"top":"var:preset|spacing|small","right":"var:preset|spacing|small","bottom":"var:preset|spacing|small","left":"var:preset|spacing|small"},"blockGap":"var:preset|spacing|small"}},"backgroundColor":"base","borderColor":"border-light","layout":{"type":"grid","columnCount":3}} -->
<div class="wp-block-group has-border-color has-border-light-border-color has-base-background-color has-background" style="border-width:1px;border-radius:var(--wp--preset--border-radius--xs);padding-top:var(--wp--preset--spacing--small);padding-right:var(--wp--preset--spacing--small);padding-bottom:var(--wp--preset--spacing--small);padding-left:var(--wp--preset--spacing--small)"><!-- wp:image {"aspectRatio":"4/3","scale":"cover","style":{"layout":{"columnSpan":1}}} -->
<figure class="wp-block-image"><img src="' . esc_url( plugin_dir_url( dirname( __FILE__ ) ) . 'assets/images/placeholder-wide-16x9.webp' ) . '" alt="' . esc_attr__( 'Placeholder image', 'dhali' ) . '" style="aspect-ratio:4/3;object-fit:cover"/></figure>
<!-- /wp:image -->

<!-- wp:group {"metadata":{"name":"Content"},"style":{"layout":{"columnSpan":2},"spacing":{"blockGap":"var:preset|spacing|small"}},"layout":{"type":"flex","orientation":"vertical","verticalAlignment":"center"}} -->
<div class="wp-block-group"><!-- wp:paragraph {"style":{"typography":{"textTransform":"uppercase","letterSpacing":"0.1em"}},"textColor":"primary-alt","fontSize":"x-small"} -->
<p class="has-primary-alt-color has-text-color has-x-small-font-size" style="text-transform:uppercase;letter-spacing:0.1em">' . esc_html__( 'Category', 'dhali' ) . '</p>
<!-- /wp:paragraph -->

<!-- wp:heading {"level":3} -->
<h3 class="wp-block-heading">' . esc_html__( 'This is a title', 'dhali' ) . '</h3>
<!-- /wp:heading -->

<!-- wp:buttons -->
<div class="wp-block-buttons"><!-- wp:button {"textColor":"main","style":{"color":{"background":"#00000000"},"spacing":{"padding":{"top":"0","right":"0","bottom":"0","left":"0"}}},"icon":"arrow-right"} -->
<div class="wp-block-button"><a class="wp-block-button__link has-main-color has-text-color has-background wp-element-button" style="background-color:#00000000;padding-top:0;padding-right:0;padding-bottom:0;padding-left:0">' . esc_html__( 'Read more', 'dhali' ) . '</a></div>
<!-- /wp:button --></div>
<!-- /wp:buttons --></div>
<!-- /wp:group --></div>
<!-- /wp:group -->',
);
