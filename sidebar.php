<?php
/**
 * The sidebar containing the main widget area
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Reveal
 */
?>

<?php


if( is_post_type_archive( 'portfolio' ) && is_active_sidebar( 'codexin-sidebar-portfolio' ) ) {

	dynamic_sidebar( 'codexin-sidebar-portfolio' );

} elseif ( is_post_type_archive( 'testimonial' ) ) {

	dynamic_sidebar( 'codexin-sidebar-general' );

} elseif ( is_page() && is_active_sidebar( 'codexin-sidebar-page' ) ) {

	dynamic_sidebar( 'codexin-sidebar-page' );

} elseif ( is_single() && is_active_sidebar( 'codexin-sidebar-blog' ) ) {

	dynamic_sidebar( 'codexin-sidebar-blog' );

} elseif ( is_home() && is_active_sidebar( 'codexin-sidebar-blog' ) ) {

	dynamic_sidebar( 'codexin-sidebar-blog' );

} elseif ( is_archive() && is_active_sidebar( 'codexin-sidebar-blog' ) ) {

	dynamic_sidebar( 'codexin-sidebar-blog' );

} else {

	dynamic_sidebar( 'codexin-sidebar-general' );

}


?>
