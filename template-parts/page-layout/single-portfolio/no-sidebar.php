				<div class="col-sm-12 col-md-12">
					<div id="primary" class="site-main">

        <section class="portfolio-single">
            <div class="container">
                
                <?php
						/* Start the Loop */
						while ( have_posts() ) : the_post();

							reveal_set_post_views(get_the_ID());
							get_template_part( 'template-parts/content', 'portfolio'  );

						endwhile; ?>

                <div class="row">
                    <div class="col-sm-12">
                       <div class="recent-portfolio">
                            <h2>RECENT PORTFOLIOS</h2>
                        </div>
                    </div>


					
                    
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
						  

								<div class="col-md-3 col-xs-6">
								    <div class="new-1">
								        <img src="<?php the_post_thumbnail_url('portfolio-single-image') ?>" alt="">
								        <div class="one-content">
								            <i class="fa fa-plus-square-o" aria-hidden="true"></i>
								            <h3><a href="<?php the_permalink()?>"><?php the_title() ?></a></h3>
								            <p>it is static content  </p>
								        </div>
								    </div>
								</div>



			            <?php 
							    endwhile;
							endif; //End check-posts if()....
							wp_reset_postdata();
						?>







                    <div class="col-sm-12">
                        <div class="previous-portfolio">
                            <div class="nav-previous alignright">
                                <a href="#" rel="prev">Previous Post »</a>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </section>








					</div><!-- #primary -->
				</div> <!-- end of col -->