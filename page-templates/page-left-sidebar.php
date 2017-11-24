<?php
/**
 * Template Name: Page - Left Sidebar
 *
 *
 * @package 	Reveal
 * @subpackage 	Templates
 * @since 		1.0
 */


// Do not allow directly accessing this file.
defined( 'ABSPATH' ) OR die( esc_html__( 'This script cannot be accessed directly.', 'reveal' ) );

get_header(); ?>

	<div id="content" class="main-content-wrapper site-content">
		<div class="container">
			<div class="row">

				<div class="col-sm-4 col-md-3">
					<aside id="secondary" class="widget-area" role="complementary" itemscope itemtype="http://schema.org/WPSideBar">
	                    <?php 

	                    // Get active assigned sidebar
	                    get_sidebar();

	                    ?>
					</aside><!-- end of #secondary -->
				</div> <!-- end of col -->
				
				<div class="col-sm-8 col-md-8 col-md-offset-1">
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
