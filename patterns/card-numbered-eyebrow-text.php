<?php
return array(
	'title'         => __( 'Numbered Text Card', 'dhali' ),
	'categories'    => array( 'dhali-web-development', 'card' ),
	'description'   => _x( 'A flat tinted card with a small letter-spaced number, a heading, and supporting paragraph text.', 'Block pattern description', 'dhali' ),
	'keywords'      => array( 'card', 'numbered', 'eyebrow', 'text', 'values', 'mission' ),
	'viewportWidth' => 1500,
	'blockTypes'    => array( 'core/group' ),
	'content'       => '
<!-- wp:group {"metadata":{"name":"Numbered Text Card","categories":["card"],"patternName":"dhali-patterns/card-numbered-eyebrow-text"},"style":{"spacing":{"padding":{"top":"var:preset|spacing|large","right":"var:preset|spacing|large","bottom":"var:preset|spacing|large","left":"var:preset|spacing|large"},"blockGap":"var:preset|spacing|small"}},"backgroundColor":"secondary","layout":{"type":"constrained"}} -->
<div class="wp-block-group has-secondary-background-color has-background" style="padding-top:var(--wp--preset--spacing--large);padding-right:var(--wp--preset--spacing--large);padding-bottom:var(--wp--preset--spacing--large);padding-left:var(--wp--preset--spacing--large)"><!-- wp:paragraph {"metadata":{"name":"Number"},"style":{"typography":{"fontWeight":"700","letterSpacing":"0.2em"}},"textColor":"primary","fontSize":"x-small"} -->
<p class="has-primary-color has-text-color has-x-small-font-size" style="font-weight:700;letter-spacing:0.2em">' . esc_html__( '01', 'dhali' ) . '</p>
<!-- /wp:paragraph -->

<!-- wp:heading {"level":3,"style":{"spacing":{"margin":{"top":"var:preset|spacing|medium"}}},"textColor":"primary-alt","fontSize":"large"} -->
<h3 class="wp-block-heading has-primary-alt-color has-text-color has-large-font-size" style="margin-top:var(--wp--preset--spacing--medium)">' . esc_html__( 'This is a title', 'dhali' ) . '</h3>
<!-- /wp:heading -->

<!-- wp:paragraph {"textColor":"main","fontSize":"base"} -->
<p class="has-main-color has-text-color has-base-font-size">' . esc_html__( 'This is an example of paragraph text that briefly supports the heading above.', 'dhali' ) . '</p>
<!-- /wp:paragraph --></div>
<!-- /wp:group -->
',
);
