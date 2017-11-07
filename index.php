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
 * @subpackage Templates
 */


// Do not allow directly accessing this file.
defined( 'ABSPATH' ) OR die( 'This script cannot be accessed directly.' );

$reveal_blog_layout     = !empty( reveal_option('reveal-blog-layout') ) ? reveal_option('reveal-blog-layout') : 'right';
$reveal_blog_column     = ( $reveal_blog_layout == 'left' || $reveal_blog_layout == 'right' ) ? '8' : '12';
$reveal_sidebar_class   = ( $reveal_blog_layout == 'no' ) ? '' : '4';
$reveal_pull_class      = ( $reveal_blog_layout == 'left') ? ' pull-right' : '';
$reveal_offset_class    = ' col-md-offset-1';

get_header(); ?>

	<div id="content" class="main-content-wrapper site-content">
		<div class="container">
			<div class="row">

                <?php 

                    printf(
                        '<div class="col-sm-%1$s col-md-%1$s%2$s%3$s">',
                        esc_attr( $reveal_blog_column ),
                        esc_attr( $reveal_pull_class ),
                        ( $reveal_blog_layout == 'left' ) ? esc_attr( $reveal_offset_class ) : ''
                    );

                    ?>
                        <div id="primary" class="site-main" itemscope itemprop="mainContentOfPage" itemtype="http://schema.org/WebPageElement">
                            <?php echo ( ( reveal_option( 'reveal_post_style' ) == 'grid' ) ) ? '<div class="blog-grid-wrapper"><div class="row">' : '<div class="blog-list-wrapper">' ; ?>
                                <?php reveal_loop(); ?>
                            <?php echo ( ( reveal_option( 'reveal_post_style' ) == 'grid' ) ) ? '</div></div>' : '</div>' ; ?>                                

                        </div><!-- end of #primary -->
                    </div> <!-- end of col -->
                
                <?php if( $reveal_blog_layout !== 'no' ) { 

                    printf(
                        '<div class="col-sm-%1$s col-md-%2$s%3$s">',
                        esc_attr( $reveal_sidebar_class ),
                        esc_attr( $reveal_sidebar_class - 1 ),
                        ( $reveal_blog_layout == 'right' ) ? esc_attr( $reveal_offset_class ) : ''
                    );

                    ?>                    
                        <div id="secondary" class="widget-area" role="complementary" itemscope itemtype="http://schema.org/WPSideBar">
                            <?php get_sidebar() ?>
                        </div><!-- end of #secondary -->
                    </div> <!-- end of col -->

                <?php } ?>

			</div> <!-- end of row -->
		</div> <!-- end of container -->
	</div> <!-- end of #content -->

<?php get_footer(); ?>
