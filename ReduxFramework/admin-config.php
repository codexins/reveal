<?php
    /**
     * ReduxFramework Sample Config File
     * For full documentation, please visit: http://docs.reduxframework.com/
     */

    if ( ! class_exists( 'Redux' ) ) {
        return;
    }


    // This is your option name where all the Redux data is stored.
    $opt_name = CODEXIN_THEME_OPTIONS;

    // This line is only for altering the demo. Can be easily removed.
    $opt_name = apply_filters( 'reveal/opt_name', $opt_name );

    /*
     *
     * --> Used within different fields. Simply examples. Search for ACTUAL DECLARATION for field examples
     *
     */

    $sampleHTML = '';
    if ( file_exists( dirname( __FILE__ ) . '/info-html.html' ) ) {
        Redux_Functions::initWpFilesystem();

        global $wp_filesystem;

        $sampleHTML = $wp_filesystem->get_contents( dirname( __FILE__ ) . '/info-html.html' );
    }

    // Background Patterns Reader
    $sample_patterns_path = ReduxFramework::$_dir . '../sample/patterns/';
    $sample_patterns_url  = ReduxFramework::$_url . '../sample/patterns/';
    $sample_patterns      = array();
    
    if ( is_dir( $sample_patterns_path ) ) {

        if ( $sample_patterns_dir = opendir( $sample_patterns_path ) ) {
            $sample_patterns = array();

            while ( ( $sample_patterns_file = readdir( $sample_patterns_dir ) ) !== false ) {

                if ( stristr( $sample_patterns_file, '.png' ) !== false || stristr( $sample_patterns_file, '.jpg' ) !== false ) {
                    $name              = explode( '.', $sample_patterns_file );
                    $name              = str_replace( '.' . end( $name ), '', $sample_patterns_file );
                    $sample_patterns[] = array(
                        'alt' => $name,
                        'img' => $sample_patterns_url . $sample_patterns_file
                    );
                }
            }
        }
    }

    /**
     * ---> SET ARGUMENTS
     * All the possible arguments for Redux.
     * For full documentation on arguments, please refer to: https://github.com/ReduxFramework/ReduxFramework/wiki/Arguments
     * */

    $theme = wp_get_theme(); // For use with some settings. Not necessary.

    $args = array(
        // TYPICAL -> Change these values as you need/desire
        'opt_name'             => $opt_name,
        // This is where your data is stored in the database and also becomes your global variable name.

        'disable_tracking' => true,
        
        'display_name'         => $theme->get( 'Name' ),
        // Name that appears at the top of your panel
        'display_version'      => $theme->get( 'Version' ),
        // Version that appears at the top of your panel
        'menu_type'            => 'menu',
        //Specify if the admin menu should appear or not. Options: menu or submenu (Under appearance only)
        'allow_sub_menu'       => true,
        // Show the sections below the admin menu item or not
        'menu_title'           => __( 'Theme Options', 'reveal' ),
        'page_title'           => __( 'Theme Options', 'reveal' ),
        // You will need to generate a Google API key to use this feature.
        // Please visit: https://developers.google.com/fonts/docs/developer_api#Auth
        'google_api_key'       => '',
        // Set it you want google fonts to update weekly. A google_api_key value is required.
        'google_update_weekly' => false,
        // Must be defined to add google fonts to the typography module
        'async_typography'     => true,
        // Use a asynchronous font on the front end or font string
        //'disable_google_fonts_link' => true,                    // Disable this in case you want to create your own google fonts loader
        'admin_bar'            => true,
        // Show the panel pages on the admin bar
        'admin_bar_icon'       => 'dashicons-portfolio',
        // Choose an icon for the admin bar menu
        'admin_bar_priority'   => 50,
        // Choose an priority for the admin bar menu
        'global_variable'      => '',
        // Set a different name for your global variable other than the opt_name
        'dev_mode'             => false,
        // Show the time the page took to load, etc
        'update_notice'        => false,
        // If dev_mode is enabled, will notify developer of updated versions available in the GitHub Repo
        'customizer'           => true,
        // Enable basic customizer support
        //'open_expanded'     => true,                    // Allow you to start the panel in an expanded way initially.
        //'disable_save_warn' => true,                    // Disable the save warning when a user changes a field

        // OPTIONAL -> Give you extra features
        'page_priority'        => null,
        // Order where the menu appears in the admin area. If there is any conflict, something will not show. Warning.
        'page_parent'          => 'themes.php',
        // For a full list of options, visit: http://codex.wordpress.org/Function_Reference/add_submenu_page#Parameters
        'page_permissions'     => 'manage_options',
        // Permissions needed to access the options panel.
        'menu_icon'            => '',
        // Specify a custom URL to an icon
        'last_tab'             => '',
        // Force your panel to always open to a specific tab (by id)
        'page_icon'            => 'icon-themes',
        // Icon displayed in the admin panel next to your menu_title
        'page_slug'            => '',
        // Page slug used to denote the panel, will be based off page title then menu title then opt_name if not provided
        'save_defaults'        => true,
        // On load save the defaults to DB before user clicks save or not
        'default_show'         => false,
        // If true, shows the default value next to each field that is not the default value.
        'default_mark'         => '',
        // What to print by the field's title if the value shown is default. Suggested: *
        'show_import_export'   => true,
        // Shows the Import/Export panel when not used as a field.

        // CAREFUL -> These options are for advanced use only
        'transient_time'       => 60 * MINUTE_IN_SECONDS,
        'output'               => true,
        // Global shut-off for dynamic CSS output by the framework. Will also disable google fonts output
        'output_tag'           => true,
        // Allows dynamic CSS to be generated for customizer and google fonts, but stops the dynamic CSS from going to the head
        // 'footer_credit'     => '',                   // Disable the footer credit of Redux. Please leave if you can help it.

        // FUTURE -> Not in use yet, but reserved or partially implemented. Use at your own risk.
        'database'             => '',
        // possible: options, theme_mods, theme_mods_expanded, transient. Not fully functional, warning!
        'use_cdn'              => true,
        // If you prefer not to use the CDN for Select2, Ace Editor, and others, you may download the Redux Vendor Support plugin yourself and run locally or embed it in your code.

        // HINTS
        'hints'                => array(
            'icon'          => 'el el-question-sign',
            'icon_position' => 'right',
            'icon_color'    => 'lightgray',
            'icon_size'     => 'normal',
            'tip_style'     => array(
                'color'   => 'red',
                'shadow'  => true,
                'rounded' => false,
                'style'   => '',
            ),
            'tip_position'  => array(
                'my' => 'top left',
                'at' => 'bottom right',
            ),
            'tip_effect'    => array(
                'show' => array(
                    'effect'   => 'slide',
                    'duration' => '500',
                    'event'    => 'mouseover',
                ),
                'hide' => array(
                    'effect'   => 'slide',
                    'duration' => '500',
                    'event'    => 'click mouseleave',
                ),
            ),
        )
    );

    // ADMIN BAR LINKS -> Setup custom links in the admin bar menu as external items.
    $args['admin_bar_links'][] = array(
        'id'    => 'redux-docs',
        'href'  => 'http://docs.reduxframework.com/',
        'title' => __( 'Documentation', 'reveal' ),
    );

    $args['admin_bar_links'][] = array(
        //'id'    => 'redux-support',
        'href'  => 'https://github.com/ReduxFramework/redux-framework/issues',
        'title' => __( 'Support', 'reveal' ),
    );

    $args['admin_bar_links'][] = array(
        'id'    => 'redux-extensions',
        'href'  => 'reduxframework.com/extensions',
        'title' => __( 'Extensions', 'reveal' ),
    );

    // SOCIAL ICONS -> Setup custom links in the footer for quick links in your panel footer icons.
   

    // Panel Intro text -> before the form
    if ( ! isset( $args['global_variable'] ) || $args['global_variable'] !== false ) {
        if ( ! empty( $args['global_variable'] ) ) {
            $v = $args['global_variable'];
        } else {
            $v = str_replace( '-', '_', $args['opt_name'] );
        }
        $args['intro_text'] = sprintf( __( '<p>Welcome to Reveal Theme options</p>', 'reveal' ), $v );
    } else {
        $args['intro_text'] = __( '<p>Thanks for using Reveal Theme Options</p>', 'reveal' );
    }

    // Add content after the form.
    $args['footer_text'] = __( '<p>Thanks for using Reveal Theme Options</p>', 'reveal' );

    Redux::setArgs( $opt_name, $args );

    /*
     * ---> END ARGUMENTS
     */


    /*
     * ---> START HELP TABS
     */

    $tabs = array(
        array(
            'id'      => 'redux-help-tab-1',
            'title'   => __( 'Theme Information 1', 'reveal' ),
            'content' => __( '<p>This is the tab content, HTML is allowed.</p>', 'reveal' )
        ),
        array(
            'id'      => 'redux-help-tab-2',
            'title'   => __( 'Theme Information 2', 'reveal' ),
            'content' => __( '<p>This is the tab content, HTML is allowed.</p>', 'reveal' )
        )
    );
    Redux::setHelpTab( $opt_name, $tabs );

    // Set the help sidebar
    $content = __( '<p>This is the sidebar content, HTML is allowed.</p>', 'reveal' );
    Redux::setHelpSidebar( $opt_name, $content );


    /*
     * <--- END HELP TABS
     */






    /*

        As of Redux 3.5+, there is an extensive API. This API can be used in a mix/match mode allowing for


     */

    // -> START Basic Fields

    // -> START Typography
    Redux::setSection( $opt_name, array(
        'title'  => __( 'Typography', 'reveal' ),
        'id'     => 'reveal-typography',
        'desc'   => __( 'Theme Typography Section ', 'reveal' ),
        'icon'   => 'el el-font',
        'fields' => array(
            array(
                'id'       => 'reveal-typography-body',
                'type'     => 'typography',
                'title'    => __( 'Body Font', 'reveal' ),
                'subtitle' => __( 'Specify the body font properties.', 'reveal' ),
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
                'title'       => __( 'Typography h2', 'reveal' ),
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
                'subtitle'    => __( 'Typography option with each property can be called individually.', 'reveal' ),
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
                'title'    => __( 'Typography h3', 'reveal' ),
                'subtitle' => __( 'Specify h3 font properties.', 'reveal' ),
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
                'title'    => __( 'Typography h4', 'reveal' ),
                'subtitle' => __( 'Specify h4 font properties.', 'reveal' ),
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
                'title'    => __( 'Typography h5', 'reveal' ),
                'subtitle' => __( 'Specify h5 font properties.', 'reveal' ),
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
                'title'    => __( 'Typography h6', 'reveal' ),
                'subtitle' => __( 'Specify h6 font properties.', 'reveal' ),
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

        )
    ) );


    Redux::setSection( $opt_name, array(
        'title'            => __( 'Header', 'reveal' ),
        'icon'             => 'dashicons dashicons-admin-settings',
        'id'               => 'reveal-header-option',
        'customizer_width' => '500px',
    ) );

    Redux::setSection( $opt_name, array(
        'title'            => __( 'Header Versions', 'reveal' ),
        'id'               => 'reveal-header',
        'customizer_width' => '500px',
        'subsection'       => true,
        'fields'           => array(

            array(
                'id'       => 'reveal-header-version',
                'type'     => 'image_select',
                'title'    => __( 'Select Navigation Type', 'reveal' ),
                'desc'     => __( 'Choose Header Type', 'reveal' ),
                //Must provide key => value pairs for select options
                'options'  => array(
                    '1' => array(
                        'alt' => 'Header-1',
                        'img' => ReduxFramework::$_url . 'assets/img/header-1.png'
                    ),
                    '2' => array(
                        'alt' => 'Header-2',
                        'img' => ReduxFramework::$_url . 'assets/img/header-2.png'
                    ),
                    '3' => array(
                        'alt' => 'Header-3',
                        'img' => ReduxFramework::$_url . 'assets/img/header-3.png'
                    ),
                    '4' => array(
                        'alt' => 'Header-4',
                        'img' => ReduxFramework::$_url . 'assets/img/header-4.png'
                    ),
                //     '5' => array(
                //         'alt' => 'Header-5',
                //         'img' => ReduxFramework::$_url . 'assets/img/header-5.png'
                //     ),
                //     '6' => array(
                //         'alt' => 'Header-6',
                //         'img' => ReduxFramework::$_url . 'assets/img/header-6.png'
                //     ),
                ),
                'default'  => '1'
            ),
        )
    ) );

    Redux::setSection( $opt_name, array(
        'title'            => __( 'Header Top Options', 'reveal' ),
        'id'               => 'reveal-email-phone',
        'customizer_width' => '500px',
        'subsection'       => true,
        'fields'           => array(

            array(
                'id'       => 'reveal-header-top',
                'type'     => 'switch',
                'title'    => __( 'Enable Header Top?', 'reveal' ),
                'subtitle' => __( 'Select to enable/disable header top', 'reveal' ),
                'default'  => 1,
                'on'       => 'Enabled',
                'off'      => 'Disabled',
            ),

            array(
                'id'       => 'reveal-phone',
                'type'     => 'text',
                'required' => array( 'reveal-header-top', '=', '1' ),
                'title'    => __( 'Phone Number', 'reveal' ),
                'desc'     => __( 'Please insert  Your Phone: example: (707) 123-4567 ', 'reveal' ),
                'default'  => '(707) 123-4567',
            ),


            array(
                'id'       => 'reveal-phone-url',
                'type'     => 'text',
                'required' => array( 'reveal-header-top', '=', '1' ),
                'title'    => __( 'Phone Number URL', 'reveal' ),
                'desc'     => __( 'Please enter phone number URL: example: +17071234567  ', 'reveal' ),
                'default'  => '+7071234567',
            ),

            array(
                'id'       => 'reveal-email',
                'type'     => 'text',
                'required' => array( 'reveal-header-top', '=', '1' ),
                'title'    => __( 'Email', 'reveal' ),
                'desc'     => __( 'Please insert  Your Email  ', 'reveal' ),
                'default'  => 'email@email.com',
            ),
        )
    ) );

    Redux::setSection( $opt_name, array(
        'title'            => __( 'Logo', 'reveal' ),
        'customizer_width' => '500px',
        'id'               => 'reveal-logo-section',
        'subsection'       => true,
        'fields'           => array(
            array(
                'id'       => 'reveal-logo',
                'type'     => 'media',
                'title'    => __( 'Logo  ', 'reveal' ),
                'desc'     => __( 'Please Upload  Logo ', 'reveal' ),
                'default'  => array( 'url' => 'http://placehold.it/250X50' ),
            ),
            
        )
    ) );

    Redux::setSection( $opt_name, array(
        'title'            => __( 'Breadcrumbs', 'reveal' ),
        'customizer_width' => '500px',
        'id'               => 'reveal-bc',
        'subsection'       => true,
        'fields'           => array(
            array(
                'id'       => 'reveal-bcrumbs',
                'type'     => 'switch',
                'title'    => __( 'Enable Breadcrumbs?', 'reveal' ),
                'subtitle' => __( 'Select to enable/disable Breadcrumbs', 'reveal' ),
                'default'  => 1,
                'on'       => 'Enabled',
                'off'      => 'Disabled',
            ),
            
        )
    ) );

    Redux::setSection( $opt_name, array(
        'title'            => __( 'Social Media ', 'reveal' ),
        'customizer_width' => '500px',
        'id'               => 'reveal-social-media',
        'icon'             => 'dashicons dashicons-share',
        'fields'           => array(
            array(
                'id'       => 'reveal-twitter',
                'type'     => 'text',
                'title'    => __( 'Twitter ', 'reveal' ),
                'desc'     => __( 'Please Insert Twitter Profile URL  ', 'reveal' ),
                'default'  => '',
            ),
            array(
                'id'       => 'reveal-facebook',
                'type'     => 'text',
                'title'    => __( 'Facebook ', 'reveal' ),
                'desc'     => __( 'Please Insert Facebook Profile URL  ', 'reveal' ),
                'default'  => '',
            ),

            array(
                'id'       => 'reveal-instagram',
                'type'     => 'text',
                'title'    => __( 'Instagram ', 'reveal' ),
                'desc'     => __( 'Please Insert Instagram Profile URL  ', 'reveal' ),
                'default'  => '',
            ),

            array(
                'id'       => 'reveal-pinterest',
                'type'     => 'text',
                'title'    => __( 'Pinterest ', 'reveal' ),
                'desc'     => __( 'Please Insert Pinterest Profile URL  ', 'reveal' ),
                'default'  => '',
            ), 

             array(
                'id'       => 'reveal-behance',
                'type'     => 'text',
                'title'    => __( 'Behance ', 'reveal' ),
                'desc'     => __( 'Please Insert Behance Profile URL  ', 'reveal' ),
                'default'  => '',
            ),

             array(
                'id'       => 'reveal-google-plus',
                'type'     => 'text',
                'title'    => __( 'Google-Plus ', 'reveal' ),
                'desc'     => __( 'Please Insert Google Plus Profile URL  ', 'reveal' ),
                'default'  => '',
            ),                       

             array(
                'id'       => 'reveal-linkedin',
                'type'     => 'text',
                'title'    => __( 'Linkedin ', 'reveal' ),
                'desc'     => __( 'Please Insert Linkedin Profile URL  ', 'reveal' ),
                'default'  => '',
            ),

             array(
                'id'       => 'reveal-youtube',
                'type'     => 'text',
                'title'    => __( 'Youtube ', 'reveal' ),
                'desc'     => __( 'Please Insert Youtube Profile URL  ', 'reveal' ),
                'default'  => '',
            ),

             array(
                'id'       => 'reveal-skype',
                'type'     => 'text',
                'title'    => __( 'Skype ', 'reveal' ),
                'desc'     => __( 'Please Insert Skype Profile URL  ', 'reveal' ),
                'default'  => '',
            ),
           
        )
    ) );    


    // footer section 

    Redux::setSection( $opt_name, array(
        'title'            => __( 'Footer', 'reveal' ),
        'icon'             => 'dashicons dashicons-admin-generic',
        'id'               => 'reveal-footer-option',
        'customizer_width' => '500px',
    ) );

    Redux::setSection( $opt_name, array(
        'title'            => __( 'Footer Layout', 'reveal' ),
        'customizer_width' => '500px',
        'id'               => 'reveal-footer',
        'subsection'       => true,
        'fields'           => array(

            array(
                'id'       => 'reveal-footer-version',
                'type'     => 'image_select',
                'title'    => __( 'Select Footer Layout Type', 'reveal' ),
                'desc'     => __( 'Choose Footer Layout Type', 'reveal' ),
                //Must provide key => value pairs for select options
                'options'  => array(
                    '1' => array(
                        'alt' => 'Footer-1',
                        'img' => ReduxFramework::$_url . 'assets/img/footer-1.jpg'
                    ),
                    '2' => array(
                        'alt' => 'Footer-2',
                        'img' => ReduxFramework::$_url . 'assets/img/footer-2.jpg'
                    ),
                    '3' => array(
                        'alt' => 'Footer-3',
                        'img' => ReduxFramework::$_url . 'assets/img/footer-3.jpg'
                    ),
                    '4' => array(
                        'alt' => 'Footer-4',
                        'img' => ReduxFramework::$_url . 'assets/img/footer-4.jpg'
                    ),
                    '5' => array(
                        'alt' => 'Footer-5',
                        'img' => ReduxFramework::$_url . 'assets/img/footer-5.jpg'
                    ),
                    '6' => array(
                        'alt' => 'Footer-6',
                        'img' => ReduxFramework::$_url . 'assets/img/footer-6.jpg'
                    ),
                ),
                'default'  => '1'
            ),

        )
    ) );

    Redux::setSection( $opt_name, array(
        'title'            => __( 'Footer Copyright', 'reveal' ),
        'customizer_width' => '500px',
        'id'               => 'reveal-footer-cpr',
        'subsection'       => true,
        'fields'           => array(

            array(
                'id'       => 'reveal-footer_copyright',
                'type'     => 'switch',
                'title'    => __( 'Enable Footer Copyright?', 'reveal' ),
                'subtitle' => __( 'Select to enable/disable Footer Copyright', 'reveal' ),
                'default'  => 1,
                'on'       => 'Enabled',
                'off'      => 'Disabled',
            ),


            array(
                'id'       => 'reveal-copyright',
                'type'     => 'textarea',
                'required' => array( 'reveal-footer_copyright', '=', '1' ),
                'title'    => __( 'Footer copyright text  ', 'reveal' ),
                'desc'     => __( 'Please add your copyright text  ', 'reveal' ),
                'validate' => 'html',
                'default'  => 'HTML is allowed in here.'
            ),

        )
    ) );
            



    Redux::setSection( $opt_name, array(
            'title'            => __( 'Map Settings', 'reveal' ),
            'customizer_width' => '500px',
            'icon'             => 'dashicons dashicons-admin-post',
            'id'               => 'reveal-map-parent',
            'desc'             => 'You can find the <strong>Latitude</strong> and <strong>Longitude</strong> information by placing your address here <a href="http://www.latlong.net/" target="_blank">http://www.latlong.net/</a>',
            'fields'           => array(


                array(
                    'title' => __('Insert Google Map API Key', 'reveal'),
                    'desc' => 'Enter Your Google Map API Key',
                    'id'    => 'reveal-google-map-api-key',                  
                    'type'  => 'text',
                    'desc'  => 'If you don\'t have the API key yet, then <a href="https://developers.google.com/maps/documentation/javascript/get-api-key" target="_blank">Click Here</a> to get a API key', 
                    'default' => ''
                ),

                array(
                    'title' => __('Insert Map Latitude', 'reveal'),
                    //'desc' => 'Upload image here',
                    'id'    => 'reveal-google-map-latitude',
                    
                    //'subtitle' => __( 'Recommended image size 1920X1080 ', 'reveal' ),

                    'type'  => 'text',
                    'default' => '39.414269'
                ),

                array(
                    'title' => __('Insert Map Longitude', 'reveal'),
                    //'desc' => 'Upload image here',
                    'id'    => 'reveal-google-map-longitude',
                    
                    //'subtitle' => __( 'Recommended image size 1920X1080 ', 'reveal' ),

                    'type'  => 'text',
                    'default' => '-77.410541'
                ),

                array(
                    'title' => __('Map Zoom Level', 'reveal'),
                    //'desc' => 'Upload image here',
                    'id'    => 'reveal-google-map-zoom',
                    'type'  => 'text',
                    'default' => '15'
                ),

	            array(
	                'id'       => 'reveal-google-map-marker',
	                'type'     => 'media',
	                'url'      => true,
	                'title'    => __( 'Upload Map Marker', 'reveal' ),
	                'compiler' => 'true',
	                //'mode'      => false, // Can be set to false to allow any media type, or can also be set to any mime type.
	                // 'desc'     => __( 'Basic media uploader with disabled URL input field.', 'reveal' ),
	                // 'subtitle' => __( 'Upload any media using the WordPress native uploader', 'reveal' ),
	                'default'  => array( 'url' => ReduxFramework::$_url . 'assets/img/map-marker-1.png' ),
	                //'hint'      => array(
	                //    'title'     => 'Hint Title',
	                //    'content'   => 'This is a <b>hint</b> for the media field with a Title.',
	                //)
	            ),

            )
        ) );


    //Dont Paste Anything Below this Line

    Redux::setSection( $opt_name, array(
        'icon'            => 'el el-list-alt',
        'title'           => __( 'Customizer Only', 'reveal' ),
        'desc'            => __( '<p class="description">This Section should be visible only in Customizer</p>', 'reveal' ),
        'customizer_only' => true,
        'fields'          => array(
            array(
                'id'              => 'opt-customizer-only',
                'type'            => 'select',
                'title'           => __( 'Customizer Only Option', 'reveal' ),
                'subtitle'        => __( 'The subtitle is NOT visible in customizer', 'reveal' ),
                'desc'            => __( 'The field desc is NOT visible in customizer.', 'reveal' ),
                'customizer_only' => true,
                //Must provide key => value pairs for select options
                'options'         => array(
                    '1' => 'Opt 1',
                    '2' => 'Opt 2',
                    '3' => 'Opt 3'
                ),
                'default'         => '2'
            ),
        )
    ) );

    if ( file_exists( dirname( __FILE__ ) . '/../README.md' ) ) {
        $section = array(
            'icon'   => 'el el-list-alt',
            'title'  => __( 'Documentation', 'reveal' ),
            'fields' => array(
                array(
                    'id'       => '17',
                    'type'     => 'raw',
                    'markdown' => true,
                    'content_path' => dirname( __FILE__ ) . '/../README.md', // FULL PATH, not relative please
                    //'content' => 'Raw content here',
                ),
            ),
        );
        Redux::setSection( $opt_name, $section );
    }
    /*
     * <--- END SECTIONS
     */


    /*
     *
     * YOU MUST PREFIX THE FUNCTIONS BELOW AND ACTION FUNCTION CALLS OR ANY OTHER CONFIG MAY OVERRIDE YOUR CODE.
     *
     */

    /*
    *
    * --> Action hook examples
    *
    */

    // If Redux is running as a plugin, this will remove the demo notice and links
    //add_action( 'redux/loaded', 'remove_demo' );

    // Function to test the compiler hook and demo CSS output.
    // Above 10 is a priority, but 2 in necessary to include the dynamically generated CSS to be sent to the function.
    //add_filter('redux/options/' . $opt_name . '/compiler', 'compiler_action', 10, 3);

    // Change the arguments after they've been declared, but before the panel is created
    //add_filter('redux/options/' . $opt_name . '/args', 'change_arguments' );

    // Change the default value of a field after it's been set, but before it's been useds
    //add_filter('redux/options/' . $opt_name . '/defaults', 'change_defaults' );

    // Dynamically add a section. Can be also used to modify sections/fields
    //add_filter('redux/options/' . $opt_name . '/sections', 'dynamic_section');

    /**
     * This is a test function that will let you see when the compiler hook occurs.
     * It only runs if a field    set with compiler=>true is changed.
     * */
    if ( ! function_exists( 'compiler_action' ) ) {
        function compiler_action( $options, $css, $changed_values ) {
            echo '<h1>The compiler hook has run!</h1>';
            echo "<pre>";
            print_r( $changed_values ); // Values that have changed since the last save
            echo "</pre>";
            //print_r($options); //Option values
            //print_r($css); // Compiler selector CSS values  compiler => array( CSS SELECTORS )
        }
    }

    /**
     * Custom function for the callback validation referenced above
     * */
    if ( ! function_exists( 'redux_validate_callback_function' ) ) {
        function redux_validate_callback_function( $field, $value, $existing_value ) {
            $error   = false;
            $warning = false;

            //do your validation
            if ( $value == 1 ) {
                $error = true;
                $value = $existing_value;
            } elseif ( $value == 2 ) {
                $warning = true;
                $value   = $existing_value;
            }

            $return['value'] = $value;

            if ( $error == true ) {
                $field['msg']    = 'your custom error message';
                $return['error'] = $field;
            }

            if ( $warning == true ) {
                $field['msg']      = 'your custom warning message';
                $return['warning'] = $field;
            }

            return $return;
        }
    }

    /**
     * Custom function for the callback referenced above
     */
    if ( ! function_exists( 'redux_my_custom_field' ) ) {
        function redux_my_custom_field( $field, $value ) {
            print_r( $field );
            echo '<br/>';
            print_r( $value );
        }
    }

    /**
     * Custom function for filtering the sections array. Good for child themes to override or add to the sections.
     * Simply include this function in the child themes functions.php file.
     * NOTE: the defined constants for URLs, and directories will NOT be available at this point in a child theme,
     * so you must use get_template_directory_uri() if you want to use any of the built in icons
     * */
    if ( ! function_exists( 'dynamic_section' ) ) {
        function dynamic_section( $sections ) {
            //$sections = array();
            $sections[] = array(
                'title'  => __( 'Section via hook', 'reveal' ),
                'desc'   => __( '<p class="description">This is a section created by adding a filter to the sections array. Can be used by child themes to add/remove sections from the options.</p>', 'reveal' ),
                'icon'   => 'el el-paper-clip',
                // Leave this as a blank section, no options just some intro text set above.
                'fields' => array()
            );

            return $sections;
        }
    }

    /**
     * Filter hook for filtering the args. Good for child themes to override or add to the args array. Can also be used in other functions.
     * */
    if ( ! function_exists( 'change_arguments' ) ) {
        function change_arguments( $args ) {
            //$args['dev_mode'] = true;

            return $args;
        }
    }

    /**
     * Filter hook for filtering the default value of any given field. Very useful in development mode.
     * */
    if ( ! function_exists( 'change_defaults' ) ) {
        function change_defaults( $defaults ) {
            $defaults['str_replace'] = 'Testing filter hook!';

            return $defaults;
        }
    }

    /**
     * Removes the demo link and the notice of integrated demo from the redux-framework plugin
     */
    if ( ! function_exists( 'remove_demo' ) ) {
        function remove_demo() {
            // Used to hide the demo mode link from the plugin page. Only used when Redux is a plugin.
            if ( class_exists( 'ReduxFrameworkPlugin' ) ) {
                remove_filter( 'plugin_row_meta', array(
                    ReduxFrameworkPlugin::instance(),
                    'plugin_metalinks'
                ), null, 2 );

                // Used to hide the activation notice informing users of the demo panel. Only used when Redux is a plugin.
                remove_action( 'admin_notices', array( ReduxFrameworkPlugin::instance(), 'admin_notices' ) );
            }
        }
    }

