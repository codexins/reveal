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
     * @since     v1.0.0
     */
    function codexin_menu_url_schema( $atts, $item, $args ) {
        $atts['itemprop'] = 'url';
        return $atts;
    }
}