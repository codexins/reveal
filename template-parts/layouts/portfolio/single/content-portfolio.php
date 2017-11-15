<?php
/**
 * Template part for displaying posts
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Reveal
 */

?>
<article id="portfolio-<?php the_ID(); ?>" <?php post_class(); ?>>
<!-- Single Project area -->
    <div class="row">
        <div class="portfolio-image clearfix">
            <img src=" <?php the_post_thumbnail_url('reveal-portfolio-single') ?> " alt="">
        </div> <!-- end of portfolio-image -->

        <?php $position = codexin_get_option('reveal-single-portfolio-layout'); ?>
        <div class="col-md-8 <?php if($position == '1'): echo 'col-md-push-4'; endif; ?>">
            <div class="portfolio-details">
                <h2 class="reveal-color-1" itemprop="name"><?php the_title()?></h2>
                <div class="portfolio-content">
                    <?php the_content(); ?>
                </div>
            </div>
            <?php reveal_post_link(__('Prev', 'reveal'), __('Next', 'reveal')); ?>

            <?php if( codexin_get_option( 'reveal_portfolio_comments' ) ): ?>
                <div class="portfolio-comments">
                    <?php comments_template('', true);?>
                </div>
            <?php endif; ?>
        </div>  

        <div class="col-md-4 <?php if($position == '1'): echo 'col-md-pull-8'; endif; ?>">
            <div class="portfolio-meta reveal-color-0">
                <?php $cname = rwmb_meta('reveal_portfolio_client', 'type=text'); ?>
                <?php $cadate = rwmb_meta('reveal_portfolio_date', 'type=date'); 
                $date_format = get_option( 'date_format' ); 
                $cdate = !empty($cadate) ? date( $date_format, strtotime($cadate) ) : ''; 
                ?>
                <?php $cskills = rwmb_meta('reveal_portfolio_skills', 'type=text'); ?>
                <?php $csname = rwmb_meta('reveal_portfolio_sname', 'type=text'); ?>
                <?php $csurl = rwmb_meta('reveal_portfolio_surl', 'type=text'); ?>

                <?php if(!empty($cname) || !empty($csname) || !empty($cdate)): ?>
                <div class="client-portfolio meta-single reveal-border-1">
                    <h3 class="reveal-color-1"><?php echo esc_html__('Client Info', 'reveal'); ?></h3>
                    <p><strong><?php echo esc_html__('Name', 'reveal'); ?>: </strong><?php echo $cname; ?></p>
                    <p><strong><?php echo esc_html__('Website', 'reveal'); ?>: </strong><?php echo '<a href="'. $csurl .'" target="_blank">'. $csname .'</a>'; ?></p>
                    <p><strong><?php echo esc_html__('Completion Date', 'reveal'); ?>: </strong><?php echo $cdate; ?></p>
                </div> <!-- end of client-portfolio -->
                <?php endif; ?>

                <?php if(!empty($cskills)): ?>
                <div class="skills-portfolio meta-single reveal-border-1">
                    <h3 class="reveal-color-1"><?php echo esc_html__('Skills', 'reveal') ?></h3>
                    <p><?php echo $cskills; ?></p>
                </div>
                <?php endif; ?>

        
                <?php $cat_list = get_the_term_list( $post->ID, 'portfolio-category', '', '-', '' );  
                if(!empty($cat_list)): ?>
                <div class="category-portfolio meta-single reveal-border-1">
                    <h3 class="reveal-color-1"><?php echo esc_html__('Catagory', 'reveal'); ?></h3>
                    <p><?php echo $cat_list; ?></p>
                </div> <!-- end of category-portfolio -->
                <?php endif; ?>
                
                <?php $tag_list = get_the_term_list( $post->ID, 'portfolio_tags', '', '-', '' );
                if(!empty($tag_list)):
                ?>
                <div class="tag-portfolio meta-single reveal-border-1">
                    <h3 class="reveal-color-1"><?php echo esc_html__('Portfolio Tag', 'reveal'); ?></h3>
                    <p><?php echo $tag_list; ?></p>
                </div> <!-- end of portfolio-tag -->
                <?php endif; ?>

            </div> <!-- end of portfolio-meta -->
        </div> <!-- end of col-md-4 -->
    </div> <!-- end of row -->

<!-- Single Project area end --> 
</article><!-- #portfolio-## -->