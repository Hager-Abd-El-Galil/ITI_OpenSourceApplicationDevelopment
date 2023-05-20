import { BrowserRouter, Route, Routes } from "react-router-dom";
import Header from "./Components/Header/Header";
import Home from "./Components/Home/Home";
import Artists from "./Components/Artists/Artists";
import ArtistDetails from "./Components/ArtistDetails/ArtistDetails";

function App(){

  return (
      <div>
          <div className="allComp">
              <BrowserRouter>
                   <div className="header">
                       <Header/>
                   </div>
                  <Routes>
                      <Route path="/" element={<Home />}/>
                      <Route path="/artists" element={<Artists/>}/>
                      <Route path="/artists/:id" element={<ArtistDetails/>}/>
                  </Routes>
              </BrowserRouter>
          </div>
      </div>
  )
}

export default App;
