const express = require("express");
const app = express();

const fs = require("fs");
const path = require("path");

var PORT = process.env.PORT || 7200;

var WelcomeFileHTML = fs.readFileSync("../clientSide/welcome.html").toString();
var JSONFile= "./users.json";

app.use(express.json());
app.use(express.urlencoded({extended:false}));

//URL Function Maker
function pathMaker(url){
   return path.join(__dirname,url);
}

//GET Method
app.get("/index.html",(req,res)=>{
   res.sendFile(pathMaker("../clientSide/index.html"));
})
app.get("/style.css",(req,res)=>{
    res.sendFile(pathMaker("../clientSide/style.css"));  
})
app.get("/script.js",(req,res)=>{
    res.sendFile(pathMaker("../clientSide/script.js"));  
})
app.get("/welcome.html",(req,res)=>{
    res.sendFile(pathMaker("../clientSide/welcome.html"));
   
})
app.get("/favicon.ico",(req,res)=>{
    res.sendFile(pathMaker("../clientSide/favicon.ico")); 
})
app.get("/serverSide/users.json",(req,res)=>{
    res.sendFile(pathMaker("../serverSide/users.json")); 
})

//POST Method
app.post("/welcome.html",
    (req,res,next)=>{
        var name = req.body["name"];
        var tel = req.body["tel"];
        var address = req.body["address"];
        var email = req.body["email"];
        var password = req.body["password"];

        WelcomeFileHTML = WelcomeFileHTML.replace('{name}',name)
                                         .replace('{tel}',tel)
                                         .replace('{address}',address)
                                         .replace('{email}',email)
                                         .replace('{password}',password);

        let users = {"clients":[]};
        let user = {
            Name : name,
            Tel : tel,
            Address : address,
            Email : email,
            Password : password
        }

        let clients = fs.readFile(JSONFile,"utf-8",(err,userdata)=>{
            if(err) throw err;
            else{
                users = JSON.parse(userdata); //Adding JSON File Data In Object
                users.clients.push(user);  //Adding Data to Object
                fs.writeFile(JSONFile,JSON.stringify(users),(err)=>{if(err) throw err;}); //Adding Data To JSON File
            }
        });    

        next();

    },(req,res)=>{

        res.send(WelcomeFileHTML);

    })

app.all('*',(req,res)=>{
    res.send('<h1>Error 404 : Page Not Found</h1>')
});

app.listen(PORT, ()=>{
    console.log("http://localhost:" + PORT)
})