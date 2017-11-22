<?php

/**
 * Template partial for displaying grid archive team
 *
 * @package Reveal
 * @subpackage Core
 */


// Do not allow directly accessing this file.
defined( 'ABSPATH' ) OR die( esc_html__( 'This script cannot be accessed directly.', 'reveal' ) );

$designation 		= codexin_meta( 'reveal_team_designation' );
$thumbnail_default  = codexin_get_option( 'reveal_team_image' );

// Fetching the attachment properties
$attachment_id      = ( has_post_thumbnail() ) ? get_post_thumbnail_id( $post->ID ) : $thumbnail_default['id'];
$image_prop         = codexin_attachment_metas( $attachment_id );
$default_image 		= wp_get_attachment_image_src( $attachment_id, 'square-two' );
$team_image_grid    = ( has_post_thumbnail() ) ? esc_url( get_the_post_thumbnail_url( $post->ID, 'square-two' ) ) : esc_url( $default_image[0] );
$team_image    		= ( !empty( $team_image_grid ) ) ? $team_image_grid : esc_url( 'placehold.it/500x500' );

?>


<li id="team-<?php the_ID(); ?>" <?php post_class(); ?>>
	<a href="<?php echo esc_url( get_the_permalink() ); ?>">
		<figure>
			<div class="team-single-wrapper">
				<img src="<?php printf( '%s', $team_image ); ?>" <?php printf( '%s', $image_prop['alt'] ); ?>>
				<div class="team-caption">
					<div class="team-info-wrapper reveal-color-2">
						<?php if( ! empty( $designation ) ) { ?>
							<span><?php echo esc_html( $designation ); ?></span>
						<?php } ?>
						<h3 itemprop="name"><?php printf( '%s', the_title() ); ?></h3>
					</div> <!-- end of team-info-wrapper -->
				</div>
			</div> <!-- end of team-single-wrapper -->
			<figcaption><?php echo esc_html( ! empty( ( $image_prop['caption'] ) ) ? $image_prop['caption'] : get_the_title() ); ?></figcaption>
		</figure>
	</a>
</li> <!-- end of #team## -->
