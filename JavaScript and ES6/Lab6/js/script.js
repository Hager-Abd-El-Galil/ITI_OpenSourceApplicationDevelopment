/*--------------------------------Using Classes--------------------------------*/
console.log("/*--------------Using Classes--------------*/");
/*-----------------------Part 1-----------------------*/

class Shape{
   name;
   sides;
   sideLength;

   constructor(name,sides,sideLength){
    this.name = name;
    this.sides = sides;
    this.sideLength = sideLength;
   }

   calcPerimeter(){
     var perimeter = this.sideLength * this.sides;
     console.log(`The Perimeter of ${this.name} with side length = ${this.sideLength} is ${perimeter}`);
   }
}

console.log("/*-------Part 1-------*/");
var square = new Shape("square",4,5);
square.calcPerimeter(); //The Perimeter of square with side length = 5 is 20
var triangle = new Shape("triangle",3,3);
triangle.calcPerimeter(); //The Perimeter of triangle with side length = 3 is 9

/*-----------------------Part 2-----------------------*/

class Square extends Shape{
    constructor(sideLength,name = "square",sides = 4){
      super(name,sides);
      this.sideLength = sideLength;
    }
    calcArea(){
        var area = this.sideLength * this.sideLength;
        console.log(`The Area of ${this.name} with side length = ${this.sideLength} is ${area}`);
      }
}

console.log("/*-------Part 2-------*/");
var square = new Square(4);
square.calcPerimeter(); //The Perimeter of square with side length = 4 is 16
square.calcArea(); //The Area of square with side length = 4 is 16

/*--------------------------------Using Constructor Function--------------------------------*/
console.log("/*--------------Using Constructor Function--------------*/");
/*-----------------------Part 1-----------------------*/

function ShapeFunc(name,sides,sideLength){
    this.name = name;
    this.sides = sides;
    this.sideLength = sideLength;
}
ShapeFunc.prototype.calcPerimeter = function(){
  var perimeter = this.sideLength * this.sides;
     console.log(`The Perimeter of ${this.name} with side length = ${this.sideLength} is ${perimeter}`);
}

console.log("/*-------Part 1-------*/");
var square = new ShapeFunc("square",4,5);
square.calcPerimeter(); //The Perimeter of square with side length = 5 is 20
var triangle = new ShapeFunc("triangle",3,3);
triangle.calcPerimeter(); //The Perimeter of triangle with side length = 3 is 9

/*-----------------------Part 2-----------------------*/

function SquareFunc(sideLength,name,sides){
  ShapeFunc.call(this,name = "square",sides = 4);
  this.sideLength = sideLength;
}

SquareFunc.prototype = ShapeFunc.prototype;
SquareFunc.prototype = new SquareFunc();
SquareFunc.prototype.constructor = SquareFunc;

SquareFunc.prototype.calcArea = function(){
  var area = this.sideLength * this.sideLength;
  console.log(`The Area of ${this.name} with side length = ${this.sideLength} is ${area}`);
}

console.log("/*-------Part 2-------*/");
var square = new SquareFunc(4);
square.calcPerimeter(); //The Perimeter of square with side length = 4 is 16
square.calcArea(); //The Area of square with side length = 4 is 16

/*-----------------------Part 3-----------------------*/

class Triple{
    static customName = "Triple";
    static description = "I triple any number you provide";

    static calculate(n = 1){
        return n*3;
    } 
}

class SquaredTriple extends Triple{
    static longDescription;
    static description = "I square the triple of any number you provide";
    
    static calculate(n){
        return Triple.calculate(n) * Triple.calculate(n);
    }    
}

console.log("/*-------Part 3-------*/");
console.log(Triple.description); // I triple any number you provide
console.log(Triple.calculate()); // 3
console.log(Triple.calculate(6)); // 18
console.log(SquaredTriple.calculate(3)); // 81 
console.log(SquaredTriple.description); // I square the triple of any number you provide
console.log(SquaredTriple.longDescription); // undefined
console.log(SquaredTriple.customName); //Triple


