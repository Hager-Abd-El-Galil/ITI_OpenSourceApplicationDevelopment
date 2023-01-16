function Login(){
    var firstName = prompt("First Name:");
    var lastName = prompt("Last Name:");
    if(firstName !== null && lastName !== null)
    {
        if(firstName !== "" && lastName !== "")
        {
            var con = confirm("Full Name: "+`${firstName}`+" "+`${lastName}`);
            if(con)
            {
                var birthyear = prompt("Birth Year:");
                if(birthyear !== null && birthyear !== "")
                {
                    if(isNaN(Number(birthyear)) === false)
                    {
                        var age = 2023-Number(birthyear);
                        alert("Welcome "+`${firstName}`+" "+`${lastName}`+" you are " +`${age}`+"years old");
                    }
                    else
                    {
                        alert("Please Enter a valid Birthyear");
                        Login();   
                    }
                    
                }
                else
                {
                    alert("Please Enter a your Birthyear");
                    Login();
                }
            }
        }
        else
        {
            alert("Please Enter Your First and Last Name");
            Login();
        }
    }
    else
    {
        alert("Please Enter Your Data");
        Login();
    }
}

function Calculator(){
    alert("It's the first release of a calculator that\n only has a summation feature");
    var FirstNumber = prompt("First Number");
    var SecondNumber = prompt("Second Number");
    if(FirstNumber !== null && SecondNumber !== null)
    {
        if(FirstNumber !== "" && SecondNumber !== "")
        {
            if(isNaN(Number(FirstNumber)) === false && isNaN(Number(SecondNumber)) === false)
            {
                var result =  Number(FirstNumber) + Number(SecondNumber);
                alert(`${FirstNumber}` + " + " +`${SecondNumber}` + " = " + `${result}`);
            }
            else
            {
                alert("The Entered Data Not Numbers,Please Try Again");
                Calculator();
            }
        }
        else
        {
            alert("Please Enter Two Numbers");
            Calculator(); 
        }
    }
    else
    {
        alert("Please Enter Two Numbers");
        Calculator();
    }
}
