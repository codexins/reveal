<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package reveal
 */

?>



	
		<?php 
			$reveal_footer = reveal_option('reveal-footer-version');
			$reveal_cpr = reveal_option('reveal-footer_copyright');
		 ?>
 	


	<section id="footer" class="footer">
		<div class="container">
			<?php 
			if($reveal_footer == 1): get_template_part('template-parts/footer/footer', 'one');
			elseif($reveal_footer == 2): get_template_part('template-parts/footer/footer', 'two');
			elseif($reveal_footer == 3): get_template_part('template-parts/footer/footer', 'three');
			elseif($reveal_footer == 4): get_template_part('template-parts/footer/footer', 'four');
			elseif($reveal_footer == 5): get_template_part('template-parts/footer/footer', 'five');
			elseif($reveal_footer == 6): get_template_part('template-parts/footer/footer', 'six');
			endif; 
			?>

			<?php if($reveal_cpr == 1): ?>
			<hr class="divider">
			<p class="text-center copyright">
				<?php  if (!empty(reveal_option('reveal-copyright'))): ?>
					<?php echo reveal_option('reveal-copyright'); ?>
				<?php endif;?>
			</p>	
			<?php endif; ?>

		</div> <!-- end of container -->
	</section> <!-- end of footer -->

	<!-- Go to Top Button at right bottom of the window screen -->
	<div id="toTop" style="">
		<i class="fa fa-chevron-up"></i>
	</div>
	<!-- Go to Top Button finished-->



<!-- 	<footer id="footer" class="footer">
		<div id="footer_top">
			<div class="container">
				<?php 
				// if($reveal_footer == 1): get_template_part('template-parts/footer/footer', 'one');
				// elseif($reveal_footer == 2): get_template_part('template-parts/footer/footer', 'two');
				// elseif($reveal_footer == 3): get_template_part('template-parts/footer/footer', 'three');
				// elseif($reveal_footer == 4): get_template_part('template-parts/footer/footer', 'four');
				// elseif($reveal_footer == 5): get_template_part('template-parts/footer/footer', 'five');
				// elseif($reveal_footer == 6): get_template_part('template-parts/footer/footer', 'six');
				// endif; 
				?>
			</div>
		</div> -->


<!-- 	</footer> -->

</div> <!-- end of #whole -->



<?php wp_footer(); ?>
</body>
</html>
