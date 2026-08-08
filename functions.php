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

	function mychildtheme_enqueue_scripts() {
		// Inlined rather than enqueued as an external file: this site's
		// ImageKit integration rewrites local asset URLs to route through
		// the ImageKit CDN, whose origin pull is fixed to production. That
		// breaks these assets on staging (404s, or serves production's stale
		// copy) and adds two requests ImageKit isn't meant to serve anyway
		// (it's an image CDN, not a general asset CDN).
		wp_add_inline_style(
			'child-style',
			file_get_contents( get_stylesheet_directory() . '/css/lightbox.css' )
		);

		wp_register_script( 'mychildtheme-lightbox', false, array(), '1.0', true );
		wp_enqueue_script( 'mychildtheme-lightbox' );
		wp_add_inline_script(
			'mychildtheme-lightbox',
			file_get_contents( get_stylesheet_directory() . '/js/lightbox.js' )
		);
	}
	add_action( 'wp_enqueue_scripts', 'mychildtheme_enqueue_scripts' );

	// Jetpack's own image lightbox/carousel would otherwise compete with our
	// custom one (and only shows the currently-rendered small image, not the
	// full-resolution ImageKit version).
	add_filter( 'jp_carousel_maybe_disable', '__return_true' );

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
