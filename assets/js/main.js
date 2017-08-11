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
	Closes the Responsive Menu on Menu Item Click
    ---------------------------------------------------------------- */

    $('.navbar-collapse ul li a').click(function() {
        $('.navbar-toggle:visible').click();
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

    $(window).on('load', function() { 
        $('#preloader_1').delay(300).fadeOut('fast');
        $('body').addClass('overflow-fix');
    });

    
    /*--------------------------------------------------------------
        Activating Events Page Image Popup
    ---------------------------------------------------------------- */
    $(window).load(function() {
        $('.event-image-popup').magnificPopup({
            type: 'image',
            mainClass: 'mfp-with-zoom', 
            fixedContentPos: false,
            zoom: {
                enabled: true,
                duration: 300, 
                easing: 'ease-in-out',
            }
        });
    });

    /*--------------------------------------------------------------
    Activating single blog Magnific Pop Up
    ---------------------------------------------------------------- */    
    
    $('.img-pop-up').magnificPopup({
        type: 'image',
        mainClass: 'mfp-with-zoom', 
        fixedContentPos: true,
        fixedBgPos: true,   
        zoom: {
            enabled: true,
            duration: 300, 
            easing: 'ease-in-out',
            opener: function(openerElement) {
                return openerElement.is('a') ? openerElement : openerElement.find('a');
            }
        },
        callbacks: {
            open: function() {
                jQuery('body').addClass('noscroll');
                
            },
            close: function() {
                jQuery('body').removeClass('noscroll');                
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


