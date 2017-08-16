(function($) {
    "use strict";

    /************************************************************
        Activating Superfish Menu
    *************************************************************/

        // activating superfish menu
    $(".sf-menu").superfish({

        delay:       0,                            // one second delay on mouseout
        animation:   {opacity:'show',height:'show'},  // fade-in and slide-down animation
        speed:       'fast',                          // faster animation speed
        autoArrows:  false  

    });


    /************************************************************
        removing empty paragraph from sidebar widget
    *************************************************************/

    $('.sidebar-widget p:empty').remove();

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
    Targeting Portfolio a tag for click event
    ---------------------------------------------------------------- */

    $(".portfolio-title").click(function (e) {
        $(this).find("a.clickable").first().click();
    });

    $(".portfolio-title a.clickable").click(function (e) {
        e.stopPropagation();
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


    /*--------------------------------------------------------------
    Activating Slick Carousel in Image Gallery
    ---------------------------------------------------------------- */

     $(".gallery-carousel").slick({
          infinite: true,
          speed: 500,
          fade: true,
          cssEase: 'linear',
          'arrows': true,
          'prevArrow': '<span class="alignleft"><i class="fa fa-angle-left"></i></span>',
          'nextArrow': '<span class="alignright"><i class="fa fa-angle-right"></i></span>',
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


