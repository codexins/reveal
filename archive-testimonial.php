<?php
/**
 * The Testimonial Archive Template
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

	            $reveal_testimonial_layout = reveal_option('reveal-testimonial-archive-layout');

	            if($reveal_testimonial_layout == 1):
	                get_template_part('template-parts/page-layout/testimonial/no', 'sidebar');

	            elseif($reveal_testimonial_layout == 2):
	                get_template_part('template-parts/page-layout/testimonial/left', 'sidebar');

	            elseif($reveal_testimonial_layout == 3):
	                get_template_part('template-parts/page-layout/testimonial/right', 'sidebar');

	            else:
	                get_template_part('template-parts/page-layout/testimonial/right', 'sidebar');

	            endif;
	            
				 ?>
			</div> <!-- end of row -->
		</div> <!-- end of container -->
	</div> <!-- end of #content -->

<?php get_footer(); ?>
