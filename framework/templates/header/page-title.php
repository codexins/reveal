<?php 

/**
 * The template partial for displaying the header page title
 *
 *
 * @package 	Reveal
 * @subpackage 	Core
 * @since 		1.0
 */


// Do not allow directly accessing this file.
defined( 'ABSPATH' ) OR die( esc_html__( 'This script cannot be accessed directly.', 'reveal' ) );

// Fetching and assigning data from theme options and metabox
$page_title_background 	= ( ! empty( codexin_title_background() ) ) ? 'style=background-image:url('. esc_url( codexin_title_background() ) .')' : '';
$title_pos   	 		= codexin_get_option( 'cx_page_title_position' );
$title_pos_single 		= codexin_meta( 'reveal_page_title_alignment' );
$enable_breadcrumbs		= codexin_get_option( 'cx_bcrumbs' );
$breadcrumbs_pos 		= codexin_get_option( 'cx_bc_position' );
$bread_pos_single 		= codexin_meta( 'reveal_page_breadcrumb_alignment' );

if( is_page() || is_singular( 'portfolio' ) ) {
	$title_position			= ( ! empty( $title_pos_single ) ) || ( $title_pos_single !== '0' ) ? $title_pos_single : $title_pos;
	$breadcrumbs_position	= ( ! empty( $bread_pos_single ) ) || ( $bread_pos_single !== '0' ) ? $bread_pos_single : $breadcrumbs_pos;
} else {
	$title_position			= $title_pos;
	$breadcrumbs_position	= $breadcrumbs_pos;
} // end of page conditional check

// Get the title alignment
if( $title_position == '1' ) {
	$title_alingment = 'style=text-align:left';
} elseif( $title_position == '2' ) {
	$title_alingment = 'style=text-align:center';
} elseif( $title_position == '3' ) {
	$title_alingment = 'style=text-align:right';
} else {
	$title_alingment = 'style=text-align:left';
} // end of title alignment condition

// Get the breadcrumb alignment
if( $breadcrumbs_position == '1' ) {
	$breadcrumbs_alingment = 'style=text-align:left';
} elseif( $breadcrumbs_position == '2' ) {
	$breadcrumbs_alingment = 'style=text-align:center';
} elseif( $breadcrumbs_position == '3' ) {
	$breadcrumbs_alingment = 'style=text-align:right';
} else {
	$breadcrumbs_alingment = 'style=text-align:left';
} // end of breadcrumbs alignment condition



?>

<div id="page_title" class="page-title site-content" <?php echo esc_attr( $page_title_background ); ?>>
	<div class="container">
		<div class="row">
			<div class="col-xs-12">
				<div class="page-title-wrapper reveal-color-2">
					<?php
					echo '<h1 '. esc_attr( $title_alingment ) .' itemprop="headline">';

						// Get the page title
						echo codexin_page_title();

					echo '</h1>';

					if( $enable_breadcrumbs ) {
						echo '<div class="breadcrumbs-wrapper" ' . esc_attr( $breadcrumbs_alingment ) . '>';

							// Initializing breadcrumb
							echo codexin_breadcrumbs();

						echo '</div>';
					} else {
						echo '<div class="no-breadcrumbs"></div>';
					} // end of enable breadcrumbs condition
					?>
				</div> <!-- end of page-title-wrapper -->
			</div> <!-- end of col -->
		</div> <!-- end of row -->
	</div> <!-- end of container -->
</div> <!-- end of #page_title -->