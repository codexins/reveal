<?php

/**
 *
 * The template for displaying the footer
 *
 * Contains the closing of the #whole div and all content after.
 *
 * @package reveal
 */


// Do not allow directly accessing this file.
defined( 'ABSPATH' ) OR die( 'This script cannot be accessed directly.' );

?>
	
        	<?php 
            // Retieving data from theme options
        	$reveal_footer = reveal_option('reveal-footer-version');
        	$reveal_cpr = reveal_option('reveal_footer_copyright');
            $disable_footer = rwmb_meta('reveal_disable_footer', 'type=checkbox');
            $copyright = reveal_option('reveal-copyright');
        	?>         	

            <?php if($disable_footer == 0) { ?>
            	<footer id="footer" class="footer reveal-bg-1 reveal-color-0" itemscope="itemscope" itemtype="http://schema.org/WPFooter">
            		<div class="container">
            			<?php 

            			if( $reveal_footer == 1 ) { 

                            get_template_part('template-parts/footer/footer', 'one'); 

                        } elseif( $reveal_footer == 2 ) { 

                            get_template_part('template-parts/footer/footer', 'two'); 

                        } elseif( $reveal_footer == 3 ) { 

                            get_template_part('template-parts/footer/footer', 'three'); 

                        } elseif( $reveal_footer == 4 ) { 

                            get_template_part('template-parts/footer/footer', 'four'); 

                        } elseif( $reveal_footer == 5 ) { 

                            get_template_part('template-parts/footer/footer', 'five'); 

                        } elseif( $reveal_footer == 6 ) { 

                            get_template_part('template-parts/footer/footer', 'six'); 

                        }
            			
                        ?>

            			<?php if( $reveal_cpr == true ) { ?>
                			<hr class="divider">
                			<p class="text-center copyright">
                				<?php
                                if (!empty( $copyright )) { 
                                    echo $copyright; 
                				} 
                                ?>
                			</p>	
            			<?php } ?>

            		</div> <!-- end of container -->
            	</footer> <!-- end of footer -->
            <?php } ?>

        	<!-- Go to Top Button at right bottom of the window screen -->
        	<?php if( reveal_option( 'reveal_to_top' ) ) { ?>
            	<div id="toTop">
            		<i class="fa fa-chevron-up"></i>
            	</div>
        	<?php } ?>
        	<!-- Go to Top Button finished-->

        </div> <!-- end of #whole -->


        <!-- Initializing Photoswipe -->
        <div class="pswp" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="pswp__bg"></div>
            <div class="pswp__scroll-wrap">
                <div class="pswp__container">
                    <div class="pswp__item"></div>
                    <div class="pswp__item"></div>
                    <div class="pswp__item"></div>
                </div>
                <div class="pswp__ui pswp__ui--hidden">
                    <div class="pswp__top-bar">
                        <div class="pswp__counter"></div>
                        <button class="pswp__button pswp__button--close" title="Close (Esc)"></button>
                        <button class="pswp__button pswp__button--share" title="Share"></button>
                        <button class="pswp__button pswp__button--fs" title="Toggle fullscreen"></button>
                        <button class="pswp__button pswp__button--zoom" title="Zoom in/out"></button>
                        <div class="pswp__preloader">
                            <div class="pswp__preloader__icn">
                                <div class="pswp__preloader__cut">
                                    <div class="pswp__preloader__donut"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="pswp__share-modal pswp__share-modal--hidden pswp__single-tap">
                        <div class="pswp__share-tooltip"></div>
                    </div>
                    <button class="pswp__button pswp__button--arrow--left" title="Previous (arrow left)">
                    </button>
                    <button class="pswp__button pswp__button--arrow--right" title="Next (arrow right)">
                    </button>
                    <div class="pswp__caption">
                        <div class="pswp__caption__center"></div>
                    </div>
                </div>
            </div>
        </div><!-- end of pswp -->

        <?php wp_footer(); ?>
    </body>
</html>
