/*--------------image Slider--------------*/

var slides = document.getElementsByClassName("Slides");
var dots = document.getElementsByClassName("dot");

var slideIndex = 3;  //initial Value (The Middle Image)

showSlide(slideIndex);

// Prev/Next Controls
function plusSlides(num) {
  showSlide(slideIndex += num);
}

// Thumbnail image controls
function currentSlide(num) {
  showSlide(slideIndex = num);
}

function showSlide(num) {

    if (num > slides.length) 
    {
        slideIndex = 1; //show First Image
    }

    if (num < 1) 
    {
        slideIndex = slides.length;  //show last Image
    }

    for (let i = 0; i < slides.length; i++) {
        slides[i].style.display = "none";
    }

    for (let i = 0; i < dots.length; i++) {
        dots[i].className = dots[i].className.replace(" active", "");
    }

    slides[slideIndex-1].style.display = "block";
    dots[slideIndex-1].className += " active";

}