<?php
/**
 * Template part for displaying posts
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package reveal
 */

?>

<?php 
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
?>
<article id="event-<?php the_ID(); ?>" <?php post_class(array('clearfix events-list')); ?>>
    <div class="post-wrapper">
        <div class="event-list-wrapper">
            <?php if(has_post_thumbnail()): ?>
                <div class="thumb-events" style="background-image:url('<?php the_post_thumbnail_url('reveal-rectangle-one') ?>');">
                    <a href="<?php the_permalink(); ?>"></a>
                    <div class="events-date"><p><?php echo esc_html(date_format($e_st_date, "d M Y")); ?></p></div>
                </div>
            <?php endif; ?>

            <div class="desc-events">
                <p class="list-tag"><i class="flaticon-bookmark"></i> 
                <?php $event_list = get_the_term_list( $post->ID, 'events-category', '', ', ', '' );
                   if(!empty($event_list)): echo $event_list; endif;
                  ?>
                </p>
                <h2 class="post-title"><a href="<?php the_permalink(); ?>">
                    
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

                <p class="blog-more"><a class="cx-btn" href="<?php the_permalink(); ?>"><?php esc_html_e( 'Read More', 'reveal' ) ?></a></p>
            </div>
        </div> <!-- end of event-list-wrapper -->
        
    </div><!--blog post-->
</article><!-- #event-## -->
