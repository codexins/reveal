<?php

/**
 * Post format rendering template for Standard Post
 *
 * @package 	Reveal
 * @subpackage 	Core
 * @since 		1.0
 */


// Do not allow directly accessing this file.
defined( 'ABSPATH' ) OR die( esc_html__( 'This script cannot be accessed directly.', 'reveal' ) );

// Fetching and assigning data from theme options
$post_style         = codexin_get_option( 'cx_blog_style' );
$post_metas         = codexin_get_option( 'cx_blog_post_meta' );

// Fetching the attachment properties
$image_prop         = codexin_attachment_metas_extended( $post->ID, 'blog', 'reveal-post-single' );
$image_prop_full    = codexin_attachment_metas_extended( $post->ID, 'blog', 'full' );


if ( ! post_password_required() ) {

    if( ( $post_style == 'grid' ) && ! is_single() && ! is_search() ) {

        echo '<div class="img-thumb">';
            echo '<figure class="img-wrapper" itemscope itemtype="http://schema.org/ImageObject">';
                echo '<a href="'. esc_url( get_the_permalink() ) .'" itemprop="contentUrl">';
                    echo '<img src="'. $image_prop['src'] .'" '. $image_prop['alt'] .' class="img-responsive" itemprop="image">';
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
                echo ( is_single() ) ? '<a href="'. $image_prop_full['src'] .'" itemprop="contentUrl" data-size="'. esc_attr( $image_prop['size'] ) .'">' : '';
                    echo '<img src="'. $image_prop['src'] .'" class="img-responsive" itemprop="image" '. $image_prop['alt'] .'/>';
                    echo '<div class="item-img-overlay">';
                        echo '<span></span>';
                    echo '</div>';
                echo ( is_single() ) ? '</a>' : '';
                echo '<figcaption itemprop="caption description">'. esc_html( $image_prop['caption'] ) .'</figcaption>';
            echo '</figure> <!-- end of item-img-wrap -->';
        echo ( is_single() ) ? '</div> <!-- end of image-pop-up -->' : '</a> <!-- end of post-thumbnail-wrapper -->';
    } // end of post_style conditional check

} // end of password check condition