<?php

/**
*
* Helper Function for declaring Global Variable for theme options
*
**/
if (!function_exists('codexin_get_option')){
    /**
     * Function to get options in front-end
     * @param int $option The option we need from the DB
     * @param string $default If $option doesn't exist in DB return $default value
     * @return string
     */

    function codexin_get_option( $option = false, $default = false ){
        if($option === false){
            return false;
        }
        $codexin_get_options = wp_cache_get( CODEXIN_THEME_OPTIONS );
        if( ! $codexin_get_options ){
            $codexin_get_options = get_option( CODEXIN_THEME_OPTIONS );
            wp_cache_delete( CODEXIN_THEME_OPTIONS );
            wp_cache_add( CODEXIN_THEME_OPTIONS, $codexin_get_options );
        }

        if(isset($codexin_get_options[$option]) && $codexin_get_options[$option] !== ''){
            return $codexin_get_options[$option];
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


/**
*
* Helper Function for getting the next/previous posts link
*
**/
if ( ! function_exists( 'reveal_posts_link' ) ) {

    function reveal_posts_link($prev = 'Newer Posts', $next = 'Older Posts', $custom = NULL) {


        $prev_link = get_previous_posts_link('&laquo; '. $prev);
        $next_link = ($custom !== NULL) ? get_next_posts_link($next. ' &raquo; ', $custom->max_num_pages) : get_next_posts_link($next. ' &raquo; ');

        echo '<div class="posts-nav reveal-color-0 reveal-primary-btn reveal-border-1 clearfix">';
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

        if( codexin_get_option( 'reveal_single_pagination' ) == 'button' ):
        $prev_link = get_previous_post_link('%link', esc_html( $prev.' &raquo;'));
        $next_link = get_next_post_link('%link', esc_html('&laquo; '.$next, 'reveal'));
        elseif( codexin_get_option( 'reveal_single_pagination' ) == 'title' ):
        $prev_link = get_previous_post_link('%link', esc_html__('%title &raquo;', 'reveal'));
        $next_link = get_next_post_link('%link', esc_html__('&laquo; %title', 'reveal'));
        endif;

        echo '<div class="posts-nav reveal-color-0 reveal-primary-btn clearfix">';
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
* Helper Function for numeric pagination for posts
*
**/
if ( ! function_exists( 'reveal_posts_link_numbered' ) ) {

    function reveal_posts_link_numbered($custom = NULL) {

        global $wp_query;
        /** Stop execution if there's only 1 page */
        if( ( ($custom !== NULL) ? $custom->max_num_pages : $wp_query->max_num_pages ) <= 1 ) {
            return;
        }

        ob_start();
        ?>
            <nav class="number-pagination reveal-color-0 reveal-primary-btn reveal-border-1">
                <?php
                $current = max( 1, absint( get_query_var( 'paged' ) ) );
                $pagination = paginate_links( array(
                    'base' => str_replace( PHP_INT_MAX, '%#%', esc_url( get_pagenum_link( PHP_INT_MAX ) ) ),
                    'format' => '?paged=%#%',
                    'current' => $current,
                    'total' => ($custom !== NULL) ? $custom->max_num_pages : $wp_query->max_num_pages,
                    'type' => 'array',
                    'prev_text' => '&laquo;',
                    'next_text' => '&raquo;',
                ) );
                if ( ! empty( $pagination ) ) : ?>
                    <ul class="pagination">
                        <?php foreach ( $pagination as $key => $page_link ) : ?>
                            <li class="paginated_link<?php if ( strpos( $page_link, 'current' ) !== false ) { echo ' active'; } ?>"><?php echo $page_link ?></li>
                        <?php endforeach ?>
                    </ul>
                <?php endif; ?>
            </nav> <!-- end of number-pagination -->
        <?php
        $links = ob_get_clean();
        return apply_filters( 'reveal_posts_link_numbered', $links );

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
                $post_style = codexin_get_option( 'reveal_blog_style' );
                if( $post_style == 'grid' ):

                    $grid_columns = 12/codexin_get_option('reveal_grid_columns');

                    printf('<div class="post-single-wrap col-lg-%1$s col-md-%1$s col-sm-12">', $grid_columns);
                        get_template_part( 'template-parts/views/grid/content', get_post_format() );
                    echo '</div><!-- end of post-single-wrap -->';

                    if( $i % codexin_get_option('reveal_grid_columns') == 0 ):
                        echo '<div class="clearfix"></div>';
                    endif;

                else:

                    get_template_part( 'template-parts/views/list/content', get_post_format() );

                endif;

            endwhile; 

            echo '<div class="clearfix"></div>';

            $reveal_pagination = codexin_get_option( 'reveal_pagination' );
                      
            global $wp_query;
            echo ( $post_style == 'grid' ) ? '<div class="col-xs-12">' : '' ;

            if( $reveal_pagination == 'numbered' ):
                echo reveal_posts_link_numbered();
            else:                
                reveal_posts_link();
            endif;

            echo ( $post_style == 'grid' ) ? '</div>' : '' ;

        else :

            get_template_part( 'template-parts/views/list/content', 'none' );

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
            echo '<div class="portfolio-archive-wrapper clearfix">';
            $i = 0;
            /* Start the Loop */
            while ( have_posts() ) : the_post();
                $i++;
                $post_style = codexin_get_option( 'reveal_portfolio_style' );
                
                if( $post_style == 'grid' ):
                    
                    $grid_port_columns = 12/codexin_get_option('reveal_portfolio_grid_columns');

                    printf('<div class="portfolio-single-wrap col-lg-%1$s col-md-%1$s col-sm-12">', $grid_port_columns);
                        get_template_part( 'template-parts/views/grid/content', 'portfolio' );
                    echo '</div><!--portfolio wrap-->';

                    if( $i % codexin_get_option('reveal_portfolio_grid_columns') == 0 ):
                        echo '<div class="clearfix"></div>';
                    endif;
                    
                else:
                    get_template_part( 'template-parts/views/list/content', 'portfolio' ); 
                endif;

            endwhile; 
            echo '</div>';

            echo '<div class="clearfix"></div>';

            echo ( $post_style == 'grid' ) ? '<div class="col-xs-12">' : '' ;
                reveal_posts_link('Newer Portfolios', 'Older Portfolios');
            echo ( $post_style == 'grid' ) ? '</div>' : '' ;


        else:
        get_template_part( 'template-parts/views/list/content', 'none' );

        endif;

    }

}


/**
*
* Helper Function for Custom Loop for events
*
**/
if ( ! function_exists( 'reveal_archive_events_loop' ) ) {

    function reveal_archive_events_loop() {

        $paged = ( get_query_var('paged') ) ? get_query_var('paged') : 1;

        $args = array(
            'post_type'  => 'events',
            'orderby'  => 'meta_value',
            'meta_key'   => 'reveal_event_start_date',
            'order'   => 'DESC',
            'paged'   => $paged,
            );
        $loop = new WP_Query($args);

        if ( $loop->have_posts() ) :
            echo '<div class="events-archive-wrapper clearfix">';
            $i = 0;
            /* Start the Loop */
            while ( $loop->have_posts() ) : $loop->the_post();
                $i++;
                $post_style = codexin_get_option( 'reveal_events_style' );
                
                if( $post_style == 'grid' ):

                $grid_port_columns = 12/codexin_get_option('reveal_events_grid_columns');

                printf('<div class="events-single-wrap col-lg-%1$s col-md-%1$s col-sm-12">', $grid_port_columns);
                    get_template_part( 'template-parts/views/grid/content', 'events' );
                echo '</div><!--events wrap-->';

                if( $i % codexin_get_option('reveal_events_grid_columns') == 0 ):
                    echo '<div class="clearfix"></div>';
                endif;
                
                else:
                    
                get_template_part( 'template-parts/views/list/content', 'events' ); 
                    
                endif;

            endwhile; 
            echo '</div>';
            echo '<div class="clearfix"></div>';

            $reveal_pagination = codexin_get_option( 'reveal_events_pagination' );

            echo ( $post_style == 'grid' ) ? '<div class="col-xs-12">' : '' ;
            if( $reveal_pagination == 'numbered' ):
                echo reveal_posts_link_numbered($loop);
            else:                
                reveal_posts_link('Newer Events', 'Older Events');
            endif;
            echo ( $post_style == 'grid' ) ? '</div>' : '' ;    
            

        else:
        get_template_part( 'template-parts/views/list/content', 'none' );

        endif;
        wp_reset_postdata();

    }

}


/**
*
* Helper Function for Custom Loop for Testimonial
*
**/
if ( ! function_exists( 'reveal_archive_testimonial_loop' ) ) {

    function reveal_archive_testimonial_loop() {

        if ( have_posts() ) :
            echo '<div class="testimonial-archive-wrapper">';

            /* Start the Loop */
            while ( have_posts() ) : the_post();
                    
                get_template_part( 'template-parts/views/list/content', 'testimonial' ); 
                    

            endwhile; 
            echo '</div> <!-- end of testimonial-archive-wrapper -->';
            echo '<div class="clearfix"></div>';

            echo reveal_posts_link_numbered();

        else:
            get_template_part( 'template-parts/views/list/content', 'none' );

        endif;

    }

}


/**
*
* Helper Function for Redirecting single testimonial to the archive page, scrolled to current ID 
*
**/
add_action( 'template_redirect', function() {
    if ( is_singular('testimonial') ) {
        global $post;
        $redirect_link = get_post_type_archive_link( 'testimonial' )."#testimonial-".$post->ID;
        wp_safe_redirect( $redirect_link, 302 );
        exit;
    }
});


/**
*
* Helper Function for Turning off pagination for the Testimonial archive page
*
**/
$testimonial_pagination = codexin_get_option('reveal_enable_testimonial_pagination');
if( $testimonial_pagination == false ):
    add_action('parse_query', function($query) {
        if (is_post_type_archive('testimonial')) {
            $query->set('nopaging', 1);
        }
    });
endif;


/**
*
* Helper Function for Turning off pagination for the Team archive page
*
**/
add_action('parse_query', function($query) {
    if (is_post_type_archive('team')) {
        $query->set('nopaging', 1);
    }
});

/**
*
* Helper Function for deregistering Portfolio Custom Posts Type
*
**/
$disable_port = codexin_get_option( 'reveal_enable_portfolio' );
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
* Helper Function for deregistering Events Custom Posts Type
*
**/
$disable_events = codexin_get_option( 'reveal_enable_events' );
$version = '4.5';
if( $disable_events == false ) {
    if (version_compare($version, get_bloginfo('version'), '<=' )) {
        function delete_post_type_events(){
            unregister_post_type( 'events' );
        }
        add_action('init','delete_post_type_events');
    } else {
        return false;        
    }
}

/**
*
* Helper Function for deregistering Testimonial Custom Posts Type
*
**/
$disable_test = codexin_get_option( 'reveal_enable_testimonial' );
$version = '4.5';
if( $disable_test == false ) {
    if (version_compare($version, get_bloginfo('version'), '<=' )) {
        function delete_post_type_testimonial(){
            unregister_post_type( 'testimonial' );
        }
        add_action('init','delete_post_type_testimonial');
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

    echo codexin_get_option( 'reveal-gaq' );

} 


/**
 * Custom Callback Function for Comment layout
 *
 * @param $comment
 * @param $args
 * @param $depth
 */
function reveal_comment_function( $comment, $args, $depth ) {

    $GLOBALS['comment'] = $comment; ?>

    <li <?php comment_class( 'clearfix' ); ?> id="li-comment-<?php comment_ID() ?>">
        <div id="comment-<?php comment_ID(); ?>" class="comment-body clearfix">
            <div class="comment-single">
                <div class="comment-single-left comment-author vcard">
                    <?php echo get_avatar( $comment, $size='90' ); ?>
                </div>

                <div class="comment-single-right comment-info">
                <?php printf( '<span class="fn" itemprop="name">%s</span>', get_comment_author_link() ); ?>
                    <div class="comment-text" itemprop="text">
                        <?php comment_text(); ?>
                    </div>

                    <div class="comment-meta">
                        <a href="<?php echo htmlspecialchars( get_comment_link( $comment->comment_ID ) ) ?>">
                            <time datetime="<?php echo get_the_time('c'); ?>" itemprop="datePublished">
                                <?php printf( esc_html__('%1$s at %2$s', 'reveal'), get_comment_date(),  get_comment_time() ); ?>
                            </time>
                        </a>
                        <?php edit_comment_link( esc_html__( '(Edit)', 'reveal' ),'  ','' ) ?>
                        <span class="comment-reply">
                            <?php 
                            comment_reply_link( array_merge( $args, 
                                array( 
                                    'depth' => $depth, 
                                    'max_depth' => $args['max_depth'], 
                                    'before' => ' &nbsp;&nbsp;<i class="fa fa-caret-right"></i> &nbsp;&nbsp;' 
                                ) 
                            ) ); 
                            ?>
                        </span>
                    </div>

                    <?php if ($comment->comment_approved == '0') { ?>
                        <div class="moderation-notice"><em><?php echo esc_html__('Your comment is awaiting moderation.', 'reveal') ?></em></div>
                    <?php } ?>

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
    // $args['posts_per_page'] = codexin_get_option( 'reveal-num-page' );

    $the_query = new WP_Query( $args );

    if( $the_query->have_posts() ) :
 
        // run the loop
        while( $the_query->have_posts() ): $the_query->the_post();
 
            get_template_part( 'template-parts/views/list/content', get_post_format() );
 
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
 * Helper function to add body class on portfolio list view
 *
 */
function list_body_class ($classes) {
    $port_style = codexin_get_option( 'reveal_portfolio_style' );
    if(($port_style == 'list') && (is_post_type_archive('portfolio'))): 
        $classes[] = 'portfolio-list-view';
        return $classes;
    else:
        return $classes;
    endif;
}
add_filter('body_class', 'list_body_class');


/**
 * Helper function to add body class on events list view
 *
 */
function list_events_body_class ($classes) {
    $events_style = codexin_get_option( 'reveal_events_style' );
    if(($events_style == 'list') && (is_post_type_archive('events'))): 
        $classes[] = 'events-list-view';
        return $classes;
    else:
        return $classes;
    endif;
}
add_filter('body_class', 'list_events_body_class');


/**
 * Helper function to add body class if no header
 *
 */
function list2_body_class ($classes) {

    // Need to check if plugin is active or not

    $disable_header = rwmb_meta('reveal_disable_header', 'type=checkbox');
    if($disable_header == 1): 
        $classes[] = 'no-header';
        return $classes;
    else:
        return $classes;
    endif;
}
add_filter('body_class', 'list2_body_class');


/**
 * Helper function to sanitize hex colors
 *
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


/**
 * Helper function to convert hex color to RGBA
 *
 */
function reveal_hex_to_rgba($hex_color, $opacity = ''){
    $hex_color = str_replace("#", "", $hex_color);
    if (strlen($hex_color) == 3) {
        $r = hexdec(substr($hex_color, 0, 1) . substr($hex_color, 0, 1));
        $g = hexdec(substr($hex_color, 1, 1) . substr($hex_color, 1, 1));
        $b = hexdec(substr($hex_color, 2, 1) . substr($hex_color, 2, 1));
    } else {
        $r = hexdec(substr($hex_color, 0, 2));
        $g = hexdec(substr($hex_color, 2, 2));
        $b = hexdec(substr($hex_color, 4, 2));
    }
    $rgb = $r . ',' . $g . ',' . $b;

    if ('' == $opacity) {
        return $rgb;
    } else {
        $opacity = floatval($opacity);

        return 'rgba(' . $rgb . ',' . $opacity . ')';
    }
}


/**
 * Helper function to adjust brightness of a color
 *
 */
function reveal_adjust_color_brightness($hex_color, $percent_adjust = 0) {

    $percent_adjust = round($percent_adjust/100,2);
    
    $hex = str_replace("#","",$hex_color);
    $r = (strlen($hex) == 3)? hexdec(substr($hex,0,1).substr($hex,0,1)):hexdec(substr($hex,0,2));
    $g = (strlen($hex) == 3)? hexdec(substr($hex,1,1).substr($hex,1,1)):hexdec(substr($hex,2,2));
    $b = (strlen($hex) == 3)? hexdec(substr($hex,2,1).substr($hex,2,1)):hexdec(substr($hex,4,2));
    $r = round($r - ($r*$percent_adjust));
    $g = round($g - ($g*$percent_adjust));
    $b = round($b - ($b*$percent_adjust));

    $new_hex = "#".str_pad(dechex( max(0,min(255,$r)) ),2,"0",STR_PAD_LEFT)
        .str_pad(dechex( max(0,min(255,$g)) ),2,"0",STR_PAD_LEFT)
        .str_pad(dechex( max(0,min(255,$b)) ),2,"0",STR_PAD_LEFT);

    return reveal_sanitize_hex_color( $new_hex );
    
}



/**
 * Helper function to pass colors from theme options
 *
 */
function reveal_theme_colors() {

    // Retrieving color variables from theme options
    $body_bg            = !empty( codexin_get_option( 'reveal-body-bg' ) ) ? reveal_sanitize_hex_color( codexin_get_option( 'reveal-body-bg' ) ) : '#fff';
    $text_color         = !empty( codexin_get_option( 'reveal-text-color' ) ) ? reveal_sanitize_hex_color( codexin_get_option( 'reveal-text-color' ) ) : '#333';
    $primary_color      = !empty( codexin_get_option( 'reveal-primary-color' ) ) ? reveal_sanitize_hex_color( codexin_get_option( 'reveal-primary-color' ) ) : '#295970';
    $secondary_color    = !empty( codexin_get_option( 'reveal-secondary-color' ) ) ? reveal_sanitize_hex_color( codexin_get_option( 'reveal-secondary-color' ) ): '#fce38a';
    $border_color       = !empty( codexin_get_option( 'reveal-border-color' ) ) ? reveal_sanitize_hex_color( codexin_get_option( 'reveal-border-color' ) ) : '#ddd';
    $secondary_bg       = !empty( codexin_get_option( 'reveal-secondary-bg' ) ) ? reveal_sanitize_hex_color( codexin_get_option( 'reveal-secondary-bg' ) ) : '#fafafa';
    $white_color        = '#fff';
    $transparent_bg     = 'transparent';

    $reveal_colors = '';

    // Building the css selectors
    $body_bg_selectors = array(
        'body'
    );
    $text_color_selectors = array(
        'body',
        'a:hover',
        'a:active',
        'a:focus',
        '#wp-calendar thead th',
        '#wp-calendar tbody td a',
        '#wp-calendar tfoot #prev a',
        '#wp-calendar tfoot #next a',
        '.tagcloud a',
        '.page-links a span',
        '.cx-color-0',
        '.cx-color-0 a',
        '.slick-dots li button:focus:before',
        '.slick-dots li button:hover:before',
        '.whole-site-wrapper .cx-cta-btn a',
        '.whole-site-wrapper .reveal-color-0',
        '.whole-site-wrapper .reveal-color-0 a',
        '.whole-site-wrapper .main-content-wrapper .reveal-color-0',
        '.whole-site-wrapper .main-content-wrapper .reveal-color-0 a'

    );
    $text_color_in_bg_selectors = array(
        'button:hover',
        '#toTop:hover',
        '.blog-grid-wrapper .meta',
        '.cx-blog .meta',
        'input[type="button"]:hover',
        'input[type="submit"]:hover'
    );
    $text_color_in_border_selectors = array(
        '.tagcloud a',
        '.page-links a span',
        '.cx-primary-btn a',
        '.mailchimp-input-button button.mailchimp-submit:hover',
        '.whole-site-wrapper .reveal-primary-btn a',
        '.whole-site-wrapper .main-content-wrapper .reveal-primary-btn a'
    );
    $primary_color_selectors = array(
        'a',
        '.cx-color-1',
        '.cx-color-0 a:hover',
        '.content-mask a:hover',
        '.cx-events-description .panel-title a::after',
        '.whole-site-wrapper .reveal-color-0 a:hover',
        '.whole-site-wrapper .reveal-color-1',
        '.whole-site-wrapper .main-content-wrapper .reveal-color-0 a:hover',
        '.whole-site-wrapper .main-content-wrapper .reveal-color-1'
    );
    $primary_color_in_bg_selectors = array(
        'button',
        '#toTop',
        '.page-links span',
        '.page-links a:focus span',
        '.page-links a:hover span',
        '.tagcloud a:hover',
        '#wp-calendar caption',
        '#wp-calendar tbody td a:hover',
        '#wp-calendar tfoot #next a:hover',
        '#wp-calendar tfoot #prev a:hover',
        '.thumb-testimonial::before',
        '.whole-site-wrapper .header.inner-header .reveal-bg-0',
        '.whole-site-wrapper .navbar.affix.reveal-bg-0',
        '.whole-site-wrapper .main-content-wrapper .reveal-bg-0',
        '.cx-primary-btn a:hover',
        '.whole-site-wrapper .reveal-primary-btn a:hover',
        '.whole-site-wrapper .main-content-wrapper .reveal-primary-btn a:hover',
        '.number-pagination .active span.current',
        '.gallery-carousel span.slick-arrow:hover',
        '.recent-portfolio-wrapper:after',
        '.cx-bg-0',
        '.cx-testimonial-5 .slick-slider-nav .item.slick-current .cx-overlay',
        '.cx-team-wrapper .team-social i:hover',
        '.cx-portfolios .portfolio-filter ul li.active',
        '.cx-blog-4 .blog-category a:hover',
        '.cx-events-wrapper-4 .slick-dots li.slick-active',
        '.content-mask .info-wrapper h2::after',
        '.cx-bg-overlay::before'
    );
    $primary_color_in_bg_color_selectors = array(
        'input[type="submit"]',
        'input[type="button"]'
    );
    $primary_color_in_border_selectors = array(
        'input[type="text"]:focus',
        'input[type="url"]:focus',
        'input[type="email"]:focus',
        'input[type="button"]:focus',
        'input[type="reset"]:focus',
        'input[type="password"]:focus',
        'input[type="search"]:focus',
        'input[type="tel"]:focus',
        'input[type="submit"]',
        'textarea:focus',
        '.content-mask a',
        '.form-control:focus',
        '.page-links span',
        '.page-links a:focus span',
        '.page-links a:hover span',
        '.number-pagination .active span.current',
        '.tagcloud a:hover',
        '.mailchimp-input-button button.mailchimp-submit',
        '.cx-service-box .service-single-3:hover',
        '.cx-events-wrapper-3 .cx-border-1:hover',
        '.cx-portfolios .portfolio-filter ul li.active',
        '.cx-testimonial-4 .quote-author-thumb',
        '.whole-site-wrapper .cx-primary-btn a:hover',
        '.whole-site-wrapper .reveal-primary-btn a:hover',
        '.whole-site-wrapper .main-content-wrapper .reveal-primary-btn a:hover',
        '.whole-site-wrapper .main-content-wrapper .reveal-border-0',
        '.events-item-content:hover .events-cx-btn a',
        '.events-single:hover .events-cx-btn a',
        '.events-item-content:hover'
    );
    $primary_color_in_mobile_menu_selectors_1 = array(
        '.c-menu'
    );
    $primary_color_in_mobile_menu_selectors_2 = array(
        '.c-menu__items a:hover',
        '.c-menu__items a:focus',
        '.c-menu__items a:visited'
    );
        $primary_color_in_mobile_menu_selectors_3 = array(
        '.c-menu__close'
    );
    $primary_color_special_selectors_1 = array(
        '.content-mask a'
    );
    $primary_color_special_selectors_2 = array(
        '.cx-team-wrapper .team-single:hover'
    );
    $primary_color_special_selectors_3 = array(
        '.cx-blog-4 .blog-wrapper::after'
    );
    $primary_color_special_selectors_4 = array(
        '.cx-team-wrapper .team-single-wrapper',
        '.cx-portfolios .cx-portfolio .image-mask',
        '.cx-image-box .img-thumb .content-wrapper:hover .single-content-wrapper',
        '.cx-image-box .img-thumb a:hover .single-content-wrapper'
    );
    $primary_color_special_selectors_5 = array(
        '.cx-blog .img-wrapper::before',
        '.cx-blog .img-wrapper::after',
        '.blog-grid-wrapper .img-wrapper a::before',
        '.blog-grid-wrapper .img-wrapper a::after',
        '.blog-wrapper-right a.thumbnail-link:before', 
        '.blog-wrapper-left .img-thumb a:before',
        '.hoverable'
    );
    $secondary_color_selectors = array(
        '.main-menu li a:hover',
        '.main-menu li.active a',
        '.menu-wrapper + .social-wrapper a:hover'
    );
    $secondary_color_in_border_selectors = array(
        '.menu-wrapper + .social-wrapper a:hover'
    );
    $border_color_selectors = array(
        'hr',
        'td', 
        'th',
        'tr',
        'input[type="text"]',
        'input[type="url"]',
        'input[type="email"]',
        'input[type="button"]',
        'input[type="reset"]',
        'input[type="password"]',
        'input[type="search"]',
        'input[type="tel"]',
        'textarea',
        '.wpcf7 textarea',
        'blockquote',
        '.events-item-content',
        'h2.widgettitle',
        'table#wp-calendar',
        'table#wp-calendar thead',
        '#wp-calendar tbody tr',
        '#wp-calendar tbody td + td',
        '#wp-calendar thead th + th',
        '.events-cx-btn a',
        '.whole-site-wrapper .cx-border-1',
        '.whole-site-wrapper .cx-border-1 li',
        '.whole-site-wrapper .events-single .cx-border-1',
        '.whole-site-wrapper .main-content-wrapper .reveal-border-1'
    );
    $border_color_in_bg_selectors = array(
        '.divider'
    );
    $secondary_bg_selectors = array(
        'th',
        'tr.even',
        '#thumbnail_nav .nav-box',
        '.cx-bg-1',
        '.whole-site-wrapper .reveal-bg-1'
    );
    $white_color_selectors = array(
        '.cx-color-2',
        '.cx-color-2 a',
        '.reveal-color-2',
        '.reveal-color-2 a',
        '.cx-cta-btn a:hover',
        '.whole-site-wrapper .reveal-color-2',
        '.whole-site-wrapper .reveal-color-2 a',
        '.cx-primary-btn a:hover',
        '.events-carousel span.slick-arrow',
        '.wpcf7-submit:hover',
        '.whole-site-wrapper .reveal-primary-btn a:hover',
        '.whole-site-wrapper .main-content-wrapper .reveal-primary-btn a:hover',
        '.whole-site-wrapper .main-content-wrapper .tagcloud a:hover',
        '.thumb-testimonial::before',
        '.cx-pricing-tables .pricing-button a:hover',
        '.cx-portfolios .portfolio-filter ul li.active',
        '.gallery-carousel span.slick-arrow:hover',
        '.cx-portfolio .image-mask a:hover'
    );
    $white_color_in_bg_selectors = array(
        '#nav-icon2 span',
        '.whole-site-wrapper .reveal-bg-2',
        '.cx-white-btn a',
        '.cx-cta-btn a',
        '.cx-bg-2',
        '.choose-slides.kc-tabs-slider .owl-theme .owl-controls .owl-page span'
    );
    $white_color_in_border_selectors = array(
        '.whole-site-wrapper .cx-white-btn a',
        '.cx-cta-btn a',
        '.cx-pricing-tables .pricing-button a:hover',
        '.whole-site-wrapper .cx-border-2'
    );
    $transparent_color_in_bg_selectors = array(
        '.page-links a span',
        'span.page-links-title',
        '.nav > li > a:focus',
        '.nav > li > a:hover',
        '.main-menu li.active',
        '.main-menu li.active a',
        '.breadcrumbs-wrapper .breadcrumb',
        'button.primary-nav-details',
        '.thumb-testimonial img',
        '.cx-cta-btn a:hover',
        '.footer .codexin-mailchimp-wrapper',
        '.cx-pricing-tables .pricing-button a:hover',
        '.number-pagination .pagination>li>a:focus', 
        '.number-pagination .pagination>li>span:focus'
    );

    // Passing the required styles
    $reveal_colors .= implode($body_bg_selectors, ',').'{background: '.$body_bg.';}';
    $reveal_colors .= implode($text_color_selectors, ',').'{color: '.$text_color.';}';
    $reveal_colors .= implode($text_color_in_bg_selectors, ',').'{background-color: '.$text_color.';}';
    $reveal_colors .= implode($text_color_in_border_selectors, ',').'{border-color: '.$text_color.';}';
    $reveal_colors .= implode($primary_color_selectors, ',').'{color: '.$primary_color.';}';
    $reveal_colors .= implode($primary_color_in_bg_selectors, ',').'{background: '.$primary_color.';}';
    $reveal_colors .= implode($primary_color_in_bg_color_selectors, ',').'{background-color: '.$primary_color.';}';
    $reveal_colors .= implode($primary_color_in_border_selectors, ',').'{border-color: '.$primary_color.';}';
    $reveal_colors .= implode($primary_color_in_mobile_menu_selectors_1, ',').'{background-color: '.$primary_color.';}';
    $reveal_colors .= implode($primary_color_in_mobile_menu_selectors_2, ',').'{background: '.reveal_adjust_color_brightness($primary_color, -20).';}';
    $reveal_colors .= implode($primary_color_in_mobile_menu_selectors_3, ',').'{background-color: '.reveal_adjust_color_brightness($primary_color, -40).';}';
    $reveal_colors .= implode($primary_color_special_selectors_1, ',').'{background: '.$primary_color.' none repeat scroll 0 0;}';
    $reveal_colors .= implode($primary_color_special_selectors_2, ',').'{-webkit-box-shadow: 5px 5px 5px 0 '.$primary_color.'; -moz-box-shadow: 5px 5px 5px 0 '.$primary_color.'; -ms-box-shadow: 5px 5px 5px 0 '.$primary_color.'; -o-box-shadow: 5px 5px 5px 0 '.$primary_color.'; box-shadow: 5px 5px 5px 0 '.$primary_color.';}';
    $reveal_colors .= implode($primary_color_special_selectors_3, ',').'{background: linear-gradient(transparent, '.$primary_color.');}';
    $reveal_colors .= implode($primary_color_special_selectors_4, ',').'{background: '.$primary_color.'; background: '.reveal_hex_to_rgba($primary_color, 0.75).';}';
    $reveal_colors .= implode($primary_color_special_selectors_5, ',').'{background: '.$primary_color.'; background: '.reveal_hex_to_rgba($primary_color, 0.35).';}';
    $reveal_colors .= implode($secondary_color_selectors, ',').'{color: '.$secondary_color.';}';
    $reveal_colors .= implode($secondary_color_in_border_selectors, ',').'{border-color: '.$secondary_color.';}';
    $reveal_colors .= implode($border_color_selectors, ',').'{border-color: '.$border_color.';}';
    $reveal_colors .= implode($border_color_in_bg_selectors, ',').'{background: '.$border_color.';}';
    $reveal_colors .= implode($secondary_bg_selectors, ',').'{background: '.$secondary_bg.';}';
    $reveal_colors .= implode($white_color_selectors, ',').'{color: '.$white_color.';}';
    $reveal_colors .= implode($white_color_in_bg_selectors, ',').'{background: '.$white_color.';}';
    $reveal_colors .= implode($white_color_in_border_selectors, ',').'{border-color: '.$white_color.';}';
    $reveal_colors .= implode($transparent_color_in_bg_selectors, ',').'{background: '.$transparent_bg.';}';

    // Finally adding the css after the Main Stylesheet
    wp_add_inline_style('main-stylesheet', $reveal_colors);

}
add_action('wp_enqueue_scripts', 'reveal_theme_colors');



if ( ! function_exists( 'reveal_comments_navigation' ) ) {
    /**
     * Displays previous/next comments navigation if needed
     *
     */
    function reveal_comments_navigation() {

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


if (!function_exists('codexin_meta')){
    /**
     *  get meta data
     */
    function codexin_meta( $key, $args = array(), $post_id = null ){
        if(function_exists('rwmb_meta')){
            return rwmb_meta( $key, $args, $post_id );
        }else{
            return null;
        }
    }
}