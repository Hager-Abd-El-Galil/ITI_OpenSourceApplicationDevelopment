var form = $("#form");

//Add New Task
form.on('submit',function(event){

    event.preventDefault();
    var newTask = $("#input-newTask").val();
    addTask(newTask);
    $("#input-newTask").val('');

});

//Click on Task Remove Button
$('.newTask').on('click',function(elem){
    if(elem.target.classList.contains("remove")){

        let removeTarget = elem.target.parentNode.parentNode.parentNode;
    
        //Remove Task From Page
        removeTarget.remove();

    }
});

//Click on Task Complete Button
$('.newTask').on('click',function(elem){
    if(elem.target.classList.contains("complete")){
         
        let completeTarget = elem.target.parentNode.parentNode.parentNode;

        //Toggle Done Class in Page
        completeTarget.classList.toggle("done");
        $(".task").css({"text-decoration" : "none","background-color" : "white"});
        $(".done").css({"text-decoration" : "line-through","background-color" : "#abf7b1"});

    }
});

function addTask(taskName){

    var newElem = $('.newTask').append(`<div class='task row justify-content-between col-12 py-3 rounded-2 my-2 mx-2'>
                                            <div class='col-12 col-md-8 col-lg-8 fs-4 taskName'> 
                                                ${taskName} 
                                            </div>
                                            <div class='col-1 col-sm-4 col-md-2 col-lg-1 px-sm-4 mt-2 mt-md-0'>
                                                <button class='btn btn-success rounded-5'>
                                                    <i class='bi bi-check-lg complete'></i>
                                                </button>
                                            </div>
                                            <div class='col-7 col-sm-4 col-md-2 col-lg-1 mt-2 mt-md-0'>
                                                <button class='btn btn-danger rounded-5'>
                                                    <i class='bi bi-x-lg remove'></i>
                                                </button>
                                            </div>
                                        </div>`
                                      );
   $(".task").css({"background-color" : "white"});

}



    
