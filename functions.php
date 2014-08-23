<?php
/**
 * Custom functions
 */
require get_template_directory() . '/inc/digest.php';

/**
 * Create a custom post type for the digest.
 */
add_action( 'init', 'digest_create_posttype' );
function digest_create_posttype() {
	$settings = [
		'labels' => [
			'name' => __( 'Weekly Digest' ),
			'singular_name' => __( 'Digest' )
		],
		'public' => true,
		'has_archive' => true,
		'rewrite' => ['slug' => 'digest'],
		'supports' => ['title', 'editor', 'wpcom-markdown'],
	];
	register_post_type( 'digest', $settings );
}

/**
*Flush rewrite rules for custom post types. 
*/
add_action( 'after_switch_theme', 'digest_flush_rewrite_rules' );
function digest_flush_rewrite_rules() {
     flush_rewrite_rules();
}