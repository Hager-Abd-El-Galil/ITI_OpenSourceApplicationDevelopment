/**
 * Theme functions file.
 *
 * Contains handlers for navigation.
 */

jQuery(function($){
 	"use strict";
   	jQuery('.main-menu-navigation > ul').superfish({
		delay:       500,
		animation:   {opacity:'show',height:'show'},
		speed:       'fast'
   	});

 	$( window ).scroll( function() {
		if ( $( this ).scrollTop() > 200 ) {
			$( '.back-to-top' ).addClass( 'show-back-to-top' );
		} else {
			$( '.back-to-top' ).removeClass( 'show-back-to-top' );
		}
	});

	// Click event to scroll to top.
	$( '.back-to-top' ).click( function() {
		$( 'html, body' ).animate( { scrollTop : 0 }, 500 );
		return false;
	});
});

function private_tutor_open() {
	jQuery(".sidenav").addClass('show');
}
function private_tutor_close() {
	jQuery(".sidenav").removeClass('show');
    jQuery( '.mobile-menu' ).focus();
}

function private_tutor_menuAccessibility() {
	var links, i, len,
	    private_tutor_menu = document.querySelector( '.nav-menu' ),
	    private_tutor_iconToggle = document.querySelector( '.nav-menu ul li:first-child a' );
    
	let private_tutor_focusableElements = 'button, a, input';
	let private_tutor_firstFocusableElement = private_tutor_iconToggle; // get first element to be focused inside menu
	let private_tutor_focusableContent = private_tutor_menu.querySelectorAll(private_tutor_focusableElements);
	let private_tutor_lastFocusableElement = private_tutor_focusableContent[private_tutor_focusableContent.length - 1]; // get last element to be focused inside menu

	if ( ! private_tutor_menu ) {
    	return false;
	}

	links = private_tutor_menu.getElementsByTagName( 'a' );

	// Each time a menu link is focused or blurred, toggle focus.
	for ( i = 0, len = links.length; i < len; i++ ) {
	    links[i].addEventListener( 'focus', toggleFocus, true );
	    links[i].addEventListener( 'blur', toggleFocus, true );
	}

	// Sets or removes the .focus class on an element.
	function toggleFocus() {
      	var self = this;

      	// Move up through the ancestors of the current link until we hit .mobile-menu.
      	while (-1 === self.className.indexOf( 'nav-menu' ) ) {
	      	// On li elements toggle the class .focus.
	      	if ( 'li' === self.tagName.toLowerCase() ) {
	          	if ( -1 !== self.className.indexOf( 'focus' ) ) {
	          		self.className = self.className.replace( ' focus', '' );
	          	} else {
	          		self.className += ' focus';
	          	}
	      	}
	      	self = self.parentElement;
      	}
	}
    
	// Trap focus inside modal to make it ADA compliant
	document.addEventListener('keydown', function (e) {
	    let isTabPressed = e.key === 'Tab' || e.keyCode === 9;

	    if ( ! isTabPressed ) {
	    	return;
	    }

	    if ( e.shiftKey ) { // if shift key pressed for shift + tab combination
	      	if (document.activeElement === private_tutor_firstFocusableElement) {
		        private_tutor_lastFocusableElement.focus(); // add focus for the last focusable element
		        e.preventDefault();
	      	}
	    } else { // if tab key is pressed
	    	if (document.activeElement === private_tutor_lastFocusableElement) { // if focused has reached to last focusable element then focus first focusable element after pressing tab
		      	private_tutor_firstFocusableElement.focus(); // add focus for the first focusable element
		      	e.preventDefault();
	    	}
	    }
	});   
}

jQuery(function($){
	$('.mobile-menu').click(function () {
	    private_tutor_menuAccessibility();
  	});
  	$('.search-toggle').click(function () {
	    private_tutor_trapFocus($('.search-outer'));
  	});
});

function private_tutor_search_open() {
	jQuery(".search-outer").addClass('show');
}
function private_tutor_search_close() {
	jQuery(".search-outer").removeClass('show');
}

function private_tutor_trapFocus(elem) {

    var private_tutor_tabbable = elem.find('select, input, textarea, button, a').filter(':visible');

    var private_tutor_firstTabbable = private_tutor_tabbable.first();
    var private_tutor_lastTabbable = private_tutor_tabbable.last();
    /*set focus on first input*/
    private_tutor_firstTabbable.focus();

    /*redirect last tab to first input*/
    private_tutor_lastTabbable.on('keydown', function (e) {
        if ((e.which === 9 && !e.shiftKey)) {
            e.preventDefault();
            private_tutor_firstTabbable.focus();
        }
    });

    /*redirect first shift+tab to last input*/
    private_tutor_firstTabbable.on('keydown', function (e) {
        if ((e.which === 9 && e.shiftKey)) {
            e.preventDefault();
            private_tutor_lastTabbable.focus();
        }
    });

    /* allow escape key to close insiders div */
    elem.on('keyup', function (e) {
        if (e.keyCode === 27) {
            elem.hide();
        }
        ;
    });
};