<?php




/**
*
* Helper Function for getting the next/previous posts link
*
**/
if ( ! function_exists( 'reveal_posts_link' ) ) {

    function reveal_posts_link($prev = 'Newer Posts', $next = 'Older Posts', $custom = NULL) {


        $prev_link = get_previous_posts_link('&laquo; '. $prev);
        $next_link = ($custom !== NULL) ? get_next_posts_link($next. ' &raquo; ', $custom->max_num_pages) : get_next_posts_link($next. ' &raquo; ');

        echo '<div class="posts-nav reveal-color-0 reveal-primary-btn reveal-border-1 clearfix">';
            if($next_link): 
            echo '<div class="nav-next alignright">'. $next_link .'</div>';
            endif; 
            
            if($prev_link): 
            echo '<div class="nav-previous alignleft">'. $prev_link .'</div>';
            endif; 
        echo '</div>';

    }

}

/**
*
* Helper Function for getting the next/previous single post link
*
**/
if ( ! function_exists( 'reveal_post_link' ) ) {

    function reveal_post_link($prev = 'Previous Post', $next = 'Next Post') {

        if( codexin_get_option( 'reveal_single_pagination' ) == 'button' ):
        $prev_link = get_previous_post_link('%link', esc_html( $prev.' &raquo;'));
        $next_link = get_next_post_link('%link', esc_html('&laquo; '.$next, 'reveal'));
        elseif( codexin_get_option( 'reveal_single_pagination' ) == 'title' ):
        $prev_link = get_previous_post_link('%link', esc_html__('%title &raquo;', 'reveal'));
        $next_link = get_next_post_link('%link', esc_html__('&laquo; %title', 'reveal'));
        endif;

        echo '<div class="posts-nav reveal-color-0 reveal-primary-btn clearfix">';
            if($next_link): 
            echo '<div class="nav-next alignleft">'. $next_link .'</div>';
            endif; 
            
            if($prev_link): 
            echo '<div class="nav-previous alignright">'. $prev_link .'</div>';
            endif; 
        echo '</div>';

    }

}


/**
*
* Helper Function for numeric pagination for posts
*
**/
if ( ! function_exists( 'reveal_posts_link_numbered' ) ) {

    function reveal_posts_link_numbered($custom = NULL) {

        global $wp_query;
        /** Stop execution if there's only 1 page */
        if( ( ($custom !== NULL) ? $custom->max_num_pages : $wp_query->max_num_pages ) <= 1 ) {
            return;
        }

        ob_start();
        ?>
            <nav class="number-pagination reveal-color-0 reveal-primary-btn reveal-border-1">
                <?php
                $current = max( 1, absint( get_query_var( 'paged' ) ) );
                $pagination = paginate_links( array(
                    'base' => str_replace( PHP_INT_MAX, '%#%', esc_url( get_pagenum_link( PHP_INT_MAX ) ) ),
                    'format' => '?paged=%#%',
                    'current' => $current,
                    'total' => ($custom !== NULL) ? $custom->max_num_pages : $wp_query->max_num_pages,
                    'type' => 'array',
                    'prev_text' => '&laquo;',
                    'next_text' => '&raquo;',
                ) );
                if ( ! empty( $pagination ) ) : ?>
                    <ul class="pagination">
                        <?php foreach ( $pagination as $key => $page_link ) : ?>
                            <li class="paginated_link<?php if ( strpos( $page_link, 'current' ) !== false ) { echo ' active'; } ?>"><?php echo $page_link ?></li>
                        <?php endforeach ?>
                    </ul>
                <?php endif; ?>
            </nav> <!-- end of number-pagination -->
        <?php
        $links = ob_get_clean();
        return apply_filters( 'reveal_posts_link_numbered', $links );

    }

}