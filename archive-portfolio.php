<?php
/**
 * The Portfolio Archive Template
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

	            $reveal_portfolio_layout = $reveal_option['reveal-portfolio-archive-layout'];

	            if($reveal_portfolio_layout == 1):
	                get_template_part('template-parts/page-layout/portfolio/no', 'sidebar');

	            elseif($reveal_portfolio_layout == 2):
	                get_template_part('template-parts/page-layout/portfolio/left', 'sidebar');

	            elseif($reveal_portfolio_layout == 3):
	                get_template_part('template-parts/page-layout/portfolio/right', 'sidebar');

	            else:
	                get_template_part('template-parts/page-layout/portfolio/right', 'sidebar');

	            endif;
	            
				 ?>

			</div> <!-- end of row -->
		</div> <!-- end of container -->
	</div> <!-- end of #content -->

<?php get_footer(); ?>
