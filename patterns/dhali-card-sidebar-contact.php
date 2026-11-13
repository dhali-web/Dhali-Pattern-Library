<?php
/**
 * Card: sidebar contact.
 *
 * Narrow, square-cornered contact card sized for a sidebar column (no
 * alignment, no section wrapper). Brand Alt background with the registered
 * Large Light shadow; eyebrow, H2, short introduction, a generic email line,
 * a full-width Ollie Light button with an arrow-right icon and a transparent
 * text-style button with an external icon. Button URLs are intentionally
 * unset. No custom CSS or responsive overrides.
 */
return array(
	'title'         => __( 'Card – Sidebar Contact', 'dhali' ),
	'categories'    => array( 'dhali-web-development', 'card', 'contact' ),
	'description'   => _x( 'A compact dark contact card for a sidebar column with an eyebrow, heading, short introduction, email line, a primary light button and a secondary text link.', 'Block pattern description', 'dhali' ),
	'keywords'      => array( 'contact', 'card', 'sidebar', 'aside', 'question', 'email', 'button' ),
	'viewportWidth' => 1500,
	'content'       => '
<!-- wp:group {"metadata":{"name":"Sidebar Contact Card","categories":["dhali-web-development","card","contact"],"patternName":"dhali-patterns/dhali-card-sidebar-contact"},"style":{"shadow":"var:preset|shadow|large-light","spacing":{"padding":{"top":"var:preset|spacing|large","bottom":"var:preset|spacing|large","left":"var:preset|spacing|medium","right":"var:preset|spacing|medium"},"blockGap":"var:preset|spacing|small"}},"backgroundColor":"primary-alt","textColor":"base","layout":{"type":"default"}} -->
<div class="wp-block-group has-base-color has-primary-alt-background-color has-text-color has-background" style="padding-top:var(--wp--preset--spacing--large);padding-right:var(--wp--preset--spacing--medium);padding-bottom:var(--wp--preset--spacing--large);padding-left:var(--wp--preset--spacing--medium);box-shadow:var(--wp--preset--shadow--large-light)"><!-- wp:paragraph {"style":{"typography":{"textTransform":"uppercase","letterSpacing":"0.15em","fontWeight":"600"}},"textColor":"primary-alt-accent","fontSize":"x-small"} -->
<p class="has-primary-alt-accent-color has-text-color has-x-small-font-size" style="font-weight:600;letter-spacing:0.15em;text-transform:uppercase">' . esc_html__( 'Talk with us', 'dhali' ) . '</p>
<!-- /wp:paragraph -->

<!-- wp:heading {"style":{"typography":{"lineHeight":"1.05"}},"textColor":"base","fontSize":"large"} -->
<h2 class="wp-block-heading has-base-color has-text-color has-large-font-size" style="line-height:1.05">' . esc_html__( 'Have a question?', 'dhali' ) . '</h2>
<!-- /wp:heading -->

<!-- wp:paragraph {"textColor":"secondary","fontSize":"small"} -->
<p class="has-secondary-color has-text-color has-small-font-size">' . esc_html__( 'Connect directly with our team before taking your next step.', 'dhali' ) . '</p>
<!-- /wp:paragraph -->

<!-- wp:paragraph {"textColor":"primary-alt-accent","fontSize":"small"} -->
<p class="has-primary-alt-accent-color has-text-color has-small-font-size">' . esc_html__( 'email@example.com', 'dhali' ) . '</p>
<!-- /wp:paragraph -->

<!-- wp:buttons {"style":{"spacing":{"margin":{"top":"var:preset|spacing|medium"}}}} -->
<div class="wp-block-buttons" style="margin-top:var(--wp--preset--spacing--medium)"><!-- wp:button {"className":"is-style-button-light","style":{"dimensions":{"width":"100%"}},"icon":"arrow-right"} -->
<div class="wp-block-button is-style-button-light"><a class="wp-block-button__link wp-element-button">' . esc_html__( 'Ask a Question', 'dhali' ) . '</a></div>
<!-- /wp:button --></div>
<!-- /wp:buttons -->

<!-- wp:buttons {"layout":{"type":"flex","justifyContent":"center"}} -->
<div class="wp-block-buttons"><!-- wp:button {"textColor":"base","style":{"color":{"background":"transparent"},"spacing":{"padding":{"top":"0","right":"0","bottom":"0","left":"0"}}},"fontSize":"x-small","icon":"external"} -->
<div class="wp-block-button"><a class="wp-block-button__link has-base-color has-text-color has-background has-x-small-font-size has-custom-font-size wp-element-button" style="background-color:transparent;padding-top:0;padding-right:0;padding-bottom:0;padding-left:0">' . esc_html__( 'View Contacts', 'dhali' ) . '</a></div>
<!-- /wp:button --></div>
<!-- /wp:buttons --></div>
<!-- /wp:group -->
',
);
