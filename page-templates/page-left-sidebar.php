<?php
/**
 * Template Name: Page - Left Sidebar
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package reveal
 */

get_header(); ?>

	<div id="content" class="main-content-wrapper">
		<div class="container">
			<div class="row">

				<div class="col-sm-4 col-md-3">
					<div id="secondary" class="widget-area" role="complementary" itemscope itemtype="http://schema.org/WPSideBar">
						<?php get_sidebar() ?>
					</div><!-- #secondary -->
				</div> <!-- end of col -->
				
				<div class="col-sm-8 col-md-8 col-md-offset-1">

					<div id="primary" class="site-main">
						<?php
						if ( have_posts() ) :
							
							while ( have_posts() ) : the_post();
								get_template_part( 'template-parts/content', 'page' );

							endwhile;
						endif; ?>

					</div><!-- #primary -->
				</div> <!-- end of col -->
			</div> <!-- end of row -->
		</div> <!-- end of container -->
	</div> <!-- end of #content -->

<?php get_footer(); ?>
