<?php

register_nav_menus( array(
	'main_menu' 	=> esc_html__('Primary Menu', 'reveal'),
	'mobile_menu' 	=> esc_html__('Mobile Menu', 'reveal'),
) );

# Use this function to dynamically display different menus if needed. 
function get_main_menu () {
	wp_nav_menu( init_main_menu() );
} // reveal_get_main_menu ()

function init_main_menu () {
	$args = array(
				'theme_location'  => 'main_menu',
				'menu'            => 'main_menu',
				'container'       => 'div',
				'container_class' => 'main-menu',
				'container_id'    => '',
				'menu_class'      => 'sf-menu',
				'menu_id'         => 'main_menu',
				'echo'            => true,
				'fallback_cb'     => 'wp_page_menu',
				'before'          => '',
				'after'           => '',
				'link_before'     => '',
				'link_after'      => '',
				'items_wrap'      => '<ul id="%1$s" class="%2$s">%3$s</ul>',
				'depth'           => 0,
				'walker'          => ''
	);

	return $args;
} // reveal_main_menu ()



# Use this function to dynamically display different menus if needed. 
function get_mobile_menu () {
	wp_nav_menu( init_mobile_menu() );
} // reveal_get_main_menu ()

function init_mobile_menu () {
	$args = array(
				'theme_location'  => 'mobile_menu',
				'menu'            => 'mobile_menu',
				'container'       => 'div',
				'container_class' => 'nav-wrapper',
				'container_id'    => '',
				'menu_class'      => 'c-menu__items',
				'menu_id'         => 'mobile-menu',
				'echo'            => true,
				'fallback_cb'     => 'wp_page_menu',
				'before'          => '',
				'after'           => '',
				'link_before'     => '',
				'link_after'      => '',
				'items_wrap'      => '<ul id="%1$s" class="%2$s">%3$s</ul>',
				'depth'           => 0,
				'walker'          => ''
	);

	return $args;
} // reveal_main_menu ()

?>