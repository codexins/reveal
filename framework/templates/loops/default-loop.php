<?php 

/**
 * The template partial for loop that handles blog, archive, single and search.
 *
 *
 * @package     Reveal
 * @subpackage  Core
 * @since       1.0
 */


// Do not allow directly accessing this file.
defined( 'ABSPATH' ) OR die( esc_html__( 'This script cannot be accessed directly.', 'reveal' ) );


// Fetching and assigning data from theme options
$post_style     = codexin_get_option( 'cx_blog_style' );
$grids          = codexin_get_option( 'cx_grid_columns' );

if ( have_posts() ) {

    $i = 0;

    /* Start the Loop */
    while ( have_posts() ) {

        the_post();
        
        if( is_singular() ) {
            ( function_exists( 'codexin_set_post_views' ) ) ? codexin_set_post_views( get_the_ID() ) : '';
        }

        $i++;

        if( ( $post_style == 'grid' ) && ! is_singular() && ! is_search() ) {
            $grid_columns = 12 / $grids;
            printf('<div class="post-single-wrap col-lg-%1$s col-md-%1$s col-sm-12">', esc_attr( $grid_columns ) );
                get_template_part( 'framework/templates/grids/content' );
            echo '</div><!-- end of post-single-wrap -->';
            echo ( $i % $grids == 0 ) ? '<div class="clearfix"></div>' : '';

        } elseif( is_search() && ! is_singular() ) {
            get_template_part( 'framework/templates/general/content', 'search' );

        } else {
            get_template_part( 'framework/templates/general/content' );
        }

    } // end of loop have_posts()


} else {
    get_template_part( 'framework/templates/general/content', 'none' );
} //End check-posts if()