<?php

/**
 *
 * The template for displaying custom post type 'portfolio' archives pages
 *
 * @package reveal
 */


// Do not allow directly accessing this file.
defined( 'ABSPATH' ) OR die( 'This script cannot be accessed directly.' );

get_header(); ?>

	<div id="content" class="main-content-wrapper site-content">
		<div class="container">
			<div class="row">
				<?php 

				// Retieving data from theme options
	            $reveal_portfolio_layout = reveal_option('reveal-portfolio-archive-layout');

	            if( $reveal_portfolio_layout == 1 ) {

	                get_template_part('template-parts/layouts/portfolio/archive/no', 'sidebar');

	            } elseif( $reveal_portfolio_layout == 2 ) {

	                get_template_part('template-parts/layouts/portfolio/archive/left', 'sidebar');

	            } elseif( $reveal_portfolio_layout == 3 ) {

	                get_template_part('template-parts/layouts/portfolio/archive/right', 'sidebar');

	            } else {

	                get_template_part('template-parts/layouts/portfolio/archive/no', 'sidebar');

	            }
	            
				?>
			</div> <!-- end of row -->
		</div> <!-- end of container -->
	</div> <!-- end of #content -->

<?php get_footer(); ?>
