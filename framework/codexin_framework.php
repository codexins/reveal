<?php

/**
 * Codexin Themes Framework. Definition of main framework core class.
 *
 * @package 	Reveal
 * @subpackage 	Core
 * @since 		1.0
 */


// Do not allow directly accessing this file.
defined( 'ABSPATH' ) OR die( esc_html__( 'This script cannot be accessed directly.', 'reveal' ) );

// Declaring some constants for the framework
define( 'CODEXIN_FRAMEWORK_VERSION', '1.0' );

define( 'CODEXIN_FRAMEWORK_DIR', trailingslashit( REVEAL_THEME_ROOT_DIR . 'framework/' ) );
define( 'CODEXIN_FRAMEWORK_URL', trailingslashit( REVEAL_THEME_ROOT_URL . 'framework/' ) );
define( 'CODEXIN_FRAMEWORK_ADMIN_DIR', trailingslashit( CODEXIN_FRAMEWORK_DIR . 'admin/' ) );
define( 'CODEXIN_FRAMEWORK_ADMIN_URL', trailingslashit( CODEXIN_FRAMEWORK_URL . 'admin/' ) );
define( 'CODEXIN_FRAMEWORK_CONFIG_DIR', trailingslashit( CODEXIN_FRAMEWORK_DIR . 'config/' ) );
define( 'CODEXIN_FRAMEWORK_FUNC_DIR', trailingslashit( CODEXIN_FRAMEWORK_DIR . 'functions/' ) );
define( 'CODEXIN_FRAMEWORK_LIBS_DIR', trailingslashit( CODEXIN_FRAMEWORK_DIR . 'libs/' ) );
define( 'CODEXIN_FRAMEWORK_CSS', trailingslashit( CODEXIN_FRAMEWORK_URL . 'libs/css' ) );
define( 'CODEXIN_FRAMEWORK_JS', trailingslashit( CODEXIN_FRAMEWORK_URL . 'libs/js' ) );
define( 'CODEXIN_FRAMEWORK_IMG', trailingslashit( CODEXIN_FRAMEWORK_URL . 'libs/images/' ) );
define( 'CODEXIN_TEMPLATE_PARTIALS', trailingslashit( 'framework/templates/' ) );


if( ! class_exists( 'Codexin_Framework' ) ) {

	/**
	 * Main class for the Codexin Themes Framework
	 * 
	 * @since v1.0.0
	 */
	class Codexin_Framework {

		/**
		 * Call all loading functions for the theme. They will be started right after theme setup.
		 * 
		 * @since v1.0.0
		 */
		public function __construct() {

			// Loading the theme framework files
			$this -> codexin_includes();

			// Run after installation setup.
			$this -> codexin_setup();

			// Register actions
			$this -> codexin_actions();

			// Enquequeing admin styles
			$this -> codexin_admin_enqueque();

		}

		/**
		 * Loading the theme framework files. Register custom elements
		 * and functionality in the theme.
		 * 
		 * @since v1.0.0
		 */
		public function codexin_includes() {

			/**
			 * Registering Navigation Menus
			 *
			 */
			require_once CODEXIN_FRAMEWORK_CONFIG_DIR . 'menus.php';

			/**
			 * Register widgets locations
			 *
			 */
			require_once CODEXIN_FRAMEWORK_CONFIG_DIR . 'widget_locations.php';

			/**
			 * Adding Codexin framework helpers
			 *
			 */
			require_once CODEXIN_FRAMEWORK_FUNC_DIR . 'helpers.php';

			/**
			 * Adding Schema Markup for better SEO compatibility
			 *
			 */
			require_once CODEXIN_FRAMEWORK_FUNC_DIR . 'schema_markup.php';

			/**
			 * Adding Theme Options
			 *
			 */
			require CODEXIN_FRAMEWORK_ADMIN_DIR . 'theme_options/admin-options.php';

			/**
			 * Include required plugins to run framework
			 *
			 */
			require CODEXIN_FRAMEWORK_CONFIG_DIR . 'required-plugins.php';
			
		}

		/**
		* Initial Theme Setup
		* @uses add_action()
		* @since v1.0.0
		*/
		public function codexin_setup() {

			/**
			* Add after_setup_theme() for specific functions.
			* The action call is here, because it fits more just for the theme
			* setup, instead for all other actions during using of Subtle.
			*/
			add_action( 'after_setup_theme', array( $this, 'codexin_setup_core' ) );

			/**
			 * Set content width for custom media information
			 *
			 */
			if ( ! isset( $content_width ) ) {
				$content_width = 1140;
			}

		}

		/**
		 * The core functionality that has to be registred after the theme is setted up
		 * 
		 * @since v1.0.0
		 */
		public function codexin_setup_core() {

			require_once CODEXIN_FRAMEWORK_CONFIG_DIR . 'theme_support.php';

		}

		/**
		 * Add actions and filters in Codexin themes framework. All the actions will be hooked here.
		 * 
		 * @since v1.0.0
		 */
		public function codexin_actions() {

			/**
			 * Providing Shortcode Support on text widget
			 *
			 * @uses add_filter()
			 * @since v1.0.0
			 */
			add_filter( 'widget_text', 'do_shortcode' );

			/**
			 * Adding the core functions of the framework
			 *
			 */
			require_once CODEXIN_FRAMEWORK_FUNC_DIR . 'functions.php';

			/**
			 * Adding the theme template functions that utilizes framework hooks
			 *
			 */
			require_once CODEXIN_FRAMEWORK_FUNC_DIR . 'template_function.php';

			/**
			 * Adding the function to show breadcrumbs
			 *
			 */
			require_once CODEXIN_FRAMEWORK_FUNC_DIR . 'breadcrumbs.php';

			/**
			 * Adding the function to enqueue styles and javascripts
			 *
			 */
			require CODEXIN_FRAMEWORK_FUNC_DIR . 'scripts.php';

			/**
			 * Adding the function to pass colors from theme options
			 *
			 */
			require_once CODEXIN_FRAMEWORK_FUNC_DIR . 'color_patterns.php';

			/**
			 * Adding the functions for various paginations
			 *
			 */
			require_once CODEXIN_FRAMEWORK_FUNC_DIR . 'paginations.php';

			/**
			 * Adding the functions for ajaxifying the submitted comments
			 *
			 */
			require_once CODEXIN_FRAMEWORK_FUNC_DIR . 'ajax_comments.php';

		}

		/**
		 * Enqueques theme options styles
		 * 
		 * @since v1.0.0
		 */

		public function codexin_admin_enqueque() {

			add_action( 'admin_enqueue_scripts', array( $this, 'codexin_admin_styles' ), 99 );

		}

		public function codexin_admin_styles() {

			wp_enqueue_style( 'codexin-theme-options-stylesheet', CODEXIN_FRAMEWORK_ADMIN_URL . 'assets/css/theme-options.css', false, '1.0','all');

		}

	}

}