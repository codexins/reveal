<?php 

/**
 * The template partial for displaying the main navigation menu
 *
 *
 * @package 	Reveal
 * @subpackage 	Core
 * @since 		1.0
 */


// Do not allow directly accessing this file.
defined( 'ABSPATH' ) OR die( esc_html__( 'This script cannot be accessed directly.', 'reveal' ) );

// Fetching and assigning data from theme options and metabox
$header_version = codexin_header_version();

if( $header_version == 3 ) {
	$menu_identifier = 'main_menu_right';
	$wrapper_class 	 = 'right-menu-wrapper';
	$hidden_class 	 = 'hidden-xs';
} else {
	$menu_identifier = 'main_menu';
	$wrapper_class 	 = 'menu-wrapper';
	$hidden_class 	 = 'hidden-xs';
} // end of version check conditions


echo ( $header_version == 2 ) ? '<div class="col-xs-12">' : '';
?>
	<div class="<?php echo esc_attr( $wrapper_class ); ?>">
		<div class="<?php echo esc_attr( $hidden_class ); ?>" itemscope itemtype="http://schema.org/SiteNavigationElement">
			<?php

			// Check if any menu is assigned
			if( has_nav_menu( $menu_identifier ) ) {

				// Assign the menu
				codexin_menu( $menu_identifier ); 

			} else {

				// If no menu assigned, give a notice
				echo codexin_add_menu( 'desktop' );

			} //end of nav menu check

			?>
		</div>
	</div> <!-- end of <?php echo esc_html( $wrapper_class ); ?> -->

<?php
echo ( $header_version == 2 ) ? '</div> <!-- end of col -->' : '';