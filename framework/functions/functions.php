<?php

/**
 * Various core functions definition related to Codexin framework
 *
 * @package 	Reveal
 * @subpackage 	Core
 * @since 		1.0
 */


// Do not allow directly accessing this file.
defined( 'ABSPATH' ) OR die( esc_html__( 'This script cannot be accessed directly.', 'reveal' ) );


add_action( 'admin_menu', 'remove_redux_menu',12 );
if ( ! function_exists( 'remove_redux_menu' ) ) {
	/**
	 * Removing 'Redux Framework' sub menu under Tools 
	 *
	 * @uses 	remove_submenu_page()
	 * @since 	v1.0
	 */
	function remove_redux_menu() {
	    remove_submenu_page( 'tools.php','redux-about' );
	}
}


/**
 * Removing srcset from featured image
 *
 * @uses 	add_filter()
 * @since 	v1.0
 */
add_filter( 'max_srcset_image_width', create_function( '', 'return 1;' ) );


add_filter( 'post_thumbnail_html', 'codexin_remove_thumbnail_dimensions', 10, 3 );
if ( ! function_exists( 'codexin_remove_thumbnail_dimensions' ) ) {
	/**
	 * Removing width & height from featured image
	 *
	 * @param 	string 		$html
	 * @param 	integer 	$post_id
	 * @param 	integer 	$post_image_id
	 * @return 	mixed
	 * @since 	v1.0
	 */
	function codexin_remove_thumbnail_dimensions( $html, $post_id, $post_image_id ) {
	    $html = preg_replace( '/(width|height)=\"\d*\"\s/', "", $html );
	    return $html;
	}
}


add_action( 'admin_init', 'codexin_editor_styles' );
if ( ! function_exists( 'codexin_editor_styles' ) ) {
	/**
	 * Apply theme's stylesheet to the visual editor.
	 *
	 * @uses 	add_editor_style() Links a stylesheet to visual editor
	 * @since 	v1.0
	 */
	function codexin_editor_styles() {
		add_editor_style( 'framework/admin/assets/css/editor-style.css' );
	}
}


/**
 * Adding wp_title support
 *
 * @uses 	add_action()
 * @since 	v1.0
 */
if ( ! function_exists( '_wp_render_title_tag' ) ) {
	add_action( 'wp_head', 'codexin_render_title' );
}
if ( ! function_exists( 'codexin_render_title' ) ) {
	function codexin_render_title() {
		?>
		<title><?php wp_title( '|', true, 'right' ); ?></title>
		<?php
	}
}


if ( ! function_exists( 'remove_demo' ) ) {
	/**
	 * Removes the demo link and the notice of integrated demo from the redux-framework plugin
	 *
	 * @uses 	remove_filter()
	 * @uses 	remove_action()
	 * @since 	v1.0
	 */
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
 * Function for Redirecting single testimonial to the archive page, scrolled to current ID 
 * 
 * @uses 	add_action()
 * @since 	v1.0
 */
add_action( 'template_redirect', function() {
    if ( is_singular('testimonial') ) {
        global $post;
        $redirect_link = get_post_type_archive_link( 'testimonial' )."#testimonial-".$post->ID;
        wp_safe_redirect( $redirect_link, 302 );
        exit;
    }
});


/**
 * Function for Turning off pagination for the Testimonial archive page
 * 
 * @uses 	add_action()
 * @since 	v1.0
 */
$testimonial_pagination = codexin_get_option('reveal_enable_testimonial_pagination');
if( $testimonial_pagination == false ) {
    add_action( 'parse_query', function( $query ) {
        if ( is_post_type_archive( 'testimonial' ) && $query->is_main_query() ) {
            $query->set('nopaging', 1);
        }
    } );
}


/**
 * Function for Turning off pagination for the Team archive page
 * 
 * @uses 	add_action()
 * @since 	v1.0
 */
add_action( 'parse_query', function( $query ) {
    if ( is_post_type_archive( 'team' ) && $query->is_main_query() ) {
        $query->set('nopaging', 1);
    }
} );


if ( ! function_exists( 'codexin_comment_function' ) ) {
	/**
	 * Custom Callback Function for Comment layout
	 *
	 * @param 	$comment
	 * @param 	$args
	 * @param 	$depth
	 * @since 	v1.0
	 */
	function codexin_comment_function( $comment, $args, $depth ) {

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
}


add_action( 'admin_enqueue_scripts', 'codexin_post_formats_script', 10, 1 );
if ( ! function_exists( 'codexin_post_formats_script' ) ) {
	/**
	 * Hides/Shows metaboxes on demand - depending on your selection inside the post formats meta box
	 *
	 * @uses 	wp_enqueue_script()
	 * @param 	$hook
	 * @since 	v1.0
	 */
	function codexin_post_formats_script( $hook ) {	 
	    global $post;	 
	    if ( $hook == 'post-new.php' || $hook == 'post.php' ) {
	        if ( 'post' === $post->post_type ) {
	            wp_enqueue_script(  'codexin-post-format', CODEXIN_FRAMEWORK_ADMIN_URL . 'assets/js/post-format.js' );
	        }
	    }
	}
}


add_filter( 'body_class', 'codexin_body_class' );
if ( ! function_exists( 'codexin_body_class' ) ) {
	/**
	 * Function for adding body class on special occasions
	 * 
	 * @param 	int 	$classes	The class to be returned
	 * @return 	string
	 * @since 	v1.0
	 *
	 */
	function codexin_body_class( $classes ) {
	    $port_style 	= codexin_get_option( 'reveal_portfolio_style' );
	    $event_style 	= codexin_get_option( 'reveal_events_style' );
	    $disable_header = codexin_meta( 'reveal_disable_header' );
	    if( ( $port_style == 'list' ) && ( is_post_type_archive( 'portfolio' ) ) || ( $event_style == 'list' ) && ( is_post_type_archive( 'events' ) ) ) { 
	        $classes[] = 'codexin-list-view';
	        return $classes;
	    } elseif( $disable_header == 1 ){
	        $classes[] = 'no-header';
	        return $classes;
	    } else {
	        return $classes;
	    }
	}
}


/**
 * Function for deregistering Events/Portfolio/Testimonial/Team Custom Posts Type
 *
 * @uses 	add_action()
 * @uses 	unregister_post_type()
 * @since 	v1.0
**/
$version = '4.5';
if( version_compare( $version, get_bloginfo( 'version' ), '<=' ) ) {	

    function delete_post_type_events() {
    	$enable_events 	= codexin_get_option( 'reveal_enable_events' );
    	if( $enable_events == false ) {
	        unregister_post_type( 'events' );
	    }
    }

    function delete_post_type_testimonial() {
    	$enable_testimonial = codexin_get_option( 'reveal_enable_testimonial' );
    	if( $enable_testimonial == false ) {
	        unregister_post_type( 'testimonial' );
	    }
    }

    function delete_post_type_portfolio() {
    	$enable_portfolio 	= codexin_get_option( 'reveal_enable_portfolio' );
    	if( $enable_portfolio == false ) {
	        unregister_post_type( 'portfolio' );
	    }
    }

    function delete_post_type_team() {
    	$enable_team 	= codexin_get_option( 'reveal_enable_team' );
    	if( $enable_team == false ) {
	        unregister_post_type( 'team' );
	    }
    }
    add_action( 'init','delete_post_type_events' );
    add_action( 'init','delete_post_type_testimonial' );
    add_action( 'init','delete_post_type_portfolio' );
    add_action( 'init','delete_post_type_team' );

} else {
    return false;        
}


add_action( 'wp_head', 'codexin_pingback_header' );
if ( ! function_exists( 'codexin_pingback_header' ) ) {
	/**
	 * Add a pingback url auto-discovery header for singularly identifiable articles.
	 *
	 * @since 	v1.0
	 */
	function codexin_pingback_header() {
		if ( is_singular() && pings_open() ) {
			printf( '<link rel="pingback" href="%s">' . "\n", get_bloginfo( 'pingback_url' ) );
		}
	}
}


// add_filter('wp_nav_menu_items', 'codexin_nav_search', 10, 2);
// if ( ! function_exists( 'codexin_nav_search' ) ) {
// 	/**
// 	 * Add search box to navigation menu
// 	 *
// 	 * @since 	v1.0
// 	 */
// 	function codexin_nav_search( $items, $args ) {
// 	    // If this isn't the primary menu, do nothing
// 	    if( ! ( $args->theme_location == ( 'main_menu' || 'main_menu_right') ) ) {
// 		    return $items;
// 		} else {
// 		    // Otherwise, add search form
// 		    return $items . '<li class="menu-item">' . get_search_form(false) . '</li>';
// 		}
// 	}
// }












