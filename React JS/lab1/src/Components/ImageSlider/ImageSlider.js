import { Component } from "react";
import './ImageSlider.css';

class ImageSlider extends Component{
    constructor(){
        super();
        this.state = {
            currentSlideIndex : 0,
            intervaTime : null
        }
    }
    showPrevImage = () => {
        const slides = document.querySelectorAll(".slide");
        if (this.state.currentSlideIndex - 1 <= 0) {
            this.setState({currentSlideIndex: 0});
        }else{
            this.setState({currentSlideIndex: this.state.currentSlideIndex - 1})
        }
        slides.forEach((slide, index) => {
          if (index === this.state.currentSlideIndex) {
            slide.classList.add("active");
          } else {
            slide.classList.remove("active");
          }
        });
    }

    showNextImage = () => {
        const slides = document.querySelectorAll(".slide");
        if(this.state.currentSlideIndex + 1 < slides.length){
            this.setState({currentSlideIndex: this.state.currentSlideIndex + 1})
            if (this.state.currentSlideIndex >= slides.length) {
                this.setState({currentSlideIndex: 0});
            }
            slides.forEach((slide, index) => {
              if (index === this.state.currentSlideIndex) {
                slide.classList.add("active");
              } else {
                slide.classList.remove("active");
              }
            });
        }
        
    }

    slideShow = () => {
        const slides = document.querySelectorAll(".slide");
        if (this.state.currentSlideIndex + 1 >= slides.length) {
            this.setState({currentSlideIndex: 0});
        }else{
            this.setState({currentSlideIndex: this.state.currentSlideIndex + 1})
        }
        slides.forEach((slide, index) => {
          if (index === this.state.currentSlideIndex) {
            slide.classList.add("active");
          } else {
            slide.classList.remove("active");
          }
        });  
              

    }
   
    startSlide = () => {
        this.setState({intervaTime: setInterval(() => {
            this.slideShow();
          }, 1000)});   
    }
    
    stopSlide = () => {
        clearInterval(this.state.intervaTime);
        this.setState({ intervaTime: null });
    }
    
    render(){
        return(
            <div className="card col-8 col-md-4">
                <div className="card-body my-2 py-3">
                    <h2 className="fw-bold text-center my-2">PART 2</h2>

                    <div className="imageslider">
                        <div className="slide active">
                            <img src="./Images/image1.jfif" aria-hidden alt="Image-1"/>
                        </div>
                        <div className="slide">
                            <img src="./Images/image2.jfif" aria-hidden alt="Image-2"/>
                        </div>
                        <div className="slide">
                            <img src="./Images/image3.jfif" aria-hidden alt="Image-3"/>
                        </div>
                        <div className="slide">
                            <img src="./Images/image4.jfif" aria-hidden alt="Image-4"/>
                        </div>
                    </div>
                    
                    <div className="d-flex justify-content-center mt-4">
                    <input type="button" className="button btn mx-2 text-white" value="Prev" onClick={this.showPrevImage} />
                    <input type="button" className="button btn mx-2 text-white" value="Next" onClick={this.showNextImage} />
                    <input type="button" className="button btn mx-2 text-white" value="Slide" onClick={this.startSlide} />
                    <input type="button" className="button btn mx-2 text-white" value="Stop" onClick={this.stopSlide} />
                    </div> 
                </div>
            </div>
        )
    }
}

export default ImageSlider;