<?php

/**
 *
 * The template for displaying the footer
 *
 * Contains the closing of the #whole div and all content after.
 *
 * @package 	Reveal
 * @subpackage 	Templates
 * @since 		1.0
 */


// Do not allow directly accessing this file.
defined( 'ABSPATH' ) OR die( esc_html__( 'This script cannot be accessed directly.', 'reveal' ) );

// Fetching and assigning data from theme options and metabox
$codexin_footer = codexin_get_option( 'cx_footer_version' );
$codexin_cpr    = codexin_get_option( 'cx_footer_copyright' );
$copyright_text = codexin_get_option( 'cx_copyright' );
$disable_footer = codexin_meta( 'codexin_disable_footer' );
       	

            if( $disable_footer == 0 ) { ?>
            	<footer id="footer" class="footer reveal-bg-1" itemscope="itemscope" itemtype="http://schema.org/WPFooter">
            		<div class="container">
                        <div class="row">
                			<?php 

                            // Go to a specific footer template partial depending on user choice
                			if( $codexin_footer == 1 ) {
                                get_template_part( 'framework/templates/footer/footer', 'one' );
                            } elseif( $codexin_footer == 2 ) {
                                get_template_part( 'framework/templates/footer/footer', 'two' );
                            } elseif( $codexin_footer == 3 ) {
                                get_template_part( 'framework/templates/footer/footer', 'three' );
                            } else {
                                get_template_part( 'framework/templates/footer/footer', 'general' );
                            }

                            ?>
                        </div> <!-- end of row -->
                    
                        <?php
            			
                        if( $codexin_cpr && ! empty( $copyright_text ) ) { 

                            /**
                             * Footer Copyright area, codexin_footer_copyright_content hook.
                             *
                             * @hooked codexin_footer_copyright - 10 (outputs the HTML for the footer copyright)
                             */
                            do_action( 'codexin_footer_copyright_content' );

                        } // end of footer copyright conditional check

                        ?>

            		</div> <!-- end of container -->
            	</footer> <!-- end of footer -->
            <?php
            } // end of disable footer conditional check

            /**
             * Finishing contents before the end of #whole tag, codexin_whole_wrapper_exit hook.
             *
             * @hooked codexin_to_top - 10 (outputs the HTML for the scroll to-top button)
             */
            do_action( 'codexin_whole_wrapper_exit' );

            ?>
        </div> <!-- end of #whole -->


        <?php

        /**
         * Finishing contents before the end of body tag, codexin_body_exit hook.
         *
         * @hooked codexin_photoswipe_init - 10 (outputs the HTML for the initialization of PhotoSwipe)
         */
        do_action( 'codexin_body_exit' );

        wp_footer();
        ?>
    </body>
</html>
