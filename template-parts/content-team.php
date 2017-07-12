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
    <div class="blog-post">
        <div class="row">
            <div class="col-sm-3">
                <a href="<?php the_permalink(); ?>">
                    <div class="item-img-wrap">
                        <img src="<?php the_post_thumbnail_url('team-single-square'); ?>" class="img-responsive img-circle" alt="">
                    </div>                       
                </a><!--work link-->
            </div>
            
            <div class="col-sm-9">

                <?php $desig = rwmb_meta('reveal_team_designation', 'type=text'); ?>
                <?php $t_facebook = rwmb_meta('reveal_team_facebook', 'type=text'); ?>
                <?php $t_twitter = rwmb_meta('reveal_team_twitter', 'type=text'); ?>
                <?php $t_linkedin = rwmb_meta('reveal_team_linkedin', 'type=text'); ?>
                <?php $t_ig = rwmb_meta('reveal_team_ig', 'type=text'); ?>

                <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
                <p class="desig-single"><?php echo $desig; ?></p>
                <div class="entry-content">
                    <?php the_content(); ?>

                </div><!-- .entry-content -->

                <ul class="list-inline post-detail">
                    <?php if(!empty($t_facebook)): ?>
                    <li>
                        <a href="<?php echo $t_facebook; ?>" target="_blank">
                            <i class="fa fa-facebook"></i>
                        </a>
                    </li>
                   <?php endif; ?> 

                   <?php if(!empty($t_twitter)): ?>
                        <li>
                            <a href="<?php echo $t_twitter; ?>" target="_blank">
                                <i class="fa fa-twitter"></i>
                            </a>
                        </li>
                <?php endif; ?> 
                <?php if(!empty($t_ig)): ?>
                <li>
                    <a href="<?php echo $t_ig; ?>" target="_blank">
                        <i class="fa fa-instagram"></i>
                    </a>
                </li>
                <?php endif; ?> 

                <?php if(!empty($t_linkedin)): ?>
                <li>
                    <a href="<?php echo $t_linkedin; ?>" target="_blank">
                        <i class="fa fa-linkedin"></i>
                    </a>
                </li>
                <?php endif; ?> 
                </ul>
            </div>
        </div>
        
    </div><!--blog post-->
</article><!-- #post-## -->