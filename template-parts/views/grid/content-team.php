<?php
/**
 * Template part for displaying posts
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Reveal
 */



	    	// Retieving the image alt tags
			if( function_exists('retrieve_alt_tag') ) { 
				$alt_tag =  retrieve_alt_tag(); 
			}

			// Retieving user data from metabox
			// $team_desig = rwmb_meta( 'reveal_team_designation','type=text' );
			$team_desig = codexin_meta( 'reveal_team_designation' );
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
