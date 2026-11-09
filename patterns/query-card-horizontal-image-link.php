<?php
/**
 * Query: horizontal image card (Advanced Query Loop).
 *
 * Post-aware version of dhali-patterns/card-horizontal-image-link inside Ryan Welcher's
 * Advanced Query Loop (core/query variation "advanced-query-loop"). Registered for the
 * Query Loop chooser via blockTypes core/query (Dhali convention, same as the 50/50 loop).
 * Featured image / title / excerpt replace the static image / heading / paragraph; the
 * approved core/button keeps its Ollie arrow icon and binds url to core/post-data "link".
 * Same 5-track Grid and @mobile column spans as the static card. Single-column Post
 * Template; outer grid, post type and filters are configured in the editor. No custom CSS.
 */
return array(
	'title'         => __( 'Query – Horizontal Image Card', 'dhali' ),
	'categories'    => array( 'dhali-web-development', 'query' ),
	'blockTypes'    => array( 'core/query' ),
	'description'   => _x( 'Advanced Query Loop of horizontal cards: featured image on the left, post title, excerpt and an underlined link to the post on the right. Stacks on mobile.', 'Block pattern description', 'dhali' ),
	'keywords'      => array( 'query', 'loop', 'aql', 'card', 'horizontal', 'program', 'featured image' ),
	'viewportWidth' => 1500,
	'content'       => '<!-- wp:query {"queryId":0,"query":{"perPage":3,"pages":0,"offset":0,"postType":"post","order":"desc","orderBy":"date","author":"","search":"","exclude":[],"sticky":"","inherit":false,"taxQuery":null,"parents":[],"format":[]},"namespace":"advanced-query-loop"} -->
<div class="wp-block-query"><!-- wp:post-template -->
<!-- wp:group {"metadata":{"name":"Program Card"},"style":{"border":{"width":"1px","radius":"var:preset|border-radius|xs"},"spacing":{"padding":{"top":"0","right":"0","bottom":"0","left":"0"},"blockGap":"0"}},"backgroundColor":"base","borderColor":"border-light","layout":{"type":"grid","columnCount":5}} -->
<div class="wp-block-group has-border-color has-border-light-border-color has-base-background-color has-background" style="border-width:1px;border-radius:var(--wp--preset--border-radius--xs);padding-top:0;padding-right:0;padding-bottom:0;padding-left:0"><!-- wp:post-featured-image {"aspectRatio":"1","height":"100%","style":{"layout":{"columnSpan":2},"@mobile":{"layout":{"columnSpan":5}},"border":{"radius":{"topLeft":"var:preset|border-radius|xs","bottomLeft":"var:preset|border-radius|xs"}}}} /-->

<!-- wp:group {"metadata":{"name":"Content"},"style":{"layout":{"columnSpan":3},"@mobile":{"layout":{"columnSpan":5}},"spacing":{"padding":{"top":"var:preset|spacing|medium","right":"var:preset|spacing|medium","bottom":"var:preset|spacing|medium","left":"var:preset|spacing|medium"}}},"layout":{"type":"flex","orientation":"vertical","verticalAlignment":"space-between"}} -->
<div class="wp-block-group" style="padding-top:var(--wp--preset--spacing--medium);padding-right:var(--wp--preset--spacing--medium);padding-bottom:var(--wp--preset--spacing--medium);padding-left:var(--wp--preset--spacing--medium)"><!-- wp:group {"metadata":{"name":"Text"},"style":{"spacing":{"blockGap":"var:preset|spacing|small"}},"layout":{"type":"flex","orientation":"vertical"}} -->
<div class="wp-block-group"><!-- wp:post-title {"level":3,"fontSize":"medium"} /-->

<!-- wp:post-excerpt {"excerptLength":20,"textColor":"main-accent"} /--></div>
<!-- /wp:group -->

<!-- wp:buttons -->
<div class="wp-block-buttons"><!-- wp:button {"textColor":"primary","metadata":{"bindings":{"url":{"source":"core/post-data","args":{"field":"link"}}}},"style":{"color":{"background":"#00000000"},"border":{"bottom":{"color":"var:preset|color|primary-accent","width":"2px"},"radius":"0px"},"spacing":{"padding":{"left":"0","right":"0"}}},"icon":"arrow-right"} -->
<div class="wp-block-button"><a class="wp-block-button__link has-primary-color has-text-color has-background wp-element-button" style="border-radius:0px;border-bottom-color:var(--wp--preset--color--primary-accent);border-bottom-width:2px;background-color:#00000000;padding-right:0;padding-left:0">' . esc_html__( 'Learn more', 'dhali' ) . '</a></div>
<!-- /wp:button --></div>
<!-- /wp:buttons --></div>
<!-- /wp:group --></div>
<!-- /wp:group -->
<!-- /wp:post-template -->

<!-- wp:query-no-results -->
<!-- wp:paragraph -->
<p>' . esc_html__( 'No results found.', 'dhali' ) . '</p>
<!-- /wp:paragraph -->
<!-- /wp:query-no-results --></div>
<!-- /wp:query -->',
);
