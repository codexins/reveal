<?php
/**
 * Template Name: Page - Home
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package reveal
 */

get_header(); ?>
	<div class="inside-page">

    <?php
    if ( have_posts() ) :

        /* Start the Loop */
        while ( have_posts() ) : the_post();

            get_template_part( 'template-parts/views/list/content', 'page' );


        endwhile; 

    endif; ?>

   </div> 

<?php get_footer(); ?>
