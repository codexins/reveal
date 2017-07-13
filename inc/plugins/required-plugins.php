<?php
/**
 * Include the TGM_Plugin_Activation class.
 */
require_once get_template_directory() . '/inc/plugins/class-tgm-plugin-activation.php';

add_action( 'tgmpa_register', 'reveal_register_js_composer_plugins' );

function reveal_register_js_composer_plugins() {

    /**
     * Array of plugin arrays. Required keys are name and slug.
     * If the source is NOT from the .org repo, then source is also required.
     */
    $plugins = array(

            array(
                'name'              => 'Codexin Core', // The plugin name
                'slug'              => 'codexin-core', // The plugin slug (typically the folder name)
                'source'            => 'http://themeitems.com/wp/plugins/codexin-core.zip',
                'required'          => true, // If false, the plugin is only 'recommended' instead of required
                'version'           => '1.0', // E.g. 1.0.0. If set, the active plugin must be this version or higher, otherwise a notice is presented
                'force_activation'  => false, // If true, plugin is activated upon theme activation and cannot be deactivated until theme switch
                'force_deactivation'=> false, // If true, plugin is deactivated upon theme switch, useful for theme-specific plugins
                'external_url'      => '', // If set, overrides default API URL and points to an external URL
            ),

            array(
                'name' => 'Redux - Options framework',
                'slug' => 'redux-framework',
                'required' => true,
            ),

            array(
                'name'              => 'King Composer', // The plugin name
                'slug'              => 'kingcomposer', // The plugin slug (typically the folder name)
                'required'          => true, // If false, the plugin is only 'recommended' instead of required
            ),

            array(
                'name'              => 'Meta Box', // The plugin name
                'slug'              => 'meta-box', // The plugin slug (typically the folder name)
                'required'          => true, // If false, the plugin is only 'recommended' instead of required
            ),

            array(
                'name'              => 'Contact Form 7', // The plugin name
                'slug'              => 'contact-form-7', // The plugin slug (typically the folder name)
                'required'          => true, // If false, the plugin is only 'recommended' instead of required
            )

    );
    $config = array(
        'id'           => 'tgmpa',                 // Unique ID for hashing notices for multiple instances of TGMPA.
        'default_path' => '',                      // Default absolute path to bundled plugins.
        'menu'         => 'tgmpa-install-plugins', // Menu slug.
        'parent_slug'  => 'themes.php',            // Parent menu slug.
        'capability'   => 'edit_theme_options',    // Capability needed to view plugin install page, should be a capability associated with the parent menu used.
        'has_notices'  => true,                    // Show admin notices or not.
        'dismissable'  => true,                    // If false, a user cannot dismiss the nag message.
        'dismiss_msg'  => '',                      // If 'dismissable' is false, this message will be output at top of nag.
        'is_automatic' => false,                   // Automatically activate plugins after installation or not.
        'message'      => '',                      // Message to output right before the plugins table.

    );

    tgmpa( $plugins, $config );
}

