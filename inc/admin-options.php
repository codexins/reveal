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

                'page_title' => $this->theme->get('Name') . ' ' . esc_html__('Reveal Options', 'reveal'),
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
                'title'            => esc_html__( 'General Settings', 'reveal' ),
                'id'               => 'reveal-general-settings',
                'customizer_width' => '500px',
                'fields'           => array(
                    array(
                        'id'       => 'reveal-smooth-scroll',
                        'type'     => 'switch',
                        'title'    => esc_html__( 'Enable Smooth Scroll', 'reveal' ),
                        'subtitle' => esc_html__( 'This option will enable smooth scroll through the pages of your site', 'reveal' ),
                        'default'  => true,
                    ),

                    array(
                        'id'       => 'reveal-page-loader',
                        'type'     => 'switch',
                        'title'    => esc_html__( 'Enable Page Loader?', 'reveal' ),
                        'subtitle' => esc_html__( 'Choose to Enable / Disable Page Loader Throughout the Site', 'reveal' ),
                        'default'  => true,
                    ),

                  )
            );

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
                        'output'   => array('body'),
                        'default'  => array(
                            'color'       => '#333',
                            'font-size'   => '16px',
                            'line-height' => '26px',
                            'font-family' => 'Roboto',
                            'font-weight' => 'Normal',
                        ),
                    ),

                    array(
                        'id'       => 'reveal-primary-title-typography',
                        'type'     => 'typography',
                        'title'    => esc_html__( 'Primary Title Typography', 'reveal' ),
                        'subtitle' => esc_html__( 'Specify primary title font properties.', 'reveal' ),
                        'google'   => true,
                        'output'   => array('.primary-title'),
                        'default'  => array(
                            'color'       => '#333',
                            'font-size'   => '24px',
                            'line-height' => '26px',
                            'font-family' => 'Lobster',
                            'font-weight' => '400',
                        ),
                    ),

                    array(
                        'id'       => 'reveal-secondary-title-typography',
                        'type'     => 'typography',
                        'title'    => esc_html__( 'Secondary Title Typography', 'reveal' ),
                        'subtitle' => esc_html__( 'Specify secondary title font properties.', 'reveal' ),
                        'google'   => true,
                        'output'   => array('.secondary-title'),
                        'default'  => array(
                            'color'       => '#333',
                            'font-size'   => '30px',
                            'line-height' => '33px',
                            'font-family' => 'Montserrat',
                            'font-weight' => '700'
                        ),
                    ),

                    array(
                        'id'       => 'reveal-typography-h1',
                        'type'     => 'typography',
                        'title'    => esc_html__( 'Typography h1', 'reveal' ),
                        'subtitle' => esc_html__( 'Specify h1 font properties.', 'reveal' ),
                        'google'   => true,
                        'output'   => array('h1'),
                        'default'  => array(
                            'color'       => '#333',
                            'font-size'   => '30px',
                            'line-height' => '48px',
                            'font-family' => 'Montserrat',
                            'font-weight' => 'Normal',
                        ),
                    ),


                    array(
                        'id'          => 'reveal-typography-h2',
                        'type'        => 'typography',
                        'title'       => esc_html__( 'Typography h2', 'reveal' ),
                        'output'      => array( 'h2' ),
                        'google'      => true,
                        'subtitle'    => esc_html__( 'Typography option with each property can be called individually.', 'reveal' ),
                        'default'     => array(
                            'color'       => '#333',
                            'font-weight'  => 'bold',
                            'font-family' => 'Montserrat',
                            'font-size'   => '30px',
                            'line-height' => ''
                        ),
                    ),

                    array(
                        'id'       => 'reveal-typography-h3',
                        'type'     => 'typography',
                        'title'    => esc_html__( 'Typography h3', 'reveal' ),
                        'subtitle' => esc_html__( 'Specify h3 font properties.', 'reveal' ),
                        'google'   => true,
                        'output'   => array('h3'),
                        'default'  => array(
                            'color'       => '#333',
                            'font-size'   => '16px',
                            'line-height' => '26px',
                            'font-family' => 'Montserrat',
                            'font-weight' => 'Normal',
                        ),
                    ),

                    array(
                        'id'       => 'reveal-typography-h4',
                        'type'     => 'typography',
                        'title'    => esc_html__( 'Typography h4', 'reveal' ),
                        'subtitle' => esc_html__( 'Specify h4 font properties.', 'reveal' ),
                        'google'   => true,
                        'output'   => array('h4'),
                        'default'  => array(
                            'color'       => '#333',
                            'font-size'   => '16px',
                            'line-height' => '26px',
                            'font-family' => 'Montserrat',
                            'font-weight' => 'Normal',
                        ),
                    ),

                    array(
                        'id'       => 'reveal-typography-h5',
                        'type'     => 'typography',
                        'title'    => esc_html__( 'Typography h5', 'reveal' ),
                        'subtitle' => esc_html__( 'Specify h5 font properties.', 'reveal' ),
                        'google'   => true,
                        'output'   => array('h5'),
                        'default'  => array(
                            'color'       => '#333',
                            'font-size'   => '16px',
                            'line-height' => '26px',
                            'font-family' => 'Montserrat',
                            'font-weight' => 'Normal',
                        ),
                    ),

                    array(
                        'id'       => 'reveal-typography-h6',
                        'type'     => 'typography',
                        'title'    => esc_html__( 'Typography h6', 'reveal' ),
                        'subtitle' => esc_html__( 'Specify h6 font properties.', 'reveal' ),
                        'google'   => true,
                        'output'   => array('h6'),
                        'default'  => array(
                            'color'       => '#333',
                            'font-size'   => '16px',
                            'line-height' => '26px',
                            'font-family' => 'Montserrat',
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
                        'id'       => 'reveal-logo-type',
                        'type'     => 'radio',
                        'title'    => esc_html__( 'Select Logo type', 'reveal' ),
                        'subtitle' => esc_html__( 'Please select whether you want a text logo or image logo', 'reveal' ),
                        'desc'     => esc_html__( 'Select text logo or image logo', 'reveal' ),
                        //Must provide key => value pairs for radio options
                        'options'  => array(
                            '1' => 'Text Logo',
                            '2' => 'Image Logo',
                        ),
                        'default'  => '1'
                    ),

                    array(
                        'id'       => 'reveal-text-logo',
                        'required' => array('reveal-logo-type', 'equals', '1'),
                        'type'     => 'text',
                        'title'    => esc_html__( 'Write your text logo', 'reveal' ),
                        'desc'     => esc_html__( 'Please write text logo here', 'reveal' ),
                        'default'  => 'ReVeal',
                    ),

                    array(
                        'id'          => 'reveal-text-logo-typography',
                        'required' => array('reveal-logo-type', 'equals', '1'),
                        'type'        => 'typography',
                        'title'       => esc_html__( 'Typography For Text Logo', 'reveal' ),
                        'preview'       => true, // Disable the previewer
                        'all_styles'  => true,
                        'letter-spacing'=> true,
                        // Enable all Google Font style/weight variations to be added to the page
                        'output'      => array( '.logo a' ),
                        'units'       => 'px',
                        'subtitle'    => esc_html__( 'Typography option for text logo', 'reveal' ),
                        'default'     => array(
                            'color'       => '#fff',
                            'font-style'  => '400',
                            'font-family' => 'Montserrat',
                            'google'      => true,
                            'font-size'   => '30px',
                        ),
                    ),

                    array(
                        'id'       => 'reveal-image-logo',
                        'required' => array('reveal-logo-type', 'equals', '2'),
                        'type'     => 'media',
                        'url'      => true,
                        'title'    => esc_html__( 'Upload Company Logo', 'reveal' ),
                        'compiler' => 'true',
                        //'mode'      => false, // Can be set to false to allow any media type, or can also be set to any mime type.
                        'desc'     => esc_html__( 'Please Upload Company Logo', 'reveal' ),
                        'subtitle' => esc_html__( 'Recommended Logo Size 260X100', 'reveal' ),
                        'default'  => array( 'url' => '//placehold.it/260X100' ),
                        //'hint'      => array(
                        //    'title'     => 'Hint Title',
                        //    'content'   => 'This is a <b>hint</b> for the media field with a Title.',
                        //)
                    ),


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
                        'desc'     => esc_html__('Breadcrumbs is a navigational aid that allows visitors to understand their current location in the context of a website.', 'reveal'),
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

            $this->sections[] = array(
                'title'            => esc_html__( 'Blog Settings', 'reveal' ),
                'icon'             => 'dashicons dashicons-schedule',
                'id'               => 'reveal-blog-settings',
                'customizer_width' => '500px',
            );

            $this->sections[] = array(
                'title'            => esc_html__( 'Blog & Archive Page', 'reveal' ),
                'id'               => 'reveal-blog-archive',
                'customizer_width' => '500px',
                'subsection'       => true,
                'fields'           => array(

                    array(
                        'id'       => 'reveal-blog-layout',
                        'type'     => 'image_select',
                        'title'    => esc_html__( 'Select Blog & Archive Page Layout', 'reveal' ),
                        'subtitle' => esc_html__( 'Select Blog & Archive Page Layout', 'reveal' ),
                        'desc'     => esc_html__( 'Choose From Full width / Left sidebar / Right Sidebar', 'reveal' ),
                        //Must provide key => value(array:title|img) pairs for radio options
                        'options'  => array(
                            '1' => array(
                                'alt' => '1 Column',
                                'img' => ReduxFramework::$_url . 'assets/img/1col.png'
                            ),
                            '2' => array(
                                'alt' => '2 Column Left',
                                'img' => ReduxFramework::$_url . 'assets/img/2cl.png'
                            ),
                            '3' => array(
                                'alt' => '2 Column Right',
                                'img' => ReduxFramework::$_url . 'assets/img/2cr.png'
                            )
                        ),
                        'default'  => '3'
                    ),

                    array(
                        'id'        => 'reveal_post_style',
                        'type'      => 'select',
                        'title'     => esc_html__('Blog & Archive Posts Style', 'reveal'),
                        'desc'      => '',
                        'options'   => array(
                            'list'  => esc_html__( 'List', 'reveal' ),
                            'grid'  => esc_html__( 'Grid', 'reveal' ),
                        ),
                        'default'   => 'list'
                    ),

                    array(
                        'id'        => 'reveal_grid_columns',
                        'type'      => 'select',
                        'title'     => esc_html__('Columns Number', 'reveal'),
                        'desc'      => '',
                        'options'   => array(
                            '2' => esc_html__( '2 columns', 'reveal' ) ,
                            '3' => esc_html__( '3 columns', 'reveal' ) ,
                            '4' => esc_html__( '4 columns', 'reveal' ) ,
                        ),
                        'default' => '2',
                        'required' => array('reveal_post_style','equals', array( 'grid' ) ),
                    ),

                    array(
                        'id'        => 'reveal_title_length',
                        'type'      => 'text',
                        'title'     => esc_html__('Title Length for Posts', 'reveal'),
                        'subtitle'  => esc_html__('Control the Title Length for Posts', 'reveal'),
                        'desc'      => esc_html__("Insert the Number of Words to Show in the Post Title in Blog & Archive Page.", 'reveal'),
                        'default'   => 7,
                    ),

                    array(
                        'id'        => 'reveal_excerpt_length',
                        'type'      => 'text',
                        'title'     => esc_html__('Excerpt Length for Posts', 'reveal'),
                        'subtitle'  => esc_html__('Control the Excerpt Length for Posts', 'reveal'),
                        'desc'      => esc_html__("Insert the Number of Words to Show in the Post Excerpts in Blog & Archive Page.", 'reveal'),
                        'default'   => 20,
                    ),

                    array(
                        'id'       => 'reveal-blog-read-more',
                        'type'     => 'switch',
                        'title'    => esc_html__( 'Enable Read More Button?', 'reveal' ),
                        'subtitle' => esc_html__( 'Enable Read More Button in Posts?', 'reveal' ),
                        'desc'     => esc_html__( 'Choose to Enable / Disable Read More Button in the Posts Loop', 'reveal' ),
                        'default'  => true,
                    ),   

                    array(
                        'id' => 'reveal_pagination',
                        'type' => 'select',
                        'title' => esc_html__('Pagination Type', 'reveal'),
                        'desc' => esc_html__('Select the Pagination Type.', 'reveal'),
                        'options' => array(
                            'numbered'  => esc_html__( 'Numbered pagination', 'reveal' ),
                            'button'    => esc_html__( 'Next - Previous Button', 'reveal' ),
                        ),
                        'default' => 'button'
                    ),
                )
            );    

            $this->sections[] = array(
                'title'            => esc_html__( 'Blog Single Page', 'reveal' ),
                'id'               => 'reveal-blog-single',
                'customizer_width' => '500px',
                'subsection'       => true,
                'fields'           => array(

                    array(
                        'id'       => 'reveal-single-layout',
                        'type'     => 'image_select',
                        'title'    => esc_html__( 'Select Single Post Page Layout', 'reveal' ),
                        'subtitle' => esc_html__( 'Select Single post Page Layout', 'reveal' ),
                        'desc'     => esc_html__( 'Choose From Full width / Left sidebar / Right Sidebar', 'reveal' ),
                        'options'  => array(
                            '1' => array(
                                'alt' => '1 Column',
                                'img' => ReduxFramework::$_url . 'assets/img/1col.png'
                            ),
                            '2' => array(
                                'alt' => '2 Column Left',
                                'img' => ReduxFramework::$_url . 'assets/img/2cl.png'
                            ),
                            '3' => array(
                                'alt' => '2 Column Right',
                                'img' => ReduxFramework::$_url . 'assets/img/2cr.png'
                            )
                        ),
                        'default'  => '3'
                    ),

                    array(
                        'id'        => 'reveal_single_share',
                        'type'      => 'switch',
                        'title'     => esc_html__('Enable Share Links?', 'reveal'),
                        'subtitle'  => esc_html__('Select if You Need Share Links', 'reveal'),
                        'desc'      => esc_html__('Choose to Enable / Disable Share Links in Single Post', 'reveal'),
                        "default"   => true,
                    ),

                    array(
                        'id'        => 'reveal_single_button',
                        'type'      => 'switch',
                        'title'     => esc_html__('Enable Post Navigation?', 'reveal'),
                        'subtitle'  => esc_html__('Select if You Need Post Navigation', 'reveal'),
                        'desc'      => esc_html__('Choose to Enable / Disable Previous or Next Post Links', 'reveal'),
                        "default"   => true,
                    ),
                )
            );  

            //Custom Post Type Portfolio Settings
            $this->sections[] = array(
                'title'            => esc_html__( 'Portfolio Settings', 'reveal' ),
                'icon'             => 'dashicons dashicons-admin-users',
                'id'               => 'reveal-portfolio-settings',
                'customizer_width' => '500px',
                'fields'           => array(

                    array(
                        'id'        => 'reveal_enable_portfolio',
                        'type'      => 'switch',
                        'title'     => esc_html__('Enable Portfolio?', 'reveal'),
                        'subtitle'  => esc_html__('Select if You Need Portfolio', 'reveal'),
                        'desc'      => esc_html__('Choose to Enable / Disable Portfolio Custom Post', 'reveal'),
                        "default"   => true,
                    ),

                    array(
                        'id'       => 'reveal-portfolio-archive-layout',
                        'type'     => 'image_select',
                        'required' => array( 'reveal_enable_portfolio', '=', '1' ),
                        'title'    => esc_html__( 'Portfolio Archive Page Layout', 'reveal' ),
                        'subtitle' => esc_html__( 'Select Portfolio Archive Page Layout', 'reveal' ),
                        'desc'     => esc_html__( 'Choose From Full width / Left sidebar / Right Sidebar', 'reveal' ),
                        //Must provide key => value(array:title|img) pairs for radio options
                        'options'  => array(
                            '1' => array(
                                'alt' => '1 Column',
                                'img' => ReduxFramework::$_url . 'assets/img/1col.png'
                            ),
                            '2' => array(
                                'alt' => '2 Column Left',
                                'img' => ReduxFramework::$_url . 'assets/img/2cl.png'
                            ),
                            '3' => array(
                                'alt' => '2 Column Right',
                                'img' => ReduxFramework::$_url . 'assets/img/2cr.png'
                            )
                        ),
                        'default'  => '1'
                    ),

                    array(
                        'id'        => 'reveal_portfolio_style',
                        'type'      => 'select',
                        'title'     => esc_html__('Portfolio Archive Posts Style', 'reveal'),
                        'desc'      => '',
                        'options'   => array(
                            'filter'=> esc_html__( 'Filter', 'reveal' ),
                            'list'  => esc_html__( 'List', 'reveal' ),
                        ),
                        'default'   => 'filter'
                    ),

                    array(
                        'id'       => 'reveal_portfolio_filter_title',
                        'type'     => 'textarea',
                        'title'    => esc_html__( 'Portfolio Filter Section Title', 'reveal' ),
                        'desc'     => esc_html__( 'Please Enter Portfolio Filter Section Primary Title', 'reveal' ),
                        'required' => array( 'reveal_portfolio_style', '=', 'filter' ),
                        'validate' => 'html',
                        'default'  => ''
                    ),

                    array(
                        'id'       => 'reveal_portfolio_filter_subtitle',
                        'type'     => 'textarea',
                        'title'    => esc_html__( 'Portfolio Filter Section Subtitle', 'reveal' ),
                        'desc'     => esc_html__( 'Please Enter Portfolio Filter Section Secondary Title', 'reveal' ),
                        'required' => array( 'reveal_portfolio_style', '=', 'filter' ),
                        'validate' => 'html',
                        'default'  => ''
                    ),

                    array(
                        'id'       => 'reveal-single-portfolio-layout',
                        'type'     => 'image_select',
                        'required' => array( 'reveal_enable_portfolio', '=', '1' ),
                        'title'    => esc_html__( 'Portfolio Single Page Layout', 'reveal' ),
                        'subtitle' => esc_html__( 'Select Single Portfolio Page Layout', 'reveal' ),
                        'desc'     => esc_html__( 'Choose From Full width / Left sidebar / Right Sidebar', 'reveal' ),
                        //Must provide key => value(array:title|img) pairs for radio options
                        'options'  => array(
                            '1' => array(
                                'alt' => '1 Column',
                                'img' => ReduxFramework::$_url . 'assets/img/1col.png'
                            ),
                            '2' => array(
                                'alt' => '2 Column Left',
                                'img' => ReduxFramework::$_url . 'assets/img/2cl.png'
                            ),
                            '3' => array(
                                'alt' => '2 Column Right',
                                'img' => ReduxFramework::$_url . 'assets/img/2cr.png'
                            )
                        ),
                        'default'  => '1'
                    ),
                )    
            );

            // footer section 

            $this->sections[] = array(
                'title'            => esc_html__( 'Footer', 'reveal' ),
                'icon'             => 'dashicons dashicons-editor-insertmore',
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
                        'id'       => 'reveal_footer_copyright',
                        'type'     => 'switch',
                        'title'    => esc_html__( 'Enable Footer Copyright?', 'reveal' ),
                        'subtitle' => esc_html__( 'Select to enable/disable Footer Copyright', 'reveal' ),
                        'default'  => true,
                    ),


                    array(
                        'id'       => 'reveal-copyright',
                        'type'     => 'textarea',
                        'required' => array( 'reveal_footer_copyright', '=', '1' ),
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

                    'desc'             => sprintf(__('You can find the <strong>Latitude</strong> and <strong>Longitude</strong> information by placing your address <a href="%s" target="_blank">Here</a>', 'reveal'), esc_url('//latlong.net/')),
                    'fields'           => array(


                        array(
                            'title' => esc_html__('Insert Google Map API Key', 'reveal'),
                            'desc' => 'Enter Your Google Map API Key',
                            'id'    => 'reveal-google-map-api-key',                  
                            'type'  => 'text',
                            'desc'  => sprintf(__('If you don\'t have the API key yet, then <a href="%s" target="_blank">Click Here</a> to get a API key', 'reveal'), esc_url('//developers.google.com/maps/documentation/javascript/get-api-key')), 
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

            $this->sections[] = array(
                'title'            => esc_html__( 'Advanced Settings', 'reveal' ),
                'customizer_width' => '500px',
                'id'               => 'reveal-advanced',
                'icon'             => 'dashicons dashicons-media-code',
                'fields'           => array(
            ) );

            $this->sections[] = array(
                'title'            => esc_html__( 'Google Analytics', 'reveal' ),
                'customizer_width' => '500px',
                'subsection'       => true,
                'id'               => 'reveal-advanced-gaq',
                'fields'           => array(

                    array(
                        'id'            => 'reveal-gaq',
                        'type'          => 'textarea',
                        'title'         => esc_html__( 'Google Analytics', 'reveal' ),
                        'subtitle'      => esc_html__( 'Paste Your Google Analytics Code Here', 'reveal' ),
                    ),

                )
            );




        }
    }

    global $reduxConfig;
    $reduxConfig = new Codexin_Admin();

} else {
    echo __('The class named Redux_Framework_sample_config has already been called. <strong>Developers, you need to prefix this class with your company name or you\'ll run into problems!</strong>', 'reveal');
}

