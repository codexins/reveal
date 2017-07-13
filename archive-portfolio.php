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

	<div id="content" class="main-content-wrapper">
		<div class="container">
			<div class="row">
				<div class="col-xs-12">

					<div id="primary" class="site-main">


        <div class="container">                   
            <div class="portfolio-content">
                <div class="portfolio-filter-wrap text-center" >
                    <ul class="portfolio-filter hover-style-one">
                        <li><button data-filter="*" class="cx_filter_btn cx_active"> All</button></li>
		                <?php

		                $taxonomy = 'field';
		                $taxonomies = get_terms($taxonomy); 
		                    foreach ( $taxonomies as $tax ) {
		                        echo '<li><button data-filter=".' .strtolower($tax->name) .'" class="cx_filter_btn" >' . $tax->name . '</button></li>';

		                    }?>
                    </ul>
                </div>
                <div class="portfolio portfolio-gutter portfolio-style-four portfolio-container portfolio-masonry portfolio-column-count-3">

				<?php 

		            $args = array (
		                'post_type' => 'portfolio',
		                'posts_per_page' => -1,
		                'orderby' => 'date',
                    	'order' => 'DESC'
		                );

		            $loop = new WP_Query($args);

		              if( $loop->have_posts() ) :

		              while( $loop->have_posts() ) : $loop->the_post(); 

		                $field_id =  get_the_ID();  

		                $term_list = wp_get_post_terms($field_id, 'field'); ?>

		                    <div class="portfolio-item <?php foreach ($term_list as $sterm) { echo strtolower($sterm->name)." "; } ?>">
		                        <div class="portfolio-item-content">
		                            <div class="item-thumbnail">
		                                <?php the_post_thumbnail('portfolio-small-thumbnail'); ?>                                          
		                                <ul class="portfolio-action-btn">
		                                    <li>
		                                        <a class="venobox" href="<?php the_permalink(); ?>"><i class="fa fa-gg"></i></a>
		                                    </li>
		                                </ul>                                            
		                            </div>
		                            <div class="portfolio-description">
		                                <h4><a href="<?php the_permalink(); ?>" ><?php the_title(); ?></a></h4>
		                                <ul class="portfolio-cat">
			                                <?php 
			                                foreach ($term_list as $sterm) {
			                                    echo '<li>'.$sterm->name.'</li>';
			                                    //echo $sterm->name;
			                                } 

			                                ?>
		                                </ul>
		                            </div>                                    
		                        </div>
		                    </div>
		             <?php endwhile; else : endif; ?> 
		             <?php wp_reset_postdata();  ?>    
                  
                </div>
            </div>
        </div>



					</div><!-- #primary -->
				</div> <!-- end of col -->


			</div> <!-- end of row -->
		</div> <!-- end of container -->
	</div> <!-- end of #content -->

<?php get_footer(); ?>
