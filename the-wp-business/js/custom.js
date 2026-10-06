// NAVIGATION CALLBACK
jQuery(function($){
	"use strict";
	jQuery('.main-menu-navigation > ul').superfish({
		delay:       500,
		animation:   {opacity:'show',height:'show'},  
		speed:       'fast'
	});
});

jQuery(function($){
	$( '.toggle-menu button' ).click( function(e){
        $( 'body' ).toggleClass( 'show-main-menu' );
        var element = $( '.side-nav' );
        the_wp_business_trapFocus( element );
    });

    $( '.closebtn' ).click( function(e){
        $( '.toggle-menu button' ).click();
        $( '.toggle-menu button' ).focus();
    });
    $( document ).on( 'keyup',function(evt) {
        if ( $( 'body' ).hasClass( 'show-main-menu' ) && evt.keyCode == 27 ) {
            $( '.toggle-menu button' ).click();
            $( '.toggle-menu button' ).focus();
        }
    });
    
	$(window).scroll(function(){
	    if ($(window).scrollTop() >= 100) {
	        $('.toggle-menu').addClass('sticky');
	        $('.stick').fadeIn(100);
	    }
	    else {
	        $('.toggle-menu').removeClass('sticky');
	    }
	});

	$(window).scroll(function(){
	    var sticky = $('.sticky-header'),
	    scroll = $(window).scrollTop();

		if (scroll >= 100) sticky.addClass('fixed-header');
		else sticky.removeClass('fixed-header');
	});

	setTimeout(function(){
		$(".tg-loader").delay(2000).fadeOut("slow");
	    $("#overlayer").delay(2000).fadeOut("slow");
	});

	setTimeout(function(){
		$(".preloader").delay(2000).fadeOut("slow");
	    $(".preloader .preloader-container").delay(2000).fadeOut("slow");
	});

	// back to top.
	$( window ).scroll( function() {
		if ( $( this ).scrollTop() > 200 ) {
			$( '.back-to-top' ).addClass( 'show-back-to-top' );
		} else {
			$( '.back-to-top' ).removeClass( 'show-back-to-top' );
		}
	});

	$( '.back-to-top' ).click( function() {
		$( 'html, body' ).animate( { scrollTop : 0 }, 200 );
		return false;
	});
});

/* Custom Cursor
 **-----------------------------------------------------*/
// Add this in custom-cursor.js
	jQuery(document).ready(function($) {
	var cursor = $(".custom-cursor");
	var follower = $(".custom-cursor-follower");
	var offsetX = 15; // Set your desired horizontal offset
	var offsetY = 15; // Set your desired vertical offset

	$(document).mousemove(function(e) {
		cursor.css({
		top: e.clientY - offsetY + "px",
		left: e.clientX - offsetX + "px"
		});
		follower.css({
		top: e.clientY + "px",
		left: e.clientX + "px"
		});
	});

	$("a, button").hover(
		function() {
		cursor.addClass("active");
		follower.addClass("active");
		},
		function() {
		cursor.removeClass("active");
		follower.removeClass("active");
		}
	);
});


function the_wp_business_trapFocus( element, namespace ) {
    var the_wp_business_focusableEls = element.find( 'a, button' );
    var the_wp_business_firstFocusableEl = the_wp_business_focusableEls[0];
    var the_wp_business_lastFocusableEl = the_wp_business_focusableEls[the_wp_business_focusableEls.length - 1];
    var KEYCODE_TAB = 9;

    the_wp_business_firstFocusableEl.focus();

    element.keydown( function(e) {
        var isTabPressed = ( e.key === 'Tab' || e.keyCode === KEYCODE_TAB );

        if ( !isTabPressed ) { 
            return;
        }

        if ( e.shiftKey ) /* shift + tab */ {
            if ( document.activeElement === the_wp_business_firstFocusableEl ) {
                the_wp_business_lastFocusableEl.focus();
                e.preventDefault();
            }
        } else /* tab */ {
            if ( document.activeElement === the_wp_business_lastFocusableEl ) {
                the_wp_business_firstFocusableEl.focus();
                e.preventDefault();
            }
        }

    });
}

/*sticky copyright*/
	jQuery(window).on('scroll', function() {
	var $sticky = jQuery('.copyright-sticky');
	if ($sticky.length === 0) return;

	var scrollTop = jQuery(window).scrollTop();
	var windowHeight = jQuery(window).height();
	var documentHeight = jQuery(document).height();

	var isBottom = scrollTop + windowHeight >= documentHeight - 100;

	if (scrollTop >= 100 && !isBottom) {
		$sticky.addClass('copyright-fixed');
	} else {
		$sticky.removeClass('copyright-fixed');
	}
	});