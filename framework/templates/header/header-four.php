<?php 

/**
 * The template partial for displaying a specific header - Header-Three
 *
 *
 * @package 	Reveal
 * @subpackage 	Core
 */


// Do not allow directly accessing this file.
defined( 'ABSPATH' ) OR die( esc_html__( 'This script cannot be accessed directly.', 'reveal' ) );

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
						echo codexin_add_menu( 'desktop_menu' );

					} //end of nav menu check

					?>
				</div>
			</div> <!-- end of menu-wrapper -->

			<div class="social-wrapper">
				<div class="cx-social-media">
					<div class="social-content">
						<a href="http://Facce" target="_blank"><i class="fa fa-facebook"></i></a>
						<a href="http://Twitter" target="_blank"><i class="fa fa-twitter"></i></a>
						<a href="http://Insra" target="_blank"><i class="fa fa-instagram"></i></a>
						<a href="http://Pin" target="_blank"><i class="fa fa-pinterest"></i></a>
					</div>
				</div>
			</div> <!-- end of social-wrapper -->
			
		</div> <!-- end of flex-wrapper -->
	</div><!-- end of container -->
</nav> <!-- end of nav -->

<?php 

// Get smart slider
echo codexin_smart_slider();

?>






