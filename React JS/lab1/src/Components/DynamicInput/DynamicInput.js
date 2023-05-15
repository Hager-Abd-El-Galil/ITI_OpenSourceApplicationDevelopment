import { Component } from "react";

class DynamicInput extends Component{
    constructor(){
        super();
        this.state = {
            name : ""
        }
    }
    getData = (e) => {
        this.setState({name: e.target.value})

    }
    resetInput = () => {
        this.setState({name: ""})
    }
    render(){
        return(
            <div className="card col-8 col-md-4">
                <div className="card-body my-2 px-5">
                    <h2 className="fw-bold text-center mb-2">PART 1</h2>
                    <input
                    type="text"
                    className="form-control mb-2"
                    value={this.state.name}
                    onChange={this.getData}
                    placeholder="Enter Your Text"
                    />
                    <p>Your Entered Text: <b className="text-dark">{ this.state.name }</b></p>
                    <input
                    type="button"
                    className="button btn text-white"
                    value="RESET"
                    onClick={this.resetInput}
                    />
                </div>
            </div>
            
        )
    }
}

export default DynamicInput;