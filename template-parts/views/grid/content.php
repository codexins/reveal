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
    <div class="blog-wrapper reveal-bg-1">
        <?php $post_metas = reveal_option('reveal_blog_post_meta');?>
        <div class="img-thumb">
            <div class="img-wrapper"><a href="<?php echo esc_url( get_the_permalink() ); ?>"><img src="<?php if(has_post_thumbnail()): the_post_thumbnail_url('rectangle-one'); else: echo '//placehold.it/600X400'; endif; ?>" alt="" class="img-responsive"></a></div>

            <?php if($post_metas[2]): ?>
                <div class="meta reveal-color-2">
                    <a href="<?php echo get_day_link(get_post_time('Y'), get_post_time('m'), get_post_time('j'));  ?>" class="entry-date">
                        <p><?php echo get_the_time( 'd' ); ?></p>
                        <p><?php echo get_the_time( 'M' ); ?></p>
                    </a>
                </div>
            <?php endif; ?>
        </div>


        <div class="blog-content reveal-border-1">
            <h3 class="blog-title grid" itemprop="headline"><a href="<?php echo esc_url( get_the_permalink() ); ?>" rel="bookmark" itemprop="url">
                <?php 
                    $length_switch = reveal_option('reveal_blog_title_excerpt_length');
                    if( $length_switch ) :
                        $reveal_title_len = reveal_option( 'reveal_title_length' );
                        reveal_title( $reveal_title_len );
                    else :
                        the_title();    
                    endif;
                ?>
            </a></h3>

            
            <?php if(in_array(true, array_values($post_metas))): ?>
                <ul class="list-inline post-detail post-meta reveal-color-0">
                    <?php if($post_metas[1]): ?>
                         <li><i class="fa fa-pencil"></i> <a href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ); ?>"><?php echo esc_html( get_the_author() ); ?></a></li>
                    <?php endif; ?>
                    <?php if($post_metas[3]): ?>    
                        <li><i class="fa fa-tag"></i> <?php the_category( ', ' )?></li>
                    <?php endif; ?>

                    <?php if($post_metas[4]): ?>
                        <li><i class="fa fa-comment"></i><?php  comments_number( 'No Comments', 'One Comment', '% Comments' )?></li>
                    <?php endif; ?>   
                    
                    <?php if($post_metas[5]): ?> 
                        <li><?php if( function_exists( 'codexin_likes_button' ) ): echo codexin_likes_button( get_the_ID(), 0 );endif; ?></li>
                    <?php endif; ?>
                </ul> <!-- end of post-detail -->
            <?php endif; ?>
            <div class="wrapper-content" itemprop="text">
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
            </div>

            <?php 
            $reveal_read_more = reveal_option( 'reveal-blog-read-more' );
            if( $reveal_read_more == true ) { ?>
            <div class="cx-btn-grid reveal-color-0 reveal-primary-btn">
                <a class="cx-btn-text" href="<?php echo esc_url( get_the_permalink() ); ?>"><?php esc_html_e( 'Read More', 'reveal' ) ?></a>
            </div>
            <?php
                } 
            ?>
        </div> <!-- end of blog-content -->

    </div> <!-- end of blog-wrapper -->
</article><!-- #post-## -->


