(function($) {
    "use strict";

    /*--------------------------------------------------------------
    Navigation adjust for window width 
    ---------------------------------------------------------------- */



    $('.sub-menu').hover(function() {
        var menu = $(this);
        // var child_menu = $('.site-nav ul.sub-menu .sub-menu');
        var child_menu = $(this).find('ul');
        if( $(menu).offset().left + $(menu).width() + $(child_menu).width() > $(window).width() ){
            $(child_menu).css({"left": "inherit", "right": "100%"});
          } else {
            $(child_menu).css('left', '100%');
          }
        
    });

    

    $('.sub-menu').hover(
        function(e) {        
            var menu = $(this);
            // var child_menu = $('.site-nav ul.sub-menu .sub-menu');
            var child_menu = $(this).find('ul');
            if( $(menu).offset().left + $(menu).width() + $(child_menu).width() > $(window).width() ){
                
                $(child_menu).css({"left": "inherit", "right": "100%", "width": "100%"});
                $('.sub-menu .menu-item-has-children').addClass('icon-direction');    
                e.preventDefault();
            }
        },
        function(e) {
            $('.sub-menu .menu-item-has-children').removeClass('icon-direction');
        }
    );

    /*--------------------------------------------------------------
	Header full screen background image
    ---------------------------------------------------------------- */

    $(window).on("load resize", function() {
        $(".fill-screen").css("height", window.innerHeight);
    });


    /*--------------------------------------------------------------
	animating the numbers for counting up for the achievement section
    ---------------------------------------------------------------- */

    // $('.counter').counterUp({
    //     delay: 100,
    //     time: 3000
    // });

    /*--------------------------------------------------------------
	Closes the Responsive Menu on Menu Item Click
    ---------------------------------------------------------------- */

    $('.navbar-collapse ul li a').click(function() {
        $('.navbar-toggle:visible').click();
    });

    /*--------------------------------------------------------------
	accordian on events section
    ---------------------------------------------------------------- */

    $('.accordion-toggle').on('click', function() {
        $(this).closest('.panel-group').children().each(function() {
            $(this).find('>.panel-heading').removeClass('active');
        });

        $(this).closest('.panel-heading').toggleClass('active');
    });


    


    /*--------------------------------------------------------------
    scrollUp button (Go to top) at the right bottom corner of window
    ---------------------------------------------------------------- */

    $(window).on('scroll', function() {
        if ($(window).scrollTop() > 200) {
            $("#toTop").fadeIn();
        } else {
            $("#toTop").fadeOut();
        }
    });

    $("#toTop").on('click', function() {
        $("html,body").animate({
            scrollTop: 0
        }, 500)
    }); //scrollup finished


    /*--------------------------------------------------------------
    smooth scrolling
    ---------------------------------------------------------------- */

    $('.nav li a, .slider-btn, .explore').bind('click', function() {
        $('html, body').stop().animate({
            scrollTop: $($(this).attr('href')).offset().top - 90
        }, 1000, 'easeOutCubic');
        event.preventDefault();
    });



    /*--------------------------------------------------------------
	ScrollsPy
    ---------------------------------------------------------------- */
    $('body').scrollspy({
        target: '.navbar',
        offset: 150
    });

    //scrollspy finished



    /*--------------------------------------------------------------
	Activating parallex js
    ---------------------------------------------------------------- */

    $('.concept').parallax({ imageSrc: 'images/concept-bg.jpg' });


    /*--------------------------------------------------------------
    Dropdown select box styling with nice-select
    ---------------------------------------------------------------- */
    $('select').niceSelect();

    /*--------------------------------------------------------------
	Activating site loader
    ---------------------------------------------------------------- */

    // fadein effect of the loader
    // $(document).on("click", "a[rel!='nofollow']", function () {
    //     var newUrl = $(this).attr("href");
    //     if (!newUrl || newUrl[0] === "#") {
    //         return;
    //     }
    //     $("#preloader_1").fadeIn(function () {
    //         location = newUrl;
    //     });
    //     return false;
    // });
    
    // fadeout effect of the loader
    // jQuery(window).load(function() {
    //     jQuery(".loaders").delay(800).fadeOut("slow");
    // });


    $(window).on('beforeunload', function() { 
        $('#preloader_1').fadeIn('fast');
    });


    $(window).on('load', function() { 
        $('#preloader_1').delay(300).fadeOut('fast');
        $('body').addClass('overflow-fix');
    });


     /*--------------------------------------------------------------
         Activating Instagram Image Popup
        ---------------------------------------------------------------- */
    // $('.cx-image-link').magnificPopup({
    //     type: 'image',
    //     gallery: {
    //         enabled: true
    //     },
    //     image: {
    //         titleSrc: 'title',
    //     },
    //     mainClass: 'instagram-zoom', 
    //     fixedContentPos: false,
    //     fixedBgPos: true,
    //     overflowY: 'auto',
    //     zoom: {
    //         duration: 300, 
    //         easing: 'ease-in-out', 
    //         opener: function(openerElement) {
    //         return openerElement.is('img') ? openerElement : openerElement.find('img');
    //         }
    //     }

    // });

    $('.event-image-popup').magnificPopup({
        type: 'image',
        mainClass: 'mfp-with-zoom', // this class is for CSS animation below

        zoom: {
            enabled: true, // By default it's false, so don't forget to enable it

            duration: 300, 
            easing: 'ease-in-out',
        }
    });


    /*--------------------------------------------------------------
    commentform validate
    ---------------------------------------------------------------- */

    $('#commentform').validate({

        rules: {
            author: {
                required: true,
                minlength: 2
            },

            email: {
                required: true,
                email: true
            },

            comment: {
                required: true,
                minlength: 5
            }
        },

        messages: {
            author: "Please provide a valid name",
            email: "Please provide a valid email",
            comment: "Comments needs to be at least 5 characters"
        },

        errorElement: "div",
        errorPlacement: function(error, element) {
            element.after(error);
        }

    });


})(jQuery);



/*--------------------------------------------------------------
	Google Map Customization
    ---------------------------------------------------------------- */

(function(){

	var map;

	map = new GMaps({
		el: '#gmap',
		lat: reveal_lat,
		lng: reveal_long,
		scrollwheel:false,
		zoom: reveal_m_zoom,
		zoomControl : true,
		panControl : false,
		streetViewControl : false,
		mapTypeControl: true,
		overviewMapControl: false,
		clickable: false
	});

    // var image = 'images/map-marker.png';
	var image = reveal_marker;
	map.addMarker({
		lat: reveal_lat,
		lng: reveal_long,
		icon: image,
		animation: google.maps.Animation.DROP,
		verticalAlign: 'bottom',
		horizontalAlign: 'center',
		backgroundColor: '#3e8bff',
	});


	var styles = [ 

	{
		"featureType": "road",
		"stylers": [
		{ "color": "#b4b4b4" }
		]
	},{
		"featureType": "water",
		"stylers": [
		{ "color": "#d8d8d8" }
		]
	},{
		"featureType": "landscape",
		"stylers": [
		{ "color": "#f1f1f1" }
		]
	},{
		"elementType": "labels.text.fill",
		"stylers": [
		{ "color": "#000000" }
		]
	},{
		"featureType": "poi",
		"stylers": [
		{ "color": "#d9d9d9" }
		]
	},{
		"elementType": "labels.text",
		"stylers": [
		{ "saturation": 1 },
		{ "weight": 0.1 },
		{ "color": "#000000" }
		]
	}

	];

	map.addStyle({
		styledMapName:"Styled Map",
		styles: styles,
		mapTypeId: "map_style"  
	});

	map.setStyle("map_style");
}());



/*--------------------------------------------------------------
        For Responsive Navigation
--------------------------------------------------------------*/
    var slideLeft = new Menu({
        wrapper: '#o-wrapper',
        type: 'slide-left',
        menuOpenerClass: '.c-button',
        maskId: '#c-mask'
    });

    var slideLeftBtn = document.querySelector('#c-button--slide-left');

    slideLeftBtn.addEventListener('click', function(e) {
        e.preventDefault;
        slideLeft.open();
    });


