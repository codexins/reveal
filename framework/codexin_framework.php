<?php

/**
 * Codexin Themes Framework
 *
 * Should be included in global context.
 */


// Do not allow directly accessing this file.
defined( 'ABSPATH' ) OR die( esc_html__( 'This script cannot be accessed directly.', 'reveal' ) );

// Declaling some constants for the framework
define( 'CODEXIN_FRAMEWORK_VERSION', '1.0' );

define( 'CODEXIN_FRAMEWORK_DIR', trailingslashit( REVEAL_THEME_ROOT_DIR . 'framework/' ) );
define( 'CODEXIN_FRAMEWORK_URL', trailingslashit( REVEAL_THEME_ROOT_URL . 'framework/' ) );
define( 'CODEXIN_FRAMEWORK_ADMIN_DIR', trailingslashit( CODEXIN_FRAMEWORK_DIR . 'admin/' ) );
define( 'CODEXIN_FRAMEWORK_ADMIN_URL', trailingslashit( CODEXIN_FRAMEWORK_URL . 'admin/' ) );
define( 'CODEXIN_FRAMEWORK_CONFIG_DIR', trailingslashit( CODEXIN_FRAMEWORK_DIR . 'config/' ) );
define( 'CODEXIN_FRAMEWORK_FUNC_DIR', trailingslashit( CODEXIN_FRAMEWORK_DIR . 'functions/' ) );
define( 'CODEXIN_FRAMEWORK_LIBS_DIR', trailingslashit( CODEXIN_FRAMEWORK_DIR . 'libs/' ) );
define( 'CODEXIN_FRAMEWORK_LIBS_URL', trailingslashit( CODEXIN_FRAMEWORK_URL . 'libs/' ) );
define( 'CODEXIN_TEMPLATE_PARTIALS', 'framework/templates/' );


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
			require_once CODEXIN_FRAMEWORK_CONFIG_DIR . 'widgets.php';

			/**
			 * Adding Codexin framework helpers
			 *
			 */
			require_once CODEXIN_FRAMEWORK_DIR . 'helpers/helpers.php';

			/**
			 * Adding Admin Options
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
			 * Adding the core functions of the framework
			 *
			 */
			require_once CODEXIN_FRAMEWORK_FUNC_DIR . 'functions.php';

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
			require_once CODEXIN_FRAMEWORK_FUNC_DIR . 'color_scheme.php';

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

	}

}