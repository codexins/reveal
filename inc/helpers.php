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

    // Is of portfolio post type
    elseif( is_post_type_archive( 'portfolio' ) || is_singular( 'portfolio' ) ) {
        $type = 'ProfessionalService';
    }


    else {
        $type = 'WebPage';
    }

    echo 'itemscope="itemscope" itemtype="' . $schema . $type . '"';
}


/**
*
* Helper Function for getting the next/previous posts link
*
**/
if ( ! function_exists( 'reveal_posts_link' ) ) {

    function reveal_posts_link() {

        $prev_link = get_previous_posts_link(esc_html__('&laquo; Newer Posts', 'reveal'));
        $next_link = get_next_posts_link(esc_html__('Older Posts &raquo; ', 'reveal'));

        echo '<div class="posts-nav clearfix">';
            if($next_link): 
            echo '<div class="nav-next alignright">'. $next_link .'</div>';
            endif; 
            
            if($prev_link): 
            echo '<div class="nav-previous alignleft">'. $prev_link .'</div>';
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

    function reveal_post_link($prev = 'Previous Post', $next = 'Next Post') {

        if( reveal_option( 'reveal_single_pagination' ) == 'button' ):
        $prev_link = get_previous_post_link('%link', esc_html__( $prev.' &raquo;', 'reveal'));
        $next_link = get_next_post_link('%link', esc_html__('&laquo; '.$next, 'reveal'));
        elseif( reveal_option( 'reveal_single_pagination' ) == 'title' ):
        $prev_link = get_previous_post_link('%link', esc_html__('%title &raquo;', 'reveal'));
        $next_link = get_next_post_link('%link', esc_html__('&laquo; %title', 'reveal'));
        endif;

        echo '<div class="posts-nav clearfix">';
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


/**
*
* Helper Function for limiting the excerpt length
*
**/
if ( ! function_exists( 'reveal_excerpt' ) ) {
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

        echo '<nav class="number-pagination" aria-label="Page navigation example"><ul class="pagination">' . "\n";

        /** Previous Post Link */
        if ( get_previous_posts_link() ) {
            printf( '<li>%s</li>' . "\n", get_previous_posts_link( '&laquo;' ) );
        }

        /** Link to first page, plus ellipses if necessary */
        if ( ! in_array( 1, $links ) ) {
            $class = 1 == $paged ? ' class="active"' : '';

            printf( '<li%s><a href="%s">%s</a></li>' . "\n", $class, esc_url( get_pagenum_link( 1 ) ), '1' );

            if ( ! in_array( 2, $links ) ) {
                echo '<li>&middot;&middot;&middot;</li>';
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
                echo '<li>&middot;&middot;&middot;</li>' . "\n";
            }

            $class = $paged == $max ? ' class="active"' : '';
            printf( '<li%s><a href="%s">%s</a></li>' . "\n", $class, esc_url( get_pagenum_link( $max ) ), $max );
        }

        /** Next Post Link */
        if ( get_next_posts_link() ) {
            printf( '<li>%s</li>' . "\n", get_next_posts_link( '&raquo;' ) );
        }

        echo '</ul></nav>' . "\n";

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

                get_template_part( 'template-parts/content', get_post_format() );

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

            echo '<div class="clearfix"></div>';
            $reveal_pagination = reveal_option( 'reveal_pagination' );

            if( $reveal_pagination == 'numbered' ) {
            
                reveal_posts_link_numbered();

            } elseif( $reveal_pagination == 'button' ) {

                reveal_posts_link();

            } else {

                global $wp_query;
                 
                $reveal_btn_text = ( !empty( reveal_option( 'reveal-load-more' ) ) ) ? esc_html( reveal_option( 'reveal-load-more' ) ) : esc_html__( 'Load More', 'reveal' );

                // don't display the button if there are not enough posts
                if (  $wp_query->max_num_pages > 1 ):
                    echo 
                        '<div class="reveal-load-more">' . $reveal_btn_text . '</div>';
                endif;

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
if ( ! function_exists( 'reveal_archive_portfolio_loop' ) ) {

    function reveal_archive_portfolio_loop() {

        if ( have_posts() ) :
            echo '<div class="portfolio-archive-wrapper">';
            $i = 0;
            /* Start the Loop */
            while ( have_posts() ) : the_post();
                $i++;
                $post_style = reveal_option( 'reveal_portfolio_style' );
                
                if( $post_style == 'grid' ):

                $grid_port_columns = 12/reveal_option('reveal_portfolio_grid_columns');

                printf('<div class="portfolio-wrap col-lg-%1$s col-md-%1$s col-sm-12">', $grid_port_columns);
                    get_template_part( 'template-parts/page-styles/grid/content', 'portfolio' );
                echo '</div><!--portfolio wrap-->';

                if( $i % reveal_option('reveal_portfolio_grid_columns') == 0 ):
                    echo '<div class="clearfix"></div>';
                endif;
                
                else:
                    
                get_template_part( 'template-parts/page-styles/list/content', 'portfolio' ); 
                    
                endif;

            endwhile; 
            echo '</div>';
            echo '<div class="clearfix"></div>';

            // $reveal_pagination = reveal_option( 'reveal_pagination' );

            // if( $reveal_pagination == 'numbered' ):           
            // reveal_posts_link_numbered();
            // else:
            reveal_posts_link();
            // endif;

        else:
        get_template_part( 'template-parts/content', 'none' );

        endif;

    }

}



/**
*
* Helper Function for deregistering Portfolio Custom Posts Type
*
**/
$disable_port = reveal_option( 'reveal_enable_portfolio' );
$version = '4.5';
if( $disable_port == false ) {
    if (version_compare($version, get_bloginfo('version'), '<=' )) {
        function delete_post_type(){
            unregister_post_type( 'portfolio' );
        }
        add_action('init','delete_post_type');
    } else {
        return false;        
    }
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
 * Comment layout helper function
 *
 */


function reveal_comment_function($comment, $args, $depth) {
    $GLOBALS['comment'] = $comment; ?>
    <li <?php comment_class('clearfix'); ?> id="li-comment-<?php comment_ID() ?>">
        <div id="comment-<?php comment_ID(); ?>" class="comment-body clearfix">
            <div class="comment-single">
                <div class="comment-single-left comment-author vcard">
                <?php echo get_avatar($comment,$size='90'); ?>
                </div>

                <div class="comment-single-right comment-info">
                <?php printf('<span class="fn" itemprop="name">%s</span>', get_comment_author_link()) ?>
                    <div class="comment-text" itemprop="text">
                    <?php comment_text() ?>
                    </div>

                    <div class="comment-meta"><a href="<?php echo htmlspecialchars( get_comment_link( $comment->comment_ID ) ) ?>"><time datetime="<?php echo get_the_time('c'); ?>" itemprop="datePublished"><?php printf(esc_html__('%1$s at %2$s', 'reveal'), get_comment_date(),  get_comment_time()) ?></time></a><?php edit_comment_link(esc_html__('(Edit)', 'reveal'),'  ','') ?><span class="comment-reply"><?php comment_reply_link(array_merge( $args, array('depth' => $depth, 'max_depth' => $args['max_depth'], 'before' => ' &nbsp;&nbsp;<i class="fa fa-caret-right"></i> &nbsp;&nbsp;'))) ?></span>
                    </div>

                    <?php if ($comment->comment_approved == '0') : ?>
                    <div class="moderation-notice"><em><?php echo esc_html__('Your comment is awaiting moderation.', 'reveal') ?></em></div>
                    <?php endif; ?>

                </div>
            </div>     
        </div>
 <?php
}



/**
 * Retina images
 *
 * This function is attached to the 'wp_generate_attachment_metadata' filter hook.
 */
// add_filter( 'wp_generate_attachment_metadata', 'retina_support_attachment_meta', 10, 2 );
// function retina_support_attachment_meta( $metadata, $attachment_id ) {
//     foreach ( $metadata as $key => $value ) {
//         if ( is_array( $value ) ) {
//             foreach ( $value as $image => $attr ) {
//                 if ( is_array( $attr ) )
//                     retina_support_create_images( get_attached_file( $attachment_id ), $attr['width'], $attr['height'], true );
//             }
//         }
//     }
 
//     return $metadata;
// }



/**
 * Create retina-ready images
 *
 * Referenced via retina_support_attachment_meta().
 */
// function retina_support_create_images( $file, $width, $height, $crop = false ) {
//     if ( $width || $height ) {
//         $resized_file = wp_get_image_editor( $file );
//         if ( ! is_wp_error( $resized_file ) ) {
//             $filename = $resized_file->generate_filename( $width . 'x' . $height . '@2x' );
 
//             $resized_file->resize( $width * 2, $height * 2, $crop );
//             $resized_file->save( $filename );
 
//             $info = $resized_file->get_size();
 
//             return array(
//                 'file' => wp_basename( $filename ),
//                 'width' => $info['width'],
//                 'height' => $info['height'],
//             );
//         }
//     }
//     return false;
// }



/**
 * Delete retina-ready images
 *
 * This function is attached to the 'delete_attachment' filter hook.
 */
// add_filter( 'delete_attachment', 'delete_retina_support_images' );
// function delete_retina_support_images( $attachment_id ) {
//     $meta = wp_get_attachment_metadata( $attachment_id );
//     $upload_dir = wp_upload_dir();
//     $path = pathinfo( $meta['file'] );
//     foreach ( $meta as $key => $value ) {
//         if ( 'sizes' === $key ) {
//             foreach ( $value as $sizes => $size ) {
//                 $original_filename = $upload_dir['basedir'] . '/' . $path['dirname'] . '/' . $size['file'];
//                 $retina_filename = substr_replace( $original_filename, '@2x.', strrpos( $original_filename, '.' ), strlen( '.' ) );
//                 if ( file_exists( $retina_filename ) )
//                     unlink( $retina_filename );
//             }
//         }
//     }
// }



/**
 * jQuery show/hide for meta boxes
 * 
 * Hides/Shows boxes on demand - depending on your selection inside the post formats meta box
 */
function codexin_post_formats( $hook ) {
 
    global $post;
 
    if ( $hook == 'post-new.php' || $hook == 'post.php' ) {
        if ( 'post' === $post->post_type ) {
            wp_enqueue_script(  'codexin-post-format', get_template_directory_uri() . '/assets/js/admin/post-format.js' );
        }
    }
}
add_action( 'admin_enqueue_scripts', 'codexin_post_formats', 10, 1 );


/**
 * Load More Ajax Handler
 * 
 * Shows next page for posts
 */
function reveal_loadmore_ajax_handler(){
 
    // prepare our arguments for the query
    $args = unserialize( stripslashes( $_POST['query'] ) );
    $args['paged'] = $_POST['page'] + 1; // we need next page to be loaded
    $args['post_status'] = 'publish';
    // $args['offset'] = $args['posts_per_page'];
    // $args['posts_per_page'] = reveal_option( 'reveal-num-page' );

    $the_query = new WP_Query( $args );

    if( $the_query->have_posts() ) :
 
        // run the loop
        while( $the_query->have_posts() ): $the_query->the_post();
 
            get_template_part( 'template-parts/content', get_post_format() );
 
        endwhile;
 
    endif;
    die;
} 
add_action('wp_ajax_loadmore', 'reveal_loadmore_ajax_handler');
add_action('wp_ajax_nopriv_loadmore', 'reveal_loadmore_ajax_handler');



/**
 * Comments Ajax Handler
 * 
 * Ajaxifies the submitted comments
 */ 
function reveal_ajax_comment_handler(){

    $comment = wp_handle_comment_submission( wp_unslash( $_POST ) );
    if ( is_wp_error( $comment ) ) {
        $error_data = intval( $comment->get_error_data() );
        if ( ! empty( $error_data ) ) {
            wp_die( '<p>' . $comment->get_error_message() . '</p>', __( 'Comment Submission Failure', 'reveal' ), array( 'response' => $error_data, 'back_link' => true ) );
        } else {
            wp_die( 'Unknown error' );
        }
    }
 
    /*
     * Set Cookies
     */
    $user = wp_get_current_user();
    do_action('set_comment_cookies', $comment, $user);
 
    /*
     * Looping through comments
     */
    $comment_depth = 1;
    $comment_parent = $comment->comment_parent;
    while( $comment_parent ){
        $comment_depth++;
        $parent_comment = get_comment( $comment_parent );
        $comment_parent = $parent_comment->comment_parent;
    }
 
    /*
     * Set the globals, so that comment functions will work correctly
     */
    $GLOBALS['comment'] = $comment;
    $GLOBALS['comment_depth'] = $comment_depth;
 
    $comment_html = '<li ' . comment_class( 'clearfix', null, null, false ) . ' id="li-comment-' . get_comment_ID() . '">
        <div class="comment-body" id="comment-' . get_comment_ID() . '">
            <div class="comment-single">
                <div class="comment-single-left comment-author vcard">
                    ' . get_avatar( $comment, $size='90' ) . '
                </div>

                <div class="comment-single-right comment-info">
                    <span class="fn" itemprop="name">' . get_comment_author_link() . '</span>
                    <div class="comment-text" itemprop="text">
                        ' . get_comment_text() . '
                    </div>
                    <div class="comment-meta">
                        <a href=' . esc_url( get_comment_link( $comment->comment_ID ) ) . '">
                        <time datetime="' . get_the_time('c') . '" itemprop="datePublished">' . sprintf(esc_html__('%1$s at %2$s', 'reveal'), get_comment_date(),  get_comment_time()) . '</time>
                        </a>';
                        if( $edit_link = get_edit_comment_link() ) {
                            $comment_html .= '<span class="edit-link"><a class="comment-edit-link" href="' . $edit_link . '">' . esc_html__( '(Edit)', 'reveal' ) . '</a></span>';
                        }
                    $comment_html .= '</div>';
 
                if ( $comment->comment_approved == '0' ){
                    $comment_html .= '<div class="moderation-notice"><em>' . esc_html__('Your comment is awaiting moderation.', 'reveal') . '</em></div>';
                }
 
            $comment_html .= '</div>
            </div>            
        </div>
    </li>';
    printf( '%s', $comment_html );
 
    die();
 
}

add_action( 'wp_ajax_ajaxcomments', 'reveal_ajax_comment_handler' ); // For registered user
add_action( 'wp_ajax_nopriv_ajaxcomments', 'reveal_ajax_comment_handler' ); // For not registered users


/**
 * functions to add body class on portfolio list view
 *
 */


function list_body_class ($classes) {
    $port_style = reveal_option( 'reveal_portfolio_style' );
    if(($port_style == 'list') && (is_archive('portfolio'))): 
        $classes[] = 'portfolio-list-view';
        return $classes;
    else:
        return $classes;
    endif;
}
add_filter('body_class', 'list_body_class');