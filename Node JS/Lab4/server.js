const express = require("express");
const app = require("express")();

const http = require("http").Server(app);
const path = require("path");
const io = require("socket.io")(http);

let PORT = process.env.PORT || "4000";

io.on("connection", function (socket) {
  socket.on("newuser", function (username) {
    socket.broadcast.emit("update", username + " Joined the conversation")
  });
  socket.on("exituser", function (username) {
    socket.broadcast.emit("update", username + " left the conversation")
  });
  socket.on("chat", function (message) {
    socket.broadcast.emit("chat", message)
  });
})

http.listen(PORT, () => {
  console.log('listening on *: ' + PORT);
});

app.use(express.static(path.join(__dirname + "/public")));