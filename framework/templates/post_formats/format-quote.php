<?php

/**
 * Post format rendering template for Quote Post
 *
 * @package 	Reveal
 * @subpackage 	Core
 * @since 		1.0
 */


// Do not allow directly accessing this file.
defined( 'ABSPATH' ) OR die( esc_html__( 'This script cannot be accessed directly.', 'reveal' ) );

// Fetching and assigning data from metabox
$quote 	= codexin_meta( 'codexin_quote_text' );
$name 	= codexin_meta( 'codexin_quote_name' );
$source = codexin_meta( 'codexin_quote_source' );


if ( ! post_password_required() ) {

    if( !empty( $quote ) ) {
        echo '<div class="post-quote reveal-border-1">';
            echo '<span class="icon reveal-color-1"></span>';
            echo '<blockquote>';
                echo wp_kses_post( $quote );
            		echo ( ! empty( $source ) ) ? '<a href="'. esc_url( $source ) .'">' : '';
            		echo ( ! empty( $name ) ) ? '<span> - '. esc_html( $name ) .'</span>' : '';
            	echo ( ! empty( $source ) ) ? '</a>' : '';
            echo '</blockquote>';
        echo '</div>';
    }

} // end of password check condition