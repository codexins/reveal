				<div class="col-sm-12 col-md-12">
					<div id="primary" class="site-main">
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