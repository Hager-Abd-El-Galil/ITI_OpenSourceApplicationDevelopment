(function () {
    const app = document.querySelector(".app");
    const socket = io();
    let uname;
    app.querySelector(".join-screen #join-user").addEventListener('click', function () {
      let username = app.querySelector(".join-screen #username").value;
      console.log(username);
      if (username.length == 0) {
        return;
      }
      socket.emit("newuser", username); 
      uname = username;
      app.querySelector(".join-screen").classList.remove("active");
      app.querySelector(".chat-screen").classList.add("active");
    });
  
    app.querySelector(".chat-screen #send-message").addEventListener("click", function () {
      let message = app.querySelector(".chat-screen #message-input").value;
      console.log(message);
      if (message.length == 0) {
        return;
      }
      renderMessage("me", {
        username: uname,
        text: message
      });
      socket.emit("chat", {
        username: uname,
        text: message
      });
      app.querySelector(".chat-screen #message-input").value = "";
    });
  
    app.querySelector(".chat-screen #exit-chat").addEventListener("click", function () {
      socket.emit("exituser", uname);
      window.location.href = window.location.href;
    })
    socket.on("update", function (update) {
      renderMessage("update", update);
    });
    socket.on("chat", function (message) {
      renderMessage("other", message);
    });
    function renderMessage(type, message) {
      console.log(message);
      let messageContainer = app.querySelector(".chat-screen .messages");
      if (type == "me") {
        let el = document.createElement("div");
        el.setAttribute("class", "message my-message");
        el.innerHTML =
          `<div style= "background: #8f9c8f;">
            <div class="name">You</div>
            <div class="text">${message.text}</div>
          </div>`;
        messageContainer.appendChild(el);
      } else if (type == "other") {
        let el = document.createElement("div");
        el.setAttribute("class", "message other-message");
        el.innerHTML =
          `<div>
            <div class="name">${message.username}</div>
            <div class="text">${message.text}</div>
          </div>`;
        messageContainer.appendChild(el);
      } else if (type == "update") {
        let el = document.createElement("div");
        el.setAttribute("class", "update");
        el.innerHTML = message;
        messageContainer.appendChild(el);
      }
      messageContainer.scrollTop = messageContainer.scrollHeight - messageContainer.clientHeight;
    }
  
  })();