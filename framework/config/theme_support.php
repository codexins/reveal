<?php

/**
 * Various feature support when the theme initializes.
 *
 * @package Reveal
 * @subpackage Core
 */


// Do not allow directly accessing this file.
defined( 'ABSPATH' ) OR die( esc_html__( 'This script cannot be accessed directly.', 'reveal' ) );


/**
 * Make theme available for translation.
 * Translations can be filed in the /languages/ directory.
 * If you're building a theme based on reveal, use a find and replace
 * to change 'reveal' to the name of your theme in all the template files.
 */
load_theme_textdomain( 'reveal', CODEXIN_FRAMEWORK_DIR . 'languages' );


/**
 * Add default posts and comments RSS feed links to head.
 *
 */
add_theme_support( 'automatic-feed-links' );


/**
 * Let WordPress manage the document title.
 * By adding theme support, we declare that this theme does not use a
 * hard-coded <title> tag in the document head, and expect WordPress to
 * provide it for us.
 */
add_theme_support( 'title-tag' );


/**
 * Add support for post formats.
 *
 */
add_theme_support( 'post-formats',
	array(
		'gallery',
		'audio',
		'video',
		'quote',
		'link',
	)
);


/**
 * Enable support for Post Thumbnails on posts and pages.
 *
 */
add_theme_support( 'post-thumbnails' );


/**
 * Switch default core markup for search form, comment form, and comments
 * to output valid HTML5.
 */
add_theme_support( 'html5', array(
	'search-form',
	'comment-form',
	'comment-list',
	'gallery',
	'caption',
) );


/**
 * Enable support for adding custom image sizes
 *
 */
if ( function_exists( 'add_image_size' ) ) {
	add_image_size('reveal-post-single', 800, 354, true);
	add_image_size('blog-widget-image', 80, 80, true);
	add_image_size('reveal-portfolio-single', 1170, 400, true);
	add_image_size('gallery-format-image', 800, 450, true);
	add_image_size('reveal-rectangle-one', 600, 375, true);
}


/**
 * Registering Nav menu Locations
 *
 */
register_nav_menus( array(
	'main_menu' 		=> esc_html__( 'Primary Menu', 'reveal' ),
	'mobile_menu' 		=> esc_html__( 'Mobile Menu', 'reveal' ),
	'main_menu_left' 	=> esc_html__( 'Left Side Menu (For Centered Logo)', 'reveal' ),
	'main_menu_right' 	=> esc_html__( 'Right Side Menu (For Centered Logo)', 'reveal' ),
) );


/**
 * Adding custom header support to the theme
 *
 */
$reveal_args = array(
    'flex-width'    => true,
    'width'         => 980,
    'flex-height'   => true,
    'height'        => 200,
    'default-image' => CODEXIN_FRAMEWORK_IMG . 'default-header.jpg',
);
add_theme_support( 'custom-header', $reveal_args );


/**
 * Adding custom background support to the theme
 *
 */	
$defaults = array(
	'default-color'          => '',
	'default-image'          => '',
	'default-repeat'         => '',
	'default-position-x'     => '',
	'default-attachment'     => '',
	'wp-head-callback'       => '_custom_background_cb',
	'admin-head-callback'    => '',
	'admin-preview-callback' => ''
);
add_theme_support( 'custom-background', $defaults );