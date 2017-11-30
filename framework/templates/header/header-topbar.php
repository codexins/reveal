<?php 

/**
 * The template partial for displaying the header top bar
 *
 *
 * @package 	Reveal
 * @subpackage 	Core
 * @since 		1.0
 */


// Do not allow directly accessing this file.
defined( 'ABSPATH' ) OR die( esc_html__( 'This script cannot be accessed directly.', 'reveal' ) );

// Fetching the social information from codexin core plugin options page
$cx_facebook 	= get_option( 'codexin_options_social' )['fb_url'];
$cx_instagram 	= get_option( 'codexin_options_social' )['in_url'];
$cx_twitter 	= get_option( 'codexin_options_social' )['tw_url'];
$cx_pinterest 	= get_option( 'codexin_options_social' )['pin_url'];
$cx_behance 	= get_option( 'codexin_options_social' )['be_url'];
$cx_gplus 		= get_option( 'codexin_options_social' )['gp_url'];
$cx_youtube 	= get_option( 'codexin_options_social' )['yt_url'];
$cx_skype 		= get_option( 'codexin_options_social' )['sk_url'];
$cx_linkedin 	= get_option( 'codexin_options_social' )['li_url'];

// Fetching which profiles are wanted to be shown
$show_socials 	= codexin_get_option( 'cx_topbar_socials' );
$show_facebook	= $show_socials['facebook'];
$show_twitter 	= $show_socials['twitter'];
$show_instagram = $show_socials['instagram'];
$show_pinterest = $show_socials['pinterest'];
$show_behance 	= $show_socials['behance'];
$show_gplus 	= $show_socials['gplus'];
$show_linkedin 	= $show_socials['linkedin'];
$show_youtube 	= $show_socials['youtube'];
$show_skype 	= $show_socials['skype'];

// Assigning some required variables
$layout 		= codexin_get_option( 'cx_topbar_layout' );
$class   		= ( $layout == 'sides' ) ? '6' : '4';
$phone 			= codexin_get_option( 'cx_topbar_phone' );
$email 			= codexin_get_option( 'cx_topbar_email' );
$topbar_left 	= codexin_get_option( 'cx_topbar_left' );
$topbar_center 	= codexin_get_option( 'cx_topbar_center' );
$topbar_right 	= codexin_get_option( 'cx_topbar_right' );

// Redering Phone
$topbar_phone = '<li class="topbar-phone"><i class="fa fa-phone" aria-hidden="true"></i> '. $phone .'</li>';

// Rendering Email
$topbar_email = '<li class="topbar-email"><i class="fa fa-envelope" aria-hidden="true"></i> '. $email .'</li>';

// Rendering Socials
$topbar_socials = '<li class="topbar-socials-wrapper">';
    // $topbar_socials .= '<ul class="topbar-socials-wrapper">';
		$topbar_socials .= ( ! empty( $cx_facebook ) && $show_facebook ) ? '<a href="'. esc_url( $cx_facebook ) .'" target="_blank"><i class="fa fa-facebook"></i></a>' : '';
		$topbar_socials .= ( ! empty( $cx_twitter ) && $show_twitter ) ? '<a href="'. esc_url( $cx_twitter ) .'" target="_blank"><i class="fa fa-twitter"></i></a>' : '';
		$topbar_socials .= ( ! empty( $cx_instagram ) && $show_instagram ) ? '<a href="'. esc_url( $cx_instagram ) .'" target="_blank"><i class="fa fa-instagram"></i></a>' : '';
		$topbar_socials .= ( ! empty( $cx_pinterest ) && $show_pinterest ) ? '<a href="'. esc_url( $cx_pinterest ) .'" target="_blank"><i class="fa fa-pinterest"></i></a>' : '';
		$topbar_socials .= ( ! empty( $cx_behance ) && $show_behance ) ? '<a href="'. esc_url( $cx_behance ) .'" target="_blank"><i class="fa fa-behance"></i></a>' : '';
		$topbar_socials .= ( ! empty( $cx_gplus ) && $show_gplus ) ? '<a href="'. esc_url( $cx_gplus ) .'" target="_blank"><i class="fa fa-google-plus"></i></a>' : '';
		$topbar_socials .= ( ! empty( $cx_linkedin ) && $show_linkedin ) ? '<a href="'. esc_url( $cx_linkedin ) .'" target="_blank"><i class="fa fa-linkedin"></i></a>' : '';
		$topbar_socials .= ( ! empty( $cx_youtube ) && $show_youtube ) ? '<a href="'. esc_url( $cx_youtube ) .'" target="_blank"><i class="fa fa-youtube-play"></i></a>' : '';
		$topbar_socials .= ( ! empty( $cx_skype ) && $show_skype ) ? '<a href="'. esc_url( $cx_skype ) .'" target="_blank"><i class="fa fa-skype"></i></a>' : '';
	// $topbar_socials .= '</ul>';
$topbar_socials .= '</li>';


?>

<div class="topbar">
    <div class="container">
		<div class="row">
	        <div class="topbar-wrapper">
	            <div class="col-md-<?php echo esc_attr( $class ); ?> topbar-left">
	                <ul class="text-left">
	                	<?php
		                foreach( $topbar_left as $key => $val ) {
		                    if( $key == 'phone' ) {
		                    	if( $val ) {
			                        printf( '%s', $topbar_phone );
			                    }
		                    }
		                    if( $key == 'email' ) {
		                    	if( $val ) {
			                        printf( '%s', $topbar_email );
			                    }
		                    }
		                    if( $key == 'socials' ) {
		                    	if( $val ) {
			                        printf( '%s', $topbar_socials );
			                    }
		                    }
		                }
		                ?>
	                </ul>
	            </div>
	            <?php if( $layout == 'centered' ) { ?>
		            <div class="col-md-4 topbar-center">
		                <ul class="text-center">
	                	<?php
		                foreach( $topbar_center as $key => $val ) {
		                    if( $key == 'phone' ) {
		                    	if( $val ) {
			                        printf( '%s', $topbar_phone );
			                    }
		                    }
		                    if( $key == 'email' ) {
		                    	if( $val ) {
			                        printf( '%s', $topbar_email );
			                    }
		                    }
		                    if( $key == 'socials' ) {
		                    	if( $val ) {
			                        printf( '%s', $topbar_socials );
			                    }
		                    }
		                }
		                ?>
		                </ul>
		            </div>
	            <?php } ?>
	            <div class="col-md-<?php echo esc_attr( $class ); ?> topbar-right">
	                <ul class="text-right">
	                	<?php
		                foreach( $topbar_right as $key => $val ) {
		                    if( $key == 'phone' ) {
		                    	if( $val ) {
			                        printf( '%s', $topbar_phone );
			                    }
		                    }
		                    if( $key == 'email' ) {
		                    	if( $val ) {
			                        printf( '%s', $topbar_email );
			                    }
		                    }
		                    if( $key == 'socials' ) {
		                    	if( $val ) {
			                        printf( '%s', $topbar_socials );
			                    }
		                    }
		                }
		                ?>
	                </ul>
	            </div>
	        </div>
		</div>
    </div>
</div>