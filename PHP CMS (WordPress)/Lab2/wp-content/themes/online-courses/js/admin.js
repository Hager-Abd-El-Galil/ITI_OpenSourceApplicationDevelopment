jQuery(document).ready(function($) {
    "use strict";

    //FontAwesome Icon Control JS
    $('body').on('click', '.online-courses-icon-list li', function(){
        var icon_class = $(this).find('i').attr('class');
        $(this).addClass('icon-active').siblings().removeClass('icon-active');
        $(this).parent('.online-courses-icon-list').prev('.online-courses-selected-icon').children('i').attr('class','').addClass(icon_class);
        $(this).parent('.online-courses-icon-list').next('input').val(icon_class).trigger('change');
    });

    $('body').on('click', '.online-courses-selected-icon', function(){
        $(this).next().slideToggle();
    });

});
