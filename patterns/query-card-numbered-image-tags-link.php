<?php
/**
 * Query: numbered image card (Advanced Query Loop).
 *
 * Post-aware version of dhali-patterns/card-numbered-image-tags-link inside Ryan Welcher's
 * Advanced Query Loop (core/query variation "advanced-query-loop"). Registered for the Query
 * Loop "Change design" chooser via blockTypes core/query (same convention as
 * query-card-horizontal-image-link). Change design keeps only postType, inherit and namespace;
 * count, order and AQL filters come from these defaults (post, 3 items, newest first, no pagination).
 *
 * Same 20-column card grid, full-height rail and nested 19-column Card Body as the static card,
 * with the same @tablet/@mobile column spans. Native post blocks: Post Featured Image, Post Title,
 * Post Excerpt, Post Terms (post_tag by default; switch the taxonomy in the editor) and a Button
 * whose url is bound to core/post-data "link".
 *
 * Presentational numbering: the Post Template carries the dhali-query-numbered class and the
 * Number Rail group carries the dhali-query-number hook; the group's ::before shows a scoped CSS
 * counter (01, 02, 03) in query order, restarting for every Query Loop. The rail has no inner
 * blocks, so no empty paragraph is hidden by the editor's Query Loop previews; the number's font,
 * size, weight and color are the rail group's native typography and color settings. Term chips use dhali-term-chips. Both classes are
 * plugin fallback CSS from includes/ollie-css/registry.php (frontend and editor iframe).
 *
 * Missing featured image: the Content group starts at column 8 (column 1 on mobile) and the Card
 * Body tint shows in the empty image slot. No hardcoded labels, numbers or URLs.
 */
return array(
	'title'         => __( 'Query – Numbered Image Card', 'dhali' ),
	'categories'    => array( 'dhali-web-development', 'query' ),
	'blockTypes'    => array( 'core/query' ),
	'description'   => _x( 'Advanced Query Loop of numbered horizontal cards: a full-height number rail, featured image, post title, excerpt, tag chips and a link to the post. The image stacks above the content on mobile.', 'Block pattern description', 'dhali' ),
	'keywords'      => array( 'query', 'loop', 'aql', 'card', 'numbered', 'number', 'tags', 'featured image', 'program' ),
	'viewportWidth' => 1500,
	'content'       => '<!-- wp:query {"queryId":0,"query":{"perPage":3,"pages":0,"offset":0,"postType":"post","order":"desc","orderBy":"date","author":"","search":"","exclude":[],"sticky":"","inherit":false,"taxQuery":null,"parents":[],"format":[]},"namespace":"advanced-query-loop"} -->
<div class="wp-block-query"><!-- wp:post-template {"className":"dhali-query-numbered","style":{"spacing":{"blockGap":"var:preset|spacing|medium"}},"layout":{"type":"grid","columnCount":1}} -->
<!-- wp:group {"metadata":{"name":"Numbered Image Card"},"style":{"border":{"width":"1px"},"spacing":{"padding":{"top":"0","right":"0","bottom":"0","left":"0"},"blockGap":"0"}},"backgroundColor":"base","borderColor":"border-light","layout":{"type":"grid","columnCount":20}} -->
<div class="wp-block-group has-border-color has-border-light-border-color has-base-background-color has-background" style="border-width:1px;padding-top:0;padding-right:0;padding-bottom:0;padding-left:0"><!-- wp:group {"metadata":{"name":"Number Rail"},"className":"dhali-query-number","style":{"layout":{"columnSpan":1},"@tablet":{"layout":{"columnSpan":2}},"@mobile":{"layout":{"columnSpan":2}},"spacing":{"padding":{"top":"var:preset|spacing|medium","right":"0","bottom":"var:preset|spacing|medium","left":"0"}},"typography":{"fontWeight":"700"}},"backgroundColor":"primary","textColor":"base","fontSize":"base","fontFamily":"barlow-condensed","layout":{"type":"default"}} -->
<div class="wp-block-group dhali-query-number has-base-color has-primary-background-color has-text-color has-background has-barlow-condensed-font-family has-base-font-size" style="padding-top:var(--wp--preset--spacing--medium);padding-right:0;padding-bottom:var(--wp--preset--spacing--medium);padding-left:0;font-weight:700"></div>
<!-- /wp:group -->

<!-- wp:group {"metadata":{"name":"Card Body"},"style":{"layout":{"columnSpan":19},"@tablet":{"layout":{"columnSpan":18}},"@mobile":{"layout":{"columnSpan":18}},"spacing":{"blockGap":"0"}},"backgroundColor":"primary-alt-accent","layout":{"type":"grid","columnCount":19}} -->
<div class="wp-block-group has-primary-alt-accent-background-color has-background"><!-- wp:post-featured-image {"height":"100%","sizeSlug":"large","style":{"layout":{"columnSpan":7},"@mobile":{"layout":{"columnSpan":19}}}} /-->

<!-- wp:group {"metadata":{"name":"Content"},"style":{"layout":{"columnSpan":12,"columnStart":8},"@mobile":{"layout":{"columnSpan":19,"columnStart":1}},"spacing":{"padding":{"top":"var:preset|spacing|medium","right":"var:preset|spacing|medium","bottom":"var:preset|spacing|medium","left":"var:preset|spacing|medium"},"blockGap":"var:preset|spacing|medium"}},"backgroundColor":"base","layout":{"type":"flex","orientation":"vertical"}} -->
<div class="wp-block-group has-base-background-color has-background" style="padding-top:var(--wp--preset--spacing--medium);padding-right:var(--wp--preset--spacing--medium);padding-bottom:var(--wp--preset--spacing--medium);padding-left:var(--wp--preset--spacing--medium)"><!-- wp:group {"metadata":{"name":"Text"},"style":{"spacing":{"blockGap":"var:preset|spacing|small"}},"layout":{"type":"flex","orientation":"vertical"}} -->
<div class="wp-block-group"><!-- wp:post-title {"level":3,"textColor":"primary","fontSize":"large"} /-->

<!-- wp:post-excerpt {"excerptLength":20,"textColor":"main-accent"} /--></div>
<!-- /wp:group -->

<!-- wp:post-terms {"term":"post_tag","className":"dhali-term-chips","fontSize":"x-small"} /-->

<!-- wp:buttons -->
<div class="wp-block-buttons"><!-- wp:button {"textColor":"primary-alt","metadata":{"bindings":{"url":{"source":"core/post-data","args":{"field":"link"}}}},"style":{"color":{"background":"#00000000"},"border":{"radius":"0px"},"spacing":{"padding":{"left":"0","right":"0"}}},"icon":"arrow-right"} -->
<div class="wp-block-button"><a class="wp-block-button__link has-primary-alt-color has-text-color has-background wp-element-button" style="border-radius:0px;background-color:#00000000;padding-right:0;padding-left:0">' . esc_html__( 'Learn more', 'dhali' ) . '</a></div>
<!-- /wp:button --></div>
<!-- /wp:buttons --></div>
<!-- /wp:group --></div>
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
