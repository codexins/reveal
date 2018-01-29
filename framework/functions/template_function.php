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

	    $page_loader = codexin_get_option( 'cx_page_loader' );

	    if( false == $page_loader ){
	    	return;
	    }

		// $type = codexin_get_option( 'codexin_page_loader_type' );
		// $loader_color = codexin_get_option( 'codexin_page_loader_color' );

		// if( $type == 1 ){
	 //    	$loader = '<svg width="38" height="38" viewBox="0 0 38 38" xmlns="http://www.w3.org/2000/svg" stroke="#000"> <g fill="none" fill-rule="evenodd"> <g transform="translate(1 1)" stroke-width="2"> <circle stroke-opacity=".5" cx="18" cy="18" r="18"/> <path d="M36 18c0-9.94-8.06-18-18-18"> <animateTransform attributeName="transform" type="rotate" from="0 18 18" to="360 18 18" dur="1s" repeatCount="indefinite" begin="0s"/> </path> </g> </g></svg>';
	 //    } elseif( $type == 2 ) {
	 //    	$loader = '<svg width="45" height="45" viewBox="0 0 45 45" xmlns="http://www.w3.org/2000/svg" stroke="'. $loader_color .'"> <g fill="none" fill-rule="evenodd" transform="translate(1 1)" stroke-width="2"> <circle cx="22" cy="22" r="6" stroke-opacity="0"> <animate attributeName="r" begin="1.5s" dur="3s" values="6;22" calcMode="linear" repeatCount="indefinite"/> <animate attributeName="stroke-opacity" begin="1.5s" dur="3s" values="1;0" calcMode="linear" repeatCount="indefinite"/> <animate attributeName="stroke-width" begin="1.5s" dur="3s" values="2;0" calcMode="linear" repeatCount="indefinite"/> </circle> <circle cx="22" cy="22" r="6" stroke-opacity="0"> <animate attributeName="r" begin="3s" dur="3s" values="6;22" calcMode="linear" repeatCount="indefinite"/> <animate attributeName="stroke-opacity" begin="3s" dur="3s" values="1;0" calcMode="linear" repeatCount="indefinite"/> <animate attributeName="stroke-width" begin="3s" dur="3s" values="2;0" calcMode="linear" repeatCount="indefinite"/> </circle> <circle cx="22" cy="22" r="8"> <animate attributeName="r" begin="0s" dur="1.5s" values="6;1;2;3;4;5;6" calcMode="linear" repeatCount="indefinite"/> </circle> </g></svg>';
	 //    } elseif( $type == 3 ) {
	 //    	$loader = '<svg width="44" height="44" viewBox="0 0 44 44" xmlns="http://www.w3.org/2000/svg" stroke="'. $loader_color .'"> <g fill="none" fill-rule="evenodd" stroke-width="2"> <circle cx="22" cy="22" r="1"> <animate attributeName="r" begin="0s" dur="1.8s" values="1; 20" calcMode="spline" keyTimes="0; 1" keySplines="0.165, 0.84, 0.44, 1" repeatCount="indefinite"/> <animate attributeName="stroke-opacity" begin="0s" dur="1.8s" values="1; 0" calcMode="spline" keyTimes="0; 1" keySplines="0.3, 0.61, 0.355, 1" repeatCount="indefinite"/> </circle> <circle cx="22" cy="22" r="1"> <animate attributeName="r" begin="-0.9s" dur="1.8s" values="1; 20" calcMode="spline" keyTimes="0; 1" keySplines="0.165, 0.84, 0.44, 1" repeatCount="indefinite"/> <animate attributeName="stroke-opacity" begin="-0.9s" dur="1.8s" values="1; 0" calcMode="spline" keyTimes="0; 1" keySplines="0.3, 0.61, 0.355, 1" repeatCount="indefinite"/> </circle> </g></svg>';
		// } elseif( $type == 4 ) {
		// 	$loader = '<svg width="58" height="58" viewBox="0 0 58 58" xmlns="http://www.w3.org/2000/svg"> <g fill="none" fill-rule="evenodd"> <g transform="translate(2 1)" stroke="'. $loader_color .'" stroke-width="1.5"> <circle cx="42.601" cy="11.462" r="5" fill-opacity="1" fill="#fff"> <animate attributeName="fill-opacity" begin="0s" dur="1.3s" values="1;0;0;0;0;0;0;0" calcMode="linear" repeatCount="indefinite"/> </circle> <circle cx="49.063" cy="27.063" r="5" fill-opacity="0" fill="#fff"> <animate attributeName="fill-opacity" begin="0s" dur="1.3s" values="0;1;0;0;0;0;0;0" calcMode="linear" repeatCount="indefinite"/> </circle> <circle cx="42.601" cy="42.663" r="5" fill-opacity="0" fill="#fff"> <animate attributeName="fill-opacity" begin="0s" dur="1.3s" values="0;0;1;0;0;0;0;0" calcMode="linear" repeatCount="indefinite"/> </circle> <circle cx="27" cy="49.125" r="5" fill-opacity="0" fill="#fff"> <animate attributeName="fill-opacity" begin="0s" dur="1.3s" values="0;0;0;1;0;0;0;0" calcMode="linear" repeatCount="indefinite"/> </circle> <circle cx="11.399" cy="42.663" r="5" fill-opacity="0" fill="#fff"> <animate attributeName="fill-opacity" begin="0s" dur="1.3s" values="0;0;0;0;1;0;0;0" calcMode="linear" repeatCount="indefinite"/> </circle> <circle cx="4.938" cy="27.063" r="5" fill-opacity="0" fill="#fff"> <animate attributeName="fill-opacity" begin="0s" dur="1.3s" values="0;0;0;0;0;1;0;0" calcMode="linear" repeatCount="indefinite"/> </circle> <circle cx="11.399" cy="11.462" r="5" fill-opacity="0" fill="#fff"> <animate attributeName="fill-opacity" begin="0s" dur="1.3s" values="0;0;0;0;0;0;1;0" calcMode="linear" repeatCount="indefinite"/> </circle> <circle cx="27" cy="5" r="5" fill-opacity="0" fill="#fff"> <animate attributeName="fill-opacity" begin="0s" dur="1.3s" values="0;0;0;0;0;0;0;1" calcMode="linear" repeatCount="indefinite"/> </circle> </g> </g></svg>';
		// } elseif( $type == 5 ) {
		// 	$loader = '<svg width="135" height="135" viewBox="0 0 135 135" xmlns="http://www.w3.org/2000/svg" fill="'. $loader_color .'"> <path d="M67.447 58c5.523 0 10-4.477 10-10s-4.477-10-10-10-10 4.477-10 10 4.477 10 10 10zm9.448 9.447c0 5.523 4.477 10 10 10 5.522 0 10-4.477 10-10s-4.478-10-10-10c-5.523 0-10 4.477-10 10zm-9.448 9.448c-5.523 0-10 4.477-10 10 0 5.522 4.477 10 10 10s10-4.478 10-10c0-5.523-4.477-10-10-10zM58 67.447c0-5.523-4.477-10-10-10s-10 4.477-10 10 4.477 10 10 10 10-4.477 10-10z"> <animateTransform attributeName="transform" type="rotate" from="0 67 67" to="-360 67 67" dur="2.5s" repeatCount="indefinite"/> </path> <path d="M28.19 40.31c6.627 0 12-5.374 12-12 0-6.628-5.373-12-12-12-6.628 0-12 5.372-12 12 0 6.626 5.372 12 12 12zm30.72-19.825c4.686 4.687 12.284 4.687 16.97 0 4.686-4.686 4.686-12.284 0-16.97-4.686-4.687-12.284-4.687-16.97 0-4.687 4.686-4.687 12.284 0 16.97zm35.74 7.705c0 6.627 5.37 12 12 12 6.626 0 12-5.373 12-12 0-6.628-5.374-12-12-12-6.63 0-12 5.372-12 12zm19.822 30.72c-4.686 4.686-4.686 12.284 0 16.97 4.687 4.686 12.285 4.686 16.97 0 4.687-4.686 4.687-12.284 0-16.97-4.685-4.687-12.283-4.687-16.97 0zm-7.704 35.74c-6.627 0-12 5.37-12 12 0 6.626 5.373 12 12 12s12-5.374 12-12c0-6.63-5.373-12-12-12zm-30.72 19.822c-4.686-4.686-12.284-4.686-16.97 0-4.686 4.687-4.686 12.285 0 16.97 4.686 4.687 12.284 4.687 16.97 0 4.687-4.685 4.687-12.283 0-16.97zm-35.74-7.704c0-6.627-5.372-12-12-12-6.626 0-12 5.373-12 12s5.374 12 12 12c6.628 0 12-5.373 12-12zm-19.823-30.72c4.687-4.686 4.687-12.284 0-16.97-4.686-4.686-12.284-4.686-16.97 0-4.687 4.686-4.687 12.284 0 16.97 4.686 4.687 12.284 4.687 16.97 0z"> <animateTransform attributeName="transform" type="rotate" from="0 67 67" to="360 67 67" dur="8s" repeatCount="indefinite"/> </path></svg>';
		// } else {
	 //    	$loader = '<svg width="38" height="38" viewBox="0 0 38 38" xmlns="http://www.w3.org/2000/svg" stroke="'. $loader_color .'"> <g fill="none" fill-rule="evenodd"> <g transform="translate(1 1)" stroke-width="2"> <circle stroke-opacity=".5" cx="18" cy="18" r="18"/> <path d="M36 18c0-9.94-8.06-18-18-18"> <animateTransform attributeName="transform" type="rotate" from="0 18 18" to="360 18 18" dur="1s" repeatCount="indefinite"/> </path> </g> </g></svg>';
		// }
    	
    	echo '<!--  Site Loader -->';
        echo '<div id="preloader_1"></div>';
        echo '<!--  Site Loader finished -->';
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
		get_template_part( 'framework/templates/navigation/mobile', 'menu' );
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
		get_template_part( 'framework/templates/header/logo' );
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
		get_template_part( 'framework/templates/navigation/main', 'menu' );
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
		get_template_part( 'framework/templates/header/social', 'media' );
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
	    $to_top = codexin_get_option( 'cx_totop' );
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
		$copyright = codexin_get_option( 'cx_copyright' );

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
		get_template_part( 'framework/templates/post_formats/format', get_post_format() );
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
		$post_style     = codexin_get_option( 'cx_blog_style' );
		if( ( $post_style == 'grid') && ! is_single() || is_search() ) {
			return;
		}

		// Go to the post metas template partial
		get_template_part( 'framework/templates/general/post', 'metas' );
		
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
		$post_style     = codexin_get_option( 'cx_blog_style' );
		if( ( $post_style == 'list') || is_single() ) {
			return;
		}

		// Go to the post metas template partial
		get_template_part( 'framework/templates/general/post', 'metas' );
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
			get_template_part( 'framework/templates/general/post', 'footer' );
		}
	}
}


add_action( 'codexin_before_pagination', 'codexin_pagination_block', 10 );
if ( ! function_exists( 'codexin_pagination_block' ) ) {
	/**
	 * Rendering the HTML for pagination
	 *
	 * @since 	v1.0
	 */
	function codexin_pagination_block() {
	    if( is_singular() ) {
	    	return;
	    }

	    $post_style             = codexin_get_option( 'cx_blog_style' );
	    $posts_nav              = codexin_get_option( 'cx_pagination' );

        if( $posts_nav == 'numbered' ) {
            echo codexin_numbered_posts_nav();
        } else {
            codexin_posts_link();
        }        

	}
}


add_action( 'codexin_before_portfolio_pagination', 'codexin_portfolio_pagination_block', 10 );
if ( ! function_exists( 'codexin_portfolio_pagination_block' ) ) {
	/**
	 * Rendering the HTML for pagination
	 *
	 * @since 	v1.0
	 */
	function codexin_portfolio_pagination_block() {
	    if( is_singular('portfolio') ) {
	    	return;
	    }

		$portfolio_style           	= codexin_get_option( 'cx_portfolio_style' );
		$portfolio_nav		        = codexin_get_option( 'cx_portfolio_pagination' );

        if( $portfolio_nav == 'numbered' ) {
            echo codexin_numbered_posts_nav();
        } else {               
            codexin_posts_link( 'Newer Portfolios', 'Older Portfolios' );
        }
        
	}
}


add_action( 'codexin_before_events_pagination', 'codexin_portfolio_events_block', 10 );
if ( ! function_exists( 'codexin_portfolio_events_block' ) ) {
	/**
	 * Rendering the HTML for events pagination
	 *
	 * @since 	v1.0
	 */
	function codexin_portfolio_events_block() {
	    if( is_singular('events') ) {
	    	return;
	    }

		$events_style           = codexin_get_option( 'cx_events_style' );
		$events_nav		        = codexin_get_option( 'cx_events_pagination' );

	    
	    echo ( $events_style == 'grid' ) ? '<div class="col-xs-12">' : '' ;
	    
	    if( $events_nav == 'numbered' ) {
	        echo codexin_numbered_posts_nav();
	    } else {               
	        codexin_posts_link( 'Newer Events', 'Older Events' );
    }

	    echo ( $events_style == 'grid' ) ? '</div>' : '' ;

	}
}