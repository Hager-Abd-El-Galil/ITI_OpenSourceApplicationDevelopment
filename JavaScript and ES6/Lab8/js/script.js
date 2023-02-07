var form = document.getElementById("form");
var newTask = document.getElementById("input-newTask");
var addBtn = document.getElementById("add-btn");
var newTaskContainer = document.getElementById("newTask-container");

var completeBtn = [];
var removeBtn = [];
var taskName = [];
var task = [];

//Add New Task
form.addEventListener('submit',function(event){
    event.preventDefault();

    var newElem = document.createElement("div");
    newTaskContainer.appendChild(newElem);
    newElem.classList.add('list','row', 'justify-content-between', 'col-12', 'py-3', 'rounded-2','my-3');
    newElem.style.background = "white";

    var name = document.createElement("div");
    newElem.appendChild(name);
    name.classList.add('col-12', 'col-md-8', 'col-lg-10','fs-4','taskName');
    name.innerText = newTask.value;

    var correct = document.createElement("div");
    newElem.appendChild(correct);
    correct.classList.add('col-5','col-sm-4','col-md-2', 'col-lg-1', 'px-sm-4','mt-2', 'mt-md-0');
    var correctBtn = document.createElement("button");
    correct.appendChild(correctBtn);
    correctBtn.setAttribute('type','submit');
    correctBtn.classList.add('btn','btn-success','rounded-5');
    correctBtn.innerHTML = "<i class='bi bi-check-lg'></i>";

    var wrong = document.createElement("div");
    newElem.appendChild(wrong);
    wrong.classList.add('col-7','col-sm-4','col-md-2', 'col-lg-1','mt-2', 'mt-md-0');
    var wrongBtn = document.createElement("button");
    wrong.appendChild(wrongBtn);
    wrongBtn.setAttribute('type','submit');
    wrongBtn.classList.add('btn','btn-danger','rounded-5');
    wrongBtn.innerHTML = "<i class='bi bi-x-lg'></i>";    
});

//update Tasks Data every 0.5 sec
setInterval(function()
{
    var completeBtn = document.getElementsByClassName("btn-success");
    var removeBtn = document.getElementsByClassName("btn-danger");
    var taskName = document.getElementsByClassName("taskName");
    var task = document.getElementsByClassName("list");

    //Completed Task
    for(let i = 0; i < completeBtn.length; i++)
    { 
        completeBtn[i].onclick = function(){
            taskName[i].style.textDecoration = "line-through"; 
            task[i].style.background = "#abf7b1";
        }
}
    //Remove Task
    for (let i = 0; i < removeBtn.length; i++) {
        removeBtn[i].onclick = function() {
            newTaskContainer.removeChild(task[i]);
        }
    }
},500);











