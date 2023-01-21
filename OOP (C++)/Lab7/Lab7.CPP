#include <iostream.h>
#include <conio.h>

class Shape
{
   protected:

   int Dim1,Dim2;

   public:

   Shape()
   {
      Dim1 = Dim2 = 0;
   }

   Shape(int m)
   {
      Dim1 = Dim2 = m;
   }

   Shape(int m,int n)
   {
      Dim1 = m;
      Dim2 = n;
   }

   void SetD1(int m)
   {
     Dim1 = m;
   }

   void SetD2(int n)
   {
     Dim1 = n;
   }

   int GetD1()
   {
     return Dim1;
   }

   int GetD2()
   {
     return Dim2;
   }

   virtual float Area() = 0;
};

class Circle : public Shape
{
  public:

  Circle(){}

  Circle(int r) : Shape(r)
  {}

  float Area()
  {
    return (3.14*Dim1*Dim2);
  }
};

class Rectangle : public Shape
{
  public:

  Rectangle(){}

  Rectangle(int l,int w) : Shape(l,w)
  {}

  float Area()
  {
    return (1.0*Dim1*Dim2);
  }
};

class Triangle : public Shape
{
  public:

  Triangle(){}

  Triangle(int b,int h) : Shape(b,h)
  {}

  float Area()
  {
    return (0.5*Dim1*Dim2);
  }
};

class Square : public Rectangle
{
  public:

  Square(){}

  Square(int s) : Rectangle(s,s)
  {}

};

class GeoShape
{
  Shape **ptr;
  int size;

  public:

  GeoShape(Shape **ptr,int size)
  {
       this -> ptr = ptr;
       this -> size = size;
  }

  float TotalArea()
  {
     float Total = 0;

     for(int i = 0;i<size;i++)
     {
       Total += ptr[i] -> Area();
     }
   return Total;
  }
};

void main()
{
   clrscr();

   Shape* myshapes[8];

   Circle C(7);
   Rectangle R(20,5);
   Triangle T(10,20);
   Square S(6);

   myshapes[0] = &C;
   myshapes[1] = &R;
   myshapes[2] = &T;
   myshapes[3] = &S;


   GeoShape G(myshapes,4);

   cout << "Total Area Equal to " << G.TotalArea();

   getch();


}