import { Component } from "react";
import Registration from "./Registration/Registration";
import Students from "./Students/Students";

class Home extends Component{
    constructor(){
        super();
        this.state = {
            AllStudents : []
        }
    }
    ReciveStudentData = (newStudent)=>{
        this.setState(prevState => ({
            AllStudents: [...prevState.AllStudents, newStudent]
          }))
        console.log(this.state.AllStudents)
    }

    render(){
        return(
            <div className="home section d-flex justify-content-evenly align-items-center flex-wrap">
                <Registration onSubmit={this.ReciveStudentData}/>
                <Students studentsList={this.state.AllStudents} />
            </div>
        )
    }
             
}
export default Home;