(function($) {
    "use strict";

    /************************************************************
        Activating Superfish Menu
    *************************************************************/

        // activating superfish menu
    $(".sf-menu").superfish({

        delay:       0,                            // one second delay on mouseout
        //animation:   {opacity:'show',height:'show'},  // fade-in and slide-down animation
        animation: {opacity: 'show', height: 'show'},
        animationOut: {opacity: 'hide'},
        speed:       'fast',                          // faster animation speed
        autoArrows:  false,
        disableHI: true, 

    });

    $('.sub-menu').hover(function() {
        var menu = $(this);
        // var child_menu = $('.site-nav ul.sub-menu .sub-menu');
        var child_menu = $(this).find('ul');
        if( $(menu).offset().left + $(menu).width() + $(child_menu).width() > $(window).width() ){
            $(child_menu).css({"left": "inherit", "right": "100%"});
           }        
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

    if (reveal_main_params.trans_loader == true) {
        var ignore_onbeforeunload = false;

        $("a[href^=mailto], a[href^=tel]").on("click",function(){
            ignore_onbeforeunload = true;
        });

        $(window).on("beforeunload", function() { 
            if (!ignore_onbeforeunload){
                $("#preloader_1").fadeIn("fast");
            }
            ignore_onbeforeunload = false;
        });

        $(window).on('load', function() { 
            $('#preloader_1').delay(300).fadeOut('fast');
            $('body').addClass('overflow-fix');
        });
    }
    
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
        autoplay: true,
        autoplaySpeed: 2000,
        'arrows': true,
        'prevArrow': '<span class="alignleft"><i class="fa fa-angle-left"></i></span>',
        'nextArrow': '<span class="alignright"><i class="fa fa-angle-right"></i></span>',
    });


    /*--------------------------------------------------------------
    For Responsive Navigation
    --------------------------------------------------------------*/
    var resnav = reveal_main_params.res_nav;

    if (resnav == 'left') {
        /**
        * Slide left instantiation and action.
        */
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
    } else if(resnav == 'right') {
        /**
        * Slide right instantiation and action.
        */
        var slideRight = new Menu({
            wrapper: '#o-wrapper',
            type: 'slide-right',
            menuOpenerClass: '.c-button',
            maskId: '#c-mask'
        });

        var slideRightBtn = document.querySelector('#c-button--slide-right');

        slideRightBtn.addEventListener('click', function(e) {
            e.preventDefault;
            slideRight.open();
        });
    }
      

})(jQuery);




