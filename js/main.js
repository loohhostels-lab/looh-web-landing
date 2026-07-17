/*  ---------------------------------------------------
    Template Name: Sona
    Description: Sona Hotel Html Template
    Author: Colorlib
    Author URI: https://colorlib.com
    Version: 1.0
    Created: Colorlib
---------------------------------------------------------  */

'use strict';

(function ($) {

    /*------------------
        Preloader
    --------------------*/
    function removePreloader() {
        $(".loader").fadeOut();
        $("#preloder").delay(200).fadeOut("slow");
        
        var preloader = $("#preloader");
        if (preloader.length && !preloader.hasClass("hide")) {
            preloader.addClass("hide");
        }
    }

    $(window).on('load', function () {
        removePreloader();
    });

    // Failsafe: if window load already fired or document is interactive, dismiss immediately
    if (document.readyState === "complete" || document.readyState === "interactive") {
        removePreloader();
    }

    // Failsafe timeout to prevent stuck preloader if resources hang
    setTimeout(removePreloader, 1500);

    /*------------------
        Background Set
    --------------------*/
    $('.set-bg').each(function () {
        var bg = $(this).data('setbg');
        $(this).css('background-image', 'url(' + bg + ')');
    });

    //Offcanvas Menu
    $(".canvas-open").on('click', function () {
        $(".offcanvas-menu-wrapper").addClass("show-offcanvas-menu-wrapper");
        $(".offcanvas-menu-overlay").addClass("active");
    });

    $(".canvas-close, .offcanvas-menu-overlay").on('click', function () {
        $(".offcanvas-menu-wrapper").removeClass("show-offcanvas-menu-wrapper");
        $(".offcanvas-menu-overlay").removeClass("active");
    });

    // Search model
    $('.search-switch').on('click', function () {
        $('.search-model').fadeIn(400);
    });

    $('.search-close-switch').on('click', function () {
        $('.search-model').fadeOut(400, function () {
            $('#search-input').val('');
        });
    });

    /*------------------
		Navigation
	--------------------*/
    $(".mobile-menu").slicknav({
        prependTo: '#mobile-menu-wrap',
        allowParentLinks: true
    });

    /*------------------
        Hero Slider
    --------------------*/
   $(".hero-slider").owlCarousel({
        loop: true,
        margin: 0,
        items: 1,
        dots: true,
        animateOut: 'fadeOut',
        animateIn: 'fadeIn',
        smartSpeed: 1200,
        autoHeight: false,
        autoplay: true,
        mouseDrag: false
    });

    /*------------------------
		Testimonial Slider
    ----------------------- */
    $(".testimonial-slider").owlCarousel({
        items: 1,
        dots: false,
        autoplay: true,
        loop: true,
        smartSpeed: 1200,
        nav: true,
        navText: ["<i class='arrow_left'></i>", "<i class='arrow_right'></i>"]
    });

    /*------------------
        Magnific Popup
    --------------------*/
    $('.video-popup').magnificPopup({
        type: 'iframe'
    });

    /*------------------
		Date Picker
	--------------------*/
    $(".date-input").datepicker({
        minDate: 0,
        dateFormat: 'dd MM, yy'
    });

    /*------------------
		Nice Select
	--------------------*/
    $("select").niceSelect();

    /*------------------
        Link Guard (Option B)
    --------------------*/
    document.addEventListener('click', function (e) {
        var link = e.target.closest('a');
        if (!link) return;

        // Skip anchor/hash links, tel/mailto links, and javascript actions
        var href = link.getAttribute('href');
        if (!href || href.startsWith('#') || href.startsWith('javascript:') || href.startsWith('mailto:') || href.startsWith('tel:')) {
            return;
        }

        try {
            var url = new URL(link.href, window.location.origin);
            
            // Only check internal link targets
            if (url.origin === window.location.origin) {
                // Determine base directory path dynamically
                var pathParts = window.location.pathname.split('/');
                pathParts.pop();
                var basePath = pathParts.join('/') + '/';

                var path = url.pathname;
                // Normalize path to be relative to the basePath
                if (path.startsWith(basePath)) {
                    path = '/' + path.substring(basePath.length);
                }
                
                // Allow blog (WordPress) and asset directories
                if (url.pathname.startsWith('/blog') || path.startsWith('/css/') || path.startsWith('/js/') || path.startsWith('/img/') || path.startsWith('/fonts/')) {
                    return;
                }

                // Standardize path comparison
                var cleanPath = path;
                if (cleanPath.length > 1 && cleanPath.endsWith('/')) {
                    cleanPath = cleanPath.slice(0, -1);
                }
                if (cleanPath === '/' || cleanPath === '') {
                    cleanPath = '/index.html';
                }

                // List of all valid pages in the static site
                var validPages = [
                    '/index.html',
                    '/hostel-in-patna.html',
                    '/girls-hostel-in-patna.html',
                    '/hostel-in-boring-road.html',
                    '/hostel-in-kankarbagh.html',
                    '/hostel-in-rajendra-nagar.html',
                    '/hostel-in-danapur.html',
                    '/hostel-in-muzaffarpur.html',
                    '/hostel-in-gaya.html',
                    '/contact.html',
                    '/about-us.html',
                    '/404.html',
                ];

                // If target looks like a page and isn't in validPages, route to 404
                var isHtmlOrNoExtension = path.endsWith('.html') || !path.includes('.');
                if (isHtmlOrNoExtension && !validPages.includes(cleanPath)) {
                    e.preventDefault();
                    window.location.href = basePath + '404.html';
                }
            }
        } catch (err) {
            // Safe fallback
        }
    });
    /*------------------
        Form Validation
    --------------------*/
    var submitBtn = $('.form-submit');
    var requiredInputs = $('#name, #phone, #email');

    function checkFormValidity() {
        var allFilled = true;
        requiredInputs.each(function() {
            if ($(this).val().trim() === '') {
                allFilled = false;
            }
        });
        if (allFilled) {
            submitBtn.removeAttr('disabled');
        } else {
            submitBtn.attr('disabled', 'disabled');
        }
    }

    if (requiredInputs.length && submitBtn.length) {
        checkFormValidity();
        requiredInputs.on('input change keyup paste', checkFormValidity);
    }

})(jQuery);