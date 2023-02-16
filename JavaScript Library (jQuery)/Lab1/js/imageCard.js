$(function(){
    var image = $(".image");
    var caption = $(".caption");
    
    image.on('click',function(){
        $(this).parent().find(caption).slideToggle(1000)
    })
});
