<?php

/**
 * Template partial for displaying grid archive team
 *
 * @package 	Reveal
 * @subpackage 	Core
 * @since 		1.0
 */


// Do not allow directly accessing this file.
defined( 'ABSPATH' ) OR die( esc_html__( 'This script cannot be accessed directly.', 'reveal' ) );

// Fetching and assigning data from metabox
$designation 		= codexin_meta( 'codexin_team_designation' );

// Fetching the attachment properties
$image_prop         = codexin_attachment_metas_extended( $post->ID, 'team', 'codexin-core-square-two' );

?>


<li id="team-<?php the_ID(); ?>" <?php post_class(); ?>>
	<a href="<?php echo esc_url( get_the_permalink() ); ?>">
		<figure>
			<div class="team-single-wrapper">
				<img src="<?php printf( '%s', $image_prop['src'] ); ?>" <?php printf( '%s', $image_prop['alt'] ); ?>>
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
