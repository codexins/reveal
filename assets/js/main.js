(function($) {
    "use strict";

    /*--------------------------------------------------------------
    Navigation adjust for window width 
    ---------------------------------------------------------------- */

    // $(window).on('scroll', function() {
    //     // var heightmenu = $("#header").outerheight();
    //     if ($(window).scrollTop() >= 150 ) {
    //         $(".spacer").css('display', 'block');
    //     }  
    //     // aleart($("#header").outerheight());
    //     if($(window).scrollTop() <= $("#header").outerheight() ){
    //         $(".spacer").css('display', 'none');;

    //     }

    // });

    // $("#header").headroom();




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

    // if ($('nav').hasClass('affix-top')) {
    //     $('.spacer.height-72').css('display', 'block');
       
    // }

    // if($(window).scrollTop()) > 150 {
    //     $('.spacer.height-72').css('display', 'block');
    // }


// $(window).scroll(function(){console.log($(window).scrollTop());
//     if($(window).scrollTop() > 150 )
//     {
//         $('.spacer.height-72').css('display', 'block');
//     }
// });
    
    

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
    client carouel
    ---------------------------------------------------------------- */

    $("#client-carousel").owlCarousel({

        autoPlay: 3000, //Set AutoPlay to 3 seconds
        navigation: false,
        pagination: false,
        items: 6,
        itemsDesktop: [1199, 6],
        itemsDesktopSmall: [991, 5],
        itemsTablet: [767, 5],
        itemsTabletSmall: [599, 4],
        itemsMobile: [420, 3]

    });




    /*--------------------------------------------------------------
	Isotope Js for Portfolio Section
    ---------------------------------------------------------------- */

    // cache container
    var $isocontainer = $('.portfolio-wrapper');

    // initialize isotope

    $isocontainer.imagesLoaded(function() {
        $isocontainer.isotope({
            filter: "*",
            animationOptions: {
                duration: 750,
                easing: 'linear',
                queue: false
            }
        });
    });

    $(".portfolio-filter ul li").click(function() {
        $(".portfolio-filter ul li").removeClass("active");
        $(this).addClass("active");

        var selector = $(this).attr('data-filter');
        $isocontainer.isotope({
            filter: selector,
            animationOptions: {
                duration: 750,
                easing: 'linear',
                queue: false,
            },
            isResizeBound: true
        });
        return false;
    }); //isotope finished

    /*--------------------------------------------------------------
	Activating Magnific Pop Up
    ---------------------------------------------------------------- */

    $('.img-pop-up').magnificPopup({
        type: 'image',
        gallery: {
            enabled: true
        },

        fixedContentPos: false,
        fixedBgPos: true,

        overflowY: 'auto',

        closeBtnInside: true,
        preloader: false,

        midClick: true,
        removalDelay: 300,
        mainClass: 'mfp-fade'

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
	Activating site loader
    ---------------------------------------------------------------- */
    
    jQuery(window).load(function() {

        // jQuery(".spinner").delay(400).fadeOut("slow");
        // jQuery(".title-load").delay(400).fadeOut("slow");
 
        jQuery(".loaders").delay(800).fadeOut("slow");


    });

    /*--------------------------------------------------------------
    Activating loader effect option
    ---------------------------------------------------------------- */
    jQuery(window).load(function(){
       $('a').addClass('animsition-link');
    });
    
    $(".animsition").animsition({
        inClass: 'fade-in',
        outClass: 'fade-out',
        inDuration: 1200,
        outDuration: 1200,
        linkElement: '.animsition-link',
        // e.g. linkElement: 'a:not([target="_blank"]):not([href^="#"])'
        loading: true,
        loadingParentElement: 'html', //animsition wrapper element
        loadingClass: 'loaders',
        loadingInner: '', // e.g '<img src="loading.svg" />'
        timeout: false,
        timeoutCountdown: 5000,
        onLoadEvent: true,
        browser: [ 'animation-duration', '-webkit-animation-duration'],
        // "browser" option allows you to disable the "animsition" in case the css property in the array is not supported by your browser.
        // The default setting is to disable the "animsition" in a browser that does not support "animation-duration".
        transition: function(url){ window.location.href = url; }
    });

    /*--------------------------------------------------------------
    Activating Instagram Image Popup
    ---------------------------------------------------------------- */
    $('.cx-image-link').magnificPopup({
        type: 'image',
        gallery: {
            enabled: true
        },
        image: {
            titleSrc: 'title',
        },
        mainClass: 'instagram-zoom', 
        fixedContentPos: false,
        fixedBgPos: true,
        overflowY: 'auto',
        zoom: {
            duration: 300, 
            easing: 'ease-in-out', 
            opener: function(openerElement) {
            return openerElement.is('img') ? openerElement : openerElement.find('img');
            }
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

// (function(){

// 	var map;

// 	map = new GMaps({
// 		el: '#gmap',
// 		lat: 23.761947,
// 		lng: 90.435557,
// 		scrollwheel:false,
// 		zoom: 14,
// 		zoomControl : true,
// 		panControl : false,
// 		streetViewControl : false,
// 		mapTypeControl: true,
// 		overviewMapControl: false,
// 		clickable: false
// 	});

// 	var image = 'images/map-marker.png';
// 	map.addMarker({
// 		lat: 23.761947,
// 		lng: 90.435557,
// 		icon: image,
// 		animation: google.maps.Animation.DROP,
// 		verticalAlign: 'bottom',
// 		horizontalAlign: 'center',
// 		backgroundColor: '#3e8bff',
// 	});


// 	var styles = [ 

// 	{
// 		"featureType": "road",
// 		"stylers": [
// 		{ "color": "#b4b4b4" }
// 		]
// 	},{
// 		"featureType": "water",
// 		"stylers": [
// 		{ "color": "#d8d8d8" }
// 		]
// 	},{
// 		"featureType": "landscape",
// 		"stylers": [
// 		{ "color": "#f1f1f1" }
// 		]
// 	},{
// 		"elementType": "labels.text.fill",
// 		"stylers": [
// 		{ "color": "#000000" }
// 		]
// 	},{
// 		"featureType": "poi",
// 		"stylers": [
// 		{ "color": "#d9d9d9" }
// 		]
// 	},{
// 		"elementType": "labels.text",
// 		"stylers": [
// 		{ "saturation": 1 },
// 		{ "weight": 0.1 },
// 		{ "color": "#000000" }
// 		]
// 	}

// 	];

// 	map.addStyle({
// 		styledMapName:"Styled Map",
// 		styles: styles,
// 		mapTypeId: "map_style"  
// 	});

// 	map.setStyle("map_style");
// }());



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


