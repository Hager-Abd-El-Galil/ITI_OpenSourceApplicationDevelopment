import { NavLink } from "react-router-dom";
import './ArtistItem.css';

let ArtistItem = (props)=>{
    let {Artist} = props;
    let imageUrl = `./covers/${Artist.cover}.jpg`;
    return(
        <div>
            <div className="card m-2 p-0" key={Artist.id}>
                <div className="card-img">
                    <NavLink to={`/artists/${Artist.id}`}>
                        <img src={imageUrl} aria-hidden alt={Artist.cover} width="100%"/>
                    </NavLink>
                </div>
                <div className="my-2 ">
                    <h6 className="text text-center fs-4 fw-bold">{Artist.name}</h6>
                </div>
                <button className="details-btn">
                    <NavLink to={`/artists/${Artist.id}`}>
                        DETAILS
                    </NavLink>
                </button>
            </div>
        </div>


    )
}

export default ArtistItem;