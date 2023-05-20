import { useEffect, useState } from "react";
import ArtistItem from "../ArtistItem/ArtistItem";
import './Artists.css';

let Artists = () =>{
    let [ArtistsList , setArtistsList] = useState([]);
    useEffect(() => {
        fetch("http://localhost:3500/artists")
        .then((response)=>{return response.json()})
        .then((data)=>{
            setArtistsList(data)
        })
        .catch((err)=>{console.log(err)});
    })
    let RenderArtists = ()=>{
        return ArtistsList.map((artist)=>{
            return (
                <div className="col-4 col-md-3">
                    <ArtistItem Artist={artist} key={artist.id}/>
                </div>
                )
            })
    }
    return(
        <div className="artists-container col-12 px-5 d-flex justify-content-evenly align-items-center flex-wrap">
            {RenderArtists()}
        </div>
    )
}
export default Artists;