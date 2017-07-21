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

                <?php 

                $reveal_portfolio_layout = $reveal_option['reveal-single-portfolio-layout'];

                if($reveal_portfolio_layout == 1):
                    get_template_part('template-parts/page-layout/single-portfolio/no', 'sidebar');

                elseif($reveal_portfolio_layout == 2):
                    get_template_part('template-parts/page-layout/single-portfolio/left', 'sidebar');

                elseif($reveal_portfolio_layout == 3):
                    get_template_part('template-parts/page-layout/single-portfolio/right', 'sidebar');

                else:
                    get_template_part('template-parts/page-layout/single-portfolio/no', 'sidebar');

                endif;
                
                 ?>

            </div> <!-- end of row -->
        </div> <!-- end of container -->
    </div> <!-- end of #content -->

<?php get_footer(); ?>
