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
        <?php if(has_post_thumbnail()): ?>
                <div class="item-img-wrap">
                    <img src="<?php the_post_thumbnail_url('featured-single-image') ?>" class="img-responsive" alt="Blog Post">
                    <a href="<?php the_post_thumbnail_url('full') ?>" class="img-pop-up">
                    <div class="item-img-overlay">
                        <span></span>
                    </div>
                    </a>
                </div>                       
         <?php endif; ?>      
        <ul class="list-inline post-detail">
            <li><i class="fa fa-pencil"></i> <a href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ); ?>"><?php echo esc_html( get_the_author() ); ?></a></li>
            <li><i class="fa fa-calendar"></i> <?php the_time('F j, Y') ?></li>
            <li><i class="fa fa-tag"></i> <a href="<?php the_permalink(); ?>"><?php the_category( ', ' )?></a></li>
            <li><i class="fa fa-comment"></i><?php comments_number( 'No Comments', 'One Comment', '% Comments' )?></li>
            <li><?php echo get_simple_likes_button( get_the_ID(), 0 ); ?></li>
        </ul>
        <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
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
                    $reveal_excerpt_len = reveal_option( 'reveal_excerpt_length' );
					reveal_excerpt( $reveal_excerpt_len );
				endif; ?>

		</div><!-- .entry-content -->

        <footer id="entry_footer">
        <?php if(has_tag()): ?>
			<div class="tagcloud"><?php the_tags('Tags: &nbsp',' ',''); ?></div>
        <?php endif; ?>

        <?php if( reveal_option( 'reveal_single_share' ) == true ): ?>
            <div class="share socials">            
                <div class="caption"><span class="flaticon-technology"></span> <?php esc_html_e('Share :', 'reveal'); ?></div>    
                <a target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=<?php the_permalink();?>"><i class="fa fa-facebook"></i></a>
                <a target="_blank" href="https://twitter.com/home?status=<?php the_permalink(); ?>"><i class="fa fa-twitter"></i></a>
                <a target="_blank" href="https://plus.google.com/share?url=<?php the_permalink(); ?>"><i class="fa fa-google-plus"></i></a>
                <a target="_blank" href="https://www.linkedin.com/shareArticle?mini=true&url=<?php the_permalink(); ?>"><i class="fa fa-linkedin"></i></a>        
            </div>
        <?php endif ?>

        </footer>
        
    </div><!--blog post-->
</article><!-- #post-## -->
<div class="clearfix"></div>