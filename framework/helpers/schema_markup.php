<?php




/**
*
* Helper Function to automatically define the schema type for better SEO
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