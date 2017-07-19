				<div class="col-sm-8 col-md-8">
					<div id="primary" class="site-main">
						<?php
							/* Start the Loop */
							while ( have_posts() ) : the_post();

								reveal_set_post_views(get_the_ID());
								get_template_part( 'template-parts/content', get_post_format()  );

								if( reveal_option( 'reveal_single_button' ) == true ):
									reveal_post_link();
								endif;

								// If comments are open or we have at least one comment, load up the comment template.
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