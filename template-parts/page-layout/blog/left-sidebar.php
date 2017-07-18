				<div class="col-sm-4 col-md-4">
					<div id="secondary" class="widget-area" role="complementary">
						<?php get_sidebar() ?>
					</div><!-- #secondary -->
				</div> <!-- end of col -->

				<div class="col-sm-8 col-md-8">

					<div id="primary" class="site-main">
						<?php
						if ( have_posts() ) :

							/* Start the Loop */
							while ( have_posts() ) : the_post();

								get_template_part( 'template-parts/content', get_post_format() );


							endwhile; ?>

							<?php reveal_posts_link(); ?>

						<?php else :

							get_template_part( 'template-parts/content', 'none' );

						endif; ?>

					</div><!-- #primary -->
				</div> <!-- end of col -->
