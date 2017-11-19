<?php 

/**
 * The template partial for displaying a specific header - Header-Two
 *
 *
 * @package 	Reveal
 * @subpackage 	Core
 */


// Do not allow directly accessing this file.
defined( 'ABSPATH' ) OR die( esc_html__( 'This script cannot be accessed directly.', 'reveal' ) );

?>

<nav class="navbar header-two reveal-bg-0 reveal-color-2" data-spy="affix" data-offset-top="150">
	<div class="container">
		<div class="row">
		
			<!-- Brand and toggle get grouped for better mobile display -->
			<div class="col-xs-12">
				<div class="navbar-header">
					<?php

					// Retrieve the logo
					echo codexin_logo();

					// Markup for responsive menu
					echo codexin_responsive_nav();

					?>
				</div> <!-- end of navbar-header -->
			</div> <!-- end of col -->
			<div class="clearfix"></div>

			<div class="col-xs-12">
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
			</div> <!-- end of col-xs-12 -->

		</div> <!-- end of row -->
	</div><!-- end of container -->
</nav> <!-- end of nav -->

<?php 

// Get smart slider
echo codexin_smart_slider();

?>






