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
				<div class="col-xs-12">

					<div id="primary" class="site-main">
						<?php
						if ( have_posts() ) : 
							while ( have_posts() ) : the_post();

								/*
								 * Include the Post-Format-specific template for the content.
								 * If you want to override this in a child theme, then include a file
								 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
								 */
								get_template_part( 'template-parts/content', 'search' );

							endwhile; ?>

							<?php 
								$prev_link = get_previous_posts_link(esc_html__('&laquo; Newer Posts', 'reveal'));
								$next_link = get_next_posts_link(esc_html__('Older Posts &raquo;', 'reveal'));

							 ?>
							<div class="posts-nav" class="section">
								<?php if($prev_link): ?>
									<div class="nav-next alignleft"><?php echo $prev_link; ?></div>
								<?php endif; ?>
								<?php if($next_link): ?>
									<div class="nav-previous alignright"><?php echo $next_link; ?></div>
								<?php endif; ?>
								
							</div>

						<?php else :

							get_template_part( 'template-parts/content', 'none' );

						endif; ?>

					</div><!-- #primary -->
				</div> <!-- end of col -->
			</div> <!-- end of row -->
		</div> <!-- end of container -->
	</div> <!-- end of #content -->

<?php get_footer(); ?>
