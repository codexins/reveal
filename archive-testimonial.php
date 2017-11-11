<?php

/**
 *
 * The template for displaying custom post type 'testimonial' archives pages
 *
 * @package Reveal
 */


// Do not allow directly accessing this file.
defined( 'ABSPATH' ) OR die( 'This script cannot be accessed directly.' );

get_header(); ?>

	<div id="content" class="main-content-wrapper site-content">
		<div class="container">
			<div class="row">
				<?php 

				// Retieving data from theme options
	            $reveal_testimonial_layout = reveal_option('reveal-testimonial-archive-layout');

	            if( $reveal_testimonial_layout == 1 ) {

	                get_template_part('template-parts/layouts/testimonial/archive/no', 'sidebar');

	            } elseif( $reveal_testimonial_layout == 2 ) {

	                get_template_part('template-parts/layouts/testimonial/archive/left', 'sidebar');

	            } elseif( $reveal_testimonial_layout == 3 ) {

	                get_template_part('template-parts/layouts/testimonial/archive/right', 'sidebar');

	            } else {

	                get_template_part('template-parts/layouts/testimonial/archive/no', 'sidebar');

	            }
	            
				?>
			</div> <!-- end of row -->
		</div> <!-- end of container -->
	</div> <!-- end of #content -->

<?php get_footer(); ?>
