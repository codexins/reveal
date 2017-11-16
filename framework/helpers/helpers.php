<?php


if ( ! function_exists('codexin_get_option' ) ) {
    /**
     * Helper Function to get theme options
     * @param  int       $option     The option we need from the DB
     * @param  string    $default    If $option doesn't exist in DB return $default value
     * @return string
     * @since v1.0.0
     */
    function codexin_get_option( $option = false, $default = false ){
        if( $option === false ) {
            return false;
        }
        $codexin_get_options = wp_cache_get( CODEXIN_THEME_OPTIONS );
        if( ! $codexin_get_options ) {
            $codexin_get_options = get_option( CODEXIN_THEME_OPTIONS );
            wp_cache_delete( CODEXIN_THEME_OPTIONS );
            wp_cache_add( CODEXIN_THEME_OPTIONS, $codexin_get_options );
        }

        if( isset( $codexin_get_options[$option] ) && $codexin_get_options[$option] !== ''){
            return $codexin_get_options[$option];
        } else {
            return $default;
        }
    }
}


if ( ! function_exists( 'codexin_meta' ) ) {
    /**
     * Helper Function to get meta data from metabox
     * @param  string     $key        The meta key name from which we want to get the value
     * @param  array      $args       The arguments of the meta key
     * @param  int        $post_id    The ID of the post
     * @return string
     * @since v1.0.0
     */
    function codexin_meta( $key, $args = array(), $post_id = null ){
        if( function_exists( 'rwmb_meta' ) ) {
            return rwmb_meta( $key, $args, $post_id );
        } else {
            return null;
        }
    }
}


/**
*
* Helper Function to automatically define the schema type 
*
**/
function html_tag_schema() {

    $schema = 'http://schema.org/';

    // Is single post
    if( is_singular( 'post' ) ) {
        $type = "Article";
    }

    // Is author page
    elseif( is_author() ) {
        $type = 'ProfilePage';
    }

    // Is blog home or category
    elseif( is_home() || is_category() ){
        $type = "Blog";
    }

    // Is static front page
    elseif( is_front_page() ) {
        $type = "Website";
    }

    // Is search results page
    elseif( is_search() ) {
        $type = 'SearchResultsPage';
    }

    // Is of event post type
    elseif( is_post_type_archive( 'events' ) || is_singular( 'events' ) ) {
        $type = 'Event';
    }

    // Is of team post type
    elseif( is_post_type_archive( 'team' ) || is_singular( 'team' ) ) {
        $type = 'Person';
    }

    // Is of portfolio post type
    elseif( is_post_type_archive( 'portfolio' ) || is_singular( 'portfolio' ) ) {
        $type = 'ProfessionalService';
    }

    // Is of testimonial post type
    elseif( is_post_type_archive( 'testimonial' ) || is_singular( 'testimonial' ) ) {
        $type = 'Review';
    }

    else {
        $type = 'WebPage';
    }

    echo 'itemscope="itemscope" itemtype="' . $schema . $type . '"';
}


if ( ! function_exists( 'codexin_char_limit' ) ) {
    /**
     * Helper Function to limit the character length
     * @param  int       $limit     The number of character to limit
     * @return string
     * @since v1.0.0
     */
    function codexin_char_limit( $limit, $type ) {
        $content = ( $type == 'title' ) ? get_the_title() : get_the_excerpt();
        $limit++;

        if ( mb_strlen( $content ) > $limit ) {
            $subex = mb_substr( $content, 0, $limit);
            $exwords = explode( ' ', $subex );
            $excut = - ( mb_strlen( $exwords[ count( $exwords ) - 1 ] ) );
            if ( $excut < 0 ) {
                echo mb_substr( $subex, 0, $excut );
            } else {
                printf('%s', $subex);
            }
            echo '...';
        } else {
            printf('%s', $content);
        }
    }

}


if ( ! function_exists( 'reveal_title' ) ) {
    /**
     * Helper Function to limit the title length
     * @param  int       $limit     The number of character to limit
     * @return string
     * @since v1.0.0
     */
    function reveal_title( $limit ) {
        $title = get_the_title();
        $limit++;

        if ( mb_strlen( $title ) > $limit ) {
            $subex = mb_substr( $title, 0, $limit);
            $exwords = explode( ' ', $subex );
            $excut = - ( mb_strlen( $exwords[ count( $exwords ) - 1 ] ) );
            if ( $excut < 0 ) {
                echo mb_substr( $subex, 0, $excut );
            } else {
                printf('%s', $subex);
            }
            echo '...';
        } else {
            printf('%s', $title);
        }
    }

}


if ( ! function_exists( 'reveal_excerpt' ) ) {
    /**
     * Helper Function to limit the excerpt length
     * @param  int       $limit     The number of character to limit
     * @return string
     * @since v1.0.0
     */
    function reveal_excerpt($limit) {
        $excerpt = get_the_excerpt();
        $limit++;

        if ( mb_strlen( $excerpt ) > $limit ) {
            $subex = mb_substr( $excerpt, 0, $limit);
            $exwords = explode( ' ', $subex );
            $excut = - ( mb_strlen( $exwords[ count( $exwords ) - 1 ] ) );
            if ( $excut < 0 ) {
                echo mb_substr( $subex, 0, $excut );
            } else {
                 printf('%s', $subex);
            }
            echo '...';
        } else {
             printf('%s', $excerpt);
        }
    }
}




/**
 * Load More Ajax Handler
 * 
 * Shows next page for posts
 */
// function reveal_loadmore_ajax_handler(){
 
//     // prepare our arguments for the query
//     $args = unserialize( stripslashes( $_POST['query'] ) );
//     $args['paged'] = $_POST['page'] + 1; // we need next page to be loaded
//     $args['post_status'] = 'publish';
    // $args['offset'] = $args['posts_per_page'];
    // $args['posts_per_page'] = codexin_get_option( 'reveal-num-page' );

//     $the_query = new WP_Query( $args );

//     if( $the_query->have_posts() ) :
 
//         // run the loop
//         while( $the_query->have_posts() ): $the_query->the_post();
 
//             get_template_part( 'template-parts/views/list/content', get_post_format() );
 
//         endwhile;
 
//     endif;
//     die;
// } 
// add_action('wp_ajax_loadmore', 'reveal_loadmore_ajax_handler');
// add_action('wp_ajax_nopriv_loadmore', 'reveal_loadmore_ajax_handler');


if ( ! function_exists( 'reveal_sanitize_hex_color' ) ) {
    /**
     * Helper function to sanitize hex colors
     * @param  string       $color     The color code
     * @return string
     * @since v1.0.0
     */
    function reveal_sanitize_hex_color( $color ) {
        if ( '' === $color ) {
            return '';
        }

        // make sure the color starts with a hash
        $color = '#' . ltrim( $color, '#' );

        // 3 or 6 hex digits, or the empty string.
        if ( preg_match( '|^#([A-Fa-f0-9]{3}){1,2}$|', $color ) ) {
            return $color;
        }

        return null;
    }
}



if ( ! function_exists( 'reveal_hex_to_rgba' ) ) {
    /**
     * Helper function to convert hex color to RGBA
     * @param  string      $hex_color     The color code in hexadecimal
     * @param  float       $opacity       The color opacity we want
     * @return string
     * @since v1.0.0
     */
    function reveal_hex_to_rgba( $hex_color, $opacity = '' ) {
        $hex_color = str_replace( "#", "", $hex_color );
        if ( strlen( $hex_color ) == 3 ) {
            $r = hexdec( substr( $hex_color, 0, 1 ) . substr( $hex_color, 0, 1 ) );
            $g = hexdec( substr( $hex_color, 1, 1 ) . substr( $hex_color, 1, 1 ) );
            $b = hexdec( substr( $hex_color, 2, 1 ) . substr( $hex_color, 2, 1 ) );
        } else {
            $r = hexdec( substr( $hex_color, 0, 2 ) );
            $g = hexdec( substr( $hex_color, 2, 2 ) );
            $b = hexdec( substr( $hex_color, 4, 2 ) );
        }
        $rgb = $r . ',' . $g . ',' . $b;

        if ( '' == $opacity ) {
            return $rgb;
        } else {
            $opacity = floatval( $opacity );

            return 'rgba(' . $rgb . ',' . $opacity . ')';
        }
    }
}


if ( ! function_exists( 'reveal_adjust_color_brightness' ) ) {
    /**
     * Helper function to adjust brightness of a color
     * @param  string      $hex_color        The color code in hexadecimal
     * @param  float       $percent_adjust   The percentage we want to lighten/darken the color
     * @return string
     * @since v1.0.0
     */
    function reveal_adjust_color_brightness( $hex_color, $percent_adjust = 0 ) {
        $percent_adjust = round( $percent_adjust/100,2 );    
        $hex = str_replace( "#","",$hex_color );

        $r = ( strlen( $hex ) == 3 ) ? hexdec ( substr ( $hex,0,1 ) . substr( $hex,0,1 ) ) : hexdec( substr( $hex,0,2 ) );
        $g = ( strlen( $hex ) == 3 ) ? hexdec ( substr ( $hex,1,1 ) . substr( $hex,1,1 ) ) : hexdec( substr( $hex,2,2 ) );
        $b = ( strlen( $hex ) == 3 ) ? hexdec ( substr ( $hex,2,1 ) . substr( $hex,2,1 ) ) : hexdec( substr( $hex,4,2 ) );
        $r = round( $r - ( $r*$percent_adjust ) );
        $g = round( $g - ( $g*$percent_adjust ) );
        $b = round( $b - ( $b*$percent_adjust ) );

        $new_hex = "#".str_pad( dechex( max( 0,min( 255,$r ) ) ),2,"0",STR_PAD_LEFT )
            .str_pad( dechex( max( 0,min( 255,$g ) ) ),2,"0",STR_PAD_LEFT)
            .str_pad( dechex( max( 0,min( 255,$b ) ) ),2,"0",STR_PAD_LEFT);

        return reveal_sanitize_hex_color( $new_hex );    
    }
}



if ( ! function_exists( 'codexin_comments_nav' ) ) {
    /**
     * Helper function to display previous/next comments navigation if needed
     *
     * @since v1.0.0
     */
    function codexin_comments_nav() {

        // Are there comments to navigate through?
        if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) :
            ?>
            <nav id="comment-nav-below" class="navigation comment-navigation">
                <h2 class="screen-reader-text"><?php esc_html_e( 'Comment navigation', 'reveal' ); ?></h2>
                <div class="nav-links reveal-color-0 reveal-primary-btn">
                    <div class="nav-previous"><?php previous_comments_link( esc_html__( '&laquo; Older Comments', 'reveal' ) ); ?></div>
                    <div class="nav-next"><?php next_comments_link( esc_html__( 'Newer Comments &raquo;', 'reveal' ) ); ?></div>
                </div><!-- end of nav-links -->
            </nav><!-- end of #comment-nav-below -->
        <?php
        endif;
    }
}