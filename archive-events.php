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

	            $reveal_events_layout = reveal_option('reveal-events-archive-layout');

	            if($reveal_events_layout == 1):
	                get_template_part('template-parts/page-layout/events/no', 'sidebar');

	            elseif($reveal_events_layout == 2):
	                get_template_part('template-parts/page-layout/events/left', 'sidebar');

	            elseif($reveal_events_layout == 3):
	                get_template_part('template-parts/page-layout/events/right', 'sidebar');

	            else:
	                get_template_part('template-parts/page-layout/events/right', 'sidebar');

	            endif;
	            
				 ?>
			</div> <!-- end of row -->
		</div> <!-- end of container -->
	</div> <!-- end of #content -->

<?php get_footer(); ?>
