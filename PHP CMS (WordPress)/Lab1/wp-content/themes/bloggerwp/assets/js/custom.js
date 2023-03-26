/* Theme Scripts */

var $ = jQuery.noConflict();

// onscroll  search box close js
$(window).on('scroll', function (e) {
    $(".search-field-form").removeClass('form-active');
});

$(document).on('click', '.mobile-menu-close', function(){
    $('.navbar-collapse').removeClass('show');
});

 /* Back to top Button */
  
   jQuery(function(){

    //Scroll event
    jQuery(window).scroll(function(){
      var scrolled = jQuery(window).scrollTop();
      if (scrolled > 200) jQuery('.go-top').fadeIn('slow');
      if (scrolled < 200) jQuery('.go-top').fadeOut('slow');
    });
    
    //Click event
    jQuery('.go-top').click(function () {
      jQuery("html, body").animate({ scrollTop: "0" },  500);
    });
  
  });

// add all the elements inside menu which you want to make focusable
if (jQuery(window).width() <= 1199){
	const  focusableElements =
		'button, [href], input, select, textarea, [tabindex]:not([tabindex="-1"])';
	const bloggerwp_modal = document.querySelector('.bloggerwp_nav');

	const firstFocusableElement = bloggerwp_modal.querySelectorAll(focusableElements)[0]; 
	const focusableContent = bloggerwp_modal.querySelectorAll(focusableElements);
	const lastFocusableElement = focusableContent[focusableContent.length - 1]; 


	document.addEventListener('keydown', function(e) {
	  let isTabPressed = e.key === 'Tab' || e.keyCode === 9;

	  if (!isTabPressed) {
		return;
	  }

	  if (e.shiftKey) { 
		if (document.activeElement === firstFocusableElement) {
		  lastFocusableElement.focus(); 
		  e.preventDefault();
		}
	  } else { 
		if (document.activeElement === lastFocusableElement) { 
		  firstFocusableElement.focus(); 
		  e.preventDefault();
		}
	  }
	});

	firstFocusableElement.focus();  
}