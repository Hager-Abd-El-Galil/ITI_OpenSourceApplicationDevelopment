const welcomeContainer = document.querySelector(".welcomeContainer");
const welcomeMessage = document.getElementById("welcomeMessage");
const showAllUsers = document.getElementById("showbtn");
const tableContainer = document.querySelector(".table");
const usersTable = document.getElementById("usersTable");

var usersArray = fetchData;

async function fetchData(){

    let response = await fetch('../serverSide/users.json');   //Fetch Data From JSON File
    let fetchedData = await response.text();  
    let  usersArray = JSON.parse(fetchedData).clients; //Convert Responsed Data

    return usersArray;
}
function addData(usersArray){
    welcomeMessage.style.display = "none";

    for(elem in usersArray){

        var Name = usersArray[elem]["Name"];
        var Tel = usersArray[elem]["Tel"];
        var Address = usersArray[elem]["Address"];
        var Email = usersArray[elem]["Email"];

        var userRow = `<tr>
                            <td>${Name}</td>
                            <td>${Tel}</td>
                            <td>${Address}</td>
                            <td>${Email}</td>
                        </tr>`;
                          
        usersTable.insertAdjacentHTML('beforeend',userRow);

    }
    tableContainer.style.display = "flex";
}
    
showAllUsers.addEventListener('click',()=>{
    fetchData()
        .then((data) => addData(data))
        .catch((err) => console.log(err)); 
});