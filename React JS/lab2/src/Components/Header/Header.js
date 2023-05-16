import { NavLink } from "react-router-dom";

let Header = ()=>{
    return(
        <div className="container-fluid">
            <div className="row fs-4 fw-light">
                <nav className="navbar navbar-expand justify-content-center bg-dark p-1">
                    <div className="container-fluid">
                        <div className="collapse navbar-collapse justify-content-center" id="navbarNav">
                            <div className="navbar-nav flex-wrap">
                                <span className="nav-link text-secondary mx-3 mx-md-4"><NavLink style={({isActive})=>({color:isActive?'#96c79e':'white'})} to={"/"}>Home</NavLink></span>
                                <span className="nav-link text-secondary mx-3 mx-md-4"><NavLink style={({isActive})=>({color:isActive?'#96c79e':'white'})} to={"/students/5"}>Student Details</NavLink></span>
                                <span className="nav-link text-secondary mx-3 mx-md-4"><NavLink style={({isActive})=>({color:isActive?'#96c79e':'white'})} to={"/profile"}>Profile</NavLink></span>
                                <span className="nav-link text-secondary mx-3 mx-md-4"><NavLink style={({isActive})=>({color:isActive?'#96c79e':'white'})} to={"/err"}>Error</NavLink></span>
                            </div> 
                        </div>    
                    </div>
                </nav>
            </div>
        </div>
    )
}
export default Header;