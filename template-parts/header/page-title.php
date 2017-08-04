	<?php 

	if(!is_front_page() || is_home()): 

	$header_bg = rwmb_meta('reveal_page_background', 'type=image_advanced'); 
		  foreach ($header_bg as $single_bg) {
		  	$single_bg = $single_bg['full_url'];
		  	}	
		 

	 ?>

	<div id="page_title" class="page-title site-content" <?php if (!empty($single_bg)): echo 'style="background-image:url('. $single_bg .')"'; endif; ?>>
		<div class="container">
			<div class="row">
				<div class="col-xs-12">
					<div class="page-title-wrapper">
						<?php 
							//set page-title position..
							$title_position = reveal_option( 'page-title-position' );
							if( $title_position == '1' ) :
								echo '<h1 style="text-align:left;">';
							elseif ( $title_position == 2 ) :
								echo '<h1 style="text-align:center;">';
							elseif ( $title_position == 3 ) :
								echo '<h1 style="text-align:right;">';
							endif; //end page-title position...

							if(is_home()):
								echo esc_html__( !empty(reveal_option( 'reveal-blog-title' )) ? reveal_option( 'reveal-blog-title' ) : 'Blog', 'reveal');
							elseif(is_404()):
								echo esc_html__('Nothing Found!', 'reveal');
							elseif(is_archive()):
								the_archive_title();
							elseif(is_search()):
								printf( esc_html__( 'Search Results for: %s', 'reveal' ), '<span>' . get_search_query() . '</span>' );
							else:
								single_post_title();
							endif;
						?>
						 </h1>

						 <?php 
						 	//set breadcrumbs position..
							$bc_position = reveal_option( 'page-bc-position' );
							if( $bc_position == '1' ) :
								echo '<div class="breadcrumbs-wrapper" style="text-align:left;">';
							elseif ( $bc_position == 2 ) :
								echo '<div class="breadcrumbs-wrapper" style="text-align:center;">';
							elseif ( $bc_position == 3 ) :
								echo '<div class="breadcrumbs-wrapper" style="text-align:right;">';
							endif; //end breadcrumbs position...
						  ?>
						  
							<?php $reveal_bc = reveal_option('reveal-bcrumbs'); ?>
							<?php 

							if( reveal_option('reveal-bcrumbs' ) ): 
							if (function_exists('reveal_custom_breadcrumbs')) {
								echo reveal_custom_breadcrumbs();
							}

							?>
						<?php endif; ?>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

<?php endif; ?>