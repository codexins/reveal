jQuery(function($){
    "use strict";
	var canBeLoaded = true, // this param allows to initiate the AJAX call only if necessary
	    bottomOffset = 2000, // the distance (in px) from the page bottom when you want to load more posts
 		button = $('.reveal-load-more');
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
	var delay = 1200;
	$(window).scroll(function(){
		$('article').addClass('no-slideup');
		var data = {
			'action': 'loadmore',
			'query': reveal_loadmore_params.posts,
			'page' : reveal_loadmore_params.current_page
		};
		if( $(document).scrollTop() > ( $(document).height() - bottomOffset ) && canBeLoaded == true ){
			$.ajax({
				url : reveal_loadmore_params.ajaxurl,
				data:data,
				type:'POST',
				beforeSend: function( xhr ){
					button.text('Loading...').html('&nbsp;<div class="loader">Loading...</div>');
					canBeLoaded = false; 
				},
				success:function(data){
					if( data ) {
						setTimeout(function(){
							$('#primary').find('article:last-of-type').after( data ); // where to insert posts
							$('article:not(.no-slideup)').addClass('slideup');
							canBeLoaded = true; // the ajax is completed, now we can run it again
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
		}
	});
});