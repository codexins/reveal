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

<nav class="navbar header-three reveal-bg-0" data-spy="affix" data-offset-top="150">
	<div class="container">
		<div class="row">
			<div class="flex-wrapper equal-align reveal-color-2">
				<div class="left-menu-wrapper">
					<div class="hidden-xs left-menu" itemscope itemtype="http://schema.org/SiteNavigationElement">
						<?php

						// Check if any menu is assigned
						if( has_nav_menu( 'main_menu_left' ) ) {

							// Assign the menu
							codexin_menu( 'main_menu_left' ); 

						} else {

							// If no menu assigned, give a notice
							echo codexin_add_menu( 'desktop_menu' );

						} //end of nav menu check

						?>
					</div>
				</div> <!-- end of left-menu-wrapper -->

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

				<div class="right-menu-wrapper">
					<div class="hidden-xs" itemscope itemtype="http://schema.org/SiteNavigationElement">
						<?php

						// Check if any menu is assigned
						if( has_nav_menu( 'main_menu_right' ) ) {

							// Assign the menu
							codexin_menu( 'main_menu_right' ); 

						} else {

							// If no menu assigned, give a notice
							echo codexin_add_menu( 'desktop_menu' );

						} //end of nav menu check

						?>
					</div>
				</div> <!-- end of right-menu-wrapper -->
			
			</div> <!-- end of flex-wrapper -->
		</div> <!-- end of row -->
	</div><!-- end of container -->
</nav> <!-- end of nav -->

<?php 

// Get smart slider
echo codexin_smart_slider();

?>






