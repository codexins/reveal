<?php

/**
 * Template partial for displaying single and list archive posts
 *
 * @package 	Reveal
 * @subpackage 	Core
 * @since 		1.0
 */


// Do not allow directly accessing this file.
defined( 'ABSPATH' ) OR die( esc_html__( 'This script cannot be accessed directly.', 'reveal' ) );

// Fetching and assigning data from theme options
$length_switch   = codexin_get_option( 'cx_blog_title_excerpt_length' );
$title_length    = codexin_get_option( 'cx_title_length' );
$excerpt_length  = codexin_get_option( 'cx_excerpt_length' );
$read_more       = codexin_get_option( 'cx_blog_read_more' );

?>

<article id="post-<?php the_ID(); ?>" <?php post_class( array( 'clearfix' ) ); ?> itemscope itemtype="http://schema.org/BlogPosting" itemprop="blogPost">
    <div class="post-wrapper reveal-border-1">

        <?php

        /**
         * Initial contents after start of post main-wrapper, codexin_post_wrapper_entry hook.
         *
         * @hooked codexin_post_formats - 10 (outputs the HTML for post formats)
         * @hooked codexin_post_metas - 15 (outputs the HTML for post metas)
         */
        do_action( 'codexin_post_wrapper_entry' );

        ?>

        <?php if( ! is_single() ) { ?>

            <h2 class="post-title" itemprop="headline">
                <a href="<?php echo esc_url( get_the_permalink() ); ?>" rel="bookmark" itemprop="url">
                    <span itemprop="name">
                        <?php
                            
                        if( $length_switch ) {                            
                            // Limit the title characters
                            echo apply_filters( 'the_title', codexin_char_limit( $title_length, 'title' ) );
                        } else {
                            the_title();
                        } //end of length switcher conditional check

                        ?>
                    </span>
                </a>
            </h2>
        
        <?php } else { ?>

            <h2 class="post-title reveal-color-1" itemprop="headline">
                <span itemprop="name"><?php the_title(); ?></span>
            </h2>

        <?php } ?>

        <?php

        /**
         * Initial contents after post-title, codexin_after_post_title hook.
         *
         */
        do_action( 'codexin_after_post_title' );

        ?>

        <div class="entry-content" <?php echo ( is_single() ) ? esc_attr( 'itemprop=text' ) : esc_attr( 'itemprop=articleBody') ?>>

    		<?php

    		if( is_single() ) {

                // Go to the template partial to show to contents
                get_template_part( 'framework/templates/general/post', 'content' );

    		} else {

                if( $length_switch ) {
                    echo '<p>';
                        echo apply_filters( 'the_content', codexin_char_limit( $excerpt_length, 'excerpt' ) );
                    echo '</p>';
                } else {
                    the_excerpt();
                } //end of length switcher conditional check

                if( $read_more ) {
                    echo codexin_button();
                } // end of show button conditional check

            } // end of is_single() conditional check
            
            ?>

		</div><!-- end of entry-content -->

        <?php

        /**
         * Finishing contents before end of post-wrapper, codexin_post_wrapper_exit hook.
         *
         * @hooked codexin_post_content_footer - 10 (outputs the HTML for single post content footer)
         */
        do_action( 'codexin_post_wrapper_exit' );

        ?>
        
    </div> <!-- end of post-wrapper -->
</article><!-- end of #post-## -->
<div class="clearfix"></div>