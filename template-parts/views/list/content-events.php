<?php
/**
 * Template part for displaying posts
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Reveal
 */

?>

<?php 
$e_start_date = strtotime(rwmb_meta('reveal_event_start_date', 'type=date'));
$e_end_date = rwmb_meta('reveal_event_end_date', 'type=date');
$e_start_time = rwmb_meta('reveal_event_start_time', 'type=time');
$e_end_time = rwmb_meta('reveal_event_end_time', 'type=time');
$e_phone = rwmb_meta('reveal_event_phone', 'type=text');
$e_mail = rwmb_meta('reveal_event_email', 'type=text');
$e_address = rwmb_meta('reveal_event_address', 'type=textarea');
$e_address_latitude = rwmb_meta('reveal_event_address_latitude', 'type=text');
$e_address_longitude = rwmb_meta('reveal_event_address_longitude', 'type=text');

$e_st_date=date( get_option('date_format'), $e_start_date );
?>
<article id="event-<?php esc_attr(the_ID()); ?>" <?php post_class(array('clearfix events-list')); ?>>
    <div class="post-wrapper reveal-border-1">
        <div class="event-list-wrapper reveal-bg-2">
            <?php if(has_post_thumbnail()): ?>
                <div class="thumb-events" style="background-image:url('<?php the_post_thumbnail_url('reveal-rectangle-one') ?>');">
                    <a href="<?php echo esc_url(get_the_permalink()); ?>"></a>
                    <div class="events-date reveal-bg-2"><p><?php echo esc_html($e_st_date); ?></p></div>
                </div>
            <?php endif; ?>

            <div class="desc-events">
                <?php 
                $event_list = get_the_term_list( $post->ID, 'events-category', '', ', ', '' );
                if(!empty($event_list)): ?>
                    <p class="list-tag reveal-color-0"><i class="flaticon-bookmark"></i> 
                    <?php 
                       printf( '%s', $event_list );
                    ?>
                    </p>
                <?php endif; ?>
                <h2 class="post-title"><a href="<?php echo esc_url(get_the_permalink()); ?>">
                    
                <?php 
                    $e_length_switch = reveal_option('reveal_events_title_excerpt_length');
                    if( $e_length_switch ) :
                        $reveal_e_title_len = reveal_option( 'reveal_events_title_length' );
                        reveal_title( $reveal_e_title_len );
                    else:
                        the_title();
                    endif;
                ?>

                </a></h2>
                <div class="list-content">
                <?php
                $eex_length_switch = reveal_option('reveal_events_title_excerpt_length');
                if( $eex_length_switch ) :
                    $reveal_e_excerpt_len = reveal_option( 'reveal_events_excerpt_length' );
                    reveal_excerpt( $reveal_e_excerpt_len );
                else:
                    the_excerpt();
                endif;
                ?>
                </div>

                <div class="cx-btn reveal-color-0 reveal-primary-btn">
                    <a class="cx-btn-text" href="<?php echo esc_url(get_the_permalink()); ?>"><?php esc_html_e( 'Read More', 'reveal' ) ?></a>
                <div>
            </div>
        </div> <!-- end of event-list-wrapper -->
        
    </div><!--post-wrapper-->
</article><!-- #event-## -->
