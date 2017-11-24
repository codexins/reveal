<?php

/**
 * Template partial for displaying grid archive events
 *
 * @package 	Reveal
 * @subpackage 	Core
 * @since 		1.0
 */


// Do not allow directly accessing this file.
defined( 'ABSPATH' ) OR die( esc_html__( 'This script cannot be accessed directly.', 'reveal' ) );

// Fetching and assigning data from theme options and metabox
$e_start_date        = strtotime( codexin_meta( 'reveal_event_start_date' ) );
$event_new_date 	 = date( get_option( 'date_format' ), $e_start_date );
$event_start_time    = codexin_meta( 'reveal_event_start_time' );
$event_end_time      = codexin_meta( 'reveal_event_end_time' );
$length_switch       = codexin_get_option( 'reveal_events_title_excerpt_length' );
$title_length        = codexin_get_option( 'reveal_events_title_length' );
$excerpt_length      = codexin_get_option( 'reveal_events_excerpt_length' );
$thumbnail_default   = codexin_get_option( 'reveal_event_image' );

// Fetching the attachment properties
$attachment_id       = ( has_post_thumbnail() ) ? get_post_thumbnail_id( $post->ID ) : $thumbnail_default['id'];
$image_prop          = codexin_attachment_metas( $attachment_id );
$default_image       = wp_get_attachment_image_src( $attachment_id, 'rectangle-four' );
$event_image         = ( has_post_thumbnail() ) ? esc_url( get_the_post_thumbnail_url( $post->ID, 'rectangle-four' ) ) : esc_url( $default_image[0] );
$event_image_list    = ( !empty( $event_image ) ) ? $event_image : esc_url( 'placehold.it/600x327' );

?>

<article id="event-<?php the_ID(); ?>" <?php post_class(); ?>>
	<div class="events-item-content">
	    <div class="item-thumbnail">
	        <img src="<?php printf( '%s', $event_image_list ); ?>"  <?php printf( '%s', $image_prop['alt'] ); ?> itemprop="image">
	        <ul class="events-action-btn reveal-color-0">
	            <li><a href="<?php echo esc_url( get_the_permalink() ); ?>" itemprop="url"><i class="flaticon-link"></i></a></li>
	        </ul> <!-- end of events-action-btn -->
	    </div>

	    <div class="events-description">
	        <h4 itemprop="name">
	        	<a href="<?php echo esc_url( get_the_permalink() ); ?>"  itemprop="url">

                    <?php

                    if( $length_switch ) {                            
                        // Limit the title characters
                        codexin_char_limit( $title_length, 'title' );
                    } else {
                        the_title();
                    } //end of length switcher conditional check

                    ?>

	        	</a>
	    	</h4> <!-- end of events-description -->

	        <div class="event-grid-meta">
	        	<p class="ev-start-date pull-left" itemprop="startDate" content="<?php echo get_the_time( 'c' ); ?>"><i class="flaticon-agenda"></i> <?php echo esc_html( $event_new_date ); ?></p>
	        	<?php if( ! empty( $event_start_time ) || ! empty( $event_end_time ) ) { ?>
		        	<p class="event-grid-time">
		        		<i class="flaticon-clock-1"></i> 
		        		<?php if( ! empty( $event_start_time ) ) { ?>
			        		<span class=""><?php echo esc_html( $event_start_time ); ?></span>
		        		<?php } ?>
		        		<?php if( ! empty( $event_end_time ) ) { ?>
			        		<span class=""> - <?php echo esc_html( $event_end_time ); ?></span>
		        		<?php } ?>
		        	</p>
	        	<?php } ?>
	        </div> <!-- end of event-grid-meta -->

	        <div class="events-grid-excerpt">
                <?php 
                if( $length_switch ) {
                    echo '<p>';
                        codexin_char_limit( $excerpt_length, 'excerpt' );
                    echo '</p>';
                } else {
                    the_excerpt();
                } //end of length switcher conditional check
                
                ?>
	        </div> <!-- end of events-grid-excerpt -->
	    </div> <!-- end of events-description  -->

        <?php

        // Adding a read-more button
        echo codexin_button( 'events_grid' );

        ?>
	</div> <!-- end of events-item-content -->
</article> <!-- end of #event-## -->


