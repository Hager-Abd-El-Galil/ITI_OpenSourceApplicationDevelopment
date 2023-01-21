#include <iostream.h>
#include <conio.h>

class Base
{
   protected:

   int z;

   public:

   Base()
   {
     z = 0;
   }

   Base(int m)
   {
     z = m;
   }

   void SetZ(int n)
   {
     z = n;
   }

   int GetZ()
   {
     return z;
   }
};

class Base1 : virtual public Base
{
   protected:

   int x;

   public:

   Base1()
   {
     x = 0;
   }

   Base1(int m)
   {
     x = m;
   }

   void SetX(int n)
   {
     x = n;
   }

   int GetX()
   {
     return x;
   }
};

class Base2 : virtual public Base
{
   protected:

   int y;

   public:

   Base2()
   {
     y = 0;
   }

   Base2(int m)
   {
     y = m;
   }

   void SetY(int n)
   {
     y = n;
   }

   int GetY()
   {
     return y;
   }
};

class Derived : public Base1,public Base2
{
  public:

  Derived()
  {}

  Derived(int l,int m) : Base2(l),Base1(m)
  {}

  int Product()
  {
    return (x*y*z);
  }

  int Sum()
  {
    return (x+y+z);
  }
};

void main()
{
   Derived drv(3,4);

   clrscr();

   cout << "Product: " << drv.Product() << endl;
   cout << "Sum: " << drv.Sum();

   getch();

}