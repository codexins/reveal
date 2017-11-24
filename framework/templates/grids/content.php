<?php

/**
 * Template partial for displaying grid archive posts
 *
 * @package 	Reveal
 * @subpackage 	Core
 * @since 		1.0
 */


// Do not allow directly accessing this file.
defined( 'ABSPATH' ) OR die( esc_html__( 'This script cannot be accessed directly.', 'reveal' ) );

// Fetching and assigning data from theme options
$post_metas      = codexin_get_option('reveal_blog_post_meta');
$length_switch   = codexin_get_option( 'reveal_blog_title_excerpt_length' );
$title_length    = codexin_get_option( 'reveal_title_length' );
$excerpt_length  = codexin_get_option( 'reveal_excerpt_length' );
$read_more       = codexin_get_option( 'reveal-blog-read-more' );

?>


<article id="post-<?php the_ID(); ?>" <?php post_class( array( 'clearfix' ) ); ?> itemscope itemtype="http://schema.org/BlogPosting" itemprop="blogPost">
    <div class="blog-wrapper reveal-bg-1">

        <?php

        /**
         * Initial contents after start of post main-wrapper, codexin_post_wrapper_entry hook.
         *
         * @hooked codexin_post_formats - 10 (outputs the HTML for post formats)
         */
        do_action( 'codexin_post_wrapper_entry' );

        ?>

        <div class="blog-content reveal-border-1">
            <h3 class="blog-title grid" itemprop="headline">
                <a href="<?php echo esc_url( get_the_permalink() ); ?>" rel="bookmark" itemprop="url">
                    <span itemprop="name">
                        <?php 
                            
                        if( $length_switch ) {                            
                            // Limit the title characters
                            codexin_char_limit( $title_length, 'title' );
                        } else {
                            the_title();
                        } //end of length switcher conditional check

                        ?>
                    </span>
                </a>
            </h3>

            <?php

            /**
             * Initial contents after post-title, codexin_after_post_title hook.
             *
             * @hooked codexin_grid_post_metas - 10 (outputs the HTML for grid post metas)
             */
            do_action( 'codexin_after_post_title' );

            ?>

            <div class="wrapper-content" itemprop="articleBody">
                <?php

                if( $length_switch ) {                
                    echo '<p>';
                        codexin_char_limit( $excerpt_length, 'excerpt' );
                    echo '</p>';
                } else {
                    the_excerpt();
                } //end of length switcher conditional check

                if( $read_more ) {
                    echo codexin_button();
                } // end of show button conditional check

                ?>
            </div>
        </div> <!-- end of wrapper-content -->

    </div> <!-- end of blog-wrapper -->
</article><!-- end of #post-## -->


