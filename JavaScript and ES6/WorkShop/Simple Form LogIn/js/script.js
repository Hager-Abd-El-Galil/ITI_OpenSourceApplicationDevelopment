/*----------Variables----------*/
var formContainer = document.querySelector(".form-container")
var form = document.getElementById("validation-form");
var email = document.getElementById("input-email");
var password = document.getElementById("input-password");
var button = document.getElementById("submit-btn");

/*----------Function----------*/
form.addEventListener('submit',logInSubmit,false);
function logInSubmit(event){
    var welcomeMessage = document.createElement("div");
    var wrongPassMessage = document.createElement("div");
    var notRegisteredMessage = document.createElement("div");
    if(email.value === "hager@gmail.com"){
        if(password.value === "Hager12345")
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

    email.addEventListener('keydown',function(){
        wrongPassMessage.style.display = "none"
        notRegisteredMessage.style.display = "none";
    });
    password.addEventListener('keydown',function(){
        wrongPassMessage.style.display = "none"
        notRegisteredMessage.style.display = "none";
    });
    button.addEventListener('click',function(){
        wrongPassMessage.style.display = "none"
        notRegisteredMessage.style.display = "none";
    });
}