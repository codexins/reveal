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

	<div id="content" class="main-content-wrapper">
		<div class="container">
			<div class="row">

			<?php 

            $reveal_blog_layout = $reveal_option['reveal-single-layout'];

            if($reveal_blog_layout == 1):
                get_template_part('template-parts/page-layout/single-post/no', 'sidebar');

            elseif($reveal_blog_layout == 2):
                get_template_part('template-parts/page-layout/single-post/left', 'sidebar');

            elseif($reveal_blog_layout == 3):
                get_template_part('template-parts/page-layout/single-post/right', 'sidebar');

            else:
                get_template_part('template-parts/page-layout/single-post/right', 'sidebar');

            endif;
            
			 ?>

			</div> <!-- end of row -->
		</div> <!-- end of container -->
	</div> <!-- end of #content -->

<?php get_footer(); ?>
