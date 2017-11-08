<?php
/**
 * The template for displaying all single events.
 *
 *
 * @package reveal
 * @subpackage Templates
 */


// Do not allow directly accessing this file.
defined( 'ABSPATH' ) OR die( esc_html__( 'This script cannot be accessed directly.', 'reveal' ) );

get_header(); ?>

    <div id="content" class="main-content-wrapper site-content">
        <div class="container">
            <div class="row">
                
                <?php 

                // Go to the events loop template
				get_template_part( 'template-parts/loops/events', 'loop' );

		        ?>
                
            </div> <!-- end of row -->
        </div> <!-- end of container -->
    </div> <!-- end of #content -->

<?php get_footer(); ?>
