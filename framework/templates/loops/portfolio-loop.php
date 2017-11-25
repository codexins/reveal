<?php 

/**
 * The template partial for loop that handles portfolio custom post archive and single.
 *
 *
 * @package     Reveal
 * @subpackage  Core
 * @since       1.0
 */


// Do not allow directly accessing this file.
defined( 'ABSPATH' ) OR die( esc_html__( 'This script cannot be accessed directly.', 'reveal' ) );

// Assinging some conditional variables
$portfolio_archive_posts  	= is_post_type_archive( 'portfolio' );
$portfolio_single_post     	= is_singular( 'portfolio' ) && ! $portfolio_archive_posts;

// Fetching and assigning data from theme options
$portfolio_style           	= codexin_get_option( 'reveal_portfolio_style' );
$portfolio_grids           	= codexin_get_option( 'reveal_portfolio_grid_columns' );
$portfolio_nav		        = codexin_get_option( 'reveal_portfolio_pagination' );


if ( have_posts() ) {

    if( ! $portfolio_single_post ) {
        echo '<div class="portfolio-archive-wrapper clearfix">';
    }

    $i = 0;

    /* Start the Loop */
    while ( have_posts() ) {

    	the_post();
        
        if( $portfolio_single_post ) {
            ( function_exists( 'codexin_set_post_views' ) ) ? codexin_set_post_views( get_the_ID() ) : '';
        }

        $i++;
        
        if( ( $portfolio_style == 'grid' ) && ! $portfolio_single_post ) {            
            $grid_port_columns = 12 / $portfolio_grids;
            printf('<div class="portfolio-single-wrap col-lg-%1$s col-md-%1$s col-sm-12">', $grid_port_columns);
                get_template_part( CODEXIN_TEMPLATE_PARTIALS . 'grids/content', 'portfolio' );
            echo '</div><!-- end of portfolio-single-wrap -->';
            echo ( $i % $portfolio_grids == 0 ) ? '<div class="clearfix"></div>' : '';
        } elseif( ( $portfolio_style == 'list' ) && ! $portfolio_single_post ) {
            get_template_part( CODEXIN_TEMPLATE_PARTIALS . 'general/content', 'portfolio' ); 
        } else {         
            get_template_part( CODEXIN_TEMPLATE_PARTIALS . 'single/content', 'portfolio' );
        }

    } // end of loop have_posts()

    if( ! $portfolio_single_post ) {
        echo '</div>';
        echo '<div class="clearfix"></div>';
        echo ( $portfolio_style == 'grid' ) ? '<div class="col-xs-12">' : '' ;

        if( $portfolio_nav == 'numbered' ) {
            echo codexin_numbered_posts_nav();
        } else {               
            codexin_posts_link( 'Newer Portfolios', 'Older Portfolios' );
        }
        
        echo ( $portfolio_style == 'grid' ) ? '</div>' : '' ;
    } else {
        echo '<div class="row">';
            echo '<div class="recent-portfolio">';
                echo '<div class="col-sm-12">';
                    echo '<h2>'. esc_html__('Recent Portfolios', 'reveal') .'</h2>';
                echo '</div>';
                echo '<div class="reveal-portfolio-wrapper">';

                    //start new query..
                    $args = array(
                        'post_type'         => 'portfolio',
                        'posts_per_page'    => 4,
                        'order'             => 'DESC', 
                        'orderby'           => 'date',
                        'post__not_in'      => array ( $post->ID ),
                    );

                    $portfolio = new WP_Query( $args );
                    if( $portfolio->have_posts() ) {

                        //Start loop here...
                        while( $portfolio->have_posts() ) { 

                            $portfolio->the_post();

                            // Fetching the attachment properties
                            $image_prop     = codexin_attachment_metas_extended( $post->ID, 'portfolio', 'rectangle-two' );

                            echo '<div class="recent-portfolio-wrapper reveal-color-2">';
                                echo '<img src="'. $image_prop['src'] .'" '. $image_prop['alt'] .'>';
                                echo '<div class="portfolio-image-content">';
                                    echo '<i class="et-focus" aria-hidden="true"></i>';
                                    echo '<h3><a href="'. esc_url( get_the_permalink() ) .'">'. get_the_title() .'</a></h3>';
                                    echo '<p><a href="'. esc_url( get_the_permalink() ) .'">'. esc_html__('Read More', 'reveal') .'</a></p>';
                                echo '</div>';
                            echo '</div>';

                        } // end of loop have_posts()

                    } //End check-posts if()

                    wp_reset_postdata();

                echo '</div> <!-- end of recent-portfolio-wrapper -->';
            echo '</div> <!-- end of recent-portfolio -->';
        echo '</div> <!-- end of row -->';
    }

} else {
	get_template_part( CODEXIN_TEMPLATE_PARTIALS . 'general/content', 'none' );
} //End check-posts if()