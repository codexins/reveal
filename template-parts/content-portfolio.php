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
<div class="single-project-area">
    <div class="row">
        <div class="col-lg-12 col-md-12">
            <div class="single-port-img">
                <img src="<?php the_post_thumbnail_url('portfolio-single-thumbnail') ?>" alt="">
            </div>                              
        </div>
        <div class="col-lg-3 col-md-4 col-sm-4">
            <div class="project-meta-wrapper">
                <h4>information</h4>

                <?php $cname = rwmb_meta('reveal_portfolio_client', 'type=text'); ?>
                <?php $cdate = rwmb_meta('reveal_portfolio_date', 'type=text'); ?>
                <?php $cskills = rwmb_meta('reveal_portfolio_skills', 'type=text'); ?>
                <?php $csname = rwmb_meta('reveal_portfolio_sname', 'type=text'); ?>
                <?php $csurl = rwmb_meta('reveal_portfolio_surl', 'type=text'); ?>

                <ul class="single-portfolio-meta">
                    <li><i class="fa fa-user"></i><span>Client:</span><?php echo $cname; ?></li>
                    <li><i class="fa fa-calendar"></i><span>Date:</span><?php echo $cdate; ?></li>
                    <li><i class="fa fa-coffee"></i><span>Skills:</span><?php echo $cskills; ?></li>
                    <li><i class="fa fa-link"></i><span>Website: </span><a href="<?php echo $csurl; ?>" target="_blank"><?php echo $csname; ?></a></li>
                </ul>                               
            </div>                                 
        </div>
        <div class="col-lg-9 col-md-8 col-sm-8">
            <div class="single-project-description">
                <h2 class="single-project-title"><?php the_title(); ?></h2>
                <p><?php 
                    if(is_single()):
                        the_content();
                    else:
                        the_excerpt();
                    endif; ?>
                </p>
            </div>
            <div class="post-navigation-wrapper">
              <?php previous_post_link('%link', '<i class="fa fa-angle-left"></i> Previous Project', FALSE); ?>
              <?php next_post_link('%link', 'Next Project <i class="fa fa-angle-right"></i>', FALSE); ?>
            </div>                                  
        </div>                            
    </div>            
</div>                
<!-- Single Project area end --> 

</article><!-- #post-## -->