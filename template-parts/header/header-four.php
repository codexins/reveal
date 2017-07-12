<?php 

$header_top = reveal_option('reveal-header-top'); 

 ?>


 	<?php if($header_top == 1): ?>
		<div class="headertop">
			<div class="container">
				<div class="row">
					<div class="flex-wrapper">
						<div class="col-md-12 col-sm-6 text-right">
							<div class="email-phone">

								<?php if(!empty(reveal_option('reveal-phone-url'))):
										$phone_url = reveal_option('reveal-phone-url');
										endif; ?>
							
								<?php if (!empty(reveal_option('reveal-phone')) && !empty($phone_url)):?>
									<span><i class="fa fa-phone" aria-hidden="true"></i><a href="tel:<?php echo $phone_url; ?>" ><?php echo reveal_option('reveal-phone'); ?></a></span>
								<?php endif; ?>
								<?php if (!empty(reveal_option('reveal-email'))):?>
								<span><i class="fa fa-envelope" aria-hidden="true"></i><a href="mailto:<?php echo reveal_option('reveal-email'); ?>"><?php echo reveal_option('reveal-email'); ?></a></span>

								<?php endif; ?>


							</div>
						</div>
						<div class="col-sm-6 visible-xs">
							<div class="social-icon">

								<?php if (!empty(reveal_option('reveal-twitter'))):?>
									<a href="<?php echo reveal_option('reveal-twitter')  ?>"><i class="fa fa-twitter"></i></a>
								<?php endif; ?>

								<?php if (!empty(reveal_option('reveal-facebook'))):?>
									<a href="<?php echo reveal_option('reveal-facebook')  ?>"><i class="fa fa-facebook"></i></a>
								<?php endif; ?>

								<?php if (!empty(reveal_option('reveal-instagram'))):?>
									<a href="<?php echo reveal_option('reveal-instagram')  ?>"><i class="fa fa-instagram"></i></a>
								<?php endif; ?>

								<?php if (!empty(reveal_option('reveal-linkedin'))):?>
									<a href="<?php echo reveal_option('reveal-linkedin')  ?>"><i class="fa fa-linkedin"></i></a>
								<?php endif; ?>

								<?php if (!empty(reveal_option('reveal-youtube'))):?>
									<a href="<?php echo reveal_option('reveal-youtube')  ?>"><i class="fa fa-youtube" aria-hidden="true"></i></a>
								<?php endif; ?>

								<?php if (!empty(reveal_option('reveal-vimeo'))):?>
									<a href="<?php echo reveal_option('reveal-vimeo')  ?>"><i class="fa fa-vimeo" aria-hidden="true"></i></a>
								<?php endif; ?>

								<?php if (!empty(reveal_option('reveal-google-plus'))):?>
									<a href="<?php echo reveal_option('reveal-google-plus')  ?>"><i class="fa fa-google-plus"></i></a>
								<?php endif; ?>

							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	<?php endif; ?>	
		<div class="header-bottom <?php if(is_front_page()): echo ' home-page'; endif; ?>">
			<div class="cx-header-wrapper">
				<div class="container">
					<div class="row">
						<div class="header-wrapper">
							<div class="visible-xs">
								<div id="logo" class="">
									<a href="<?php echo esc_url( home_url( '/' ) ); ?>">

									<?php if (!empty(reveal_option('reveal-logo')['url'])):?>

										<img src="<?php echo reveal_option('reveal-logo')['url']?>" alt="Logo">
									<?php else: echo "INSERT LOGO"; ?>		
									<?php endif; ?>
									</a>
								</div>
							</div>
							<div id="o-wrapper" class="mobile-nav o-wrapper">
								  <div class="primary-nav">
								    <button id="c-button--slide-left" class="primary-nav-details">Menu <i class="fa fa-navicon"></i></button>
								  </div>
							</div>
							
							<div class="col-sm-3 hidden-xs">
								<div id="logo" class="">
									<a href="<?php echo esc_url( home_url( '/' ) ); ?>">

									<?php if (!empty(reveal_option('reveal-logo')['url'])):?>

										<img src="<?php echo reveal_option('reveal-logo')['url']?>" alt="Logo">
									<?php else: echo "INSERT LOGO"; ?>		
									<?php endif; ?>
									</a>
								</div>
							</div>
							<div class="col-sm-6 hidden-xs">
                  <div class="menu-area aligncenter">
									<?php get_main_menu() ?>
								</div> <!-- end of menu-area -->
							</div>
							<div class="col-sm-3 hidden-xs">
								<div class="social-icon">

									<?php if (!empty(reveal_option('reveal-twitter'))):?>
										<a href="<?php echo reveal_option('reveal-twitter')  ?>"><i class="fa fa-twitter"></i></a>
									<?php endif; ?>

									<?php if (!empty(reveal_option('reveal-facebook'))):?>
										<a href="<?php echo reveal_option('reveal-facebook')  ?>"><i class="fa fa-facebook"></i></a>
									<?php endif; ?>

									<?php if (!empty(reveal_option('reveal-instagram'))):?>
										<a href="<?php echo reveal_option('reveal-instagram')  ?>"><i class="fa fa-instagram"></i></a>
									<?php endif; ?>

									<?php if (!empty(reveal_option('reveal-linkedin'))):?>
										<a href="<?php echo reveal_option('reveal-linkedin')  ?>"><i class="fa fa-linkedin"></i></a>
									<?php endif; ?>

									<?php if (!empty(reveal_option('reveal-youtube'))):?>
										<a href="<?php echo reveal_option('reveal-youtube')  ?>"><i class="fa fa-youtube" aria-hidden="true"></i></a>
									<?php endif; ?>

									<?php if (!empty(reveal_option('reveal-vimeo'))):?>
										<a href="<?php echo reveal_option('reveal-vimeo')  ?>"><i class="fa fa-vimeo" aria-hidden="true"></i></a>
									<?php endif; ?>

									<?php if (!empty(reveal_option('reveal-google-plus'))):?>
										<a href="<?php echo reveal_option('reveal-google-plus')  ?>"><i class="fa fa-google-plus"></i></a>
									<?php endif; ?>

								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>