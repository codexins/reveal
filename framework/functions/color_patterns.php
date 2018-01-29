<?php

/**
 * Function definition to pass colors in frontend from theme options
 *
 * @package 	Reveal
 * @subpackage 	Core
 * @since 		1.0
 */


// Do not allow directly accessing this file.
defined( 'ABSPATH' ) OR die( esc_html__( 'This script cannot be accessed directly.', 'reveal' ) );


if( ! function_exists( 'codexin_color_settings' ) ) {
    /**
     * Framework function to pass colors from theme options
     *
     * @uses    wp_add_inline_style()
     * @since   1.0.0
     */
    function codexin_color_settings() {

        // Retrieving color variables from theme options
        $body_bg            = !empty( codexin_get_option( 'cx_body_bg' ) ) ? codexin_sanitize_hex_color( codexin_get_option( 'cx_body_bg' ) ) : '#fff';
        $text_color         = !empty( codexin_get_option( 'cx_text_color' ) ) ? codexin_sanitize_hex_color( codexin_get_option( 'cx_text_color' ) ) : '#333';
        $primary_color      = !empty( codexin_get_option( 'cx_primary_color' ) ) ? codexin_sanitize_hex_color( codexin_get_option( 'cx_primary_color' ) ) : '#295970';
        $secondary_color    = !empty( codexin_get_option( 'cx_secondary_color' ) ) ? codexin_sanitize_hex_color( codexin_get_option( 'cx_secondary_color' ) ): '#fce38a';
        $border_color       = !empty( codexin_get_option( 'cx_border_color' ) ) ? codexin_sanitize_hex_color( codexin_get_option( 'cx_border_color' ) ) : '#ddd';
        $secondary_bg       = !empty( codexin_get_option( 'cx_secondary_bg' ) ) ? codexin_sanitize_hex_color( codexin_get_option( 'cx_secondary_bg' ) ) : '#fafafa';
        $white_color        = '#fff';
        $transparent_bg     = 'transparent';

        $theme_opt_colors = '';

        // Building up the css selectors
        $body_bg_selectors = array(
            'body'
        );
        $text_color_selectors = array(
            'body',
            'a:hover',
            'a:active',
            'a:focus',
            '#wp-calendar thead th',
            '#wp-calendar tbody td a',
            '#wp-calendar tfoot #prev a',
            '#wp-calendar tfoot #next a',
            '.tagcloud a',
            '.page-links a span',
            '.cx-color-0',
            '.cx-color-0 a',
            '.slick-dots li button:focus:before',
            '.slick-dots li button:hover:before',
            '.whole-site-wrapper .cx-cta-btn a',
            '.whole-site-wrapper .reveal-color-0',
            '.whole-site-wrapper .reveal-color-0 a',
            '.whole-site-wrapper .main-content-wrapper .reveal-color-0',
            '.whole-site-wrapper .main-content-wrapper .reveal-color-0 a'

        );
        $text_color_in_bg_selectors = array(
            'button:hover',
            '#toTop:hover',
            '.blog-grid-wrapper .meta',
            '.cx-blog .meta',
            'input[type="button"]:hover',
            'input[type="submit"]:hover'
        );
        $text_color_in_border_selectors = array(
            '.tagcloud a',
            '.page-links a span',
            '.cx-primary-btn a',
            '.mailchimp-input-button button.mailchimp-submit:hover',
            '.whole-site-wrapper .reveal-primary-btn a',
            '.whole-site-wrapper .main-content-wrapper .reveal-primary-btn a'
        );
        $primary_color_selectors = array(
            'a',
            '.cx-color-1',
            '.cx-color-0 a:hover',
            '.content-mask a:hover',
            '.cx-events-description .panel-title a::after',
            '.whole-site-wrapper .reveal-color-0 a:hover',
            '.whole-site-wrapper .reveal-color-1',
            '.whole-site-wrapper .main-content-wrapper .reveal-color-0 a:hover',
            '.whole-site-wrapper .main-content-wrapper .reveal-color-1'
        );
        $primary_color_in_bg_selectors = array(
            'button',
            '#toTop',
            '.page-links span',
            '.page-links a:focus span',
            '.page-links a:hover span',
            '.tagcloud a:hover',
            '#wp-calendar caption',
            '#wp-calendar tbody td a:hover',
            '#wp-calendar tfoot #next a:hover',
            '#wp-calendar tfoot #prev a:hover',
            '.thumb-testimonial::before',
            '.whole-site-wrapper .header.inner-header .reveal-bg-0',
            '.whole-site-wrapper .navbar.affix.reveal-bg-0',
            '.whole-site-wrapper .main-content-wrapper .reveal-bg-0',
            '.cx-primary-btn a:hover',
            '.whole-site-wrapper .reveal-primary-btn a:hover',
            '.whole-site-wrapper .main-content-wrapper .reveal-primary-btn a:hover',
            '.number-pagination .active span.current',
            '.gallery-carousel span.slick-arrow:hover',
            '.recent-portfolio-wrapper:after',
            '.cx-bg-0',
            '.cx-testimonial-5 .slick-slider-nav .item.slick-current .cx-overlay',
            '.cx-team-wrapper .team-social i:hover',
            '.cx-portfolios .portfolio-filter ul li.active',
            '.cx-blog-4 .blog-category a:hover',
            '.cx-events-wrapper-4 .slick-dots li.slick-active',
            '.content-mask .info-wrapper h2::after',
            '.cx-bg-overlay::before'
        );
        $primary_color_in_bg_color_selectors = array(
            'input[type="submit"]',
            'input[type="button"]'
        );
        $primary_color_in_border_selectors = array(
            'input[type="text"]:focus',
            'input[type="url"]:focus',
            'input[type="email"]:focus',
            'input[type="button"]:focus',
            'input[type="reset"]:focus',
            'input[type="password"]:focus',
            'input[type="search"]:focus',
            'input[type="tel"]:focus',
            'input[type="submit"]',
            'textarea:focus',
            '.content-mask a',
            '.form-control:focus',
            '.page-links span',
            '.page-links a:focus span',
            '.page-links a:hover span',
            '.number-pagination .active span.current',
            '.tagcloud a:hover',
            '.mailchimp-input-button button.mailchimp-submit',
            '.cx-service-box .service-single-3:hover',
            '.cx-events-wrapper-3 .cx-border-1:hover',
            '.cx-portfolios .portfolio-filter ul li.active',
            '.cx-testimonial-4 .quote-author-thumb',
            '.whole-site-wrapper .cx-primary-btn a:hover',
            '.whole-site-wrapper .reveal-primary-btn a:hover',
            '.whole-site-wrapper .main-content-wrapper .reveal-primary-btn a:hover',
            '.whole-site-wrapper .main-content-wrapper .reveal-border-0',
            '.events-item-content:hover .events-cx-btn a',
            '.events-single:hover .events-cx-btn a',
            '.events-item-content:hover'
        );
        $primary_color_in_mobile_menu_selectors_1 = array(
            '.c-menu'
        );
        $primary_color_in_mobile_menu_selectors_2 = array(
            '.c-menu__items a:hover',
            '.c-menu__items a:focus',
            '.c-menu__items a:visited'
        );
        $primary_color_in_mobile_menu_selectors_3 = array(
            '.c-menu__close'
        );
        $primary_color_special_selectors_1 = array(
            '.content-mask a'
        );
        $primary_color_special_selectors_2 = array(
            '.cx-team-wrapper .team-single:hover'
        );
        $primary_color_special_selectors_3 = array(
            '.cx-blog-4 .blog-wrapper::after'
        );
        $primary_color_special_selectors_4 = array(
            '.cx-team-wrapper .team-single-wrapper',
            '.cx-portfolios .cx-portfolio .image-mask',
            '.cx-image-box .img-thumb .content-wrapper:hover .single-content-wrapper',
            '.cx-image-box .img-thumb a:hover .single-content-wrapper'
        );
        $primary_color_special_selectors_5 = array(
            '.cx-blog .img-wrapper::before',
            '.cx-blog .img-wrapper::after',
            '.blog-grid-wrapper .img-wrapper a::before',
            '.blog-grid-wrapper .img-wrapper a::after',
            '.blog-wrapper-right a.thumbnail-link:before', 
            '.blog-wrapper-left .img-thumb a:before',
            '.hoverable'
        );
        $secondary_color_selectors = array(
            '.main-menu li a:hover',
            '.main-menu li.active a',
            '.menu-wrapper + .social-wrapper a:hover',
            '.topbar-wrapper li a:hover',
            '.topbar-wrapper li a:hover i'
        );
        $secondary_color_in_border_selectors = array(
            '.menu-wrapper + .social-wrapper a:hover'
        );
        $border_color_selectors = array(
            'hr',
            'td', 
            'th',
            'tr',
            'input[type="text"]',
            'input[type="url"]',
            'input[type="email"]',
            'input[type="button"]',
            'input[type="reset"]',
            'input[type="password"]',
            'input[type="search"]',
            'input[type="tel"]',
            'textarea',
            '.wpcf7 textarea',
            'blockquote',
            '.events-item-content',
            'h2.widgettitle',
            'table#wp-calendar',
            'table#wp-calendar thead',
            '#wp-calendar tbody tr',
            '#wp-calendar tbody td + td',
            '#wp-calendar thead th + th',
            '.events-cx-btn a',
            '.whole-site-wrapper .cx-border-1',
            '.whole-site-wrapper .cx-border-1 li',
            '.whole-site-wrapper .events-single .cx-border-1',
            '.whole-site-wrapper .main-content-wrapper .reveal-border-1'
        );
        $border_color_in_bg_selectors = array(
            '.divider'
        );
        $secondary_bg_selectors = array(
            'th',
            'tr.even',
            '#thumbnail_nav .nav-box',
            '.cx-bg-1',
            '.whole-site-wrapper .reveal-bg-1'
        );
        $white_color_selectors = array(
            '.cx-color-2',
            '.cx-color-2 a',
            '.reveal-color-2',
            '.reveal-color-2 a',
            '.cx-cta-btn a:hover',
            '.whole-site-wrapper .reveal-color-2',
            '.whole-site-wrapper .reveal-color-2 a',
            '.cx-primary-btn a:hover',
            '.events-carousel span.slick-arrow',
            '.wpcf7-submit:hover',
            '.whole-site-wrapper .reveal-primary-btn a:hover',
            '.whole-site-wrapper .main-content-wrapper .reveal-primary-btn a:hover',
            '.whole-site-wrapper .main-content-wrapper .tagcloud a:hover',
            '.thumb-testimonial::before',
            '.cx-pricing-tables .pricing-button a:hover',
            '.cx-portfolios .portfolio-filter ul li.active',
            '.gallery-carousel span.slick-arrow:hover',
            '.cx-portfolio .image-mask a:hover',
            '.topbar-wrapper li', 
            '.topbar-wrapper li a', 
            '.topbar-wrapper li a i'
        );
        $white_color_in_bg_selectors = array(
            '#nav-icon2 span',
            '.whole-site-wrapper .reveal-bg-2',
            '.cx-white-btn a',
            '.cx-cta-btn a',
            '.cx-bg-2',
            '.choose-slides.kc-tabs-slider .owl-theme .owl-controls .owl-page span'
        );
        $white_color_in_border_selectors = array(
            '.whole-site-wrapper .cx-white-btn a',
            '.cx-cta-btn a',
            '.cx-pricing-tables .pricing-button a:hover',
            '.whole-site-wrapper .cx-border-2'
        );
        $transparent_color_in_bg_selectors = array(
            '.page-links a span',
            'span.page-links-title',
            '.nav > li > a:focus',
            '.nav > li > a:hover',
            '.main-menu li.active',
            '.main-menu li.active a',
            '.breadcrumbs-wrapper .breadcrumb',
            'button.primary-nav-details',
            '.thumb-testimonial img',
            '.cx-cta-btn a:hover',
            '.footer .codexin-mailchimp-wrapper',
            '.cx-pricing-tables .pricing-button a:hover',
            '.number-pagination .pagination>li>a:focus', 
            '.number-pagination .pagination>li>span:focus'
        );

        // Passing styles to the correct selectors
        $theme_opt_colors .= implode( $body_bg_selectors, ',' ).'{background: '.$body_bg.';}';
        $theme_opt_colors .= implode( $text_color_selectors, ',' ).'{color: '.$text_color.';}';
        $theme_opt_colors .= implode( $text_color_in_bg_selectors, ',' ).'{background-color: '.$text_color.';}';
        $theme_opt_colors .= implode( $text_color_in_border_selectors, ',' ).'{border-color: '.$text_color.';}';
        $theme_opt_colors .= implode( $primary_color_selectors, ',' ).'{color: '.$primary_color.';}';
        $theme_opt_colors .= implode( $primary_color_in_bg_selectors, ',' ).'{background: '.$primary_color.';}';
        $theme_opt_colors .= implode( $primary_color_in_bg_color_selectors, ',' ).'{background-color: '.$primary_color.';}';
        $theme_opt_colors .= implode( $primary_color_in_border_selectors, ',' ).'{border-color: '.$primary_color.';}';
        $theme_opt_colors .= implode( $primary_color_in_mobile_menu_selectors_1, ',' ).'{background-color: '.$primary_color.';}';
        $theme_opt_colors .= implode( $primary_color_in_mobile_menu_selectors_2, ',' ).'{background: '.codexin_adjust_color_brightness( $primary_color, -20 ).';}';
        $theme_opt_colors .= implode( $primary_color_in_mobile_menu_selectors_3, ',' ).'{background-color: '.codexin_adjust_color_brightness( $primary_color, -40 ).';}';
        $theme_opt_colors .= implode( $primary_color_special_selectors_1, ',' ).'{background: '.$primary_color.' none repeat scroll 0 0;}';
        $theme_opt_colors .= implode( $primary_color_special_selectors_2, ',' ).'{-webkit-box-shadow: 5px 5px 5px 0 '.$primary_color.'; -moz-box-shadow: 5px 5px 5px 0 '.$primary_color.'; -ms-box-shadow: 5px 5px 5px 0 '.$primary_color.'; -o-box-shadow: 5px 5px 5px 0 '.$primary_color.'; box-shadow: 5px 5px 5px 0 '.$primary_color.';}';
        $theme_opt_colors .= implode( $primary_color_special_selectors_3, ',' ).'{background: linear-gradient(transparent, '.$primary_color.' );}';
        $theme_opt_colors .= implode( $primary_color_special_selectors_4, ',' ).'{background: '.$primary_color.'; background: '.codexin_hex_to_rgba( $primary_color, 0.75 ).';}';
        $theme_opt_colors .= implode( $primary_color_special_selectors_5, ',' ).'{background: '.$primary_color.'; background: '.codexin_hex_to_rgba( $primary_color, 0.35 ).';}';
        $theme_opt_colors .= implode( $secondary_color_selectors, ',' ).'{color: '.$secondary_color.';}';
        $theme_opt_colors .= implode( $secondary_color_in_border_selectors, ',' ).'{border-color: '.$secondary_color.';}';
        $theme_opt_colors .= implode( $border_color_selectors, ',' ).'{border-color: '.$border_color.';}';
        $theme_opt_colors .= implode( $border_color_in_bg_selectors, ',' ).'{background: '.$border_color.';}';
        $theme_opt_colors .= implode( $secondary_bg_selectors, ',' ).'{background: '.$secondary_bg.';}';
        $theme_opt_colors .= implode( $white_color_selectors, ',' ).'{color: '.$white_color.';}';
        $theme_opt_colors .= implode( $white_color_in_bg_selectors, ',' ).'{background: '.$white_color.';}';
        $theme_opt_colors .= implode( $white_color_in_border_selectors, ',' ).'{border-color: '.$white_color.';}';
        $theme_opt_colors .= implode( $transparent_color_in_bg_selectors, ',' ).'{background: '.$transparent_bg.';}';

        // Retrieving custom css from theme options
        $custom_css = codexin_get_option( 'cx_advanced_editor_css' );

        // Merging the custom css
        $theme_opt_colors .= $custom_css;

        // Finally adding the css after the Main Stylesheet
        wp_add_inline_style( 'main-stylesheet', $theme_opt_colors );

    }

}
//add_action( 'wp_enqueue_scripts', 'codexin_color_settings' );