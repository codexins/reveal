	
		<?php 

		 
			global  $reveal_option;
		    $reveal_portfolio_layout = $reveal_option['reveal-portfolio-archive-layout'];

		    if($reveal_portfolio_layout == 1):
		        // get_template_part('template-parts/page-layout/portfolio/no', 'sidebar');
		        	$bootstrap_grid = '<div class="col-sm-4" >';

		    else:
		        // get_template_part('template-parts/page-layout/portfolio/right', 'sidebar');
		        	 $bootstrap_grid = '<div class="col-sm-6" >';

		    endif;

		?>





		<?php 
			$term_list = wp_get_post_terms( get_the_ID(), 'portfolio-category'); 
		 ?>
		<?php echo $bootstrap_grid ;?>
			<div class="portfolio <?php foreach ($term_list as $sterm) { echo strtolower($sterm->name)." "; } ?>">


			 <!-- 	<img src="<?php  // echo the_post_thumbnail_url(); ?>" alt="">
				// <a href="<?php  // the_permalink(); ?>" class="reveal_portfolio">
					<div class="image-mask">
						<div class="image-content">
							<img src="assets/images/hover-icon.png" alt="">
							// <h3><?php //  the_title(); ?></h3> -->
							<!-- <p>Lorem Ipsum Demo</p> -->
					<!-- 	</div>
					</div>
				</a> -->



				<div class="portfolio-item-content">
				    <div class="item-thumbnail">
				        <img src="<?php   echo the_post_thumbnail_url(); ?>"  alt="">                                          
				        <ul class="portfolio-action-btn">
				            <li>
				                <a class="venobox" href="<?php the_permalink(); ?>"><i class="fa fa-gg"></i></a>
				            </li>
				        </ul>                                            
				    </div>
				    <div class="portfolio-description">
				        <h4><a href="<?php the_permalink(); ?>">Informational Site: IA Academy</a></h4>
				        <ul class="portfolio-cat">

								<?php
				                    $taxonomy = 'portfolio-category';
				                    $taxonomies = get_terms($taxonomy); 
				                    $last_key = end($taxonomies);
				                    foreach ( $taxonomies as $tax ) {
				                        // echo  $tax->name.', ' ;
				                        if($tax == $last_key):
				                            echo "<li>".ucwords($tax->name)." </li> ";
				                        else: 
				                        	echo "<li>".ucwords($tax->name)." , </li> ";
				                         
				                        endif; 
				                }?>
				        </ul>
				    </div>                                    
				</div>



















			</div>
		<?php echo '</div>'?>