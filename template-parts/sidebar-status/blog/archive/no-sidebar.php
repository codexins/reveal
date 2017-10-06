
				<div class="col-sm-12 col-md-12">

					<div id="primary" class="site-main" itemscope itemprop="mainContentOfPage" itemtype="http://schema.org/WebPageElement">
							<div class="list-blog">
								<?php echo ( ( reveal_option( 'reveal_post_style' ) == 'grid' ) ) ? '<div class="row">' : '' ; ?>
									<?php reveal_loop(); ?>
								<?php echo ( ( reveal_option( 'reveal_post_style' ) == 'grid' ) ) ? '</div>' : '' ; ?>
							</div>

					</div><!-- #primary -->
				</div> <!-- end of col -->
