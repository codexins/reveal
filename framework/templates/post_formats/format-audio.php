<?php

/**
 * Post format rendering template for Audio Post
 *
 * @package 	Reveal
 * @subpackage 	Core
 * @since 		1.0
 */


// Do not allow directly accessing this file.
defined( 'ABSPATH' ) OR die( esc_html__( 'This script cannot be accessed directly.', 'reveal' ) );

// Fetching and assigning data from metabox
$audio = codexin_meta( 'reveal_audio' );

if ( ! post_password_required() ) {
    
    echo '<div class="embed">';
        echo sprintf( '%s', $audio );
    echo '</div> <!-- end of embed -->';

} // end of password check condition