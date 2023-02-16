$(function(){ 

  var stop = false;
  var toggleButton = $("#toggle"); 

  //Start automatic image slider
  var startSlider = setInterval(imageSlider, 1500);
  //stop and continue automatic image slider
  toggleButton.on('click',stopSlider);

  function imageSlider() {
    var active = $(".active");
    var next = $(".active").next().length > 0 ? $(".active").next() : $(".slider-container div:first");
    active.removeClass("active");
    next.addClass("active");
  }
    
  function stopSlider(){
    if(stop == false){
      clearInterval(startSlider);
      toggleButton.text("CONTINUE");
      toggleButton.css({"background-color":"white","color":"rgb(151, 151, 241)","border": "solid thin gray"});
      stop = true;
    }
    else{
      toggleButton.text("STOP");
      toggleButton.css({"background-color":"rgb(151, 151, 241)","color":"white","border": "solid thin white"});
      startSlider = setInterval(imageSlider, 1500);
      stop = false;
    }
  } 
   
});
