<?php


// global $wp_query;

$team_archive_posts  	= is_post_type_archive( 'team' );
$team_single_post     	= is_singular( 'team' ) && ! $team_archive_posts;


if ( have_posts() ) {

	if( ! $team_single_post ) {
		echo '<ul>';
	}
	    
	    while ( have_posts() ) {

	    	the_post();

	    	if( ! $team_single_post ) {

		    	get_template_part( 'template-parts/views/grid/content', 'team' );

		    } else {

		    	get_template_part( 'template-parts/layouts/team/single/content', 'team' );

		    }

	    }

	if( ! $team_single_post ) {

		echo '<ul>';
		echo '<div class="clearfix"></div>';

	}


} else {

	get_template_part( 'template-parts/views/list/content', 'none' );

}