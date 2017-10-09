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

<html <?php html_tag_schema(); ?> <?php language_attributes(); ?>>
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

	<?php 

	$page_loader = reveal_option('reveal-page-loader');
	$responsive_header = reveal_option('reveal-responsive-version');

	?>
	<!--  Site Loader -->
	<?php if( $page_loader ): ?>
		<div id="preloader_1"></div>			
	<?php endif; ?>
	<!--  Site Loader finished -->

	<!-- Initializing Mobile Menu -->
	<?php if( $responsive_header == 'left' ): ?>
	<div id="c-menu--slide-left" class="c-menu c-menu--slide-left" itemscope itemtype="http://schema.org/SiteNavigationElement">
	<?php else: ?>
	<div id="c-menu--slide-right" class="c-menu c-menu--slide-right" itemscope itemtype="http://schema.org/SiteNavigationElement">
	<?php endif; ?>
		<button class="c-menu__close"><i class="fa fa-times" aria-hidden="true"></i> <?php esc_html_e( 'Close', 'reveal' ); ?></button>
		<?php if(has_nav_menu( 'main_menu' )): get_mobile_menu(); 
					else: ?>
						<div id="mobile-menu" class="c-menu__items">
							<ul>
									<li class="menu-notice">
										<a href="<?php echo admin_url( 'nav-menus.php' ); ?>" itemprop="url"><?php echo esc_html('Add a Menu'); ?></a>
									</li>
							</ul>
						</div>
		<?php endif; ?>
	</div><!-- end of Moblie Menu -->

	<!-- Mobile Menu Masking -->
	<div id="c-mask" class="c-mask"></div>

	<!-- Start of whole -->
	<div id="whole" class="whole-site-wrapper">
	
	<?php $disable_head = rwmb_meta('reveal_disable_header', 'type=checkbox'); ?>

	<?php if($disable_head == 0): ?>	
		<?php if(is_page_template('page-templates/page-home.php')): ?>
					<header id="header" class="header front-header" itemscope itemtype="http://schema.org/WPHeader">
		<?php else: ?>
		<header id="header" class="header inner-header" itemscope itemtype="http://schema.org/WPHeader">
	        <div class="nav-container">
		<?php endif; ?>	
			
		<?php 
		
		$header_version = reveal_option('reveal-header-version');

		if($header_version == 1): 
		get_template_part('template-parts/header/header', 'one');

		 elseif($header_version == 2): 
		 get_template_part('template-parts/header/header', 'two');

		elseif($header_version == 3): 
		get_template_part('template-parts/header/header', 'three');

		elseif($header_version == 4): 
		get_template_part('template-parts/header/header', 'four');


		endif; ?>

	    <?php if( !is_page_template('page-templates/page-home.php') ): ?>
	        </div> <!-- end nav-container -->
	    <?php endif; ?>
		</header><!-- end of header -->
	<?php endif; ?>	
	
	<?php 
	$disable_title = rwmb_meta('reveal_disable_page_title', 'type=checkbox');
	if($disable_title == 0):
		get_template_part('template-parts/header/page', 'title');
	else: 
		echo ($disable_head == 0) ? '<div class="reveal-spacer-30"></div>' : '';
	endif; ?>

	<div class="clearfix"></div>
