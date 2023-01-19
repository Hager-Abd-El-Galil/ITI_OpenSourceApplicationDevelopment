/*----------There are four ways to write OOP in JavaScript----------*/

//1- Using Constructor functions

function Person1(fullName,money,sleepMood,healthRate)
{
    this.fullName = fullName;
       this.money = money;
       this.sleepMood = sleepMood;
       this.healthRate = healthRate;
}
Object.assign(Person1.prototype,{
    sleep(hours){
        if(hours == 7)
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
        },
        eat(meals){
            switch(meals)
            {
                case 1:
                {
                    this.healthRate = 50;
                    break;
                }
                case 2:
                {
                    this.healthRate = 75;
                    break;
                }
                case 3:
                {
                    this.healthRate = 100;
                    break;
                }
            }
            return this.healthRate;
        },
        buy(items){
            while(items)
            {
                this.money -= 10;
                items--;
            }
              return this.money;  
        }

})
const person1 = new Person1("Mahmoud Ali",200,"Lazy",100);
console.log("/*-----Using Constructor functions-----*/");
console.log("Before Using any Method:");
console.log(person1);
person1.sleep(12);
person1.eat(3);
person1.buy(1);
console.log("After Using all Methods ( hours : 12 , meals : 3 , items : 1 ) :");
console.log(person1);

//2- Using Classes

class Person2{
    constructor (fullName,money,sleepMood,healthRate)
    {
        this.fullName = fullName;
        this.money = money;
        this.sleepMood = sleepMood;
        this.healthRate = healthRate;
    }
    sleep(hours){
        if(hours == 7)
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
                this.healthRate = 50;
                break;
            }
            case 2:
            {
                this.healthRate = 75;
                break;
            }
            case 3:
            {
                this.healthRate = 100;
                break;
            }
        }
      return this.healthRate;
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
const person2 = new Person2("Ahmed Mohammed",100,"Happy",75);
console.log("/*-----Using Clases-----*/");
console.log("Before Using any Method:");
console.log(person2);
person2.sleep(6);
person2.eat(2);
person2.buy(1);
console.log("After Using all Methods ( hours : 6 , meals : 2 , items : 1 ) :");
console.log(person2);

//3- Using Objects Linking to Other Objects (OLOO)

const Person3 = {
    init(fullName,money,sleepMood,healthRate)
    {
        this.fullName = fullName;
        this.money = money;
        this.sleepMood = sleepMood;
        this.healthRate = healthRate;
      return this;
    },
    sleep(hours){
        if(hours == 7)
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
    },
    eat(meals){
        switch(meals)
        {
            case 1:
            {
                this.healthRate = 50;
                break;
            }
            case 2:
            {
                this.healthRate = 75;
                break;
            }
            case 3:
            {
                this.healthRate = 100;
                break;
            }
        }
      return this.healthRate;
    },
    buy(items){
        while(items)
        {
            this.money -= 10;
            items--;
        }
      return this.money;  
    }
    
}
const person3 = Object.create(Person3).init("Alaa Ahmed",1000,"Tired",50);
console.log("/*-----Using Objects Linking to Other Objects (OLOO)-----*/");
console.log("Before Using any Method:");
console.log(person3);
person3.sleep(5);
person3.eat(2);
person3.buy(3);
console.log("After Using all Methods ( hours : 5 , meals : 2 , items : 3 ) :");
console.log(person3);

// 4- Using Factory functions

function Person4(fullName,money,sleepMood,healthRate)
{
    return{
        fullName,
        money,
        sleepMood,
        healthRate,
        sleep(hours){
            if(hours == 7)
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
        },
        eat(meals){
            switch(meals)
            {
                case 1:
                {
                    this.healthRate = 50;
                    break;
                }
                case 2:
                {
                    this.healthRate = 75;
                    break;
                }
                case 3:
                {
                    this.healthRate = 100;
                    break;
                }
            }
          return this.healthRate;
        },
        buy(items){
            while(items)
            {
                this.money -= 10;
                items--;
            }
          return this.money;  
        }
    };
}
const person4 = Person4("Doaa",1500,"Happy",75);
console.log("/*-----Using Factory functions-----*/");
console.log("Before Using any Method:");
console.log(person4);
person4.sleep(7);
person4.eat(1);
person4.buy(10);
console.log("After Using all Methods ( hours : 7 , meals : 1 , items : 10 ) :");
console.log(person4);
