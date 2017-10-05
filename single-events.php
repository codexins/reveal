<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package reveal
 */

get_header(); ?>

    <div id="content" class="main-content-wrapper site-content">
        <div class="container">
            <div class="row">
                
                <?php 
		        //start new query..
	 	        if( have_posts() ) :
			        //Start loop here...
	 		        while( have_posts() ) : the_post();
                        get_template_part( 'template-parts/sidebar-status/events/single/content', 'events' ); 
                
                    endwhile;
                    endif; 
		        ?>
                
            </div> <!-- end of row -->
        </div> <!-- end of container -->
    </div> <!-- end of #content -->

<?php get_footer(); ?>
