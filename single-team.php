<?php
/**
 * The template for displaying all single team.
 *
 *
 * @package Reveal
 * @subpackage Templates
 */

get_header(); ?>

	<div id="content" class="main-content-wrapper site-content">
		<div class="container">
			<div class="row">
                <div class="col-sm-12 col-md-12">
                    <main id="primary" class="site-main" itemscope itemprop="mainContentOfPage" itemtype="http://schema.org/WebPageElement">
                        <?php

                        // Go to the team loop template
                        get_template_part( 'template-parts/loops/team', 'loop' );
                        
                        ?>

                    </main><!-- #primary -->
                </div> <!-- end of col -->
			</div> <!-- end of row -->
		</div> <!-- end of container -->
	</div> <!-- end of #content -->

<?php get_footer(); ?>
