				<div class="col-sm-12 col-md-12">
					<div id="primary" class="site-main">
						<?php
							/* Start the Loop */
							while ( have_posts() ) : the_post();

								reveal_set_post_views(get_the_ID());
								get_template_part( 'template-parts/content', 'portfolio'  );

								// if( reveal_option( 'reveal_single_button' ) == true ):
									reveal_post_link();
								// endif;

								if( reveal_option( 'reveal_portfolio_comments' ) ):
									comments_template('', true);
								endif;


							endwhile; ?>

					</div><!-- #primary -->
				</div> <!-- end of col -->