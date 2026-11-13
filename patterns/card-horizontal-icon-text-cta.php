<?php
/**
 * Horizontal Icon Text CTA Card.
 *
 * Standalone contained card: icon, heading and body text on the left with an
 * outlined button on the right. The Card Body uses a fixed 24rem flex basis so
 * the row stays horizontal at normal content-column widths and the button only
 * wraps below when the card gets narrow. The button URL is intentionally unset;
 * editors add the link after insertion.
 */
return array(
	'title'         => __( 'Horizontal Icon Text CTA Card', 'dhali' ),
	'categories'    => array( 'dhali-web-development', 'card' ),
	'description'   => _x( 'A contained light-blue card with a subtle top border, an icon, heading and body text, and an outlined button with an external-link icon aligned to the right.', 'Block pattern description', 'dhali' ),
	'keywords'      => array( 'card', 'horizontal', 'icon', 'cta', 'button', 'documents', 'resource' ),
	'viewportWidth' => 1500,
	'content'       => '<!-- wp:group {"metadata":{"name":"Horizontal Icon Text CTA Card","categories":["dhali-web-development","card"],"patternName":"dhali-patterns/card-horizontal-icon-text-cta"},"className":"is-layout-flex is-horizontal wp-block-group-is-layout-flex items-justified-space-between","style":{"border":{"top":{"color":"var:preset|color|border-light","width":"1px"}},"spacing":{"padding":{"top":"var:preset|spacing|medium","right":"var:preset|spacing|medium","bottom":"var:preset|spacing|medium","left":"var:preset|spacing|medium"},"blockGap":"var:preset|spacing|medium"}},"backgroundColor":"secondary","textColor":"main","layout":{"type":"flex","flexWrap":"wrap","justifyContent":"space-between","verticalAlignment":"center"}} -->
<div class="wp-block-group is-layout-flex is-horizontal wp-block-group-is-layout-flex items-justified-space-between has-main-color has-secondary-background-color has-text-color has-background" style="border-top-color:var(--wp--preset--color--border-light);border-top-width:1px;padding-top:var(--wp--preset--spacing--medium);padding-right:var(--wp--preset--spacing--medium);padding-bottom:var(--wp--preset--spacing--medium);padding-left:var(--wp--preset--spacing--medium)"><!-- wp:group {"metadata":{"name":"Card Body"},"style":{"layout":{"selfStretch":"fixed","flexSize":"21rem"},"spacing":{"blockGap":"var:preset|spacing|medium"}},"layout":{"type":"flex","flexWrap":"nowrap","verticalAlignment":"center"}} -->
<div class="wp-block-group"><!-- wp:icon {"icon":"ollie/copy","style":{"dimensions":{"width":"24px"}},"textColor":"primary"} /-->

<!-- wp:group {"metadata":{"name":"Card Content"},"style":{"layout":{"selfStretch":"fill"},"spacing":{"blockGap":"var:preset|spacing|small"}},"layout":{"type":"flex","orientation":"vertical","justifyContent":"stretch"}} -->
<div class="wp-block-group"><!-- wp:heading {"level":3,"style":{"typography":{"lineHeight":"1.2"}},"textColor":"primary-alt","fontSize":"medium"} -->
<h3 class="wp-block-heading has-primary-alt-color has-text-color has-medium-font-size" style="line-height:1.2">' . esc_html__( 'This is a title', 'dhali' ) . '</h3>
<!-- /wp:heading -->

<!-- wp:paragraph {"textColor":"main"} -->
<p class="has-main-color has-text-color">' . esc_html__( 'This is an example of paragraph text', 'dhali' ) . '</p>
<!-- /wp:paragraph --></div>
<!-- /wp:group --></div>
<!-- /wp:group -->

<!-- wp:buttons {"style":{"layout":{"selfStretch":"fixed","flexSize":"11rem"}}} -->
<div class="wp-block-buttons"><!-- wp:button {"textColor":"primary","className":"is-style-button-light","style":{"border":{"color":"var:preset|color|primary","width":"1px","radius":"var:preset|border-radius|xs"}},"icon":"external"} -->
<div class="wp-block-button is-style-button-light"><a class="wp-block-button__link has-primary-color has-text-color has-border-color wp-element-button" style="border-color:var(--wp--preset--color--primary);border-width:1px;border-radius:var(--wp--preset--border-radius--xs)">' . esc_html__( 'Learn more', 'dhali' ) . '</a></div>
<!-- /wp:button --></div>
<!-- /wp:buttons --></div>
<!-- /wp:group -->',
);
