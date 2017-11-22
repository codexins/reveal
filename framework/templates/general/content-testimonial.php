<?php

/**
 * Template partial for displaying list archive testimonials
 *
 * @package Reveal
 * @subpackage Core
 */


// Do not allow directly accessing this file.
defined( 'ABSPATH' ) OR die( esc_html__( 'This script cannot be accessed directly.', 'reveal' ) );

$thumbnail_default  = codexin_get_option( 'reveal_testimonial_image' );
$name               = codexin_meta( 'reveal_author_name' ); 
$designation        = codexin_meta( 'reveal_author_desig' ); 
$company            = codexin_meta( 'reveal_author_company' ); 

// Fetching the attachment properties
$attachment_id      = ( has_post_thumbnail() ) ? get_post_thumbnail_id( $post->ID ) : $thumbnail_default['id'];
$image_prop         = codexin_attachment_metas( $attachment_id );
$default_image      = wp_get_attachment_image_src( $attachment_id, 'square-one' );
$testi_image        = ( has_post_thumbnail() ) ? esc_url( get_the_post_thumbnail_url( $post->ID, 'square-one' ) ) : esc_url( $default_image[0] );
$testimonial_image  = ( !empty( $testi_image ) ) ? $testi_image : esc_url( 'placehold.it/220x220' );

?>


<article id="testimonial-<?php the_ID(); ?>" <?php post_class( array( 'clearfix testimonials-list' ) ); ?>>
    <div class="testimonial-single reveal-border-1 reveal-bg-1">
        <div class="testimonial-list-wrapper">
            <div class="thumb-testimonial-wrapper">
                <div class="thumb-testimonial">
                    <img src="<?php printf( '%s', $testimonial_image ); ?>" <?php printf( '%s', $image_prop['alt'] ); ?>" class="reveal-border-0" itemprop="url">
                </div>
            </div> <!-- end of thumb-testimonial-wrapper -->

            <div class="testimonial-content">
                <h3 class="testimonial-title reveal-color-1">
                    <span itemprop="name"><?php echo ( ! empty( $name ) ) ? esc_html( $name ) : esc_html( get_the_title() ); ?></span>
                    <div class="testimonial-meta">
                        <?php if( ! empty( $designation ) ) { ?>
                            <span><?php echo esc_html( $designation ); ?></span>
                        <?php } ?>
                        <?php if( ! empty( $company ) ) { ?>
                            <span> - <?php printf( '%s', $company ); ?></span>
                        <?php } ?>
                    </div> <!-- end of testimonial-meta -->
                </h3> <!-- end of testimonial-title -->
                <div class="testimonial-text">
                    <?php the_content(); ?>
                </div> <!-- end of testimonial-text -->
            </div> <!-- end of testimonial-content -->
        </div> <!-- end of testimonial-list-wrapper -->        
    </div><!-- end of testimonial-single -->
</article><!-- end of #testimonial-## -->
