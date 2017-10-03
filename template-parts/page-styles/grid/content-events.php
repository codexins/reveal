<?php
/**
 * Template part for displaying posts
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package reveal
 */

?>

<article id="event-<?php the_ID(); ?>" <?php post_class(); ?>>
	<div class="events-item-content">
	    <div class="item-thumbnail">
	        <img src="<?php echo esc_url(the_post_thumbnail_url( 'rectangle-one' )); ?>"  alt="">                                          
	        <ul class="events-action-btn">
	            <li>
	                <a class="venobox" href="<?php esc_url(the_permalink()); ?>"><i class="flaticon-link"></i></a>
	            </li>
	        </ul>                                            
	    </div>
	    <div class="events-description">
	        <h4><a href="<?php esc_url(the_permalink()); ?>"><?php esc_html(the_title()); ?></a></h4>
	        <p class="events-cat">
            <?php $event_list = get_the_term_list( $post->ID, 'events-category', '', ', ', '' );
               if(!empty($event_list)): echo $event_list; endif;
              ?>
	        </p>
	    </div>                                    
	</div> <!-- end of events-item-content -->
</article> <!-- #event-## -->
