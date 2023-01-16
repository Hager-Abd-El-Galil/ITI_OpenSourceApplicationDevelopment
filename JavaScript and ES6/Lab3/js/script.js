/*-------------PART 1-------------*/ 
/*------------LogIn------------*/
function logIn()
{
    do{
        var userName = prompt("User Name: ");
    }while(userName === null || userName === "");
    do{
        var password = prompt("Password: ");
    }while(password === null || password === "");

    if(userName === "admin" && password === "421$$")
    {
        confirm("Welcome login success");
    }
    else
    {
       alert("Invalid User Name Or Password,Please Try Again");
       logIn()
    }   
}
/*------------simple Calculator------------*/
function simpleCalculator()
{
    confirm("Welcome to calculator");

    do{
        var FirstNumber = prompt("First Number:");
    }while(FirstNumber === null || FirstNumber === "" || isNaN(Number(FirstNumber)) === true);

    do{
        var operation = prompt("Operation:\n1-sum\n2-subtract\n3-multiply\n4-divide\n5-modulus");
    }while(operation === null || operation === "");
    
    do{
        var SecondNumber = prompt("Second Number:");
    }while(SecondNumber === null || SecondNumber === "" || isNaN(Number(SecondNumber)) === true);
    
    var result = Operations(operation,FirstNumber,SecondNumber);
   return result; 
}
function Operations(operation,FirstNumber,SecondNumber)
{
    var result;
    switch (operation)
    {
        case "sum":
         {
            result = Number(FirstNumber) +  Number(SecondNumber);
            confirm(Number(FirstNumber) + " + " + Number(SecondNumber) + " = " + result);
            break;
         }
        case "subtract":
        {
            result = Number(FirstNumber) -  Number(SecondNumber);
            confirm(Number(FirstNumber) + " - " + Number(SecondNumber) + " = " + result);
            break;
        }    
        case "multiply":
        {
            result = Number(FirstNumber) *  Number(SecondNumber);
            confirm(Number(FirstNumber) + " * " + Number(SecondNumber) + " = " + result);
            break;
        }        
        case "divide":
        {
            if(Number(SecondNumber) !== 0)
            {
                result = Number(FirstNumber) /  Number(SecondNumber);
                confirm(Number(FirstNumber) + " / " + Number(SecondNumber) + " = " + result);
            }
            else
            {
                alert("Error!\nDivision By Zero");
            }
            break;
        }   
        case "modulus":
        {
            result = Number(FirstNumber) %  Number(SecondNumber);
            confirm(Number(FirstNumber) + " % " + Number(SecondNumber) + " = " + result);
            break;
        }
        default:
        {   
            alert("Invalid Operation \"" +`${operation}`+"\"");            
        } 
    }
    return result;   
}
/*------------BONUS:complex Calculator------------*/
function complexCalculator()
{
    var result;
    result = simpleCalculator();
    submit = confirm("If You Want To do any operation press \"Yes\" ,If No press \"No\" ");
    while(submit)
    {
        do{
            var operation = prompt("Operation:\n1-sum\n2-subtract\n3-multiply\n4-divide\n5-modulus");
        }while(operation === null || operation === "");
        do{
            var number = prompt("Number:");
        }while(number === null || number === "" || isNaN(Number(number)) === true);

        result = Operations(operation,result,number);
        submit = confirm("If You Want To do any operation press \"Yes\" ,If No press \"No\" ");
    }

}

/*-------------PART 2-------------*/ 
/*------------Array Of Numbers------------*/
function arrayOfNumbers()
{
    do{
        var noOfNumbers = prompt("Enter No. of Numbers:");
    }while(noOfNumbers === null || noOfNumbers === "");

    if(Number(noOfNumbers) > 0 && isNaN(Number(noOfNumbers)) === false)
    {
        const arr = new Array();
        for(var i = 0;i < noOfNumbers; i++)
        {
            var num = Number(prompt("Number "+ `${i+1}`+ ":"));
            arr.push(num);
            if(isNaN(num) == true || num == "")
            {
                alert("Please Enter Numbers Only");
                arr.pop(num);
                i--;
            }
        }
        var sum = 0;
        for(var j = 0;j < noOfNumbers; j++)
        {
            sum += arr[j];
        }
        var avg;
        avg = sum/noOfNumbers;
        alert("Numbers = " + arr + "\nSum = " + sum +"\nAverage = " + avg);
    }
    else
    {
        alert("Invalid No. of Numbers,Please Enter a valid Number");
        arrayOfNumbers();
    }
}
/*------------phone Book App------------*/
function phoneBookApp()
{
    var contacts = new Array();
    do{
        do{
            var operation = prompt("Welcome to Phone Book App\nEnter Operation:");
        }while(operation === null || operation === "");
        
        switch (operation)
        {
           case "add":
            {
                contacts = add(contacts);
                break;
            }
           case "search":
            {
                search(contacts);
                break;
            }
            case "exit":
            {
                submit = false;
                break;
            }
            default:
            {
                alert("Please Enter a valid Operation\n1- add\n2- search\n3- exit");
                break;
            }   
                
        }

    }while(submit)
}
function add(contacts)
{
    do{
        var name = prompt("New Contact \nName:");
    }while(name === null || name === "");

    do{
        var phoneNumber = prompt("New Contact \nPhone Number:");
    }while(phoneNumber === null || phoneNumber === "");
    
    var newContact = new Object();
    newContact = {
        "Name" : `${name}`,
        "Phone Number" : `${phoneNumber}`
    };
    for(var contact in newContact)
    {
        console.log(contact + " : " + `${newContact[contact]}` + "\n");
    }
    contacts.push(newContact);
    console.log(contacts);
    submit = confirm("If You Want To do any operation press \"Yes\" ,If No press \"No\" ");
  return contacts;  
}
function search(contacts)
{
    do{
        var searchword = prompt("\nEnter Contact Name or Phone Number:");
    }while(searchword === null || searchword === "");

    var findWord = false;

    for(let i = 0;i < contacts.length;i++)
    {
        if(searchword === contacts[i]["Name"] || searchword === contacts[i]["Phone Number"] )
        {
            alert(JSON.stringify(contacts[i]));
            findWord = true;
        }
    }
    if(findWord == false)
    {
       alert("Not Found!");
    }
    submit = confirm("If You Want To do any operation press \"Yes\" ,If No press \"No\" ");
}
/*------------BONUS:Area Calculator------------*/
function areaCalculator()
{
    do{
        var shapeName = prompt("1- Circle\n2- Triangle\n3- Square\n4- Rectangle\n5- Parallelogram\n6- Trapezium\n7- Ellipse\nEnter Shape Name:");
    }while(shapeName === null || shapeName === "");
    var area;
    switch (shapeName)
    {
        case "Circle":
        {
            do{
                var redius = prompt("\nEnter circle Radius:");
            }while(redius === null || redius === "");
            if(Number(redius) > 0 && isNaN(Number(redius)) === false)
            {
                area = Math.PI *pow(radius,2);
                confirm("Area of " + `${shapeName}` + " = " + `${area}`);
            }
            else
            {
               alert("Invalid Dimension");    
            }
            break;
        }
        case "Triangle":
        {
            do{
                var base = prompt("\nEnter Triangle Base:");
            }while(base === null || base === "");
            do{
                var height = prompt("\nEnter Triangle Height:");
            }while(height === null || height === "");
            if(Number(base) > 0 && isNaN(Number(base)) === false && Number(height) > 0 && isNaN(Number(height)) === false)
            {
                area = 0.5 * base * height;
                confirm("Area of " + `${shapeName}` + " = " + `${area}`);
            }
            else
            {
               alert("Invalid Dimensions");    
            }
            break;
        }
        case "Square":
        {
            do{
                var length = prompt("\nEnter Square length:");
            }while(length === null || length === "");
            if(Number(length) > 0 && isNaN(Number(length)) === false)
            {
                area = length * length;
                confirm("Area of " + `${shapeName}` + " = " + `${area}`);
            }
            else
            {
               alert("Invalid Dimension");    
            }
            break;
        }
        case "Rectangle":
        {
            do{
                var width = prompt("\nEnter Rectangle Width:");
            }while(width === null || width === "");
            do{
                var length = prompt("\nEnter Rectangle Length:");
            }while(length === null || length === "");
            if(Number(width) > 0 && isNaN(Number(width)) === false && Number(length) > 0 && isNaN(Number(length)) === false)
            {
                area = width * length;
                confirm("Area of " + `${shapeName}` + " = " + `${area}`);
            }
            else
            {
               alert("Invalid Dimensions");    
            }
            break;
        }
        case "Parallelogram":
        {
            do{
                var base = prompt("\nEnter Parallelogram Base:");
            }while(base === null || base === "");
            do{
                var height = prompt("\nEnter Parallelogram Height:");
            }while(height === null || height === "");
            if(Number(base) > 0 && isNaN(Number(base)) === false && Number(height) > 0 && isNaN(Number(height)) === false)
            {
                area = base * height;
                confirm("Area of " + `${shapeName}` + " = " + `${area}`);
            }
            else
            {
               alert("Invalid Dimensions");    
            }
            break;
        }
        case "Trapezium":
        {
            do{
                var length1 = prompt("\nEnter Trapezium First Length:");
            }while(length1 === null || length1 === "");
            do{
                var length2 = prompt("\nEnter Trapezium Second Length:");
            }while(length2 === null || length2 === "");
            do{
                var height = prompt("\nEnter Trapezium Height:");
            }while(height === null || height === "");
            if(Number(length1) > 0 && isNaN(Number(length1)) === false && Number(length2) > 0 && isNaN(Number(length2)) === false && Number(height) > 0 && isNaN(Number(height)) === false)
            {
                area = 0.5 * (length1 + length2) * height;
                confirm("Area of " + `${shapeName}` + " = " + `${area}`);
            }
            else
            {
               alert("Invalid Dimensions");    
            }
            break;
        }
        case "Ellipse":
        {
            do{
                var minorAxis = prompt("\nEnter Ellipse Minor Axis:");
            }while(minorAxis === null || minorAxis === "");
            do{
                var majorAxis = prompt("\nEnter Ellipse Major Axis:");
            }while(majorAxis === null || majorAxis === "");
            if(Number(minorAxis) > 0 && isNaN(Number(minorAxis)) === false && Number(majorAxis) > 0 && isNaN(Number(majorAxis)) === false)
            {
                area = Math.PI * (0.5*minorAxis) * (0.5*majorAxis);
                confirm("Area of " + `${shapeName}` + " = " + `${area}`);
            }
            else
            {
               alert("Invalid Dimensions");    
            }
            break;
        }
        default:
        {
            alert("Invalid Shape Name");    
            break;
        }
    }
}

/*-------------PART 3-------------*/ 
/*------------Objects predefined methods------------*/
//create()
const person = {
    Name: "Ahmed",
    age: 26
  }; 
const me = Object.create(person);
me.Name = "Hager";
me.age = 23;
console.log(me); //{Name: 'Hager', age: 23}
//freeze()
const Human = {
    age: 25
  }; 
Object.freeze(Human); 
//obj.age = 33; //Error (can't change it)
//entries()
const object = {
    a: 'somestring',
    b: 42
  };
  for (const [key, value] of Object.entries(object)) {
    console.log(`${key}: ${value}`);   //a: somestring    b: 42
  }
//hasOwn()  and hasOwnProperty()
  const object1 = {
    prop: 'exists'
  };
  console.log(Object.hasOwn(object1, 'prop')); //true
  console.log(object1.hasOwnProperty('prop')); //true
//is()
console.log(Object.is(25, 25)); // true
console.log(Object.is("new", "hi")); // false
//isExtensible()  and  preventExtensions()
const obj = {
    prop :"yes"
};
console.log(Object.isExtensible(obj)); //true
obj.message = "hi";
console.log(obj);
Object.preventExtensions(obj);
obj.newmessage = "hello";
console.log(obj);
console.log(Object.isExtensible(obj)); //false
//seal()  and  isSealed()
const obj2 = {
    property: 42
  };
console.log(Object.isSealed(obj2)); //false
Object.seal(obj2); //can't delete or add property but can change property value
delete obj2.property;
console.log(obj2);
console.log(Object.isSealed(obj2)); //true
/*------------Arrays predefined methods------------*/
//reduce()
var result = [1, 100].reduce((a,b) => Math.max(a, b),50); 
console.log(result);  //100

var result = [1, 2, 3, 4, 5].reduce(
    (accumulator, currentValue) => accumulator + currentValue,
    0,
  );
console.log(result);  //15
//reverse()
var array = ['one', 'two', 'three'];
console.log('array:', array); //["one", "two", "three"]
const reversed = array.reverse();
console.log('array1:', array); //["three", "two", "one"]
//some()
var arr = [1, 2, 3, 4, 5];
const even = (element) => element % 2 === 0;
console.log(arr.some(even)); //true
//values()
var array = ['a', 'b', 'c'];
const iterator = array.values();
for(var value of iterator)
{ 
    console.log(value); // a  b  c
}
//at()
var array = [5, 12, 8, 130, 44];
console.log(array.at(2));
//every()
var array = [1, 30, 39, 29, 10, 13];
console.log(array.every((currentValue) => currentValue < 40)); //true
//fill()
var array = [1, 2, 3, 4];
console.log(array.fill(0, 2, 4)); //[1, 2, 0, 0]
console.log(array.fill(5, 1)); //[1, 5, 5, 5]
console.log(array.fill(5));  //[5, 5, 5, 5]
//flat()
var array = [0, 1, 2, [3, 4]];
console.log(array.flat());
//copyWithin()
var array = ['a', 'b', 'c', 'd', 'e'];
console.log(array.copyWithin(0, 3, 4)); //['d', 'b', 'c', 'd', 'e']
//from
console.log(Array.from('welcome')); //['w', 'e', 'l', 'c', 'o', 'm', 'e']
console.log(Array.from([1, 2, 3], x => x + x)); //[2, 4, 6]
