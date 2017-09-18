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
    <div class="row blog-post">
        <?php if(has_post_thumbnail()): 

            $image      = wp_prepare_attachment_for_js( get_post_thumbnail_id( $post->ID ) );
            $data_size  = $image['width'] . 'x' . $image['height'];
            $image_alt  = ( !empty( $image['alt'] ) ) ? 'alt="' . esc_attr( $image['alt'] ) . '"' : 'alt="' .get_the_title() . '"';
            $image_cap  = $image['caption']; 

        endif; ?>



        <div class="team-thumb-wrapper">
            <?php the_post_thumbnail('full'); ?>
            <h3>Name: John Doe</h3>
            <p>Designation: Senior Web Developer</p>
            <p>Company: Test Web Dev Company</p>
        </div>


        <div class="team-content-wrapper">
            <?php the_content(); ?>
        </div>
        <div class="clearfix"></div>        
        <div class="team-social-info">
            <ul class="list-inline post-detail">
                <li><i class="fa fa-facebook"></i> </li>
                <li><i class="fa fa-twitter"></i></li>
                <li><i class="fa fa-instagram"></i> </li>
                <li><i class="fa fa-google-plus"></i></li>
                <li><i class="fa fa-linkedin"></i></li>
            </ul>
        </div>


        
    </div><!--blog post-->
</article><!-- #post-## -->
<div class="clearfix"></div>