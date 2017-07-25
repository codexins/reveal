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
                <div id="primary" class="site-main">
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
                    <div class="col-md-5 col-sm-6">
                        
                	    <div class="single-event-details"> 
                		    <div class="event-schedule">
                			    <div class="event-date"> <?php if(!empty($e_start_date)): echo esc_html(date_format($e_st_date, "M d, Y")); endif; ?> </div>
                		    </div>

                		    <div class="event-organizer">
                			    <h3 class="title">Details:</h3>


                			    <!-- Start Event Organizer's Name -->
                			    <p class="info-title">Name</p>
                			    <p class="info-title-content"><?php the_title(); ?></p>
                			    <!-- End Event Organizer's Name -->

                			    <!-- Start Event Organizer contact -->
                			    <p class="info-title">Phone</p>
                			    <p class="info-title-content"><?php if(!empty($e_phone)): echo esc_html($e_phone); endif; ?></p>
                			    <!-- End Event Organizer contact -->

                			    <!-- Start Event Organizer's Email -->
                			    <p class="info-title">Email</p>
                			    <p class="info-title-content"><a href="mailto:<?php if(!empty($e_mail)): echo esc_html($e_mail); endif; ?>"> <?php if(!empty($e_mail)): echo esc_html($e_mail); endif; ?> </a></p>
                			    <!-- End Event Organizer's Email -->

                		    </div>

                		    <!-- Start Event Schedule -->
                		    <div class="event-schedule-info">       
                			    <h3 class="title"> Schedule </h3>
                			    
                				    <p class="info-title"> Date: </p>
                				    <p class="info-title-content"> 
                				    <?php if(!empty($e_start_time)): echo esc_html(date_format($e_st_date,"M d, Y")); endif;  ?> - to - <?php if(!empty($e_end_time)): echo esc_html(date_format($e_en_date,"M d, Y")); endif;  ?>
			                            		    
			                        </p>
                			    
                			    
                				    <p class="info-title">Time:</p>
                				    <p class="info-title-content">
                                    <?php if(!empty($e_start_time)): echo esc_html(date_format($e_st_time,"H:i")); endif;  ?> - to - <?php if(!empty($e_end_time)): echo esc_html(date_format($e_en_time,"H:i")); endif;  ?>
                				    </p>
                			    
                		    </div>
                		    <!-- End Event Schedule -->
                	    </div>
                    </div>

                    <div class="col-md-7 col-sm-6">
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
                			    <h4> Venue: </h4>
                			    <div class="event-venue-info">
                				    <i class="fa fa-map-marker" aria-hidden="true"></i>
                				    <span><?php if(!empty($e_address)): echo esc_html($e_address); endif; ?></span>
                			    </div>
                			    <div class="map"></div>
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
