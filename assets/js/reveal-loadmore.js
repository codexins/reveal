jQuery(function($){
	$('.reveal-load-more').click(function(){
 
		var button = $(this),
		    data = {
			'action': 'loadmore',
			'query': reveal_loadmore_params.posts, // that's how we get params from wp_localize_script() function
			'page' : reveal_loadmore_params.current_page
		};
 
		$.ajax({
			url : reveal_loadmore_params.ajaxurl, // AJAX handler
			data : data,
			type : 'POST',
			beforeSend : function ( xhr ) {
				button.text('Loading...'); // change the button text, you can also add a preloader image
			},
			success : function( data ){
				if( data ) { 
					button.text( reveal_loadmore_params.load_more_text ).prev().after(data); // insert new posts
					reveal_loadmore_params.current_page++;
 
					if ( reveal_loadmore_params.current_page == reveal_loadmore_params.max_page ) 
						button.remove(); // if last page, remove the button
				} else {
					button.remove(); // if no data, remove the button as well
				}
			}
		});
	});
});