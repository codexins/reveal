<?php


global $wp_query;

$portfolio_archive_posts  	= is_post_type_archive( 'portfolio' );
$portfolio_single_post     	= is_singular( 'portfolio' ) && ! $portfolio_archive_posts;
$portfolio_style           	= reveal_option( 'reveal_portfolio_style' );
$portfolio_grids           	= reveal_option( 'reveal_portfolio_grid_columns' );
$portfolio_nav		        = reveal_option( 'reveal_portfolio_pagination' );


if ( have_posts() ) {

    echo '<div class="portfolio-archive-wrapper clearfix">';
    $i = 0;

    /* Start the Loop */
    while ( have_posts() ) {

    	the_post();

        $i++;
        
        if( $portfolio_style == 'grid' ) {
            
            $grid_port_columns = 12 / $portfolio_grids;
            printf('<div class="portfolio-single-wrap col-lg-%1$s col-md-%1$s col-sm-12">', $grid_port_columns);

                get_template_part( 'template-parts/views/grid/content', 'portfolio' );

            echo '</div><!-- end of portfolio-single-wrap -->';

            echo ( $i % $portfolio_grids == 0 ) ? '<div class="clearfix"></div>' : '';

        } else {
         
            get_template_part( 'template-parts/views/list/content', 'portfolio' ); 

        }

    }
    echo '</div>';

    echo '<div class="clearfix"></div>';

    echo ( $portfolio_style == 'grid' ) ? '<div class="col-xs-12">' : '' ;

    if( $portfolio_nav == 'numbered' ) {
        echo reveal_posts_link_numbered();
    } else {               
        reveal_posts_link('Newer Portfolios', 'Older Portfolios');
    }
    
    echo ( $portfolio_style == 'grid' ) ? '</div>' : '' ;


} else {

	get_template_part( 'template-parts/views/list/content', 'none' );

}