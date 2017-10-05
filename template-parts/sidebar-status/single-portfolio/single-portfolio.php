<div class="col-sm-12 col-md-12">
	<div id="primary" class="site-main" itemscope itemprop="mainContentOfPage" itemtype="http://schema.org/WebPageElement">
		<section class="portfolio-single">
        <?php
				/* Start the Loop */
				while ( have_posts() ) : the_post();
					if( function_exists( 'codexin_set_post_views' ) ):
						codexin_set_post_views(get_the_ID());
					endif;
					get_template_part( 'template-parts/content', 'portfolio'  );
					endwhile; ?>

	        <div class="row">
	        	<div class="recent-portfolio">
	            <div class="col-sm-12">
                  <h2><?php echo esc_html__('Recent Portfolios', 'codexin'); ?></h2>
	            </div>
		           <div class="reveal-portfolio-wrapper">
									<?php 
										//start new query..
									 	$args = array(
									 		'post_type'			=> 'portfolio',
									 		'posts_per_page' 	=> 4,
									 		'order'          => 'ASC', 
							  			'orderby'        => 'date'
									 	);
									 	$portfolio = new WP_Query( $args );
									 	if( $portfolio->have_posts() ) :
											//Start loop here...
									 		while( $portfolio->have_posts() ) : $portfolio->the_post();
									?>
							    <div class="recent-portfolio-wrapper">
							        <img src="<?php the_post_thumbnail_url('rectangle-two') ?>" alt="">
							        <div class="one-content">
							            <i class="et-focus" aria-hidden="true"></i>
							            <h3><a href="<?php the_permalink()?>"><?php the_title() ?></a></h3>
							            <p><a href="<?php the_permalink(); ?>"><?php echo esc_html__('Read More', 'codexin'); ?></a></p>
							        </div>
							    </div>
				          <?php endwhile; endif; //End check-posts if()....
										wp_reset_postdata();
									?>
							</div>
						</div> <!-- end of recent-portfolio -->
	        </div> <!-- end of row -->
		</section>
	</div><!-- #primary -->
</div> <!-- end of col -->