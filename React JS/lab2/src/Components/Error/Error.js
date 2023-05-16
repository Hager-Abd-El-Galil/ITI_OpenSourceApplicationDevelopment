import { NavLink } from "react-router-dom";

let Error = ()=>{
    return(
        <div className="section d-flex flex-column justify-content-center align-items-center">
            <div>
              <img src="./images/404.gif" alt="Error 404"/>
            </div>
            <div className="button fs-4 my-4 fw-bold rounded">
                <NavLink to={"/"}>Go Home</NavLink>
            </div>
        </div>
    )
}
export default Error;