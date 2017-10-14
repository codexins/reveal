<?php
/**
 * Template part for displaying posts
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package reveal
 */

?>

<article id="event-<?php the_ID(); ?>" <?php post_class(); ?> itemscope itemtype="http://schema.org/Event">
	<div class="events-item-content">
	    <div class="item-thumbnail">
	        <img src="<?php echo esc_url(the_post_thumbnail_url( 'rectangle-four' )); ?>"  alt="">                                          
	        <ul class="events-action-btn">
	            <li>
	                <a class="venobox" href="<?php echo esc_url(get_the_permalink()); ?>" itemprop="url"><i class="flaticon-link"></i></a>
	            </li>
	        </ul>                                            
	    </div>
	    <div class="events-description">
	        <h4 itemprop="name"><a href="<?php echo esc_url(get_the_permalink()); ?>"  itemprop="url">
	        <?php 

	           $ev_length_switch = reveal_option('reveal_events_title_excerpt_length');
	            if( $ev_length_switch ) :
	                $reveal_events_title_len = reveal_option( 'reveal_events_title_length' );
	                reveal_title( $reveal_events_title_len );
	            else:
	                the_title();
	            endif;	 ?>

	        </a></h4>
	        <?php $e_start_date = strtotime(rwmb_meta('reveal_event_start_date', 'type=date'));
		        	  $e_start_time = rwmb_meta('reveal_event_start_time', 'type=time');
						 	  $e_end_time = rwmb_meta('reveal_event_end_time', 'type=time'); 
						 	  $e_new_date = date( get_option('date_format'), $e_start_date );
			 	  ?>

	        <div class="event-grid-meta">
	        	<p class="ev-start-date pull-left" itemprop="startDate" content="<?php echo get_the_time('c'); ?>"><i class="flaticon-agenda"></i> <?php echo esc_html($e_new_date); ?></p>
	        	<p class="event-grid-time">
	        		<i class="flaticon-clock-1"></i> 
	        		<span class=""><?php echo $e_start_time; ?></span>
	        		<span class=""> - <?php echo $e_end_time; ?></span>
	        	</p>

	        </div>

	        <div class="events-grid-excerpt">
			<?php 
                $ev_length_switch = reveal_option('reveal_events_title_excerpt_length');
                if( $ev_length_switch ) :
                    $reveal_events_excerpt_len = reveal_option( 'reveal_events_excerpt_length' );
				    				reveal_excerpt( $reveal_events_excerpt_len );
                else:
                    the_excerpt();
                endif; //End if() reveal_excerpt_length
			 ?>
	        </div>
	    </div>  <!-- end of events-description  -->

        <div class="events-grid-more">
        	<a href="<?php echo esc_url(get_the_permalink());?>" itemprop="url"><?php echo esc_html__('Read More', 'reveal'); ?></a>
        </div>
	</div>
</article>


