<?php


$events_archive_posts   = is_post_type_archive( 'events' );
$events_single_post     = is_singular( 'events' ) && ! $events_archive_posts;
$events_style           = codexin_get_option( 'reveal_events_style' );
$events_grids           = codexin_get_option( 'reveal_events_grid_columns' );
$events_nav		        = codexin_get_option( 'reveal_events_pagination' );


$paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;

$args = array(
    'post_type'  	=> 'events',
    'orderby'  		=> 'meta_value',
    'meta_key'   	=> 'reveal_event_start_date',
    'order'   		=> 'DESC',
    'paged'   		=> $paged,
);

$loop = new WP_Query( $args );

if( ! $events_single_post ) {

	if ( $loop->have_posts() ) {

		$i = 0;
	    echo '<div class="events-archive-wrapper clearfix">';

	    /* Start the Loop */
	    while ( $loop->have_posts() ) {

	    	$loop->the_post();
	        $i++;
	        
	        if( $events_style == 'grid' ) {
		        $grid_events_columns = 12 / $events_grids;
		        printf('<div class="events-single-wrap col-lg-%1$s col-md-%1$s col-sm-12">', $grid_events_columns);
		            get_template_part( 'template-parts/views/grid/content', 'events' );
		        echo '</div><!-- end of events-single-wrap -->';
		        echo ( $i % $events_grids == 0 ) ? '<div class="clearfix"></div>' : '';	        
	        } else {	            
	        	get_template_part( 'template-parts/views/list/content', 'events' ); 	            
	        }

	    } // end of loop have_posts()

	    echo '</div>';
	    echo '<div class="clearfix"></div>';

	    echo ( $events_style == 'grid' ) ? '<div class="col-xs-12">' : '' ;
	    
	    if( $events_nav == 'numbered' ) {
	        echo reveal_posts_link_numbered( $loop );
	    } else {               
	        reveal_posts_link( 'Newer Events', 'Older Events' );
	    }

	    echo ( $events_style == 'grid' ) ? '</div>' : '' ;	    

	} else {		
		get_template_part( 'template-parts/views/list/content', 'none' );
	} //End check-posts if()

	wp_reset_postdata();

} else {

    /* Start the Loop */
    while( have_posts() ) {

    	the_post();	        
        get_template_part( 'template-parts/layouts/events/single/content', 'events' ); 
        
    }

}