<?php

/**
 * Post format rendering template for Standard Post
 *
 * @package Reveal
 * @subpackage Core
 */


// Do not allow directly accessing this file.
defined( 'ABSPATH' ) OR die( esc_html__( 'This script cannot be accessed directly.', 'reveal' ) );


$post_style         = codexin_get_option( 'reveal_blog_style' );
$post_metas         = codexin_get_option('reveal_blog_post_meta');
$thumbnail_default  = codexin_get_option( 'reveal_blog_image' );

// Fetching the attachment properties
$attachment_id      = ( has_post_thumbnail() ) ? get_post_thumbnail_id( $post->ID ) : $thumbnail_default['id'];
$image_prop         = codexin_attachment_metas( $attachment_id );
$default_image_full = wp_get_attachment_image_src( $attachment_id, 'full' );
$default_image_list = wp_get_attachment_image_src( $attachment_id, 'reveal-post-single' );
$default_image_grid = wp_get_attachment_image_src( $attachment_id, 'rectangle-one' );
$post_image_full    = ( has_post_thumbnail() ) ? esc_url( get_the_post_thumbnail_url( $post->ID, 'full' ) ) : esc_url( $default_image_full[0] );
$post_image_ls      = ( has_post_thumbnail() ) ? esc_url( get_the_post_thumbnail_url( $post->ID, 'reveal-post-single' ) ) : esc_url( $default_image_list[0] );
$post_image_list    = ( !empty( $post_image_ls ) ) ? $post_image_ls : esc_url( 'placehold.it/800x354' );
$post_image_gr      = ( has_post_thumbnail() ) ? esc_url( get_the_post_thumbnail_url( $post->ID, 'rectangle-one' ) ) : esc_url( $default_image_grid[0] );
$post_image_grid    = ( !empty( $post_image_gr ) ) ? $post_image_gr : esc_url( 'placehold.it/600x400' );


if ( ! post_password_required() ) {

    if( ( $post_style == 'grid' ) && ! is_single() ) {

        echo '<div class="img-thumb">';
            echo '<figure class="img-wrapper" itemscope itemtype="http://schema.org/ImageObject">';
                echo '<a href="'. esc_url( get_the_permalink() ) .'" itemprop="contentUrl">';
                    echo '<img src="'. $post_image_grid .'" '. $image_prop['alt'] .' class="img-responsive" itemprop="image">';
                echo '</a>';
                echo '<figcaption itemprop="caption description">'. esc_html( $image_prop['caption'] ) .'</figcaption>';
            echo '</figure> <!-- end of img-wrapper -->';

            if( $post_metas[2] ) {
                echo '<div class="meta reveal-color-2">';
                    echo '<a href="'. get_day_link( get_post_time( 'Y' ), get_post_time( 'm' ), get_post_time( 'j' ) ) .'" class="entry-date">';
                        echo '<time datetime="'. get_the_time('c') .'" itemprop="datePublished">';
                            echo '<p>'. get_the_time( 'd' ) .'</p>';
                            echo '<p>'. get_the_time( 'M' ) .'</p>';
                        echo '</time>';
                    echo '</a>';
                echo '</div>';
            }
        echo '</div> <!-- end of img-thumb -->';

    } else {

        echo ( is_single() ) ? '<div class="image-pop-up item-img-wrap" itemscope itemtype="http://schema.org/ImageGallery">' : '<a href="'. esc_url( get_the_permalink() ) .'" class="post-thumbnail-wrapper">';
            printf( '<figure %s itemscope itemtype="http://schema.org/ImageObject">', ( is_single() ) ? esc_attr( 'itemprop=associatedMedia' ) : esc_attr( 'class=item-img-wrap' ) );
                echo ( is_single() ) ? '<a href="'. $post_image_full .'" itemprop="contentUrl" data-size="'. esc_attr( $image_prop['size'] ) .'">' : '';
                    echo '<img src="'. $post_image_list .'" class="img-responsive" itemprop="image" '. $image_prop['alt'] .'/>';
                    echo '<div class="item-img-overlay">';
                        echo '<span></span>';
                    echo '</div>';
                echo ( is_single() ) ? '</a>' : '';
                echo '<figcaption itemprop="caption description">'. esc_html( $image_prop['caption'] ) .'</figcaption>';
            echo '</figure> <!-- end of item-img-wrap -->';
        echo ( is_single() ) ? '</div> <!-- end of image-pop-up -->' : '</a> <!-- end of post-thumbnail-wrapper -->';
    } // end of post_style conditional check

} // end of password check condition