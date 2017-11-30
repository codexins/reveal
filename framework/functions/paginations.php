<?php

/**
 * Functions definition related to various pagination
 *
 * @package 	Reveal
 * @subpackage 	Core
 * @since 		1.0
 */


// Do not allow directly accessing this file.
defined( 'ABSPATH' ) OR die( esc_html__( 'This script cannot be accessed directly.', 'reveal' ) );



if ( ! function_exists( 'codexin_posts_link' ) ) {
    /**
    * Function for getting the next/previous posts link
    *
    * @param    string    $prev     Text for previous link
    * @param    string    $next     Text for next link
    * @var      object    $custom   Name of the Custom query object
    * @return   mixed
    * @since    v1.0.0
    */
    function codexin_posts_link( $prev = 'Newer Posts', $next = 'Older Posts', $custom = NULL ) {

        $prev_link = get_previous_posts_link( '&laquo; '. $prev );
        $next_link = ( $custom !== NULL ) ? get_next_posts_link( $next. ' &raquo; ', $custom->max_num_pages ) : get_next_posts_link( $next. ' &raquo; ' );

        echo '<div class="posts-nav reveal-color-0 reveal-primary-btn reveal-border-1 clearfix">';
            if( $next_link ) { 
                echo '<div class="nav-next alignright">'. $next_link .'</div>';
            }
            
            if( $prev_link ) {
                echo '<div class="nav-previous alignleft">'. $prev_link .'</div>';
            }
        echo '</div>';

    }

}


if ( ! function_exists( 'codexin_post_link' ) ) {
    /**
    * Function for getting the next/previous single post link
    *
    * @param    string    $prev     Text for previous link
    * @param    string    $next     Text for next link
    * @return   mixed
    * @since    v1.0.0
    */
    function codexin_post_link( $prev = NULL, $next = NULL ) {
        $prev = ! empty( $prev ) ? $prev : esc_html__( 'Previous Post', 'reveal' );
        $next = ! empty( $next ) ? $next : esc_html__( 'Next Post', 'reveal' );

        if( ( codexin_get_option( 'cx_single_pagination' ) == 'button' ) || is_singular( 'portfolio' ) ) {
            $prev_link = get_previous_post_link( '%link', esc_html( $prev . ' &raquo;' ) );
            $next_link = get_next_post_link( '%link', esc_html( '&laquo; ' . $next, 'reveal' ) );
        } elseif( codexin_get_option( 'cx_single_pagination' ) == 'title' ) {
            $prev_link = get_previous_post_link( '%link', esc_html__( '%title &raquo;', 'reveal' ) );
            $next_link = get_next_post_link( '%link', esc_html__( '&laquo; %title', 'reveal' ) );
        }

        echo '<div class="posts-nav reveal-color-0 reveal-primary-btn clearfix">';
            if( $next_link ) { 
                echo '<div class="nav-next alignleft">'. $next_link .'</div>';
            }
            
            if( $prev_link ) {
                echo '<div class="nav-previous alignright">'. $prev_link .'</div>';
            }
        echo '</div>';

    }

}


if ( ! function_exists( 'codexin_numbered_posts_nav' ) ) {
    /**
    * Function for numeric pagination for posts
    *
    * @uses     paginate_links()
    * @var      object              $custom   Name of the Custom query object
    * @return   mixed
    * @since    v1.0.0
    */
    function codexin_numbered_posts_nav( $custom = NULL ) {

        global $wp_query;
        // Stop execution if there's only 1 page
        if( ( ( $custom !== NULL ) ? $custom->max_num_pages : $wp_query->max_num_pages ) <= 1 ) {
            return;
        }

        ob_start();
        ?>
            <nav class="number-pagination reveal-color-0 reveal-primary-btn reveal-border-1">
                <?php
                $current = max( 1, absint( get_query_var( 'paged' ) ) );
                $pagination = paginate_links( array(
                    'base'      => str_replace( PHP_INT_MAX, '%#%', esc_url( get_pagenum_link( PHP_INT_MAX ) ) ),
                    'format'    => '?paged=%#%',
                    'current'   => $current,
                    'total'     => ($custom !== NULL) ? $custom->max_num_pages : $wp_query->max_num_pages,
                    'type'      => 'array',
                    'prev_text' => '&laquo;',
                    'next_text' => '&raquo;',
                ) );
                if ( ! empty( $pagination ) ) { ?>
                    <ul class="pagination">
                        <?php foreach ( $pagination as $key => $page_link ) { ?>
                            <li class="paginated_link<?php echo ( strpos( $page_link, 'current' ) !== false ) ? ' active' : ''; ?>"><?php printf( '%s', $page_link ); ?></li>
                        <?php } ?>
                    </ul>
                <?php } ?>
            </nav> <!-- end of number-pagination -->
        <?php
        $links = ob_get_clean();
        return apply_filters( 'codexin_numbered_posts_nav', $links );

    }

}


if ( ! function_exists( 'codexin_comments_nav' ) ) {
    /**
     * Function to display previous/next comments navigation if needed
     *
     * @since v1.0.0
     */
    function codexin_comments_nav() {

        // Are there comments to navigate through?
        if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) {
            ?>
            <nav id="comment-nav-below" class="navigation comment-navigation">
                <h2 class="screen-reader-text"><?php esc_html_e( 'Comment navigation', 'reveal' ); ?></h2>
                <div class="nav-links reveal-color-0 reveal-primary-btn">
                    <div class="nav-previous"><?php previous_comments_link( esc_html__( '&laquo; Older Comments', 'reveal' ) ); ?></div>
                    <div class="nav-next"><?php next_comments_link( esc_html__( 'Newer Comments &raquo;', 'reveal' ) ); ?></div>
                </div><!-- end of nav-links -->
            </nav><!-- end of #comment-nav-below -->
        <?php
        }
    }
}