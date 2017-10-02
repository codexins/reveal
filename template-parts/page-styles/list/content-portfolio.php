<?php
/**
 * Template part for displaying posts
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package reveal
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(array('clearfix portfolio-list')); ?>>
    <div class="blog-post">
        <div class="port-list-wrapper">
            <?php if(has_post_thumbnail()): ?>
                <div class="thumb-port" style="background-image:url('<?php the_post_thumbnail_url('reveal-rectangle-one') ?>');">
                    <a href="<?php the_permalink(); ?>"></a>
                    <div class="port-date"><p>12 July 2017</p></div>
                </div>
            <?php endif; ?>

            <div class="desc-port">
                <p class="list-tag"><i class="flaticon-bookmark"></i> 
                    <?php
                        $taxonomy = 'portfolio-category';
                        $taxonomies = get_terms($taxonomy); 
                        $last_key = end($taxonomies);
                        foreach ( $taxonomies as $tax ) {
                            // echo  $tax->name.', ' ;
                            if($tax == $last_key):
                                echo '<a href="'. get_the_permalink() .'"><span>'.ucwords($tax->name).'</span></a>';
                            else: 
                                echo '<a href="'. get_the_permalink() .'"><span>'.ucwords($tax->name).', </span></a>';
                             
                            endif; 
                    }?>
                </p>
                <h2 class="post-title"><a href="<?php the_permalink(); ?>">
                    
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

                <p class="blog-more"><a class="cx-btn" href="<?php the_permalink(); ?>"><?php esc_html_e( 'Read More', 'reveal' ) ?></a></p>
            </div>
        </div>
        
    </div><!--blog post-->
</article><!-- #post-## -->
