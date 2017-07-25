				<div class="col-sm-8 col-md-8">
					<div id="primary" class="site-main">
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

				<div class="col-sm-4 col-md-4">
					<div id="secondary" class="widget-area" role="complementary">
						<?php get_sidebar() ?>
					</div><!-- #secondary -->
				</div> <!-- end of col -->