<?php
/**
 * Server-side rendering file for the 'hussainas/latest-posts' block.
 *
 * This file is loaded automatically by WordPress when the block is
 * rendered, thanks to the 'render' key in block.json.
 *
 * @param array    $attributes The block attributes (defined in block.json).
 * @param string   $content    The block's inner content (not used in this block).
 * @param WP_Block $block      The block instance.
 *
 * @return string The block's HTML output.
 *
 * @package HussainasDynamicBlocks
 */

// Prevent direct script access.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

// 1. Set up query arguments based on block attributes.
$args = array(
	'post_type'      => 'post',
	'posts_per_page' => $attributes['numberOfPosts'],
	'order'          => $attributes['order'],
	'orderby'        => $attributes['orderBy'],
	'post_status'    => 'publish',
);

// 2. Run the post query.
$recent_posts = new WP_Query( $args );

// 3. Start output buffering to capture the HTML.
ob_start();

// 4. Generate the HTML.
// get_block_wrapper_attributes() is crucial for applying block styles,
// alignment (e.g., 'alignwide'), and the default block class.
$wrapper_attributes = get_block_wrapper_attributes();

if ( $recent_posts->have_posts() ) {

	// Output the main wrapper div with block attributes.
	echo '<div ' . $wrapper_attributes . '>';
	echo '<ul>';

	while ( $recent_posts->have_posts() ) {
		$recent_posts->the_post();
		
		echo '<li>';
		echo '<a href="' . esc_url( get_permalink() ) . '">' . esc_html( get_the_title() ) . '</a>';
		
		// Conditionally display the post date based on the attribute.
		if ( ! empty( $attributes['displayPostDate'] ) && $attributes['displayPostDate'] === true ) {
			echo '<span class="post-date"> - ' . esc_html( get_the_date() ) . '</span>';
		}

		echo '</li>';
	}

	echo '</ul>';
	echo '</div>'; // End wrapper.

} else {
	// No posts found.
	echo '<div ' . $wrapper_attributes . '>';
	echo '<p>No posts found.</p>';
	echo '</div>'; // End wrapper.
}

// 5. Restore original post data.
wp_reset_postdata();

// 6. Return the buffered content.
return ob_get_clean();
