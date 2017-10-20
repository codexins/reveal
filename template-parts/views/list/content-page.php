<?php
/**
 * Template part for displaying posts
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package reveal
 */

?>

<div id="post-<?php the_ID(); ?>" <?php post_class(array('clearfix', 'page-entry-content')); ?>>
		<?php 
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

		 ?>
</div><!-- #post-## -->
