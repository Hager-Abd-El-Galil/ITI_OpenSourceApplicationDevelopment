const express = require("express");
const app = express();
const http = require('http');
const server = http.createServer(app);
const { Server } = require("socket.io");
const io = new Server(server);
const path = require("path");

var PORT = process.env.PORT || 7300;


app.get('/', (req, res) => {
    res.sendFile(path.join(__dirname , '../clientSide/index.html'));
});

app.get('/favicon.ico', (req, res) => {
    res.sendFile(path.join(__dirname , '../clientSide/favicon.ico'));
});

app.get('/style.css', (req, res) => {
    res.sendFile(path.join(__dirname , '../clientSide/style.css'));
});

app.get('/serverSide/node_modules/socket.io/client-dist/socket.io.js', (req, res) => {
    res.sendFile(path.join(__dirname , './node_modules/socket.io/client-dist/socket.io.js'));
});

app.get('/script.js', (req, res) => {
    res.sendFile(path.join(__dirname , '../clientSide/script.js'));
});

app.all('*',(req,res)=>{
    res.send('<h1>Error 404 : Page Not Found</h1>')
});

io.emit('some event', { someProperty: 'some value', otherProperty: 'other value' }); // This will emit the event to all connected sockets 

io.on('connection', (socket) => {
    console.log('a user connected');
    socket.on('chat message', (msg) => {
        console.log('Message: ' + msg);
        io.emit('chat message', msg);
      });
    socket.on('disconnect', () => {
        console.log('user disconnected');
    });
  });
 

server.listen(PORT, ()=>{
    console.log("listening on *:" + PORT)
})