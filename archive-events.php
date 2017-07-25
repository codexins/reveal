<?php
/**
 * The Portfolio Archive Template
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package reveal
 */

get_header(); ?>

	<div id="content" class="main-content-wrapper site-content">
		<div class="container">
			<div class="row">
            <?php 
				//start new query..
			 	$args = array(
			 		'post_type'		 => 'events',
			 		'posts_per_page' => -1,
			 		);

			 	$data = new WP_Query( $args );

			 	if( $data->have_posts() ) :
					//Start loop here...
			 		while( $data->have_posts() ) : $data->the_post();
			?>
			    <div class="col-md-8 col-md-offset-2">
			
			        <div class="archive-events-wrapper">
                        <!-- Start Archive Event Date -->
                        <div class="row">
                            <div class="col-md-4">
	                            <div class="archive-events-date">
		                            <p class="date-style">June 17, 2017</p>
		                        </div>
		                    </div>
                            <!-- End Archive Event Date -->
            
                            <!-- Start Archive Event Description -->
                            <div class="col-md-8">
	                            <div class="archive-events-desc">
                                    
	                                <h3 class="archive-events-title">
		                                <a href="<?php echo get_the_permalink(); ?>"> <?php the_title(); ?> </a>
                                    </h3>

	                                <h4 class="archive-events-location">
		                                <a target="blank" href="#"> <?php the_content(); ?> </a>
	                                </h4>	                    
		                            
		                            <p class="archive-events-time" datetime="June 17, 2017 - to - June 17, 2017">June 17, 2017 - to - June 17, 2017</p>
		                        </div>
		                    </div>
                            <!-- Start Archive Event Description -->
                        </div>
                    </div>
                </div>
            <?php 
				    endwhile;
				endif; //End check-posts if()....
				wp_reset_postdata();
			?>

			</div> <!-- end of row -->
		</div> <!-- end of container -->
	</div> <!-- end of #content -->

<?php get_footer(); ?>
