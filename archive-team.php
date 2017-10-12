<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package reveal
 */

get_header(); ?>


	<div id="content" class="main-content-wrapper site-content">
		<div class="container">
			<div class="team-wrapper">

			<?php if ( have_posts() ) : ?>

				<ul>
			    <?php while ( have_posts() ) : the_post();
					if(function_exists('retrieve_alt_tag')): $alt_tag =  retrieve_alt_tag(); endif;

					$team_desig = rwmb_meta( 'reveal_team_designation','type=text' );
			     ?>
					<li id="team-<?php the_ID(); ?>" <?php post_class(); ?>>
						<a href="<?php echo esc_url(get_the_permalink()); ?>">
						   <figure>
						      <div class="team-single-wrapper">
						         <img src="<?php the_post_thumbnail_url('square-two');  ?>" alt="<?php if(!empty($alt_tag)): echo $alt_tag; else: the_title(); endif; ?>">
						         <figcaption>
						            <div class="team-info-wrapper">
						               <span><?php echo esc_html( $team_desig ); ?></span>
						               <h3><?php printf( '%s', the_title() ); ?></h3>
						            </div> <!-- end of team-info-wrapper -->
						         </figcaption>
						      </div> <!-- end of team-single-wrapper -->
						   </figure>
						</a>
					</li>

			    <?php endwhile; ?>
        		</ul>
        		<div class="clearfix"></div>
        		<?php echo reveal_posts_link_numbered(); ?>
			<?php else: ?>
			    <?php esc_html__('Sorry, no posts matched your criteria.', 'reveal'); ?>
			<?php endif; ?>
				</div>
		</div> <!-- end of container -->
	</div> <!-- end of #content -->

<?php get_footer(); ?>
