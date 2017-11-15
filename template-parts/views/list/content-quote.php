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
    <div class="post-wrapper reveal-border-1">
        <?php 
        $args_meta = is_single() ? 'reveal_blog_post_single_meta' : 'reveal_blog_post_meta';
        $post_metas = codexin_get_option($args_meta);
        if ( ! post_password_required() ):
            $cx_quote = rwmb_meta( 'reveal_quote_text', 'type=textarea' );
            $cx_name = rwmb_meta( 'reveal_quote_name', 'type=text' );
            $cx_source = rwmb_meta( 'reveal_quote_source', 'type=url' );

            if( !empty( $cx_quote ) ): ?>
                <div class="post-quote reveal-color-0 reveal-border-1">
                    <span class="icon"></span>
                    <blockquote>
                        <?php printf( '%s', $cx_quote ); ?>

                    <?php if( !empty( $cx_source ) ): ?>
                    <a href="<?php echo esc_url( $cx_source ); ?>">
                    <?php endif; ?>
                        <?php if( !empty( $cx_name ) ): ?>
                        <span><?php echo ' - ' . esc_html( $cx_name ); ?></span>
                        <?php endif; ?>
                    <?php if( !empty( $cx_source ) ): ?>
                    </a>
                    <?php endif; ?>
                    </blockquote>
                </div>
            <?php endif; ?>

        <?php endif; ?>

        <?php if(in_array(true, array_values($post_metas))): ?>
            <ul class="list-inline post-detail reveal-color-0 reveal-border-1">
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

        <h2 class="post-title reveal-color-1" itemprop="headline">
            <a href="<?php the_permalink(); ?>" rel="bookmark" itemprop="url">
                <span itemprop="name">
                <?php 
                    $length_switch = codexin_get_option('reveal_blog_title_excerpt_length');
                    if( $length_switch ) :
                        $reveal_title_len = codexin_get_option( 'reveal_title_length' );
                        reveal_title( $reveal_title_len );
                    else:
                        the_title();
                    endif;
                ?>
                </span>
            </a>
        </h2>
        
        <?php else: ?>

        <h2 class="post-title reveal-color-1" itemprop="headline"><span itemprop="name"><?php the_title(); ?></span></h2>

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
                $length_switch = codexin_get_option('reveal_blog_title_excerpt_length');
                if( $length_switch ) :
                    $reveal_excerpt_len = codexin_get_option( 'reveal_excerpt_length' );
                    reveal_excerpt( $reveal_excerpt_len );
                else:
                    the_excerpt();
                endif; //End if() reveal_excerpt_length


                $reveal_read_more = codexin_get_option( 'reveal-blog-read-more' );
                if( $reveal_read_more == true ): ?>

                <div class="cx-btn reveal-color-0 reveal-primary-btn">
                    <a class="cx-btn-text" href="<?php echo esc_url( get_the_permalink() ); ?>"><?php esc_html_e( 'Read More', 'reveal' ) ?></a>
                </div>

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

            <?php if( codexin_get_option( 'reveal_single_share' ) == true ): ?>
                <div class="share socials reveal-color-0 reveal-primary-btn">            
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