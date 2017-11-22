<?php 

/**
 * The template partial for displaying a specific header - Header-Four
 *
 *
 * @package 	Reveal
 * @subpackage 	Core
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
$show_socials 	= codexin_get_option( 'reveal_header_socials' );
$show_facebook	= $show_socials['facebook'];
$show_twitter 	= $show_socials['twitter'];
$show_instagram = $show_socials['instagram'];
$show_pinterest = $show_socials['pinterest'];
$show_behance 	= $show_socials['behance'];
$show_gplus 	= $show_socials['gplus'];
$show_linkedin 	= $show_socials['linkedin'];
$show_youtube 	= $show_socials['youtube'];
$show_skype 	= $show_socials['skype'];

?>

<nav class="navbar header-four reveal-bg-0" data-spy="affix" data-offset-top="150">
	<div class="container">
		<div class="flex-wrapper equal-align reveal-color-2">

			<!-- Brand and toggle get grouped for better mobile display -->
			<div class="logo-wrapper">
				<div class="navbar-header">
					<?php

					// Retrieve the logo
					echo codexin_logo();

					// Markup for responsive menu
					echo codexin_responsive_nav();

					?>
				</div> <!-- end of navbar-header -->
			</div> <!-- end of logo-wrapper -->

			<div class="menu-wrapper">
				<div class="hidden-xs" itemscope itemtype="http://schema.org/SiteNavigationElement">
					<?php

					// Check if any menu is assigned
					if( has_nav_menu( 'main_menu' ) ) {

						// Assign the menu
						codexin_menu( 'main_menu' ); 

					} else {

						// If no menu assigned, give a notice
						echo codexin_add_menu( 'desktop' );

					} //end of nav menu check

					?>
				</div>
			</div> <!-- end of menu-wrapper -->

			<div class="social-wrapper">
				<div class="cx-social-media">
					<div class="social-content">
						<?php 
						echo ( !empty( $cx_facebook ) && $show_facebook ) ? '<a href="'. esc_url( $cx_facebook ) .'" target="_blank"><i class="fa fa-facebook"></i></a>' : '';
						echo ( !empty( $cx_twitter ) && $show_twitter ) ? '<a href="'. esc_url( $cx_twitter ) .'" target="_blank"><i class="fa fa-twitter"></i></a>' : '';
						echo ( !empty( $cx_instagram ) && $show_instagram ) ? '<a href="'. esc_url( $cx_instagram ) .'" target="_blank"><i class="fa fa-instagram"></i></a>' : '';
						echo ( !empty( $cx_pinterest ) && $show_pinterest ) ? '<a href="'. esc_url( $cx_pinterest ) .'" target="_blank"><i class="fa fa-pinterest"></i></a>' : '';
						echo ( !empty( $cx_behance ) && $show_behance ) ? '<a href="'. esc_url( $cx_behance ) .'" target="_blank"><i class="fa fa-behance"></i></a>' : '';
						echo ( !empty( $cx_gplus ) && $show_gplus ) ? '<a href="'. esc_url( $cx_gplus ) .'" target="_blank"><i class="fa fa-google-plus"></i></a>' : '';
						echo ( !empty( $cx_linkedin ) && $show_linkedin ) ? '<a href="'. esc_url( $cx_linkedin ) .'" target="_blank"><i class="fa fa-linkedin"></i></a>' : '';
						echo ( !empty( $cx_youtube ) && $show_youtube ) ? '<a href="'. esc_url( $cx_youtube ) .'" target="_blank"><i class="fa fa-youtube-play"></i></a>' : '';
						echo ( !empty( $cx_skype ) && $show_skype ) ? '<a href="'. esc_url( $cx_skype ) .'" target="_blank"><i class="fa fa-skype"></i></a>' : '';
						?>
					</div>
				</div>
			</div> <!-- end of social-wrapper -->
			
		</div> <!-- end of flex-wrapper -->
	</div><!-- end of container -->
</nav> <!-- end of nav -->

<?php 

// Get smart slider
echo codexin_get_smart_slider();

?>






