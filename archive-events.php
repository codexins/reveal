<?php

/**
 *
 * The template for displaying custom post type 'events' archives pages
 *
 * @package reveal
 */


// Do not allow directly accessing this file.
defined( 'ABSPATH' ) OR die( 'This script cannot be accessed directly.' );

get_header(); ?>

	<div id="content" class="main-content-wrapper site-content">
		<div class="container">
			<div class="row">
				<?php 

	            $reveal_events_layout = reveal_option('reveal-events-archive-layout');

	            if( $reveal_events_layout == 1 ) {

	                get_template_part('template-parts/layouts/events/archive/no', 'sidebar');

	            } elseif ($reveal_events_layout == 2 ) {

	                get_template_part('template-parts/layouts/events/archive/left', 'sidebar');

	            } elseif ($reveal_events_layout == 3 ) {

	                get_template_part('template-parts/layouts/events/archive/right', 'sidebar');

	            } else {

	                get_template_part('template-parts/layouts/events/archive/no', 'sidebar');

	            }
	            
				?>
			</div> <!-- end of row -->
		</div> <!-- end of container -->
	</div> <!-- end of #content -->

<?php get_footer(); ?>
