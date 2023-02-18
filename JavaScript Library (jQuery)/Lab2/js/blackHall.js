/*---------Styles---------*/
$(".website-container").css({
                            "width":"100%",
                            "display":"flex",
                            "justify-content":"space-evenly"
});

$(".img-container").css({"margin-top":"20%"});
$("img").css({
              "width":"130px",
              "height":"160px",
});

$(".blackHall-container").css({"margin-top":"5%"});
$(".blackHall").css({
                     "width":"270px",
                     "height":"270px",
                     "background-color":"black",
                     "border-radius":"50%",
});
$("p").css({  
            "color":"white",
            "text-align":"center",
            "padding":"10%",
            "font-size":"x-large",
            "font-family":"courier"
}); 

/*----------Functions----------*/
$("img").on('mouseover',function(){
    $(this).css({"cursor":"pointer"}); 
});
$("img").on('click',function(){
    $(this).effect( "shake","slow");  
});
$( "img" ).draggable({
    scope: 'blackBox',
    revertDuration: 100,
    start: function( event, ui ) {
        $( "img" ).draggable( "option", "revert", true ); //Reset
    }
});

$( ".blackHall" ).droppable({
    scope: 'blackBox',
    drop: function( event, ui ) {
      $("img").fadeOut();  
    }
  });