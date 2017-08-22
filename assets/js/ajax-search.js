(function($) {

    'use strict';

    $(document).ready(function() {

    	$('.ajax-results').hide();
    	$('.clearable').hide();

		$('.clearable').click(function() {
			$('.ajax-search').val('');
		  	$('.ajax-results').hide();
		  	$('.clearable').hide();
		});

        function dosearch(t) {

        	var loader = '<div class="loader">Loading...</div>';

            $.ajax({

                type: 'post',
                url: reveal_search_params.ajaxurl,
                data: {
                    action: 'reveal_ajax_search',
                    search: t
                },

				beforeSend:function(){
					$('.ajax-search + input').after(loader);
				},	

                success: function(result) {
					$('div.loader').remove();
					$('.clearable').show();
                    if (result === 'error') {
                        $('.ajax-results').show().html('No results');
                    } else {
                        $('.ajax-results').show().html(result);
                    }
                }
            });
        }

        var thread = null;

        $('.ajax-search').keyup(function() {

            clearTimeout(thread);
            var $this = $(this);
            thread = setTimeout(
                function() {
                    dosearch($this.val())
                },
                500
            );
        });

    });

})(jQuery);