<?php

/**
 * Function definition to handle the comments ajax requests
 *
 * @package Reveal
 * @subpackage Core
 */


// Do not allow directly accessing this file.
defined( 'ABSPATH' ) OR die( esc_html__( 'This script cannot be accessed directly.', 'reveal' ) );


if( ! function_exists( 'codexin_ajax_comment_handler' ) ) {
    /**
     * Comments Ajax Handler
     * 
     * Ajaxifies the submitted comments
     */ 
    function codexin_ajax_comment_handler() {

        $comment = wp_handle_comment_submission( wp_unslash( $_POST ) );
        if ( is_wp_error( $comment ) ) {
            $error_data = intval( $comment->get_error_data() );
            if ( ! empty( $error_data ) ) {
                wp_die( '<p>' . $comment->get_error_message() . '</p>', __( 'Comment Submission Failure', 'reveal' ), array( 'response' => $error_data, 'back_link' => true ) );
            } else {
                wp_die( 'Unknown error' );
            }
        }
     
        /*
         * Set Cookies
         */
        $user = wp_get_current_user();
        do_action('set_comment_cookies', $comment, $user);
     
        /*
         * Looping through comments
         */
        $comment_depth = 1;
        $comment_parent = $comment->comment_parent;
        while( $comment_parent ){
            $comment_depth++;
            $parent_comment = get_comment( $comment_parent );
            $comment_parent = $parent_comment->comment_parent;
        }
     
        /*
         * Set the globals, so that comment functions will work correctly
         */
        $GLOBALS['comment'] = $comment;
        $GLOBALS['comment_depth'] = $comment_depth;
     
        $comment_html = '<li ' . comment_class( 'clearfix', null, null, false ) . ' id="li-comment-' . get_comment_ID() . '">
            <div class="comment-body" id="comment-' . get_comment_ID() . '">
                <div class="comment-single">
                    <div class="comment-single-left comment-author vcard">
                        ' . get_avatar( $comment, $size='90' ) . '
                    </div>

                    <div class="comment-single-right comment-info">
                        <span class="fn" itemprop="name">' . get_comment_author_link() . '</span>
                        <div class="comment-text" itemprop="text">
                            ' . get_comment_text() . '
                        </div>
                        <div class="comment-meta">
                            <a href=' . esc_url( get_comment_link( $comment->comment_ID ) ) . '">
                            <time datetime="' . get_the_time('c') . '" itemprop="datePublished">' . sprintf(esc_html__('%1$s at %2$s', 'reveal'), get_comment_date(),  get_comment_time()) . '</time>
                            </a>';
                            if( $edit_link = get_edit_comment_link() ) {
                                $comment_html .= '<span class="edit-link"><a class="comment-edit-link" href="' . $edit_link . '">' . esc_html__( '(Edit)', 'reveal' ) . '</a></span>';
                            }
                        $comment_html .= '</div>';
     
                    if ( $comment->comment_approved == '0' ){
                        $comment_html .= '<div class="moderation-notice"><em>' . esc_html__('Your comment is awaiting moderation.', 'reveal') . '</em></div>';
                    }
     
                $comment_html .= '</div>
                </div>            
            </div>
        ';
        printf( '%s', $comment_html );
     
        die();
     
    }

}

add_action( 'wp_ajax_ajaxcomments', 'codexin_ajax_comment_handler' ); // For registered user
add_action( 'wp_ajax_nopriv_ajaxcomments', 'codexin_ajax_comment_handler' ); // For not registered users