<?php
/**
 * Template Name: Page - No Sidebar 
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Reveal
 */

get_header(); ?>

	<div id="content" class="main-content-wrapper">
		<div class="container">
			<div class="row">
				<div class="col-xs-12">

					<div id="primary" class="site-main inside-page">
						<?php
						if ( have_posts() ) :
							
							while ( have_posts() ) : the_post();
								get_template_part( CODEXIN_TEMPLATE_PARTIALS . 'general/content', 'page' );

							endwhile;
						endif; ?>

					</div><!-- #primary -->

					<?php 
					if( codexin_get_option( 'reveal_post_comments' ) ):
						comments_template('', true);
					endif; ?>
					
				</div> <!-- end of col -->

			</div> <!-- end of row -->
		</div> <!-- end of container -->
	</div> <!-- end of #content -->

<?php get_footer(); ?>
