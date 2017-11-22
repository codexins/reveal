<?php
/**
 * The template for displaying all single events.
 *
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
                <main id="primary" class="site-main" itemscope itemprop="mainContentOfPage" itemtype="http://schema.org/WebPageElement">
                
                    <?php 

                    // Go to the events loop template
    				get_template_part( CODEXIN_TEMPLATE_PARTIALS . 'loops/events', 'loop' );

    		        ?>
                
                </main> <!-- end of #primary -->
            </div> <!-- end of row -->
        </div> <!-- end of container -->
    </div> <!-- end of #content -->

<?php get_footer(); ?>
