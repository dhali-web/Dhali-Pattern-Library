<?php
/**
 * Coaching leadership section: eyebrow, heading, intro, three bordered
 * coach cards with editable circular initials, and an outline CTA.
 */

$dhali_coach_card = '<!-- wp:column -->
<div class="wp-block-column"><!-- wp:group {"metadata":{"name":"Coach Card"},"style":{"border":{"width":"1px"},"dimensions":{"minHeight":"100%"},"spacing":{"padding":{"top":"var:preset|spacing|large","right":"var:preset|spacing|large","bottom":"var:preset|spacing|large","left":"var:preset|spacing|large"},"blockGap":"var:preset|spacing|medium"}},"backgroundColor":"base","borderColor":"border-light","layout":{"type":"flex","orientation":"vertical","justifyContent":"left"}} -->
<div class="wp-block-group has-border-color has-border-light-border-color has-base-background-color has-background" style="border-width:1px;min-height:100%;padding-top:var(--wp--preset--spacing--large);padding-right:var(--wp--preset--spacing--large);padding-bottom:var(--wp--preset--spacing--large);padding-left:var(--wp--preset--spacing--large)"><!-- wp:group {"metadata":{"name":"Initials"},"style":{"border":{"radius":"var:preset|border-radius|full"},"dimensions":{"minWidth":"4rem","minHeight":"4rem"}},"backgroundColor":"primary-alt","textColor":"primary-accent","layout":{"type":"flex","flexWrap":"nowrap","justifyContent":"center","verticalAlignment":"center"}} -->
<div class="wp-block-group has-primary-accent-color has-primary-alt-background-color has-text-color has-background" style="border-radius:var(--wp--preset--border-radius--full);min-height:4rem;min-width:4rem"><!-- wp:paragraph {"style":{"typography":{"fontWeight":"700"}},"fontSize":"small","fontFamily":"barlow-condensed"} -->
<p class="has-barlow-condensed-font-family has-small-font-size" style="font-weight:700">' . esc_html__( 'AB', 'dhali' ) . '</p>
<!-- /wp:paragraph --></div>
<!-- /wp:group -->

<!-- wp:group {"metadata":{"name":"Details"},"style":{"spacing":{"blockGap":"var:preset|spacing|small"}},"layout":{"type":"default"}} -->
<div class="wp-block-group"><!-- wp:heading {"level":3,"fontSize":"medium"} -->
<h3 class="wp-block-heading has-medium-font-size">' . esc_html__( 'Coach Name', 'dhali' ) . '</h3>
<!-- /wp:heading -->

<!-- wp:paragraph {"textColor":"main","fontSize":"x-small"} -->
<p class="has-main-color has-text-color has-x-small-font-size">' . esc_html__( 'Role title', 'dhali' ) . '</p>
<!-- /wp:paragraph --></div>
<!-- /wp:group --></div>
<!-- /wp:group --></div>
<!-- /wp:column -->';

return array(
	'title'         => __( 'Section: Coaching Leadership', 'dhali' ),
	'categories'    => array( 'dhali-web-development', 'card' ),
	'description'   => _x( 'A leadership section with eyebrow, heading, introduction, three equal-height bordered cards with editable circular initials, name and role, plus an outline call to action.', 'Block pattern description', 'dhali' ),
	'keywords'      => array( 'team', 'coaches', 'leadership', 'staff', 'initials', 'cards', 'section' ),
	'viewportWidth' => 1500,
	'content'       => '<!-- wp:group {"metadata":{"name":"Coaching Leadership","categories":["dhali-web-development","card"],"patternName":"dhali-patterns/section-coaching-leadership"},"tagName":"section","align":"full","style":{"spacing":{"margin":{"top":"0","bottom":"0"},"padding":{"top":"var:preset|spacing|x-large","bottom":"var:preset|spacing|x-large","right":"var:preset|spacing|medium","left":"var:preset|spacing|medium"},"blockGap":"var:preset|spacing|large"}},"backgroundColor":"tertiary","layout":{"type":"constrained"}} -->
<section class="wp-block-group alignfull has-tertiary-background-color has-background" style="margin-top:0;margin-bottom:0;padding-top:var(--wp--preset--spacing--x-large);padding-right:var(--wp--preset--spacing--medium);padding-bottom:var(--wp--preset--spacing--x-large);padding-left:var(--wp--preset--spacing--medium)"><!-- wp:group {"metadata":{"name":"Titles"},"align":"wide","style":{"spacing":{"blockGap":"var:preset|spacing|small"}},"layout":{"type":"default"}} -->
<div class="wp-block-group alignwide"><!-- wp:paragraph {"style":{"typography":{"fontWeight":"700","textTransform":"uppercase","letterSpacing":"0.1em"}},"textColor":"primary","fontSize":"x-small"} -->
<p class="has-primary-color has-text-color has-x-small-font-size" style="font-weight:700;letter-spacing:0.1em;text-transform:uppercase">' . esc_html__( 'Section label', 'dhali' ) . '</p>
<!-- /wp:paragraph -->

<!-- wp:heading {"fontSize":"xx-large"} -->
<h2 class="wp-block-heading has-xx-large-font-size">' . esc_html__( 'This is a title', 'dhali' ) . '</h2>
<!-- /wp:heading -->

<!-- wp:paragraph {"textColor":"main"} -->
<p class="has-main-color has-text-color">' . esc_html__( 'This is an example of paragraph text', 'dhali' ) . '</p>
<!-- /wp:paragraph --></div>
<!-- /wp:group -->

<!-- wp:columns {"metadata":{"name":"Coach Cards"},"align":"wide","style":{"spacing":{"blockGap":{"top":"var:preset|spacing|medium","left":"var:preset|spacing|medium"}}}} -->
<div class="wp-block-columns alignwide">' . $dhali_coach_card . '

' . $dhali_coach_card . '

' . $dhali_coach_card . '</div>
<!-- /wp:columns -->

<!-- wp:buttons {"align":"wide"} -->
<div class="wp-block-buttons alignwide"><!-- wp:button {"textColor":"primary","className":"is-style-outline","icon":"external"} -->
<div class="wp-block-button is-style-outline"><a class="wp-block-button__link has-primary-color has-text-color wp-element-button">' . esc_html__( 'View all', 'dhali' ) . '</a></div>
<!-- /wp:button --></div>
<!-- /wp:buttons --></section>
<!-- /wp:group -->',
);
