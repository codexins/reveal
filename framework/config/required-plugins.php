<?php


// Do not allow directly accessing this file.
defined( 'ABSPATH' ) OR die( esc_html__( 'This script cannot be accessed directly.', 'reveal' ) );

/**
 * Include the TGM_Plugin_Activation class.
 */
require_once CODEXIN_FRAMEWORK_ADMIN_DIR . 'plugins/class-tgm-plugin-activation.php';

add_action( 'tgmpa_register', 'codexin_register_plugins' );
/**
 * Function to declare the required and recommended plugins to run the theme.
 *
 * @since v1.0.0
 */
function codexin_register_plugins() {

    /**
     * Array of required plugin arrays. Required keys are name and slug.
     * If the source is NOT from the .org repo, then source is also required.
     *
     * @since v1.0.0
     */
    $plugins = array(

            array(
                'name'          => 'Codexin Core',
                'slug'          => 'codexin-core',
                'source'        => 'http://themeitems.com/wp/plugins/codexin-core.zip',
                'required'      => true,
                'version'       => '1.0',
                'external_url'  => '',
            ),

            array(
                'name'          => 'Redux - Options framework',
                'slug'          => 'redux-framework',
                'required'      => true,
            ),

            array(
                'name'          => 'King Composer',
                'slug'          => 'kingcomposer',
                'required'      => true,
            ),

            array(
                'name'          => 'Meta Box',
                'slug'          => 'meta-box',
                'required'      => true,
            ),

            array(
                'name'          => 'Contact Form 7',
                'slug'          => 'contact-form-7',
                'required'      => false,
            )

    );
    $config = array(
        'id'                    => 'tgmpa',
        'default_path'          => '',
        'menu'                  => 'tgmpa-install-plugins',
        'parent_slug'           => 'themes.php',
        'capability'            => 'edit_theme_options',
        'has_notices'           => true,
        'dismissable'           => true,
        'dismiss_msg'           => '',
        'is_automatic'          => false,
        'message'               => '',

    );

    tgmpa( $plugins, $config );
}

