<?php
/**
 * Template part for displaying results in search pages
 *
 * @package 	Reveal
 * @subpackage 	Core
 * @since 		1.0
 */


// Do not allow directly accessing this file.
defined( 'ABSPATH' ) OR die( esc_html__( 'This script cannot be accessed directly.', 'reveal' ) );

?>

<article id="post-<?php the_ID(); ?>" <?php post_class( array( 'clearfix' ) ); ?> itemscope itemtype="http://schema.org/BlogPosting" itemprop="blogPost">
    <div class="post-wrapper reveal-border-1">

        <?php

        /**
         * Initial contents after start of post main-wrapper, codexin_post_wrapper_entry hook.
         *
         * @hooked codexin_post_formats - 10 (outputs the HTML for post formats)
         */
        do_action( 'codexin_post_wrapper_entry' );

        ?>

        <ul class="list-inline post-detail reveal-color-0 reveal-border-1">
            <li><i class="fa fa-pencil"></i> <span class="post-author vcard" itemprop="author" itemscope itemtype="https://schema.org/Person">
                <a href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ); ?>" itemprop="url" rel="author">
                    <span itemprop="name"><?php echo esc_html( get_the_author() ); ?></span>
                </a>
                </span>
            </li>

            <li><i class="fa fa-calendar"></i> <a href="<?php echo get_day_link( get_post_time( 'Y' ), get_post_time( 'm' ), get_post_time( 'j' ) );  ?>"><time datetime="<?php echo get_the_time('c'); ?>" itemprop="datePublished"><?php echo date( get_option('date_format'), strtotime( get_the_time( 'd M, Y' ) ) ); ?></time></a> </li>

            <li><i class="fa fa-tag"></i> <span itemprop="genre"><?php the_category( ', ' )?></span></li>

            <li><i class="fa fa-comment"></i> <a href="<?php comments_link(); ?>"><?php comments_number( 'No Comments', 'One Comment', '% Comments' )?></a></li>

            <li> <?php if( function_exists( 'codexin_likes_button' ) ) { echo codexin_likes_button( get_the_ID(), 0 ); } ?></li>
        </ul>

        <h2 class="post-title" itemprop="headline">
            <a href="<?php echo esc_url( get_the_permalink() ); ?>" rel="bookmark" itemprop="url">
                <span itemprop="name">
                    <?php the_title(); ?>
                </span>
            </a>
        </h2>

        <div class="entry-content" itemprop="articleBody">

            <?php

            the_excerpt();
            echo codexin_button();
            
            ?>

        </div><!-- end of entry-content -->        
    </div> <!-- end of post-wrapper -->
</article><!-- end of #post-## -->
<div class="clearfix"></div>