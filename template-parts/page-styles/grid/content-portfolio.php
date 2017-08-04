<?php
/**
 * Template part for displaying posts
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package reveal
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<div class="portfolio-item-content">
	    <div class="item-thumbnail">
	        <img src="<?php echo esc_url(the_post_thumbnail_url( 'single-post-image' )); ?>"  alt="">                                          
	        <ul class="portfolio-action-btn">
	            <li>
	                <a class="venobox" href="<?php esc_url(the_permalink()); ?>"><i class="fa fa-gg"></i></a>
	            </li>
	        </ul>                                            
	    </div>
	    <div class="portfolio-description">
	        <h4><a href="<?php esc_url(the_permalink()); ?>"><?php esc_html(the_title()); ?></a></h4>
	        <ul class="portfolio-cat">
				<?php
                    $taxonomy = 'portfolio-category';
                    $taxonomies = get_terms( $taxonomy); 
                    $last_key = end($taxonomies);
                    foreach ( $taxonomies as $tax ) {
                        // echo  $tax->name.', ' ;
                        
                        if($tax == $last_key):
                            echo "<li>".ucwords($tax->name)."</li>";
                        else: 
                        	echo "<li>".ucwords($tax->name).", </li>";
                         
                        endif; 
                }?>
	        </ul>
	    </div>                                    
	</div>
</article>
