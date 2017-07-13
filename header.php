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

	<?php if( is_front_page() ): ?>
	
	<header id="header" class="header fill-screen">
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
	</header>

	<?php else: ?>
	<section id="page_title" class="page-title" style="background-image: url('<?php echo get_template_directory_uri() .'/images/showcase.jpg'; ?>')">
		<div class="container">
			<div class="row">
				<div class="col-xs-12">
					<div class="page-title-wrapper">
						<h1><?php if(is_home()):

									echo "Blog";

								  elseif(is_404()):

								  	echo "Nothing Found!";

								  elseif(is_archive()):

								  	the_archive_title();

								  elseif(is_search()):

								  	printf( esc_html__( 'Search Results for: %s', 'reveal' ), '<span>' . get_search_query() . '</span>' );

								  else:

								  	single_post_title();

								  endif;

						 ?></h1>

						<div class="breadcrumbs-wrapper">
							<p>
							<?php $reveal_bc = reveal_option('reveal-bcrumbs'); ?>
							<?php if( $reveal_bc == 1 ): ?>
							<?php 
							if (function_exists('reveal_custom_breadcrumbs')) {
								// passing options as array
								$args = array(
								'beginningText' => 'Currently Watching: ',
								'delimiter' 	=> ' > ',
									);
							    reveal_custom_breadcrumbs($args);
							}
							?>
						<?php endif; ?>
							</p>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>


	<?php endif; ?>

	<div class="clearfix"></div>
