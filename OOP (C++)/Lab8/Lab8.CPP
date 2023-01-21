#include <iostream.h>
#include <conio.h>
#include <fstream.h>

class Point3D
{
   int x,y,z;

   public:

   Point3D()
   {
     x = y = z = 0;
   }

   Point3D(int a,int b,int c)
   {
     x = a;
     y = b;
     z = c;
   }

   void SetX(int l)
   {
      x = l;
   }

   void SetY(int m)
   {
      y = m;
   }

   void SetZ(int n)
   {
      z = n;
   }

   int GetX()
   {
      return x;
   }

   int GetY()
   {
      return y;
   }

   int GetZ()
   {
      return z;
   }

   friend ostream& operator << (ostream &out,Point3D pt);
   friend istream& operator >> (istream &in,Point3D &pt);

};

void main()
{
   Point3D obj(4,5,6),obj1,obj2(1,1,1),obj3(0,1,2);
   clrscr();

  /* cout << "Old Values of Object" << endl;
   cout << obj;
   cout << "---------------------------------" << endl;
   cin >> obj;
   cout << "---------------------------------" << endl;
   cout << "New Values of Object" << endl;
   cout << obj;
   cout << "---------------------------------" << endl; */

   cout << "TEXT FILE" <<endl;

   ofstream Wr;
   Wr.open("demo.txt",ios::out);
   Wr << obj;
   cout << "Data is Written Succefully" << endl;
   Wr.close();

   ifstream R;
   R.open("demo.txt",ios::in);
   R >> obj1;
   R.close();
   cout << "Data is Read Succefully" << endl;
   cout << obj1 << endl;
   cout << "---------------------------------" << endl;

   cout << "BINARY FILE" <<endl;

   fstream WR;

   WR.open("demo.dat",ios::out | ios::binary);
   WR.write((char*) &obj2,sizeof(Point3D));
   cout << "Data is Written Succefully" << endl;
   WR.close();

   WR.open("demo.dat",ios:: in | ios::binary);
   WR.read((char*) &obj3,sizeof(Point3D));
   cout << "Data is Read Succefully" << endl;
   WR.close();

   cout << obj3;

   getch();
}

ostream& operator << (ostream &out,Point3D pt)
{
   out << pt.x << endl;
   out << pt.y << endl;
   out << pt.z << endl;

   return out;
}

istream& operator >> (istream &in,Point3D &pt)
{
   //cout << "Enter the value of X : ";
   in >> pt.x;

   //cout << "Enter the value of Y : ";
   in >> pt.y;

   //cout << "Enter the value of Z : ";
   in >> pt.z;

   return in;
}