<?php
/**
 * Template part for displaying results in search pages
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package reveal
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
		<?php the_title( sprintf( '<h2 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' ); ?>

		<?php if ( 'post' === get_post_type() ) : ?>
			<?php the_post_thumbnail(); ?>
			<div class="post-meta">	
				<div class="post-cats"><?php the_category( '' )?></div>
				<div class="post-author"><?php the_author() ?></div>
				<div class="post-time">Posted on <?php the_time('l, F j, Y') ?></div>
				<div class="post-comments"><?php comments_number( 'No Comments', 'One Comment', '% Comments' )?></div>
			</div>

		<?php endif; ?>
	</header><!-- .entry-header -->

	<div class="entry-summary">
		<?php the_excerpt(); ?>
	</div><!-- .entry-summary -->
</article><!-- #post-## -->
