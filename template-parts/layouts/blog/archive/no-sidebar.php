
				<div class="col-sm-12 col-md-12">

					<div id="primary" class="site-main" itemscope itemprop="mainContentOfPage" itemtype="http://schema.org/WebPageElement">
							
								<?php echo ( ( reveal_option( 'reveal_post_style' ) == 'grid' ) ) ? '<div class="blog-grid-wrapper"><div class="row">' : '<div class="blog-list-wrapper">' ; ?>
									<?php reveal_loop(); ?>
								<?php echo ( ( reveal_option( 'reveal_post_style' ) == 'grid' ) ) ? '</div></div>' : '</div>' ; ?>
							

					</div><!-- #primary -->
				</div> <!-- end of col -->
