<?php
add_action( 'wp_enqueue_scripts', 'reveal_google_fonts' );
function reveal_google_fonts () {
	
	$fonts = array(
		'Lobster:400,700',
		'Montserrat:400,700',
		'Roboto:400,700'
	);
	
	$gfonts = '';
	$count = 1;
	foreach ( $fonts as $font ) :
		$gfonts .= $font;
		if ( $count != count( $fonts ) )
			$gfonts .= '|';
		$count++;
	endforeach;
	
	wp_enqueue_style( 'google-fonts', 'https://fonts.googleapis.com/css?family=' . $gfonts );

}
	
function reveal_scripts () {
	
	//Load the stylesheets
	wp_enqueue_style( 'bootstrap-stylesheet', get_template_directory_uri() . '/assets/css/bootstrap.min.css',false,'3.3.7','all');
	wp_enqueue_style( 'font-awesome', get_template_directory_uri() . '/assets/css/font-awesome.min.css',false,'all');
	wp_enqueue_style( 'owl-carousel-stylesheet', get_template_directory_uri() . '/assets/css/owl.carousel.css',false,'1.1','all');
	wp_enqueue_style( 'owl-theme-stylesheet', get_template_directory_uri() . '/assets/css/owl.theme.css',false,'1.1','all');
	wp_enqueue_style( 'magnific-stylesheet', get_template_directory_uri() . '/assets/css/magnific-popup.css',false,'1.1','all');
	wp_enqueue_style( 'typography-stylesheet', get_template_directory_uri() . '/assets/css/typography.css',false,'1.1','all');
	wp_enqueue_style( 'color-stylesheet', get_template_directory_uri() . '/assets/css/color.css',false,'1.1','all');
	wp_enqueue_style( 'wp-stylesheet', get_template_directory_uri() . '/assets/css/wp.css',false,'1.1','all');
	wp_enqueue_style( 'main-stylesheet', get_stylesheet_uri() );
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
	wp_enqueue_script( 'bootstrap-js', get_template_directory_uri() . '/assets/js/bootstrap.min.js', array ( 'jquery' ), 1.1, true);
	wp_enqueue_script( 'easing-js', get_template_directory_uri() . '/assets/js/jquery.easing.1.3.js', array ( 'jquery' ), 1.1, true);
	wp_enqueue_script( 'waypoint-js', get_template_directory_uri() . '/assets/js/waypoints.min.js', array ( 'jquery' ), 1.1, true);
	wp_enqueue_script( 'counterup-js', get_template_directory_uri() . '/assets/js/jquery.counterup.min.js', array ( 'jquery' ), 1.1, true);
	
	//For Mobile Menu
	wp_enqueue_script( 'mobile-menu-script', get_template_directory_uri() . '/assets/js/menu.js', array ( 'jquery' ), 1.1, true);

	wp_enqueue_script( 'owl-carousel-js', get_template_directory_uri() . '/assets/js/owl.carousel.min.js', array ( 'jquery' ), 1.1, true);
	wp_enqueue_script( 'imageloaded-js', get_template_directory_uri() . '/assets/js/imagesloaded.pkgd.min.js', array ( 'jquery' ), 1.1, true);
	wp_enqueue_script( 'isotope-js', get_template_directory_uri() . '/assets/js/isotope.pkgd.min.js', array ( 'jquery' ), 1.1, true);
	wp_enqueue_script( 'parallax-js', get_template_directory_uri() . '/assets/js/parallax.js', array ( 'jquery' ), 1.1, true);
	wp_enqueue_script( 'magnific-js', get_template_directory_uri() . '/assets/js/jquery.magnific-popup.min.js', array ( 'jquery' ), 1.1, true);

	wp_enqueue_script( 'validate-js', get_template_directory_uri() . '/assets/js/jquery.validate.js', array ( 'jquery' ), 1.1, true);
	
	$smoothscroll = reveal_option('reveal-smooth-scroll');
	if($smoothscroll == true):
		wp_enqueue_script( 'smoothscroll-js', get_template_directory_uri() . '/assets/js/smoothScroll.js', array ( 'jquery' ), 1.1, true);
	endif;

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}

	$gmap_api_key = reveal_option('reveal-google-map-api-key');
	if(!empty($gmap_api_key)): 
		wp_enqueue_script( 'google-js', 'https://maps.googleapis.com/maps/api/js?key='.$gmap_api_key, array('jquery'), 1.1, true);
	else: 
		wp_enqueue_script( 'google-js', 'https://maps.googleapis.com/maps/api/js', array('jquery'), 1.1, true);
	endif;
	wp_enqueue_script( 'gmap-js', get_template_directory_uri() . '/assets/js/gmaps.js', array ( 'google-js' ), 1.1, true);
	wp_enqueue_script( 'main-script', get_template_directory_uri() . '/assets/js/main.js', array ( 'jquery' ), 1.1, true);


	wp_enqueue_script( 'simple-likes-public-js', get_template_directory_uri() . '/assets/js/simple-likes-public.js', array( 'jquery' ), '0.5', false );
	wp_localize_script( 'simple-likes-public-js', 'simpleLikes', array(
		'ajaxurl' => admin_url( 'admin-ajax.php' ),
		'like' => __( 'Like', 'reveal' ),
		'unlike' => __( 'Unlike', 'reveal' )
	) ); 


} 

add_action( 'wp_enqueue_scripts', 'reveal_scripts');



?>