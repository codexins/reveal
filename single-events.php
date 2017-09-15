<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
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
			 	        if( have_posts() ) :
					        //Start loop here...
			 		        while( have_posts() ) : the_post();

			 	        $e_start_date = rwmb_meta('reveal_event_start_date', 'type=date');
			 	        $e_end_date = rwmb_meta('reveal_event_end_date', 'type=date');
			 	        $e_start_time = rwmb_meta('reveal_event_start_time', 'type=time');
			 	        $e_end_time = rwmb_meta('reveal_event_end_time', 'type=time');
			 	        $e_phone = rwmb_meta('reveal_event_phone', 'type=text');
			 	        $e_mail = rwmb_meta('reveal_event_email', 'type=text');
			 	        $e_address = rwmb_meta('reveal_event_address', 'type=textarea');
			 	        $e_address_latitude = rwmb_meta('reveal_event_address_latitude', 'type=text');
			 	        $e_address_longitude = rwmb_meta('reveal_event_address_longitude', 'type=text');

			 	        $e_st_date=date_create($e_start_date);
			 	        $e_en_date=date_create($e_end_date);
			 	        $e_st_time=date_create($e_start_time);
			 	        $e_en_time=date_create($e_end_time);
			        ?>
                    <!-- Start Event Single Page -->
                    <div class="event-single clearfix">
                        
                            <div class="col-md-4 col-sm-6">
                	                <div class="single-event-details"> 
                                        <?php if(!empty($e_start_date)): ?>
                    		                <div class="event-schedule">
                    			                <div class="event-date"> <?php echo esc_html(date_format($e_st_date, "M d, Y")); ?> </div>
                    		                </div>
                                        <?php endif; ?>    

                		                <div class="event-organizer">
                			                <h3 class="title">Details:</h3>

                			                <!-- Start Event Organizer's Name -->
                			                <p class="info-title"><?php echo esc_html__('Name', 'reveal'); ?></p>
                			                <p class="info-title-content"><?php the_title(); ?></p>
                			                <!-- End Event Organizer's Name -->

                			                <!-- Start Event Organizer contact -->
                                            <?php if(!empty($e_phone)): ?>
                			                     <p class="info-title"><?php echo esc_html__('Phone', 'reveal'); ?></p>
                			                     <p class="info-title-content"><?php echo esc_html($e_phone); ?></p>
                                            <?php endif; ?>
                			                <!-- End Event Organizer contact -->

                			                <!-- Start Event Organizer's Email -->
                                            <?php if(!empty($e_mail)): ?>
                			                     <p class="info-title"><?php echo esc_html__('Email', 'reveal'); ?></p>
                			                     <p class="info-title-content"><a href="mailto:<?php echo esc_html($e_mail); ?>"> <?php if(!empty($e_mail)): echo esc_html($e_mail); endif; ?> </a></p>
                                            <?php endif; ?>     
                			                <!-- End Event Organizer's Email -->

                		                </div>

                		                <!-- Start Event Schedule -->
                		                <div class="event-schedule-info">       
                			                <h3 class="title"> Schedule </h3>
                			                     <?php if(!empty($e_start_date)): ?>    
                    				                <p class="info-title"> <?php echo esc_html__('Date', 'reveal'); ?>: </p>
                    				                <p class="info-title-content"> 
                    				                <?php echo esc_html(date_format($e_st_date,"M d, Y"));  ?> 
                                                        <?php if(!empty($e_end_date)): ?> 
                                                            - <?php echo esc_html__('to', 'reveal'); ?> - 
                                                            <?php echo esc_html(date_format($e_en_date,"M d, Y")); 
                                                            endif;?>  
    			                                    </p>
                                                <?php endif; ?>
                			                
                			                     <?php  if(!empty($e_start_time)): ?>
                				                    <p class="info-title"><?php echo esc_html__('Time', 'reveal'); ?>:</p>
                    				                <p class="info-title-content">
                                                    <?php echo esc_html(date_format($e_st_time,"H:i")); ?> 
                                                        <?php if(!empty($e_end_time)): ?>
                                                            - <?php echo esc_html__('to', 'reveal'); ?> - 
                                                            <?php echo esc_html(date_format($e_en_time,"H:i"));
                                                            endif; ?>
                    				                </p>
                                                 <?php endif; ?>   
                			                
                		                </div>
                		                <!-- End Event Schedule -->

                                        <div class="event-venue-details">
                                            <h3 class="title"><?php echo esc_html__('Venue', 'reveal')?></h3>
                                            <p class="info-title-content">
                                                <?php printf('%s', $e_address); ?>
                                            </p>
                                        </div>
                	                </div>
                            </div>

                            <div class="col-md-8 col-sm-6">
                                
                	                <div class="single-event-description"> 
                		                <!-- Event Title -->
                		                <div class="event-title">
                			                <h2> <?php the_title(); ?> </h2>
                		                </div>

                		                <div class="single-event-image">
                				                <a class="event-image-popup" href="<?php echo the_post_thumbnail_url('full'); ?>"><img src="<?php echo the_post_thumbnail_url('full'); ?>" class="img-responsive" alt=""></a>
                		                </div>

                		                
                		                <div class="event-description"> <?php the_content(); ?> </div>

                		                <div class="event-venue">
                			                <h4><i class="fa fa-map-signs"></i> Venue: </h4>
                			                <div class="event-venue-info">
                				                <span><?php if(!empty($e_address)): printf('%s', $e_address); endif; ?></span>
                			                </div>
                                                <div id="map">
                                                    <div id="gmap-wrap">
                                                        <div id="gmap">                 
                                                        </div>              
                                                    </div>
                                                </div><!--/#map-->
                		                </div>
                                    </div>

                                
                            </div>
                        </div>
                    </div>
                    <!-- Start Event Single Page -->
                    <?php 
				            endwhile;
				        endif; //End check-posts if()....
			        ?>

                </div>
            </div> <!-- end of row -->
        </div> <!-- end of container -->
    </div> <!-- end of #content -->

<?php get_footer(); ?>
