				<div class="col-sm-12 col-md-12">
					<div id="primary" class="site-main" itemscope itemprop="mainContentOfPage" itemtype="http://schema.org/WebPageElement">
						<?php if( reveal_option( 'reveal_portfolio_style' ) == 'grid' ): ?>
						<div class="portfolio-grid-wrapper">
							<?php reveal_portfolio_loop(); ?>
						</div> <!-- end of portfolio wrapper -->
						<?php else: ?>
						<div class="portfolio-list-wrapper">
							<?php reveal_portfolio_loop(); ?>
						</div> <!-- end of portfolio list wrapper -->
						<?php endif; ?>
					</div><!-- #primary -->
				</div> <!-- end of col -->