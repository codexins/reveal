<?php

/**
 * The template partial for displaying a specific footer - Footer-One
 *
 *
 * @package 	Reveal
 * @subpackage 	Core
 */


// Do not allow directly accessing this file.
defined( 'ABSPATH' ) OR die( esc_html__( 'This script cannot be accessed directly.', 'reveal' ) );

?>

<div class="col-sm-5">
	<div class="footer-left">
		<?php dynamic_sidebar( 'codexin-footer-col-1' ); ?>
	</div>
</div> <!-- end of col -->
<div class="col-sm-4">
	<div class="footer-center">
		<?php dynamic_sidebar( 'codexin-footer-col-2' ); ?>
	</div>
</div> <!-- end of col -->
<div class="col-sm-3">
	<div class="footer-right">
		<?php dynamic_sidebar( 'codexin-footer-col-3' ); ?>
	</div>
</div> <!-- end of col -->