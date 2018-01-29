<?php

/**
 * Template partial for displaying list archive testimonials
 *
 * @package 	Reveal
 * @subpackage 	Core
 * @since 		1.0
 */


// Do not allow directly accessing this file.
defined( 'ABSPATH' ) OR die( esc_html__( 'This script cannot be accessed directly.', 'reveal' ) );

// Fetching and assigning data from theme options and metabox
$name               = codexin_meta( 'codexin_author_name' ); 
$designation        = codexin_meta( 'codexin_author_desig' ); 
$company            = codexin_meta( 'codexin_author_company' ); 

// Fetching the attachment properties
$image_prop         = codexin_attachment_metas_extended( $post->ID, 'testimonial', 'codexin-core-square-one' );

?>


<article id="testimonial-<?php the_ID(); ?>" <?php post_class( array( 'clearfix testimonials-list' ) ); ?>>
    <div class="testimonial-single reveal-border-1 reveal-bg-1">
        <div class="testimonial-list-wrapper">
            <div class="thumb-testimonial-wrapper">
                <div class="thumb-testimonial">
                    <img src="<?php printf( '%s', $image_prop['src'] ); ?>" <?php printf( '%s', $image_prop['alt'] ); ?>" class="reveal-border-0" itemprop="url">
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
