				<div class="col-sm-8 col-md-8">
					<div id="primary" class="site-main" itemscope itemprop="mainContentOfPage" itemtype="http://schema.org/WebPageElement">
						<?php if( reveal_option( 'reveal_events_style' ) == 'grid' ): ?>
						<div class="events-grid-wrapper">
							<div class="row">
								<?php reveal_archive_events_loop(); ?>
							</div>
						</div> <!-- end of events wrapper -->
						<?php else: ?>
						<div class="events-list-wrapper">
							<?php reveal_archive_events_loop(); ?>
						</div> <!-- end of events list wrapper -->
						<?php endif; ?>
					</div><!-- #primary -->
				</div> <!-- end of col -->

				<div class="col-sm-4 col-md-3 col-md-offset-1">
					<div id="secondary" class="widget-area" role="complementary" itemscope itemtype="http://schema.org/WPSideBar">
						<?php get_sidebar() ?>
					</div><!-- #secondary -->
				</div> <!-- end of col -->