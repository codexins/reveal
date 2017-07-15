<?php

/**
* The header for our theme
*
* This is the template that displays all of the <head> section and everything up until <div id="content">
*
* @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
*
* @package reveal
*/



?><!DOCTYPE html>

<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta http-equiv="x-ua-compatible" content="ie=edge">
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

<?php wp_head(); ?>
</head>



<body <?php body_class(); ?>>

	<!--[if lt IE 9]>
	    <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="<?php echo esc_url(__('https://browsehappy.com/?locale=en', 'reveal')) ?>">upgrade your browser</a> to improve your experience.</p>
	<![endif]-->

	<!--  Site Loader -->
	<div id="loader">
		<div class="cssload-container">
			<div class="cssload-speeding-wheel"></div>
		</div>
	</div>
	<!--  Site Loader finished -->

	<?php if( is_front_page() && !(is_home()) ): ?>
	
	<header id="header" class="header front-header fill-screen">
	<?php else: ?>
	<header id="header" class="header inner-header">
	<?php endif; ?>	
		
	<?php 
	
	$header_version = reveal_option('reveal-header-version');

	if($header_version == 1): 
	get_template_part('template-parts/header/header', 'one');

	// elseif($header_version == 2): 
	// get_template_part('template-parts/header/header', 'two');

	// elseif($header_version == 3): 
	// get_template_part('template-parts/header/header', 'three');

	// elseif($header_version == 4): 
	// get_template_part('template-parts/header/header', 'four');


	endif; ?>
	<?php get_template_part('template-parts/header/page', 'title'); ?>
	</header>


	<div class="clearfix"></div>
