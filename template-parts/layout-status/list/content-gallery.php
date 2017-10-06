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
    <div class="post-wrapper">
    <?php 
    $args_meta = is_single() ? 'reveal_blog_post_single_meta' : 'reveal_blog_post_meta';
    $post_metas = reveal_option($args_meta);
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
        <?php if(in_array(true, array_values($post_metas))): ?>
            <ul class="list-inline post-detail">
                <?php if($post_metas[1]): ?>
                <li><i class="fa fa-pencil"></i> <span class="post-author vcard" itemprop="author" itemscope itemtype="https://schema.org/Person">
                    <a href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ); ?>" itemprop="url" rel="author">
                        <span itemprop="name"><?php echo esc_html( get_the_author() ); ?></span>
                    </a>
                    </span>
                </li>
                <?php endif; ?>

                <?php if($post_metas[2]): ?>
                <li><i class="fa fa-calendar"></i> <time datetime="<?php echo get_the_time('c'); ?>" itemprop="datePublished"><?php the_time('F j, Y') ?></time></li>
                <?php endif; ?>
                <?php if($post_metas[3]): ?>
                <li><i class="fa fa-tag"></i> <span itemprop="genre"><?php the_category( ', ' )?></span></li>
                <?php endif; ?>

                <?php if($post_metas[4]): ?>
                <li><i class="fa fa-comment"></i><?php comments_number( 'No Comments', 'One Comment', '% Comments' )?></li>
                <?php endif; ?>

                <?php if($post_metas[5]): ?>
                <li><?php if( function_exists( 'codexin_likes_button' ) ): echo codexin_likes_button( get_the_ID(), 0 ); endif; ?></li>
                <?php endif; ?>

            </ul>
        <?php endif; ?>
        <?php if( ! is_single() ): ?>

        <h2 class="post-title" itemprop="headline">
            <a href="<?php the_permalink(); ?>" rel="bookmark" itemprop="url">
                <span itemprop="name">
                <?php 
                    $length_switch = reveal_option('reveal_blog_title_excerpt_length');
                    if( $length_switch ) :
                        $reveal_title_len = reveal_option( 'reveal_title_length' );
                        reveal_title( $reveal_title_len );
                    else:
                        the_title();
                    endif;
                ?>
                </span>
            </a>
        </h2>
        
        <?php else: ?>

        <h2 class="post-title" itemprop="headline"><span itemprop="name"><?php the_title(); ?></span></h2>

        <?php endif; ?>

        
        <?php 
            if(is_single()):
                echo '<div class="entry-content" itemprop="articleBody">';
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
                echo '<div class="entry-content" itemprop="text">';
                $length_switch = reveal_option('reveal_blog_title_excerpt_length');
                if( $length_switch ) :
                    $reveal_excerpt_len = reveal_option( 'reveal_excerpt_length' );
                    reveal_excerpt( $reveal_excerpt_len );
                else:
                    the_excerpt();
                endif; //End if() reveal_excerpt_length


                $reveal_read_more = reveal_option( 'reveal-blog-read-more' );
                if( $reveal_read_more == true ): ?>

                <p class="blog-more"><a class="cx-btn" href="<?php the_permalink(); ?>"><?php esc_html_e( 'Read More', 'reveal' ) ?></a></p>

            <?php
                endif;
            endif;  
            ?>


        </div><!-- .entry-content -->

        <?php if( is_single() ): ?>

            <footer id="entry_footer">
            <?php if(has_tag()): ?>
                <div class="tagcloud"><?php the_tags('Tags: &nbsp;',' ',''); ?></div>
            <?php endif; ?>

            <?php if( reveal_option( 'reveal_single_share' ) == true ): ?>
                <div class="share socials">            
                    <div class="caption"><span class="flaticon-share-1"></span> <?php esc_html_e('Share :', 'reveal'); ?></div>    
                    <a target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=<?php esc_url(the_permalink());?>"><i class="fa fa-facebook"></i></a>
                    <a target="_blank" href="https://twitter.com/home?status=<?php esc_url(the_permalink()); ?>"><i class="fa fa-twitter"></i></a>
                    <a target="_blank" href="https://plus.google.com/share?url=<?php esc_url(the_permalink()); ?>"><i class="fa fa-google-plus"></i></a>
                    <a target="_blank" href="https://www.linkedin.com/shareArticle?mini=true&url=<?php esc_url(the_permalink()); ?>"><i class="fa fa-linkedin"></i></a>        
                </div>
            <?php endif ?>

            </footer><!-- end of entry_footer -->

        <?php endif; ?>
        
    </div><!--blog post-->
</article><!-- #post-## -->
<div class="clearfix"></div>