<?php
/**
 * Custom functions
 */
require get_template_directory() . '/inc/digest.php';

/**
 * Create a custom post type for the digest.
 */
add_action( 'init', 'create_posttype' );
function create_posttype() {
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
	flush_rewrite_rules();
}
