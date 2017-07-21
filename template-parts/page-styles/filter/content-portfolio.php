			
			<?php 
				$term_list = wp_get_post_terms( get_the_ID(), 'portfolio-category'); 
			 ?>

			<div class="portfolio <?php foreach ($term_list as $sterm) { echo strtolower($sterm->name)." "; } ?>">
				<img src="<?php echo the_post_thumbnail_url(); ?>" alt="">
				<a href="<?php the_permalink(); ?>" class="reveal_portfolio">
					<div class="image-mask">
						<div class="image-content">
							<img src="assets/images/hover-icon.png" alt="">
							<h3><?php the_title(); ?></h3>
							<!-- <p>Lorem Ipsum Demo</p> -->
						</div>
					</div>
				</a>
			</div>