<?php

/**
 * The template for displaying the header
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @package 	Reveal
 * @subpackage 	Templates
 */


// Do not allow directly accessing this file.
defined( 'ABSPATH' ) OR die( esc_html__( 'This script cannot be accessed directly.', 'reveal' ) );

?><!DOCTYPE html>

<html <?php codexin_html_tag_schema(); ?> <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta http-equiv="x-ua-compatible" content="ie=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <link rel="profile" href="http://gmpg.org/xfn/11"/>
    <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>"/>
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

	<!--[if lt IE 9]>
	    <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="<?php echo esc_url(__('https://browsehappy.com/?locale=en', 'reveal')) ?>">upgrade your browser</a> to improve your experience.</p>
	<![endif]-->

	<?php 

	$header_version 		= codexin_get_option( 'reveal-header-version' );
	$page_identity			= ( is_page_template( 'page-templates/page-home.php' ) ) ? 'front-header' : 'inner-header';
	$disable_head 			= codexin_meta( 'reveal_disable_header' );
	$disable_title 			= codexin_meta( 'reveal_disable_page_title' );

    /**
     * Initial contents after start of body tag, codexin_body_entry hook.
     *
     * @hooked codexin_pageloader - 10 (outputs the HTML for the page loader)
     */
	do_action( 'codexin_body_entry' );

	?>

	<!-- Initializing Mobile Menu -->
	<div id="c-menu--slide-<?php echo esc_attr( codexin_responsive_class() ); ?>" class="c-menu c-menu--slide-<?php echo esc_attr( codexin_responsive_class() ); ?> reveal-color-2" itemscope itemtype="http://schema.org/SiteNavigationElement">
		<button class="c-menu__close"><i class="fa fa-times" aria-hidden="true"></i> <?php esc_html_e( 'Close', 'reveal' ); ?></button>
		<?php

		// Check if any menu is assigned
		if( has_nav_menu( 'mobile_menu' ) ) {

			// Assign the menu
			codexin_menu( 'mobile_menu' ); 

		} else {

			// If no menu assigned, give a notice
			echo codexin_add_menu( 'mobile' );

		} //end of nav menu check

		?>
	</div><!-- end of Moblie Menu -->

	<!-- Mobile Menu Masking -->
	<div id="c-mask" class="c-mask"></div>

	<!-- Start of whole -->
	<div id="whole" class="whole-site-wrapper">
		
		<?php

	    /**
	     * Initial contents after start of #whole tag, codexin_whole_wrapper_entry hook.
	     *
	     */
		do_action( 'codexin_whole_wrapper_entry' );

		if( $disable_head == 0 ) { ?>	
			<header id="header" class="header <?php echo esc_attr( $page_identity ); ?>" itemscope itemtype="http://schema.org/WPHeader">
		        <?php
		        echo ( $page_identity == 'inner-header' ) ? '<div class="nav-container">' : '';
				
					// Go to a specific header template partial depending on user choice
					if( $header_version == 1 ) {
						get_template_part( CODEXIN_TEMPLATE_PARTIALS . 'header/header', 'one' );
					} elseif ($header_version == 2 ) {
						get_template_part( CODEXIN_TEMPLATE_PARTIALS . 'header/header', 'two' );
					} elseif( $header_version == 3 ) {
						get_template_part( CODEXIN_TEMPLATE_PARTIALS . 'header/header', 'three' );
					} elseif( $header_version == 4 ) {
						get_template_part( CODEXIN_TEMPLATE_PARTIALS . 'header/header', 'four' );
					} else {
						get_template_part( CODEXIN_TEMPLATE_PARTIALS . 'header/header', 'one' );
					}

				echo ( $page_identity == 'inner-header' ) ? '</div> <!-- end of nav-container -->' : ''; ?>
			</header><!-- end of #header -->
		<?php } // end of header enable/disable check ?>	
		
		<?php 

		if( $disable_title == 0 ) {

		    /**
		     * Contents before start of #page_title tag, codexin_before_page_title hook.
		     *
		     */
			do_action( 'codexin_before_page_title' );

			if( ! is_page_template( 'page-templates/page-home.php' ) ) {
				// Go to the page tile template partial
				get_template_part( CODEXIN_TEMPLATE_PARTIALS . 'header/page', 'title');
			}

		    /**
		     * Contents after end of #page_title tag, codexin_after_page_title hook.
		     *
		     */
			do_action( 'codexin_after_page_title' );
		} else {
			echo ( $disable_head == 0 ) ? '<div class="reveal-spacer-30"></div>' : '';
		} // end of page title enable/disable check
		
		?>
		<div class="clearfix"></div>
