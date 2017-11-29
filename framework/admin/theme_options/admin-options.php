<?php

/**
 * Main Class definition for theme options
 *
 * @package 	Reveal
 * @subpackage 	Core
 * @since 		1.0
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

        public function __construct() {
            if( ! class_exists( 'ReduxFramework' ) ) {
                return;
            }
            if( true == Redux_Helpers::isTheme( __FILE__ ) ) {
                $this->initSettings();
            } else {
                add_action( 'plugins_loaded', array( $this, 'initSettings' ), 10 );
            }
        }

        public function initSettings() {

            $this->theme = wp_get_theme();
            $this->setArguments();
            $this->setSections();
            if( ! isset( $this->args['opt_name'] ) ) {
                return;
            }
            $this->ReduxFramework = new ReduxFramework($this->sections, $this->args);
        }

        public function setArguments() {

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

        public function setSections() {

            $this->sections[] = array(
                'title'            => esc_html__( 'General Settings', 'reveal' ),
                'id'               => 'codexin_general_settings',
                'icon'			   => 'el el-adjust-alt',
                'customizer_width' => '500px',
                'fields'           => array(
                    array(
                        'id'        => 'cx_smooth_scroll',
                        'type'      => 'switch',
                        'title'     => esc_html__( 'Enable Smooth Scroll', 'reveal' ),
                        'subtitle'  => esc_html__( 'This option will enable smooth scroll through the pages of your site', 'reveal' ),
                        'default'   => true,
                    ),

                    array(
                        'id'        => 'cx_totop',
                        'type'      => 'switch',
                        'title'     => esc_html__( 'Enable To-Top Button?', 'reveal' ),
                        'subtitle'  => esc_html__( 'Choose to Enable / Disable Scroll functionality to Top', 'reveal' ),
                        'default'   => true,
                    ),

                    array(
                        'id'        => 'cx_ajax_comments',
                        'type'      => 'switch',
                        'title'     => esc_html__( 'Ajax Comments', 'reveal' ),
                        'subtitle'  => esc_html__( 'Choose to Enable / Disable Ajax comments for posts and pages', 'reveal' ),
                        "default"   => false,
                    ),

                    array(
                        'id'        => 'cx_page_comments',
                        'type'      => 'switch',
                        'title'     => esc_html__( 'Page Comments', 'reveal' ),
                        'subtitle'  => esc_html__( 'Choose to Enable / Disable Page comments (After enabling this option, you have to check \'Discussion\' from page edit \'Screen Options\' at the top right corner.)', 'reveal' ),
                        "default"   => false,
                    ),

                    array(
                        'id'        => 'cx_page_loader',
                        'type'      => 'switch',
                        'title'     => esc_html__( 'Enable Page Loader?', 'reveal' ),
                        'subtitle'  => esc_html__( 'Choose to Enable / Disable Page Loader Throughout the Site', 'reveal' ),
                        'default'   => true,
                    ),

                    // array(
                    //     'id'       => 'reveal_page_loader_type',
                    //     'type'     => 'image_select',
                    //     'title'    => esc_html__( 'Select Blog & Archive Page Layout', 'reveal' ),
                    //     'subtitle' => esc_html__( 'Select Blog & Archive Page Layout', 'reveal' ),
                    //     'desc'     => esc_html__( 'Choose From Full width / Left sidebar / Right Sidebar', 'reveal' ),
                    //     'required'  => array( 'cx_page_loader', '=', '1' ),
                    //     'options'  => array(
                    //         '1'        => array(
                    //             'alt'   => 'Page Loader 1',
                    //             'img'   => CODEXIN_FRAMEWORK_ADMIN_URL . 'assets/img/loader-1.png'
                    //         ),
                    //         '2'      => array(
                    //             'alt'   => 'Page Loader 2',
                    //             'img'   => CODEXIN_FRAMEWORK_ADMIN_URL . 'assets/img/loader-2.png'
                    //         ),
                    //         '3'     => array(
                    //             'alt'   => 'Page Loader 3',
                    //             'img'   => CODEXIN_FRAMEWORK_ADMIN_URL . 'assets/img/loader-3.png'
                    //         ),
                    //         '4'     => array(
                    //             'alt'   => 'Page Loader 3',
                    //             'img'   => CODEXIN_FRAMEWORK_ADMIN_URL . 'assets/img/loader-3.png'
                    //         ),
                    //         '5'     => array(
                    //             'alt'   => 'Page Loader 3',
                    //             'img'   => CODEXIN_FRAMEWORK_ADMIN_URL . 'assets/img/loader-3.png'
                    //         )
                    //     ),
                    //     'default'  => '1'
                    // ),

                    // array(
                    //     'id'       => 'reveal_page_loader_bg',
                    //     'type'     => 'background',
                    //     'title'    => esc_html__( 'Page Loader Background Color', 'reveal' ),
                    //     'background-repeat'     => false,
                    //     'background-attachment' => false,
                    //     'background-position'   => false,
                    //     'background-image'      => false,
                    //     'background-size'       => false,
                    //     'preview'               => false,
                    //     'transparent'           => false,
                    //     'default'   => array(
                    //         'background-color'      => '#FFFFFF',
                    //     ),
                    //     'output'   => array( '#preloader_1' ),
                    //     'required'  => array( 'cx_page_loader', '=', '1' ),
                    // ),

                    // array(
                    //     'id'       => 'reveal_page_loader_color',
                    //     'type'     => 'color',
                    //     'title'    => esc_html__( 'Page Loader Color', 'reveal' ),
                    //     'default'  => '#000000',
                    //     'transparent' => false,
                    //     'required'  => array( 'cx_page_loader', '=', '1' ),
                    // ),

                  )
            );

            $this->sections[] = array(
                'title'  => esc_html__( 'Typography', 'reveal' ),
                'id'     => 'codexin_typography',
                'desc'   => esc_html__( 'Theme Typography Section ', 'reveal' ),
                'icon'   => 'el el-fontsize',
                'fields' => array(
                    array(
                        'id'       => 'cx_typography_body',
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
                        'id'             => 'cx_main_menu_typography',
                        'type'           => 'typography',
                        'title'          => esc_html__( 'Main Menu Typography', 'reveal' ),
                        'subtitle'       => esc_html__( 'Specify Main Menu font properties.', 'reveal' ),
                        'google'         => true,
                        'text-transform' => true,
                        'output'         => array('.main-menu li a'),
                        'color'          => false,
                        'default'        => array(
                            'font-size'         => '14px',
                            'line-height'       => '33px',
                            'font-family'       => 'Montserrat',
                            'font-weight'       => '400',
                            'text-transform'    => 'uppercase'
                        ),
                    ),

                    array(
                        'id'       => 'cx_primary_title_typography',
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
                        'id'       => 'cx_secondary_title_typography',
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
                        'id'       => 'cx_typography_h1',
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
                        'id'          => 'cx_typography_h2',
                        'type'        => 'typography',
                        'title'       => esc_html__( 'Typography h2', 'reveal' ),
                        'output'      => array( 'h2', '.h2' ),
                        'google'      => true,
                        'subtitle'    => esc_html__( 'Typography option with each property can be called individually.', 'reveal' ),
                        'color'       => false,
                        'default'     => array(
                            'font-weight'   => 'normal',
                            'font-family'   => 'Montserrat',
                            'font-size'     => '28px',
                            'font-weight'   => '400',
                        ),
                    ),

                    array(
                        'id'       => 'cx_typography_h3',
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
                        'id'       => 'cx_typography_h4',
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
                        'id'       => 'cx_typography_h5',
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
                        'id'       => 'cx_typography_h6',
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
                'id'               => 'codexin_color_option',
                'desc'             => esc_html__( 'Customization of Theme Main Colors', 'reveal' ),
                'customizer_width' => '500px',
                'fields'           => array(

                    array(
                        'id'            => 'cx_body_bg',
                        'type'          => 'color',
                        'title'         => esc_html__( 'Body Background Color:', 'reveal' ),
                        'desc'          => esc_html__( 'Please Choose the Body Background Color', 'reveal' ),
                        'default'       => '#fff',
                        'transparent'   => false,
                    ),

                    array(
                        'id'            => 'cx_text_color',
                        'type'          => 'color',
                        'title'         => esc_html__( 'Body Text Color:', 'reveal' ),
                        'desc'          => esc_html__( 'Please Choose the Body Text Color', 'reveal' ),
                        'default'       => '#333',
                        'transparent'   => false,
                    ),

                    array(
                        'id'            => 'cx_primary_color',
                        'type'          => 'color',
                        'title'         => esc_html__( 'Primary Color:', 'reveal' ),
                        'desc'          => esc_html__( 'Please Choose the Primary Color', 'reveal' ),
                        'default'       => '#295970',
                        'transparent'   => false,
                    ),

                    array(
                        'id'            => 'cx_secondary_color',
                        'type'          => 'color',
                        'title'         => esc_html__( 'Secondary Color:', 'reveal' ),
                        'desc'          => esc_html__( 'Please Choose the Secondary Color', 'reveal' ),
                        'default'       => '#fce38a',
                        'transparent'   => false,
                    ),

                    array(
                        'id'            => 'cx_border_color',
                        'type'          => 'color',
                        'title'         => esc_html__( 'Border Color:', 'reveal' ),
                        'desc'          => esc_html__( 'Please Choose the Border Color', 'reveal' ),
                        'default'       => '#ccc',
                        'transparent'   => false,
                    ),

                    array(
                        'id'            => 'cx_secondary_bg',
                        'type'          => 'color',
                        'title'         => esc_html__( 'Secondary Background Color:', 'reveal' ),
                        'desc'          => esc_html__( 'Please Choose the Secondary Background Color', 'reveal' ),
                        'default'       => '#fafafa',
                        'transparent'   => false,
                    ),
            ));


            $this->sections[] = array(
                'title'            => esc_html__( 'Header', 'reveal' ),
                'id'               => 'codexin_header_option',
                'icon'			   => 'el el-website',
                'customizer_width' => '500px',
            );

            $this->sections[] = array(
                'title'            => esc_html__( 'Header Versions', 'reveal' ),
                'id'               => 'codexin_header',
                'customizer_width' => '500px',
                'subsection'       => true,
                'fields'           => array(

                    array(
                        'id'       => 'cx_logo_type',
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
                        'id'       => 'cx_text_logo',
                        'required' => array('cx_logo_type', 'equals', '1'),
                        'type'     => 'text',
                        'title'    => esc_html__( 'Write your text logo', 'reveal' ),
                        'desc'     => esc_html__( 'Please write text logo here', 'reveal' ),
                        'default'  => 'ReVeal',
                    ),

                    array(
                        'id'          => 'cx_text_logo_typography',
                        'required'    => array('cx_logo_type', 'equals', '1'),
                        'type'        => 'typography',
                        'title'       => esc_html__( 'Typography For Text Logo', 'reveal' ),
                        'preview'     => true,
                        'all_styles'  => true,
                        'letter-spacing'=> true,
                        'output'      => array( 'a.navbar-brand' ),
                        'units'       => 'px',
                        'color'       => false,
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
                        'id'       => 'cx_image_logo',
                        'required' => array('cx_logo_type', 'equals', '2'),
                        'type'     => 'media',
                        'url'      => true,
                        'title'    => esc_html__( 'Upload Company Logo', 'reveal' ),
                        'compiler' => 'true',
                        'desc'     => esc_html__( 'Please Upload Company Logo', 'reveal' ),
                        'subtitle' => esc_html__( 'Recommended Logo Size 260X100', 'reveal' ),
                        'default'  => array( 'url' => '//placehold.it/260X100' ),
                    ),


                    array(
                        'id'       => 'cx_header_version',
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
                        'id'        => 'cx_header_four_info',
                        'type'      => 'info',
                        'style'     => 'success',
                        'icon'      => 'el el-info-circle',
                        'required'  => array( 'cx_header_version', '=', '4' ),
                        'title'     => esc_html__( 'Social Media Information ', 'reveal' ),
                        'desc'      => sprintf( '%1$s<b><a href="%2$s" target="_blank">%3$s</a></b>', esc_html__('In order to set the Social Media Profile Information, please go to ', 'reveal'), esc_url(admin_url().'admin.php?page=codexin-options&action=social'), 'Social Media' ),
                    ),

                    array(
                        'id'        => 'cx_header_socials',
                        'type'      => 'checkbox',
                        'title'     => esc_html__( 'Select Social Profiles', 'reveal' ),
                        'subtitle'  => esc_html__( 'Which social profiles you want to show?', 'reveal' ),
                        'required'  => array( 'cx_header_version', '=', '4' ),
                        'options'   => array(
                            'facebook'  => 'Facebook',
                            'twitter'   => 'Twitter',
                            'instagram' => 'instagram',
                            'pinterest' => 'Pinterest',
                            'behance'   => 'Behance',
                            'gplus'     => 'Google Plus',
                            'linkedin'  => 'LinkedIn',
                            'youtube'   => 'Youtube',
                            'skype'     => 'Skype',
                        ),
                        'default'  => array(
                            'facebook'  => '1',
                            'twitter'   => '1',
                            'instagram' => '1',
                            'pinterest' => '1',
                            'behance'   => '0',
                            'gplus'     => '0',
                            'linkedin'  => '0',
                            'youtube'   => '0',
                            'skype'     => '0',
                        )
                    ),

                    array(
                        'id'        => 'cx_responsive_version',
                        'type'      => 'select',
                        'title'     => esc_html__( 'Select Responsive Navigation Type', 'reveal' ),
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
                'id'               => 'codexin-pb',
                'subsection'       => true,
                'fields'           => array(

                    array(
                        'id'       => 'cx_page_title_position',
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
                        'id'                => 'cx_title_padding',
                        'type'              => 'spacing',
                        'mode'              => 'padding',
                        'left'              => false,
                        'right'             => false,
                        'output'            => array( '#page_title.page-title' ),
                        'units'             => array( 'px' ),
                        'units_extended'    => 'true',
                        'title'             => esc_html__( 'Page Title padding', 'reveal' ),
                        'default'           => array( )
                    ),

                    array(
                        'id'       => 'cx_page_title_background',
                        'type'     => 'background',
                        'title'    => esc_html__( 'Background', 'reveal' ),
                        'subtitle' => esc_html__( 'Page header with image, color, etc.', 'reveal' ),
                        'output'   => array( '#page_title.page-title' ),
                    ),


                    array(
                        'id'       => 'cx_bcrumbs',
                        'type'     => 'switch',
                        'title'    => esc_html__( 'Enable Breadcrumbs?', 'reveal' ),
                        'subtitle' => esc_html__( 'Select to enable/disable Page-Title & Breadcrumbs', 'reveal' ),
                        'desc'     => esc_html__('Breadcrumbs is a navigational aid that allows visitors to understand their current location in the context of a website.', 'reveal'),
                        'default'  => true
                    ), 



                    array(
                        'id'       => 'cx_bc_position',
                        'type'     => 'radio',
                        'required' => array( 'cx_bcrumbs', '=', '1' ),
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

            $this->sections[] = array(
                'title'            => esc_html__( 'Blog Settings', 'reveal' ),
                'icon'             => 'dashicons dashicons-schedule',
                'id'               => 'codexin_blog_settings',
                'customizer_width' => '500px',
            );

            //Blog & Archive Page
            $this->sections[] = array(
                'title'            => esc_html__( 'Blog & Archive Page', 'reveal' ),
                'id'               => 'cx_blog_archive',
                'customizer_width' => '500px',
                'subsection'       => true,
                'fields'           => array(

                    array(
                        'id'        => 'cx_blog_title',
                        'type'      => 'text',
                        'title'     => esc_html__( 'Blog Page Title', 'reveal' ),
                        'subtitle'  => esc_html__( 'Enter Blog Page Title', 'revea;' ),
                        'default'   => esc_html__( 'Blog', 'reveal' )
                    ),

                    array(
                        'id'       => 'cx_blog_layout',
                        'type'     => 'image_select',
                        'title'    => esc_html__( 'Select Blog & Archive Page Layout', 'reveal' ),
                        'subtitle' => esc_html__( 'Select Blog & Archive Page Layout', 'reveal' ),
                        'desc'     => esc_html__( 'Choose From Full width / Left sidebar / Right Sidebar', 'reveal' ),
                        'options'  => array(
                            'no'        => array(
                                'alt'   => '1 Column',
                                'img'   => CODEXIN_FRAMEWORK_ADMIN_URL . 'assets/images/1col.png'
                            ),
                            'left'      => array(
                                'alt'   => '2 Column Left',
                                'img'   => CODEXIN_FRAMEWORK_ADMIN_URL . 'assets/images/2cl.png'
                            ),
                            'right'     => array(
                                'alt'   => '2 Column Right',
                                'img'   => CODEXIN_FRAMEWORK_ADMIN_URL . 'assets/images/2cr.png'
                            )
                        ),
                        'default'  => 'right'
                    ),

                    array(
                        'id'        => 'cx_blog_style',
                        'type'      => 'select',
                        'title'     => esc_html__( 'Blog & Archive Posts Style', 'reveal' ),
                        'desc'      => '',
                        'options'   => array(
                            'list'  => esc_html__( 'List', 'reveal' ),
                            'grid'  => esc_html__( 'Grid', 'reveal' ),
                        ),
                        'default'   => 'list'
                    ),

                    array(
                        'id'        => 'cx_grid_columns',
                        'type'      => 'select',
                        'title'     => esc_html__( 'Columns Number', 'reveal' ),
                        'desc'      => '',
                        'options'   => array(
                            '2' => esc_html__( '2 columns', 'reveal' ) ,
                            '3' => esc_html__( '3 columns', 'reveal' ) ,
                            '4' => esc_html__( '4 columns', 'reveal' ) ,
                        ),
                        'default'   => '2',
                        'required'  => array( 'cx_blog_style', 'equals', array( 'grid' ) ),
                    ),

                    array(
                        'id'       => 'cx_blog_title_excerpt_length',
                        'type'     => 'switch',
                        'title'    => esc_html__( 'Enable Blog Title and Excerpt Length?', 'reveal' ),
                        'subtitle' => esc_html__( 'Select to enable/disable blog-title & excerpt length', 'reveal' ),
                        'default'  => 0,
                        'on'       => esc_html__( 'Enabled', 'reveal' ),
                        'off'      => esc_html__( 'Disabled', 'reveal' ),
                    ),

                    array(
                        'id'        => 'cx_title_length',
                        'type'      => 'slider',
                        'min'       => '10',
                        'max'       => '150',
                        'step'      => '1',
                        'required'  => array( 'cx_blog_title_excerpt_length', '=', '1' ),
                        'title'     => esc_html__( 'Title Length for Posts', 'reveal' ),
                        'subtitle'  => esc_html__( 'Control the Title Length for Posts (In Character)', 'reveal' ),
                        'desc'      => esc_html__( "Adjust the Number of Character to Show in the Post Title in Blog & Archive Page.", 'reveal' ),
                        'default'   => 30,
                    ),

                    array(
                        'id'        => 'cx_excerpt_length',
                        'type'      => 'slider',
                        'min'       => '20',
                        'max'       => '500',
                        'step'      => '1',
                        'required'  => array( 'cx_blog_title_excerpt_length', '=', '1' ),
                        'title'     => esc_html__( 'Excerpt Length for Posts', 'reveal' ),
                        'subtitle'  => esc_html__( 'Control the Excerpt Length for Posts (In Character)', 'reveal' ),
                        'desc'      => esc_html__( "Adjust the Number of Character to Show in the Post Excerpts in Blog & Archive Page.", 'reveal' ),
                        'default'   => 180,
                    ),

                    array(
                        'id'        => 'cx_blog_post_meta',
                        'type'      => 'checkbox',
                        'title'     => esc_html__( 'Post Meta you want to be displayed in Blog Archive Page', 'reveal' ),
                        'subtitle'  => esc_html__( 'You can select multiple checkboxes', 'reveal' ),
                        'options'   => array(
                            '1' => esc_html__( 'Author', 'reveal' ),
                            '2' => esc_html__( 'Publish Date', 'reveal' ),
                            '3' => esc_html__( 'Categories', 'reveal' ),
                            '4' => esc_html__( 'Comments', 'reveal' ),
                            '5' => esc_html__( 'Post Like Button', 'reveal' ),
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
                        'id'        => 'cx_blog_read_more',
                        'type'      => 'switch',
                        'title'     => esc_html__( 'Enable Read More Button?', 'reveal' ),
                        'subtitle'  => esc_html__( 'Enable Read More Button in Posts?', 'reveal' ),
                        'desc'      => esc_html__( 'Choose to Enable / Disable Read More Button in the Posts Loop', 'reveal' ),
                        'default'   => true,
                    ),   

                    array(
                        'id'        => 'cx_pagination',
                        'type'      => 'select',
                        'title'     => esc_html__( 'Pagination Type', 'reveal' ),
                        'desc'      => esc_html__( 'Select the Pagination Type.', 'reveal' ),
                        'options'   => array(
                            'numbered'  => esc_html__( 'Numbered pagination', 'reveal' ),
                            'button'    => esc_html__( 'Next - Previous Button', 'reveal' ),
                        ),
                        'default'   => 'button'
                    ),

                    array(
                        'id'        => 'cx_blog_image',
                        'type'      => 'media',
                        'title'     => esc_html__( 'Default Placeholder Image', 'reveal' ),
                        'subtitle'  => esc_html__( 'Upload placeholder image for posts to show (if post has no featured image)', 'reveal' ),
                    ),
                )

            ); //End Blog & Archive Page...


            $this->sections[] = array(
                'title'            => esc_html__( 'Blog Single Page', 'reveal' ),
                'id'               => 'codexin_blog_single',
                'customizer_width' => '500px',
                'subsection'       => true,
                'fields'           => array(

                    array(
                        'id'       => 'cx_single_layout',
                        'type'     => 'image_select',
                        'title'    => esc_html__( 'Select Single Post Page Layout', 'reveal' ),
                        'subtitle' => esc_html__( 'Select Single post Page Layout', 'reveal' ),
                        'desc'     => esc_html__( 'Choose From Full width / Left sidebar / Right Sidebar', 'reveal' ),
                        'options'  => array(
                            'no'    => array(
                                'alt'   => '1 Column',
                                'img'   => CODEXIN_FRAMEWORK_ADMIN_URL . 'assets/images/1col.png'
                            ),
                            'left'  => array(
                                'alt'   => '2 Column Left',
                                'img'   => CODEXIN_FRAMEWORK_ADMIN_URL . 'assets/images/2cl.png'
                            ),
                            'right' => array(
                                'alt'   => '2 Column Right',
                                'img'   => CODEXIN_FRAMEWORK_ADMIN_URL . 'assets/images/2cr.png'
                            )
                        ),
                        'default'  => 'right'
                    ),

                    array(
                        'id'        => 'cx_blog_post_single_meta',
                        'type'      => 'checkbox',
                        'title'     => esc_html__( 'Post Meta you want to be displayed in Single Post Page', 'reveal' ),
                        'subtitle'  => esc_html__( 'You can select multiple checkboxes', 'reveal' ),
                        'options'   => array(
                            '1' => esc_html( 'Author', 'reveal' ),
                            '2' => esc_html( 'Publish Date', 'reveal' ),
                            '3' => esc_html( 'Categories', 'reveal' ),
                            '4' => esc_html( 'Comments', 'reveal' ),
                            '5' => esc_html( 'Post Like Button', 'reveal' ),
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
                        'id'        => 'cx_single_share',
                        'type'      => 'switch',
                        'title'     => esc_html__( 'Enable Share Links?', 'reveal' ),
                        'subtitle'  => esc_html__( 'Select if You Need Share Links', 'reveal' ),
                        'desc'      => esc_html__( 'Choose to Enable / Disable Share Links in Single Post', 'reveal' ),
                        "default"   => true,
                    ),

                    array(
                        'id'        => 'cx_single_button',
                        'type'      => 'switch',
                        'title'     => esc_html__( 'Enable Post Navigation?', 'reveal' ),
                        'subtitle'  => esc_html__( 'Select if You Need Post Navigation', 'reveal' ),
                        'desc'      => esc_html__( 'Choose to Enable / Disable Previous or Next Post Links', 'reveal' ),
                        "default"   => true,
                    ),

                    array(
                        'id'        => 'cx_single_pagination',
                        'type'      => 'select',
                        'title'     => esc_html__( 'Pagination Type', 'reveal' ),
                        'desc'      => esc_html__( 'Select the Pagination Type for Single Posts.', 'reveal' ),
                        'required'  => array( 'cx_single_button', '=', '1' ),
                        'options'   => array(
                            'button'    => esc_html__( 'Next - Previous Button', 'reveal' ),
                            'title'     => esc_html__( 'Button with Post Title Text', 'reveal' ),
                        ),
                        'default'   => 'button'
                    ),

                    array(
                        'id'        => 'cx_post_comments',
                        'type'      => 'switch',
                        'title'     => esc_html__( 'Show Comments?', 'reveal' ),
                        'subtitle'  => esc_html__( 'Select if You Need to Show Single Blog Post Comments Section', 'reveal' ),
                        'desc'      => esc_html__( 'Choose to Enable / Disable to Show Blog Single Post Comments', 'reveal' ),
                        "default"   => true,
                    ),
                )
            );  

            //Custom Post Type Portfolio Settings
            $this->sections[] = array(
                'title'            => esc_html__( 'Portfolio Settings', 'reveal' ),
                'icon'             => 'dashicons dashicons-art',
                'id'               => 'codexin_portfolio_settings',
                'customizer_width' => '500px',
            );

            $this->sections[] = array(
                'title'            => esc_html__( 'Portfolio Archive Page', 'reveal' ),
                'id'               => 'codexin_portfolio_archive',
                'customizer_width' => '500px',
                'subsection'       => true,
                'fields'           => array(

                    array(
                        'id'        => 'cx_portfolio_info',
                        'type'      => 'info',
                        'style'     => 'success',
                        'icon'      => 'el el-info-circle',
                        'title'     => esc_html__( 'Portfolio Information ', 'reveal' ),
                        'desc'      => esc_html__( 'If you disable \'Portfolio Custom Post\' from the below button, after saving changes, you have to refresh the page to see the effect.', 'reveal' ),
                    ),

                    array(
                        'id'        => 'cx_enable_portfolio',
                        'type'      => 'switch',
                        'title'     => esc_html__( 'Enable Portfolio?', 'reveal' ),
                        'subtitle'  => esc_html__( 'Select if You Need Portfolio', 'reveal' ),
                        'desc'      => esc_html__( 'Choose to Enable / Disable Portfolio Custom Post', 'reveal' ),
                        "default"   => true,
                    ),

                    array(
                        'id'       => 'cx_portfolio_archive_layout',
                        'type'     => 'image_select',
                        'required' => array( 'cx_enable_portfolio', '=', '1' ),
                        'title'    => esc_html__( 'Portfolio Archive Page Layout', 'reveal' ),
                        'subtitle' => esc_html__( 'Select Portfolio Archive Page Layout', 'reveal' ),
                        'desc'     => esc_html__( 'Choose From Full width / Left sidebar / Right Sidebar', 'reveal' ),
                        'options'  => array(
                            'no'    => array(
                                'alt'   => '1 Column',
                                'img'   => CODEXIN_FRAMEWORK_ADMIN_URL . 'assets/images/1col.png'
                            ),
                            'left'  => array(
                                'alt'   => '2 Column Left',
                                'img'   => CODEXIN_FRAMEWORK_ADMIN_URL . 'assets/images/2cl.png'
                            ),
                            'right' => array(
                                'alt'   => '2 Column Right',
                                'img'   => CODEXIN_FRAMEWORK_ADMIN_URL . 'assets/images/2cr.png'
                            )
                        ),
                        'default'  => 'no'
                    ),

                    array(
                        'id'        => 'cx_portfolio_style',
                        'type'      => 'select',
                        'title'     => esc_html__( 'Portfolio Archive Posts Style', 'reveal' ),
                        'desc'      => esc_html__( 'Choose Portfolio Archive Posts Style', 'reveal' ),
                        'required'  => array( 'cx_enable_portfolio', '=', '1' ),
                        'options'   => array(
                            'grid'  => esc_html__( 'Grid', 'reveal' ),
                            'list'  => esc_html__( 'List', 'reveal' ),
                        ),
                        'default'   => 'list'
                    ),

                    array(
                        'id'        => 'cx_portfolio_grid_columns',
                        'type'      => 'select',
                        'title'     => esc_html__( 'Columns Number', 'reveal' ),
                        'desc'      => '',
                        'options'   => array(
                            '2' => esc_html__( '2 columns', 'reveal' ) ,
                            '3' => esc_html__( '3 columns', 'reveal' ) ,
                            '4' => esc_html__( '4 columns', 'reveal' ) ,
                        ),
                        'default'   => '3',
                        'required'  => array( 'cx_portfolio_style', 'equals', array( 'grid' ) ),
                    ),

                    array(
                        'id'       => 'cx_portfolio_title_excerpt_length',
                        'type'     => 'switch',
                        'required' => array( 'cx_enable_portfolio', '=', '1' ),
                        'title'    => esc_html__( 'Enable Portfolio Title and Excerpt Length?', 'reveal' ),
                        'subtitle' => esc_html__( 'Select to enable/disable portfolio-title & excerpt length', 'reveal' ),
                        'default'  => 0,
                        'on'       => esc_html__( 'Enabled', 'reveal' ),
                        'off'      => esc_html__( 'Disabled', 'reveal' ),
                    ),

                    array(
                        'id'        => 'cx_portfolio_title_length',
                        'type'      => 'slider',
                        'min'       => '10',
                        'max'       => '150',
                        'step'      => '1',
                        'required'  => array( 'cx_portfolio_title_excerpt_length', '=', '1' ),
                        'title'     => esc_html__( 'Title Length for Portfolios', 'reveal' ),
                        'subtitle'  => esc_html__( 'Control the Title Length for Portfolios (In Character)', 'reveal' ),
                        'desc'      => esc_html__( "Adjust the Number of Character to Show in the Post Title in Portfolio Archive Page.", 'reveal' ),
                        'default'   => 30,
                    ),

                    array(
                        'id'        => 'cx_portfolio_excerpt_length',
                        'type'      => 'slider',
                        'min'       => '20',
                        'max'       => '500',
                        'step'      => '1',
                        'required'  => array( 'cx_portfolio_title_excerpt_length', '=', '1' ),
                        'title'     => esc_html__( 'Excerpt Length for Portfolios', 'reveal' ),
                        'subtitle'  => esc_html__( 'Control the Excerpt Length for Portfolios (In Character)', 'reveal' ),
                        'desc'      => esc_html__( "Adjust the Number of Character to Show in the Post Excerpts in Portfolio Archive Page.", 'reveal' ),
                        'default'   => 180,
                    ),

                    array(
                        'id'        => 'cx_portfolio_pagination',
                        'type'      => 'select',
                        'title'     => esc_html__( 'Portfolio Archive Pagination Type', 'reveal' ),
                        'desc'      => esc_html__( 'Select the Pagination Type.', 'reveal' ),
                        'required'  => array( 'cx_enable_portfolio', '=', '1' ),
                        'options'   => array(
                            'numbered'  => esc_html__( 'Numbered pagination', 'reveal' ),
                            'button'    => esc_html__( 'Next - Previous Button', 'reveal' ),
                        ),
                        'default'   => 'button'
                    ),

                    array(
                        'id'        => 'cx_portfolio_image',
                        'type'      => 'media',
                        'title'     => esc_html__( 'Default Placeholder Image', 'reveal' ),
                        'subtitle'  => esc_html__( 'Upload placeholder image for portfolios to show (if portfolio has no featured image)', 'reveal' ),
                        'required'  => array( 'cx_enable_portfolio', '=', '1' ),
                    ),

                )    
            );

            $this->sections[] = array(
                'title'            => esc_html__( 'Portfolio Single Page', 'reveal' ),
                'id'               => 'codexin_portfolio_single',
                'customizer_width' => '500px',
                'subsection'       => true,
                'fields'           => array(

                    array(
                        'id'       => 'cx_single_portfolio_layout',
                        'type'     => 'image_select',
                        'required' => array( 'cx_enable_portfolio', '=', '1' ),
                        'title'    => esc_html__( 'Portfolio Single Page Layout', 'reveal' ),
                        'subtitle' => esc_html__( 'Select Single Portfolio Page Layout', 'reveal' ),
                        'desc'     => esc_html__( 'Choose From Left / Right Information Sidebar', 'reveal' ),
                        'options'  => array(
                            '1' => array(
                                'alt' => '2 Column Left',
                                'img' => CODEXIN_FRAMEWORK_ADMIN_URL . 'assets/images/2cl.png'
                            ),
                            '2' => array(
                                'alt' => '2 Column Right',
                                'img' => CODEXIN_FRAMEWORK_ADMIN_URL . 'assets/images/2cr.png'
                            )
                        ),
                        'default'  => '2'
                    ),

                    array(
                        'id'        => 'cx_portfolio_comments',
                        'type'      => 'switch',
                        'required'  => array( 'cx_enable_portfolio', '=', '1' ),
                        'title'     => esc_html__( 'Enable Portfolio Comments?', 'reveal' ),
                        'subtitle'  => esc_html__( 'Select if You Need Portfolio Single Page Comments Section', 'reveal' ),
                        'desc'      => esc_html__( 'Choose to Enable / Disable Portfolio Single Page Comments', 'reveal' ),
                        "default"   => false,
                    ),

                )
            );

            //Custom Post Type Events Settings
            $this->sections[] = array(
                'title'            => esc_html__( 'Events Settings', 'reveal' ),
                'icon'             => 'dashicons dashicons-clipboard',
                'id'               => 'codexin_events_settings',
                'customizer_width' => '500px',
                'fields'           => array(

                    array(
                        'id'        => 'cx_events_info',
                        'type'      => 'info',
                        'style'     => 'success',
                        'icon'      => 'el el-info-circle',
                        'title'     => esc_html__( 'Events Information ', 'reveal' ),
                        'desc'      => esc_html__( 'If you disable \'Events Custom Post\' from the below button, after saving changes, you have to refresh the page to see the effect.', 'reveal' ),
                    ),

                    array(
                        'id'        => 'cx_enable_events',
                        'type'      => 'switch',
                        'title'     => esc_html__('Enable Events?', 'reveal'),
                        'subtitle'  => esc_html__('Select if You Need Events', 'reveal'),
                        'desc'      => esc_html__('Choose to Enable / Disable Events Custom Post (You have to refresh the page after saving to see the effect)', 'reveal'),
                        "default"   => true,
                    ),

                    array(
                        'id'       => 'cx_events_archive_layout',
                        'type'     => 'image_select',
                        'required' => array( 'cx_enable_events', '=', '1' ),
                        'title'    => esc_html__( 'Events Archive Page Layout', 'reveal' ),
                        'subtitle' => esc_html__( 'Select Events Archive Page Layout', 'reveal' ),
                        'desc'     => esc_html__( 'Choose From Full width / Left sidebar / Right Sidebar', 'reveal' ),
                        'options'  => array(
                            'no' => array(
                                'alt' => '1 Column',
                                'img' => CODEXIN_FRAMEWORK_ADMIN_URL . 'assets/images/1col.png'
                            ),
                            'left' => array(
                                'alt' => '2 Column Left',
                                'img' => CODEXIN_FRAMEWORK_ADMIN_URL . 'assets/images/2cl.png'
                            ),
                            'right' => array(
                                'alt' => '2 Column Right',
                                'img' => CODEXIN_FRAMEWORK_ADMIN_URL . 'assets/images/2cr.png'
                            )
                        ),
                        'default'  => 'no'
                    ),

                    array(
                        'id'        => 'cx_events_style',
                        'type'      => 'select',
                        'title'     => esc_html__( 'Events Archive Posts Style', 'reveal' ),
                        'desc'      => esc_html__( 'Choose Events Archive Posts Style', 'reveal' ),
                        'required'  => array( 'cx_enable_events', '=', '1' ),
                        'options'   => array(
                            'grid'  => esc_html__( 'Grid', 'reveal' ),
                            'list'  => esc_html__( 'List', 'reveal' ),
                        ),
                        'default'   => 'list'
                    ),

                    array(
                        'id'        => 'cx_events_grid_columns',
                        'type'      => 'select',
                        'title'     => esc_html__( 'Columns Number', 'reveal' ),
                        'desc'      => '',
                        'options'   => array(
                            '2' => esc_html__( '2 columns', 'reveal' ) ,
                            '3' => esc_html__( '3 columns', 'reveal' ) ,
                            '4' => esc_html__( '4 columns', 'reveal' ) ,
                        ),
                        'default'   => '3',
                        'required'  => array( 'cx_events_style', 'equals', array( 'grid' ) ),
                    ),

                    array(
                        'id'       => 'cx_events_title_excerpt_length',
                        'type'     => 'switch',
                        'required' => array( 'cx_enable_events', '=', '1' ),
                        'title'    => esc_html__( 'Enable Events Title and Excerpt Length?', 'reveal' ),
                        'subtitle' => esc_html__( 'Select to enable/disable Events-title & excerpt length', 'reveal' ),
                        'default'  => 0,
                        'on'       => esc_html__( 'Enabled', 'reveal' ),
                        'off'      => esc_html__( 'Disabled', 'reveal' ),
                    ),

                    array(
                        'id'        => 'cx_events_title_length',
                        'type'      => 'slider',
                        'min'       => '10',
                        'max'       => '150',
                        'step'      => '1',
                        'required'  => array( 'cx_events_title_excerpt_length', '=', '1' ),
                        'title'     => esc_html__( 'Title Length for Events', 'reveal' ),
                        'subtitle'  => esc_html__( 'Control the Title Length for Events (In Character)', 'reveal' ),
                        'desc'      => esc_html__( "Adjust the Number of Character to Show in the Post Title in Events Archive Page.", 'reveal' ),
                        'default'   => 30,
                    ),

                    array(
                        'id'        => 'cx_events_excerpt_length',
                        'type'      => 'slider',
                        'min'       => '20',
                        'max'       => '500',
                        'step'      => '1',
                        'required'  => array( 'cx_events_title_excerpt_length', '=', '1' ),
                        'title'     => esc_html__( 'Excerpt Length for Events', 'reveal' ),
                        'subtitle'  => esc_html__( 'Control the Excerpt Length for Events (In Character)', 'reveal' ),
                        'desc'      => esc_html__( "Adjust the Number of Character to Show in the Post Excerpts in Events Archive Page.", 'reveal' ),
                        'default'   => 180,
                    ),

                    array(
                        'id'        => 'cx_events_pagination',
                        'type'      => 'select',
                        'title'     => esc_html__( 'Events Archive Pagination Type', 'reveal' ),
                        'desc'      => esc_html__( 'Select the Pagination Type.', 'reveal' ),
                        'required'  => array( 'cx_enable_events', '=', '1' ),
                        'options'   => array(
                            'numbered'  => esc_html__( 'Numbered pagination', 'reveal' ),
                            'button'    => esc_html__( 'Next - Previous Button', 'reveal' ),
                        ),
                        'default'   => 'button'
                    ),

                    array(
                        'id'        => 'cx_events_image',
                        'type'      => 'media',
                        'title'     => esc_html__( 'Default Placeholder Image', 'reveal' ),
                        'subtitle'  => esc_html__( 'Upload placeholder image for events to show (if event has no featured image)', 'reveal' ),
                        'required'  => array( 'cx_enable_events', '=', '1' ),
                    ),
                )    
            );

            //Custom Post Type Testimonial Settings
            $this->sections[] = array(
                'title'            => esc_html__( 'Testimonial Settings', 'reveal' ),
                'icon'             => 'dashicons dashicons-welcome-learn-more',
                'id'               => 'codexin_tesimonial_settings',
                'customizer_width' => '500px',
                'fields'           => array(

                    array(
                        'id'        => 'cx_testimonial-info',
                        'type'      => 'info',
                        'style'     => 'success',
                        'icon'      => 'el el-info-circle',
                        'title'     => esc_html__( 'Testimonial Information ', 'reveal' ),
                        'desc'      => esc_html__( 'If you disable \'Testimonial Custom Post\' from the below button, after saving changes, you have to refresh the page to see the effect.', 'reveal' ),
                    ),

                    array(
                        'id'        => 'cx_enable_testimonial',
                        'type'      => 'switch',
                        'title'     => esc_html__( 'Enable Testimonials?', 'reveal' ),
                        'subtitle'  => esc_html__( 'Select if You Need Testimonials', 'reveal' ),
                        'desc'      => esc_html__( 'Choose to Enable / Disable Testimonial Custom Post (You have to refresh the page after saving to see th e effect)', 'reveal'),
                        "default"   => true,
                    ),

                    array(
                        'id'       => 'cx_testimonial_archive_layout',
                        'type'     => 'image_select',
                        'required' => array( 'cx_enable_testimonial', '=', '1' ),
                        'title'    => esc_html__( 'Testimonials Archive Page Layout', 'reveal' ),
                        'subtitle' => esc_html__( 'Select Testimonials Archive Page Layout', 'reveal' ),
                        'desc'     => esc_html__( 'Choose From No Sidebar / Left sidebar / Right Sidebar', 'reveal' ),
                        'options'  => array(
                            'no' => array(
                                'alt' => '1 Column',
                                'img' => CODEXIN_FRAMEWORK_ADMIN_URL . 'assets/images/1col.png'
                            ),
                            'left' => array(
                                'alt' => '2 Column Left',
                                'img' => CODEXIN_FRAMEWORK_ADMIN_URL . 'assets/images/2cl.png'
                            ),
                            'right' => array(
                                'alt' => '2 Column Right',
                                'img' => CODEXIN_FRAMEWORK_ADMIN_URL . 'assets/images/2cr.png'
                            )
                        ),
                        'default'  => 'no'
                    ),

                    array(
                        'id'        => 'cx_enable_testimonial_pagination',
                        'type'      => 'switch',
                        'title'     => esc_html__( 'Enable Pagination?', 'reveal' ),
                        'subtitle'  => esc_html__( 'Select if You Need Pagination', 'reveal' ),
                        'desc'      => esc_html__( 'Choose to Enable / Disable Testimonials Pagination', 'reveal' ),
                        'required'  => array( 'cx_enable_testimonial', '=', '1' ),
                    ),

                    array(
                        'id'        => 'cx_testimonial_image',
                        'type'      => 'media',
                        'title'     => esc_html__( 'Default Placeholder Image', 'reveal' ),
                        'subtitle'  => esc_html__( 'Upload placeholder image for testimonials to show (if testimonial has no featured image)', 'reveal' ),
                        'required'  => array( 'cx_enable_testimonial', '=', '1' ),
                    ),
                )    
            );

            //Custom Post Type Team Settings
            $this->sections[] = array(
                'title'            => esc_html__( 'Team Settings', 'reveal' ),
                'icon'             => 'dashicons dashicons-admin-users',
                'id'               => 'codexin_team_settings',
                'customizer_width' => '500px',
                'fields'           => array(

                    array(
                        'id'        => 'cx_team_info',
                        'type'      => 'info',
                        'style'     => 'success',
                        'icon'      => 'el el-info-circle',
                        'title'     => esc_html__( 'Team Information ', 'reveal' ),
                        'desc'      => esc_html__( 'If you disable \'Team Custom Post\' from the below button, after saving changes, you have to refresh the page to see the effect.', 'reveal' ),
                    ),

                    array(
                        'id'        => 'cx_enable_team',
                        'type'      => 'switch',
                        'title'     => esc_html__( 'Enable Team?', 'reveal' ),
                        'subtitle'  => esc_html__( 'Select if You Need Team', 'reveal' ),
                        'desc'      => esc_html__( 'Choose to Enable / Disable Team Custom Post (You have to refresh the page after saving to see the effect)',  'reveal'),
                        "default"   => true,
                    ),

                    array(
                        'id'        => 'cx_team_image',
                        'type'      => 'media',
                        'title'     => esc_html__( 'Default Placeholder Image', 'reveal' ),
                        'subtitle'  => esc_html__( 'Upload placeholder image for team to show (if team has no featured image)', 'reveal' ),
                        'required'  => array( 'cx_enable_team', '=', '1' ),
                    ),
                )    
            );


            // footer section 
            $this->sections[] = array(
                'title'            => esc_html__( 'Footer', 'reveal' ),
                'customizer_width' => '500px',
                'id'               => 'codexin_footer',
                'fields'           => array(

                    array(
                        'id'       => 'cx_footer_version',
                        'type'     => 'image_select',
                        'title'    => esc_html__( 'Select Footer Layout Type', 'reveal' ),
                        'desc'     => esc_html__( 'Choose Footer Layout Type', 'reveal' ),
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
                        'id'       => 'cx_footer_copyright',
                        'type'     => 'switch',
                        'title'    => esc_html__( 'Enable Footer Copyright?', 'reveal' ),
                        'subtitle' => esc_html__( 'Select to enable/disable Footer Copyright', 'reveal' ),
                        'default'  => true,
                    ),


                    array(
                        'id'       => 'cx_copyright',
                        'type'     => 'textarea',
                        'required' => array( 'cx_footer_copyright', '=', '1' ),
                        'title'    => esc_html__( 'Footer copyright text  ', 'reveal' ),
                        'desc'     => esc_html__( 'Please add your copyright text  ', 'reveal' ),
                        'validate' => 'html',
                        'default'  => esc_html__( 'Copyright &copy; 2017. All Right Reserved.', 'reveal' )
                    ),
                )

            ); //End Footer...

            $this->sections[] = array(
                'title'            => esc_html__( 'Advanced Settings', 'reveal' ),
                'customizer_width' => '500px',
                'id'               => 'codexin_advanced_settings',
                'icon'             => 'el el-view-mode ',
                'fields'           => array(
            ) );

            $this->sections[] = array(
                'id'            => 'cx_advanced_css',
                'title'         => esc_html__( 'Custom CSS', 'reveal' ),
                'desc'          => '',
                'subsection'    => true,
                'fields'        => array(
                    array(
                        'id'            => 'cx_advanced_editor_css',
                        'type'          => 'ace_editor',
                        'title'         => esc_html__( 'CSS Code', 'reveal' ),
                        'subtitle'      => esc_html__( 'Paste your CSS code here.', 'reveal' ),
                        'mode'          => 'css',
                        'theme'         => 'chrome',
                        'full_width'    => true
                    ),
                )
            );

            $this->sections[] = array(
                'id'            => 'cx_advanced_js',
                'title'         => esc_html__( 'Custom JS', 'reveal' ),
                'desc'          => '',
                'subsection'    => true,
                'fields'        => array(
                    array(
                        'id'            => 'cx_advanced_editor_js',
                        'type'          => 'ace_editor',
                        'title'         => esc_html__( 'JS Code', 'reveal' ),
                        'subtitle'      => esc_html__( 'Paste your JS code here.', 'reveal' ),
                        'mode'          => 'javascript',
                        'theme'         => 'chrome',
                        'default'       => "jQuery(document).ready(function(){\n\n});",
                        'full_width'    => true
                    ),
                )
            );

            $this->sections[] = array(
                'id'            => 'cx_advanced_tracking',
                'title'         => esc_html__( 'Tracking Code', 'reveal' ),
                'desc'          => '',
                'subsection'    => true,
                'fields'        => array(
                    array(
                        'id'       => 'cx_advanced_tracking_code',
                        'type'     => 'textarea',
                        'title'    => esc_html__( 'Tracking Code', 'reveal' ),
                        'desc'     => esc_html__( 'Paste your Google Analytics (or other) tracking code here. This will be added into the head of the theme. Please put code inside script tags.', 'reveal' ),
                    )
                )
            );




        }
    }

    global $reduxConfig;
    $reduxConfig = new Codexin_Admin();

} else {
    echo __( 'The class named Redux_Framework_sample_config has already been called. <strong>Developers, you need to prefix this class with your company name or you\'ll run into problems!</strong>', 'reveal' );
}

