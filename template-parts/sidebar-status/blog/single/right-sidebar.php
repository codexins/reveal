				<div class="col-sm-8 col-md-8">
					<div id="primary" class="site-main" itemscope itemprop="mainContentOfPage" itemtype="http://schema.org/WebPageElement">
						<?php
							/* Start the Loop */
							while ( have_posts() ) : the_post();

								if( function_exists( 'codexin_set_post_views' ) ):
									codexin_set_post_views(get_the_ID());
								endif;
								
								get_template_part( 'template-parts/layout-status/list/content', get_post_format()  );

								if( reveal_option( 'reveal_single_button' ) == true ):
									reveal_post_link();
								endif;

								// If comments are open or we have at least one comment, load up the comment template.
								// if ( comments_open() || get_comments_number() ) :
								// 	comments_template();
								// endif;
								if( reveal_option( 'reveal_post_comments' ) ):
									comments_template('', true);
								endif;

							endwhile; ?>

					</div><!-- #primary -->
				</div> <!-- end of col -->

				<div class="col-sm-4 col-md-3 col-md-offset-1">
					<div id="secondary" class="widget-area" role="complementary" itemscope itemtype="http://schema.org/WPSideBar">
						<?php get_sidebar() ?>
					</div><!-- #secondary -->
				</div> <!-- end of col -->