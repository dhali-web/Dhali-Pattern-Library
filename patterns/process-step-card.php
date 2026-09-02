<?php
return array(
	'title'         => __( 'Process Step Card', 'dhali' ),
	'categories'    => array( 'dhali-web-development', 'card' ),
	'description'   => _x( 'A numbered process step card with image, step label, heading, description, and decorative ghost number.', 'Block pattern description', 'dhali' ),
	'keywords'      => array( 'process', 'step', 'card', 'numbered', 'services' ),
	'viewportWidth' => 1500,
	'blockTypes'    => array( 'core/group' ),
	'content'       => '
<!-- wp:group {"metadata":{"name":"Step Card","patternName":"dhali-patterns/process-step-card"},"style":{"spacing":{"padding":{"top":"var:preset|spacing|medium","right":"var:preset|spacing|medium","bottom":"var:preset|spacing|medium","left":"var:preset|spacing|medium"}},"border":{"radius":"var:preset|border-radius|lg"},"shadow":"var:preset|shadow|small-light"},"backgroundColor":"base","layout":{"type":"constrained"}} -->
<div class="wp-block-group has-base-background-color has-background" style="border-radius:var(--wp--preset--border-radius--lg);padding-top:var(--wp--preset--spacing--medium);padding-right:var(--wp--preset--spacing--medium);padding-bottom:var(--wp--preset--spacing--medium);padding-left:var(--wp--preset--spacing--medium);box-shadow:var(--wp--preset--shadow--small-light)">

	<!-- wp:image {"sizeSlug":"full","linkDestination":"none","style":{"border":{"radius":"var:preset|border-radius|md"}}} -->
	<figure class="wp-block-image size-full" style="border-radius:var(--wp--preset--border-radius--md)"><img src="' . esc_url( plugin_dir_url( dirname( __FILE__ ) ) . 'assets/images/placeholder-wide-16x9.webp' ) . '" alt=""/></figure>
	<!-- /wp:image -->

	<!-- wp:group {"metadata":{"name":"Content"},"style":{"spacing":{"blockGap":"var:preset|spacing|small"}},"layout":{"type":"constrained"}} -->
	<div class="wp-block-group">

		<!-- wp:heading {"level":3,"fontSize":"medium"} -->
		<h3 class="wp-block-heading has-medium-font-size"><mark style="background-color:rgba(0, 0, 0, 0)" class="has-inline-color has-primary-accent-color">01.</mark> ' . esc_html__( 'This is a title', 'dhali' ) . '</h3>
		<!-- /wp:heading -->

		<!-- wp:paragraph -->
		<p>' . esc_html__( 'This is an example of paragraph text', 'dhali' ) . '</p>
		<!-- /wp:paragraph -->

		<!-- wp:paragraph {"textAlign":"right","textColor":"border-light","fontSize":"xx-large","style":{"typography":{"fontWeight":"700"}}} -->
		<p class="has-text-align-right has-border-light-color has-text-color has-xx-large-font-size" style="font-weight:700">01</p>
		<!-- /wp:paragraph -->

	</div>
	<!-- /wp:group -->

</div>
<!-- /wp:group -->
',
);
