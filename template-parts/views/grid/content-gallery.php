<?php
/**
 * Template part for displaying posts
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Reveal
 */

?>


<article id="post-<?php the_ID(); ?>" <?php post_class(array('clearfix')); ?> itemscope itemtype="http://schema.org/BlogPosting" itemprop="blogPost">
    <div class="blog-wrapper reveal-bg-1">
    <?php 
    $post_metas = reveal_option('reveal_blog_post_meta');
    if ( ! post_password_required() ):

        $cx_gallery = rwmb_meta( 'reveal_gallery', 'type=image_advanced&size=rectangle-one' );
        echo '<div class="gallery-carousel image-pop-up">';
        foreach ($cx_gallery as $cx_image) { 

            $image_data =  wp_get_attachment_metadata( $cx_image['ID'] );
            $data_size  = $image_data['width'] . 'x' . $image_data['height'];
            $caption    = $cx_image['caption'];
            $img_alt    = ( !empty( $cx_image['alt'] ) ) ? 'alt="' .  esc_attr( $cx_image['alt'] ) . '"' : ''; 

            ?>

            <figure class="item-img-wrap" itemprop="associatedMedia" itemscope itemtype="http://schema.org/ImageObject">
                <a href="<?php echo esc_url( $cx_image['full_url'] ); ?>" itemprop="contentUrl" data-size="<?php echo esc_attr( $data_size ); ?>">
                    <img src="<?php echo esc_url( $cx_image['url'] ); ?>" itemprop="image" <?php printf( '%s', $img_alt ); ?> class="img-responsive" />
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

        <div class="blog-content reveal-border-1">
            <h3 class="blog-title grid"  itemprop="headline">
                <a href="<?php the_permalink();?>" rel="bookmark" itemprop="url">
                <?php 
                    $length_switch = reveal_option('reveal_blog_title_excerpt_length');
                    if( $length_switch ) :
                        $reveal_title_len = reveal_option( 'reveal_title_length' );
                        reveal_title( $reveal_title_len );
                    else :
                        the_title();    
                    endif;
                ?>
                </a>
            </h3>

            <?php if(in_array(true, array_values($post_metas))): ?>
                <ul class="list-inline post-detail post-meta reveal-color-0">
                    <?php if($post_metas[1]): ?>
                         <li><i class="fa fa-pencil"></i> <a href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ); ?>"><?php echo esc_html( get_the_author() ); ?></a></li>
                    <?php endif; ?>
                    <?php if($post_metas[3]): ?>    
                        <li><i class="fa fa-tag"></i> <a href="<?php the_permalink(); ?>"><?php the_category( ', ' )?></a></li>
                    <?php endif; ?>

                    <?php if($post_metas[4]): ?>
                        <li><i class="fa fa-comment"></i><?php  comments_number( 'No Comments', 'One Comment', '% Comments' )?></li>
                    <?php endif; ?>   
                    
                    <?php if($post_metas[5]): ?> 
                        <li><?php if( function_exists( 'codexin_likes_button' ) ): echo codexin_likes_button( get_the_ID(), 0 );endif; ?></li>
                    <?php endif; ?>
                </ul>
            <?php endif; ?>

        
            <div class="wrapper-content">
            <?php 
                if(is_single()):
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

                else:
                    $length_switch = reveal_option('reveal_blog_title_excerpt_length');
                    if( $length_switch ) :
                        $reveal_excerpt_len = reveal_option( 'reveal_excerpt_length' );
                        reveal_excerpt( $reveal_excerpt_len );
                    else :
                        the_excerpt();
                    endif; //End length_switch if()..
                endif; ?>
            </div> <!-- end of wrapper-content -->

            <?php 
            $reveal_read_more = reveal_option( 'reveal-blog-read-more' );
            if( $reveal_read_more == true ) { ?>
            <div class="cx-btn-grid reveal-color-0 reveal-primary-btn">
                <a class="cx-btn-text" href="<?php echo esc_url( get_the_permalink() ); ?>"><?php esc_html_e( 'Read More', 'reveal' ) ?></a>
            </div>
            <?php
                } 
            ?>

        </div><!-- .blog-content -->
        
    </div><!--blog post-->
</article><!-- #post-## -->
