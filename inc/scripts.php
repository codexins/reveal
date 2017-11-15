<?php
function reveal_scripts () {
	
	//Load the stylesheets
	wp_enqueue_style( 'bootstrap-stylesheet', get_template_directory_uri() . '/assets/css/bootstrap.min.css',false,'3.3.7','all');
	wp_enqueue_style( 'font-awesome', get_template_directory_uri() . '/assets/css/font-awesome.min.css',false,'all');
	wp_enqueue_style( 'slick-stylesheet', get_template_directory_uri() . '/assets/css/slick.css',false,'1.1','all');
	wp_enqueue_style( 'superfish-stylesheet', get_template_directory_uri() . '/assets/css/superfish.css',false,'1.1','all');
	wp_enqueue_style( 'typography-stylesheet', get_template_directory_uri() . '/assets/css/typography.css',false,'1.1','all');
	wp_enqueue_style( 'wp-stylesheet', get_template_directory_uri() . '/assets/css/wp.css',false,'1.1','all');
	if( ! wp_style_is( 'photoswipe-stylesheet', 'enqueued' ) ) {
		wp_enqueue_style( 'photoswipe-stylesheet', get_template_directory_uri() . '/assets/css/photoswipe.css',false,'1.1','all');
	}
	
	// Load the Main stylesheet
	wp_enqueue_style( 'main-stylesheet', get_stylesheet_uri() );
	//wp_enqueue_style( 'color-stylesheet', get_template_directory_uri() . '/assets/css/color.css',false,'1.1','all');
	wp_enqueue_style( 'responsive-stylesheet', get_template_directory_uri() . '/assets/css/responsive.css' );


	// Insert IE9 specific stylesheet in header
	wp_enqueue_style( 'IE9-styleshet', get_template_directory_uri() . '/assets/css/ie9.css' );
	wp_style_add_data( 'IE9-styleshet', 'conditional', 'IE 9' );
	

	//load <=IE9 scripts
	wp_enqueue_script( 'htmlshiv', 'https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js', '', '3.7.3', false);
	wp_script_add_data( 'htmlshiv', 'conditional', 'lt IE 9' );
	wp_enqueue_script( 'respond', 'https://oss.maxcdn.com/respond/1.4.2/respond.min.js', '', '1.4.2', false);
	wp_script_add_data( 'respond', 'conditional', 'lt IE 9' );

	// Load scripts
	wp_enqueue_script( 'bootstrap-js', get_template_directory_uri() . '/assets/js/bootstrap.min.js', array ( 'jquery' ), 3.3, true);
	wp_enqueue_script( 'easing-js', get_template_directory_uri() . '/assets/js/jquery.easing.1.3.js', array ( 'jquery' ), 1.3, true);
	wp_enqueue_script( 'superfish-js', get_template_directory_uri() . '/assets/js/superfish.js', array ( 'jquery' ), 1.3, true);
	
	//For Mobile Menu
	wp_enqueue_script( 'mobile-menu-script', get_template_directory_uri() . '/assets/js/menu.js', array ( 'jquery' ), 1.0, true);

	// For Form Validation
	wp_enqueue_script( 'validate-js', get_template_directory_uri() . '/assets/js/jquery.validate.js', array ( 'jquery' ), 1.16, true);

	// Retina Support
	wp_enqueue_script( 'retina-js', get_template_directory_uri() . '/assets/js/retina.min.js', array ( 'jquery' ), 1.0, true);
	
	// Smooth Scroll Support
	$smoothscroll = codexin_get_option('reveal-smooth-scroll');
	if($smoothscroll == true):
		wp_enqueue_script( 'smoothscroll-js', get_template_directory_uri() . '/assets/js/smoothScroll.js', array ( 'jquery' ), 1.0, true);
	endif;

	// Comment Reply Ajax Support
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}

	// Comments Ajax Support
	if( codexin_get_option( 'reveal-ajax-comments' ) && ! is_search() && ! is_404() ) {
		global $post;
		$count = wp_count_comments($post->ID);
	    wp_register_script( 'ajax_comment', get_template_directory_uri() . '/assets/js/ajax-comments.js', array('jquery') );
	    wp_localize_script( 'ajax_comment', 'reveal_ajax_comment_params', array(
	        'ajaxurl' => admin_url( 'admin-ajax.php' ),
	        'comment_count' => $count->approved
	    ) ); 
	    wp_enqueue_script( 'ajax_comment' );
	}

	// Carousel Support
	if( ! wp_script_is( 'slick-js', 'enqueued' ) ) {
	    wp_enqueue_script( 'slick-js', get_template_directory_uri() . '/assets/js/slick.min.js', array ( 'jquery' ), 1.7, true);
	}

	// Google map for single events pages
	$reveal_gmap_api = get_option('codexin_options_gmap_api')['gmap_api'];
	if(is_singular('events')):
			wp_enqueue_script( 'reveal-gmap-api-js', 'https://maps.googleapis.com/maps/api/js?key='.$reveal_gmap_api, array ( 'jquery' ), '', true);
			wp_enqueue_script( 'reveal-gmap-js', get_template_directory_uri() . '/assets/js/gmaps.js', array ( 'jquery' ), '0.4', true);
			$lat_var = rwmb_meta('reveal_event_address_latitude', 'type=text');
			$longi_var = rwmb_meta('reveal_event_address_longitude', 'type=text');
			$event_lat = !empty( $lat_var ) ? $lat_var : '';
			$event_longi = !empty( $longi_var ) ? $longi_var : '';
			$map_mkr = get_template_directory_uri().'/assets/images/map-marker.png';
			wp_register_script( 'reveal-main-map-js', get_template_directory_uri() . '/assets/js/main-map.js', array ( 'jquery' ), 1.0, true);
		    wp_localize_script( 'reveal-main-map-js', 'reveal_map_params', array(
		        'ev_lat' => $event_lat,
		        'ev_long' => $event_longi,
		        'ev_mkr' => $map_mkr
		    ) ); 
		    wp_enqueue_script( 'reveal-main-map-js' );
	endif;

	// Image Popup Support
	if( ! wp_script_is( 'photswipe-js', 'enqueued' ) ) {
		wp_enqueue_script( 'photswipe-js', get_template_directory_uri() . '/assets/js/photoswipe.min.js', array ( 'jquery' ), 4.1, true);
	}
	if( ! wp_script_is( 'photswipe-main-js', 'enqueued' ) ) {
		wp_enqueue_script( 'photswipe-main-js', get_template_directory_uri() . '/assets/js/photoswipe-main.js', array ( 'jquery' ), 4.1, true);
	}

    // Main script
	$responsive_nav = !empty( codexin_get_option( 'reveal-responsive-version' ) ) ? codexin_get_option( 'reveal-responsive-version' ) : 'left';
	$transition_loader = !empty( codexin_get_option( 'reveal-page-loader' ) ) ? codexin_get_option( 'reveal-page-loader' ) : true;
	wp_register_script( 'main-script', get_template_directory_uri() . '/assets/js/main.js', array ( 'jquery' ), 1.0, true);
    wp_localize_script( 'main-script', 'reveal_main_params', array(
        'res_nav' => $responsive_nav,
        'trans_loader' => $transition_loader
    ) ); 
    wp_enqueue_script( 'main-script' );

} 

add_action( 'wp_enqueue_scripts', 'reveal_scripts');
?>