var container = document.querySelector(".container");
var formContainer = document.querySelector(".form-container")

var form = document.getElementById("validation-form");
var userName = document.getElementById("input-username");
var password = document.getElementById("input-password");
var button = document.getElementById("submit-btn");

var link = document.querySelector('.link');
var paragraph = document.querySelector('.paragraph');

/*----------------Styles----------------*/
document.body.margin = "0%";
document.body.style.background = "rgb(73, 192, 71)";
/*------Container Style------*/
container.style.display = "flex";
container.style.flexDirection ="row";
container.style.justifyContent = "center";
container.style.alignItems = "center";
container.style.height = "95vh";
/*------Form Container Style------*/
formContainer.style.display = "flex";
formContainer.style.flexDirection ="column";
formContainer.style.justifyContent = "center";
formContainer.style.width = "20%";
formContainer.style.background = "white";
formContainer.style.padding = "5%";
formContainer.style.border = "solid thin white";
formContainer.style.boxShadow = "0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19)";
formContainer.style.borderRadius = "10px";
/*------input Style------*/
userName.style.background = "rgb(242, 239, 239)";
userName.style.width = "85%";
userName.style.marginBottom = "5%";
userName.style.padding = "8%";
userName.style.border = "solid thin white";
userName.style.borderRadius = "5px";
password.style.background = "rgb(242, 239, 239)";
password.style.width = "85%";
password.style.marginBottom = "5%";
password.style.padding = "8%";
password.style.border = "solid thin white";
password.style.borderRadius = "5px";
/*------Button Style------*/
button.style.background = "rgb(73, 192, 71)";
button.style.color = "white";
button.style.width = "85%";
button.style.marginLeft = "8%";
button.style.marginTop = "5%";
button.style.padding = "5%";
button.style.border = "solid thin white";
button.style.borderRadius = "5px";
button.addEventListener('mouseover',function(){button.style.cursor = "pointer"});
/*------Paragraph Style------*/
paragraph.style.width = "85%";
paragraph.style.marginLeft = "15%"
link.style.color = "rgb(73, 192, 71)";

/*----------Function----------*/
form.addEventListener('submit',logInSubmit,false);
function logInSubmit(event){
    var welcomeMessage = document.createElement("div");
    var wrongPassMessage = document.createElement("div");
    var notRegisteredMessage = document.createElement("div");
    if(userName.value === "admin"){
        if(password.value === "123")
        {
            event.preventDefault();
            form.style.display = "none";
            formContainer.appendChild(welcomeMessage);
            welcomeMessage.innerHTML = "<h2>Welcome</h2>";
            welcomeMessage.style.textAlign = "Center";
            welcomeMessage.style.fontFamily = "Monospace";
        }
        else
        {
            event.preventDefault();
            formContainer.appendChild(wrongPassMessage);
            wrongPassMessage.innerHTML = "<h3>Wrong Password, Please Try Again</h3>";
            wrongPassMessage.style.textAlign = "Center";
            wrongPassMessage.style.fontFamily = "Monospace";
            wrongPassMessage.style.color = "red";    
        }
    }
    else
    {
        event.preventDefault();
        formContainer.appendChild(notRegisteredMessage);
        notRegisteredMessage.innerHTML = "<h3>Not Registered User!</h3>";
        notRegisteredMessage.style.textAlign = "Center";
        notRegisteredMessage.style.fontFamily = "Monospace";
        notRegisteredMessage.style.color = "blue";
    }

    userName.addEventListener('keydown',function(){
        wrongPassMessage.style.display = "none"
        notRegisteredMessage.style.display = "none";
    });
    password.addEventListener('keydown',function(){
        wrongPassMessage.style.display = "none"
        notRegisteredMessage.style.display = "none";
    });
}