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

    <div class="row">
        <div class="portfolio-image clearfix">
            <img src=" <?php the_post_thumbnail_url('reveal-portfolio-single') ?> " alt="">
        </div> <!-- end of portfolio-image -->
        <div class="col-md-8">
            <div class="portfolio-details">
                <h2><?php the_title()?></h2>
                <p><?php the_content()?></p> 
            </div>
            <?php reveal_post_link(); ?>
        </div>  

        <div class="col-md-4 pdr-0">
            <div class="portfolio-meta">
                <?php $cname = rwmb_meta('reveal_portfolio_client', 'type=text'); ?>
                <?php $cdate = rwmb_meta('reveal_portfolio_date', 'type=text'); ?>
                <?php $cskills = rwmb_meta('reveal_portfolio_skills', 'type=text'); ?>
                <?php $csname = rwmb_meta('reveal_portfolio_sname', 'type=text'); ?>
                <?php $csurl = rwmb_meta('reveal_portfolio_surl', 'type=text'); ?>

                

                <div class="client-portfolio">
                    <h3><?php echo esc_html__('Client Info', 'codexin'); ?></h3>
                    <p><strong><?php echo esc_html__('Name', 'codexin'); ?>: </strong><?php echo esc_html( $cname ); ?></p>
                    <p><strong><?php echo esc_html__('Website', 'codexin'); ?>: </strong><?php echo esc_html( $csname ); ?></p>
                    <p><strong><?php echo esc_html__('Completion Date', 'codexin'); ?>: </strong><?php echo esc_html( $cdate ); ?></p>
                </div> <!-- end of client-portfolio -->


                <div class="skills-portfolio">
                    <h3><?php echo esc_html__('Skills', 'codexin') ?></h3>
                    <p><?php echo $cskills; ?></p>
                </div>

                <div class="category-portfolio">
                    <h3>Catagory</h3>
                    <p><?php

                        $terms = get_terms( 'portfolio-category' );
                        foreach ( $terms as $term ) {
                            // The $term is an object, so we don't need to specify the $taxonomy.
                            $term_link = get_term_link( $term); 
                            // If there was an error, continue to the next term.
                            if ( is_wp_error( $term_link ) ) {
                                continue;
                            }
                            // We successfully got a link. Print it out.
                            echo '<a href="' . esc_url( $term_link ) . '">' . $term->name . '</a>';
                        }
                    ?></p>
                </div> <!-- end of category-portfolio -->



                <div class="tag-portfolio">
                    <h3>Portfolio Tag</h3>
                    <p>
                        <?php
                        $taxonomy = 'portfolio_tags';
                        $taxonomies = get_terms($taxonomy); 
                            foreach ( $taxonomies as $tax ) {

                            $tax_link = get_term_link( $tax);
                            
                            // If there was an error, continue to the next term.
                            if ( is_wp_error( $tax_link ) ) {
                                continue;
                            }
                            echo '<a class="portfolio-tag" href="'. esc_url( $tax_link ) .'" class="cx_filter_btn" >' . $tax->name . '</a>';

                            }
                        ?>
                    </p>
                </div> <!-- end of portfolio-tag -->
            </div> <!-- end of portfolio-meta -->
        </div> <!-- end of col-md-4 -->
    </div> <!-- end of row -->

<!-- Single Project area end --> 
</article><!-- #post-## -->