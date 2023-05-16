import { Component } from "react";
import './Registration.css';

class Registration extends Component{
    constructor(props){
        super(props);
        this.state = {
            name:"",
            age:""
        }
    }
    getStudent= (event)=>{
        if (event !== undefined && event.preventDefault) {
            event.preventDefault();
            const formData = new FormData(event.target);
            this.state.name = formData.get('name');
            this.state.age = Number(formData.get('age'));
            this.props.onSubmit(this.state);
            this.setState(() => ({
                    name: "",
                    age: ""
            }));
            console.log('A Student is Added Successfully!');
        }else{
            console.log('An Error Occurred When Adding A new Student');
        }
    }
    render(){
        return(
            <div>
                <form className="form col-8 bg-white" onSubmit={this.getStudent} method="post">
                    <h1 className='text text-center'>Registration Form</h1>
                    <hr />
                    <label className="text fw-bold fs-3" htmlFor="name">Name</label>
                    <input name="name" id="name" placeholder="Enter Your Name" type="text"/>
                    
                    <label htmlFor="age" className="text fw-bold fs-3">Age</label>
                    <input name="age" id="age" placeholder="Enter Your Age" type="number"/>

                    <button id="add" type="submit">ADD<span></span></button>
                    
                </form>
            </div>
        )
    }
    
}
export default Registration;