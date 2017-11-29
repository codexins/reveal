<?php

/**
 * Template partial for displaying list archive portfolios
 *
 * @package 	Reveal
 * @subpackage 	Core
 * @since 		1.0
 */


// Do not allow directly accessing this file.
defined( 'ABSPATH' ) OR die( esc_html__( 'This script cannot be accessed directly.', 'reveal' ) );

// Fetching and assigning data from theme options
$length_switch        = codexin_get_option( 'cx_portfolio_title_excerpt_length' );
$title_length         = codexin_get_option( 'cx_portfolio_title_length' );
$excerpt_length       = codexin_get_option( 'cx_portfolio_excerpt_length' );
$portfolio_list       = get_the_term_list( $post->ID, 'portfolio-category', '', ', ', '' );

// Fetching the attachment properties
$image_prop           = codexin_attachment_metas_extended( $post->ID, 'portfolio', 'reveal-rectangle-one' );

?>
<article id="portfolio-<?php the_ID(); ?>" <?php post_class( array( 'clearfix portfolio-list' ) ); ?>>
    <div class="post-wrapper reveal-border-1">
        <div class="port-list-wrapper reveal-bg-2">
                <div class="thumb-port" style="background-image:url('<?php printf( '%s', $image_prop['src'] ); ?>');">
                    <a href="<?php echo esc_url( get_the_permalink() ); ?>" itemprop="url"></a>
                    <div class="port-date reveal-bg-2">
                        <p><?php echo date( get_option('date_format'), strtotime( get_the_time( 'd M, Y' ) ) ); ?></p>
                    </div>
                </div> <!-- end of port-list-wrapper -->

            <div class="desc-port">
                <?php
                if( ! empty( $portfolio_list ) ) { ?>
                    <p class="list-tag reveal-color-0"><i class="flaticon-bookmark"></i> 
                        <?php echo wp_kses_post( $portfolio_list ); ?>
                    </p> <!-- end of list tag -->
                <?php } ?>

                <h2 class="post-title" itemprop="name">
                    <a href="<?php echo esc_url( get_the_permalink() ); ?>" itemprop="url">
                    
                        <?php

                        if( $length_switch ) {                            
                            // Limit the title characters
                            echo apply_filters( 'the_title', codexin_char_limit( $title_length, 'title' ) );
                        } else {
                            the_title();
                        } //end of length switcher conditional check

                        ?>

                    </a>
                </h2> <!-- end of post-title -->

                <div class="list-content" itemprop="description">
                    <?php 
                    if( $length_switch ) {
                        echo '<p>';
                            echo apply_filters( 'the_content', codexin_char_limit( $excerpt_length, 'excerpt' ) );
                        echo '</p>';
                    } else {
                        the_excerpt();
                    } //end of length switcher conditional check
                    
                    ?>
                </div> <!-- end of list-content -->

                <?php

                // Adding a read-more button
                echo codexin_button();

                ?>

            </div> <!-- end of desc-port -->
        </div> <!-- end of port-list-wrapper -->        
    </div> <!--end of post-wrapper-->
</article> <!-- end of #portfolio-## -->
