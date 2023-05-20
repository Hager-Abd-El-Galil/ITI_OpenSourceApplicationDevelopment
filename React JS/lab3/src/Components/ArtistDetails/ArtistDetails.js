import { useEffect, useState} from "react";
import { useParams } from "react-router-dom";
import "./ArtistDetails.css";

let ArtistDetails = ()=>{
    let {id} = useParams();
    let [ArtistsDetails , setArtistsDetails] = useState([]);
    useEffect(() => {
        fetch(`http://localhost:3500/artists/${id}`)
        .then((response)=>{return response.json()})
        .then((data)=>{
            setArtistsDetails(data)
        })
        .catch((err)=>{console.log(err)});
    })

    return(
        <div className="artist-details d-flex justify-content-center align-items-center">
            <div className="col-9 p-0" key={ArtistsDetails.id}>
                <div className="d-flex justify-content-evenly align-items-center flex-wrap">
                    <div className="col-9 col-md-5 p-0">
                        <img src={`../covers/${ArtistsDetails.cover}.jpg`} aria-hidden alt={ArtistsDetails.cover} width="100%"/> 
                    </div>
                    <div className="col-9 col-md-4 p-4 border">
                        <div className="mb-4">
                            <h6 className="text text-center fs-3 fw-bold mb-4">{ArtistsDetails.name}</h6>
                            <h6 className="text text-center fs-5 fw-bold">{ArtistsDetails.bio}</h6>
                        </div>

                        <div className="d-flex flex-row justify-content-evenly flex-wrap">
                            {ArtistsDetails.albums && ArtistsDetails.albums.map((album)=>(
                                <div className="col-2">
                                    <img className="img" src={`../albums/${album.cover}.jpg`} aria-hidden alt={album.cover}/>
                                </div>           
                            ))}
                        </div>
                    </div>
                </div>
            </div>
            
        
        
        
        </div>
    )
}

export default ArtistDetails;