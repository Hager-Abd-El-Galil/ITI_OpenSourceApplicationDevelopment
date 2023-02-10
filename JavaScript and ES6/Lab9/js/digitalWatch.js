/*--------------Digital Watch--------------*/

var timerContainer = document.getElementById("container-digital-watch");
var timer = document.getElementById("watch");
var days = document.querySelectorAll(".day");
var paragraph = document.getElementsByClassName("paragraph");

var alarmIcon = document.getElementById("alarmIcon");

var alarmContainer = document.getElementById("container-alarm");
var hours = document.getElementById("hours");
var minutes = document.getElementById("minutes");
var seconds = document.getElementById("seconds");
var setButton = document.getElementById("set-btn");
var clearButton = document.getElementById("clear-btn");
var cancelButton = document.getElementById("cancel-btn");
var message = document.getElementById("message");

var savedTime = 0; //initial value (No Alarm Saved)

Timer();  //intial value

setInterval(function(){

    Timer();

    alarmIcon.addEventListener('click',function(){

        timerContainer.style.display = "none";
        paragraph[0].style.display = "none";
        alarmContainer.style.display = "flex";

        clearButton.addEventListener('click',function(){
            hours.value = 0;
            minutes.value = 0;
            seconds.value = 0; 
            
            message.innerHTML = "";
            savedTime = 0;

        });

        setButton.addEventListener('click',function(){
            var hr = Number(hours.value);
            var min = Number(minutes.value);
            var sec = Number(seconds.value);
            savedTime = Math.floor(Date.now()/1000) + Number((hr*60*60) + (min*60) + (sec));
  
            message.innerHTML = "<i>Alarm Saved Successfully</i>";
            message.style.color = "red";
        });
        cancelButton.addEventListener('click',function(){
            alarmContainer.style.display = "none";
            timerContainer.style.display = "flex";
            paragraph[0].style.display = "block";
            message.innerHTML = "";
        })
    })

    if(Math.floor(Date.now()/1000) === savedTime){
        let alarmSound = new Audio('././Resources/sounds/alarmSound.wav');
        alarmSound.play();
        savedTime = 0;
    }
},1000); //Update Timer Every 1 sec

function Timer(){
    var currentDate = new Date();
    timer.innerText = currentDate.toLocaleTimeString();

    switch(currentDate.getDay()){
        case 0:   //SUNDAY
        {  
            days[6].style.color = "black";
            days[6].style.fontWeight = "bold";
            break;
        }
        case 1:   //MONDAY
        {  
            days[0].style.color = "black";
            days[0].style.fontWeight = "bold";
            break;
        }
        case 2:   //TUESDAY
        {  
            days[1].style.color = "black";
            days[1].style.fontWeight = "bold";
            break;
        }
        case 3:   //WEDNESDAY
        {  
            days[2].style.color = "black";
            days[2].style.fontWeight = "bold";
            break;
        }
        case 4:   //THURSDAY
        {  
            days[3].style.color = "black";
            days[3].style.fontWeight = "bold";
            break;
        }
        case 5:   //FRIDAY
        {  
            days[4].style.color = "black";
            days[4].style.fontWeight = "bold";
            break;
        }
        case 6:   //SATUERDAY
        {  
            days[5].style.color = "black";
            days[5].style.fontWeight = "bold";
            break;
        }
    }
    return currentDate;
}

