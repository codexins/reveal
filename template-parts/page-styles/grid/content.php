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
    <div class="blog-wrapper">

        <div class="img-thumb">
            <div class="img-wrapper"><img src="<?php if(has_post_thumbnail()): the_post_thumbnail_url('blog-mini-image'); else: echo '//placehold.it/360X227'; endif; ?>" alt="" class="img-responsive"></div>
            <div class="meta">
                <p>15</p>
                <p>Jan</p>
            </div>
        </div>


        <div class="blog-content">
            <p class="blog-title">
                <?php 
                    $length_switch = reveal_option('reveal_blog_excerpt_lenght');
                    if( $length_switch ) :
                        $reveal_title_len = reveal_option( 'reveal_title_length' );
                        reveal_title( $reveal_title_len );
                    else :
                        the_title();    
                    endif;    
                ?>
            </p>
            <p>
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
                    else :
                        the_excerpt();
                    endif; //End length_switch if()..
                endif; ?>
            </p>

            <?php 
            $reveal_read_more = reveal_option( 'reveal-blog-read-more' );
            if( $reveal_read_more == true ) { ?>
            <a href="<?php the_permalink(); ?>"><?php esc_html_e( 'Read More', 'reveal' ) ?></a>
            <?php
                } 
            ?>
        </div>

        <?php if(has_tag()): ?>

            <footer id="entry_footer">
                <?php the_tags('Tags: &nbsp',' ',''); ?>
            </footer>
         <?php endif; ?>
    </div> <!-- end of blog-wrapper -->
</article><!-- #post-## -->


