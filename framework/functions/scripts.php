<?php

/**
 * Functions definition to add stylesheets and scripts for frontend
 *
 * @package 	Reveal
 * @subpackage 	Core
 * @since 		1.0
 */


// Do not allow directly accessing this file.
defined( 'ABSPATH' ) OR die( esc_html__( 'This script cannot be accessed directly.', 'reveal' ) );


if ( ! function_exists( 'codexin_framework_scripts' ) ) {
	/**
	 * Enquequing stylesheets and scripts
	 *
	 * @uses 	wp_enqueue_style()
	 * @uses 	wp_enqueue_script()
	 * @since 	v1.0
	 */
	function codexin_framework_scripts() {
		
		//Load the stylesheets
		wp_enqueue_style( 'bootstrap-stylesheet', REVEAL_THEME_CSS . 'bootstrap.min.css', false, '3.3.7', 'all' );
		wp_enqueue_style( 'font-awesome-stylesheet', CODEXIN_FRAMEWORK_CSS . 'font-awesome.min.css', false, '4.7.0', 'all' );

		if( ! wp_style_is( 'slick-stylesheet', 'enqueued' ) ) {
			wp_enqueue_style( 'slick-stylesheet', CODEXIN_FRAMEWORK_CSS . 'slick.css', false, '1.8.1', 'all' );
		}

		wp_enqueue_style( 'superfish-stylesheet', CODEXIN_FRAMEWORK_CSS . 'superfish.css', false, '1.7.8', 'all' );
		wp_enqueue_style( 'typography-stylesheet', REVEAL_THEME_CSS . 'typography.css', false, '1.0', 'all' );
		wp_enqueue_style( 'wp-stylesheet', CODEXIN_FRAMEWORK_CSS . 'wp.css', false, '1.0', 'all' );

		if( ! wp_style_is( 'photoswipe-stylesheet', 'enqueued' ) ) {
			wp_enqueue_style( 'photoswipe-stylesheet', CODEXIN_FRAMEWORK_CSS . 'photoswipe.css', false, '4.1.2', 'all' );
		}
		
		// Load the Main stylesheet
		wp_enqueue_style( 'main-stylesheet', REVEAL_THEME_CSS . 'style.css', false, '1.0', 'all' );
		wp_enqueue_style( 'responsive-stylesheet', REVEAL_THEME_CSS . 'responsive.css', false, '1.0', 'all' );


		// Insert IE9 specific stylesheet in header
		wp_enqueue_style( 'IE9-styleshet', REVEAL_THEME_CSS . 'ie9.css' );
		wp_style_add_data( 'IE9-styleshet', 'conditional', 'IE 9' );		

		//load <=IE9 scripts
		wp_enqueue_script( 'htmlshiv', CODEXIN_FRAMEWORK_JS, 'html5shiv.min.js', '3.7.3', false);
		wp_script_add_data( 'htmlshiv', 'conditional', 'lt IE 9' );

		wp_enqueue_script( 'respond', CODEXIN_FRAMEWORK_JS, 'respond.min.js', '1.4.2', false);
		wp_script_add_data( 'respond', 'conditional', 'lt IE 9' );

		// Load scripts
		wp_enqueue_script( 'bootstrap-script', REVEAL_THEME_JS . 'bootstrap.min.js', array ( 'jquery' ), 3.3, true);
		wp_enqueue_script( 'easing-script', CODEXIN_FRAMEWORK_JS . 'jquery.easing.1.3.js', array ( 'jquery' ), 1.3, true);
		wp_enqueue_script( 'superfish-script', CODEXIN_FRAMEWORK_JS . 'superfish.js', array ( 'jquery' ), 1.7, true);
		
		//For Mobile Menu
		wp_enqueue_script( 'mobile-menu-script', CODEXIN_FRAMEWORK_JS . 'menu.js', array ( 'jquery' ), 1.0, true);

		// For Form Validation
		wp_enqueue_script( 'validate-script', CODEXIN_FRAMEWORK_JS . 'jquery.validate.js', array ( 'jquery' ), 1.16, true);

		// Retina Support
		wp_enqueue_script( 'retina-script', REVEAL_THEME_JS . 'retina.min.js', array ( 'jquery' ), 1.0, true);
		
		// Smooth Scroll Support
		$smoothscroll = codexin_get_option('reveal-smooth-scroll');
		if( $smoothscroll ) {
			wp_enqueue_script( 'smoothscroll-script', REVEAL_THEME_JS . 'smoothScroll.js', array ( 'jquery' ), 1.0, true);
		}

		// Comment Reply Ajax Support
		if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
			wp_enqueue_script( 'comment-reply' );
		}

		// Comments Ajax Support
		if( codexin_get_option( 'reveal-ajax-comments' ) && ! is_search() && ! is_404() ) {
			global $post;
			$count = wp_count_comments( $post->ID );
		    wp_register_script( 'ajax_comment', CODEXIN_FRAMEWORK_JS . 'ajax-comments.js', array('jquery') );
		    wp_localize_script( 'ajax_comment', 'codexin_ajax_comment_params', array(
		        'ajaxurl' => admin_url( 'admin-ajax.php' ),
		        'comment_count' => $count->approved
		    ) ); 
		    wp_enqueue_script( 'ajax_comment' );
		}

		// Carousel Support
		if( ! wp_script_is( 'slick-script', 'enqueued' ) ) {
		    wp_enqueue_script( 'slick-script', CODEXIN_FRAMEWORK_JS . 'slick.min.js', array ( 'jquery' ), 1.7, true);
		}

		// Google map for single events pages
		$reveal_gmap_api = get_option('codexin_options_gmap_api')['gmap_api'];
		if( is_singular( 'events' ) ) {
			wp_enqueue_script( 'reveal-gmap-api-script', 'https://maps.googleapis.com/maps/api/js?key='.$reveal_gmap_api, array ( 'jquery' ), '', true );
			wp_enqueue_script( 'reveal-gmap-script', CODEXIN_FRAMEWORK_JS . 'gmaps.js', array ( 'jquery' ), '0.4', true );

			$lat_var 		= codexin_meta( 'reveal_event_address_latitude' );
			$longi_var 		= codexin_meta( 'reveal_event_address_longitude' );
			$event_lat 		= ! empty( $lat_var ) ? $lat_var : '';
			$event_longi 	= ! empty( $longi_var ) ? $longi_var : '';
			$map_mkr 		= CODEXIN_FRAMEWORK_IMG . 'map-marker.png';

			wp_register_script( 'reveal-main-map-script', CODEXIN_FRAMEWORK_JS . 'main-map.js', array ( 'jquery' ), 1.0, true );
		    wp_localize_script( 'reveal-main-map-script', 'reveal_map_params', array(
		        'ev_lat' 	=> $event_lat,
		        'ev_long' 	=> $event_longi,
		        'ev_mkr' 	=> $map_mkr
		    ) ); 
		    wp_enqueue_script( 'reveal-main-map-script' );
		}

		// Image Popup Support
		if( ! wp_script_is( 'photswipe-script', 'enqueued' ) ) {
			wp_enqueue_script( 'photswipe-script', CODEXIN_FRAMEWORK_JS . 'photoswipe.min.js', array ( 'jquery' ), 4.1, true );
		}
		if( ! wp_script_is( 'photswipe-main-script', 'enqueued' ) ) {
			wp_enqueue_script( 'photswipe-main-script', CODEXIN_FRAMEWORK_JS . 'photoswipe-main.js', array ( 'jquery' ), 4.1, true );
		}

	    // Main script
		$responsive_nav 	= !empty( codexin_get_option( 'reveal-responsive-version' ) ) ? codexin_get_option( 'reveal-responsive-version' ) : 'left';
		$transition_loader 	= !empty( codexin_get_option( 'reveal-page-loader' ) ) ? codexin_get_option( 'reveal-page-loader' ) : true;
		wp_register_script( 'main-script', REVEAL_THEME_JS . 'main.js', array ( 'jquery' ), 1.0, true );
	    wp_localize_script( 'main-script', 'reveal_main_params', array(
	        'res_nav' 		=> $responsive_nav,
	        'trans_loader' 	=> $transition_loader
	    ) ); 
	    wp_enqueue_script( 'main-script' );

	}

}

// Hooking the styles and scripts into wp_enqueue_scripts
add_action( 'wp_enqueue_scripts', 'codexin_framework_scripts' );
?>