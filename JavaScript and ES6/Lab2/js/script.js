function statusOfUser()
{
    var submit = true;
    do{
        do{
            var age = prompt("Enter Your Age:");
        }while(age === null || age === "");
        
        if(Number(age) > 0 && isNaN(Number(age)) === false)
        {
            if(Number(age) >= 1 && Number(age) <= 10)
            {
                submit = confirm("You are Child");
            }
            else if(Number(age) >= 11 && Number(age) <= 18)
            {
                submit = confirm("You are Teenager");
            }
            else if(Number(age) >= 19 && Number(age) <= 50)
            {
                submit = confirm("You are Grow Up");
            }
            else
            {
                submit = confirm("You are Old");
            }
        }
        else
        {
            alert("Error!\nPlease Enter a Positive Number");
        }
    }while(submit)
}

function countVowels(){
    do{
        var str = prompt("Enter String:");
    }while(str === null || str === "");

    var count = 0;
    for(let i = 0;i < str.length;i++)
    {
        var ch = str.charAt(i);

        if(ch === 'a' || ch === 'e' || ch === 'o' || ch === 'i' || ch === 'u')
        {
            count++;
        }
    }
    confirm("Number of Vowels in " + `${str}` + " is " + `${count}`);
}

function convertHours(){
    do{
        var hour = prompt("Enter Hour:");
    }while(hour === null || hour === "");

    if(Number(hour) >= 0 && isNaN(Number(hour)) === false)
    {
        convertedHour = hour%12;

        if(convertedHour == 0)
        {
            convertedHour = 12;
        }

        var flag = (hour < 12) || ((hour != 12)&&(hour%12 == 0)) ? "AM" : "PM";
        confirm(`${hour}` + " hour clock means " + `${convertedHour}` + `${flag}`);
    }
    else
    {
        alert("Error!\nPlease Enter a valid hour");
        convertHours();
    }

}