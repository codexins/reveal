			
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
            <a href="<?php the_permalink(); ?>">
                <div class="item-img-wrap">
                    <img src="<?php the_post_thumbnail_url('blog-single-image') ?>" class="img-responsive" alt="Blog Post">
                    <div class="item-img-overlay">
                        <span></span>
                    </div>
                </div>                       
            </a><!--work link-->
         <?php endif; ?>      
        <ul class="list-inline post-detail">
            <li>by <a href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ); ?>"><?php echo esc_html( get_the_author() ); ?></a></li>
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

				else:
                    the_excerpt();
				endif; ?>

            <p class="blog-content"><a class="cx-btn" href="<?php the_permalink(); ?>"><?php esc_html_e( 'Read More', 'reveal' ) ?></a></p>

		</div><!-- .entry-content -->
        
    </div><!--blog post-->
</article><!-- #post-## -->
<div class="clearfix"></div>