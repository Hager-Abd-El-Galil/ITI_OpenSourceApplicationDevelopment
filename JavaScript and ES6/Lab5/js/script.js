class Person
{
    #healthRate;
    constructor (fullName,money,sleepMood,healthRate,age)
    {
        this.fullName = fullName;
        this.money = money;
        this.sleepMood = sleepMood;
        this.#healthRate = healthRate;
        this.age = age;
    }
    get healthRate()
    {
        return this.#healthRate;
    }
    set healthRate(healthRate)
    {
        this.#healthRate = healthRate;
        if(healthRate > 100 || healthRate < 0) {this.#healthRate = 100};
    }
    sleep(hours){
        if(hours === 7)
        {
            this.sleepMood = "Happy"; 
        }
        else if(hours > 0 && hours < 7)
        {
            this.sleepMood = "Tired"; 
        }
        else
        {
            this.sleepMood = "Lazy";
        }
      return this.sleepMood;
    }
    eat(meals){
        switch(meals)
        {
            case 1:
            {
                this.#healthRate = 50;
                break;
            }
            case 2:
            {
                this.#healthRate = 75;
                break;
            }
            case 3:
            {
                this.#healthRate = 100;
                break;
            }
        }
      return this.#healthRate;
    }
    buy(items){
        while(items)
        {
            this.money -= 10;
            items--;
        }
      return this.money;  
    }
}
class Employee extends Person
{
    #salary;
    constructor(fullName,money,sleepMood,healthRate,age,id, email, workMood, salary, isManager)
    {
        super(fullName,money,sleepMood,healthRate,age);
        this.id = id;
        this.email = email;
        this.workMood = workMood;
        this.isManager = (isManager === "mngr") ? true:false;
        this.#salary = salary;
    }
    get salary()
    {
        return this.#salary;
    }
    set salary(salary)
    {
        this.#salary = salary;
        if(salary < 1000) {this.#salary = 1000};
    }
    work(hours)
    {
        if(hours === 8)
        {
            this.workMood = "Happy"; 
        }
        else if(hours > 0 && hours < 8)
        {
            this.workMood = "Tired"; 
        }
        else
        {
            this.workMood = "Lazy";
        }
      return this.workMood;
    }
}
class Office 
{
    constructor(name, employees)
    {
        this.name = name;
        this.employees = employees;
    }
    getAllEmployees()
    {
      return this.employees;
    } 
    getEmployee(empId)
    {
        for(let employee of this.employees)
        {
            var Found = 0;
            if(employee.id === empId)
            {
                Found = 1;
                if(employee.isManager == true)
                {
                    console.log(`Full Name: ${employee.fullName}\nMoney: ${employee.money}\nSleep Mood: ${employee.sleepMood}\nHealth Rate: ${employee.healthRate}\nAge: ${employee.age}\nID: ${employee.id}\nEmail: ${employee.email}\nWork Mood: ${employee.workMood}\nisManager: ${employee.isManager}`);   
                }
                else
                {
                    console.log(`Full Name: ${employee.fullName}\nMoney: ${employee.money}\nSleep Mood: ${employee.sleepMood}\nHealth Rate: ${employee.healthRate}\nAge: ${employee.age}\nID: ${employee.id}\nEmail: ${employee.email}\nWork Mood: ${employee.workMood}\nSalary: ${employee.salary}\nisManager: ${employee.isManager}`);
                }
                break;
            }
        }
      return Found;
    } 
    hire(employee)
    {
        this.employees.push(employee);
    }
    fire(empId)
    {
        let index = 0;
        var NotFound = 1;
        for(let employee of this.employees)
        {
            if(employee.id === empId)
            {
                NotFound = 0;
                this.employees.splice(this.employees[index],1);
                break;
            }
            index++;
        }
      return NotFound;
    }
}
function Menu()
{
    var officeName = 'Office-1';
    var empArray = new Array();
    var obj = new Office(officeName,empArray);

    do{
        do{
            var operation = Number(prompt("Welcome to Employees App\nEnter Operation:\n1- Hire New Employee\n2- Fire Employee\n3- Search On Employees\n4- Display All Employees\n5- Exit"));
        }while(operation === null || operation === "");
    
        switch(operation)
        {
            case 1:  //1- Hire New Employee
                {  
                    isManager = prompt("If You Want To Add Manager press \"mngr\" \nIf Normal Employee press \"nrml\" ");
    
                    do{
                        var id = Number(prompt("ID:"));
                    }while(id === null || id === "");
    
                    do{
                        var fullName = prompt("Full Name:");
                    }while(fullName === null || fullName === "");
                
                    do{
                        var salary = Number(prompt("Salary:"));
                    }while(salary === null || salary === "");
                    
                    do{
                        var healthRate = prompt("Health Rate:");
                    }while(healthRate === null || healthRate === "");
    
                    var age = Number(prompt("Age:"));
                    var money = Number(prompt("Money:"));
                    var sleepMood = prompt("Sleep Mood:");  
                    var email = prompt("Email:");
                    var workMood = prompt("Work Mood:");

                    const emp = new Employee(fullName,money,sleepMood,healthRate,age,id,email,workMood,salary,isManager);
                    console.log(emp);
                    obj.hire(emp);

                    submit = confirm("If You Want To do any operation press \"Yes\" ,If No press \"No\" ");
                    break;
                }
                case 2:  //2- Fire Employee
                {  
                    do{
                        var empId = Number(prompt("Employee ID:"));
                    }while(empId === null || empId === "");

                    NotFound = obj.fire(empId);

                    if(NotFound === 0)
                    {
                       alert(`Employee With ID = ${empId} is Fired!`); 
                    }
                    else
                    {
                        alert(`No Employee With ID = ${empId}`);
                    }
                    
                    submit = confirm("If You Want To do any operation press \"Yes\" ,If No press \"No\" ");
                    break;
                }
                case 3:  //3- Search On Employees
                {
                    do{
                        var empId = Number(prompt("Employee ID:"));
                    }while(empId === null || empId === "")

                    Found = obj.getEmployee(empId); 

                    if(Found === 0)
                    {
                        alert(`Not Found Employee With ID = ${empId}`);
                    }

                    submit = confirm("If You Want To do any operation press \"Yes\" ,If No press \"No\" ");
                    break;
                }
                case 4:  //4- Display All Employees
                {
                    empArray = obj.getAllEmployees();
                    for(let employee of empArray)
                    {
                        console.log(`Full Name: ${employee.fullName}\nMoney: ${employee.money}\nSleep Mood: ${employee.sleepMood}\nHealth Rate: ${employee.healthRate}\nAge: ${employee.age}\nID: ${employee.id}\nEmail: ${employee.email}\nWork Mood: ${employee.workMood}\nSalary: ${employee.salary}\nisManager: ${employee.isManager}`);  
                    }
                    submit = confirm("If You Want To do any operation press \"Yes\" ,If No press \"No\" ");
                    break;
                    
                }
                case 5:  //5- Exit
                {
                    submit = false;
                    break;
                }
                default:
                {
                    alert("Please Enter a valid Operation\n1- Hire New Employee\n2- Fire Employee\n3- Search On Employees\n4- Display All Employees\n5- Exit");
                    break;
                }   
        }
    }while(submit);
}






