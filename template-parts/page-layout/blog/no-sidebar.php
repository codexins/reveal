
				<div class="col-sm-12 col-md-12">

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
