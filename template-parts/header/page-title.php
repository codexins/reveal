	<?php if(!is_front_page()): ?>

	<section id="page_title" class="page-title" style="background-image: url('<?php echo get_template_directory_uri() .'/images/showcase.jpg'; ?>')">
		<div class="container">
			<div class="row">
				<div class="col-xs-12">
					<div class="page-title-wrapper">
						<h1><?php if(is_home()):
										echo esc_html__('Blog', 'reveal');
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
							<p>
							<?php $reveal_bc = reveal_option('reveal-bcrumbs'); ?>
							<?php 

							if( $reveal_bc == 1 ): 
							if (function_exists('reveal_custom_breadcrumbs')) {
								echo reveal_custom_breadcrumbs();
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