#include <iostream.h>
#include <conio.h>
#include <math.h>

class Point
{
  int x,y;

  public:

  Point(){x = y = 0;}
  Point(int m){x = y = m;}
  Point(int m,int n)
  {
    x = m;
    y = n;
  }
  void SetX(int m){x = m;}
  void SetY(int n){y = n;}
  int GetX(){return x;}
  int GetY(){return y;}
};

class Rectangle_C
{
  Point p1,p2;
  int length,width;

  public:

  Rectangle_C(int x1,int y1,int x2,int y2) : p1(x1,y1),p2(x2,y2)
  {
    length = abs(x2-x1);
    width = abs(y2 - y1);
  }

  void Setp1(int x,int y)
  {
    p1.SetX(x);
    p1.SetY(y);

    length = abs(p2.GetX() - x);
    width = abs(p2.GetY() - y);
  }

  void Setp2(int x,int y)
  {
    p2.SetX(x);
    p2.SetY(y);

    length = abs(p1.GetX() - x);
    width = abs(p1.GetY() - y);
  }

  int Area(){return (length*width);}
};

class Rectangle_A
{
  Point *p1,*p2;
  int length,width;

  public:

  Rectangle_A()
  {
    p1 = p2 = NULL;
    length = width = 0;
  }

  Rectangle_A(Point *pa,Point *pb)
  {
    p1 = pa;
    p2 = pb;

    if(p1 != NULL && p2 != NULL)
    {
      length = abs(p2 -> GetX() - p1 -> GetX());
      width = abs(p2 -> GetY() - p1 -> GetY());
    }
  }

  void Setp1(Point *p)
  {
    p1 = p;

    if(p1 != NULL && p2 != NULL)
    {
      length = abs(p2 -> GetX() - p1 -> GetX());
      width = abs(p2 -> GetY() - p1 -> GetY());
    }

  }

  void Setp2(Point *p)
  {
    p2 = p;

    if(p1 != NULL && p2 != NULL)
    {
      length = abs(p2 -> GetX() - p1 -> GetX());
      width = abs(p2 -> GetY() - p1 -> GetY());
    }

  }

  int Area(){return (length*width);}
};

void main()
{
  clrscr();

  Rectangle_C rect1(3,5,20,35);
  Rectangle_A rect2;
  Point pt1(13);
  Point pt2(4,12);
  Point pt3(9);

  rect2.Setp1(&pt1);
  rect2.Setp2(&pt2);


  cout << "Area of Rect 1: " << rect1.Area() << endl;
  cout << "Area of Rect 2: " << rect2.Area() << endl;

  getch();

}