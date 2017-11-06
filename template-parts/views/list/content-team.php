<?php
/**
 * Template part for displaying posts
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package reveal
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(array('clearfix')); ?> itemscope itemtype="http://schema.org/BlogPosting" itemprop="blogPost">
    <div class="post-wrapper reveal-border-1">
        <?php if(has_post_thumbnail()): 

            $image      = wp_prepare_attachment_for_js( get_post_thumbnail_id( $post->ID ) );
            $data_size  = $image['width'] . 'x' . $image['height'];
            $image_alt  = ( !empty( $image['alt'] ) ) ? 'alt="' . esc_attr( $image['alt'] ) . '"' : 'alt="' .get_the_title() . '"';

        endif; ?>
        <?php 
        //Member Information
        $desig = rwmb_meta( 'reveal_team_designation', 'type=text' ); 
        $email = rwmb_meta( 'reveal_team_email', 'type=email' ); 
        $phone = rwmb_meta( 'reveal_team_phone', 'type=text' ); 
        $company = rwmb_meta( 'reveal_team_company', 'type=text' ); 

        //social information
        $fb = rwmb_meta( 'reveal_team_facebook', 'type=text' );
        $tr = rwmb_meta( 'reveal_team_twitter', 'type=text' );
        $ig = rwmb_meta( 'reveal_team_ig', 'type=text' );
        $gp = rwmb_meta( 'reveal_team_gp', 'type=text' );
        $ld = rwmb_meta( 'reveal_team_ld', 'type=text' );
        ?>


        <div class="col-sm-4 team-single-thumb-wrapper pad-xy">
            <div class="image-wrapper">
                <img src="<?php if(has_post_thumbnail()): echo esc_url( the_post_thumbnail_url( 'full' ) ); else: echo 'placehold.it/480x595'; endif; ?>" alt="<?php echo esc_attr( $image_alt ); ?>" class="img-responsive" />
            </div>
        </div>

        <div class="col-sm-8 team-single-content-wrapper">
            <?php $team_name = get_the_title(); ?>
            <h2 class="tm-name reveal-color-1"><?php if( !empty( $team_name ) ) : echo esc_html( $team_name ); endif; ?></h2>
            <p class="desig">
                <?php 
                    if( !empty( $desig ) ) : echo esc_html( $desig ); endif;
                ?>
            </p>
            <p> <?php the_content(); ?> </p>
            <div class="team-card-wrapper reveal-color-2">
                <?php if( ! empty( $company ) ): ?>
                    <p class="company-info company-name"><?php echo $company; ?></p>
                <?php endif; 
                if( ! empty( $phone ) ) :
                ?>
                <p class="company-info phone-number"><?php echo $phone; ?></p>
                <?php  endif;
                if( ! empty( $email ) ) :
                ?>
                <p class="company-info post-detail"><?php echo $email; ?></p>
                <?php endif; ?>
                <div class="team-social-info">
                    <ul class="list-inline">
                        <?php if( ! empty( $fb ) ) : ?>
                        <li class="tm-facebook"><a href="<?php echo esc_url( $fb ); ?>"><i class="fa fa-facebook"></i></a></li>
                        <?php endif; 
                        if( ! empty( $tr ) ) :
                        ?>
                        <li class="tm-twitter"><a href="<?php echo esc_url( $tr ); ?>"><i class="fa fa-twitter"></i></a></li>
                    <?php endif;
                        if( ! empty( $ig ) ) :  
                     ?>
                        <li class="tm-instagram"><a href="<?php echo esc_url( $ig ); ?>"><i class="fa fa-instagram"></i></a></li>
                    <?php endif;
                        if( ! empty( $gp ) ) :
                     ?>
                        <li class="tm-google-plus"><a href="<?php echo esc_url( $gp ); ?>"><i class="fa fa-google-plus"></i></a></li>
                    <?php endif;
                        if( ! empty( $ld ) ) :
                     ?>
                        <li class="tm-linkedin"><a href="<?php echo esc_url( $ld ); ?>"><i class="fa fa-linkedin"></i></a></li>
                    <?php endif; ?>
                    </ul>
                </div> <!-- end of team-social-info -->
            </div> <!-- end of team-card-wrapper -->
        </div> <!-- end of team-content-wrapper -->
        <div class="clearfix"></div>        
        
    </div><!--blog post-->
</article><!-- #post-## -->
<div class="clearfix"></div>