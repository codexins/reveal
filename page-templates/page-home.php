<?php
/**
 * Template Name: Page - Home
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Reveal
 */

get_header(); ?>
	
	<div id="content" class="main-content-wrapper inside-page">

	    <?php
	    if ( have_posts() ) :

	        /* Start the Loop */
	        while ( have_posts() ) : the_post();

	            get_template_part( CODEXIN_TEMPLATE_PARTIALS . 'general/content', 'page' );


	        endwhile; 

	    endif; ?>

   </div> <!-- end of #content -->

<?php get_footer(); ?>
