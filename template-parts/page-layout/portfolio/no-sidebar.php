				<div class="col-sm-12 col-md-12">
					<div id="primary" class="site-main">
						<?php if( reveal_option( 'reveal_portfolio_style' ) == 'filter' ): ?>
						<h3 class="primary-title text-center"><?php echo reveal_option( 'reveal_portfolio_filter_title' ); ?></h3>
						<h2 class="secondary-title text-center"><?php echo reveal_option( 'reveal_portfolio_filter_subtitle' ); ?></h2>
						<div class="row">
							<div class="col-xs-12">
								<div class="portfolio-filter">
									<ul class="list-inline">
										<li class="active" data-filter="*">All</li>
						                <?php

						                $taxonomy = 'portfolio-category';
						                $taxonomies = get_terms($taxonomy); 
						                    foreach ( $taxonomies as $tax ) {
						                        echo '<li data-filter=".' .strtolower($tax->slug) .'"><span>' . $tax->name . '</span></li>';

						                    }?>
									</ul>
								</div>
							</div>
						</div>

						<div class="row ">
							<div class=" portfolio-wrappera">
								
								<?php reveal_portfolio_loop(); ?>
								
							</div>
						</div> <!-- end of portfolio wrapper -->
						<?php else: ?>
						<div class="portfolio-list-wrapper">
							<?php reveal_portfolio_loop(); ?>
						</div> <!-- end of portfolio list wrapper -->
						<?php endif; ?>
					</div><!-- #primary -->
				</div> <!-- end of col -->