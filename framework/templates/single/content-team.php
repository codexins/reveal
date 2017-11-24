<?php

/**
 * Template partial for displaying single team
 *
 * @package 	Reveal
 * @subpackage 	Core
 * @since 		1.0
 */


// Do not allow directly accessing this file.
defined( 'ABSPATH' ) OR die( esc_html__( 'This script cannot be accessed directly.', 'reveal' ) );

//Member Information
$designation        = codexin_meta( 'reveal_team_designation' ); 
$email              = codexin_meta( 'reveal_team_email' ); 
$phone              = codexin_meta( 'reveal_team_phone' ); 
$company            = codexin_meta( 'reveal_team_company' ); 

//social information
$facebook           = codexin_meta( 'reveal_team_facebook' );
$twitter            = codexin_meta( 'reveal_team_twitter' );
$instagram          = codexin_meta( 'reveal_team_ig' );
$gplus              = codexin_meta( 'reveal_team_gp' );
$linkedin           = codexin_meta( 'reveal_team_ld' );

// Fetching the attachment properties
$thumbnail_default  = codexin_get_option( 'reveal_team_image' );
$attachment_id      = ( has_post_thumbnail() ) ? get_post_thumbnail_id( $post->ID ) : $thumbnail_default['id'];
$image_prop         = codexin_attachment_metas( $attachment_id );
$default_image      = wp_get_attachment_image_src( $attachment_id, 'full' );
$team_image_full    = ( has_post_thumbnail() ) ? esc_url( get_the_post_thumbnail_url( $post->ID, 'full' ) ) : esc_url( $default_image[0] );
$team_image         = ( ! empty( $team_image_full ) ) ? $team_image_full : esc_url( 'placehold.it/480x595' );

?>

<article id="team-<?php the_ID(); ?>" <?php post_class( array( 'clearfix', 'cx-team-single' ) ); ?>>
    <div class="post-wrapper reveal-border-1">
        <div class="col-sm-4 team-single-thumb-wrapper pad-xy">
            <div class="image-wrapper">
                <img src="<?php printf( '%s', $team_image ); ?>" <?php printf( '%s', $image_prop['alt'] ); ?> class="img-responsive" />
            </div>
        </div> <!-- end of team-single-thumb-wrapper -->

        <div class="col-sm-8 team-single-content-wrapper">
            <h2 class="tm-name reveal-color-1"><?php the_title(); ?></h2>            
            <?php

            if( !empty( $designation ) ) {
                echo '<p class="desig">'. esc_html( $designation ) .'</p>';
            } // metabox conditional check

            ?>            
            <p> <?php the_content(); ?> </p>

            <div class="team-card-wrapper reveal-color-2">
                <?php
                if( ! empty( $company ) ) { ?>
                    <p class="company-info company-name"><?php echo esc_html( $company ); ?></p>
                <?php
                }
                if( ! empty( $phone ) ) { ?>
                    <p class="company-info phone-number"><?php echo esc_html( $phone ); ?></p>
                <?php
                }
                if( ! empty( $email ) ) { ?>
                    <p class="company-info post-detail"><?php echo esc_html( $email ); ?></p>
                <?php
                } ?>
                <div class="team-social-info">
                    <ul class="list-inline">
                        <?php
                        if( ! empty( $facebook ) ) { ?>
                            <li class="tm-facebook"><a href="<?php echo esc_url( $facebook ); ?>"><i class="fa fa-facebook"></i></a></li>
                        <?php
                        }
                        if( ! empty( $twitter ) ) { ?>
                            <li class="tm-twitter"><a href="<?php echo esc_url( $twitter ); ?>"><i class="fa fa-twitter"></i></a></li>
                        <?php
                        }
                        if( ! empty( $instagram ) ) { ?>
                            <li class="tm-instagram"><a href="<?php echo esc_url( $instagram ); ?>"><i class="fa fa-instagram"></i></a></li>
                        <?php
                        }
                        if( ! empty( $gplus ) ) { ?>
                            <li class="tm-google-plus"><a href="<?php echo esc_url( $gplus ); ?>"><i class="fa fa-google-plus"></i></a></li>
                        <?php
                        }
                        if( ! empty( $linkedin ) ) { ?>
                            <li class="tm-linkedin"><a href="<?php echo esc_url( $linkedin ); ?>"><i class="fa fa-linkedin"></i></a></li>
                        <?php
                        } ?>
                    </ul> <!-- end of list-inline -->
                </div> <!-- end of team-social-info -->
            </div> <!-- end of team-card-wrapper -->
        </div> <!-- end of team-content-wrapper -->
        <div class="clearfix"></div>        
    </div><!--blog post-wrapper-->
</article><!-- end of #team-## -->
<div class="clearfix"></div>