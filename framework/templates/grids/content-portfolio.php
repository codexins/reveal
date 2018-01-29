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

// Fetching and assigning data
$portfolio_list  = get_the_term_list( $post->ID, 'portfolio-category', '<li>', ', </li><li>', '</li>' );

// Fetching the attachment properties
$image_prop      = codexin_attachment_metas_extended( $post->ID, 'portfolio', 'codexin-core-rectangle-one' );

?>

<article id="portfolio-<?php the_ID(); ?>" <?php post_class(); ?>>
	    <div class="item-thumbnail">
	        <img src="<?php printf( '%s', $image_prop['src'] ); ?>"  <?php printf( '%s', $image_prop['alt'] ); ?> itemprop="image">
	        <ul>
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
</article> <!-- end of #portfolio-## -->
