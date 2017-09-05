<?php
/**
 * reveal functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package reveal
 */


// Exit if accessed directly
if ( !defined('ABSPATH')) exit;

// Declaring Global Variable for Theme Options
define( 'CODEXIN_THEME_OPTIONS', 'reveal_option' );


if( ! class_exists( 'Reveal' ) ) :

class Reveal {

	/**
	 * Call all loading functions for the theme. They will be started right after theme setup.
	 * 
	 * @since v1.0.0
	 */
	public function __construct() {

		// Loading the theme specific framework files
		$this -> reveal_includes();

		// Run after installation setup.
		$this -> reveal_setup();

		// Register actions using add_actions() custom function.
		$this -> reveal_add_actions();

	}

	/**
	 * Loading the theme specific framework files. Register custom elements
	 * and functionality in the theme.
	 * 
	 * @uses get_template_directory_uri()
	 * @since v1.0.0
	 */
	public function reveal_includes() {

		//Include Navigation Menus
		require get_template_directory() . '/inc/menus.php';

		//Enqueue styles and javascripts
		require get_template_directory() . '/inc/scripts.php';

		//Register widgets and Custom widgets
		require get_template_directory() . '/inc/widgets.php';

		//Include required plugins
		require get_template_directory() . '/inc/plugins/required-plugins.php';

		//Adding breadcrumbs
		require get_template_directory() . '/inc/breadcrumbs.php';

		//Adding Helper File
		require get_template_directory() . '/inc/helpers.php';

		//Adding Admin Options
		require get_template_directory() . '/inc/admin-options.php';
		
	}

	/**
	* Initial Theme Setup
	* @uses add_action()
	* @since v1.0.0
	*/

	public function reveal_setup() {

		/**
		* Add after_setup_theme() for specific functions.
		* The action call is here, because it fits more just for the theme
		* setup, instead for all other actions during using of Subtle.
		*/
		add_action( 'after_setup_theme', array( $this, 'reveal_setup_core' ) );

    	// Set content width for custom media information
		if ( ! isset( $content_width ) ) {
			$content_width = 800;
		}

	}

	/**
	 * The core functionality that has to be registred after the theme is setted up
	 * 
	 * @since v1.0.0
	 */
	public function reveal_setup_core() {

		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on reveal, use a find and replace
		 * to change 'reveal' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'reveal', get_template_directory() . '/languages' );

		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );

		/*
		 * Let WordPress manage the document title.
		 * By adding theme support, we declare that this theme does not use a
		 * hard-coded <title> tag in the document head, and expect WordPress to
		 * provide it for us.
		 */
		add_theme_support( 'title-tag' );

		// Add support for post formats.
		add_theme_support( 'post-formats',
			array(
				'gallery',
				'audio',
				'video',
				'quote',
				'link',
			)
		);

		// Enable support for Post Thumbnails on posts and pages.
		add_theme_support( 'post-thumbnails' );

		/*
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

		//Adding custom image sizes

		add_image_size('single-post-image', 800, 354, true);
		add_image_size('blog-widget-image', 80, 80, true);
		add_image_size('team-mini-image', 262, 325, true);
		add_image_size('portfolio-single-image', 800, 400, true);
		add_image_size('gallery-format-image', 800, 450, true);


		/*
		 * Adding custom header support
		 * to the theme
		 */		
		$reveal_args = array(
		    'flex-width'    => true,
		    'width'         => 980,
		    'flex-height'   => true,
		    'height'        => 200,
		    'default-image' => get_template_directory_uri() . '/assets/images/default-header.jpg',
		);
		add_theme_support( 'custom-header', $reveal_args );

		/*
		 * Adding custom background support
		 * to the theme
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

	}

	/**
	 * Add actions and filters in wordpress theme. All the actions will be here.
	 * 
	 * @uses add_action()
	 * @uses add_filter()
	 * @since v1.0.0
	 */

	public function reveal_add_actions() {

		// Providing Shortcode Support on text widget
		add_filter( 'widget_text', 'do_shortcode' );

		// Removing 'Redux Framework' sub menu under Tools 
		add_action( 'admin_menu', 'remove_redux_menu',12 );
		function remove_redux_menu() {
		    remove_submenu_page('tools.php','redux-about');
		}

		// Removing srcset from featured image
		add_filter( 'max_srcset_image_width', create_function( '', 'return 1;' ) );

		// Removing width & height from featured image
		add_filter( 'post_thumbnail_html', 'remove_thumbnail_dimensions', 10, 3 );
		function remove_thumbnail_dimensions( $html, $post_id, $post_image_id ) {
		    $html = preg_replace( '/(width|height)=\"\d*\"\s/', "", $html );
		    return $html;
		}

		/**
		 * Apply theme's stylesheet to the visual editor.
		 *
		 * @uses add_editor_style() Links a stylesheet to visual editor
		 * @uses get_stylesheet_uri() Returns URI of theme stylesheet
		 */
		add_action( 'admin_init', 'reveal_add_editor_styles' );
		function reveal_add_editor_styles() {
			add_editor_style();
		}


		// Adding wp_title support
		if ( ! function_exists( '_wp_render_title_tag' ) ) {
			add_action( 'wp_head', array( $this, 'reveal_theme_render_title' ) );
		}

		function reveal_theme_render_title() {
			?>
			<title><?php wp_title( '|', true, 'right' ); ?></title>
			<?php
		}


		// Adding schema to navigation links
		add_filter( 'nav_menu_link_attributes', 'add_attribute', 10, 3 );
		function add_attribute( $atts, $item, $args ) {
			$atts['itemprop'] = 'url';
			return $atts;
		}

	}

}


// Removing this line is like not having a functions.php file
$reveal_function = new Reveal;

endif;



