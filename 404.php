<?php 

/**
 *
 * The template for displaying the 404 page
 *
 * @package reveal
 * @subpackage Templates
 */


// Do not allow directly accessing this file.
defined( 'ABSPATH' ) OR die( esc_html__( 'This script cannot be accessed directly.', 'reveal' ) );

get_header(); ?>

	<div id="content" class="main-content-wrapper site-content">
		<div class="container">
			<div class="row">
				<div class="col-xs-12">
					<div id="primary" class="site-main text-center">
						<article>
							<h2 class="reveal-color-1"><?php esc_html_e('The page you are trying to access does not exist.', 'reveal') ?></h2>
							<p><?php esc_html_e('Please use the menu above to locate what you are searching for. Or you can try searching with a keyword below:', 'reveal') ?></p>
							<?php get_search_form(); ?>
						</article>
					</div><!-- end of #primary -->
				</div> <!-- end of col -->
			</div> <!-- end of row -->
		</div> <!-- end of container -->
	</div> <!-- end of #content -->

<?php get_footer(); ?>
