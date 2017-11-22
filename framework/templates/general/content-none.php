<?php

/**
 * Template partial for displaying a message that posts cannot be found
 *
 * @package Reveal
 * @subpackage Core
 */


// Do not allow directly accessing this file.
defined( 'ABSPATH' ) OR die( esc_html__( 'This script cannot be accessed directly.', 'reveal' ) );

?>

<section class="no-results not-found">
	<header class="page-header">
		<h1 class="page-title"><?php esc_html_e( 'Nothing Found', 'reveal' ); ?></h1>
	</header><!-- end of page-header -->

	<div class="page-content">
		<?php
		if ( is_home() && current_user_can( 'publish_posts' ) ) { ?>

			<p><?php printf( wp_kses( '%1$s <a href="%2$s">%3$s</a>.', array( 'a' => array( 'href' => array() ) ) ), esc_html__('Ready to publish your first post?', 'reveal'),esc_url( admin_url( 'post-new.php' ) ), esc_html__('Get started here', 'reveal') ); ?></p>

		<?php } elseif ( is_post_type_archive('portfolio') && current_user_can( 'publish_posts' ) ) { ?>

			<p><?php printf( wp_kses( '%1$s <a href="%2$s">%3$s</a>.', array( 'a' => array( 'href' => array() ) ) ), esc_html__('Ready to publish your first Portfolio?', 'reveal'),esc_url( admin_url( 'post-new.php?post_type=portfolio' ) ), esc_html__('Get started here', 'reveal') ); ?></p>

		<?php } elseif ( is_post_type_archive('events') && current_user_can( 'publish_posts' ) ) { ?>

			<p><?php printf( wp_kses( '%1$s <a href="%2$s">%3$s</a>.', array( 'a' => array( 'href' => array() ) ) ), esc_html__('Ready to publish your first Event?', 'reveal'),esc_url( admin_url( 'post-new.php?post_type=events' ) ), esc_html__('Get started here', 'reveal') ); ?></p>

		<?php } elseif ( is_post_type_archive('testimonial') && current_user_can( 'publish_posts' ) ) { ?>

			<p><?php printf( wp_kses( '%1$s <a href="%2$s">%3$s</a>.', array( 'a' => array( 'href' => array() ) ) ), esc_html__('Ready to publish your first Testimonial?', 'reveal'),esc_url( admin_url( 'post-new.php?post_type=testimonial' ) ), esc_html__('Get started here', 'reveal') ); ?></p>

		<?php } elseif ( is_post_type_archive('team') && current_user_can( 'publish_posts' ) ) { ?>

			<p><?php printf( wp_kses( '%1$s <a href="%2$s">%3$s</a>.', array( 'a' => array( 'href' => array() ) ) ), esc_html__('Ready to publish your first Team Member?', 'reveal'),esc_url( admin_url( 'post-new.php?post_type=team' ) ), esc_html__('Get started here', 'reveal') ); ?></p>

		<?php } elseif ( is_search() ) { ?>

			<p><?php esc_html_e( 'Sorry, but nothing matched your search terms. Please try again with some different keywords.', 'reveal' ); ?></p>
				<?php
				get_search_form();

		} else { ?>

			<p><?php esc_html_e( 'It seems we can&rsquo;t find what you&rsquo;re looking for. Perhaps searching can help.', 'reveal' ); ?></p>
				<?php
				get_search_form();

		} ?>
	</div><!-- end of page-content -->
</section><!-- end of no-results -->
