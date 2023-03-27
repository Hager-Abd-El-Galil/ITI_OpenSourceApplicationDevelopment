(function($) {
$.fn.menumaker = function(options) {  
 var cssmenu = $(this), settings = $.extend({
   format: "dropdown",
   sticky: false
 }, options);
 return this.each(function() {
   $(this).find(".button").on('click', function(){
     $(this).toggleClass('menu-opened');
     var mainmenu = $(this).next('ul');
     if (mainmenu.hasClass('open')) { 
       mainmenu.slideToggle().removeClass('open');
     }
     else {
       mainmenu.slideToggle().addClass('open');
       if (settings.format === "dropdown") {
         mainmenu.find('ul').show();
       }
     }
   });
   cssmenu.find('li ul').parent().addClass('has-sub');
multiTg = function() {
     cssmenu.find(".has-sub").prepend('<span class="submenu-button"></span>');
     cssmenu.find('.submenu-button').on('click', function() {
       $(this).toggleClass('submenu-opened');
       if ($(this).siblings('ul').hasClass('open')) {
         $(this).siblings('ul').removeClass('open').slideToggle();
       }
       else {
         $(this).siblings('ul').addClass('open').slideToggle();
       }
     });
   };
   if (settings.format === 'multitoggle') multiTg();
   else cssmenu.addClass('dropdown');
   if (settings.sticky === true) cssmenu.css('position', 'fixed');
resizeFix = function() {
  var mediasize = 1000;
     if ($( window ).width() > mediasize) {
       cssmenu.find('ul').show();
     }
     if ($(window).width() <= mediasize) {
       cssmenu.find('ul').hide().removeClass('open');
     }
   };
   resizeFix();
   return $(window).on('resize', resizeFix);
 });
  };
})(jQuery);

(function($){
jQuery(document).ready(function(){
  jQuery("#cssmenu").menumaker({
     format: "multitoggle"
  });
  jQuery(window).scroll(function() {
    if (jQuery(this).scrollTop() >= 50) {        // If page is scrolled more than 50px
        jQuery('.scroll_top').fadeIn(200);    // Fade in the arrow
    } else {
        jQuery('.scroll_top').fadeOut(200);   // Else fade out the arrow
    }
  });
  jQuery('.scroll_top').click(function() {      // When arrow is clicked
      jQuery('body,html').animate({
          scrollTop : 0                       // Scroll to top of body
      }, 500);
  });
jQuery(document).ready(function() {
  jQuery("#test-slider").owlCarousel({
    nav : true, // Show next and prev buttons
    navText: [
      "<i class='fa fa-angle-left'></i>",
      "<i class='fa fa-angle-right'></i>"
    ],
    slideSpeed : 100,
    paginationSpeed : 400,
    loop : true,
    autoplay:true,
    autoplayTimeout:3000,
    autoplayHoverPause:true,
    items : 1,
    dots : false 
  });
});
});
jQuery( 'p:empty' ).remove();
jQuery(document).ready(function() {
  jQuery("#home-slider").owlCarousel({
    nav : true, // Show next and prev buttons
    navText: [
      "<i class='fa fa-angle-left'></i>",
      "<i class='fa fa-angle-right'></i>"
    ],
    slideSpeed : 600,
    paginationSpeed : 600,
    loop : true,
    items : 1,
    autoplay:true, 
    autoplayTimeout:6000,
    autoplayHoverPause:true,
    touchDrag: false,
    mouseDrag: false,
    animateOut: 'fadeOut',
    animateIn: 'fadeIn', 
    dots : true
  });
});
})(jQuery);
(function($){
jQuery(document).ready(function() {
  jQuery(".nav-tabs a").click(function() {
      jQuery(this).tab('show');
  });
  jQuery('.nav-tabs a').on('shown.bs.tab', function(event) {
      var x = jQuery(event.target).text(); // active tab
      var y = jQuery(event.relatedTarget).text(); // previous tab
      jQuery(".act span").text(x);
      jQuery(".prev span").text(y);
  });

  jQuery(window).scroll(function(){
  var sticky = jQuery('#main_header_bg'),
      scroll = jQuery(window).scrollTop();
  if (scroll >= 100) sticky.addClass('sticky');
  else sticky.removeClass('sticky');
  }); 
  jQuery(window).load(function() {
    jQuery(".preloader-block").delay(400).fadeOut(500),jQuery("#page_effect").delay(400).fadeIn(400);
  })  
});
})(jQuery);
 

