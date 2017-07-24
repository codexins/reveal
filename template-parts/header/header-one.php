<?php 

//$header_top = reveal_option('reveal-header-top'); 

 ?>

	<?php //if($header_top == 1): ?>

		<nav class="navbar" data-spy="affix" data-offset-top="150"  >
			<div class="container">
				<!-- Brand and toggle get grouped for better mobile display -->
				<div class="navbar-header">
					<!-- <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#reveal-navbar-collapse-1" aria-expanded="false">
						<span class="sr-only">Toggle navigation</span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button> -->

					<?php 
					$logo_type = reveal_option('reveal-logo-type');	
					$text_logo = reveal_option('reveal-text-logo'); 
					$image_logo = reveal_option('reveal-image-logo')['url']; ?>		
					<a class="navbar-brand" href="<?php echo esc_url( home_url() ); ?>">
						<?php if($logo_type == 2): ?>
	             <?php if( !empty( $image_logo ) ): ?>
	              <img src="<?php echo esc_url($image_logo); ?>" alt="Logo">
	             <?php endif; ?>

						<?php elseif($logo_type == 1): 
								if(!empty($text_logo)): echo esc_html($text_logo); endif; ?>
					  <?php endif; ?>

					</a>
					
					<!--Responsive Navigation-->
					<div id="o-wrapper" class="mobile-nav o-wrapper">
						<div class="primary-nav">
							<button id="c-button--slide-left" class="primary-nav-details">Menu <i class="fa fa-navicon"></i></button>
						</div>
					</div><!--End Responsive Navigation-->

				</div>

				<!-- Collect the nav links, forms, and other content for toggling -->
				<div class="hidden-xs">
					<?php get_main_menu(); ?>
				</div>
				
				<!-- /.navbar-collapse -->

			</div><!-- end of container -->
		</nav> <!-- end of nav -->

		<?php if(is_front_page() && !is_home()): ?>
		<div class="slider-text text-center">
			<h4>Creative Coders</h4>
			<h2>WELCOME<br />TO REVEAL</h2>
			<div class="small-divider"></div>
			<a href="#services" class="btn-btn-primary slider-btn">Learn more</a>
		</div>

		<a href="#about" class="explore"><i class="fa fa-chevron-down"></i></a>
	<?php endif; ?>






