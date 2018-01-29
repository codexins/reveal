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
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

	<!--[if lt IE 9]>
	    <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="<?php echo esc_url(__('https://browsehappy.com/?locale=en', 'reveal')) ?>">upgrade your browser</a> to improve your experience.</p>
	<![endif]-->

	<?php 

	// Fetching and assigning data from theme options and metabox
	$page_identity			= ( is_page_template( 'page-templates/page-home.php' ) ) ? 'front-header' : 'inner-header';
	$enable_topbar 			= codexin_get_option( 'cx_enable_topbar' );
	$disable_head 			= codexin_meta( 'codexin_disable_header' );
	$disable_title 			= codexin_meta( 'codexin_disable_page_title' );

    /**
     * Initial contents after start of body tag, codexin_body_entry hook.
     *
     * @hooked codexin_pageloader - 10 (outputs the HTML for the page loader)
     * @hooked codexin_mobile_menu - 15 (outputs the HTML for the mobile menu)
     */
	do_action( 'codexin_body_entry' );

	?>

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

		        	if( $enable_topbar ) {
			        	// Go to the header topbar rendering template partial
				        get_template_part( 'framework/templates/header/header', 'topbar' );
		        	}

		        	// Go to the header rendering template partial
			        get_template_part( 'framework/templates/header/header', 'general' );

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
				get_template_part( 'framework/templates/header/page', 'title');
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
