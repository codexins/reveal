jQuery(function($){
	var canBeLoaded = true, // this param allows to initiate the AJAX call only if necessary
	    bottomOffset = 2000, // the distance (in px) from the page bottom when you want to load more posts
 		button = $('.reveal-load-more');
	$(window).scroll(function(){
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
					// you can also add your own preloader here
					// you see, the AJAX call is in process, we shouldn't run it again until complete
					button.text('Loading...')
					canBeLoaded = false; 
				},
				success:function(data){
					if( data ) {
						$('#primary').find('article:last-of-type').after( data ); // where to insert posts
						canBeLoaded = true; // the ajax is completed, now we can run it again
						reveal_loadmore_params.current_page++;
						if ( reveal_loadmore_params.current_page == reveal_loadmore_params.max_page ) 
							button.remove(); // if last page, remove the button
					} else {
					button.remove(); // if no data, remove the button as well
					}
				}
			});
		}
	});
});