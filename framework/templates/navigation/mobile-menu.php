<?php

/**
 * Template partial for rendering the mobile mavigation
 *
 * @package 	Reveal
 * @subpackage 	Core
 * @since 		1.0
 */


// Do not allow directly accessing this file.
defined( 'ABSPATH' ) OR die( esc_html__( 'This script cannot be accessed directly.', 'reveal' ) );

?>

<!-- Initializing Mobile Menu -->
<div id="c-menu--slide-<?php echo esc_attr( codexin_responsive_class() ); ?>" class="c-menu c-menu--slide-<?php echo esc_attr( codexin_responsive_class() ); ?> reveal-color-2" itemscope itemtype="http://schema.org/SiteNavigationElement">
	<button class="c-menu__close"><i class="fa fa-times" aria-hidden="true"></i> <?php esc_html_e( 'Close', 'reveal' ); ?></button>
	<?php

	// Check if any menu is assigned
	if( has_nav_menu( 'mobile_menu' ) ) {

		// Assign the menu
		codexin_menu( 'mobile_menu' ); 

	} else {

		// If no menu assigned, give a notice
		echo codexin_add_menu( 'mobile' );

	} //end of nav menu check

	?>
</div><!-- end of Moblie Menu -->

<!-- Mobile Menu Masking -->
<div id="c-mask" class="c-mask"></div>