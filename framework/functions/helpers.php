<?php

/**
 * Various helper functions definition related to Codexin framework
 *
 * @package 	Reveal
 * @subpackage 	Core
 * @since 		1.0
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
     * @since   v1.0
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
     * @since   v1.0
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
     * @param   string      $type    The type of navigation menu (possible values: desktop/mobile)
     * @return  mixed
     * @since   v1.0
     */
    function codexin_add_menu( $type ) {
        $result = '';
        $wrapper = ( $type == 'mobile' ) ? '<div id="mobile-menu" class="c-menu__items">' : '<div class="main-menu">';
        $ul      = ( $type == 'desktop' ) ? '<ul id="main_menu" class="sf-menu">' : '<ul>';
        $li      = ( $type == 'desktop' ) ? '<li class="menu-item">' : '<li class="menu-notice">';

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
     * @since   v1.0
     */
    function codexin_responsive_class() {
        $responsive_header  = codexin_get_option( 'cx_responsive_version' );
        $responsive_class   = ( $responsive_header == 'left' ) ? esc_attr( 'left' ) : esc_attr( 'right' );

        return $responsive_class;
    }
}


if ( ! function_exists( 'codexin_header_version' ) ) {
    /**
     * Helper Function to get the header version
     *
     * @since   v1.0
     */
    function codexin_header_version() {
        $header_version = NULL;

        $global_header      = codexin_get_option( 'cx_header_version' );
        $individual_header  = codexin_meta('reveal_header_layout');

        if( is_page() ) {
            $header_version     = ( ! empty( $individual_header ) ) || ( $individual_header !== '0' ) ? $individual_header : $global_header;
        } else {
            $header_version     = $global_header;
        }

        return $header_version;
    }
}


if ( ! function_exists( 'codexin_logo' ) ) {
    /**
     * Helper Function to get logo from theme options
     *
     * @since   v1.0
     */
    function codexin_logo() {
        $logo_type          = codexin_get_option( 'cx_logo_type' );
        $text_logo          = codexin_get_option( 'cx_text_logo' ); 
        $image_logo         = codexin_get_option( 'cx_image_logo' )['url'];
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
     * Helper Function to render the navigation icon to initialize mobile menu
     *
     * @since   v1.0
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


if ( ! function_exists( 'codexin_get_smart_slider' ) ) {
    /**
     * Helper Function to get smart slider
     *
     * @since   v1.0
     */
    function codexin_get_smart_slider() {

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


if ( ! function_exists( 'codexin_title_background' ) ) {
    /**
     * Helper function to return page tile background url
     *
     * @since   v1.0
     */
    function codexin_title_background() {
        $header_bg = codexin_meta( 'reveal_page_background' ); 

        if( empty( $header_bg ) ) {
            return;
        }
        foreach ( $header_bg as $single_bg ) {
            $single_bg = $single_bg['full_url'];
            return $single_bg;
        }
    }
}


if ( ! function_exists( 'codexin_page_title' ) ) {
    /**
     * Helper function to return page specific titles
     *
     * @since   v1.0
     */
    function codexin_page_title() {
        $blog_title = codexin_get_option( 'cx_blog_title' );

        $result = '';
        if( is_home() ) {
            $result .= esc_html( ! empty( $blog_title ) ? $blog_title : __( 'Blog', 'reveal' ) );
        } elseif( is_404() ) {
            $result .= esc_html__('Nothing Found!', 'reveal');
        } elseif( is_archive() ) {
            $result .=  get_the_archive_title() ;
        } elseif( is_search() ) {
            $result .= sprintf( esc_html__( 'Search Results for: %s', 'reveal' ), '<span>' . get_search_query() . '</span>' );
        } else {
            $result .= single_post_title( '', false );
        }

        return $result;
    }
}


if ( ! function_exists( 'codexin_button' ) ) {
    /**
     * Helper function to return the markup for read more button
     *
     * @param   string      $args    The type of button to render. Possible value: events_grid
     * @return  mixed
     * @since   v1.0
     */
    function codexin_button( $args = NULL ) {

        $main_class     = ( $args !== 'events_grid' ) ? 'cx-btn ' : 'events-cx-btn ';
        $button_class   = ( $args !== 'events_grid' ) ? ' reveal-primary-btn' : '';

        $result = '';
        $result .= '<div class="'. $main_class .'reveal-color-0'. $button_class .'">';
            $result .= '<a class="cx-btn-text" href="'. esc_url( get_the_permalink() ) .'">'. esc_html__( 'Read More', 'reveal' ) .'</a>';
        $result .= '</div> <!-- end of cx-btn -->';

        return $result;

    }
}


if ( ! function_exists( 'codexin_char_limit' ) ) {
    /**
     * Helper Function to limit the character length without breaking any word
     *
     * @param   int       $limit     The number of character to limit
     * @param   string    $type      The type of content (possible values: title/excerpt)
     * @return  mixed
     * @since   v1.0
     */
    function codexin_char_limit( $limit, $type ) {
        $content = ( $type == 'title' && $type !== 'excerpt' ) ? get_the_title() : get_the_excerpt();
        $limit++;

        if ( mb_strlen( $content ) > $limit ) {
            $subex = mb_substr( $content, 0, $limit);
            $exwords = explode( ' ', $subex );
            $excut = - ( mb_strlen( $exwords[ count( $exwords ) - 1 ] ) );
            if ( $excut < 0 ) {
                echo mb_substr( $subex, 0, $excut );
            } else {
                return $subex;
            }
            echo '...';
        } else {
            return $content;
        }
    }

}


if ( ! function_exists( 'codexin_attachment_metas' ) ) {
    /**
     * Helper Function to get some meta data from attachments
     *
     * @param   int        $post_id    The ID of the attachment
     * @return  array
     * @since   v1.0
     */
    function codexin_attachment_metas( $attachment_id = null ) {

        $metas = array();

        $attachment         = wp_prepare_attachment_for_js( $attachment_id );
        $metas['size']      = $attachment['width'] . 'x' . $attachment['height'];
        $metas['alt']       = ( ! empty( $attachment['alt'] ) ) ? 'alt="' . esc_attr( $attachment['alt'] ) . '"' : 'alt="' .get_the_title() . '"';
        $metas['caption']   = ( ! empty( $attachment['caption'] ) ) ? $attachment['caption'] : '';

        return $metas;
    }
}


if ( ! function_exists( 'codexin_placeholder_dimensions' ) ) {
    /**
     * Helper Function to set default placeholder dimensions
     *
     * @param   string     $image_size    The desired image size
     * @return  string
     * @since   v1.0
     */
    function codexin_placeholder_dimensions( $image_size = null ) {

        $dimensions = '';

        switch ( $image_size ) {
            case "reveal-post-single":
                $dimensions .= 'placehold.it/800x354';
                break;
            case "reveal-portfolio-single":
                $dimensions .= 'placehold.it/1170x400';
                break;
            case "gallery-format-image":
                $dimensions .= 'placehold.it/800x450';
                break;
            case "gallery-format-image":
                $dimensions .= 'placehold.it/800x450';
                break;
            case "reveal-rectangle-one":
                $dimensions .= 'placehold.it/600x375';
                break;
            case "rectangle-one":
                $dimensions .= 'placehold.it/600x400';
                break;
            case "rectangle-two":
                $dimensions .= 'placehold.it/570x464';
                break;
            case "rectangle-three":
                $dimensions .= 'placehold.it/480x595';
                break;
            case "rectangle-four":
                $dimensions .= 'placehold.it/600x327';
                break;
            case "rectangle-five":
                $dimensions .= 'placehold.it/740x580';
                break;
            case "square-one":
                $dimensions .= 'placehold.it/220x220';
                break;
            case "square-two":
                $dimensions .= 'placehold.it/500x500';
                break;
            default:
                $dimensions .= 'placehold.it/800x354';
        }

        return $dimensions;
    }
}


if ( ! function_exists( 'codexin_attachment_metas_extended' ) ) {
    /**
     * Helper Function to get some meta information from attachments using some extra parameters
     *
     * @param   int        $post_id       The ID of the attachment
     * @param   int        $post_type     The post type to use the attachment. Possible values: blog/portfolio/events/testimonial/team
     * @param   int        $image_size    The registered image size to use with the attachment. Refer to theme_support.php and codexin-core plugin init.php
     * @return  array
     * @since   v1.0
     */
    function codexin_attachment_metas_extended( $post_id = NULL, $post_type = '', $image_size = '' ) {

        $metas = array();

        // Defining all the required variables
        $type_post          = 'cx_'. $post_type .'_image';
        $image_default      = codexin_get_option( $type_post );
        $attachment_id      = ( has_post_thumbnail() ) ? get_post_thumbnail_id( $post_id ) : $image_default['id'];
        $attachment         = wp_prepare_attachment_for_js( $attachment_id );
        $default_image      = wp_get_attachment_image_src( $attachment_id, $image_size );
        $post_image         = ( has_post_thumbnail() ) ? esc_url( get_the_post_thumbnail_url( $post_id, $image_size ) ) : esc_url( $default_image[0] );
        $image_width        = ! empty ($attachment['width'] ) ? $attachment['width'] : '800';
        $image_height       = ! empty ($attachment['height'] ) ? $attachment['height'] : '400';

        // Building the output
        $metas['size']      = $image_width . 'x' . $image_height;
        $metas['alt']       = ( ! empty( $attachment['alt'] ) ) ? 'alt="' . esc_attr( $attachment['alt'] ) . '"' : 'alt="' .get_the_title() . '"';
        $metas['caption']   = ( ! empty( $attachment['caption'] ) ) ? $attachment['caption'] : '';
        $metas['src']       = ( ! empty( $post_image ) ) ? $post_image : esc_url( codexin_placeholder_dimensions( $image_size ) );

        return $metas;
    }
}


if ( ! function_exists( 'reveal_sanitize_hex_color' ) ) {
    /**
     * Helper function to sanitize hex colors
     *
     * @param   string  $color  The color code
     * @return  string
     * @since   v1.0
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
     * @since   v1.0
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
     * @since   v1.0
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