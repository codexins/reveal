<?php


$archive_posts          = is_archive();
$blog_posts 	        = is_home() && ! is_archive();
$search_posts           = is_search() && ! $blog_posts;
$single_post            = is_singular() && ! $blog_posts && ! $search_posts ;
$post_style             = codexin_get_option( 'reveal_blog_style' );
$grids                  = codexin_get_option( 'reveal_grid_columns' );
$posts_nav		        = codexin_get_option( 'reveal_pagination' );
$single_nav		        = codexin_get_option( 'reveal_single_button' );
$single_comment	        = codexin_get_option( 'reveal_post_comments' );

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
            printf('<div class="post-single-wrap col-lg-%1$s col-md-%1$s col-sm-12">', $grid_columns);
                get_template_part( CODEXIN_TEMPLATE_PARTIALS . 'grids/content' );
            echo '</div><!-- end of post-single-wrap -->';
            echo ( $i % $grids == 0 ) ? '<div class="clearfix"></div>' : '';
        } elseif( $search_posts && ! $single_post ) {
            get_template_part( CODEXIN_TEMPLATE_PARTIALS . 'general/content', 'search' );
        } else {
            get_template_part( CODEXIN_TEMPLATE_PARTIALS . 'general/content' );
        }

		if( $single_post ) {
			( $single_nav ) ? codexin_post_link() : '';
			( $single_comment ) ? comments_template('', true) : '';
		}

    } // end of loop have_posts()

    if( ! $single_post ) {
	    echo '<div class="clearfix"></div>';	              
	    echo ( $post_style == 'grid' ) ? '<div class="col-xs-12">' : '' ;

	    if( $posts_nav == 'numbered' ) {
	        echo codexin_numbered_posts_nav();
	    } else {
	        codexin_posts_link();
	    }

	    echo ( $post_style == 'grid' ) ? '</div>' : '' ;
	}

} else {
    get_template_part( CODEXIN_TEMPLATE_PARTIALS . 'general/content', 'none' );
} //End check-posts if()