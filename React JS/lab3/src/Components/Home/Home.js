import { NavLink } from "react-router-dom/dist";
import './Home.css';

let Home = ()=>{
    return(
        <div className="home-parent d-flex align-items-center">
            <div className="home-container">
                <div className="home d-flex fs-1 text-light justify-content-center align-items-center" style={{ backgroundImage: "url('./cover.png')" }}>
                    <NavLink to={"/artists"} className="home-text">MUSIC DB</NavLink>
                </div>
            </div>
        </div>
    )
}

export default Home;