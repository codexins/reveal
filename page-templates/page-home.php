<?php
/**
 * Template Name: Page - Home
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package reveal
 */

get_header(); ?>


    <?php
    if ( have_posts() ) :

        /* Start the Loop */
        while ( have_posts() ) : the_post();

            get_template_part( 'template-parts/content', 'page' );


        endwhile; 

    endif; ?>

<?php get_footer(); ?>
