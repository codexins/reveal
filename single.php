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
				<div class="col-sm-8 col-md-8">
					<div id="primary" class="site-main">
						<?php
							/* Start the Loop */
							while ( have_posts() ) : the_post();

								reveal_set_post_views(get_the_ID());
								get_template_part( 'template-parts/content', get_post_format()  ); ?>

							<?php 
								$prev_link = get_previous_post_link('%link', esc_html__('Previous Post &raquo;', 'reveal'));
								$next_link = get_next_post_link('%link', esc_html__('&laquo; Next Post', 'reveal'));
							 ?>

								<div class="posts-nav" class="section">

									<?php if($next_link): ?>
									<div class="nav-next alignleft"><?php echo $next_link; ?></div>
									<?php endif; ?>

									<?php if($prev_link): ?>
									<div class="nav-previous alignright"><?php echo $prev_link; ?></div>
									<?php endif; ?>

								</div>

							<?php	// If comments are open or we have at least one comment, load up the comment template.
								if ( comments_open() || get_comments_number() ) :
									comments_template();
								endif;
							endwhile; ?>

					</div><!-- #primary -->
				</div> <!-- end of col -->

				<div class="col-sm-4 col-md-4">
					<div id="secondary" class="widget-area" role="complementary">
						<?php get_sidebar() ?>
					</div><!-- #secondary -->
				</div> <!-- end of col -->

			</div> <!-- end of row -->
		</div> <!-- end of container -->
	</div> <!-- end of #content -->

<?php get_footer(); ?>
