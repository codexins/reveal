<?php

/**
 *
 * The template for displaying archives pages
 *
 * @package reveal
 * @subpackage Templates
 */


// Do not allow directly accessing this file.
defined( 'ABSPATH' ) OR die( 'This script cannot be accessed directly.' );


$reveal_archive_layout  = !empty( reveal_option('reveal-blog-layout') ) ? reveal_option('reveal-blog-layout') : 'right';
$reveal_archive_column  = ( $reveal_archive_layout == 'left' || $reveal_archive_layout == 'right' ) ? '8' : '12';
$reveal_sidebar_class   = ( $reveal_archive_layout == 'no' ) ? '' : '4';
$reveal_pull_class      = ( $reveal_archive_layout == 'left') ? ' pull-right' : '';
$reveal_offset_class    = ' col-md-offset-1';

get_header(); ?>

	<div id="content" class="main-content-wrapper site-content">
		<div class="container">
			<div class="row">

                <?php 

                    printf(
                        '<div class="col-sm-%1$s col-md-%1$s%2$s%3$s">',
                        esc_attr( $reveal_archive_column ),
                        esc_attr( $reveal_pull_class ),
                        ( $reveal_archive_layout == 'left' ) ? esc_attr( $reveal_offset_class ) : ''
                    );

                    ?>
                        <div id="primary" class="site-main" itemscope itemprop="mainContentOfPage" itemtype="http://schema.org/WebPageElement">
                            <?php echo ( ( reveal_option( 'reveal_post_style' ) == 'grid' ) ) ? '<div class="blog-grid-wrapper"><div class="row">' : '<div class="blog-list-wrapper">' ; ?>
                                <?php reveal_loop(); ?>
                            <?php echo ( ( reveal_option( 'reveal_post_style' ) == 'grid' ) ) ? '</div></div>' : '</div>' ; ?>                                

                        </div><!-- end of #primary -->
                    </div> <!-- end of col -->
                
                <?php if( $reveal_archive_layout !== 'no' ) { 

                    printf(
                        '<div class="col-sm-%1$s col-md-%2$s%3$s">',
                        esc_attr( $reveal_sidebar_class ),
                        esc_attr( $reveal_sidebar_class - 1 ),
                        ( $reveal_archive_layout == 'right' ) ? esc_attr( $reveal_offset_class ) : ''
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
