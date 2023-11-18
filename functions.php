<?php
	function mychildtheme_enqueue_styles() {
		$parent_style = 'parent-style';

		wp_enqueue_style( $parent_style, get_template_directory_uri() . '/style.css' );
		wp_enqueue_style( 'child-style',
			get_stylesheet_directory_uri() . '/style.css',
			array( $parent_style )
		);
	}
	add_action( 'wp_enqueue_scripts', 'mychildtheme_enqueue_styles' );

	function custom_jetpack_default_image() {
		return 'https://ik.imagekit.io/dumani/My_Blog/twiiter-card-pic_x9Yv-8YEF.jpg?ik-sdk-version=javascript-1.4.3&updatedAt=1648021188010';
	}
	add_filter( 'jetpack_open_graph_image_default', 'custom_jetpack_default_image' );

	function cc_mime_types($mimes) {
		$mimes['svg'] = 'image/svg+xml'; 
		return $mimes;
	}
	add_filter('upload_mimes', 'cc_mime_types'); 
?>
