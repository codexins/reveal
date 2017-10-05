				<div class="col-sm-4 col-md-3">
					<div id="secondary" class="widget-area" role="complementary" itemscope itemtype="http://schema.org/WPSideBar">
						<?php get_sidebar() ?>
					</div><!-- #secondary -->
				</div> <!-- end of col -->

				<div class="col-sm-8 col-md-9">

					<div id="primary" class="site-main" itemscope itemprop="mainContentOfPage" itemtype="http://schema.org/WebPageElement">
							<div class="list-blog">
								<div class="row">
									<?php reveal_loop(); ?>
								</div>
							</div>	

					</div><!-- #primary -->
				</div> <!-- end of col -->
