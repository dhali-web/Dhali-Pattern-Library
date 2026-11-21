<?php
/**
 * Coaching leadership section: static eyebrow, heading and intro, an
 * Advanced Query Loop rendering one repeated bordered coach card (circular
 * featured image, or a circular initials fallback when the post has no
 * featured image), and a static outline CTA outside the loop.
 *
 * The query temporarily targets the `program` post type; switch it to
 * `coach` in the Query Loop inspector once that post type exists.
 */

return array(
	'title'         => __( 'Section: Coaching Leadership', 'dhali' ),
	'categories'    => array( 'dhali-web-development', 'card' ),
	'description'   => _x( 'A leadership section with eyebrow, heading and introduction, a three-column Advanced Query Loop of bordered cards showing each post\'s circular featured image (or an initials fallback), title and excerpt, plus an outline call to action.', 'Block pattern description', 'dhali' ),
	'keywords'      => array( 'team', 'coaches', 'leadership', 'staff', 'initials', 'cards', 'section', 'query', 'loop' ),
	'viewportWidth' => 1500,
	'content'       => '<!-- wp:group {"tagName":"section","metadata":{"name":"Coaching Leadership","categories":["dhali-web-development","card"],"patternName":"dhali-patterns/section-coaching-leadership"},"align":"full","style":{"spacing":{"margin":{"top":"0","bottom":"0"},"padding":{"top":"var:preset|spacing|x-large","bottom":"var:preset|spacing|x-large","right":"var:preset|spacing|medium","left":"var:preset|spacing|medium"},"blockGap":"var:preset|spacing|large"}},"backgroundColor":"tertiary","layout":{"type":"constrained"}} -->
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

<!-- wp:query {"queryId":0,"query":{"perPage":3,"pages":0,"offset":0,"postType":"program","order":"desc","orderBy":"date","author":"","search":"","exclude":[],"sticky":"","inherit":false,"taxQuery":null,"parents":[],"format":[]},"namespace":"advanced-query-loop","metadata":{"name":"Coach Query"},"align":"wide"} -->
<div class="wp-block-query alignwide"><!-- wp:post-template {"metadata":{"name":"Coach Cards"},"style":{"spacing":{"blockGap":"var:preset|spacing|medium"},"@tablet":{"layout":{"columnCount":1}},"@mobile":{"layout":{"columnCount":1}}},"layout":{"type":"grid","columnCount":3}} -->
<!-- wp:group {"metadata":{"name":"Coach Card"},"style":{"border":{"width":"1px"},"dimensions":{"minHeight":"100%"},"spacing":{"padding":{"top":"var:preset|spacing|large","right":"var:preset|spacing|large","bottom":"var:preset|spacing|large","left":"var:preset|spacing|large"},"blockGap":"var:preset|spacing|medium"}},"backgroundColor":"base","borderColor":"border-light","layout":{"type":"flex","orientation":"vertical","justifyContent":"left"}} -->
<div class="wp-block-group has-border-color has-border-light-border-color has-base-background-color has-background" style="border-width:1px;min-height:100%;padding-top:var(--wp--preset--spacing--large);padding-right:var(--wp--preset--spacing--large);padding-bottom:var(--wp--preset--spacing--large);padding-left:var(--wp--preset--spacing--large)"><!-- wp:post-featured-image {"aspectRatio":"1","width":"4rem","height":"4rem","sizeSlug":"thumbnail","metadata":{"name":"Avatar"},"style":{"border":{"radius":"var:preset|border-radius|full"}}} /-->

<!-- wp:group {"metadata":{"name":"Initials"},"style":{"border":{"radius":"var:preset|border-radius|full"},"dimensions":{"minWidth":"4rem","minHeight":"4rem"}},"backgroundColor":"primary-alt","textColor":"primary-accent","layout":{"type":"flex","flexWrap":"nowrap","justifyContent":"center","verticalAlignment":"center"},"blockVisibility":{"controlSets":[{"id":1,"enable":true,"controls":{"metadata":{"ruleSets":[{"enable":true,"rules":[{"field":"postMetadata","subField":"_thumbnail_id","operator":"notEmpty"}]}],"hideOnRuleSets":true}}}]}} -->
<div class="wp-block-group has-primary-accent-color has-primary-alt-background-color has-text-color has-background" style="border-radius:var(--wp--preset--border-radius--full);min-height:4rem;min-width:4rem"><!-- wp:paragraph {"style":{"typography":{"fontWeight":"700"}},"fontSize":"small","fontFamily":"barlow-condensed"} -->
<p class="has-barlow-condensed-font-family has-small-font-size" style="font-weight:700">' . esc_html__( 'AB', 'dhali' ) . '</p>
<!-- /wp:paragraph --></div>
<!-- /wp:group -->

<!-- wp:group {"metadata":{"name":"Details"},"style":{"spacing":{"blockGap":"var:preset|spacing|small"}},"layout":{"type":"default"}} -->
<div class="wp-block-group"><!-- wp:post-title {"level":3,"fontSize":"medium"} /-->

<!-- wp:post-excerpt {"textColor":"main","fontSize":"x-small"} /--></div>
<!-- /wp:group --></div>
<!-- /wp:group -->
<!-- /wp:post-template -->

<!-- wp:query-no-results -->
<!-- wp:paragraph -->
<p>' . esc_html__( 'No coaches found.', 'dhali' ) . '</p>
<!-- /wp:paragraph -->
<!-- /wp:query-no-results --></div>
<!-- /wp:query -->

<!-- wp:buttons {"align":"wide"} -->
<div class="wp-block-buttons alignwide"><!-- wp:button {"textColor":"primary","className":"is-style-outline","icon":"external"} -->
<div class="wp-block-button is-style-outline"><a class="wp-block-button__link has-primary-color has-text-color wp-element-button">' . esc_html__( 'View all', 'dhali' ) . '</a></div>
<!-- /wp:button --></div>
<!-- /wp:buttons --></section>
<!-- /wp:group -->',
);
