<?php 

/**
 * The template partial for displaying a specific footer - Footer-General
 *
 *
 * @package 	Reveal
 * @subpackage 	Core
 */


// Do not allow directly accessing this file.
defined( 'ABSPATH' ) OR die( esc_html__( 'This script cannot be accessed directly.', 'reveal' ) );

$reveal_footer  = codexin_get_option( 'reveal-footer-version' );

if( $reveal_footer == 4 ) {
	$footer_count = 2;
} elseif( $reveal_footer == 5 ) {
	$footer_count = 3;
} elseif( $reveal_footer == 6 ) {
	$footer_count = 4;
}

$footer_column = 12 / $footer_count;

for( $i = 1; $i <= $footer_count ; $i++ ) { 
	echo '<div id="footer_col_' . esc_attr( $i ) . '" class="col-md-' . esc_attr( $footer_column ) . '">';
		dynamic_sidebar( 'codexin-footer-col-'. esc_attr( $i ) );
	echo '</div> <!-- end of col -->';

}