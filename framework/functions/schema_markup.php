<?php

/**
 * Functions definition to add schema markup to enhance SEO
 *
 * @package 	Reveal
 * @subpackage 	Core
 * @since 		1.0
 */


// Do not allow directly accessing this file.
defined( 'ABSPATH' ) OR die( esc_html__( 'This script cannot be accessed directly.', 'reveal' ) );


if ( ! function_exists( 'codexin_html_tag_schema' ) ) {
    /**
    *
    * Helper Function to automatically define the schema type for better SEO
    *
    * @since v1.0.0
    **/
    function codexin_html_tag_schema() {

        $schema = esc_url( 'http://schema.org/' );
        $type = esc_attr( 'WebSite' );

        echo 'itemscope="itemscope" itemtype="' . $schema . $type . '"';
    }

}



add_filter( 'nav_menu_link_attributes', 'codexin_menu_url_schema', 10, 3 );
if ( ! function_exists( 'codexin_menu_url_schema' ) ) {
    /**
     * Adding schema itemprop to navigation anchors
     *
     * @param     array       $atts
     * @param     string      $item
     * @param     array       $args
     * @return    mixed
     * @since     v1.0
     */
    function codexin_menu_url_schema( $atts, $item, $args ) {
        $atts['itemprop'] = 'url';
        return $atts;
    }
}


if ( ! function_exists( 'codexin_render_schema' ) ) {
    /**
     * Schema markup builder
     *
     * @param     string       $args
     * @return    mixed
     * @since     v1.0
     */
    function codexin_render_schema( $args = NULL ) {
        
        global $post;
        $result     ='';
        $logo       = codexin_get_option( 'cx_image_logo' )['url'];
        $company    = ! empty( codexin_get_option( 'cx_company_name' ) ) ? esc_html( codexin_get_option( 'cx_company_name' ) ) : esc_html( 'Company' );
        $image_prop = codexin_attachment_metas_extended( $post->ID, 'blog', 'full' );
        $url = get_the_permalink();
        if( is_home() && ! is_front_page() ) {
            $url = get_permalink( get_option( 'page_for_posts' ) );
        }
        if( is_home() && is_front_page() ) {
            $url = home_url( '/' );
        }

        if( $args == 'publisher' ) {
            $result .= '<span itemprop="publisher" itemscope itemtype="https://schema.org/Organization">';
                $result .= '<span class="hide" itemprop="logo" itemscope itemtype="https://schema.org/ImageObject">';
                    $result .= '<img src="'. esc_url( $logo ) .'" />';
                    $result .= '<meta itemprop="url" content="'. esc_url( $logo ) .'">';
                    $result .= '<meta itemprop="width" content="260">';
                    $result .= '<meta itemprop="height" content="100">';
                $result .= '</span>';
                $result .= '<meta itemprop="name" content="'. $company .'">';
            $result .= '</span>';
        } elseif( $args == 'image' ) {
            $result .= '<meta itemprop="url" content="'. $image_prop['src'] .'">';
            $result .= '<meta itemprop="width" content="'. esc_attr( $image_prop['width'] ) .'">';
            $result .= '<meta itemprop="height" content="'. esc_attr( $image_prop['height'] ) .'">';
        } elseif( $args == 'date-modified' ) {
            $result .= '<meta itemprop="dateModified" content="'. esc_attr( get_the_modified_date() ) .'" />';
            $result .= '<meta itemprop="mainEntityOfPage" content="'. esc_url( $url ) .'" />';
        }

        printf( '%s', $result );
    }

}