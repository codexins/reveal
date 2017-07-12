<?php

register_nav_menus( array(
	'main_menu' 			=> 'Primary Menu',
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
				'container_class' => 'collapse navbar-collapse',
				'container_id'    => 'reveal-navbar-collapse-1',
				'menu_class'      => 'nav navbar-nav navbar-right main-menu',
				'menu_id'         => '',
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