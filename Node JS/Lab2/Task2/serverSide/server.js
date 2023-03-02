const http = require("http");
const fs = require("fs");

let MainFileHTML = fs.readFileSync("../clientSide/index.html").toString();
let WelcomeFileHTML = fs.readFileSync("../clientSide/welcome.html").toString();
let StyleCSS = fs.readFileSync("../clientSide/style.css").toString();
let ScriptFile = fs.readFileSync("../clientSide/script.js").toString();
let Icon = fs.readFileSync("../clientSide/favicon.ico");
let JSONFile = fs.readFileSync("./users.json").toString();

let name = '';
let tel = '';
let address = '';
let email = '';
let password = '';

http.createServer((req,res)=>{
    if(req.method == "GET"){
            switch(req.url){
                case "/index.html":
                    res.write(MainFileHTML);
                    break;
                case "/welcome.html":
                    res.write(WelcomeFileHTML);
                    break;
                case "/style.css":
                    res.writeHead(200,"Ok",{"content-type":"text/css"})
                    res.write(StyleCSS)
                    break;
                case "/script.js":
                    res.writeHead(300,"Ok",{"content-type":"text/javascript"})
                    res.write(ScriptFile)
                    break;
                case "/favicon.ico":
                    res.writeHead(200,"Ok",{"content-type":"image/vnd.microsoft.icon"})
                    res.write(Icon)
                    break;
                case "/serverSide/users.json":
                    res.writeHead(200,"Ok",{"content-type":"application/json"})
                    res.write(JSONFile)
                    break;

                default:
                    res.write("<h1> PAGE NOT FOUND </h1>")
                break;
            }
            res.end();
    }
    else if(req.method == "POST"){
        req.on("data",(data)=>{
            let userData = decodeURIComponent(data.toString()).replace(/\+/g,"\ ");
            let dataArray = userData.split("&");
            name = dataArray[0].split("=")[1];
            tel = dataArray[1].split("=")[1];
            address = dataArray[2].split("=")[1];
            email = dataArray[3].split("=")[1];
            password = dataArray[4].split("=")[1];

            let users = {"clients":[]};
            let user = {
                Name : name,
                Tel : tel,
                Address : address,
                Email : email,
                Password : password
            }

            let clients = fs.readFile("./users.json","utf-8",(err,userdata)=>{
                if(err) throw err;
                else{
                    users = JSON.parse(userdata); //Adding JSON File Data In Object
                    users.clients.push(user);  //Adding Data to Object
                    fs.writeFile('./users.json',JSON.stringify(users),(err)=>{if(err) throw err;}); //Adding Data To JSON File
                }
            });    
        });
        req.on("end",()=>{

            WelcomeFileHTML = WelcomeFileHTML.replace("{name}",name)
                                             .replace("{tel}",tel)
                                             .replace("{address}",address)
                                             .replace("{email}",email)
                                             .replace("{password}",password);
            res.write(WelcomeFileHTML)
            res.end();
        })
    }
    
})
.listen("8000", ()=>{
    console.log("http://localhost:8000")
})