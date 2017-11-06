<?php
/**
 * Template part for displaying events
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package reveal
 */

?>
<?php $cadate = rwmb_meta('reveal_portfolio_date', 'type=date');
$project_comple_date=date_create($cadate);
?>
<article id="portfolio-<?php the_ID(); ?>" <?php post_class(array('clearfix portfolio-list')); ?> itemscope itemtype="http://schema.org/Event">
    <div class="post-wrapper reveal-border-1">
        <div class="port-list-wrapper reveal-bg-2">
            <?php if(has_post_thumbnail()): ?>
                <div class="thumb-port" style="background-image:url('<?php the_post_thumbnail_url('reveal-rectangle-one') ?>');">
                    <a href="<?php echo esc_url(get_the_permalink()); ?>"></a>
                    <div class="port-date reveal-bg-2"><p><?php echo esc_html(date_format($project_comple_date, "d M Y")); ?></p></div>
                </div>
            <?php endif; ?>

            <div class="desc-port">
                <p class="list-tag reveal-color-0"><i class="flaticon-bookmark"></i> 
                <?php $cat_list = get_the_term_list( $post->ID, 'portfolio-category', '', ', ', '' );
                   if(!empty($cat_list)): echo $cat_list; endif;
                  ?>
                </p>
                <h2 class="post-title"><a href="<?php echo esc_url(get_the_permalink()); ?>">
                    
                <?php 
                    $p_length_switch = reveal_option('reveal_portfolio_title_excerpt_length');
                    if( $p_length_switch ) :
                        $reveal_p_title_len = reveal_option( 'reveal_portfolio_title_length' );
                        reveal_title( $reveal_p_title_len );
                    else:
                        the_title();
                    endif;
                ?>

                </a></h2>
                <div class="list-content">
                <?php
                $pex_length_switch = reveal_option('reveal_portfolio_title_excerpt_length');
                if( $pex_length_switch ) :
                    $reveal_p_excerpt_len = reveal_option( 'reveal_portfolio_excerpt_length' );
                    reveal_excerpt( $reveal_p_excerpt_len );
                else:
                    the_excerpt();
                endif;
                ?>
                </div>

                <div class="cx-btn reveal-color-0 reveal-primary-btn">
                    <a class="cx-btn-text" href="<?php echo esc_url( get_the_permalink() ); ?>"><?php esc_html_e( 'Read More', 'reveal' ) ?></a>
                </div>
            </div>
        </div>
        
    </div><!--end of post-wrapper-->
</article><!-- #portfolio-## -->
