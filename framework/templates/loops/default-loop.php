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


// Assinging some conditional variables
$archive_posts          = is_archive();
$blog_posts 	        = is_home() && ! is_archive();
$search_posts           = is_search() && ! $blog_posts;
$single_post            = is_singular() && ! $blog_posts && ! $search_posts ;

// Fetching and assigning data from theme options
$post_style             = codexin_get_option( 'cx_blog_style' );
$grids                  = codexin_get_option( 'cx_grid_columns' );
$posts_nav		        = codexin_get_option( 'cx_pagination' );
$single_nav		        = codexin_get_option( 'cx_single_button' );
$single_comment	        = codexin_get_option( 'cx_post_comments' );

if ( have_posts() ) {

    $i = 0;

    /* Start the Loop */
    while ( have_posts() ) {

    	the_post();
        
    	if( $single_post ) {
            ( function_exists( 'codexin_set_post_views' ) ) ? codexin_set_post_views( get_the_ID() ) : '';
    	}

        $i++;

        if( ( $post_style == 'grid' ) && $blog_posts && ! $single_post && ! $search_posts ) {
            $grid_columns = 12 / $grids;
            printf('<div class="post-single-wrap col-xs-12 col-sm-6 col-lg-%1$s">', $grid_columns);
                get_template_part( 'framework/templates/grids/content' );
            echo '</div><!-- end of post-single-wrap -->';
            echo ( $i % $grids == 0 ) ? '<div class="clearfix"></div>' : '';
        } elseif( $search_posts && ! $single_post ) {
            get_template_part( 'framework/templates/general/content', 'search' );

        } else {
            get_template_part( 'framework/templates/general/content' );
        }

		if( $single_post ) {
            echo '</div><!--  end of blog-list-wrapper -->';
			( $single_nav ) ? codexin_post_link() : '';
			( $single_comment ) ? comments_template( '', true ) : '';
		}

    } // end of loop have_posts()

    if( ! $single_post ) {
        echo ( ( $post_style == 'list' ) ) ? '</div> <!-- end of blog-list-wrapper -->' : '' ;
	    echo ( ( $post_style == 'grid' ) ) ? '</div><div class="col-xs-12">' : '' ;

	    if( $posts_nav == 'numbered' ) {
	        echo codexin_numbered_posts_nav();
	    } else {
	        codexin_posts_link();
	    }

	    echo ( ( $post_style == 'grid' ) ) ? '</div>' : '' ;
	}

} else {
    get_template_part( 'framework/templates/general/content', 'none' );
} //End check-posts if()