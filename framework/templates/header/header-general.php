<?php 

/**
 * The template partial for rendering the header - Header-General
 *
 *
 * @package 	Reveal
 * @subpackage 	Core
 * @since 		1.0
 */


// Do not allow directly accessing this file.
defined( 'ABSPATH' ) OR die( esc_html__( 'This script cannot be accessed directly.', 'reveal' ) );

// Fetching and assigning data from theme options
$header_version 	 = codexin_get_option( 'reveal-header-version' );

if( $header_version == 1 ) {
	$main_wrapper_class 	 = '';
	$sec_wrapper_class 	 	 = 'flex-wrapper equal-align reveal-color-2';
} elseif( $header_version == 2 ) {
	$main_wrapper_class 	 = ' header-two reveal-color-2';
	$sec_wrapper_class 	 	 = 'row';
} elseif( $header_version == 3 ) {
	$main_wrapper_class 	 = ' header-three';
	$sec_wrapper_class 	 	 = 'row';
} elseif( $header_version == 4 ) {
	$main_wrapper_class 	 = ' header-four';
	$sec_wrapper_class 	 	 = 'flex-wrapper equal-align reveal-color-2';
} else {
	$main_wrapper_class 	 = '';
	$sec_wrapper_class 	 	 = 'flex-wrapper equal-align reveal-color-2';
} // end of version check conditions

?>

<nav class="navbar reveal-bg-0<?php echo esc_attr( $main_wrapper_class ); ?>" data-spy="affix" data-offset-top="150">
	<div class="container">
		<div class="<?php echo esc_attr( $sec_wrapper_class ); ?>">

			<?php
			echo ( $header_version == 3 ) ? '<div class="flex-wrapper equal-align reveal-color-2">' : ''; 

			    /**
			     * Contents inside the container of main navigation nav tag, codexin_inside_main_nav hook.
			     *
				 * @hooked codexin_render_main_navigation_left 	- 10 (outputs the HTML for the left navigation menu for header three)
			     * @hooked codexin_render_logo 					- 15 (outputs the HTML for the site logo)
			     * @hooked codexin_render_main_navigation 		- 20 (outputs the HTML for the main navigation menu (right menu for header four))
			     * @hooked codexin_render_social_media 			- 25 (outputs the HTML for the social media information for header four)
			     */
				do_action( 'codexin_inside_main_nav' );

			echo ( $header_version == 3 ) ? '</div>' : '';
			?>
			
		</div>
	</div><!-- end of container -->
</nav> <!-- end of nav -->

<?php 

// Get smart slider
echo codexin_get_smart_slider();

?>






