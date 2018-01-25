<?php

/**
 * Template partial to display the post metas depending upon user choice
 *
 * @package 	Reveal
 * @subpackage 	Core
 * @since 		1.0
 */


// Do not allow directly accessing this file.
defined( 'ABSPATH' ) OR die( esc_html__( 'This script cannot be accessed directly.', 'reveal' ) );

// Fetching and assigning data from theme options
$post_style = codexin_get_option( 'cx_blog_style' );
$args_meta  = is_single() ? 'cx_blog_post_single_meta' : 'cx_blog_post_meta';
$post_metas = codexin_get_option( $args_meta );

if( in_array( true, array_values( $post_metas ) ) ) { ?>

    <ul class="list-inline meta-details <?php echo ( ( $post_style == 'list' ) || is_single() ) ? ' reveal-border-1' : ' post-meta' ?>">
        <?php
        if( $post_metas[1] ) {
        ?>
	        <li><i class="fa fa-pencil"></i> <span class="post-author vcard" itemprop="author" itemscope itemtype="https://schema.org/Person">
	            <a href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ); ?>" itemprop="url" rel="author">
	                <span itemprop="name"><?php echo esc_html( get_the_author() ); ?></span>
	            </a>
	            </span>
	        </li>
        <?php
    	}
		
		if( $post_metas[2] ) {
            if( ( $post_style !== 'grid' ) || is_single() ) {
		?>
                <li><i class="fa fa-calendar"></i> <a href="<?php echo get_day_link( get_post_time( 'Y' ), get_post_time( 'm' ), get_post_time( 'j' ) );  ?>"><time datetime="<?php echo get_the_time('c'); ?>" itemprop="datePublished"><?php echo date( get_option('date_format'), strtotime( get_the_time( 'd M, Y' ) ) ); ?></time></a> </li>
        <?php
            }
        }

		if( $post_metas[3] ) {
		?>
	        <li><i class="fa fa-tag"></i> <span itemprop="genre"><?php the_category( ', ' )?></span></li>
        <?php
        }

        if( $post_metas[4] ) {
        ?>
	        <li><i class="fa fa-comment"></i> <a href="<?php comments_link(); ?>"><?php comments_number( 'No Comments', 'One Comment', '% Comments' )?></a></li>
        <?php
    	}

        if( $post_metas[5] ) {
        ?>
	        <li> <?php if( function_exists( 'codexin_likes_button' ) ){ echo codexin_likes_button( get_the_ID(), 0 ); } ?></li>
        <?php
    	}
    	?>

    </ul>
<?php

} // end of meta conditions check

?>