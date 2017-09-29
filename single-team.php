<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package reveal
 */

get_header(); ?>

	<div id="content" class="main-content-wrapper site-content">
		<div class="container">
			<div class="row">

                <div class="col-sm-12 col-md-12">
                    <div id="primary" class="site-main" itemscope itemprop="mainContentOfPage" itemtype="http://schema.org/WebPageElement">
                        <?php
                            /* Start the Loop */
                            while ( have_posts() ) : the_post();

                                
                                get_template_part( 'template-parts/content', 'team' );
                                
                            endwhile; ?>

                    </div><!-- #primary -->
                </div> <!-- end of col -->
			</div> <!-- end of row -->
		</div> <!-- end of container -->
	</div> <!-- end of #content -->

<?php get_footer(); ?>
