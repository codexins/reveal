<?php

/**
*
* Helper Function for declaring Global Variable for theme options
*
**/
if (!function_exists('reveal_option')){
    /**
     * Function to get options in front-end
     * @param int $option The option we need from the DB
     * @param string $default If $option doesn't exist in DB return $default value
     * @return string
     */

    function reveal_option( $option = false, $default = false ){
        if($option === false){
            return false;
        }
        $reveal_options = wp_cache_get( CODEXIN_THEME_OPTIONS );
        if( ! $reveal_options ){
            $reveal_options = get_option( CODEXIN_THEME_OPTIONS );
            wp_cache_delete( CODEXIN_THEME_OPTIONS );
            wp_cache_add( CODEXIN_THEME_OPTIONS, $reveal_options );
        }

        if(isset($reveal_options[$option]) && $reveal_options[$option] !== ''){
            return $reveal_options[$option];
        }else{
            return $default;
        }
    }
}

/**
 * Removes the demo link and the notice of integrated demo from the redux-framework plugin
 */
if ( ! function_exists( 'remove_demo' ) ) {
    function remove_demo() {
        // Used to hide the demo mode link from the plugin page. Only used when Redux is a plugin.
        if ( class_exists( 'ReduxFrameworkPlugin' ) ) {
            remove_filter( 'plugin_row_meta', array(
                ReduxFrameworkPlugin::instance(),
                'plugin_metalinks'
            ), null, 2 );

            // Used to hide the activation notice informing users of the demo panel. Only used when Redux is a plugin.
            remove_action( 'admin_notices', array( ReduxFrameworkPlugin::instance(), 'admin_notices' ) );
        }
    }
}


/**
*
* Helper Function for getting the next/previous posts link
*
**/
if ( ! function_exists( 'reveal_posts_link' ) ) {

    function reveal_posts_link() {

        $prev_link = get_previous_posts_link(esc_html__('Older Posts &raquo; ', 'reveal'));
        $next_link = get_next_posts_link(esc_html__('&laquo; Newer Posts', 'reveal'));

        echo '<div class="posts-nav" class="section">';
            if($next_link): 
            echo '<div class="nav-next alignleft">'. $next_link .'</div>';
            endif; 
            
            if($prev_link): 
            echo '<div class="nav-previous alignright">'. $prev_link .'</div>';
            endif; 
        echo '</div>';

    }

}

/**
*
* Helper Function for getting the next/previous single post link
*
**/
if ( ! function_exists( 'reveal_post_link' ) ) {

    function reveal_post_link() {

        $prev_link = get_previous_post_link('%link', esc_html__('Previous Post &raquo;', 'reveal'));
        $next_link = get_next_post_link('%link', esc_html__('&laquo; Next Post', 'reveal'));

        echo '<div class="posts-nav" class="section">';
            if($next_link): 
            echo '<div class="nav-next alignleft">'. $next_link .'</div>';
            endif; 
            
            if($prev_link): 
            echo '<div class="nav-previous alignright">'. $prev_link .'</div>';
            endif; 
        echo '</div>';

    }

}

/**
*
* Helper Function for limiting the title length
*
**/
if ( ! function_exists( 'reveal_title' ) ) {

    function reveal_title($limit) {
        $limit = $limit + 1;
        $title = explode(' ', get_the_title(), $limit);
        if (count($title)>=$limit) {
            array_pop($title);
            $title = implode(" ",$title).'...';
        } else {
            $title = implode(" ",$title);
        } 
        $title = preg_replace('`[[^]]*]`','',$title);
        echo $title;
    }

}


/**
*
* Helper Function for limiting the excerpt length
*
**/
if ( ! function_exists( 'reveal_excerpt' ) ) {

    function reveal_excerpt($limit) {
        $limit = $limit + 1;
        $excerpt = explode(' ', get_the_excerpt(), $limit);
        if (count($excerpt)>=$limit) {
            array_pop($excerpt);
            $excerpt = implode(" ",$excerpt).'...';
        } else {
            $excerpt = implode(" ",$excerpt);
        } 
        $excerpt = preg_replace('`[[^]]*]`','',$excerpt);
        echo $excerpt;
    }

}

/**
*
* Helper Function for numbered pagination
*
**/
if ( ! function_exists( 'reveal_posts_link_numbered' ) ) {

    function reveal_posts_link_numbered () {

        if( is_singular() ) {
            return;
        }

        global $wp_query;

        /** Stop execution if there's only 1 page */
        if( $wp_query->max_num_pages <= 1 ) {
            return;
        }

        $paged = get_query_var( 'paged' ) ? absint( get_query_var( 'paged' ) ) : 1;
        $max   = intval( $wp_query->max_num_pages );

        /** Add current page to the array */
        if ( $paged >= 1 ) {
            $links[] = $paged;
        }

        /** Add the pages around the current page to the array */
        if ( $paged >= 3 ) {
            $links[] = $paged - 1;
            $links[] = $paged - 2;
        }

        if ( ( $paged + 2 ) <= $max ) {
            $links[] = $paged + 2;
            $links[] = $paged + 1;
        }

        echo '<div class="navigation"><ul>' . "\n";

        /** Previous Post Link */
        if ( get_previous_posts_link() ) {
            printf( '<li>%s</li>' . "\n", get_previous_posts_link( '&laquo;' ) );
        }

        /** Link to first page, plus ellipses if necessary */
        if ( ! in_array( 1, $links ) ) {
            $class = 1 == $paged ? ' class="active"' : '';

            printf( '<li%s><a href="%s">%s</a></li>' . "\n", $class, esc_url( get_pagenum_link( 1 ) ), '1' );

            if ( ! in_array( 2, $links ) ) {
                echo '<li>…</li>';
            }
        }

        /** Link to current page, plus 2 pages in either direction if necessary */
        sort( $links );
        foreach ( (array) $links as $link ) {
            $class = $paged == $link ? ' class="active"' : '';
            printf( '<li%s><a href="%s">%s</a></li>' . "\n", $class, esc_url( get_pagenum_link( $link ) ), $link );
        }

        /** Link to last page, plus ellipses if necessary */
        if ( ! in_array( $max, $links ) ) {
            if ( ! in_array( $max - 1, $links ) ) {
                echo '<li>…</li>' . "\n";
            }

            $class = $paged == $max ? ' class="active"' : '';
            printf( '<li%s><a href="%s">%s</a></li>' . "\n", $class, esc_url( get_pagenum_link( $max ) ), $max );
        }

        /** Next Post Link */
        if ( get_next_posts_link() ) {
            printf( '<li>%s</li>' . "\n", get_next_posts_link( '&raquo;' ) );
        }

        echo '</ul></div>' . "\n";

    }

}

/**
*
* Helper Function for loop posts
*
**/
if ( ! function_exists( 'reveal_loop' ) ) {

    function reveal_loop() {

        if ( have_posts() ) :
            $i = 0;

            /* Start the Loop */
            while ( have_posts() ) : the_post();

                $i++;
                $post_style = reveal_option( 'reveal_post_style' );
                if( $post_style == 'list' ):

                get_template_part( 'template-parts/page-styles/list/content', get_post_format() );

                else:
                $grid_columns = 12/reveal_option('reveal_grid_columns');

                printf('<div class="blog-post-wrap col-lg-%1$s col-md-%1$s col-sm-12">', $grid_columns);

                get_template_part( 'template-parts/page-styles/grid/content', get_post_format() );

                echo '</div><!--blog post wrap-->';

                if( $i % reveal_option('reveal_grid_columns') == 0 ):
                    echo '<div class="clearfix"></div>';
                endif;
              
                endif;

            endwhile; 

            $reveal_pagination = reveal_option( 'reveal_pagination' );

            if( $reveal_pagination == 'numbered' ) {
            
            reveal_posts_link_numbered();

            } else {

            reveal_posts_link();

            }

            else :

            get_template_part( 'template-parts/content', 'none' );

        endif;

    }

}

/**
*
* Helper Function for Custom Loop for Portfolio
*
**/
if ( ! function_exists( 'reveal_portfolio_loop' ) ) {

    function reveal_portfolio_loop() {



        if ( have_posts() ) :

            /* Start the Loop */
            while ( have_posts() ) : the_post();

                $post_style = reveal_option( 'reveal_portfolio_style' );
                if( $post_style == 'filter' ):

                get_template_part( 'template-parts/page-styles/filter/content', 'portfolio' );

                else:

                get_template_part( 'template-parts/page-styles/list/content', 'portfolio' );
              
                endif;

            endwhile; 

            // $reveal_pagination = reveal_option( 'reveal_pagination' );

            // if( $reveal_pagination == 'numbered' ) {
            
            // reveal_posts_link_numbered();

            // } else {

            // reveal_posts_link();

            // }

            else :

            get_template_part( 'template-parts/content', 'none' );

        endif;

    }

}



/**
*
* Helper Function for deregistering Posrtfolio Custom Posts Type
*
**/
$disable_port = reveal_option( 'reveal_enable_portfolio' );

if( $disable_port == false ) {

    function delete_post_type(){
        unregister_post_type( 'portfolio' );
    }
    add_action('init','delete_post_type');

}




/**
*
* Helper Function for passing variable to js
*
**/
function reveal_add_dynamic_js_variables() {

    if(!empty(reveal_option('reveal-google-map-latitude'))):
        $latitude = reveal_option('reveal-google-map-latitude');
    endif;

    if(!empty(reveal_option('reveal-google-map-longitude'))):
        $longtitude = reveal_option('reveal-google-map-longitude');
    endif;

    if(!empty(reveal_option('reveal-google-map-zoom'))):
        $c_zoom = reveal_option('reveal-google-map-zoom');
    endif;

    if(!empty(reveal_option('reveal-google-map-marker'))):
        $gmap_marker = reveal_option('reveal-google-map-marker');
    endif;

    $codeopt = '';
    $codeopt .= '
    <script type="text/javascript">
        var reveal_lat = "'. $latitude .'"; 
        var reveal_long = "'. $longtitude .'"; 
        var reveal_marker = "'. $gmap_marker['url'] .'"; 
        var reveal_m_zoom = Number ("'. $c_zoom .'"); 
    </script>

    ';

    echo $codeopt;

}

add_action('wp_head', 'reveal_add_dynamic_js_variables');


/**
*
* Helper Function to get the post views
*
**/
function reveal_get_post_views($postID){
    $count_key = 'cx_post_views';
    $count = get_post_meta($postID, $count_key, true);
    if($count==''){
        delete_post_meta($postID, $count_key);
        add_post_meta($postID, $count_key, '0');
        return " 0";
    }
    return ' '.$count;
}

/**
*
* Helper Function for Google Analytics
*
**/
add_action('wp_head', 'reveal_googleanalytics');
function reveal_googleanalytics() { 

    echo reveal_option( 'reveal-gaq' );

} 

/**
*
* Helper Function to set the post views
*
**/
function reveal_set_post_views($postID) {
    $count_key = 'cx_post_views';
    $count = get_post_meta($postID, $count_key, true);
    if($count==''){
        $count = 0;
        delete_post_meta($postID, $count_key);
        add_post_meta($postID, $count_key, '0');
    }else{
        $count++;
        update_post_meta($postID, $count_key, $count);
    }
}
//To keep the count accurate, lets get rid of prefetching
remove_action( 'wp_head', 'adjacent_posts_rel_link_wp_head', 10, 0);






/**
 * Processes like/unlike
 * @since    0.5
 */
add_action( 'wp_ajax_nopriv_process_simple_like', 'process_simple_like' );
add_action( 'wp_ajax_process_simple_like', 'process_simple_like' );
function process_simple_like() {
    // Security
    $nonce = isset( $_REQUEST['nonce'] ) ? sanitize_text_field( $_REQUEST['nonce'] ) : 0;
    if ( !wp_verify_nonce( $nonce, 'simple-likes-nonce' ) ) {
        exit( __( 'Not permitted', 'reveal' ) );
    }
    // Test if javascript is disabled
    $disabled = ( isset( $_REQUEST['disabled'] ) && $_REQUEST['disabled'] == true ) ? true : false;
    // Test if this is a comment
    $is_comment = ( isset( $_REQUEST['is_comment'] ) && $_REQUEST['is_comment'] == 1 ) ? 1 : 0;
    // Base variables
    $post_id = ( isset( $_REQUEST['post_id'] ) && is_numeric( $_REQUEST['post_id'] ) ) ? $_REQUEST['post_id'] : '';
    $result = array();
    $post_users = NULL;
    $like_count = 0;
    // Get plugin options
    if ( $post_id != '' ) {
        $count = ( $is_comment == 1 ) ? get_comment_meta( $post_id, "_comment_like_count", true ) : get_post_meta( $post_id, "_post_like_count", true ); // like count
        $count = ( isset( $count ) && is_numeric( $count ) ) ? $count : 0;
        if ( !already_liked( $post_id, $is_comment ) ) { // Like the post
            if ( is_user_logged_in() ) { // user is logged in
                $user_id = get_current_user_id();
                $post_users = post_user_likes( $user_id, $post_id, $is_comment );
                if ( $is_comment == 1 ) {
                    // Update User & Comment
                    $user_like_count = get_user_option( "_comment_like_count", $user_id );
                    $user_like_count =  ( isset( $user_like_count ) && is_numeric( $user_like_count ) ) ? $user_like_count : 0;
                    update_user_option( $user_id, "_comment_like_count", ++$user_like_count );
                    if ( $post_users ) {
                        update_comment_meta( $post_id, "_user_comment_liked", $post_users );
                    }
                } else {
                    // Update User & Post
                    $user_like_count = get_user_option( "_user_like_count", $user_id );
                    $user_like_count =  ( isset( $user_like_count ) && is_numeric( $user_like_count ) ) ? $user_like_count : 0;
                    update_user_option( $user_id, "_user_like_count", ++$user_like_count );
                    if ( $post_users ) {
                        update_post_meta( $post_id, "_user_liked", $post_users );
                    }
                }
            } else { // user is anonymous
                $user_ip = sl_get_ip();
                $post_users = post_ip_likes( $user_ip, $post_id, $is_comment );
                // Update Post
                if ( $post_users ) {
                    if ( $is_comment == 1 ) {
                        update_comment_meta( $post_id, "_user_comment_IP", $post_users );
                    } else { 
                        update_post_meta( $post_id, "_user_IP", $post_users );
                    }
                }
            }
            $like_count = ++$count;
            $response['status'] = "liked";
            $response['icon'] = get_liked_icon();
        } else { // Unlike the post
            if ( is_user_logged_in() ) { // user is logged in
                $user_id = get_current_user_id();
                $post_users = post_user_likes( $user_id, $post_id, $is_comment );
                // Update User
                if ( $is_comment == 1 ) {
                    $user_like_count = get_user_option( "_comment_like_count", $user_id );
                    $user_like_count =  ( isset( $user_like_count ) && is_numeric( $user_like_count ) ) ? $user_like_count : 0;
                    if ( $user_like_count > 0 ) {
                        update_user_option( $user_id, "_comment_like_count", --$user_like_count );
                    }
                } else {
                    $user_like_count = get_user_option( "_user_like_count", $user_id );
                    $user_like_count =  ( isset( $user_like_count ) && is_numeric( $user_like_count ) ) ? $user_like_count : 0;
                    if ( $user_like_count > 0 ) {
                        update_user_option( $user_id, '_user_like_count', --$user_like_count );
                    }
                }
                // Update Post
                if ( $post_users ) {    
                    $uid_key = array_search( $user_id, $post_users );
                    unset( $post_users[$uid_key] );
                    if ( $is_comment == 1 ) {
                        update_comment_meta( $post_id, "_user_comment_liked", $post_users );
                    } else { 
                        update_post_meta( $post_id, "_user_liked", $post_users );
                    }
                }
            } else { // user is anonymous
                $user_ip = sl_get_ip();
                $post_users = post_ip_likes( $user_ip, $post_id, $is_comment );
                // Update Post
                if ( $post_users ) {
                    $uip_key = array_search( $user_ip, $post_users );
                    unset( $post_users[$uip_key] );
                    if ( $is_comment == 1 ) {
                        update_comment_meta( $post_id, "_user_comment_IP", $post_users );
                    } else { 
                        update_post_meta( $post_id, "_user_IP", $post_users );
                    }
                }
            }
            $like_count = ( $count > 0 ) ? --$count : 0; // Prevent negative number
            $response['status'] = "unliked";
            $response['icon'] = get_unliked_icon();
        }
        if ( $is_comment == 1 ) {
            update_comment_meta( $post_id, "_comment_like_count", $like_count );
            update_comment_meta( $post_id, "_comment_like_modified", date( 'Y-m-d H:i:s' ) );
        } else { 
            update_post_meta( $post_id, "_post_like_count", $like_count );
            update_post_meta( $post_id, "_post_like_modified", date( 'Y-m-d H:i:s' ) );
        }
        $response['count'] = get_like_count( $like_count );
        $response['testing'] = $is_comment;
        if ( $disabled == true ) {
            if ( $is_comment == 1 ) {
                wp_redirect( get_permalink( get_the_ID() ) );
                exit();
            } else {
                wp_redirect( get_permalink( $post_id ) );
                exit();
            }
        } else {
            wp_send_json( $response );
        }
    }
}

/**
 * Utility to test if the post is already liked
 * @since    0.5
 */
function already_liked( $post_id, $is_comment ) {
    $post_users = NULL;
    $user_id = NULL;
    if ( is_user_logged_in() ) { // user is logged in
        $user_id = get_current_user_id();
        $post_meta_users = ( $is_comment == 1 ) ? get_comment_meta( $post_id, "_user_comment_liked" ) : get_post_meta( $post_id, "_user_liked" );
        if ( count( $post_meta_users ) != 0 ) {
            $post_users = $post_meta_users[0];
        }
    } else { // user is anonymous
        $user_id = sl_get_ip();
        $post_meta_users = ( $is_comment == 1 ) ? get_comment_meta( $post_id, "_user_comment_IP" ) : get_post_meta( $post_id, "_user_IP" ); 
        if ( count( $post_meta_users ) != 0 ) { // meta exists, set up values
            $post_users = $post_meta_users[0];
        }
    }
    if ( is_array( $post_users ) && in_array( $user_id, $post_users ) ) {
        return true;
    } else {
        return false;
    }
} // already_liked()

/**
 * Output the like button
 * @since    0.5
 */
function get_simple_likes_button( $post_id, $is_comment = NULL ) {
    $is_comment = ( NULL == $is_comment ) ? 0 : 1;
    $output = '';
    $nonce = wp_create_nonce( 'simple-likes-nonce' ); // Security
    if ( $is_comment == 1 ) {
        $post_id_class = esc_attr( ' cx-comment-button-' . $post_id );
        $comment_class = esc_attr( ' cx-comment' );
        $like_count = get_comment_meta( $post_id, "_comment_like_count", true );
        $like_count = ( isset( $like_count ) && is_numeric( $like_count ) ) ? $like_count : 0;
    } else {
        $post_id_class = esc_attr( ' cx-button-' . $post_id );
        $comment_class = esc_attr( '' );
        $like_count = get_post_meta( $post_id, "_post_like_count", true );
        $like_count = ( isset( $like_count ) && is_numeric( $like_count ) ) ? $like_count : 0;
    }
    $count = get_like_count( $like_count );
    $icon_empty = get_unliked_icon();
    $icon_full = get_liked_icon();
    // Loader
    $loader = '<span id="cx-loader"></span>';
    // Liked/Unliked Variables
    if ( already_liked( $post_id, $is_comment ) ) {
        $class = esc_attr( ' liked' );
        $title = __( 'Unlike', 'reveal' );
        $icon = $icon_full;
    } else {
        $class = '';
        $title = __( 'Like', 'reveal' );
        $icon = $icon_empty;
    }
    $output = '<span id="cx_wrapper" class="cx-wrapper"><a href="' . admin_url( 'admin-ajax.php?action=process_simple_like' . '&post_id=' . $post_id . '&nonce=' . $nonce . '&is_comment=' . $is_comment . '&disabled=true' ) . '" class="cx-button' . $post_id_class . $class . $comment_class . '" data-nonce="' . $nonce . '" data-post-id="' . $post_id . '" data-iscomment="' . $is_comment . '" title="' . $title . '">' . $icon . $count . '</a>' . $loader . '</span>';
    return $output;
} // get_simple_likes_button()

/**
 * Utility retrieves post meta user likes (user id array), 
 * then adds new user id to retrieved array
 * @since    0.5
 */
function post_user_likes( $user_id, $post_id, $is_comment ) {
    $post_users = '';
    $post_meta_users = ( $is_comment == 1 ) ? get_comment_meta( $post_id, "_user_comment_liked" ) : get_post_meta( $post_id, "_user_liked" );
    if ( count( $post_meta_users ) != 0 ) {
        $post_users = $post_meta_users[0];
    }
    if ( !is_array( $post_users ) ) {
        $post_users = array();
    }
    if ( !in_array( $user_id, $post_users ) ) {
        $post_users['user-' . $user_id] = $user_id;
    }
    return $post_users;
} // post_user_likes()

/**
 * Utility retrieves post meta ip likes (ip array), 
 * then adds new ip to retrieved array
 * @since    0.5
 */
function post_ip_likes( $user_ip, $post_id, $is_comment ) {
    $post_users = '';
    $post_meta_users = ( $is_comment == 1 ) ? get_comment_meta( $post_id, "_user_comment_IP" ) : get_post_meta( $post_id, "_user_IP" );
    // Retrieve post information
    if ( count( $post_meta_users ) != 0 ) {
        $post_users = $post_meta_users[0];
    }
    if ( !is_array( $post_users ) ) {
        $post_users = array();
    }
    if ( !in_array( $user_ip, $post_users ) ) {
        $post_users['ip-' . $user_ip] = $user_ip;
    }
    return $post_users;
} // post_ip_likes()

/**
 * Utility to retrieve IP address
 * @since    0.5
 */
function sl_get_ip() {
    if ( isset( $_SERVER['HTTP_CLIENT_IP'] ) && ! empty( $_SERVER['HTTP_CLIENT_IP'] ) ) {
        $ip = $_SERVER['HTTP_CLIENT_IP'];
    } elseif ( isset( $_SERVER['HTTP_X_FORWARDED_FOR'] ) && ! empty( $_SERVER['HTTP_X_FORWARDED_FOR'] ) ) {
        $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
    } else {
        $ip = ( isset( $_SERVER['REMOTE_ADDR'] ) ) ? $_SERVER['REMOTE_ADDR'] : '0.0.0.0';
    }
    $ip = filter_var( $ip, FILTER_VALIDATE_IP );
    $ip = ( $ip === false ) ? '0.0.0.0' : $ip;
    return $ip;
} // sl_get_ip()

/**
 * Utility returns the button icon for "like" action
 * @since    0.5
 */
function get_liked_icon() {
    /* If already using Font Awesome with your theme, replace svg with: <i class="fa fa-heart"></i> */
    $icon = '<span class="cx-icon"><i class="fa fa-heart"></i>';
    return $icon;
} // get_liked_icon()

/**
 * Utility returns the button icon for "unlike" action
 * @since    0.5
 */
function get_unliked_icon() {
    /* If already using Font Awesome with your theme, replace svg with: <i class="fa fa-heart-o"></i> */
    $icon = '<span class="cx-icon"><i class="fa fa-heart-o"></i></span>';
    return $icon;
} // get_unliked_icon()

/**
 * Utility function to format the button count,
 * appending "K" if one thousand or greater,
 * "M" if one million or greater,
 * and "B" if one billion or greater (unlikely).
 * $precision = how many decimal points to display (1.25K)
 * @since    0.5
 */
function sl_format_count( $number ) {
    $precision = 2;
    if ( $number >= 1000 && $number < 1000000 ) {
        $formatted = number_format( $number/1000, $precision ).'K';
    } else if ( $number >= 1000000 && $number < 1000000000 ) {
        $formatted = number_format( $number/1000000, $precision ).'M';
    } else if ( $number >= 1000000000 ) {
        $formatted = number_format( $number/1000000000, $precision ).'B';
    } else {
        $formatted = $number; // Number is less than 1000
    }
    $formatted = str_replace( '.00', '', $formatted );
    return $formatted;
} // sl_format_count()

/**
 * Utility retrieves count plus count options, 
 * returns appropriate format based on options
 * @since    0.5
 */
function get_like_count( $like_count ) {
    $like_text = __( 'Like', 'reveal' );
    if ( is_numeric( $like_count ) && $like_count > 0 ) { 
        $number = sl_format_count( $like_count );
    } else {
        $number = $like_text;
    }
    $count = '<span class="cx-count">' . $number . '</span>';
    return $count;
} // get_like_count()

// User Profile List
add_action( 'show_user_profile', 'show_user_likes' );
add_action( 'edit_user_profile', 'show_user_likes' );
function show_user_likes( $user ) { ?>        
    <table class="form-table">
        <tr>
            <th><label for="user_likes"><?php _e( 'You Like:', 'reveal' ); ?></label></th>
            <td>
            <?php
            $types = get_post_types( array( 'public' => true ) );
            $args = array(
              'numberposts' => -1,
              'post_type' => $types,
              'meta_query' => array (
                array (
                  'key' => '_user_liked',
                  'value' => $user->ID,
                  'compare' => 'LIKE'
                )
              ) );      
            $sep = '';
            $like_query = new WP_Query( $args );
            if ( $like_query->have_posts() ) : ?>
            <p>
            <?php while ( $like_query->have_posts() ) : $like_query->the_post(); 
            printf( '$s', $sep); ?><a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a>
            <?php
            $sep = ' &middot; ';
            endwhile; 
            ?>
            </p>
            <?php else : ?>
            <p><?php _e( 'You do not like anything yet.', 'reveal' ); ?></p>
            <?php 
            endif; 
            wp_reset_postdata(); 
            ?>
            </td>
        </tr>
    </table>
<?php } // show_user_likes()






