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
            $cx_embed = rwmb_meta( 'reveal_video', 'type=oembed' );
            echo '<div class="embed">';
                echo sprintf( '%s', $cx_embed );
            echo '</div>';
        endif; ?>       
        <ul class="list-inline post-detail">
            <li><i class="fa fa-pencil"></i> <a href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ); ?>"><?php echo esc_html( get_the_author() ); ?></a></li>
            <li><i class="fa fa-calendar"></i> <?php the_time('F j, Y') ?></li>
            <li><i class="fa fa-tag"></i> <?php the_category( ', ' )?></li>
            <li><i class="fa fa-comment"></i><?php comments_number( 'No Comments', 'One Comment', '% Comments' )?></li>
            <li><?php if( function_exists( 'codexin_likes_button' ) ): echo codexin_likes_button( get_the_ID(), 0 );endif; ?></li>
        </ul>

        <?php if( ! is_single() ): ?>

        <h2 class="post-title">
            <a href="<?php the_permalink(); ?>">
            <?php 
                $length_switch = reveal_option('reveal_blog_excerpt_lenght');
                if( $length_switch ) :
                    $reveal_title_len = reveal_option( 'reveal_title_length' );
                    reveal_title( $reveal_title_len );
                else:
                    the_title();
                endif;
            ?>
            </a>
        </h2>
        
        <?php else: ?>

        <h2 class="post-title"><?php the_title(); ?></h2>

        <?php endif; ?>

        <div class="entry-content">
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
                    <div class="caption"><span class="flaticon-technology"></span> <?php esc_html_e('Share :', 'reveal'); ?></div>    
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