<?php	
/**
 * reveal Widget class definitions
 *
 * @package Reveal
 */

/*
	=====================================
		REVEAL SIDEBAR WIDGET CLASS
	=====================================
*/

class Reveal_Sidebar_Widget {

	/**
	 * Register the widget locations.
	 * 
	 * @since v1.0.0
	 */

	// Registering Main Sidebar Widget Locations
	public static function reveal_sidebar_widgets_init () {
	
		register_sidebar( array(
			'name'				=> esc_html__('Sidebar (General)', 'reveal'),
			'id'				=> 'reveal-sidebar-general',
			'description'		=> esc_html__('This sidebar will show everywhere the sidebar is enabled, both Posts and Pages.', 'reveal'),	
			'before_widget' 	=> '<div id="%1$s" class="%2$s sidebar-widget reveal-color-0 clearfix">',
			'after_widget'  	=> '</div>',			
		) );

		register_sidebar( array(
			'name'				=> esc_html__('Sidebar (Pages)', 'reveal'),
			'id'				=> 'reveal-sidebar-page',
			'description'		=> esc_html__('This sidebar will show on all Pages.', 'reveal'),
			'before_widget' 	=> '<div id="%1$s" class="%2$s sidebar-widget reveal-color-0 clearfix">',
			'after_widget'  	=> '</div>',		
		) );
		
		register_sidebar( array(
			'name' 				=> esc_html__('Sidebar (Blog)', 'reveal'),
			'id'				=> 'reveal-sidebar-blog',
			'description'		=> esc_html__('This sidebar will show on all blog Posts.', 'reveal'), 
			'before_widget' 	=> '<div id="%1$s" class="%2$s sidebar-widget reveal-color-0 clearfix">',
			'after_widget'  	=> '</div>',		
		) );

		register_sidebar( array(
			'name' 				=> esc_html__('Sidebar (Portfolio)', 'reveal'),
			'id'				=> 'reveal-sidebar-portfolio-template',
			'description'		=> esc_html__('This sidebar will show only on Portfolio Page.', 'reveal'), 
			'before_widget' 	=> '<div id="%1$s" class="%2$s sidebar-widget reveal-color-0 clearfix">',
			'after_widget'  	=> '</div>',		
		) );

	} 

	// Registering Footer Widget Locations
	public static function reveal_footer_widgets () {

		$reveal_footer = codexin_get_option('reveal-footer-version');				

		if($reveal_footer == 1):

		$widget_count = 4;
		for ($i = 1; $i <= $widget_count ; $i++) { 

			register_sidebar( array(
				'name'				=> sprintf(esc_html__('Footer (Column-%s)', 'reveal'), $i),
				'id'				=> 'reveal-footer-col-'. $i .'',
			    'before_title'		=> '<p class="widget-title">',
			    'after_title'		=> '</p>',
				'before_widget' 	=> '<div  id="%1$s" class="%2$s reveal-widget clearfix">',
				'after_widget'  	=> '</div>',			
			) );

		}

		elseif($reveal_footer == 2):

		$widget_count = 3;
		for ($i = 1; $i <= $widget_count ; $i++) { 

			register_sidebar( array(
				'name'				=> sprintf(esc_html__('Footer (Column-%s)', 'reveal'), $i),
				'id'				=> 'reveal-footer-col-'. $i .'',
			    'before_title'		=> '<p class="widget-title">',
			    'after_title'		=> '</p>',
				'before_widget' 	=> '<div  id="%1$s" class="%2$s reveal-widget clearfix">',
				'after_widget'  	=> '</div>',			
			) );

		}

		elseif($reveal_footer == 3):

		$widget_count = 2;
		for ($i = 1; $i <= $widget_count ; $i++) { 

			register_sidebar( array(
				'name'				=> sprintf(esc_html__('Footer (Column-%s)', 'reveal'), $i),
				'id'				=> 'reveal-footer-col-'. $i .'',
			    'before_title'		=> '<p class="widget-title">',
			    'after_title'		=> '</p>',
				'before_widget' 	=> '<div  id="%1$s" class="%2$s reveal-widget clearfix">',
				'after_widget'  	=> '</div>',			
			) );

		}

		elseif($reveal_footer == 4):

		$widget_count = 3;
		for ($i = 1; $i <= $widget_count ; $i++) { 

			register_sidebar( array(
				'name'				=> sprintf(esc_html__('Footer (Column-%s)', 'reveal'), $i),
				'id'				=> 'reveal-footer-col-'. $i .'',
			    'before_title'		=> '<p class="widget-title">',
			    'after_title'		=> '</p>',
				'before_widget' 	=> '<div  id="%1$s" class="%2$s reveal-widget clearfix">',
				'after_widget'  	=> '</div>',			
			) );

		}

		elseif($reveal_footer == 5):

		$widget_count = 5;
		for ($i = 1; $i <= $reveal_footer ; $i++) { 

			register_sidebar( array(
				'name'				=> sprintf(esc_html__('Footer (Column-%s)', 'reveal'), $i),
				'id'				=> 'reveal-footer-col-'. $i .'',
			    'before_title'		=> '<p class="widget-title">',
			    'after_title'		=> '</p>',
				'before_widget' 	=> '<div  id="%1$s" class="%2$s reveal-widget clearfix">',
				'after_widget'  	=> '</div>',			
			) );

		}

		elseif($reveal_footer == 6):

		$widget_count = 4;
		for ($i = 1; $i <= $widget_count ; $i++) { 

			register_sidebar( array(
				'name'				=> sprintf(esc_html__('Footer (Column-%s)', 'reveal'), $i),
				'id'				=> 'reveal-footer-col-'. $i .'',
			    'before_title'		=> '<p class="widget-title">',
			    'after_title'		=> '</p>',
				'before_widget' 	=> '<div class="reveal-widget clearfix">',
				'after_widget'  	=> '</div>',			
			) );

		}

		endif;
	} 

}


add_action('widgets_init',function(){

    $reveal_widget = new Reveal_Sidebar_Widget();
    $reveal_widget -> reveal_sidebar_widgets_init();
    $reveal_widget -> reveal_footer_widgets();

});

