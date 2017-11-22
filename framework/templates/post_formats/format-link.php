<?php

/**
 * Post format rendering template for Link Post
 *
 * @package Reveal
 * @subpackage Core
 */


// Do not allow directly accessing this file.
defined( 'ABSPATH' ) OR die( esc_html__( 'This script cannot be accessed directly.', 'reveal' ) );


$link_url       = codexin_meta( 'reveal_link_url' );
$link_txt       = codexin_meta( 'reveal_link_text' );
$link_rel       = codexin_meta( 'reveal_link_rel' ); 
$link_target    = codexin_meta( 'reveal_link_target' ); 

$text           = ( !empty( $link_txt ) ) ? esc_html( $link_txt ) : esc_html( get_the_title() );
$relation       = ( !empty( $link_rel ) ) ? 'rel="'. esc_attr( $link_rel ) .'"' : '';
$target         = ( $link_target == '_self' ) ? 'target="'. esc_attr( '_self' ) .'"' : 'target="'. esc_attr( '_blank' ) .'"';

if ( ! post_password_required() ) {

    echo '<div class="post-link reveal-color-0">';
        echo '<a href="'. esc_url( $link_url ) .'" '. sprintf( '%s', $relation ) .' '. sprintf( '%s', $target ) .'">';
            echo '<div class="post-format-link reveal-border-1">';
                echo '<span class="icon"></span>';
                echo '<p>'. $text .'</p>';
            echo '</div>';
        echo '</a>';
    echo '</div>';

} // end of password check condition