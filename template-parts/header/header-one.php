<?php 

//$header_top = codexin_get_option('reveal-header-top'); 
$responsive_header = codexin_get_option('reveal-responsive-version');

 ?>

	<?php //if($header_top == 1): ?>

		<nav class="navbar reveal-bg-0" data-spy="affix" data-offset-top="150"  >
			<div class="container">

				<div class="flex-wrapper equal-align reveal-color-2">
					<div class="logo-wrapper">
						<!-- Brand and toggle get grouped for better mobile display -->
						<div class="navbar-header">

							<?php 
							$logo_type = codexin_get_option('reveal-logo-type');	
							$text_logo = codexin_get_option('reveal-text-logo'); 
							$image_logo = codexin_get_option('reveal-image-logo')['url']; ?>	

							<?php if( $responsive_header == 'right' ): ?>	
							<a class="navbar-brand menu-right" href="<?php echo esc_url( home_url() ); ?>" itemprop="url">
							<?php else: ?>
							<a class="navbar-brand" href="<?php echo esc_url( home_url() ); ?>" itemprop="url">
							<?php endif; ?>
								<?php if($logo_type == 2): ?>
									<?php if( !empty( $image_logo ) ): ?>
									<img src="<?php echo esc_url($image_logo); ?>" alt="Logo" itemprop="logo">
									<?php endif; ?>

								<?php elseif($logo_type == 1): 
									if(!empty($text_logo)): printf('%s', $text_logo); endif; ?>
								<?php endif; ?>
							</a><!--End navbar-brand-->
							
							<!--Responsive Navigation-->
							<div id="o-wrapper" class="mobile-nav o-wrapper">
								<div class="primary-nav">

									<?php if( $responsive_header == 'left' ): ?>
									<button id="c-button--slide-left" class="primary-nav-details reveal-color-2">Menu
									<?php else: ?>
									<button id="c-button--slide-right" class="primary-nav-details reveal-color-2">Menu
									<?php endif; ?>
										<span id="nav-icon2">
										  <span></span>
										  <span></span>
										  <span></span>
										  <span></span>
										  <span></span>
										  <span></span>
										</span>
									</button>
								</div>
							</div><!--End Responsive Navigation-->

						</div>
					</div> <!-- end of col-sm-3 -->

				<div class="menu-wrapper">

					<!-- Collect the nav links, forms, and other content for toggling -->
					<div class="hidden-xs" itemscope itemtype="http://schema.org/SiteNavigationElement">
						<?php if(has_nav_menu( 'main_menu' )): codexin_menu( 'main_menu' ); 
								else: ?>
									<div class="main-menu">
										<ul id="main_menu" class="sf-menu">
												<li class="menu-item">
													<a href="<?php echo admin_url( 'nav-menus.php' ); ?>" itemprop="url"><?php echo esc_html('Add a Menu'); ?></a>
												</li>
										</ul>
									</div>
						<?php endif; ?>
					</div>
					
					<!-- /.navbar-collapse -->
				</div> <!-- end of col-sm-9 -->
				</div>

			</div><!-- end of container -->
		</nav> <!-- end of nav -->


		<?php if(is_page_template('page-templates/page-home.php')): 
						if ( is_plugin_active( 'nextend-smart-slider3-pro/nextend-smart-slider3-pro.php' ) ):
						$slider_id = rwmb_meta( 'reveal_page_slider', 'type=select' ); 
			?>
					<div class="slider-wrapper">
						<?php if(!empty($slider_id)): 
										echo do_shortcode('[smartslider3 slider='. $slider_id .']');
									else:
										echo '<div class="no-slider text-center"><h3>Please select \'Slider Name\' from \'Page Edit\' section and click on \'Update\'</h3>';

							endif; ?>
					</div>
			<?php else: ?>
				<div class="no-slider text-center">
					<h3>Oops! Seems Smart Slider Not Activated!</h3>
					<p>Please install/activate Smart Slider and create the slides. Once completed, assign the slider from 'Page Edit' settings<br/>If you don't want to use slider, then use another page template, for example 'Page - Full Width' or any other.</p>
				</div>
			<?php endif; ?>
	  <?php endif; ?>






