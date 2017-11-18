<?php
/**
 * Various definitions of global variables.
 *
 * Framework files and functions are hooked here.
 *
 * @link 		https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package 	Reveal
 * @subpackage 	Core
 * @since 		1.0
 */


// Do not allow directly accessing this file.
defined( 'ABSPATH' ) OR die( esc_html__( 'This script cannot be accessed directly.', 'reveal' ) );

// Declaring constant for Theme Options
define( 'CODEXIN_THEME_OPTIONS', 'codexin_get_option' );

// Declaring some constants for various theme directories and URLs'
define( 'REVEAL_THEME_ROOT_DIR', trailingslashit( get_template_directory() ) );
define( 'REVEAL_THEME_ROOT_URL', trailingslashit( get_template_directory_uri() ) );

define( 'REVEAL_THEME_ASSETS', REVEAL_THEME_ROOT_URL . 'assets/' );
define( 'REVEAL_THEME_CSS', REVEAL_THEME_ASSETS . 'css/' );
define( 'REVEAL_THEME_JS', REVEAL_THEME_ASSETS . 'js/' );
define( 'REVEAL_THEME_IMG', REVEAL_THEME_ASSETS . 'images/' );

// Include framework
require REVEAL_THEME_ROOT_DIR . 'framework/codexin_framework.php';

// Instantiating framework
$reveal_init = new Codexin_Framework;