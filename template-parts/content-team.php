<?php
/**
 * Template part for displaying posts
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package reveal
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(array('clearfix')); ?> itemscope itemtype="http://schema.org/BlogPosting" itemprop="blogPost">
    <div class="blog-post">
        <?php if(has_post_thumbnail()): 

            $image      = wp_prepare_attachment_for_js( get_post_thumbnail_id( $post->ID ) );
            $data_size  = $image['width'] . 'x' . $image['height'];
            $image_alt  = ( !empty( $image['alt'] ) ) ? 'alt="' . esc_attr( $image['alt'] ) . '"' : 'alt="' .get_the_title() . '"';

        endif; ?>



        <div class="col-sm-4 team-single-thumb-wrapper pad-xy">
            <div class="image-wrapper">
                <img src="<?php if(has_post_thumbnail()): echo esc_url( the_post_thumbnail_url( 'full' ) ); else: echo 'placehold.it/480x595'; endif; ?>" alt="<?php echo esc_attr( $image_alt ); ?>" class="img-responsive" />
            </div>
        </div>

        <div class="col-sm-8 team-single-content-wrapper">
            <h2 class="tm-name">John Doe</h2>
            <p class="desig">Senior Web Developer</p>
            <p> <?php the_content(); ?> </p>
            <div class="team-card-wrapper">
                <p class="company-info">Test Web Dev Company</p>
                <p class="company-info">+1227656713432</p>
                <p class="company-info post-detail">email@email.com</p>
                <div class="team-social-info">
                    <ul class="list-inline">
                        <li><i class="fa fa-facebook"></i> </li>
                        <li><i class="fa fa-twitter"></i></li>
                        <li><i class="fa fa-instagram"></i> </li>
                        <li><i class="fa fa-google-plus"></i></li>
                        <li><i class="fa fa-linkedin"></i></li>
                    </ul>
                </div> <!-- end of team-social-info -->
            </div> <!-- end of team-card-wrapper -->
        </div> <!-- end of team-content-wrapper -->
        <div class="clearfix"></div>        



        
    </div><!--blog post-->
</article><!-- #post-## -->
<div class="clearfix"></div>