<?php

/**
 *
 * The template for displaying archives pages
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

	            $reveal_blog_layout = reveal_option('reveal-blog-layout');

	            if( $reveal_blog_layout == 1 ) {

	                get_template_part('template-parts/layouts/blog/archive/no', 'sidebar');

	            } elseif( $reveal_blog_layout == 2 ) {

	                get_template_part('template-parts/layouts/blog/archive/left', 'sidebar');

	            } elseif( $reveal_blog_layout == 3 ) {

	                get_template_part('template-parts/layouts/blog/archive/right', 'sidebar');

	            } else {

	                get_template_part('template-parts/layouts/blog/archive/right', 'sidebar');
	            
	            }
	            
				?>
			</div> <!-- end of row -->
		</div> <!-- end of container -->
	</div> <!-- end of #content -->

<?php get_footer(); ?>
