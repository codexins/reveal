<?php
/**
 * Template part for displaying posts
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package reveal
 */

?>

<?php 

$client_name = rwmb_meta('reveal_portfolio_client', 'type=text');

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
            <li><i class="fa fa-users" aria-hidden="true"></i> <?php echo esc_html( $client_name ); ?></li>
            <li><i class="fa fa-calendar"></i> <?php the_time('F j, Y') ?></li>
            <li><i class="fa fa-tag"></i> 
                <?php
                    $taxonomy = 'portfolio-category';
                    $taxonomies = get_the_terms($post->ID, $taxonomy); 
                    $last_key = end($taxonomies);
                    foreach ( $taxonomies as $tax ) {
                        // echo  $tax->name.', ' ;
                        if($tax == $last_key):
                            echo "<span>".ucwords($tax->name)."</span>";
                        else: 
                            echo "<span>".ucwords($tax->name).", </span>";
                         
                        endif; 
                }?>
            </li>

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