<?php

/**
 *
 * The template for displaying archives pages
 *
 * @package Reveal
 * @subpackage Templates
 */


// Do not allow directly accessing this file.
defined( 'ABSPATH' ) OR die( esc_html__( 'This script cannot be accessed directly.', 'reveal' ) );

$layout          = !empty( reveal_option('reveal-blog-layout') ) ? reveal_option('reveal-blog-layout') : 'right';
$post_style      = !empty( reveal_option( 'reveal_blog_style' ) ) ? reveal_option( 'reveal_blog_style' ) : 'list';
$column          = ( $layout == 'left' || $layout == 'right' ) ? '8' : '12';
$sidebar_class   = ( $layout == 'no' ) ? '' : '4';
$pull_class      = ( $layout == 'left') ? ' pull-right' : '';
$offset_class    = ' col-md-offset-1';

get_header(); ?>

	<div id="content" class="main-content-wrapper site-content">
		<div class="container">
			<div class="row">

                <?php 

                // Assigning Wrapper Column for primary content
                printf(
                    '<div class="col-sm-%1$s col-md-%1$s%2$s%3$s">',
                    esc_attr( $column ),
                    esc_attr( $pull_class ),
                    ( $layout == 'left' ) ? esc_attr( $offset_class ) : ''
                );

                    ?>
                        <main id="primary" class="site-main" itemscope itemprop="mainContentOfPage" itemtype="http://schema.org/WebPageElement">

                            <?php 

                            // Go to the default loop template
                            get_template_part( 'template-parts/loops/default', 'loop' );

                            ?>

                        </main><!-- end of #primary -->
                    </div> <!-- end of col -->
                
                <?php 

                // Checking the need of sidebar
                if( $layout !== 'no' ) {

                    // Assinging wrapper column for sidebar
                    printf(
                        '<div class="col-sm-%1$s col-md-%2$s%3$s">',
                        esc_attr( $sidebar_class ),
                        esc_attr( $sidebar_class - 1 ),
                        ( $layout == 'right' ) ? esc_attr( $offset_class ) : ''
                    );

                ?>                    
                        <aside id="secondary" class="widget-area" role="complementary" itemscope itemtype="http://schema.org/WPSideBar">
                            <?php 

                            // Get active assigned sidebar
                            get_sidebar();

                            ?>
                        </aside><!-- end of #secondary -->
                    </div> <!-- end of col -->

                <?php } //end of sidebar condition ?>

			</div> <!-- end of row -->
		</div> <!-- end of container -->
	</div> <!-- end of #content -->

<?php get_footer(); ?>
