<?php
/**
 * The template for displaying all single posts.
 *
 *
 * @package reveal
 * @subpackage Templates
 */


// Do not allow directly accessing this file.
defined( 'ABSPATH' ) OR die( 'This script cannot be accessed directly.' );

$reveal_single_layout           = !empty( reveal_option( 'reveal-single-layout' ) ) ? reveal_option( 'reveal-single-layout' ) : 'right';
$reveal_single_column           = ( $reveal_single_layout == 'left' || $reveal_single_layout == 'right' ) ? '8' : '12';
$reveal_single_sidebar_class    = ( $reveal_single_layout == 'no' ) ? '' : '4';
$reveal_single_pull_class       = ( $reveal_single_layout == 'left') ? ' pull-right' : '';
$reveal_single_offset_class     = ' col-md-offset-1';

get_header(); ?>

    <div id="content" class="main-content-wrapper site-content">
        <div class="container">
            <div class="row">

                <?php 

                    printf(
                        '<div class="col-sm-%1$s col-md-%1$s%2$s%3$s">',
                        esc_attr( $reveal_single_column ),
                        esc_attr( $reveal_single_pull_class ),
                        ( $reveal_single_layout == 'left' ) ? esc_attr( $reveal_single_offset_class ) : ''
                    );

                    ?>
                        <div id="primary" class="site-main" itemscope itemprop="mainContentOfPage" itemtype="http://schema.org/WebPageElement">

                            <?php
                                /* Start the Loop */
                                while ( have_posts() ) : the_post();

                                    if( function_exists( 'codexin_set_post_views' ) ):
                                        codexin_set_post_views(get_the_ID());
                                    endif;
                                    
                                    get_template_part( 'template-parts/views/list/content', get_post_format()  );

                                    if( reveal_option( 'reveal_single_button' ) ):
                                        reveal_post_link();
                                    endif;

                                    if( reveal_option( 'reveal_post_comments' ) ):
                                        comments_template('', true);
                                    endif;
                                    
                                endwhile; 
                            ?>

                        </div><!-- end of #primary -->
                    </div> <!-- end of col -->
                
                <?php if( $reveal_single_layout !== 'no' ) { 

                    printf(
                        '<div class="col-sm-%1$s col-md-%2$s%3$s">',
                        esc_attr( $reveal_single_sidebar_class ),
                        esc_attr( $reveal_single_sidebar_class - 1 ),
                        ( $reveal_single_layout == 'right' ) ? esc_attr( $reveal_single_offset_class ) : ''
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