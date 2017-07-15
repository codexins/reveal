<?php 

//$header_top = reveal_option('reveal-header-top'); 

 ?>

	<?php //if($header_top == 1): ?>

		<nav class="navbar" data-spy="affix" data-offset-top="150">
			<div class="container">
				<!-- Brand and toggle get grouped for better mobile display -->
				<div class="navbar-header">
					<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#reveal-navbar-collapse-1" aria-expanded="false">
						<span class="sr-only">Toggle navigation</span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>

					<a class="navbar-brand" href="<?php echo esc_url( home_url( '/' ) ); ?>">
						<?php if (!empty(reveal_option('reveal-logo')['url'])):?>
							<img src="<?php echo reveal_option('reveal-logo')['url']?>" alt="Logo">
						<?php else: echo "Reveal"; ?>
						<?php endif; ?>
					</a>
				</div>

				<!-- Collect the nav links, forms, and other content for toggling -->
				<?php get_main_menu(); ?>
				<!-- /.navbar-collapse -->

			</div><!-- end of container -->
		</nav> <!-- end of nav -->

		<?php if(is_front_page()): ?>
		<div class="slider-text text-center">
			<h4>Creative Coders</h4>
			<h2>WELCOME<br />TO REVEAL</h2>
			<div class="small-divider"></div>
			<a href="#services" class="btn-btn-primary slider-btn">Learn more</a>
		</div>

		<a href="#about" class="explore"><i class="fa fa-chevron-down"></i></a>
	<?php endif; ?>






