<?php

// Exit if accessed directly
if ( !defined('ABSPATH')) exit;


if ( ! class_exists( 'Codexin_Admin' ) ) {

    class Codexin_Admin
    {
        public $args = array();
        public $sections = array();
        public $theme;
        public $ReduxFramework;

        public function __construct()
        {
            if (!class_exists('ReduxFramework')) {
                return;
            }
            if (true == Redux_Helpers::isTheme(__FILE__)) {
                $this->initSettings();
            } else {
                add_action('plugins_loaded', array($this, 'initSettings'), 10);
            }
        }

        public function initSettings()
        {

            $this->theme = wp_get_theme();
            $this->setArguments();
            $this->setSections();
            if (!isset($this->args['opt_name'])) {
                return;
            }
            $this->ReduxFramework = new ReduxFramework($this->sections, $this->args);
        }

        public function setArguments()
        {

            $this->args = array(
                // TYPICAL -> Change these values as you need/desire
                'opt_name' => CODEXIN_THEME_OPTIONS,
                // This is where your data is stored in the database and also becomes your global variable name.
                'display_name' => $this->theme->get('Name'),
                // Name that appears at the top of your panel
                'display_version' => $this->theme->get('Version'),
                // Version that appears at the top of your panel
                'menu_type' => 'menu',
                //Specify if the admin menu should appear or not. Options: menu or submenu (Under appearance only)
                'allow_sub_menu' => true,
                // Show the sections below the admin menu item or not
                'menu_title' => esc_html__('Reveal Options', 'reveal'),

                'page_title' => $this->theme->get('Name') . ' ' . esc_html__('Theme Options', 'reveal'),
                // You will need to generate a Google API key to use this feature.
                // Please visit: https://developers.google.com/fonts/docs/developer_api#Auth
                // You will need to generate a Google API key to use this feature.
                // Please visit: https://developers.google.com/fonts/docs/developer_api#Auth
                'google_api_key' => '',
                // Set it you want google fonts to update weekly. A google_api_key value is required.
                'google_update_weekly' => false,
                // Must be defined to add google fonts to the typography module
                'async_typography' => false,
                // Use a asynchronous font on the front end or font string
                //'disable_google_fonts_link' => true,                    // Disable this in case you want to create your own google fonts loader
                'admin_bar' => true,
                // Show the panel pages on the admin bar
                'admin_bar_icon' => 'dashicons-portfolio',
                // Choose an icon for the admin bar menu
                'admin_bar_priority' => 50,
                // Choose an priority for the admin bar menu
                'global_variable' => '',
                // Set a different name for your global variable other than the opt_name
                'dev_mode' => true,
                // Show the time the page took to load, etc
                'update_notice' => false,
                // If dev_mode is enabled, will notify developer of updated versions available in the GitHub Repo
                'customizer' => false,
                // Enable basic customizer support
                //'open_expanded'     => true,                    // Allow you to start the panel in an expanded way initially.
                //'disable_save_warn' => true,                    // Disable the save warning when a user changes a field

                // OPTIONAL -> Give you extra features
                'page_priority' => 99,
                // Order where the menu appears in the admin area. If there is any conflict, something will not show. Warning.
                'page_parent' => 'themes.php',
                // For a full list of options, visit: http://codex.wordpress.org/Function_Reference/add_submenu_page#Parameters
                'page_permissions' => 'manage_options',
                // Permissions needed to access the options panel.
                'menu_icon' => 'dashicons-welcome-widgets-menus',
                // Specify a custom URL to an icon
                'last_tab' => '',
                // Force your panel to always open to a specific tab (by id)
                'page_icon' => 'icon-themes',
                // Icon displayed in the admin panel next to your menu_title
                'page_slug' => 'reveal',
                // Page slug used to denote the panel
                'save_defaults' => true,
                // On load save the defaults to DB before user clicks save or not
                'default_show' => false,
                // If true, shows the default value next to each field that is not the default value.
                'default_mark' => '',
                // What to print by the field's title if the value shown is default. Suggested: *
                'show_import_export' => true,
                // Shows the Import/Export panel when not used as a field.

                // CAREFUL -> These options are for advanced use only
                'transient_time' => 60 * MINUTE_IN_SECONDS,
                'output' => true,
                // Global shut-off for dynamic CSS output by the framework. Will also disable google fonts output
                'output_tag' => true,
                // FUTURE -> Not in use yet, but reserved or partially implemented. Use at your own risk.
                'database' => '',
                // possible: options, theme_mods, theme_mods_expanded, transient. Not fully functional, warning!
                'system_info' => true,
                // REMOVE
            );

        }

        public function setSections()
        {

            $this->sections[] = array(
                'title'  => esc_html__( 'Typography', 'reveal' ),
                'id'     => 'reveal-typography',
                'desc'   => esc_html__( 'Theme Typography Section ', 'reveal' ),
                'icon'   => 'el el-font',
                'fields' => array(
                    array(
                        'id'       => 'reveal-typography-body',
                        'type'     => 'typography',
                        'title'    => esc_html__( 'Body Font', 'reveal' ),
                        'subtitle' => esc_html__( 'Specify the body font properties.', 'reveal' ),
                        'google'   => true,
                        'font-backup' => true,
                        'output'   => array('body'),
                        'default'  => array(
                            'color'       => '#333',
                            'font-size'   => '16px',
                            'line-height' => '26px',
                            'font-family' => 'Arial,Helvetica,sans-serif',
                            'font-weight' => 'Normal',
                        ),
                    ),
                    array(
                        'id'          => 'reveal-typography-h2',
                        'type'        => 'typography',
                        'title'       => esc_html__( 'Typography h2', 'reveal' ),
                        //'compiler'      => true,  // Use if you want to hook in your own CSS compiler
                        //'google'      => false,
                        // Disable google fonts. Won't work if you haven't defined your google api key
                        'font-backup' => true,
                        // Select a backup non-google font in addition to a google font
                        //'font-style'    => false, // Includes font-style and weight. Can use font-style or font-weight to declare
                        //'subsets'       => false, // Only appears if google is true and subsets not set to false
                        //'font-size'     => false,
                        //'line-height'   => false,
                        //'word-spacing'  => true,  // Defaults to false
                        //'letter-spacing'=> true,  // Defaults to false
                        //'color'         => false,
                        //'preview'       => false, // Disable the previewer
                        //'all_styles'  => true,
                        // Enable all Google Font style/weight variations to be added to the page
                        'output'      => array( 'h2' ),
                        'google'      => true,
                        // An array of CSS selectors to apply this font style to dynamically
                        //'compiler'    => array( 'h2' ),
                        // An array of CSS selectors to apply this font style to dynamically
                        'units'       => 'px',
                        // Defaults to px
                        'subtitle'    => esc_html__( 'Typography option with each property can be called individually.', 'reveal' ),
                        'default'     => array(
                            'color'       => '#333',
                            'font-style'  => '700',
                            'font-family' => 'Abel',
                            'font-size'   => '33px',
                            'line-height' => '40px'
                        ),
                    ),

                    array(
                        'id'       => 'reveal-typography-h3',
                        'type'     => 'typography',
                        'title'    => esc_html__( 'Typography h3', 'reveal' ),
                        'subtitle' => esc_html__( 'Specify h3 font properties.', 'reveal' ),
                        'font-backup' => true,
                        'google'   => true,
                        'output'   => array('h3'),
                        'default'  => array(
                            'color'       => '#333',
                            'font-size'   => '16px',
                            'line-height' => '26px',
                            'font-family' => 'Arial,Helvetica,sans-serif',
                            'font-weight' => 'Normal',
                        ),
                    ),

                    array(
                        'id'       => 'reveal-typography-h4',
                        'type'     => 'typography',
                        'title'    => esc_html__( 'Typography h4', 'reveal' ),
                        'subtitle' => esc_html__( 'Specify h4 font properties.', 'reveal' ),
                        'font-backup' => true,
                        'google'   => true,
                        'output'   => array('h4'),
                        'default'  => array(
                            'color'       => '#333',
                            'font-size'   => '16px',
                            'line-height' => '26px',
                            'font-family' => 'Arial,Helvetica,sans-serif',
                            'font-weight' => 'Normal',
                        ),
                    ),

                    array(
                        'id'       => 'reveal-typography-h5',
                        'type'     => 'typography',
                        'title'    => esc_html__( 'Typography h5', 'reveal' ),
                        'subtitle' => esc_html__( 'Specify h5 font properties.', 'reveal' ),
                        'font-backup' => true,
                        'google'   => true,
                        'output'   => array('h5'),
                        'default'  => array(
                            'color'       => '#333',
                            'font-size'   => '16px',
                            'line-height' => '26px',
                            'font-family' => 'Arial,Helvetica,sans-serif',
                            'font-weight' => 'Normal',
                        ),
                    ),

                    array(
                        'id'       => 'reveal-typography-h6',
                        'type'     => 'typography',
                        'title'    => esc_html__( 'Typography h6', 'reveal' ),
                        'subtitle' => esc_html__( 'Specify h6 font properties.', 'reveal' ),
                        'font-backup' => true,
                        'google'   => true,
                        'output'   => array('h6'),
                        'default'  => array(
                            'color'       => '#333',
                            'font-size'   => '16px',
                            'line-height' => '26px',
                            'font-family' => 'Arial,Helvetica,sans-serif',
                            'font-weight' => 'Normal',
                        ),
                    ),
                ));


            $this->sections[] = array(
                'title'            => esc_html__( 'Header', 'reveal' ),
                'icon'             => 'dashicons dashicons-admin-settings',
                'id'               => 'reveal-header-option',
                'customizer_width' => '500px',
            );

            $this->sections[] = array(
                'title'            => esc_html__( 'Header Versions', 'reveal' ),
                'id'               => 'reveal-header',
                'customizer_width' => '500px',
                'subsection'       => true,
                'fields'           => array(

                    array(
                        'id'       => 'reveal-header-version',
                        'type'     => 'image_select',
                        'title'    => esc_html__( 'Select Navigation Type', 'reveal' ),
                        'desc'     => esc_html__( 'Choose Header Type', 'reveal' ),
                        //Must provide key => value pairs for select options
                        'options'  => array(
                            '1' => array(
                                'alt' => 'Header-1',
                                'img' => get_template_directory_uri() . '/assets/images/admin/header-1.png'
                            ),
                            '2' => array(
                                'alt' => 'Header-2',
                                'img' => get_template_directory_uri() . '/assets/images/admin/header-2.png'
                            ),
                            '3' => array(
                                'alt' => 'Header-3',
                                'img' => get_template_directory_uri() . '/assets/images/admin/header-3.png'
                            ),
                            '4' => array(
                                'alt' => 'Header-4',
                                'img' => get_template_directory_uri() . '/assets/images/admin/header-4.png'
                            ),
                        ),
                        'default'  => '1'
                    ),              )
            );

            $this->sections[] = array(
                'title'            => esc_html__( 'Header Top Options', 'reveal' ),
                'id'               => 'reveal-email-phone',
                'customizer_width' => '500px',
                'subsection'       => true,
                'fields'           => array(

                    array(
                        'id'       => 'reveal-header-top',
                        'type'     => 'switch',
                        'title'    => esc_html__( 'Enable Header Top?', 'reveal' ),
                        'subtitle' => esc_html__( 'Select to enable/disable header top', 'reveal' ),
                        'default'  => 1,
                        'on'       => 'Enabled',
                        'off'      => 'Disabled',
                    ),

                    array(
                        'id'       => 'reveal-phone',
                        'type'     => 'text',
                        'required' => array( 'reveal-header-top', '=', '1' ),
                        'title'    => esc_html__( 'Phone Number', 'reveal' ),
                        'desc'     => esc_html__( 'Please insert  Your Phone: example: (707) 123-4567 ', 'reveal' ),
                        'default'  => '(707) 123-4567',
                    ),


                    array(
                        'id'       => 'reveal-phone-url',
                        'type'     => 'text',
                        'required' => array( 'reveal-header-top', '=', '1' ),
                        'title'    => esc_html__( 'Phone Number URL', 'reveal' ),
                        'desc'     => esc_html__( 'Please enter phone number URL: example: +17071234567  ', 'reveal' ),
                        'default'  => '+7071234567',
                    ),

                    array(
                        'id'       => 'reveal-email',
                        'type'     => 'text',
                        'required' => array( 'reveal-header-top', '=', '1' ),
                        'title'    => esc_html__( 'Email', 'reveal' ),
                        'desc'     => esc_html__( 'Please insert  Your Email  ', 'reveal' ),
                        'default'  => 'email@email.com',
                    ),              )
            );

            $this->sections[] = array(
                'title'            => esc_html__( 'Logo', 'reveal' ),
                'customizer_width' => '500px',
                'id'               => 'reveal-logo-section',
                'subsection'       => true,
                'fields'           => array(
                    array(
                        'id'       => 'reveal-logo',
                        'type'     => 'media',
                        'title'    => esc_html__( 'Logo  ', 'reveal' ),
                        'desc'     => esc_html__( 'Please Upload  Logo ', 'reveal' ),
                        'default'  => array( 'url' => 'http://placehold.it/250X50' ),
                    ),
                                    )
            );

            $this->sections[] = array(
                'title'            => esc_html__( 'Breadcrumbs', 'reveal' ),
                'customizer_width' => '500px',
                'id'               => 'reveal-bc',
                'subsection'       => true,
                'fields'           => array(
                    array(
                        'id'       => 'reveal-bcrumbs',
                        'type'     => 'switch',
                        'title'    => esc_html__( 'Enable Breadcrumbs?', 'reveal' ),
                        'subtitle' => esc_html__( 'Select to enable/disable Breadcrumbs', 'reveal' ),
                        'default'  => 1,
                        'on'       => 'Enabled',
                        'off'      => 'Disabled',
                    ),
                                    )
            );

            $this->sections[] = array(
                'title'            => esc_html__( 'Social Media ', 'reveal' ),
                'customizer_width' => '500px',
                'id'               => 'reveal-social-media',
                'icon'             => 'dashicons dashicons-share',
                'fields'           => array(
                    array(
                        'id'       => 'reveal-twitter',
                        'type'     => 'text',
                        'title'    => esc_html__( 'Twitter ', 'reveal' ),
                        'desc'     => esc_html__( 'Please Insert Twitter Profile URL  ', 'reveal' ),
                        'default'  => '',
                    ),
                    array(
                        'id'       => 'reveal-facebook',
                        'type'     => 'text',
                        'title'    => esc_html__( 'Facebook ', 'reveal' ),
                        'desc'     => esc_html__( 'Please Insert Facebook Profile URL  ', 'reveal' ),
                        'default'  => '',
                    ),

                    array(
                        'id'       => 'reveal-instagram',
                        'type'     => 'text',
                        'title'    => esc_html__( 'Instagram ', 'reveal' ),
                        'desc'     => esc_html__( 'Please Insert Instagram Profile URL  ', 'reveal' ),
                        'default'  => '',
                    ),

                    array(
                        'id'       => 'reveal-pinterest',
                        'type'     => 'text',
                        'title'    => esc_html__( 'Pinterest ', 'reveal' ),
                        'desc'     => esc_html__( 'Please Insert Pinterest Profile URL  ', 'reveal' ),
                        'default'  => '',
                    ), 

                     array(
                        'id'       => 'reveal-behance',
                        'type'     => 'text',
                        'title'    => esc_html__( 'Behance ', 'reveal' ),
                        'desc'     => esc_html__( 'Please Insert Behance Profile URL  ', 'reveal' ),
                        'default'  => '',
                    ),

                     array(
                        'id'       => 'reveal-google-plus',
                        'type'     => 'text',
                        'title'    => esc_html__( 'Google-Plus ', 'reveal' ),
                        'desc'     => esc_html__( 'Please Insert Google Plus Profile URL  ', 'reveal' ),
                        'default'  => '',
                    ),                       

                     array(
                        'id'       => 'reveal-linkedin',
                        'type'     => 'text',
                        'title'    => esc_html__( 'Linkedin ', 'reveal' ),
                        'desc'     => esc_html__( 'Please Insert Linkedin Profile URL  ', 'reveal' ),
                        'default'  => '',
                    ),

                     array(
                        'id'       => 'reveal-youtube',
                        'type'     => 'text',
                        'title'    => esc_html__( 'Youtube ', 'reveal' ),
                        'desc'     => esc_html__( 'Please Insert Youtube Profile URL  ', 'reveal' ),
                        'default'  => '',
                    ),

                     array(
                        'id'       => 'reveal-skype',
                        'type'     => 'text',
                        'title'    => esc_html__( 'Skype ', 'reveal' ),
                        'desc'     => esc_html__( 'Please Insert Skype Profile URL  ', 'reveal' ),
                        'default'  => '',
                    ),
                                )
                            );    


            // footer section 

            $this->sections[] = array(
                'title'            => esc_html__( 'Footer', 'reveal' ),
                'icon'             => 'dashicons dashicons-admin-generic',
                'id'               => 'reveal-footer-option',
                'customizer_width' => '500px',
            );

            $this->sections[] = array(
                'title'            => esc_html__( 'Footer Layout', 'reveal' ),
                'customizer_width' => '500px',
                'id'               => 'reveal-footer',
                'subsection'       => true,
                'fields'           => array(

                    array(
                        'id'       => 'reveal-footer-version',
                        'type'     => 'image_select',
                        'title'    => esc_html__( 'Select Footer Layout Type', 'reveal' ),
                        'desc'     => esc_html__( 'Choose Footer Layout Type', 'reveal' ),
                        //Must provide key => value pairs for select options
                        'options'  => array(
                            '1' => array(
                                'alt' => 'Footer-1',
                                'img' => get_template_directory_uri() . '/assets/images/admin/footer-1.jpg'
                            ),
                            '2' => array(
                                'alt' => 'Footer-2',
                                'img' => get_template_directory_uri() . '/assets/images/admin/footer-2.jpg'
                            ),
                            '3' => array(
                                'alt' => 'Footer-3',
                                'img' => get_template_directory_uri() . '/assets/images/admin/footer-3.jpg'
                            ),
                            '4' => array(
                                'alt' => 'Footer-4',
                                'img' => get_template_directory_uri() . '/assets/images/admin/footer-4.jpg'
                            ),
                            '5' => array(
                                'alt' => 'Footer-5',
                                'img' => get_template_directory_uri() . '/assets/images/admin/footer-5.jpg'
                            ),
                            '6' => array(
                                'alt' => 'Footer-6',
                                'img' => get_template_directory_uri() . '/assets/images/admin/footer-6.jpg'
                            ),
                        ),
                        'default'  => '1'
                    ),
                )
            );

            $this->sections[] = array(
                'title'            => esc_html__( 'Footer Copyright', 'reveal' ),
                'customizer_width' => '500px',
                'id'               => 'reveal-footer-cpr',
                'subsection'       => true,
                'fields'           => array(

                    array(
                        'id'       => 'reveal-footer_copyright',
                        'type'     => 'switch',
                        'title'    => esc_html__( 'Enable Footer Copyright?', 'reveal' ),
                        'subtitle' => esc_html__( 'Select to enable/disable Footer Copyright', 'reveal' ),
                        'default'  => 1,
                        'on'       => 'Enabled',
                        'off'      => 'Disabled',
                    ),


                    array(
                        'id'       => 'reveal-copyright',
                        'type'     => 'textarea',
                        'required' => array( 'reveal-footer_copyright', '=', '1' ),
                        'title'    => esc_html__( 'Footer copyright text  ', 'reveal' ),
                        'desc'     => esc_html__( 'Please add your copyright text  ', 'reveal' ),
                        'validate' => 'html',
                        'default'  => 'HTML is allowed in here.'
                    ),
                )
            );
                    



            $this->sections[] = array(
                    'title'            => esc_html__( 'Map Settings', 'reveal' ),
                    'customizer_width' => '500px',
                    'icon'             => 'dashicons dashicons-admin-post',
                    'id'               => 'reveal-map-parent',
                    'desc'             => esc_html('You can find the <strong>Latitude</strong> and <strong>Longitude</strong> information by placing your address <a href="'. esc_url(__('//latlong.net/', 'reveal')) .'" target="_blank">Here</a>', 'reveal'),
                    'fields'           => array(


                        array(
                            'title' => esc_html__('Insert Google Map API Key', 'reveal'),
                            'desc' => 'Enter Your Google Map API Key',
                            'id'    => 'reveal-google-map-api-key',                  
                            'type'  => 'text',
                            'desc'  => esc_html('If you don\'t have the API key yet, then <a href="'. esc_url(__('//developers.google.com/maps/documentation/javascript/get-api-key', 'reveal')) .'" target="_blank">Click Here</a> to get a API key', 'reveal'), 
                            'default' => ''
                        ),

                        array(
                            'title' => esc_html__('Insert Map Latitude', 'reveal'),
                            'id'    => 'reveal-google-map-latitude',
                            'type'  => 'text',
                            'default' => '39.414269'
                        ),

                        array(
                            'title' => esc_html__('Insert Map Longitude', 'reveal'),
                            'id'    => 'reveal-google-map-longitude',
                            'type'  => 'text',
                            'default' => '-77.410541'
                        ),

                        array(
                            'title' => esc_html__('Map Zoom Level', 'reveal'),
                            'id'    => 'reveal-google-map-zoom',
                            'type'  => 'text',
                            'default' => '15'
                        ),

                        array(
                            'id'       => 'reveal-google-map-marker',
                            'type'     => 'media',
                            'url'      => true,
                            'title'    => esc_html__( 'Upload Map Marker', 'reveal' ),
                            'compiler' => 'true',
                            'default'  => array( 'url' => get_template_directory_uri() . '/assets/images/admin/map-marker-1.png' ),
                        ),

                    )
                );


        }
    }

    global $reduxConfig;
    $reduxConfig = new Codexin_Admin();

} else {
    echo "The class named Redux_Framework_sample_config has already been called. <strong>Developers, you need to prefix this class with your company name or you'll run into problems!</strong>";
}

