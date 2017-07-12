<?php
/* required plugind */
/**
 * Include the TGM_Plugin_Activation class.
 */

require_once get_template_directory() . '/inc/plugins/class-tgm-plugin-activation.php';

add_action( 'tgmpa_register', 'reveal_register_js_composer_plugins' );
/**
 * Register the required plugins for this theme.
 *
 * The variable passed to tgmpa_register_plugins() should be an array of plugin
 * arrays.
 *
 * This function is hooked into tgmpa_init, which is fired within the
 * TGM_Plugin_Activation class constructor.
 */
function reveal_register_js_composer_plugins() {
    /**
     * Array of plugin arrays. Required keys are name and slug.
     * If the source is NOT from the .org repo, then source is also required.
     */
    $plugins = array(
        // This is an example of how to include a plugin pre-packaged with a theme
        array(
            'name'          => 'King Composer', // The plugin name
            'slug'          => 'kingcomposer', // The plugin slug (typically the folder name)
            'required'          => true, // If false, the plugin is only 'recommended' instead of required
        ),

        array(
            'name'          => 'Meta Box', // The plugin name
            'slug'          => 'meta-box', // The plugin slug (typically the folder name)
            'required'          => true, // If false, the plugin is only 'recommended' instead of required
        ),

        array(
            'name'          => 'Reveal KC Shortcodes', // The plugin name
            'slug'          => 'reveal-kc-shortcodes', // The plugin slug (typically the folder name)
            'source'        => 'http://themeitems.com/wp/plugins/codexin-kc-shortcodes.zip',
            'required'          => true, // If false, the plugin is only 'recommended' instead of required
            'version'           => '1.0', // E.g. 1.0.0. If set, the active plugin must be this version or higher, otherwise a notice is presented
            'force_activation'      => false, // If true, plugin is activated upon theme activation and cannot be deactivated until theme switch
            'force_deactivation'    => false, // If true, plugin is deactivated upon theme switch, useful for theme-specific plugins
            'external_url'      => '', // If set, overrides default API URL and points to an external URL
        ),

        array(
            'name'          => 'Contact Form 7', // The plugin name
            'slug'          => 'contact-form-7', // The plugin slug (typically the folder name)
            'required'          => true, // If false, the plugin is only 'recommended' instead of required
        )
    );
  
    // Change this to your theme text domain, used for internationalising strings
    //$theme_text_domain = 'reveal';
  
    /**
     * Array of configuration settings. Amend each line as needed.
     * If you want the default strings to be available under your own theme domain,
     * leave the strings uncommented.
     * Some of the strings are added into a sprintf, so see the comments at the
     * end of each line for what each argument will be.
     */
    $config = array(
        'domain'        => 'reveal', // Text domain - likely want to be the same as your theme.
        'default_path'      => '', // Default absolute path to pre-packaged plugins
        'parent_slug'  => 'themes.php', // Default parent menu slug
        'capability'   => 'edit_theme_options',    // Capability needed to view plugin install page, should be a capability associated with the parent menu used.
        //'parent_url_slug'   => 'themes.php', // Default parent URL slug
        'menu'          => 'install-required-plugins', // Menu slug
        'has_notices'       => true, // Show admin notices or not
        'is_automatic'      => false, // Automatically activate plugins after installation or not
        'message'       => '', // Message to output right before the plugins table
        'strings'       => array(
            'page_title'            => esc_html__( 'Install Required Plugins', 'reveal' ),
            'menu_title'            => esc_html__( 'Install Plugins', 'reveal' ),
            'installing'            => esc_html__( 'Installing Plugin: %s', 'reveal' ), // %1$s = plugin name
            'oops'              => esc_html__( 'Something went wrong with the plugin API.', 'reveal' ),
            'notice_can_install_required'   => _n_noop( 'This theme requires the following plugin: %1$s.', 'This theme requires the following plugins: %1$s.', 'reveal' ), // %1$s = plugin name(s)
            'notice_can_install_recommended'    => _n_noop( 'This theme recommends the following plugin: %1$s.', 'This theme recommends the following plugins: %1$s.', 'reveal' ), // %1$s = plugin name(s)
            'notice_cannot_install'     => _n_noop( 'Sorry, but you do not have the correct permissions to install the %s plugin. Contact the administrator of this site for help on getting the plugin installed.', 'Sorry, but you do not have the correct permissions to install the %s plugins. Contact the administrator of this site for help on getting the plugins installed.', 'reveal' ), // %1$s = plugin name(s)
            'notice_can_activate_required'  => _n_noop( 'The following required plugin is currently inactive: %1$s.', 'The following required plugins are currently inactive: %1$s.', 'reveal' ), // %1$s = plugin name(s)
            'notice_can_activate_recommended'   => _n_noop( 'The following recommended plugin is currently inactive: %1$s.', 'The following recommended plugins are currently inactive: %1$s.', 'reveal' ), // %1$s = plugin name(s)
            'notice_cannot_activate'        => _n_noop( 'Sorry, but you do not have the correct permissions to activate the %s plugin. Contact the administrator of this site for help on getting the plugin activated.', 'Sorry, but you do not have the correct permissions to activate the %s plugins. Contact the administrator of this site for help on getting the plugins activated.', 'reveal' ), // %1$s = plugin name(s)
            'notice_ask_to_update'      => _n_noop( 'The following plugin needs to be updated to its latest version to ensure maximum compatibility with this theme: %1$s.', 'The following plugins need to be updated to their latest versions to ensure maximum compatibility with this theme: %1$s.', 'reveal' ), // %1$s = plugin name(s)
            'notice_cannot_update'      => _n_noop( 'Sorry, but you do not have the correct permissions to update the %s plugin. Contact the administrator of this site for help on getting the plugin updated.', 'Sorry, but you do not have the correct permissions to update the %s plugins. Contact the administrator of this site for help on getting the plugins updated.', 'reveal' ), // %1$s = plugin name(s)
            'install_link'          => _n_noop( 'Begin installing plugin', 'Begin installing plugins', 'reveal' ),
            'activate_link'         => _n_noop( 'Activate installed plugin', 'Activate installed plugins', 'reveal' ),
            'return'                => esc_html__( 'Return to Required Plugins Installer', 'reveal' ),
            'plugin_activated'          => esc_html__( 'Plugin activated successfully.', 'reveal' ),
            'complete'              => esc_html__( 'All plugins installed and activated successfully. %s', 'reveal' ), // %1$s = dashboard link
            'nag_type'              => 'updated' // Determines admin notice type - can only be 'updated' or 'error'
        )
    );
    tgmpa( $plugins, $config );
}
