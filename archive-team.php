<?php

/**
 *
 * The template for displaying custom post type 'team' archives pages
 *
 * @package Reveal
 * @subpackage Templates
 */


// Do not allow directly accessing this file.
defined( 'ABSPATH' ) OR die( esc_html__( 'This script cannot be accessed directly.', 'reveal' ) );

get_header(); ?>

	<div id="content" class="main-content-wrapper site-content">
		<div class="container">
			<div class="row">
				<div class="col-sm-12 col-md-12">
					<main id="primary" class="site-main" itemscope itemprop="mainContentOfPage" itemtype="http://schema.org/WebPageElement">
						<div class="team-wrapper">

	                        <?php 

	                        // Go to the team loop template
	                        get_template_part( CODEXIN_TEMPLATE_PARTIALS . 'loops/team', 'loop' );

	                        ?>
					
						</div> <!-- end of team-wrapper -->
					</main> <!-- end of #primary -->
				</div> <!-- end of col -->
			</div> <!-- end of row -->
		</div> <!-- end of container -->
	</div> <!-- end of #content -->

<?php get_footer(); ?>
