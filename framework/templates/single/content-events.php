<?php

/**
 * Template partial for displaying single event
 *
 * @package 	Reveal
 * @subpackage 	Core
 * @since 		1.0
 */


// Do not allow directly accessing this file.
defined( 'ABSPATH' ) OR die( esc_html__( 'This script cannot be accessed directly.', 'reveal' ) );


// Fetching data from metabox
$e_start_date           = codexin_meta( 'reveal_event_start_date' );
$e_st_date              = ! empty( $e_start_date ) ? date( get_option( 'date_format' ), strtotime( $e_start_date ) ) : '';
$e_end_date             = codexin_meta( 'reveal_event_end_date' );
$e_en_date              = ! empty( $e_end_date ) ? date( get_option( 'date_format' ), strtotime( $e_end_date ) ) : '';
$e_start_time           = codexin_meta( 'reveal_event_start_time' );
$e_st_time              = date_create( $e_start_time );
$e_end_time             = codexin_meta( 'reveal_event_end_time' );
$e_en_time              = date_create( $e_end_time );
$e_phone                = codexin_meta( 'reveal_event_phone' );
$e_mail                 = codexin_meta( 'reveal_event_email' );
$e_address              = codexin_meta( 'reveal_event_address' );
$e_address_latitude     = codexin_meta( 'reveal_event_address_latitude' );
$e_address_longitude    = codexin_meta( 'reveal_event_address_longitude' );
$event_cat_list         = get_the_term_list( $post->ID, 'events-category', '', ', ', '' );
$event_tag_list         = get_the_term_list( $post->ID, 'events_tags', '', ', ', '' );

// Fetching the attachment properties
$image_prop             = codexin_attachment_metas_extended( $post->ID, 'events', 'full' );

?>

<!-- Start Event Single Page -->
<div class="event-single clearfix">    
    <div class="col-md-4 col-sm-6">
            <div class="single-event-details reveal-color-0 reveal-border-1">

                <?php if( ! empty( $e_start_date ) ) { ?>
	                <div class="event-schedule reveal-color-1 reveal-border-1">
		                <div class="event-date"> <?php echo esc_html( $e_st_date ); ?> </div>
	                </div>
                <?php } ?>    

                <div class="event-organizer reveal-border-1">

	                <h3 class="title"><?php echo esc_html__( 'Details:', 'reveal' ); ?></h3>

	                <!-- Start Event Organizer's Name -->
	                <p class="info-title"><?php echo esc_html__( 'Name', 'reveal' ); ?></p>
	                <p class="info-title-content"><?php the_title(); ?></p>
	                <!-- End Event Organizer's Name -->

	                <!-- Start Event Organizer contact -->
                    <?php if( ! empty( $e_phone ) ) { ?>
	                     <p class="info-title"><?php echo esc_html__( 'Phone', 'reveal' ); ?></p>
	                     <p class="info-title-content"><?php echo esc_html( $e_phone ); ?></p>
                    <?php } ?>
	                <!-- End Event Organizer contact -->

	                <!-- Start Event Organizer's Email -->
                    <?php if( ! empty( $e_mail ) ) { ?>
	                     <p class="info-title"><?php echo esc_html__( 'Email', 'reveal' ); ?></p>
	                     <p class="info-title-content"><a href="mailto:<?php echo esc_html( $e_mail ); ?>"> <?php echo esc_html( $e_mail ); ?> </a></p>
                    <?php } ?>     
	                <!-- End Event Organizer's Email -->

                </div> <!-- end of event-organizer -->

                <!-- Start Event Schedule -->
                <div class="event-schedule-info reveal-border-1">       
	                <h3 class="title"> <?php echo esc_html__( 'Schedule', 'reveal' ); ?> </h3>
                    <?php if( ! empty( $e_start_date ) ) { ?>    
                        <p class="info-title"> <?php echo esc_html__( 'Date:', 'reveal' ); ?> </p>
                        <p class="info-title-content"> 
                    <?php echo esc_html( $e_st_date ); ?> 
                        <?php
                        if( ! empty( $e_end_date ) ) { ?> 
                            - <?php echo esc_html__( 'to', 'reveal' ); ?> - 
                            <?php echo esc_html( $e_en_date ); 
                        } ?>  
                        </p>
                    <?php } ?>

                    <?php if( ! empty( $e_start_time ) ) { ?>
                        <p class="info-title"><?php echo esc_html__( 'Time', 'reveal' ); ?>:</p>
                        <p class="info-title-content">
                    <?php echo esc_html( date_format( $e_st_time, "H:i" ) ); ?> 
                        <?php
                        if( ! empty( $e_end_time ) ) { ?>
                            - <?php echo esc_html__( 'to', 'reveal' ); ?> - 
                            <?php echo esc_html( date_format( $e_en_time, "H:i" ) );
                        } ?>
                        </p>
                    <?php } ?>	                
                </div>
                <!-- End Event Schedule -->

                <div class="event-venue-details reveal-border-1">
                    <h3 class="title"><?php echo esc_html__('Venue', 'reveal')?></h3>
                    <p class="info-title-content">
                        <?php printf('%s', $e_address); ?>
                    </p>
                </div> <!-- end of event-venue-details -->
                <?php
                if( ! empty( $event_cat_list ) ) { ?>
                    <div class="event-cat-details reveal-border-1">
                        <h3 class="title"><?php echo esc_html__('Category', 'reveal')?></h3>
                        <p class="info-title-content">
                            <?php echo $event_cat_list; ?>
                        </p>
                    </div>
                <?php } ?>

                <?php
                if( ! empty( $event_tag_list ) ) { ?>
                    <div class="event-tag-details reveal-border-1">
                        <h3 class="title"><?php echo esc_html__( 'Tags', 'reveal' ); ?></h3>
                        <p class="info-title-content">
                            <?php echo wp_kses_post( $event_tag_list ); ?>
                        </p>
                    </div>
                <?php } ?>
            </div>  <!-- end of single-event-details -->
    </div> <!-- end of col -->

    <div class="col-md-8 col-sm-6">        
        <div class="single-event-description"> 
            <!-- Event Title -->
            <div class="event-title">
                <h2 class="reveal-color-1"> <?php the_title(); ?> </h2>
            </div>
            
            <?php if( ! empty( $image_prop['src'] ) ) { ?>
                <div class="single-event-image">
    	            <img src="<?php printf( '%s', $image_prop['src'] ); ?>" class="img-responsive" <?php printf( '%s', $image_prop['alt'] ); ?>>
                </div>
            <?php } ?>
            
            <div class="event-description"> <?php the_content(); ?> </div>

            <div class="event-venue">
                <h4 class="reveal-color-1"><i class="fa fa-map-signs"></i> <?php echo esc_html( 'Venue:', 'reveal' ); ?> </h4>
                <div class="event-venue-info">
	                <span>
                        <?php if( ! empty( $e_address ) ) { 
                            printf('%s', $e_address); 
                        } ?>
                    </span>
                </div> <!-- end of event-venue-info -->
                <?php if( ! empty( $e_address_latitude ) && ! empty( $e_address_longitude ) ) { ?>
                    <div id="map">
                        <div id="gmap-wrap">
                            <div id="gmap">                 
                            </div>              
                        </div>
                    </div> <!--end of #map-->
                <?php } ?>
            </div> <!-- end of event-venue -->
        </div> <!-- end of single-event-description -->
    </div> <!-- end of col -->
</div> <!-- end of event-single -->