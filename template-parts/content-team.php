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
            $image_cap  = $image['caption']; 

        endif; ?>



        <div class="team-thumb-wrapper">
            <div class="image-wrapper">
                <?php the_post_thumbnail('full'); ?>
            </div>
            <div class="card-wrapper">
                <h3>John Doe</h3>
                <p class="desig">Senior Web Developer</p>
                <p class="company-info">Test Web Dev Company</p>
                <p class="company-info">+1227656713432</p>
                <p class="company-info">email@email.com</p>
                <div class="team-social-info">
                    <ul class="list-inline post-detail">
                        <li><i class="fa fa-facebook"></i> </li>
                        <li><i class="fa fa-twitter"></i></li>
                        <li><i class="fa fa-instagram"></i> </li>
                        <li><i class="fa fa-google-plus"></i></li>
                        <li><i class="fa fa-linkedin"></i></li>
                    </ul>
                </div>
            </div>
        </div>


        <div class="team-content-wrapper">
            <?php the_content(); ?>
        </div>
        <div class="clearfix"></div>        



        
    </div><!--blog post-->
</article><!-- #post-## -->
<div class="clearfix"></div>