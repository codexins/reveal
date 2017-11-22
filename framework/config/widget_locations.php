<?php

/**
 * Codexin Widget class definitions. Defines locations for sidebar and footer widgets.
 *
 * @package Reveal
 * @subpackage Core
 */


// Do not allow directly accessing this file.
defined( 'ABSPATH' ) OR die( esc_html__(  'This script cannot be accessed directly.', 'reveal' ) );


if( ! class_exists( 'Codexin_Sidebar_Widget' ) ) {
	/**
	 * Class to register various widget locations for the theme.
	 * 
	 * @since v1.0.0
	 */
	class Codexin_Sidebar_Widget {

		// Registering Main Sidebar Widget Locations
		public static function codexin_sidebar_widgets_init() {
		
			register_sidebar( array(
				'name'				=> esc_html__( 'Sidebar (General)', 'reveal' ),
				'id'				=> 'codexin-sidebar-general',
				'description'		=> esc_html__( 'This sidebar will show everywhere the sidebar is enabled, both Posts and Pages.', 'reveal' ),
				'before_widget' 	=> '<div id="%1$s" class="%2$s sidebar-widget reveal-color-0 clearfix">',
				'after_widget'  	=> '</div>',			
			) );

			register_sidebar( array(
				'name'				=> esc_html__( 'Sidebar (Pages)', 'reveal' ),
				'id'				=> 'codexin-sidebar-page',
				'description'		=> esc_html__( 'This sidebar will show on all Pages.', 'reveal' ),
				'before_widget' 	=> '<div id="%1$s" class="%2$s sidebar-widget reveal-color-0 clearfix">',
				'after_widget'  	=> '</div>',		
			) );
			
			register_sidebar( array(
				'name' 				=> esc_html__( 'Sidebar (Blog)', 'reveal' ),
				'id'				=> 'codexin-sidebar-blog',
				'description'		=> esc_html__( 'This sidebar will show on all blog Posts.', 'reveal' ), 
				'before_widget' 	=> '<div id="%1$s" class="%2$s sidebar-widget reveal-color-0 clearfix">',
				'after_widget'  	=> '</div>',		
			) );

			register_sidebar( array(
				'name' 				=> esc_html__( 'Sidebar (Portfolio)', 'reveal' ),
				'id'				=> 'codexin-sidebar-portfolio',
				'description'		=> esc_html__( 'This sidebar will show only on Portfolio Page.', 'reveal' ), 
				'before_widget' 	=> '<div id="%1$s" class="%2$s sidebar-widget reveal-color-0 clearfix">',
				'after_widget'  	=> '</div>',		
			) );

		} 

		// Registering Footer Widget Locations based on the user choice
		public static function codexin_footer_widgets() {

			$codexin_footer = codexin_get_option('reveal-footer-version');			

			if( ( $codexin_footer == 1 ) || ( $codexin_footer == 5 ) ) {

				$widget_count = 3;
				for( $i = 1; $i <= $widget_count ; $i++ ) { 

					register_sidebar( array(
						'name'				=> sprintf( esc_html__( 'Footer (Column-%s)', 'reveal' ), $i ),
						'id'				=> 'codexin-footer-col-'. $i .'',
						'description'	 	=> sprintf( esc_html__( 'The widget area for the footer column %s', 'reveal'), $i ),
					    'before_title'		=> '<p class="widget-title">',
					    'after_title'		=> '</p>',
						'before_widget' 	=> '<div  id="%1$s" class="%2$s codexin-widget clearfix">',
						'after_widget'  	=> '</div>',			
					) );

				}

			} elseif( ( $codexin_footer == 2 ) || ( $codexin_footer == 6 ) ) {

				$widget_count = 4;
				for( $i = 1; $i <= $widget_count ; $i++ ) { 

					register_sidebar( array(
						'name'				=> sprintf( esc_html__( 'Footer (Column-%s)', 'reveal' ), $i ),
						'id'				=> 'codexin-footer-col-'. $i .'',
						'description'	 	=> sprintf( esc_html__( 'The widget area for the footer column %s', 'reveal'), $i ),
					    'before_title'		=> '<p class="widget-title">',
					    'after_title'		=> '</p>',
						'before_widget' 	=> '<div  id="%1$s" class="%2$s codexin-widget clearfix">',
						'after_widget'  	=> '</div>',			
					) );

				}

			} elseif( $codexin_footer == 3 ) {

				$widget_count = 5;
				for( $i = 1; $i <= $widget_count ; $i++ ) { 

					register_sidebar( array(
						'name'				=> sprintf( esc_html__( 'Footer (Column-%s)', 'reveal' ), $i ),
						'id'				=> 'codexin-footer-col-'. $i .'',
						'description'	 	=> sprintf( esc_html__( 'The widget area for the footer column %s', 'reveal'), $i ),
					    'before_title'		=> '<p class="widget-title">',
					    'after_title'		=> '</p>',
						'before_widget' 	=> '<div  id="%1$s" class="%2$s codexin-widget clearfix">',
						'after_widget'  	=> '</div>',			
					) );

				}

			} elseif( $codexin_footer == 4 ) {

				$widget_count = 2;
				for( $i = 1; $i <= $widget_count ; $i++ ) { 

					register_sidebar( array(
						'name'				=> sprintf( esc_html__( 'Footer (Column-%s)', 'reveal' ), $i ),
						'id'				=> 'codexin-footer-col-'. $i .'',
						'description'	 	=> sprintf( esc_html__( 'The widget area for the footer column %s', 'reveal'), $i ),
					    'before_title'		=> '<p class="widget-title">',
					    'after_title'		=> '</p>',
						'before_widget' 	=> '<div  id="%1$s" class="%2$s codexin-widget clearfix">',
						'after_widget'  	=> '</div>',			
					) );

				}

			} else {

				$widget_count = 3;
				for( $i = 1; $i <= $widget_count ; $i++ ) { 

					register_sidebar( array(
						'name'				=> sprintf( esc_html__( 'Footer (Column-%s)', 'reveal' ), $i ),
						'id'				=> 'codexin-footer-col-'. $i .'',
						'description'	 	=> sprintf( esc_html__( 'The widget area for the footer column %s', 'reveal'), $i ),
					    'before_title'		=> '<p class="widget-title">',
					    'after_title'		=> '</p>',
						'before_widget' 	=> '<div  id="%1$s" class="%2$s codexin-widget clearfix">',
						'after_widget'  	=> '</div>',			
					) );

				}

			}
		} 

	}

}

// Hooking and instantiate the class into widgets_init
add_action( 'widgets_init', function() {

    $reveal_widget = new Codexin_Sidebar_Widget();
    $reveal_widget -> codexin_sidebar_widgets_init();
    $reveal_widget -> codexin_footer_widgets();

});

