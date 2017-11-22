<?php


$team_archive_posts  	= is_post_type_archive( 'team' );
$team_single_post     	= is_singular( 'team' ) && ! $team_archive_posts;


if ( have_posts() ) {

	if( ! $team_single_post ) {
		echo '<ul>';
	}
	    
    while ( have_posts() ) {

    	the_post();
    	
    	if( ! $team_single_post ) {
	    	get_template_part( CODEXIN_TEMPLATE_PARTIALS . 'grids/content', 'team' );
	    } else {
	    	get_template_part( CODEXIN_TEMPLATE_PARTIALS . 'single/content', 'team' );
	    }

    } // end of loop have_posts()

	if( ! $team_single_post ) {
		echo '</ul>';
		echo '<div class="clearfix"></div>';
	}

} else {
	get_template_part( CODEXIN_TEMPLATE_PARTIALS . 'general/content', 'none' );
} //End check-posts if()