var container = document.querySelector(".container");

var url = 'https://reqres.in/api/users?page=2';

fetchData(url); //calling fn

async function fetchData(url){

    let response = await fetch(url);   //fetch data by url
    let fetchedData = await response.text();  
    let  dataArray = JSON.parse(fetchedData).data; //convert responsed data

    /*----------Display fetched Data----------*/
    for(elem in dataArray){

        var image = dataArray[elem]["avatar"];
        var fullName = dataArray[elem]["first_name"] + " " + dataArray[elem]["last_name"];
        var email = dataArray[elem]["email"];

        /*----------Content Section----------*/
        var content = document.createElement("div");
        content.classList.add("content");
        container.appendChild(content);

        /*----------Image Section----------*/
        var personImage = document.createElement("img");
        personImage.classList.add("image");
        content.appendChild(personImage);
        personImage.src = image;

        /*----------Name Section----------*/
        var personName = document.createElement("div");
        personName.classList.add("name");
        content.appendChild(personName);
        personName.innerHTML = fullName;

        /*----------Email Section----------*/
        var personEmail = document.createElement("a");
        personEmail.classList.add("email");
        content.appendChild(personEmail);
        personEmail.innerHTML = email;
        personEmail.href = `mailto:${email}`;

    }
}


 