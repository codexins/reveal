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


if( is_post_type_archive( 'portfolio' ) && is_active_sidebar('reveal-sidebar-portfolio-template') ) {
	dynamic_sidebar('reveal-sidebar-portfolio-template');
} elseif ( is_post_type_archive( 'testimonial' ) ) {
	dynamic_sidebar('reveal-sidebar-general');
} elseif ( is_page() && is_active_sidebar('reveal-sidebar-page') ) {
	dynamic_sidebar('reveal-sidebar-page');
} elseif ( is_single() && is_active_sidebar('reveal-sidebar-blog') ) {
	dynamic_sidebar('reveal-sidebar-blog');
} elseif ( is_home() && is_active_sidebar('reveal-sidebar-blog') ) {
	dynamic_sidebar('reveal-sidebar-blog');
} elseif ( is_archive() && is_active_sidebar('reveal-sidebar-blog') ) {
	dynamic_sidebar('reveal-sidebar-blog');
} else {
	dynamic_sidebar('reveal-sidebar-general');
}


?>
