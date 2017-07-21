	<?php 

	if(!is_front_page() || is_home()): 

	$header_bg = rwmb_meta('reveal_page_background', 'type=image_advanced'); 

		  foreach ($header_bg as $single_bg) {
		  		# code...
		  	$single_bg = $single_bg['full_url'];

		  	}	
		 

		  //echo  $header_bg->full_url;

	 ?>

	<div id="page_title" class="page-title site-content" style="background-image: url('<?php if (!empty($single_bg)): echo esc_url($single_bg); else: echo get_template_directory_uri() .'/assets/images/showcase.jpg'; endif; ?>')">
		<div class="container">
			<div class="row">
				<div class="col-xs-12">
					<div class="page-title-wrapper">
						<h1><?php if(is_home()):
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
						 ?></h1>

						<div class="breadcrumbs-wrapper">
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