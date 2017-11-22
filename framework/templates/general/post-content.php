<?php

/**
 * Template partial for displaying single post contents
 *
 * @package Reveal
 * @subpackage Core
 */


// Do not allow directly accessing this file.
defined( 'ABSPATH' ) OR die( esc_html__( 'This script cannot be accessed directly.', 'reveal' ) );


the_content();  
$args = array(
    'before'      => '<div class="page-links"><span class="page-links-title">' . esc_html__( 'Pages:', 'reveal' ) . '</span>',
    'after'       => '</div>',
    'link_before' => '<span>',
    'link_after'  => '</span>',
    'pagelink'    => '<span class="screen-reader-text">' . esc_html__( 'Page', 'reveal' ) . ' </span>%',
    'separator'   => '<span class="screen-reader-text">, </span>',
);                 
wp_link_pages( $args );