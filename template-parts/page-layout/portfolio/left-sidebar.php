				<div class="col-sm-4 col-md-3">
					<div id="secondary" class="widget-area" role="complementary" itemscope itemtype="http://schema.org/WPSideBar">
						<?php get_sidebar() ?>
					</div><!-- #secondary -->
				</div> <!-- end of col -->
				
				<div class="col-sm-8 col-md-8 col-md-offset-1">
					<div id="primary" class="site-main" itemscope itemprop="mainContentOfPage" itemtype="http://schema.org/WebPageElement">
						<?php if( reveal_option( 'reveal_portfolio_style' ) == 'grid' ): ?>
						<div class="portfolio-grid-wrapper">
							<?php reveal_archive_portfolio_loop(); ?>
						</div> <!-- end of portfolio wrapper -->
						<?php else: ?>
						<div class="portfolio-list-wrapper">
							<?php reveal_archive_portfolio_loop(); ?>
						</div> <!-- end of portfolio list wrapper -->
						<?php endif; ?>
					</div><!-- #primary -->
				</div> <!-- end of col -->

