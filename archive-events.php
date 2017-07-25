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

			 	 $e_start_date = rwmb_meta('reveal_event_start_date', 'type=date');
			 	 $e_end_date = rwmb_meta('reveal_event_end_date', 'type=date');
			 	 $e_start_time = rwmb_meta('reveal_event_start_time', 'type=time');
			 	 $e_end_time = rwmb_meta('reveal_event_end_time', 'type=time');
			 	 $e_phone = rwmb_meta('reveal_event_phone', 'type=text');
			 	 $e_mail = rwmb_meta('reveal_event_email', 'type=text');
			 	 $e_address = rwmb_meta('reveal_event_address', 'type=textarea');
			 	 $e_address_latitude = rwmb_meta('reveal_event_address_latitude', 'type=text');
			 	 $e_address_longitude = rwmb_meta('reveal_event_address_longitude', 'type=text');
			?>
			    <div class="col-md-10 col-md-offset-1">
			
			        <div class="archive-events-wrapper">
                        <!-- Start Archive Event Date -->
                        <div class="row">
                            <div class="col-md-3">
	                            <div class="archive-events-date">
		                            <p class="date-style"><?php if(!empty($e_start_date)): echo esc_html($e_start_date); endif; ?></p>
		                        </div>
		                    </div>
                            <!-- End Archive Event Date -->
            
                            <!-- Start Archive Event Description -->
                            <div class="col-md-9">
	                            <div class="archive-events-desc">
                                    
	                                <h3 class="archive-events-title">
		                                <a href="<?php echo get_the_permalink(); ?>"> <?php the_title(); ?> </a>
                                    </h3>

	                                <h4 class="archive-events-location">
		                                <?php if(!empty($e_address)): echo esc_html($e_address); endif; ?>
	                                </h4>	                    
		                            
		                            <p class="archive-events-time" datetime="June 17, 2017 - to - June 17, 2017">
		                            	<?php if(!empty($e_start_date)): echo esc_html($e_start_date); endif;  ?> - to - 

		                            	<?php if(!empty($e_end_date)): echo esc_html($e_end_date); endif;  ?></p>
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
