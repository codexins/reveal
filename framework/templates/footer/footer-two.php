<?php

/**
 * The template partial for displaying a specific footer - Footer-Two
 *
 *
 * @package 	Reveal
 * @subpackage 	Core
 */


// Do not allow directly accessing this file.
defined( 'ABSPATH' ) OR die( esc_html__( 'This script cannot be accessed directly.', 'reveal' ) );

?>

<div id="footer_col_1" class="col-md-5">
	<?php dynamic_sidebar( 'codexin-footer-col-1' ); ?>
</div> <!-- end of col -->
<div id="footer_col_2" class="col-md-2">
	<?php dynamic_sidebar( 'codexin-footer-col-2' ); ?>
</div> <!-- end of col -->
<div id="footer_col_3" class="col-md-2">
	<?php dynamic_sidebar( 'codexin-footer-col-3' ); ?>
</div> <!-- end of col -->
<div id="footer_col_4" class="col-md-3">
	<?php dynamic_sidebar( 'codexin-footer-col-4' ); ?>
</div> <!-- end of col -->