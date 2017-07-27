<?php
/**
 * Template part for displaying posts
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package reveal
 */

?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
<!-- Single Project area -->

    <div class="row mb-70">
        <div class="portfolio-image">
            <div class="col-md-8 col-sm-8">
                <div class="image">
                    <img src=" <?php the_post_thumbnail_url('featured-single-image') ?> " alt="">
                </div>
            </div>
            
            <div class="col-md-4 col-sm-4">
                    <?php $cname = rwmb_meta('reveal_portfolio_client', 'type=text'); ?>
                    <?php $cdate = rwmb_meta('reveal_portfolio_date', 'type=text'); ?>
                    <?php $cskills = rwmb_meta('reveal_portfolio_skills', 'type=text'); ?>
                    <?php $csname = rwmb_meta('reveal_portfolio_sname', 'type=text'); ?>
                    <?php $csurl = rwmb_meta('reveal_portfolio_surl', 'type=text'); ?>

                <div class="information">
                    <h2 class="border-btm"><?php the_title()?></h2>
                    <p class="font-medium">  </p>

                    <h2>Catagory</h2>
                    <!-- <p><?php  // the_category(', '); ?></p> -->
                    <?php

                        // $taxonomy = 'portfolio-category';
                        // $taxonomies = wp_get_object_terms($post->ID, $taxonomy, array('fields' => 'all')); 
                        // echo "<pre>" ;
                        // print_r($taxonomies) ;
                        // echo "<pre>" ;
                            // foreach ( $taxonomies as $tax ) {
                            //     echo '<p><a href=".' .$tax->slug .'" class="cx_filter_btn" >' . $tax->name . '</a></p>';

                            // }

                            ?>
                    <h2>Client</h2>
                    <p><?php echo esc_html( $cname ); ?></p>
                    <h2>Portfolio Tag</h2>
                    <p>

                    <!-- <a class="portfolio-tag" href="">Python</a> -->
                        <?php
                        
                        // $taxonomy = 'portfolio_tags';
                        // $taxonomies = get_terms($taxonomy); 
                        //     foreach ( $taxonomies as $tax ) {
                        //         echo '<a class="portfolio-tag" href="' .$tax->slug.'" class="cx_filter_btn" >' . $tax->name . '</a>';

                        //     }


                            ?>
                    </p>
                </div>
            </div>
        </div>
        <div class="col-sm-12">
            <div class="details">
                <h2><?php the_title()?></h2>
                <p>
                    <?php the_content()?>
                </p> 
            </div>
            <div class="portfolio-pagination">
                <div class=" blog-content ">
                
                    <div class="nav-previous alignleft">
                        <!-- <a href="#" rel="prev">Previous Post »</a> -->
                        <?php previous_post_link('%link', '« Previous Post ', FALSE); ?>
            



                    </div>
                    <div class="nav-next alignright ">
                        <!-- <a href="#" rel="next">« Next Post</a> -->
                          <?php next_post_link('%link', ' Next Post  »', FALSE); ?>
                    </div>
                </div>
            </div>
        </div>  
    </div>



<!-- Single Project area end --> 






</article><!-- #post-## -->