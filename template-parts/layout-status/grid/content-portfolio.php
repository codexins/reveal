<?php
/**
 * Template part for displaying posts
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package reveal
 */

?>

<article id="portfolio-<?php the_ID(); ?>" <?php post_class(); ?>>
	<div class="portfolio-item-content">
	    <div class="item-thumbnail">
	        <img src="<?php echo esc_url(the_post_thumbnail_url( 'rectangle-one' )); ?>"  alt="">                                          
	        <ul class="portfolio-action-btn">
	            <li>
	                <a href="<?php echo esc_url(get_the_permalink()); ?>"><i class="flaticon-link"></i></a>
	            </li>
	        </ul>                                            
	    </div> <!-- end of item-thumbnail -->
	    <div class="portfolio-description">
	        <h4><a href="<?php echo esc_url(get_the_permalink()); ?>"><?php esc_html(the_title()); ?></a></h4>
	        <ul class="portfolio-cat">
				<?php
          $taxonomy = 'portfolio-category';
          $taxonomies = get_terms( $taxonomy); 
          $last_key = end($taxonomies);
          foreach ( $taxonomies as $tax ) {                        
              if($tax == $last_key):
                  echo "<li>".ucwords($tax->name)."</li>";
              else: 
              	echo "<li>".ucwords($tax->name).", </li>";
               
              endif; 
          }?>
	        </ul>
	    </div> <!-- end of portfolio-description -->
	</div> <!-- end of portfolio-item-content -->
</article> <!-- #portfolio-## -->
