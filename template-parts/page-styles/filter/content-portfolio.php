<?php 
	$term_list = wp_get_post_terms( get_the_ID(), 'portfolio-category'); 
 ?>
<div class="col-sm-4">
	<div class="portfolio <?php foreach ($term_list as $sterm) { echo strtolower($sterm->slug)." "; } ?>">

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
		        <h4><a href="<?php the_permalink(); ?>"><?php  the_title(); ?></a></h4>
		        <ul class="portfolio-cat">

						<?php
		                    $taxonomy = 'portfolio-category';
		                    $taxonomies = get_terms($taxonomy); 
		                    $last_key = end($taxonomies);
		                    foreach ( $taxonomies as $tax ) {
		                        // echo  $tax->name.', ' ;
		                        if($tax == $last_key):
		                            echo "<li>".ucwords($tax->name)."</li>";
		                        else: 
		                        	echo "<li>".ucwords($tax->name)." ,</li>";
		                         
		                        endif; 
		                }?>
		        </ul>
		    </div>                                    
		</div>


	</div>
</div>