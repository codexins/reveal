<?php
/**
 * Template Name: Page - No Sidebar 
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Reveal
 */

get_header(); ?>

	<div id="content" class="main-content-wrapper site-content">
		<div class="container">
			<div class="row">
				<div class="col-xs-12">
					<main id="primary" class="site-main inside-page" itemscope itemprop="mainContentOfPage" itemtype="http://schema.org/WebPageElement">

						<?php
						if ( have_posts() ) {
							
							/* Start the Loop */
							while ( have_posts() ) {
								the_post();

								// Load the specific template
								get_template_part( CODEXIN_TEMPLATE_PARTIALS . 'general/content', 'page' );

								if( codexin_get_option( 'reveal_page_comments' ) ) {
									comments_template('', true);
								}
							} // end of loop have_posts()

						} //End check-posts if()
						?>

					</main><!-- end of #primary -->					
				</div> <!-- end of col -->
			</div> <!-- end of row -->
		</div> <!-- end of container -->
	</div> <!-- end of #content -->

<?php get_footer(); ?>
