<?php

/**
 * Template partial for displaying grid archive portfolios
 *
 * @package 	Reveal
 * @subpackage 	Core
 * @since 		1.0
 */


// Do not allow directly accessing this file.
defined( 'ABSPATH' ) OR die( esc_html__( 'This script cannot be accessed directly.', 'reveal' ) );

// Fetching and assigning data from theme options
$portfolio_list       = get_the_term_list( $post->ID, 'portfolio-category', '<li>', ', </li><li>', '</li>' );
$thumbnail_default    = codexin_get_option( 'reveal_portfolio_image' );

// Fetching the attachment properties
$attachment_id        = ( has_post_thumbnail() ) ? get_post_thumbnail_id( $post->ID ) : $thumbnail_default['id'];
$image_prop           = codexin_attachment_metas( $attachment_id );
$default_image        = wp_get_attachment_image_src( $attachment_id, 'rectangle-one' );
$portfolio_image      = ( has_post_thumbnail() ) ? esc_url( get_the_post_thumbnail_url( $post->ID, 'rectangle-one' ) ) : esc_url( $default_image[0] );
$portfolio_image_grid = ( !empty( $portfolio_image ) ) ? $portfolio_image : esc_url( 'placehold.it/600x400' );

?>

<article id="portfolio-<?php the_ID(); ?>" <?php post_class(); ?>>
	<div class="portfolio-item-content">
	    <div class="item-thumbnail">
	        <img src="<?php printf( '%s', $portfolio_image_grid ); ?>"  <?php printf( '%s', $image_prop['alt'] ); ?> itemprop="image">
	        <ul class="portfolio-action-btn reveal-color-0">
	            <li><a href="<?php echo esc_url(get_the_permalink()); ?>"><i class="flaticon-link"></i></a></li>
	        </ul>                                            
	    </div> <!-- end of item-thumbnail -->

	    <div class="portfolio-description">
	        <h4 itemprop="name">
	        	<a href="<?php echo esc_url( get_the_permalink() ); ?>" itemprop="url">
	        		<?php the_title(); ?>
	        	</a>
	        </h4>
	        <?php 
			if( ! empty( $portfolio_list ) ) { ?>
				<ul class="portfolio-cat reveal-color-0">
					<?php echo wp_kses_post( $portfolio_list ); ?>
				</ul> <!-- end of portfolio-cat -->
			<?php } ?>
	    </div> <!-- end of portfolio-description -->
	</div> <!-- end of portfolio-item-content -->
</article> <!-- end of #portfolio-## -->
