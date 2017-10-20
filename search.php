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
				<div class="col-xs-8 col-xs-offset-2">

					<div id="primary" class="site-main">
						<?php
						if ( have_posts() ) : 
							while ( have_posts() ) : the_post();

								/*
								 * Include the Post-Format-specific template for the content.
								 * If you want to override this in a child theme, then include a file
								 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
								 */
								get_template_part( 'template-parts/views/list/content', 'search' );

							endwhile; ?>

							<?php echo reveal_posts_link_numbered(); ?>

						<?php else :

							get_template_part( 'template-parts/views/list/content', 'none' );

						endif; ?>

					</div><!-- #primary -->
				</div> <!-- end of col -->
			</div> <!-- end of row -->
		</div> <!-- end of container -->
	</div> <!-- end of #content -->

<?php get_footer(); ?>
