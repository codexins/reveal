<?php

/**
 *
 * The template for displaying custom post type 'events' archives pages
 *
 * @package 	Reveal
 * @subpackage 	Templates
 * @since 		1.0
 */


// Do not allow directly accessing this file.
defined( 'ABSPATH' ) OR die( esc_html__( 'This script cannot be accessed directly.', 'reveal' ) );

// Fetching and assigning data from theme options
$layout          = !empty( codexin_get_option( 'cx_events_archive_layout' ) ) ? codexin_get_option( 'cx_events_archive_layout' ) : 'right';
$events_style    = !empty( codexin_get_option( 'cx_events_style' ) ) ? codexin_get_option( 'cx_events_style' ) : 'list';
$column          = ( $layout == 'left' || $layout == 'right' ) ? '8' : '12';
$sidebar_class   = ( $layout == 'no' ) ? '' : '4';
$pull_class      = ( $layout == 'left') ? ' pull-right' : '';
$offset_class    = ' col-md-offset-1';

get_header(); ?>

	<div id="content" class="main-content-wrapper site-content">
		<div class="container">
			<div class="row">

                <?php 

                // Assigning Wrapper Column for primary content
                printf(
                    '<div class="col-sm-%1$s col-md-%1$s%2$s%3$s">',
                    esc_attr( $column ),
                    esc_attr( $pull_class ),
                    ( $layout == 'left' ) ? esc_attr( $offset_class ) : ''
                );

                ?>

                    <main id="primary" class="site-main" itemscope itemprop="mainContentOfPage" itemtype="http://schema.org/WebPageElement">

                        <?php 
                            echo ( $events_style == 'grid' ) ? '<div class="events-grid-wrapper"><div class="row">' : '<div class="events-list-wrapper">' ;

                                // Go to the events loop template
                                get_template_part( 'framework/templates/loops/events', 'loop' );

                            echo ( $events_style ) == 'grid' ? '</div></div> <!-- end of events-grid-wrapper -->' : '</div> <!-- end of events-list-wrapper -->' ;
                            /**
                             * Initial contents before events pagination, codexin_before_events_pagination hook.
                             *
                             * @hooked codexin_events_pagination_block - 10 (outputs the HTML for events pagination)
                             */
                            do_action( 'codexin_before_events_pagination' ); 
                            ?>

                    </main><!-- end of #primary -->
                </div> <!-- end of col -->
                
                <?php 

                // Checking the need of sidebar
                if( $layout !== 'no' ) {

                    // Assinging wrapper column for sidebar
                    printf(
                        '<div class="col-sm-%1$s col-md-%2$s%3$s">',
                        esc_attr( $sidebar_class ),
                        esc_attr( $sidebar_class - 1 ),
                        ( $layout == 'right' ) ? esc_attr( $offset_class ) : ''
                    );

                ?>                    
                        <aside id="secondary" class="widget-area" role="complementary" itemscope itemtype="http://schema.org/WPSideBar">
                            <?php 

                            // Get active assigned sidebar
                            get_sidebar();

                            ?>
                        </aside><!-- end of #secondary -->
                    </div> <!-- end of col -->

                <?php } //end of sidebar condition ?>

			</div> <!-- end of row -->
		</div> <!-- end of container -->
	</div> <!-- end of #content -->

<?php get_footer(); ?>
