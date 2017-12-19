<?php

/**
 * Post format rendering template for Gallery Post
 *
 * @package 	Reveal
 * @subpackage 	Core
 * @since 		1.0
 */


// Do not allow directly accessing this file.
defined( 'ABSPATH' ) OR die( esc_html__( 'This script cannot be accessed directly.', 'reveal' ) );

// Fetching and assigning data from theme options and metabox
$post_style = codexin_get_option( 'cx_blog_style' );
$image_size = ( ( $post_style == 'list' ) || is_single() || is_search() ) ? 'size=codexin-framework-rectangle-four' : 'size=codexin-core-rectangle-one';
$gallery 	= codexin_meta( 'reveal_gallery', $image_size );

if ( ! post_password_required() ) {
    
    echo '<div class="gallery-carousel image-pop-up">';

	    foreach( $gallery as $single_image ) {

			// Fetching the attachment properties
			$image_prop  = codexin_attachment_metas( $single_image['ID'] );

	        echo '<figure class="item-img-wrap" itemprop="associatedMedia" itemscope itemtype="http://schema.org/ImageObject">';
	            echo '<a href="'. esc_url( $single_image['full_url'] ) .'" class="post-thumbnail-wrapper" itemprop="contentUrl" data-size="'. esc_attr( $image_prop['size'] ) .'">';
	                echo '<img src="'. esc_url( $single_image['url'] ) .'" class="img-responsive" itemprop="image" '. $image_prop['alt'] .'/>';
                    echo '<div class="item-img-overlay">';
                        echo '<span></span>';
                    echo '</div>';
	            echo '</a> <!-- end of post-thumbnail-wrapper -->';
	            echo '<figcaption itemprop="caption description">'. esc_html( $image_prop['caption'] ) .'</figcaption>';
	        echo '</figure> <!-- end of item-img-wrap -->';

		} // end foreach()

    echo '</div> <!-- end of gallery-carousel -->';

} // end of password check condition