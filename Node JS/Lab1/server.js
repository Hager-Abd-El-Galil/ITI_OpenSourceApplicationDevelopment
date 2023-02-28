var http = require("http");
var fs = require("fs");
fs.writeFileSync("result.txt","Welcome To Calcular Result \n");

http.createServer((req,res)=>{

    if(req.url !== '/favicon.ico'){

        var urlArray = req.url.split("/");
        var numberOfNum = urlArray.length - 2;
        var operation = urlArray[1];
        var numbers = [];  //Array Of Numbers
        var result = 0;
        
        for(let i = 2; i <= numberOfNum; i++){
            numbers.push(Number(urlArray[i]));
        }
        
        switch(operation){
         case 'add':
         {
            for(let i = 0; i < numbers.length; i++){
                result += numbers[i];
            }  
            break;
         }
         case 'sub':
         {  
            result = numbers[0];  //intial number
            for(let i = 1; i < numbers.length; i++){
                result -= numbers[i];
            } 
            break;
         }
         case 'multiply':
         {
            result = 1;

            for(let i = 0; i < numbers.length; i++){
                result *= numbers[i];
            } 
            break;
         }
         case 'div':
         {
            result = numbers[0];  //intial number
            for(let i = 1; i < numbers.length; i++){
                if(numbers[i] !== 0){
                    result /= numbers[i].toFixed(2);
                }
                else{
                    result = "Infinity";
                }     
            } 

            break;
         }
         default:
         {
            result = 'Undefined';
            break;
         }
            
        }
        
        res.writeHead(200);
        fs.appendFileSync("result.txt",`The Result Of ${operation} ${numbers} is ${result}\n`);
    }
    res.end(`<h1>The Result Of ${operation} ${numbers} is ${result}</h1>`);
    
    
})
.listen("7000",()=>{
    console.log("Successful");
})