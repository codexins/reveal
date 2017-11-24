<?php
/**
 * Template Name: Page - Home
 *
 * @package Reveal
 * @subpackage Template
 */


// Do not allow directly accessing this file.
defined( 'ABSPATH' ) OR die( esc_html__( 'This script cannot be accessed directly.', 'reveal' ) );

get_header(); ?>
	
	<div id="content" class="main-content-wrapper site-content">
		<main id="primary" class="site-main inside-page" itemscope itemprop="mainContentOfPage" itemtype="http://schema.org/WebPageElement">

		    <?php
		    if ( have_posts() ) {

		        /* Start the Loop */
		        while ( have_posts() ) {
		        	the_post();

		        	// Load the specific template
		            get_template_part( CODEXIN_TEMPLATE_PARTIALS . 'general/content', 'page' );


		        } // end of loop have_posts()
			
			} //End check-posts if()
		    ?>

		</main> <!-- end of #primary -->
	</div> <!-- end of #content -->

<?php get_footer(); ?>
