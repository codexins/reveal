<?php

/**
 * Template partial for displaying single portfolio
 *
 * @package 	Reveal
 * @subpackage 	Core
 * @since 		1.0
 */


// Do not allow directly accessing this file.
defined( 'ABSPATH' ) OR die( esc_html__( 'This script cannot be accessed directly.', 'reveal' ) );

// Fetching data from theme options
$position     = codexin_get_option( 'cx_single_portfolio_layout' );
$comments     = codexin_get_option( 'cx_portfolio_comments' );

// Fetching data from metabox
$cname        = codexin_meta( 'reveal_portfolio_client', 'type=text' );
$cadate       = codexin_meta( 'reveal_portfolio_date', 'type=date' );
$cdate        = ! empty( $cadate ) ? date( get_option( 'date_format' ), strtotime( $cadate ) ) : '';
$cskills      = codexin_meta( 'reveal_portfolio_skills', 'type=text' );
$csname       = codexin_meta( 'reveal_portfolio_sname', 'type=text' );
$csurl        = codexin_meta( 'reveal_portfolio_surl', 'type=text' );
$cat_list     = get_the_term_list( $post->ID, 'portfolio-category', '', '|', '' );
$tag_list     = get_the_term_list( $post->ID, 'portfolio_tags', '', '|', '' );

// Fetching the attachment properties
$image_prop   = codexin_attachment_metas_extended( $post->ID, 'portfolio', 'reveal-portfolio-single' );

?>
<article id="portfolio-<?php the_ID(); ?>" <?php post_class(); ?>>
    <div class="row">
        <div class="portfolio-image clearfix">
            <img src="<?php printf( '%s', $image_prop['src'] ); ?>" <?php printf( '%s', $image_prop['alt'] ); ?>>
        </div> <!-- end of portfolio-image -->

        <div class="col-md-8 <?php echo ( $position == '1' ) ? 'col-md-push-4' : ''; ?>">
            <div class="portfolio-details">
                <h2 class="reveal-color-1" itemprop="name"><?php the_title()?></h2>
                <div class="portfolio-content" itemprop="description">
                    <?php the_content(); ?>
                </div>
            </div> <!-- end of portfolio-details -->

            <?php 
            codexin_post_link( __( 'Prev', 'reveal' ), __( 'Next', 'reveal' ) );

            if( $comments ) { ?>
                <div class="clearfix"></div>
                <div class="portfolio-comments">
                    <?php comments_template('', true);?>
                </div> <!-- end of portfolio-comments -->
            <?php } ?>
        </div> <!-- end of col -->

        <div class="col-md-4 <?php echo ( $position == '1' ) ? 'col-md-pull-8' : ''; ?>">
            <div class="portfolio-meta reveal-color-0">
                <?php if( ! empty( $cname ) || ! empty( $csname ) || ! empty( $cdate ) ) { ?>
                    <div class="client-portfolio meta-single reveal-border-1">
                        <h3 class="reveal-color-1"><?php echo esc_html__( 'Client Info', 'reveal' ); ?></h3>
                        <?php 
                        if( ! empty( $cname ) ) { ?>
                            <p><strong><?php echo esc_html__( 'Name', 'reveal' ); ?>: </strong><?php echo esc_html( $cname ); ?></p>
                        <?php }
                        if( ( ! empty( $csurl ) ) || ( ! empty( $csname ) ) ) { ?>
                            <p><strong><?php echo esc_html__( 'Website', 'reveal' ); ?>: </strong><?php echo '<a href="'. esc_url( $csurl ) .'" target="_blank">'. esc_html( $csname ) .'</a>'; ?></p>
                        <?php }
                        if( ! empty( $cdate ) ) { ?>
                            <p><strong><?php echo esc_html__( 'Completion Date', 'reveal' ); ?>: </strong><?php echo esc_html( $cdate ); ?></p>
                        <?php } ?>
                    </div> <!-- end of client-portfolio -->
                <?php } ?>

                <?php if( ! empty( $cskills ) ) { ?>
                    <div class="skills-portfolio meta-single reveal-border-1">
                        <h3 class="reveal-color-1"><?php echo esc_html__( 'Skills', 'reveal' ) ?></h3>
                        <p><?php echo esc_html( $cskills ); ?></p>
                    </div> <!-- end of skills-portfolio -->
                <?php } 

                if( ! empty( $cat_list ) ) { ?>
                    <div class="category-portfolio meta-single reveal-border-1">
                        <h3 class="reveal-color-1"><?php echo esc_html__( 'Catagory', 'reveal' ); ?></h3>
                        <p><?php echo wp_kses_post( $cat_list ); ?></p>
                    </div> <!-- end of category-portfolio -->
                <?php } 
                
                if( ! empty( $tag_list ) ) { ?>
                    <div class="tag-portfolio meta-single reveal-border-1">
                        <h3 class="reveal-color-1"><?php echo esc_html__( 'Portfolio Tag', 'reveal' ); ?></h3>
                        <p><?php echo wp_kses_post( $tag_list ); ?></p>
                    </div> <!-- end of portfolio-tag -->
                <?php } ?>

            </div> <!-- end of portfolio-meta -->
        </div> <!-- end of col -->
    </div> <!-- end of row -->
</article><!-- end of #portfolio-## -->