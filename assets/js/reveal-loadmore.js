jQuery(function($){
    "use strict";
	$('.reveal-load-more').click(function(){
		$('article').addClass('no-slideup');
 		var delay = 1000;
		var button = $(this),
		    data = {
			'action': 'loadmore',
			'query': reveal_loadmore_params.posts, // that's how we get params from wp_localize_script() function
			'page' : reveal_loadmore_params.current_page
		};
		var $opts = {
	        infinite: true,
	        speed: 500,
	        fade: true,
	        autoplay: true,
	        autoplaySpeed: 2000,
	        cssEase: 'linear',
	        'arrows': true,
	        'prevArrow': '<span class="alignleft"><i class="fa fa-angle-left"></i></span>',
	        'nextArrow': '<span class="alignright"><i class="fa fa-angle-right"></i></span>',
		}

		$.ajax({
			url : reveal_loadmore_params.ajaxurl, // AJAX handler
			data : data,
			type : 'POST',
			beforeSend : function ( xhr ) {
				button.text('Loading...').html('&nbsp;<div class="loader">Loading...</div>'); // change the button text, you can also add a preloader image
			},
			success : function( data ){
				if( data ) {
					setTimeout(function(){
						button.text( reveal_loadmore_params.load_more_text ).prev().before(data); // insert new posts
						$('article:not(.no-slideup)').addClass('slideup');
						reveal_loadmore_params.current_page++;
						initPhotoSwipeFromDOM('.image-pop-up');
						$('.gallery-carousel').not('.slick-initialized').slick($opts);
	 
						if ( reveal_loadmore_params.current_page == reveal_loadmore_params.max_page ) 
							button.remove(); // if last page, remove the button
					}, delay);
				} else {
					button.remove(); // if no data, remove the button as well
				}
			}
		});
	});
});