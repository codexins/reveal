<?php

/**
 * Template partial to display the single post content footer
 *
 * @package Reveal
 * @subpackage Core
 */


// Do not allow directly accessing this file.
defined( 'ABSPATH' ) OR die( esc_html__( 'This script cannot be accessed directly.', 'reveal' ) );

$social_share = codexin_get_option( 'reveal_single_share' );

?>

<footer id="entry_footer">

	<?php if( has_tag() ) { ?>
	    <div class="tagcloud"><?php the_tags('Tags: &nbsp;',' ',''); ?></div>
	<?php } ?>

	<?php if( $social_share ) { ?>
	    <div class="share socials reveal-color-0 reveal-primary-btn">            
	        <div class="caption"><span class="flaticon-share-1"></span> <?php esc_html_e('Share: ', 'reveal'); ?></div>    
	        <a target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=<?php echo esc_url( get_the_permalink() ); ?>"><i class="fa fa-facebook"></i></a>
	        <a target="_blank" href="https://twitter.com/home?status=<?php echo esc_url( get_the_permalink() ); ?>"><i class="fa fa-twitter"></i></a>
	        <a target="_blank" href="https://plus.google.com/share?url=<?php echo esc_url( get_the_permalink() ); ?>"><i class="fa fa-google-plus"></i></a>
	        <a target="_blank" href="https://www.linkedin.com/shareArticle?mini=true&url=<?php echo esc_url( get_the_permalink() ); ?>"><i class="fa fa-linkedin"></i></a>        
	    </div>
	<?php }?>

</footer><!-- end of #entry_footer -->

