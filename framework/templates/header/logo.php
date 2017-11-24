<?php 

/**
 * The template partial for displaying the site logo
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
$wrapper_class		 = ( $header_version == 2) ? 'col-xs-12' : 'logo-wrapper';

?>

<!-- Brand and toggle get grouped for better mobile display -->
<div class="<?php echo esc_attr( $wrapper_class ); ?>">
	<div class="navbar-header">	
		<?php

		// Retrieve the logo
		echo codexin_logo();

		// Markup for responsive menu icon
		echo codexin_responsive_nav();

		?>
	</div> <!-- end of navbar-header -->
</div> <!-- end of <?php echo esc_html( $wrapper_class ); ?> -->

<?php

echo ( $header_version == 2 ) ? '<div class="clearfix"></div>' : '';