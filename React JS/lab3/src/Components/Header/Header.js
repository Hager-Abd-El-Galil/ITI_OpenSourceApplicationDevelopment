import { NavLink } from "react-router-dom";
import './Header.css';

let Header = ()=>{
    return(
        <div>
            <nav className="navbar navbar-light bg-light">
                <div className="container-fluid">
                    <NavLink className="navbar-brand fs-4" to={"/"}>
                        <i className="fas fa-headphones d-inline-block align-text-middle pe-3 fs-4"></i>
                    Music DB
                    </NavLink>
                </div>
            </nav>
        </div>
    )
}

export default Header;