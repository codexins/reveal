	<?php 

	if(!is_page_template('page-templates/page-home.php')):

	$header_bg = rwmb_meta('reveal_page_background', 'type=image_advanced'); 
		  foreach ($header_bg as $single_bg) {
		  	$single_bg = $single_bg['full_url'];
		  	}	
		 

	 ?>

	<div id="page_title" class="page-title site-content" <?php if (!empty($single_bg)): echo 'style="background-image:url('. $single_bg .')"'; endif; ?>>
		<div class="container">
			<div class="row">
				<div class="col-xs-12">
					<div class="page-title-wrapper reveal-color-2">
						<?php 
						//set page-title position..
						$title_position = codexin_get_option( 'page-title-position' );

						if( $title_position == '1' ) :
							echo '<h1 style="text-align:left;" itemprop="headline">';
						elseif ( $title_position == '2' ) :
							echo '<h1 style="text-align:center;" itemprop="headline">';
						elseif ( $title_position == '3' ) :
							echo '<h1 style="text-align:right;" itemprop="headline">';
						else :
							echo '<h1 style="text-align:left;" itemprop="headline">';
						endif; //end page-title position...

						if( is_home() ):
							echo esc_html__( !empty(codexin_get_option( 'reveal-blog-title' )) ? codexin_get_option( 'reveal-blog-title' ) : 'Blog', 'reveal');
						elseif( is_404() ):
							echo esc_html__('Nothing Found!', 'reveal');
						elseif( is_archive() ):
							the_archive_title();
						elseif( is_search() ):
							printf( esc_html__( 'Search Results for: %s', 'reveal' ), '<span>' . get_search_query() . '</span>' );
						else:
							single_post_title();
						endif;
						?>
						</h1>

						<?php 
							//set breadcrumbs position..
						$bc_position = codexin_get_option( 'page-bc-position' );

						if( $bc_position == '1' ) :
							echo '<div class="breadcrumbs-wrapper" style="text-align:left;">';
						elseif ( $bc_position == 2 ) :
							echo '<div class="breadcrumbs-wrapper" style="text-align:center;">';
						elseif ( $bc_position == 3 ) :
							echo '<div class="breadcrumbs-wrapper" style="text-align:right;">';
						else :
							echo '<div class="breadcrumbs-wrapper" style="text-align:left;">';
						endif; //end breadcrumbs position...
							
							$reveal_bc = codexin_get_option('reveal-bcrumbs');

							if( codexin_get_option('reveal-bcrumbs' ) ) {
								// Initializing breadcrumb
								echo codexin_breadcrumbs();
							}
							?>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

<?php endif; ?>