var form = document.getElementById("form");
var newTask = document.getElementById("input-newTask");
var task = document.querySelector(".list");
var done = document.getElementsByClassName("done");

var arrayOfTasks = [];   //Array of Tasks

//Check If There are Tasks in Local Storage
if(localStorage.getItem("Tasks"))
{
    arrayOfTasks = JSON.parse(localStorage.getItem("Tasks"));
}

getTaskFromLocalStorage();

//Add New Task
form.onsubmit = function(event){

    event.preventDefault();
    addTaskToArray(newTask.value);  
    newTask.value = ""; //Empty input Field

};

//Click on Task Remove Button
task.addEventListener('click',function(elem){
    if(elem.target.classList.contains("remove")){

        let removeTarget = elem.target.parentElement.parentElement.parentElement;

        //Remove Task From Local Storage by ID
        RemoveTaskFromLocalStorage(removeTarget.getAttribute("task-id"));
    
        //Remove Task From Page
        removeTarget.remove();

    }
});

//Click on Task Complete Button
task.addEventListener('click',function(elem){
    if(elem.target.classList.contains("complete")){
         
        let completeTarget = elem.target.parentElement.parentElement.parentElement;

        //Toggle Completed For the Task
        toggleTaskStatus(completeTarget.getAttribute("task-id"));

        //Toggle Done Class in Page
        completeTarget.classList.toggle("done");
    }
});

//Add Task Data To Array Function
function addTaskToArray(newTaskName){

    //Task Data
    const taskData = {
        id: Date.now(),
        title: newTaskName,
        completed: false
    };

    //push Tasks to Array Of Tasks
    arrayOfTasks.push(taskData);

    //Add Tasks To Page 
    addTaskToPage(arrayOfTasks);

    //Add Tasks To Local Storage
    addTaskToLocalStorage(arrayOfTasks);
}

//Add Task To TO DO List Function
function addTaskToPage(arrayOfTasks){

    //Empty list of Tasks
    task.innerHTML = "";

    //Looping On Array Of Tasks
    arrayOfTasks.forEach(elementTask => {

        //Task Div
        var newElem = document.createElement("div");
        task.appendChild(newElem);
        newElem.classList.add('row', 'justify-content-between', 'col-12', 'py-3', 'rounded-2','my-2','mx-2');
        newElem.style.background = "white";
        newElem.setAttribute('task-id',elementTask.id);

        //Task Name Div
        var name = document.createElement("div");
        newElem.appendChild(name);
        name.classList.add('col-12','col-md-8', 'col-lg-8','fs-4','taskName');
        name.innerText = elementTask.title;
        
        //Complete Button
        var Complete = document.createElement("div");
        newElem.appendChild(Complete);
        Complete.classList.add('col-1','col-sm-4','col-md-2', 'col-lg-1', 'px-sm-4','mt-2', 'mt-md-0');
        var CompleteBtn = document.createElement("button");
        Complete.appendChild(CompleteBtn);
        CompleteBtn.setAttribute('type','submit');
        CompleteBtn.classList.add('btn','btn-success','rounded-5');
        CompleteBtn.innerHTML = "<i class='bi bi-check-lg complete'></i>";
        
        //Remove Button
        var remove = document.createElement("div");
        newElem.appendChild(remove);
        remove.classList.add('col-7','col-sm-4','col-md-2', 'col-lg-1','mt-2', 'mt-md-0');
        var removeBtn = document.createElement("button");
        remove.appendChild(removeBtn);
        removeBtn.setAttribute('type','submit');
        removeBtn.classList.add('btn','btn-danger','rounded-5');
        removeBtn.innerHTML = "<i class='bi bi-x-lg remove'></i>";

        //Check If Task Completed
        if(elementTask.completed)
        {
            newElem.classList.add('row', 'done', 'justify-content-between', 'col-12', 'py-3', 'rounded-2','my-2','mx-2');
        }
    });   
}

//Add Tasks To Local Storage Function
function addTaskToLocalStorage(arrayOfTasks){

    window.localStorage.setItem("Tasks",JSON.stringify(arrayOfTasks));

}

//Get Tasks To Local Storage Function
function getTaskFromLocalStorage(){

    let data = window.localStorage.getItem("Tasks");

    if(data){
        let tasks = JSON.parse(data);
        addTaskToPage(tasks);
    }
    
}

//Remove Tasks From Local Storage By ID Function
function RemoveTaskFromLocalStorage(id){

    arrayOfTasks = arrayOfTasks.filter((task) => task.id != id);
    addTaskToLocalStorage(arrayOfTasks);

}

//Toggle Task Status Function
function toggleTaskStatus(id){

    for (let i = 0; i < arrayOfTasks.length ; i++){
        if(arrayOfTasks[i].id == id){
            arrayOfTasks[i].completed == false ? (arrayOfTasks[i].completed = true) : (arrayOfTasks[i].completed = false);
        }
    }

    addTaskToLocalStorage(arrayOfTasks);

}








