<?php

/**
 * Various theme functions definition that utilizes the template hooks
 *
 * @package 	Reveal
 * @subpackage 	Core
 * @since 		1.0
 */


// Do not allow directly accessing this file.
defined( 'ABSPATH' ) OR die( esc_html__( 'This script cannot be accessed directly.', 'reveal' ) );


add_action( 'codexin_body_entry', 'codexin_pageloader', 10 );
if ( ! function_exists( 'codexin_pageloader' ) ) {
	/**
	 * Adding page loader
	 *
	 * @since 	v1.0
	 */
	function codexin_pageloader() {
	    $page_loader = codexin_get_option( 'reveal-page-loader' );
	    if( $page_loader ){
	    	echo '<!--  Site Loader -->';
	        echo '<div id="preloader_1"></div>';
	        echo '<!--  Site Loader finished -->';
	    }
	}
}


add_action( 'codexin_body_entry', 'codexin_mobile_menu', 15 );
if ( ! function_exists( 'codexin_mobile_menu' ) ) {
	/**
	 * Rendering the Responsive Menu
	 *
	 * @since 	v1.0
	 */
	function codexin_mobile_menu() {
		// Go to the mobile menu template partial
		get_template_part( CODEXIN_TEMPLATE_PARTIALS . 'navigation/mobile', 'menu' );
	}
}


add_action( 'codexin_inside_main_nav', 'codexin_render_main_navigation_left', 10 );
if ( ! function_exists( 'codexin_render_main_navigation_left' ) ) {
	/**
	 * Rendering the left navigation menu
	 *
	 * @since 	v1.0
	 */
	function codexin_render_main_navigation_left() {
		$header_version = codexin_header_version();
		if( $header_version !== '3' ) {
			return;
		}

		$result = '';
		ob_start();

		?>
		
		<div class="left-menu-wrapper">
			<div class="hidden-xs left-menu" itemscope itemtype="http://schema.org/SiteNavigationElement">
				<?php
				// Check if any menu is assigned
				if( has_nav_menu( 'main_menu_left' ) ) {
					// Assign the menu
					codexin_menu( 'main_menu_left' ); 
				} else {
					// If no menu assigned, give a notice
					echo codexin_add_menu( 'desktop' );
				} //end of nav menu check
				?>
			</div>
		</div> <!-- end of left-menu-wrapper -->

		<?php
		$result .= ob_get_clean();
		printf( '%s', $result );
	}
}


add_action( 'codexin_inside_main_nav', 'codexin_render_logo', 15 );
if ( ! function_exists( 'codexin_render_logo' ) ) {
	/**
	 * Rendering the site logo
	 *
	 * @since 	v1.0
	 */
	function codexin_render_logo() {
		// Go to the logo template partial
		get_template_part( CODEXIN_TEMPLATE_PARTIALS . 'header/logo' );
	}
}


add_action( 'codexin_inside_main_nav', 'codexin_render_main_navigation', 20 );
if ( ! function_exists( 'codexin_render_main_navigation' ) ) {
	/**
	 * Rendering the main navigation menu
	 *
	 * @since 	v1.0
	 */
	function codexin_render_main_navigation() {
		// Go to the logo template partial
		get_template_part( CODEXIN_TEMPLATE_PARTIALS . 'navigation/main', 'menu' );
	}
}


add_action( 'codexin_inside_main_nav', 'codexin_render_social_media', 25 );
if ( ! function_exists( 'codexin_render_social_media' ) ) {
	/**
	 * Rendering the social media information inside header
	 *
	 * @since 	v1.0
	 */
	function codexin_render_social_media() {
		$header_version = codexin_header_version();
		if( $header_version !== '4' ) {
			return;
		}
		// Go to the social media template partial
		get_template_part( CODEXIN_TEMPLATE_PARTIALS . 'header/social', 'media' );
	}
}


add_action( 'codexin_whole_wrapper_exit', 'codexin_to_top', 10 );
if ( ! function_exists( 'codexin_to_top' ) ) {
	/**
	 * Adding a navigation to top button
	 *
	 * @since 	v1.0
	 */
	function codexin_to_top() {
	    $to_top = codexin_get_option( 'reveal_to_top' );
	    if( $to_top ){
	    	echo '<!-- Go to Top Button at right bottom of the window screen -->';
	        echo '<div id="toTop">';
		        echo '<i class="fa fa-chevron-up"></i>';
		    echo '</div>';
		    echo '<!-- Go to Top Button finished-->';
	    }
	}
}


add_action( 'codexin_footer_copyright_content', 'codexin_footer_copyright', 10 );
if ( ! function_exists( 'codexin_footer_copyright' ) ) {
	/**
	 * Adding the footer copyright texts
	 *
	 * @since 	v1.0
	 */
	function codexin_footer_copyright() {
		$copyright = codexin_get_option( 'reveal-copyright' );

		$result = '';
		$result .= '<hr class="divider">';
		$result .= '<p class="text-center copyright">';
			$result .= html_entity_decode( $copyright );
		$result .= '</p>';

		printf( '%s', $result );
	}
}


add_action( 'codexin_body_exit', 'codexin_photoswipe_init', 10 );
if ( ! function_exists( 'codexin_photoswipe_init' ) ) {
	/**
	 * Initialization of photoswipe
	 *
	 * @since 	v1.0
	 */
	function codexin_photoswipe_init() {
		$result = '';
		ob_start();
		?>
        <!-- Initializing Photoswipe -->
        <div class="pswp" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="pswp__bg"></div>
            <div class="pswp__scroll-wrap">
                <div class="pswp__container">
                    <div class="pswp__item"></div>
                    <div class="pswp__item"></div>
                    <div class="pswp__item"></div>
                </div>
                <div class="pswp__ui pswp__ui--hidden">
                    <div class="pswp__top-bar">
                        <div class="pswp__counter"></div>
                        <button class="pswp__button pswp__button--close" title="Close (Esc)"></button>
                        <button class="pswp__button pswp__button--share" title="Share"></button>
                        <button class="pswp__button pswp__button--fs" title="Toggle fullscreen"></button>
                        <button class="pswp__button pswp__button--zoom" title="Zoom in/out"></button>
                        <div class="pswp__preloader">
                            <div class="pswp__preloader__icn">
                                <div class="pswp__preloader__cut">
                                    <div class="pswp__preloader__donut"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="pswp__share-modal pswp__share-modal--hidden pswp__single-tap">
                        <div class="pswp__share-tooltip"></div>
                    </div>
                    <button class="pswp__button pswp__button--arrow--left" title="Previous (arrow left)">
                    </button>
                    <button class="pswp__button pswp__button--arrow--right" title="Next (arrow right)">
                    </button>
                    <div class="pswp__caption">
                        <div class="pswp__caption__center"></div>
                    </div>
                </div>
            </div>
        </div>
        <!-- end of Photoswipe -->
		<?php
		$result .= ob_get_clean();
		printf( '%s', $result );
	}
}


add_action( 'codexin_post_wrapper_entry', 'codexin_post_formats', 10 );
if ( ! function_exists( 'codexin_post_formats' ) ) {
	/**
	 * Rendering the HTML for the post formats
	 *
	 * @since 	v1.0
	 */
	function codexin_post_formats() {
		// Go to the post formats template partial
		get_template_part( CODEXIN_TEMPLATE_PARTIALS . 'post_formats/format', get_post_format() );
	}
}


add_action( 'codexin_post_wrapper_entry', 'codexin_post_metas', 15 );
if ( ! function_exists( 'codexin_post_metas' ) ) {
	/**
	 * Rendering the HTML for the post metas
	 *
	 * @since 	v1.0
	 */
	function codexin_post_metas() {
		$post_style     = codexin_get_option( 'reveal_blog_style' );
		if( ( $post_style == 'grid') && ! is_single() || is_search() ) {
			return;
		}

		// Go to the post metas template partial
		get_template_part( CODEXIN_TEMPLATE_PARTIALS . 'general/post', 'metas' );
		
	}
}


add_action( 'codexin_after_post_title', 'codexin_grid_post_metas', 10 );
if ( ! function_exists( 'codexin_grid_post_metas' ) ) {
	/**
	 * Rendering the HTML for the post metas
	 *
	 * @since 	v1.0
	 */
	function codexin_grid_post_metas() {
		$post_style     = codexin_get_option( 'reveal_blog_style' );
		if( ( $post_style == 'list') || is_single() ) {
			return;
		}

		// Go to the post metas template partial
		get_template_part( CODEXIN_TEMPLATE_PARTIALS . 'general/post', 'metas' );
	}
}


add_action( 'codexin_post_wrapper_exit', 'codexin_post_content_footer', 10 );
if ( ! function_exists( 'codexin_post_content_footer' ) ) {
	/**
	 * Rendering the HTML for the single post content footer
	 *
	 * @since 	v1.0
	 */
	function codexin_post_content_footer() {
		if( is_single() ) {

			// Go to the post footer template partial
			get_template_part( CODEXIN_TEMPLATE_PARTIALS . 'general/post', 'footer' );
		}
	}
}