<?php
/**
 * Template part for displaying posts
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package reveal
 */

?>

<?php 

// Retrieving Image alt tag
if( function_exists( 'retrieve_alt_tag' ) ):
    $img_alt = ( !empty( retrieve_alt_tag() ) ) ? retrieve_alt_tag() : get_the_title();
endif;

$t_name = rwmb_meta( 'reveal_author_name', 'type=text' ); 
$t_desig = rwmb_meta( 'reveal_author_desig', 'type=text' ); 
$t_company = rwmb_meta( 'reveal_author_company', 'type=text' ); 

?>
<article id="testimonial-<?php the_ID(); ?>" <?php post_class(array('clearfix testimonials-list')); ?>>
    <div class="testimonial-single">
        <div class="testimonial-list-wrapper">
                <div class="thumb-testimonial-wrapper">
                    <div class="thumb-testimonial">
                        <img src="<?php if(has_post_thumbnail()): echo esc_url( the_post_thumbnail_url( 'square-one' ) ); else: echo '//placehold.it/220X220'; endif; ?>" alt="<?php echo esc_attr( $img_alt ); ?>">
                    </div>
                </div>

            <div class="testimonial-content">
                <h3 class="testimonial-title"><?php echo esc_html( $t_name ); ?>
                    <div class="testimonial-meta">
                        <?php if( !empty( $t_desig ) ): ?>
                        <span><?php echo esc_html( $t_desig ); ?>, </span>
                        <?php endif; ?>
                        <?php if( !empty( $t_company ) ): ?>
                        <span><?php echo esc_html( $t_company ); ?></span>
                        <?php endif; ?>
                    </div>
                </h3>
                <div class="testimonial-text"> <?php printf('%s', get_the_excerpt() ); ?> </div>

            </div>
        </div>
        
    </div><!--testimonial-single-->
</article><!-- #testimonial-## -->
