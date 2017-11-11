<?php
/**
 * Template part for displaying posts
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Reveal
 */

?>

<article id="portfolio-<?php the_ID(); ?>" <?php post_class(); ?> itemscope itemtype="http://schema.org/Event">
	<div class="portfolio-item-content">
	    <div class="item-thumbnail">
	        <img src="<?php echo esc_url(the_post_thumbnail_url( 'rectangle-one' )); ?>"  alt="">                                          
	        <ul class="portfolio-action-btn reveal-color-0">
	            <li>
	                <a href="<?php echo esc_url(get_the_permalink()); ?>"><i class="flaticon-link"></i></a>
	            </li>
	        </ul>                                            
	    </div> <!-- end of item-thumbnail -->
	    <div class="portfolio-description">
	        <h4><a href="<?php echo esc_url(get_the_permalink()); ?>"><?php esc_html(the_title()); ?></a></h4>
	        <?php 
			$port_list = get_the_term_list( $post->ID, 'portfolio-category', '<li>', ', </li><li>', '</li>' );
	        if( !empty( $port_list ) ):
	        ?>
				<ul class="portfolio-cat reveal-color-0">
					<?php printf( '%s', $port_list ); ?>
				</ul>
			<?php endif; ?>
	    </div> <!-- end of portfolio-description -->
	</div> <!-- end of portfolio-item-content -->
</article> <!-- #portfolio-## -->
