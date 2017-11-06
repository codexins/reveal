<?php

/**
 *
 * The template for displaying custom post type 'team' archives pages
 *
 * @package reveal
 */


// Do not allow directly accessing this file.
defined( 'ABSPATH' ) OR die( 'This script cannot be accessed directly.' );

get_header(); ?>

	<div id="content" class="main-content-wrapper site-content">
		<div class="container">
			<div class="team-wrapper">
				<?php if ( have_posts() ) : ?>
					<ul>
					    <?php while ( have_posts() ) : the_post();

					    	// Retieving the image alt tags
							if( function_exists('retrieve_alt_tag') ) { 
								$alt_tag =  retrieve_alt_tag(); 
							}

							// Retieving user data from metabox
							$team_desig = rwmb_meta( 'reveal_team_designation','type=text' );

					    ?>
							<li id="team-<?php the_ID(); ?>" <?php post_class(); ?>>
								<a href="<?php echo esc_url(get_the_permalink()); ?>">
									<figure>
										<div class="team-single-wrapper">
											<img src="<?php esc_url(the_post_thumbnail_url('square-two'));  ?>" alt="<?php echo (!empty($alt_tag)) ? esc_html($alt_tag) : get_the_title(); ?>">
											<figcaption>
												<div class="team-info-wrapper reveal-color-2">
													<span><?php echo esc_html( $team_desig ); ?></span>
													<h3><?php printf( '%s', the_title() ); ?></h3>
												</div> <!-- end of team-info-wrapper -->
											</figcaption>
										</div> <!-- end of team-single-wrapper -->
									</figure>
								</a>
							</li> <!-- end of #team## -->

					    <?php endwhile; ?>
	        		</ul>
	        		<div class="clearfix"></div>
	        		<?php 
	        		// Posts pagination
					if( function_exists('reveal_posts_link_numbered') ) { 
		        		echo reveal_posts_link_numbered(); 
		        	}
		        	?>
				<?php 
				else:

					get_template_part( 'template-parts/views/list/content', 'none' );

				endif; ?>
			</div> <!-- end of team-wrapper -->
		</div> <!-- end of container -->
	</div> <!-- end of #content -->

<?php get_footer(); ?>
