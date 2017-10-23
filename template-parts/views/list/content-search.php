<?php
/**
 * Template part for displaying results in search pages
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package reveal
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(array('clearfix')); ?> itemscope itemtype="http://schema.org/BlogPosting" itemprop="blogPost">
    <div class="post-wrapper">
        <?php if(has_post_thumbnail()): 

            $image      = wp_prepare_attachment_for_js( get_post_thumbnail_id( $post->ID ) );
            $data_size  = $image['width'] . 'x' . $image['height'];
            $image_alt  = ( !empty( $image['alt'] ) ) ? 'alt="' . esc_attr( $image['alt'] ) . '"' : 'alt="' .get_the_title() . '"';
            $image_cap  = $image['caption'];

            if( ! is_single() ):
            ?>        

            <a href="<?php the_permalink(); ?>">
                <figure class="item-img-wrap" itemscope itemtype="http://schema.org/ImageObject">
                    <img src="<?php the_post_thumbnail_url('reveal-post-single') ?>" class="img-responsive" <?php printf( '%s', $image_alt ); ?> itemprop="image">
                    <div class="item-img-overlay">
                        <span></span>
                    </div>
                </figure>                       
            </a>

            <?php else: ?>

            <div class="image-pop-up item-img-wrap" itemscope itemtype="http://schema.org/ImageGallery">
                <figure itemprop="associatedMedia" itemscope itemtype="http://schema.org/ImageObject">
                    <a href="<?php esc_url( the_post_thumbnail_url('full') ); ?>" itemprop="contentUrl" data-size="<?php echo esc_attr( $data_size ); ?>">
                        <img src="<?php esc_url( the_post_thumbnail_url('reveal-post-single') ); ?>" itemprop="image" <?php printf( '%s', $image_alt ); ?> class="img-responsive" />
                        <div class="item-img-overlay">
                            <span></span>
                        </div>
                    </a>
                    <figcaption itemprop="caption description"><?php echo esc_html( $image_cap ); ?></figcaption>
                </figure>
            </div><!-- end of image-pop-up -->

            <?php endif; ?>      
        <?php endif; ?>

        <ul class="list-inline post-detail">
            <li><i class="fa fa-pencil"></i> <span class="post-author vcard" itemprop="author" itemscope itemtype="https://schema.org/Person">
                <a href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ); ?>" itemprop="url" rel="author">
                    <span itemprop="name"><?php echo esc_html( get_the_author() ); ?></span>
                </a>
                </span>
            </li>
            <li><i class="fa fa-calendar"></i> <time datetime="<?php echo get_the_time('c'); ?>" itemprop="datePublished"><?php the_time('F j, Y') ?></time></li>
            <li><i class="fa fa-tag"></i> <span itemprop="genre"><?php the_category( ', ' )?></span></li>
            <li><i class="fa fa-comment"></i><?php comments_number( 'No Comments', 'One Comment', '% Comments' )?></li>
            <li><?php if( function_exists( 'codexin_likes_button' ) ): echo codexin_likes_button( get_the_ID(), 0 ); endif; ?></li>
        </ul>

        <?php if( ! is_single() ): ?>

        <h2 class="post-title" itemprop="headline">
            <a href="<?php the_permalink(); ?>" rel="bookmark" itemprop="url">
                <span itemprop="name">
                <?php 
                    $length_switch = reveal_option('reveal_blog_excerpt_lenght');
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
                $length_switch = reveal_option('reveal_blog_excerpt_lenght');
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