<?php
/**
 * Scroll Timeline
 *
 * A scroll-driven vertical timeline: alternating image/content rows with a
 * center rail that fills from gray to the brand color as the visitor
 * scrolls, and markers that activate as each event is reached.
 *
 * Architecture notes for future maintainers:
 *
 *  - This pattern is pure native block markup and carries zero decorative
 *    elements. The rail, progress fill, and event markers are all CSS
 *    pseudo-elements driven off the .dhali-timeline / .dhali-timeline__item
 *    classes below — see assets/css/dhali-timeline.css.
 *  - assets/js/dhali-timeline.js drives the scroll interaction. It writes a
 *    single unitless 0-1 value to --dhali-timeline-progress (consumed by a
 *    scaleY() transform in CSS) and toggles .is-active per item. It does
 *    not create, move, or remove any DOM nodes.
 *  - Both assets are conditionally enqueued from dhali-pattern-library.php
 *    only on pages whose content contains "dhali-timeline", so they never
 *    load on pages that don't use this pattern.
 *  - Every timeline row is authored identically — Image column, then a
 *    Date/Heading/Paragraph column — in that order. CSS produces the
 *    left/right alternation via :nth-child(2n), so this content should
 *    never be manually reversed when duplicating rows.
 *  - .dhali-timeline wraps ONLY the row Columns blocks. If a heading or
 *    intro paragraph is ever added above the timeline, put it in the
 *    surrounding constrained group, not inside .dhali-timeline, or it will
 *    join the :nth-child(2n) alternation and throw off every row after it.
 *  - Item padding and column gap are set as real Ollie spacing-token block
 *    attributes (visible/editable in the block sidebar), not hidden in
 *    component CSS, per the Ollie design system's spacing rules.
 *  - The 781px breakpoint in the CSS/JS matches core Gutenberg's own
 *    Columns stacking point as of this writing. WordPress has changed
 *    that value before — reconfirm it against whatever WP version this
 *    site is running before relying on it long-term.
 */
return array(
	'title'         => __( 'Scroll Timeline', 'dhali' ),
	'categories'    => array( 'dhali-web-development' ),
	'description'   => _x( 'A scroll-driven vertical timeline with alternating image/content rows and a progress rail that fills as the visitor scrolls.', 'Block pattern description', 'dhali' ),
	'keywords'      => array( 'timeline', 'history', 'about', 'scroll', 'milestones' ),
	'viewportWidth' => 1400,
	'blockTypes'    => array( 'core/group' ),
	'content'       => '
<!-- wp:group {"tagName":"section","align":"full","style":{"spacing":{"padding":{"top":"var:preset|spacing|x-large","bottom":"var:preset|spacing|x-large","left":"var:preset|spacing|medium","right":"var:preset|spacing|medium"}}}} -->
<section class="wp-block-group alignfull" style="padding-top:var(--wp--preset--spacing--x-large);padding-bottom:var(--wp--preset--spacing--x-large);padding-left:var(--wp--preset--spacing--medium);padding-right:var(--wp--preset--spacing--medium)">

<!-- wp:group {"layout":{"type":"constrained"}} -->
<div class="wp-block-group">

<!-- wp:group {"className":"dhali-timeline"} -->
<div class="wp-block-group dhali-timeline">

<!-- wp:columns {"className":"dhali-timeline__item","style":{"spacing":{"blockGap":"var:preset|spacing|xx-large","padding":{"top":"var:preset|spacing|large","bottom":"var:preset|spacing|large"}}}} -->
<div class="wp-block-columns dhali-timeline__item" style="padding-top:var(--wp--preset--spacing--large);padding-bottom:var(--wp--preset--spacing--large);gap:var(--wp--preset--spacing--xx-large)">

<!-- wp:column -->
<div class="wp-block-column">
<!-- wp:image {"align":"center","sizeSlug":"large"} -->
<figure class="wp-block-image aligncenter size-large"><img src="' . esc_url( plugin_dir_url( dirname( __FILE__ ) ) . 'assets/images/placeholder-portrait-3x4.webp' ) . '" alt=""/></figure>
<!-- /wp:image -->
</div>
<!-- /wp:column -->

<!-- wp:column -->
<div class="wp-block-column">

<!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|small"}}} -->
<div class="wp-block-group" style="gap:var(--wp--preset--spacing--small)">

<!-- wp:paragraph {"textColor":"primary","fontSize":"small"} -->
<p class="has-primary-color has-text-color has-small-font-size">January 15th, 2005</p>
<!-- /wp:paragraph -->

<!-- wp:heading {"level":3,"fontSize":"large"} -->
<h3 class="wp-block-heading has-large-font-size">A milestone is reached</h3>
<!-- /wp:heading -->

<!-- wp:paragraph {"textColor":"secondary","fontSize":"base"} -->
<p class="has-secondary-color has-text-color has-base-font-size">Describe what happened at this point in the timeline and why it mattered.</p>
<!-- /wp:paragraph -->

</div>
<!-- /wp:group -->

</div>
<!-- /wp:column -->

</div>
<!-- /wp:columns -->

<!-- wp:columns {"className":"dhali-timeline__item","style":{"spacing":{"blockGap":"var:preset|spacing|xx-large","padding":{"top":"var:preset|spacing|large","bottom":"var:preset|spacing|large"}}}} -->
<div class="wp-block-columns dhali-timeline__item" style="padding-top:var(--wp--preset--spacing--large);padding-bottom:var(--wp--preset--spacing--large);gap:var(--wp--preset--spacing--xx-large)">

<!-- wp:column -->
<div class="wp-block-column">
<!-- wp:image {"align":"center","sizeSlug":"large"} -->
<figure class="wp-block-image aligncenter size-large"><img src="' . esc_url( plugin_dir_url( dirname( __FILE__ ) ) . 'assets/images/placeholder-portrait-3x4.webp' ) . '" alt=""/></figure>
<!-- /wp:image -->
</div>
<!-- /wp:column -->

<!-- wp:column -->
<div class="wp-block-column">

<!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|small"}}} -->
<div class="wp-block-group" style="gap:var(--wp--preset--spacing--small)">

<!-- wp:paragraph {"textColor":"primary","fontSize":"small"} -->
<p class="has-primary-color has-text-color has-small-font-size">March 28th, 2010</p>
<!-- /wp:paragraph -->

<!-- wp:heading {"level":3,"fontSize":"large"} -->
<h3 class="wp-block-heading has-large-font-size">The story continues</h3>
<!-- /wp:heading -->

<!-- wp:paragraph {"textColor":"secondary","fontSize":"base"} -->
<p class="has-secondary-color has-text-color has-base-font-size">Describe what happened at this point in the timeline and why it mattered.</p>
<!-- /wp:paragraph -->

</div>
<!-- /wp:group -->

</div>
<!-- /wp:column -->

</div>
<!-- /wp:columns -->

<!-- wp:columns {"className":"dhali-timeline__item","style":{"spacing":{"blockGap":"var:preset|spacing|xx-large","padding":{"top":"var:preset|spacing|large","bottom":"var:preset|spacing|large"}}}} -->
<div class="wp-block-columns dhali-timeline__item" style="padding-top:var(--wp--preset--spacing--large);padding-bottom:var(--wp--preset--spacing--large);gap:var(--wp--preset--spacing--xx-large)">

<!-- wp:column -->
<div class="wp-block-column">
<!-- wp:image {"align":"center","sizeSlug":"large"} -->
<figure class="wp-block-image aligncenter size-large"><img src="' . esc_url( plugin_dir_url( dirname( __FILE__ ) ) . 'assets/images/placeholder-portrait-3x4.webp' ) . '" alt=""/></figure>
<!-- /wp:image -->
</div>
<!-- /wp:column -->

<!-- wp:column -->
<div class="wp-block-column">

<!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|small"}}} -->
<div class="wp-block-group" style="gap:var(--wp--preset--spacing--small)">

<!-- wp:paragraph {"textColor":"primary","fontSize":"small"} -->
<p class="has-primary-color has-text-color has-small-font-size">February 10th, 2015</p>
<!-- /wp:paragraph -->

<!-- wp:heading {"level":3,"fontSize":"large"} -->
<h3 class="wp-block-heading has-large-font-size">Bringing things up to date</h3>
<!-- /wp:heading -->

<!-- wp:paragraph {"textColor":"secondary","fontSize":"base"} -->
<p class="has-secondary-color has-text-color has-base-font-size">Describe what happened at this point in the timeline and why it mattered.</p>
<!-- /wp:paragraph -->

</div>
<!-- /wp:group -->

</div>
<!-- /wp:column -->

</div>
<!-- /wp:columns -->

</div>
<!-- /wp:group -->

</div>
<!-- /wp:group -->

</section>
<!-- /wp:group -->
	',
);
