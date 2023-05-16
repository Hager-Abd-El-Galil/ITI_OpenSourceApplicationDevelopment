import { useParams } from "react-router-dom";
let StudentDetails = ()=>{
    let {id} = useParams();
    return(
        <div>
            <div className="section d-flex flex-column justify-content-center align-items-center">
            <div className="text fs-2 mt-5 fw-bold rounded">
                Your Entered <b>ID</b> is {id}
            </div>
            <div className="p-0">
              <img src="../images/studentDetails.png" aria-hidden alt="Student Details Image" />
            </div>
        </div>
        </div>
    )
}
export default StudentDetails;