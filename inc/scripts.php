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
	wp_enqueue_style( 'slick-stylesheet', get_template_directory_uri() . '/assets/css/slick.css',false,'1.1','all');
	wp_enqueue_style( 'typography-stylesheet', get_template_directory_uri() . '/assets/css/typography.css',false,'1.1','all');
	wp_enqueue_style( 'color-stylesheet', get_template_directory_uri() . '/assets/css/color.css',false,'1.1','all');
	wp_enqueue_style( 'wp-stylesheet', get_template_directory_uri() . '/assets/css/wp.css',false,'1.1','all');
	wp_enqueue_style( 'nice-select-stylesheet', get_template_directory_uri() . '/assets/css/nice-select.css',false,'1.1','all');
	if( ! wp_style_is( 'photoswipe-stylesheet', 'enqueued' ) ) {
		wp_enqueue_style( 'photoswipe-stylesheet', get_template_directory_uri() . '/assets/css/photoswipe.css',false,'1.1','all');
	}
	
	// Load the Main stylesheet
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
	wp_enqueue_script( 'bootstrap-js', get_template_directory_uri() . '/assets/js/bootstrap.min.js', array ( 'jquery' ), 3.3, true);
	wp_enqueue_script( 'easing-js', get_template_directory_uri() . '/assets/js/jquery.easing.1.3.js', array ( 'jquery' ), 1.3, true);
	
	//For Mobile Menu
	wp_enqueue_script( 'mobile-menu-script', get_template_directory_uri() . '/assets/js/menu.js', array ( 'jquery' ), 1.0, true);
	wp_enqueue_script( 'parallax-js', get_template_directory_uri() . '/assets/js/parallax.js', array ( 'jquery' ), 1.1, true);
	wp_enqueue_script( 'validate-js', get_template_directory_uri() . '/assets/js/jquery.validate.js', array ( 'jquery' ), 1.16, true);

	// Retina Support
	wp_enqueue_script( 'retina-js', get_template_directory_uri() . '/assets/js/retina.min.js', array ( 'jquery' ), 1.0, true);
	
	// Smooth Scroll Support
	$smoothscroll = reveal_option('reveal-smooth-scroll');
	if($smoothscroll == true):
		wp_enqueue_script( 'smoothscroll-js', get_template_directory_uri() . '/assets/js/smoothScroll.js', array ( 'jquery' ), 1.0, true);
	endif;

	// Comment Reply Ajax Support
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}

	// Carousel Support
	if( ! wp_script_is( 'slick-js', 'enqueued' ) ) {
	    wp_enqueue_script( 'slick-js', get_template_directory_uri() . '/assets/js/slick.min.js', array ( 'jquery' ), 1.6, true);
	}

	// jquery.nice-select.min.js file
	wp_enqueue_script( 'nice-select-js', get_template_directory_uri() . '/assets/js/jquery.nice-select.min.js', array ( 'jquery' ), 1.0, true);

	// Image Popup Support
	if( ! wp_script_is( 'photswipe-js', 'enqueued' ) ) {
		wp_enqueue_script( 'photswipe-js', get_template_directory_uri() . '/assets/js/photoswipe.min.js', array ( 'jquery' ), 4.1, true);
	}
	if( ! wp_script_is( 'photswipe-main-js', 'enqueued' ) ) {
		wp_enqueue_script( 'photswipe-main-js', get_template_directory_uri() . '/assets/js/photoswipe-main.js', array ( 'jquery' ), 4.1, true);
	}

	wp_enqueue_script( 'main-script', get_template_directory_uri() . '/assets/js/main.js', array ( 'jquery' ), 1.1, true);

} 

add_action( 'wp_enqueue_scripts', 'reveal_scripts');
?>