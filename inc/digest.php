<?php

/**
 * Start a table
 *
 * @return string
 */
function laravelnews_table_start() {
	return '<table class="body-wrap"><tr><td>';
}

/**
 * End a table
 *
 * @return string
 */
function laravelnews_table_end() {
	return '</td></tr></table>';
}

/**
 * Get all the posts that occurred this week.
 *
 * @return string
 */
function laravelnews_posts_by_week() {
	$out = '';
	$the_query = new WP_Query( 'year=' . get_post_time( 'Y' ) . '&w=' . get_post_time( 'W' ) );
	if ( $the_query->have_posts() ) {
		$out .= '<ul>';
		while ( $the_query->have_posts() ) {
			$the_query->the_post();
			$out .= '<li><a href="'. get_the_permalink() .'">'. get_the_title() .'</a></li>';
		}
		$out .= '</ul>';
		wp_reset_postdata();
	}
	return $out;
}

/**
 * Set a break by closing the table and re-opening
 *
 * @return string
 */
function laravelnews_break() {
	return laravelnews_table_end().laravelnews_table_start();
}

/**
 * Add all our shortcodes.
 */
add_shortcode('table_start', 'laravelnews_table_start');
add_shortcode('table_end', 'laravelnews_table_end');
add_shortcode('digest_posts', 'laravelnews_posts_by_week');
add_shortcode('break', 'laravelnews_break');
