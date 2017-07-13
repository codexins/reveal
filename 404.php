<?php
/**
 * 404 template - used when the page the user is
 * trying to open does not exist. This template
 * rewrite the default server or browser error.
 *
 *
 * @package reveal
 */

get_header(); ?>

	<div id="content" class="main-content-wrapper">
		<div class="container">
			<div class="row">
				<div class="col-xs-12">

					<div id="primary" class="site-main">
						<h4><?php esc_html_e('The page you are trying to access does not exist.', 'reveal') ?></h4>
						<h5><?php esc_html_e('Please use the menu above to locate what you are searching for.', 'reveal') ?></h5>
						<?php get_search_form() ?>

					</div><!-- #primary -->
				</div> <!-- end of col -->

			</div> <!-- end of row -->
		</div> <!-- end of container -->
	</div> <!-- end of #content -->

<?php get_footer(); ?>
