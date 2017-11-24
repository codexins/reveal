<?php

/**
 * Template partial for displaying list archive events
 *
 * @package 	Reveal
 * @subpackage 	Core
 * @since 		1.0
 */


// Do not allow directly accessing this file.
defined( 'ABSPATH' ) OR die( esc_html__( 'This script cannot be accessed directly.', 'reveal' ) );

// Fetching and assigning data from theme options and metabox
$start_date          = strtotime( codexin_meta( 'reveal_event_start_date' ) );
$event_start_date    = date( get_option( 'date_format' ), $start_date );
$length_switch       = codexin_get_option( 'reveal_events_title_excerpt_length' );
$title_length        = codexin_get_option( 'reveal_events_title_length' );
$excerpt_length      = codexin_get_option( 'reveal_events_excerpt_length' );
$thumbnail_default   = codexin_get_option( 'reveal_event_image' );
$event_list          = get_the_term_list( $post->ID, 'events-category', '', ', ', '' );

// Fetching the attachment properties
$attachment_id       = $thumbnail_default['id'];
$image_prop          = codexin_attachment_metas( $attachment_id );
$default_image       = wp_get_attachment_image_src( $attachment_id, 'reveal-rectangle-one' );
$event_image         = ( has_post_thumbnail() ) ? esc_url( get_the_post_thumbnail_url( $post->ID, 'reveal-rectangle-one' ) ) : esc_url( $default_image[0] );
$event_image_list    = ( !empty( $event_image ) ) ? $event_image : esc_url( 'placehold.it/600x375' );

?>

<article id="event-<?php the_ID(); ?>" <?php post_class( array( 'clearfix events-list' ) ); ?>>
    <div class="post-wrapper reveal-border-1">
        <div class="event-list-wrapper reveal-bg-2">
            <div class="thumb-events" style="background-image:url('<?php printf( '%s', $event_image_list ); ?>');">
                <a href="<?php echo esc_url( get_the_permalink() ); ?>" itemprop="url"></a>
                <div class="events-date reveal-bg-2">
                    <p><span itemprop="startDate"><?php echo esc_html( $event_start_date ); ?></span></p>
                </div>
            </div>

            <div class="desc-events">
                <?php
                if( ! empty( $event_list ) ) { ?>
                    <p class="list-tag reveal-color-0"><i class="flaticon-bookmark"></i> 
                        <?php echo wp_kses_post( $event_list ); ?>
                    </p> <!-- end of list tag -->
                <?php } ?>

                <h2 class="post-title" itemprop="name">
                    <a href="<?php echo esc_url(get_the_permalink()); ?>" itemprop="url">
                    
                        <?php

                        if( $length_switch ) {                            
                            // Limit the title characters
                            codexin_char_limit( $title_length, 'title' );
                        } else {
                            the_title();
                        } //end of length switcher conditional check

                        ?>

                    </a>
                </h2> <!-- end of post-title -->
                <div class="list-content" itemprop="description">
                    <?php 
                    if( $length_switch ) {
                        echo '<p>';
                            codexin_char_limit( $excerpt_length, 'excerpt' );
                        echo '</p>';
                    } else {
                        the_excerpt();
                    } //end of length switcher conditional check
                    
                    ?>
                </div> <!-- end of list-content -->

                <?php

                // Adding a read-more button
                echo codexin_button();

                ?>

            </div> <!-- end of desc-events -->  
        </div> <!-- end of event-list-wrapper -->        
    </div> <!--post-wrapper-->
</article> <!-- end of #event-## -->
