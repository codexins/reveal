<?php
/**
 * Template part for displaying posts
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package reveal
 */

?>


<article id="post-<?php the_ID(); ?>" <?php post_class(array('clearfix')); ?>>
    <div class="blog-post">
    <?php 
    if ( ! post_password_required() ):

        $cx_gallery = rwmb_meta( 'reveal_gallery', 'type=image_advanced&size=gallery-format-image' );
        echo '<div class="gallery-carousel image-pop-up">';
        foreach ($cx_gallery as $cx_image) { 

            $image_data =  wp_get_attachment_metadata( $cx_image['ID'] );
            $data_size  = $image_data['width'] . 'x' . $image_data['height'];
            $caption    = $cx_image['caption'];
            $img_alt    = ( !empty( $cx_image['alt'] ) ) ? 'alt="' .  esc_attr( $cx_image['alt'] ) . '"' : ''; 

            ?>

            <figure class="item-img-wrap" itemprop="associatedMedia" itemscope itemtype="http://schema.org/ImageObject">
                <a href="<?php echo esc_url( $cx_image['full_url'] ); ?>" itemprop="contentUrl" data-size="<?php echo esc_attr( $data_size ); ?>">
                    <img src="<?php echo esc_url( $cx_image['url'] ); ?>" itemprop="thumbnail" <?php echo esc_html( $img_alt ); ?> class="img-responsive" />
                    <div class="item-img-overlay">
                        <span></span>
                    </div>
                </a>
                <figcaption itemprop="caption description"><?php echo esc_html( $caption ); ?></figcaption>
            </figure>

    <?php    }
        echo '</div><!-- end of gallery-carousel -->';

    endif;

     ?>    
        <ul class="list-inline post-detail">
            <li><i class="fa fa-pencil"></i> <a href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ); ?>"><?php echo esc_html( get_the_author() ); ?></a></li>
            <li><i class="fa fa-calendar"></i> <?php the_time('F j, Y') ?></li>
            <li><i class="fa fa-tag"></i> <?php the_category( ', ' )?></li>
            <li><i class="fa fa-comment"></i><?php comments_number( 'No Comments', 'One Comment', '% Comments' )?></li>
            <li><?php if( function_exists( 'codexin_likes_button' ) ): echo codexin_likes_button( get_the_ID(), 0 );endif; ?></li>
        </ul>
        <h2 class="post-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
		<div class="entry-content">
			<?php 
               the_content();

                $args = array(
                    'before'      => '<div class="page-links"><span class="page-links-title">' . esc_html__( 'Pages:', 'reveal' ) . '</span>',
                    'after'       => '</div>',
                    'link_before' => '<span>',
                    'link_after'  => '</span>',
                    'pagelink'    => '<span class="screen-reader-text">' . esc_html__( 'Page', 'reveal' ) . ' </span>%',
                    'separator'   => '<span class="screen-reader-text">, </span>',
                );                 
                wp_link_pages( $args );
           ?>

		</div><!-- .entry-content -->

        <footer id="entry_footer">
        <?php if(has_tag()): ?>
			<div class="tagcloud"><?php the_tags('Tags: &nbsp;',' ',''); ?></div>
        <?php endif; ?>

        <?php if( reveal_option( 'reveal_single_share' ) == true ): ?>
            <div class="share socials">            
                <div class="caption"><span class="flaticon-technology"></span> <?php esc_html_e('Share :', 'reveal'); ?></div>    
                <a target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=<?php esc_url(the_permalink());?>"><i class="fa fa-facebook"></i></a>
                <a target="_blank" href="https://twitter.com/home?status=<?php esc_url(the_permalink()); ?>"><i class="fa fa-twitter"></i></a>
                <a target="_blank" href="https://plus.google.com/share?url=<?php esc_url(the_permalink()); ?>"><i class="fa fa-google-plus"></i></a>
                <a target="_blank" href="https://www.linkedin.com/shareArticle?mini=true&url=<?php esc_url(the_permalink()); ?>"><i class="fa fa-linkedin"></i></a>        
            </div>
        <?php endif ?>

        </footer>
        
    </div><!--blog post-->
</article><!-- #post-## -->
<div class="clearfix"></div>