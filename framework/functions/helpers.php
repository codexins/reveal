<?php

/**
 * Various helper functions definition related to Codexin framework
 *
 * @package Reveal
 * @subpackage Core
 */


// Do not allow directly accessing this file.
defined( 'ABSPATH' ) OR die( esc_html__( 'This script cannot be accessed directly.', 'reveal' ) );


if ( ! function_exists('codexin_get_option' ) ) {
    /**
     * Helper Function to get theme options
     *
     * @param   int       $option     The option we need from the DB
     * @param   string    $default    If $option doesn't exist in DB return $default value
     * @return  mixed
     * @since   v1.0.0
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
     *
     * @param   string     $key        The meta key name from which we want to get the value
     * @param   array      $args       The arguments of the meta key
     * @param   int        $post_id    The ID of the post
     * @return  mixed
     * @since   v1.0.0
     */
    function codexin_meta( $key, $args = array(), $post_id = null ){
        if( function_exists( 'rwmb_meta' ) ) {
            return rwmb_meta( $key, $args, $post_id );
        } else {
            return null;
        }
    }
}


if ( ! function_exists( 'codexin_default_google_fonts' ) ) {
    /**
     * Register Google fonts for theme.
     *
     * @return    string      Google fonts URL for the theme.
     * @since     v1.0.0
     */
    function codexin_default_google_fonts() {
        $fonts_url = '';
        $fonts     =  apply_filters( 'codexin_default_google_fonts', array( 'Lobster', 'Montserrat:400,700', 'Roboto:400,700') );
        if ( $fonts ) {
            $subsets   = apply_filters( 'codexin_default_google_fonts', 'latin' );
            $fonts_url = add_query_arg( array(
                'family' => implode( '%7C', $fonts ),
                'subset' => urlencode( $subsets ),
            ),  'https://fonts.googleapis.com/css' );
        }
        return $fonts_url;
    }
}


if ( ! function_exists( 'codexin_add_menu' ) ) {
    /**
     * Helper Function to give a notice to add menu if no menu is assigned
     *
     * @param   string      $type    The type of navigation menu (possible values: desktop_menu/mobile_menu)
     * @return  mixed
     * @since   v1.0.0
     */
    function codexin_add_menu( $type ) {
        $result = '';
        $wrapper = ( $type == 'mobile_menu' ) ? '<div id="mobile-menu" class="c-menu__items">' : '<div class="main-menu">';
        $ul      = ( $type == 'desktop_menu' ) ? '<ul id="main_menu" class="sf-menu">' : '<ul>';
        $li      = ( $type == 'desktop_menu' ) ? '<li class="menu-item">' : '<li class="menu-notice">';

        $result .= $wrapper;
            $result .= $ul;
                $result .= $li;
                    $result .= '<a href="' . admin_url( 'nav-menus.php' ) . '" itemprop="url">' . esc_html__( 'Add a Menu', 'reveal' ) . '</a>';
                $result .= '</li>';
            $result .= '</ul>';
        $result .= '</div>';

        return $result;
    }
}


if ( ! function_exists( 'codexin_responsive_class' ) ) {
    /**
     * Helper Function to add the responsive menu class
     *
     * @since   v1.0.0
     */
    function codexin_responsive_class() {
        $responsive_header  = codexin_get_option( 'reveal-responsive-version' );
        $responsive_class   = ( $responsive_header == 'left' ) ? esc_attr( 'left' ) : esc_attr( 'right' );

        return $responsive_class;
    }
}


if ( ! function_exists( 'codexin_logo' ) ) {
    /**
     * Helper Function to get logo from theme options
     *
     * @since   v1.0.0
     */
    function codexin_logo() {
        $logo_type          = codexin_get_option( 'reveal-logo-type' );
        $text_logo          = codexin_get_option( 'reveal-text-logo' ); 
        $image_logo         = codexin_get_option( 'reveal-image-logo' )['url'];
        $menu_class         = ( codexin_responsive_class() == 'right' ) ? esc_attr( ' menu-right') : '';

        if( empty( $image_logo ) || empty( $text_logo ) ) {
            return;
        }

        $result = '';
        $result .= '<a class="navbar-brand'. $menu_class . '" href="' . esc_url( home_url() ) . '" itemprop="url">';
            if( $logo_type == 2 ) {
                $result .= '<img src="' . esc_url( $image_logo ) . '" alt="Logo" itemprop="logo">';
            } else {
                $result .= wp_kses_post( $text_logo );
            }
        $result .= '</a> <!--End navbar-brand-->';

        return $result;
    }
}


if ( ! function_exists( 'codexin_responsive_nav' ) ) {
    /**
     * Helper Function to get logo from theme options
     *
     * @since   v1.0.0
     */
    function codexin_responsive_nav() {

        $result = '';

        ob_start();

        ?>
            <!--Responsive Navigation-->
            <div id="o-wrapper" class="mobile-nav o-wrapper">
                <div class="primary-nav">
                    <button id="c-button--slide-<?php echo codexin_responsive_class(); ?>" class="primary-nav-details reveal-color-2"><?php esc_html_e( 'Menu', 'reveal' ) ?>
                        <span id="nav-icon2">
                          <span></span>
                          <span></span>
                          <span></span>
                          <span></span>
                          <span></span>
                          <span></span>
                        </span>
                    </button> <!-- end of primary-nav-details -->
                </div> <!-- end of primary-nav -->
            </div> <!--End Responsive Navigation-->

        <?php

        $result .= ob_get_clean();

        return $result;
    }
}


if ( ! function_exists( 'codexin_smart_slider' ) ) {
    /**
     * Helper Function to get smart slider
     *
     * @since   v1.0.0
     */
    function codexin_smart_slider() {

        $result = '';
        if( is_page_template( 'page-templates/page-home.php' ) ) {
            if ( is_plugin_active( 'nextend-smart-slider3-pro/nextend-smart-slider3-pro.php' ) ) {

                $slider_id = codexin_meta( 'reveal_page_slider' ); 

                $result .= '<div class="slider-wrapper">';
                    if( ! empty( $slider_id ) ){
                        $result .= do_shortcode('[smartslider3 slider='. $slider_id .']');
                    } else {
                        $result .= '<div class="no-slider text-center"><h3>Please select a \'Slider Name\' from \'Page Edit\' section and click on \'Update\'</h3></div>';
                    }
                $result .= '</div> <!-- end of slider-wrapper -->';

            } else {
                $result .= '<div class="no-slider text-center">';
                    $result .= '<h3>' . esc_html__( 'Oops! Seems Smart Slider Not Activated!', 'reveal' ) . '</h3>';
                    $result .= sprintf( '%1$s<br />%2$s', esc_html__( 'Please install/activate Smart Slider and create the slides. Once completed, assign the slider from \'Page Edit\' settings.', 'reveal' ), esc_html__( 'If you don\'t want to use slider, then use another page template, for example \'Page - Full Width\' or any other.', 'reveal' ) );
                $result .= '</div>';
            }
        }

        return $result;
    }
}



if ( ! function_exists( 'codexin_char_limit' ) ) {
    /**
     * Helper Function to limit the character length
     *
     * @param   int       $limit     The number of character to limit
     * @param   string    $type      The type of content (possible values: title/excerpt)
     * @return  string
     * @since   v1.0.0
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
     *
     * @param   int       $limit     The number of character to limit
     * @return  string
     * @since   v1.0.0
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
     *
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
     *
     * @param   string  $color  The color code
     * @return  string
     * @since   v1.0.0
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
     *
     * @param   string      $hex_color     The color code in hexadecimal
     * @param   float       $opacity       The color opacity we want
     * @return  string
     * @since   v1.0.0
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
     *
     * @param   string      $hex_color        The color code in hexadecimal
     * @param   float       $percent_adjust   The percentage we want to lighten/darken the color
     * @return  string
     * @since   v1.0.0
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