import { BrowserRouter, Route, Routes } from "react-router-dom";
import Header from "./Components/Header/Header";
import Home from "./Components/Home/Home";
import StudentDetails from "./Components/StudentDetails/StudentDetails";
import Profile from "./Components/Profile/Profile";
import Error from "./Components/Error/Error";

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
                      <Route path="/students/:id" element={<StudentDetails />}/>
                      <Route path="/profile" element={<Profile />}/>
                      <Route path="*" element={<Error/>}/>
                  </Routes>
              </BrowserRouter>
          </div>
      </div>
  )
}

export default App;
