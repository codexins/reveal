<?php

/**
 * Main Class definition for theme options
 *
 * @package Reveal
 * @subpackage Core
 */


// Do not allow directly accessing this file.
defined( 'ABSPATH' ) OR die( esc_html__( 'This script cannot be accessed directly.', 'reveal' ) );


if ( ! class_exists( 'Codexin_Admin' ) ) {
    /**
     * Theme Options Class. Uses Redux Framework.
     *
     * @since v1.0.0
     */
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
                'menu_title' => esc_html__('Theme Options', 'reveal'),

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
                'title'            => esc_html__( 'General Settings', 'reveal' ),
                'id'               => 'reveal-general-settings',
                'icon'			   => 'el el-adjust-alt',
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

                    array(
                        'id'       => 'reveal_to_top',
                        'type'     => 'switch',
                        'title'    => esc_html__( 'Enable To-Top Button?', 'reveal' ),
                        'subtitle' => esc_html__( 'Choose to Enable / Disable Scroll functionality to Top', 'reveal' ),
                        'default'  => true,
                    ),

                    array(
                        'id'        => 'reveal-ajax-comments',
                        'type'      => 'switch',
                        'title'     => esc_html__('Ajax Comments', 'reveal'),
                        'subtitle'  => esc_html__('Choose to Enable / Disable Ajax comments for posts and pages', 'reveal'),
                        "default"   => false,
                    ),

                    array(
                        'id'        => 'reveal_page_comments',
                        'type'      => 'switch',
                        'title'     => esc_html__('Page Comments', 'reveal'),
                        'subtitle'  => esc_html__('Choose to Enable / Disable Page comments (After enabling this option, you have to check \'Discussion\' from page edit \'Screen Options\' at the top right corner.)', 'reveal'),
                        "default"   => false,
                    ),

                  )
            );

            $this->sections[] = array(
                'title'  => esc_html__( 'Typography', 'reveal' ),
                'id'     => 'reveal-typography',
                'desc'   => esc_html__( 'Theme Typography Section ', 'reveal' ),
                'icon'   => 'el el-fontsize',
                'fields' => array(
                    array(
                        'id'       => 'reveal-typography-body',
                        'type'     => 'typography',
                        'title'    => esc_html__( 'Body Font', 'reveal' ),
                        'subtitle' => esc_html__( 'Specify the body font properties.', 'reveal' ),
                        'google'   => true,
                        'output'   => array('body'),
                        'color'    => false,
                        'default'  => array(
                            'font-size'   => '16px',
                            'line-height' => '26px',
                            'font-family' => 'Roboto',
                            'font-weight' => '400',
                        ),
                    ),

                    array(
                        'id'       => 'reveal-main-menu-typography',
                        'type'     => 'typography',
                        'title'    => esc_html__( 'Main Menu Typography', 'reveal' ),
                        'subtitle' => esc_html__( 'Specify Main Menu font properties.', 'reveal' ),
                        'google'   => true,
                        'text-transform' => true,
                        'output'   => array('.main-menu li a'),
                        'color'    => false,
                        'default'  => array(
                            'font-size'   => '14px',
                            'line-height' => '33px',
                            'font-family' => 'Montserrat',
                            'font-weight' => '400',
                            'text-transform' => 'uppercase'
                        ),
                    ),

                    array(
                        'id'       => 'reveal-primary-title-typography',
                        'type'     => 'typography',
                        'title'    => esc_html__( 'Primary Title Typography', 'reveal' ),
                        'subtitle' => esc_html__( 'Specify primary title font properties.', 'reveal' ),
                        'google'   => true,
                        'output'   => array('.primary-title'),
                        'color'    => false,
                        'default'  => array(
                            'font-size'   => '30px',
                            'line-height' => '33px',
                            'font-family' => 'Montserrat',
                            'font-weight' => '700',
                        ),
                    ),

                    array(
                        'id'       => 'reveal-secondary-title-typography',
                        'type'     => 'typography',
                        'title'    => esc_html__( 'Secondary Title Typography', 'reveal' ),
                        'subtitle' => esc_html__( 'Specify secondary title font properties.', 'reveal' ),
                        'google'   => true,
                        'color'    => false,
                        'output'   => array('.secondary-title', '.sec-font'),
                        'default'  => array(
                            'font-size'   => '24px',
                            'line-height' => '26px',
                            'font-family' => 'Lobster',
                            'font-weight' => '400'
                        ),
                    ),

                    array(
                        'id'       => 'reveal-typography-h1',
                        'type'     => 'typography',
                        'title'    => esc_html__( 'Typography h1', 'reveal' ),
                        'subtitle' => esc_html__( 'Specify h1 font properties.', 'reveal' ),
                        'google'   => true,
                        'color'    => false,
                        'output'   => array('h1', '.h1'),
                        'default'  => array(
                            'font-size'   => '32px',
                            'font-family' => 'Montserrat',
                            'font-weight' => '400',
                        ),
                    ),


                    array(
                        'id'          => 'reveal-typography-h2',
                        'type'        => 'typography',
                        'title'       => esc_html__( 'Typography h2', 'reveal' ),
                        'output'      => array( 'h2', '.h2' ),
                        'google'      => true,
                        'subtitle'    => esc_html__( 'Typography option with each property can be called individually.', 'reveal' ),
                        'color'    => false,
                        'default'     => array(
                            'font-weight'  => 'normal',
                            'font-family' => 'Montserrat',
                            'font-size'   => '28px',
                            'font-weight'   => '400',
                        ),
                    ),

                    array(
                        'id'       => 'reveal-typography-h3',
                        'type'     => 'typography',
                        'title'    => esc_html__( 'Typography h3', 'reveal' ),
                        'subtitle' => esc_html__( 'Specify h3 font properties.', 'reveal' ),
                        'google'   => true,
                        'color'    => false,
                        'output'   => array('h3', '.h3'),
                        'default'  => array(
                            'font-size'   => '24px',
                            'font-family' => 'Montserrat',
                            'font-weight' => '400',
                        ),
                    ),

                    array(
                        'id'       => 'reveal-typography-h4',
                        'type'     => 'typography',
                        'title'    => esc_html__( 'Typography h4', 'reveal' ),
                        'subtitle' => esc_html__( 'Specify h4 font properties.', 'reveal' ),
                        'google'   => true,
                        'output'   => array('h4'),
                        'color'    => false,
                        'default'  => array(
                            'font-size'   => '21px',
                            'font-family' => 'Montserrat',
                            'font-weight' => '400',
                        ),
                    ),

                    array(
                        'id'       => 'reveal-typography-h5',
                        'type'     => 'typography',
                        'title'    => esc_html__( 'Typography h5', 'reveal' ),
                        'subtitle' => esc_html__( 'Specify h5 font properties.', 'reveal' ),
                        'google'   => true,
                        'color'    => false,
                        'output'   => array('h5', '.h5'),
                        'default'  => array(
                            'font-size'   => '18px',
                            'font-family' => 'Montserrat',
                            'font-weight' => '400',
                        ),
                    ),

                    array(
                        'id'       => 'reveal-typography-h6',
                        'type'     => 'typography',
                        'title'    => esc_html__( 'Typography h6', 'reveal' ),
                        'subtitle' => esc_html__( 'Specify h6 font properties.', 'reveal' ),
                        'google'   => true,
                        'color'    => false,
                        'output'   => array('h6', '.h6'),
                        'default'  => array(
                            'font-size'   => '15px',
                            'font-family' => 'Montserrat',
                            'font-weight' => '400',
                        ),
                    ),
                )
            );

            $this->sections[] = array(
                'title'            => esc_html__( 'Colors', 'reveal' ),
                'icon'             => 'el el-brush',
                'id'               => 'reveal-color-option',
                'desc'         => esc_html__( 'Customization of Theme Main Colors', 'reveal' ),
                'customizer_width' => '500px',
                'fields'           => array(

                    array(
                        'id'            => 'reveal-body-bg',
                        'type'          => 'color',
                        'title'         => esc_html__( 'Body Background Color:', 'reveal' ),
                        'desc'          => esc_html__( 'Please Choose the Body Background Color', 'reveal' ),
                        'default'       => '#fff',
                        'transparent'   => false,
                    ),

                    array(
                        'id'            => 'reveal-text-color',
                        'type'          => 'color',
                        'title'         => esc_html__( 'Body Text Color:', 'reveal' ),
                        'desc'          => esc_html__( 'Please Choose the Body Text Color', 'reveal' ),
                        'default'       => '#333',
                        'transparent'   => false,
                    ),

                    array(
                        'id'            => 'reveal-primary-color',
                        'type'          => 'color',
                        'title'         => esc_html__( 'Primary Color:', 'reveal' ),
                        'desc'          => esc_html__( 'Please Choose the Primary Color', 'reveal' ),
                        'default'       => '#295970',
                        'transparent'   => false,
                    ),

                    array(
                        'id'            => 'reveal-secondary-color',
                        'type'          => 'color',
                        'title'         => esc_html__( 'Secondary Color:', 'reveal' ),
                        'desc'          => esc_html__( 'Please Choose the Secondary Color', 'reveal' ),
                        'default'       => '#fce38a',
                        'transparent'   => false,
                    ),

                    array(
                        'id'            => 'reveal-border-color',
                        'type'          => 'color',
                        'title'         => esc_html__( 'Border Color:', 'reveal' ),
                        'desc'          => esc_html__( 'Please Choose the Border Color', 'reveal' ),
                        'default'       => '#ccc',
                        'transparent'   => false,
                    ),

                    array(
                        'id'            => 'reveal-secondary-bg',
                        'type'          => 'color',
                        'title'         => esc_html__( 'Secondary Background Color:', 'reveal' ),
                        'desc'          => esc_html__( 'Please Choose the Secondary Background Color', 'reveal' ),
                        'default'       => '#fafafa',
                        'transparent'   => false,
                    ),
            ));


            $this->sections[] = array(
                'title'            => esc_html__( 'Header', 'reveal' ),
                'id'               => 'reveal-header-option',
                'icon'			   => 'el el-website',
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
                        'output'      => array( 'a.navbar-brand' ),
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
                        'desc'     => esc_html__( 'Please Upload Company Logo', 'reveal' ),
                        'subtitle' => esc_html__( 'Recommended Logo Size 260X100', 'reveal' ),
                        'default'  => array( 'url' => '//placehold.it/260X100' ),
                    ),


                    array(
                        'id'       => 'reveal-header-version',
                        'type'     => 'image_select',
                        'title'    => esc_html__( 'Select Navigation Type', 'reveal' ),
                        'desc'     => esc_html__( 'Choose Header Type', 'reveal' ),
                        'options'  => array(
                            '1' => array(
                                'alt' => 'Header-1',
                                'img' => CODEXIN_FRAMEWORK_ADMIN_URL . 'assets/images/header-1.png'
                            ),
                            '2' => array(
                                'alt' => 'Header-2',
                                'img' => CODEXIN_FRAMEWORK_ADMIN_URL . 'assets/images/header-2.png'
                            ),
                            '3' => array(
                                'alt' => 'Header-3',
                                'img' => CODEXIN_FRAMEWORK_ADMIN_URL . 'assets/images/header-3.png'
                            ),
                            '4' => array(
                                'alt' => 'Header-4',
                                'img' => CODEXIN_FRAMEWORK_ADMIN_URL . 'assets/images/header-4.png'
                            ),
                        ),
                        'default'  => '1'
                    ),

                    array(
                        'id'        => 'reveal-responsive-version',
                        'type'      => 'select',
                        'title'     => esc_html__('Select Responsive Navigation Type', 'reveal'),
                        'desc'      => '',
                        'options'   => array(
                            'left'  => esc_html__( 'Slide Left Menu', 'reveal' ),
                            'right' => esc_html__( 'Slide Right Menu', 'reveal' ),
                        ),
                        'default'   => 'left'
                    ),
                )
            );

            //Page Title And BreadCrumbs..
            $this->sections[] = array(
                'title'            => esc_html__( 'Page Title', 'reveal' ),
                'customizer_width' => '500px',
                'id'               => 'reveal-bc',
                'subsection'       => true,
                'fields'           => array(

                    array(
                        'id'       => 'page-title-position',
                        'type'     => 'radio',
                        'title'    => esc_html__( 'Title Position :', 'reveal' ),
                        'desc'     => esc_html__( 'Please Select Page Title Position ', 'reveal' ),
                        'options'  => array(
                                        '1' => esc_html__( 'Left', 'reveal' ),
                                        '2' => esc_html__( 'Center', 'reveal' ),
                                        '3' => esc_html__( 'Right', 'reveal' ),
                                ),
                        'default'  => '1',
                    ),

                    array(
                        'id'       => 'reveal-title-padding',
                        'type'     => 'spacing',
                        'mode'     => 'padding',
                        'left'     => false,
                        'right'    => false,
                        'output'   => array( '#page_title.page-title' ),
                        'units'          => array( 'px' ),
                        'units_extended' => 'true',
                        'title'    => esc_html__( 'Page Title padding', 'reveal' ),
                        'default'  => array( )
                    ),

                    array(
                        'id'       => 'reveal-page-title-background',
                        'type'     => 'background',
                        'title'    => esc_html__( 'Background', 'reveal' ),
                        'subtitle' => esc_html__( 'Page header with image, color, etc.', 'reveal' ),
                        'output'      => array( '#page_title.page-title' )
                    ),


                    array(
                        'id'       => 'reveal-bcrumbs',
                        'type'     => 'switch',
                        'title'    => esc_html__( 'Enable Breadcrumbs?', 'reveal' ),
                        'subtitle' => esc_html__( 'Select to enable/disable Page-Title & Breadcrumbs', 'reveal' ),
                        'desc'     => esc_html__('Breadcrumbs is a navigational aid that allows visitors to understand their current location in the context of a website.', 'reveal'),
                        'default'  => true
                    ), 



                    array(
                        'id'       => 'page-bc-position',
                        'type'     => 'radio',
                        'required' => array( 'reveal-bcrumbs', '=', '1' ),
                        'title'    => esc_html__( 'Breadcrumbs Position :', 'reveal' ),
                        'desc'     => esc_html__( 'Please Select BreadCrumbs Position ', 'reveal' ),
                        'options'  => array(
                                        '1' => esc_html__( 'Left', 'reveal' ),
                                        '2' => esc_html__( 'Center', 'reveal' ),
                                        '3' => esc_html__( 'Right', 'reveal' ),
                                ),
                        'default'  => '1',
                    ),

                ) //End Fields array...
            );

            //Social Media
            $this->sections[] = array(
                'title'            => esc_html__( 'Social Media ', 'reveal' ),
                'customizer_width' => '500px',
                'id'               => 'reveal-social-media',
                'icon'             => 'dashicons dashicons-share',
                'fields'           => array(
                    array(
                        'id'    => 'opt-info-success',
                        'type'  => 'info',
                        'style' => 'success',
                        'icon'  => 'el el-info-circle',
                        'title'    => esc_html__( 'Social Media Information ', 'reveal' ),
                        'desc'  => sprintf( '%1$s<b>%2$s</b>', esc_html__('In order to set the Social Media, please go to ', 'reveal'), esc_html__('Dashboard->Codexin Core->Social Media', 'reveal') ),
                    ),

                )
            );    

            $this->sections[] = array(
                'title'            => esc_html__( 'Blog Settings', 'reveal' ),
                'icon'             => 'dashicons dashicons-schedule',
                'id'               => 'reveal-blog-settings',
                'customizer_width' => '500px',
            );

            //Blog & Archive Page
            $this->sections[] = array(
                'title'            => esc_html__( 'Blog & Archive Page', 'reveal' ),
                'id'               => 'reveal-blog-archive',
                'customizer_width' => '500px',
                'subsection'       => true,
                'fields'           => array(

                    array(
                        'id'        => 'reveal-blog-title',
                        'type'      => 'text',
                        'title'     => esc_html__('Blog Page Title', 'reveal'),
                        'subtitle'  => 'Enter Blog Page Title',
                        'default'   => 'Blog'
                    ),

                    array(
                        'id'       => 'reveal-blog-layout',
                        'type'     => 'image_select',
                        'title'    => esc_html__( 'Select Blog & Archive Page Layout', 'reveal' ),
                        'subtitle' => esc_html__( 'Select Blog & Archive Page Layout', 'reveal' ),
                        'desc'     => esc_html__( 'Choose From Full width / Left sidebar / Right Sidebar', 'reveal' ),
                        //Must provide key => value(array:title|img) pairs for radio options
                        'options'  => array(
                            'no'        => array(
                                'alt'   => '1 Column',
                                'img'   => ReduxFramework::$_url . 'assets/img/1col.png'
                            ),
                            'left'      => array(
                                'alt'   => '2 Column Left',
                                'img'   => ReduxFramework::$_url . 'assets/img/2cl.png'
                            ),
                            'right'     => array(
                                'alt'   => '2 Column Right',
                                'img'   => ReduxFramework::$_url . 'assets/img/2cr.png'
                            )
                        ),
                        'default'  => 'right'
                    ),

                    array(
                        'id'        => 'reveal_blog_style',
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
                        'required' => array('reveal_blog_style','equals', array( 'grid' ) ),
                    ),

                    array(
                        'id'       => 'reveal_blog_title_excerpt_length',
                        'type'     => 'switch',
                        'title'    => esc_html__( 'Enable Blog Title and Excerpt Length?', 'reveal' ),
                        'subtitle' => esc_html__( 'Select to enable/disable blog-title & excerpt length', 'reveal' ),
                        'default'  => 0,
                        'on'       => 'Enabled',
                        'off'      => 'Disabled',
                    ),

                    array(
                        'id'        => 'reveal_title_length',
                        'type'      => 'slider',
                        'min'       => '10',
                        'max'       => '150',
                        'step'      => '1',
                        'required'  => array( 'reveal_blog_title_excerpt_length', '=', '1' ),
                        'title'     => esc_html__('Title Length for Posts', 'reveal'),
                        'subtitle'  => esc_html__('Control the Title Length for Posts (In Character)', 'reveal'),
                        'desc'      => esc_html__("Adjust the Number of Character to Show in the Post Title in Blog & Archive Page.", 'reveal'),
                        'default'   => 30,
                    ),

                    array(
                        'id'        => 'reveal_excerpt_length',
                        'type'      => 'slider',
                        'min'       => '20',
                        'max'       => '500',
                        'step'      => '1',
                        'required'  => array( 'reveal_blog_title_excerpt_length', '=', '1' ),
                        'title'     => esc_html__('Excerpt Length for Posts', 'reveal'),
                        'subtitle'  => esc_html__('Control the Excerpt Length for Posts (In Character)', 'reveal'),
                        'desc'      => esc_html__("Adjust the Number of Character to Show in the Post Excerpts in Blog & Archive Page.", 'reveal'),
                        'default'   => 180,
                    ),

                    array(
                        'id'        => 'reveal_blog_post_meta',
                        'type'      => 'checkbox',
                        'title'     => esc_html__('Post Meta you want to be displayed in Blog Archive Page', 'reveal'),
                        'subtitle'  => esc_html__('You can select multiple checkboxes', 'reveal'),
                        'options'  => array(
                            '1' => 'Author',
                            '2' => 'Publish Date',
                            '3' => 'Categories',
                            '4' => 'Comments',
                            '5' => 'Post Like Button',
                        ),
                        'default'  => array(
                            '1' => '0',
                            '2' => '0',
                            '3' => '1',
                            '4' => '0',
                            '5' => '0',
                        )
                    ),

                    array(
                        'id'        => 'reveal-blog-read-more',
                        'type'      => 'switch',
                        'title'     => esc_html__( 'Enable Read More Button?', 'reveal' ),
                        'subtitle'  => esc_html__( 'Enable Read More Button in Posts?', 'reveal' ),
                        'desc'      => esc_html__( 'Choose to Enable / Disable Read More Button in the Posts Loop', 'reveal' ),
                        'default'   => true,
                    ),   

                    array(
                        'id'        => 'reveal_pagination',
                        'type'      => 'select',
                        'title'     => esc_html__('Pagination Type', 'reveal'),
                        'desc'      => esc_html__('Select the Pagination Type.', 'reveal'),
                        'options'   => array(
                            'numbered'  => esc_html__( 'Numbered pagination', 'reveal' ),
                            'button'    => esc_html__( 'Next - Previous Button', 'reveal' ),
                        ),
                        'default'   => 'button'
                    ),
                )

            ); //End Blog & Archive Page...


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
                            'no'    => array(
                                'alt' => '1 Column',
                                'img' => ReduxFramework::$_url . 'assets/img/1col.png'
                            ),
                            'left'  => array(
                                'alt' => '2 Column Left',
                                'img' => ReduxFramework::$_url . 'assets/img/2cl.png'
                            ),
                            'right' => array(
                                'alt' => '2 Column Right',
                                'img' => ReduxFramework::$_url . 'assets/img/2cr.png'
                            )
                        ),
                        'default'  => 'right'
                    ),

                    array(
                        'id'        => 'reveal_blog_post_single_meta',
                        'type'      => 'checkbox',
                        'title'     => esc_html__('Post Meta you want to be displayed in Single Post Page', 'reveal'),
                        'subtitle'  => esc_html__('You can select multiple checkboxes', 'reveal'),
                        'options'  => array(
                            '1' => 'Author',
                            '2' => 'Publish Date',
                            '3' => 'Categories',
                            '4' => 'Comments',
                            '5' => 'Post Like Button',
                        ),
                        'default'  => array(
                            '1' => '0',
                            '2' => '0',
                            '3' => '1',
                            '4' => '0',
                            '5' => '0',
                        )
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

                    array(
                        'id'        => 'reveal_single_pagination',
                        'type'      => 'select',
                        'title'     => esc_html__('Pagination Type', 'reveal'),
                        'desc'      => esc_html__('Select the Pagination Type for Single Posts.', 'reveal'),
                        'required' => array( 'reveal_single_button', '=', '1' ),
                        'options'   => array(
                            'button'    => esc_html__( 'Next - Previous Button', 'reveal' ),
                            'title'     => esc_html__( 'Button with Post Title Text', 'reveal' ),
                        ),
                        'default' => 'button'
                    ),

                    array(
                        'id'        => 'reveal_post_comments',
                        'type'      => 'switch',
                        'title'     => esc_html__('Show Comments?', 'reveal'),
                        'subtitle'  => esc_html__('Select if You Need to Show Single Blog Post Comments Section', 'reveal'),
                        'desc'      => esc_html__('Choose to Enable / Disable to Show Blog Single Post Comments', 'reveal'),
                        "default"   => true,
                    ),
                )
            );  

            //Custom Post Type Portfolio Settings
            $this->sections[] = array(
                'title'            => esc_html__( 'Portfolio Settings', 'reveal' ),
                'icon'             => 'dashicons dashicons-art',
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
                            'no'    => array(
                                'alt' => '1 Column',
                                'img' => ReduxFramework::$_url . 'assets/img/1col.png'
                            ),
                            'left'  => array(
                                'alt' => '2 Column Left',
                                'img' => ReduxFramework::$_url . 'assets/img/2cl.png'
                            ),
                            'right' => array(
                                'alt' => '2 Column Right',
                                'img' => ReduxFramework::$_url . 'assets/img/2cr.png'
                            )
                        ),
                        'default'  => 'no'
                    ),

                    array(
                        'id'        => 'reveal_portfolio_style',
                        'type'      => 'select',
                        'title'     => esc_html__('Portfolio Archive Posts Style', 'reveal'),
                        'desc'      => esc_html__('Choose Portfolio Archive Posts Style', 'reveal'),
                        'required'  => array( 'reveal_enable_portfolio', '=', '1' ),
                        'options'   => array(
                            'grid'  => esc_html__( 'Grid', 'reveal' ),
                            'list'  => esc_html__( 'List', 'reveal' ),
                        ),
                        'default'   => 'list'
                    ),

                    array(
                        'id'        => 'reveal_portfolio_grid_columns',
                        'type'      => 'select',
                        'title'     => esc_html__('Columns Number', 'reveal'),
                        'desc'      => '',
                        'options'   => array(
                            '2' => esc_html__( '2 columns', 'reveal' ) ,
                            '3' => esc_html__( '3 columns', 'reveal' ) ,
                            '4' => esc_html__( '4 columns', 'reveal' ) ,
                        ),
                        'default' => '3',
                        'required' => array('reveal_portfolio_style','equals', array( 'grid' ) ),
                    ),

                    array(
                        'id'       => 'reveal_portfolio_title_excerpt_length',
                        'type'     => 'switch',
                        'required' => array( 'reveal_enable_portfolio', '=', '1' ),
                        'title'    => esc_html__( 'Enable Portfolio Title and Excerpt Length?', 'reveal' ),
                        'subtitle' => esc_html__( 'Select to enable/disable portfolio-title & excerpt length', 'reveal' ),
                        'default'  => 0,
                        'on'       => 'Enabled',
                        'off'      => 'Disabled',
                    ),

                    array(
                        'id'        => 'reveal_portfolio_title_length',
                        'type'      => 'slider',
                        'min'       => '10',
                        'max'       => '150',
                        'step'      => '1',
                        'required'  => array( 'reveal_portfolio_title_excerpt_length', '=', '1' ),
                        'title'     => esc_html__('Title Length for Portfolios', 'reveal'),
                        'subtitle'  => esc_html__('Control the Title Length for Portfolios (In Character)', 'reveal'),
                        'desc'      => esc_html__("Adjust the Number of Character to Show in the Post Title in Portfolio Archive Page.", 'reveal'),
                        'default'   => 30,
                    ),

                    array(
                        'id'        => 'reveal_portfolio_excerpt_length',
                        'type'      => 'slider',
                        'min'       => '20',
                        'max'       => '500',
                        'step'      => '1',
                        'required'  => array( 'reveal_portfolio_title_excerpt_length', '=', '1' ),
                        'title'     => esc_html__('Excerpt Length for Portfolios', 'reveal'),
                        'subtitle'  => esc_html__('Control the Excerpt Length for Portfolios (In Character)', 'reveal'),
                        'desc'      => esc_html__("Adjust the Number of Character to Show in the Post Excerpts in Portfolio Archive Page.", 'reveal'),
                        'default'   => 180,
                    ),

                    array(
                        'id'        => 'reveal_portfolio_pagination',
                        'type'      => 'select',
                        'title'     => esc_html__('Portfolio Archive Pagination Type', 'reveal'),
                        'desc'      => esc_html__('Select the Pagination Type.', 'reveal'),
                        'required' => array( 'reveal_enable_portfolio', '=', '1' ),
                        'options'   => array(
                            'numbered'  => esc_html__( 'Numbered pagination', 'reveal' ),
                            'button'    => esc_html__( 'Next - Previous Button', 'reveal' ),
                        ),
                        'default'   => 'button'
                    ),

                    array(
                        'id'       => 'reveal-single-portfolio-layout',
                        'type'     => 'image_select',
                        'required' => array( 'reveal_enable_portfolio', '=', '1' ),
                        'title'    => esc_html__( 'Portfolio Single Page Layout', 'reveal' ),
                        'subtitle' => esc_html__( 'Select Single Portfolio Page Layout', 'reveal' ),
                        'desc'     => esc_html__( 'Choose From Left / Right Information Sidebar', 'reveal' ),
                        'options'  => array(
                            '1' => array(
                                'alt' => '2 Column Left',
                                'img' => ReduxFramework::$_url . 'assets/img/2cl.png'
                            ),
                            '2' => array(
                                'alt' => '2 Column Right',
                                'img' => ReduxFramework::$_url . 'assets/img/2cr.png'
                            )
                        ),
                        'default'  => '2'
                    ),

                    array(
                        'id'        => 'reveal_portfolio_comments',
                        'type'      => 'switch',
                        'required'  => array( 'reveal_enable_portfolio', '=', '1' ),
                        'title'     => esc_html__('Enable Portfolio Comments?', 'reveal'),
                        'subtitle'  => esc_html__('Select if You Need Portfolio Single Page Comments Section', 'reveal'),
                        'desc'      => esc_html__('Choose to Enable / Disable Portfolio Single Page Comments', 'reveal'),
                        "default"   => false,
                    ),

                )    
            );

            //Custom Post Type Events Settings
            $this->sections[] = array(
                'title'            => esc_html__( 'Events Settings', 'reveal' ),
                'icon'             => 'dashicons dashicons-clipboard',
                'id'               => 'reveal-events-settings',
                'customizer_width' => '500px',
                'fields'           => array(

                    array(
                        'id'        => 'reveal_enable_events',
                        'type'      => 'switch',
                        'title'     => esc_html__('Enable Events?', 'reveal'),
                        'subtitle'  => esc_html__('Select if You Need Events', 'reveal'),
                        'desc'      => esc_html__('Choose to Enable / Disable Events Custom Post', 'reveal'),
                        "default"   => true,
                    ),

                    array(
                        'id'       => 'reveal-events-archive-layout',
                        'type'     => 'image_select',
                        'required' => array( 'reveal_enable_events', '=', '1' ),
                        'title'    => esc_html__( 'Events Archive Page Layout', 'reveal' ),
                        'subtitle' => esc_html__( 'Select Events Archive Page Layout', 'reveal' ),
                        'desc'     => esc_html__( 'Choose From Full width / Left sidebar / Right Sidebar', 'reveal' ),
                        'options'  => array(
                            'no' => array(
                                'alt' => '1 Column',
                                'img' => ReduxFramework::$_url . 'assets/img/1col.png'
                            ),
                            'left' => array(
                                'alt' => '2 Column Left',
                                'img' => ReduxFramework::$_url . 'assets/img/2cl.png'
                            ),
                            'right' => array(
                                'alt' => '2 Column Right',
                                'img' => ReduxFramework::$_url . 'assets/img/2cr.png'
                            )
                        ),
                        'default'  => 'no'
                    ),

                    array(
                        'id'        => 'reveal_events_style',
                        'type'      => 'select',
                        'title'     => esc_html__('Events Archive Posts Style', 'reveal'),
                        'desc'      => esc_html__('Choose Events Archive Posts Style', 'reveal'),
                        'required' => array( 'reveal_enable_events', '=', '1' ),
                        'options'   => array(
                            'grid'=> esc_html__( 'Grid', 'reveal' ),
                            'list'  => esc_html__( 'List', 'reveal' ),
                        ),
                        'default'   => 'list'
                    ),

                    array(
                        'id'        => 'reveal_events_grid_columns',
                        'type'      => 'select',
                        'title'     => esc_html__('Columns Number', 'reveal'),
                        'desc'      => '',
                        'options'   => array(
                            '2' => esc_html__( '2 columns', 'reveal' ) ,
                            '3' => esc_html__( '3 columns', 'reveal' ) ,
                            '4' => esc_html__( '4 columns', 'reveal' ) ,
                        ),
                        'default' => '3',
                        'required' => array('reveal_events_style','equals', array( 'grid' ) ),
                    ),

                    array(
                        'id'       => 'reveal_events_title_excerpt_length',
                        'type'     => 'switch',
                        'required' => array( 'reveal_enable_events', '=', '1' ),
                        'title'    => esc_html__( 'Enable Events Title and Excerpt Length?', 'reveal' ),
                        'subtitle' => esc_html__( 'Select to enable/disable Events-title & excerpt length', 'reveal' ),
                        'default'  => 0,
                        'on'       => 'Enabled',
                        'off'      => 'Disabled',
                    ),

                    array(
                        'id'        => 'reveal_events_title_length',
                        'type'      => 'slider',
                        'min'       => '10',
                        'max'       => '150',
                        'step'      => '1',
                        'required'  => array( 'reveal_events_title_excerpt_length', '=', '1' ),
                        'title'     => esc_html__('Title Length for Events', 'reveal'),
                        'subtitle'  => esc_html__('Control the Title Length for Events (In Character)', 'reveal'),
                        'desc'      => esc_html__("Adjust the Number of Character to Show in the Post Title in Events Archive Page.", 'reveal'),
                        // 'default'   => 7,
                    ),

                    array(
                        'id'        => 'reveal_events_excerpt_length',
                        'type'      => 'slider',
                        'min'       => '20',
                        'max'       => '500',
                        'step'      => '1',
                        'required'  => array( 'reveal_events_title_excerpt_length', '=', '1' ),
                        'title'     => esc_html__('Excerpt Length for Events', 'reveal'),
                        'subtitle'  => esc_html__('Control the Excerpt Length for Events (In Character)', 'reveal'),
                        'desc'      => esc_html__("Adjust the Number of Character to Show in the Post Excerpts in Events Archive Page.", 'reveal'),
                        // 'default'   => 20,
                    ),

                    array(
                        'id'        => 'reveal_events_pagination',
                        'type'      => 'select',
                        'title'     => esc_html__('Events Archive Pagination Type', 'reveal'),
                        'desc'      => esc_html__('Select the Pagination Type.', 'reveal'),
                        'required'  => array( 'reveal_enable_events', '=', '1' ),
                        'options'   => array(
                            'numbered'  => esc_html__( 'Numbered pagination', 'reveal' ),
                            'button'    => esc_html__( 'Next - Previous Button', 'reveal' ),
                        ),
                        'default'   => 'button'
                    ),
                )    
            );

            //Custom Post Type Testimonial Settings
            $this->sections[] = array(
                'title'            => esc_html__( 'Testimonial Settings', 'reveal' ),
                'icon'             => 'dashicons dashicons-welcome-learn-more',
                'id'               => 'reveal-events-settings',
                'customizer_width' => '500px',
                'fields'           => array(

                    array(
                        'id'        => 'reveal_enable_testimonial',
                        'type'      => 'switch',
                        'title'     => esc_html__('Enable Testimonials?', 'reveal'),
                        'subtitle'  => esc_html__('Select if You Need Testimonials', 'reveal'),
                        'desc'      => esc_html__('Choose to Enable / Disable Testimonial Custom Post', 'reveal'),
                        "default"   => true,
                    ),

                    array(
                        'id'       => 'reveal-testimonial-archive-layout',
                        'type'     => 'image_select',
                        'required' => array( 'reveal_enable_testimonial', '=', '1' ),
                        'title'    => esc_html__( 'Testimonials Archive Page Layout', 'reveal' ),
                        'subtitle' => esc_html__( 'Select Testimonials Archive Page Layout', 'reveal' ),
                        'desc'     => esc_html__( 'Choose From No Sidebar / Left sidebar / Right Sidebar', 'reveal' ),
                        //Must provide key => value(array:title|img) pairs for radio options
                        'options'  => array(
                            'no' => array(
                                'alt' => '1 Column',
                                'img' => ReduxFramework::$_url . 'assets/img/1col.png'
                            ),
                            'left' => array(
                                'alt' => '2 Column Left',
                                'img' => ReduxFramework::$_url . 'assets/img/2cl.png'
                            ),
                            'right' => array(
                                'alt' => '2 Column Right',
                                'img' => ReduxFramework::$_url . 'assets/img/2cr.png'
                            )
                        ),
                        'default'  => 'no'
                    ),

                    array(
                        'id'        => 'reveal_enable_testimonial_pagination',
                        'type'      => 'switch',
                        'title'     => esc_html__('Enable Pagination?', 'reveal'),
                        'subtitle'  => esc_html__('Select if You Need Pagination', 'reveal'),
                        'desc'      => esc_html__('Choose to Enable / Disable Testimonials Pagination', 'reveal'),
                        'required' => array( 'reveal_enable_testimonial', '=', '1' ),
                    ),
                )    
            );


            // footer section 
            $this->sections[] = array(
                'title'            => esc_html__( 'Footer', 'reveal' ),
                'customizer_width' => '500px',
                'id'               => 'reveal-footer',
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
                                'img' => CODEXIN_FRAMEWORK_ADMIN_URL . 'assets/images/footer-1.jpg'
                            ),
                            '2' => array(
                                'alt' => 'Footer-2',
                                'img' => CODEXIN_FRAMEWORK_ADMIN_URL . 'assets/images/footer-2.jpg'
                            ),
                            '3' => array(
                                'alt' => 'Footer-3',
                                'img' => CODEXIN_FRAMEWORK_ADMIN_URL . 'assets/images/footer-3.jpg'
                            ),
                            '4' => array(
                                'alt' => 'Footer-4',
                                'img' => CODEXIN_FRAMEWORK_ADMIN_URL . 'assets/images/footer-4.jpg'
                            ),
                            '5' => array(
                                'alt' => 'Footer-5',
                                'img' => CODEXIN_FRAMEWORK_ADMIN_URL . 'assets/images/footer-5.jpg'
                            ),
                            '6' => array(
                                'alt' => 'Footer-6',
                                'img' => CODEXIN_FRAMEWORK_ADMIN_URL . 'assets/images/footer-6.jpg'
                            ),
                        ),
                        'default'  => '1'
                    ),

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
                        'default'  => __( 'Copyright &copy; 2017. All Right Reserved.', 'reveal' )
                    ),
                )

            ); //End Footer...

            $this->sections[] = array(
                'title'            => esc_html__( 'Advanced Settings', 'reveal' ),
                'customizer_width' => '500px',
                'id'               => 'reveal-advanced',
                'icon'             => 'el el-view-mode ',
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

