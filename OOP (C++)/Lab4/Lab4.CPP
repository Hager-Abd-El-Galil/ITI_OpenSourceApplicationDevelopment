#include <iostream.h>
#include <conio.h>
#include <string.h>

class Student
{
  int ID;
  char* Name;

  public:

  Student()   //Default Constructor
  {
    ID = 0;
    Name = new char[15];
    strcpy(Name,"N/A");
    cout << "Default";
  }

  Student(int d,char n[])   //Parameterized Constructor
  {
    ID = d;
    Name = new char[strlen(n)+1];
    strcpy(Name,n);
    cout << "Parameterized";
  }

  Student (Student &std);  //Copy Constructor

  ~ Student()   //Destructor
  {
    delete(Name);
    cout << "Destructor";
  }

  int GetID();
  char* GetName();
  void SetID(int id);
  void SetName(char name[]);

  Student operator+(Student s);                      //s1 + s2
  Student operator+(int m);                          //s1 + 5
  friend Student operator+(int m,Student s);         //5 + s2
  Student operator+(char name[]);                   //s1 + "Ahmed"
  friend Student operator+(char name[],Student s);  //"Ahmed" + s2
  Student& operator=(Student s);                     //s1 = s2
  Student operator++();                             //Pre-increment ++s1
  Student operator++(int d);                        //Post-increment  s1++
  operator int();
  operator char*();
  int operator==(Student s);                         //s1 == s2

};

Student FillStudent();
void PrintStudent(Student s);

int main()
{
  Student sd,s1(1,"Hager");
  Student s2;
  clrscr();

  s2 = FillStudent();

  clrscr();

  cout << "Orginal S1";
  PrintStudent(s1);

  cout << endl << "Orginal S2";
  PrintStudent(s2);

 /* cout << endl << "1- S1 + S2";
  PrintStudent(s1+s2);

  cout << endl << "2- S1 + 5";
  PrintStudent(s1+5);

  cout << endl << "3- 5 + S2";
  PrintStudent(5+s2);

  cout << endl << "4- S1 + Ahmed";
  PrintStudent(s1+"Ahmed");

  cout << endl << "5- Ahmed + S2";
  PrintStudent("Ahmed"+s2); */

  s1 = s2;

  cout << endl << "6- S1 = S2";
  PrintStudent(s1);

  /*cout << endl << "7- Post-increment S1++";
  PrintStudent(s1++);

  cout << endl << "8- Pre-increment ++S1";
  PrintStudent(++s1);

  cout << endl << "9- (int)S1" << endl;
  cout << "ID: " << (int)s1 << endl;
  cout << "------------------------------------" << endl;

  cout << "10- (cha*)S1" << endl;
  cout << "Name: " << (char*)s1 << endl;
  cout << "------------------------------------" << endl;


  if(s1 == s2)
  {
     cout << "S1 Equal to S2";
  }
  else
  {
     cout << "S1 Not Equal to S2";
  }     */

  getch();

 return 0;
}

Student:: Student(Student &std)
{
   ID = std.ID;
   Name = new char[strlen(std.Name)+1];
   strcpy(Name,std.Name);
   cout << "Copy";
}

int Student:: GetID()
{
  return ID;
}

char* Student:: GetName()
{
  return Name;
}

void Student:: SetID(int id)
{
  ID = id;
}

void Student:: SetName(char name[])
{
   delete(Name);
   Name = new char[strlen(name)+1];
   strcpy(Name,name);
}

Student FillStudent()
{
  Student s;
  int ID;
  char Name[20];

  cout << endl << "Enter Your ID: ";
  cin >> ID;
  s.SetID(ID);

  cout << "Enter Your Name: ";
  cin >> Name;
  s.SetName(Name);

  return s;
}
void PrintStudent(Student s)
{
  cout << endl << "ID: " << s.GetID() << endl;
  cout << "Name: " <<s.GetName() <<endl;
  cout << "------------------------------------";
}

Student Student:: operator+(Student s)   //s1 + s2
{
   Student temp;
   char name[20];

   temp.ID = ID + s.ID;
   delete(temp.Name);

   strcpy(name,Name);
   strcat(name," ");
   strcat(name,s.Name);
   temp.Name = new char[strlen(name)+1];
   strcpy(temp.Name,name);

  return temp;
}

Student Student:: operator+(int m)   //s1 + 5
{
   Student temp;

   temp.ID = ID + m;
   delete(temp.Name);

   temp.Name = new char[strlen(Name)+1];
   strcpy(temp.Name,Name);

  return temp;
}
Student operator+(int m,Student s)        //5 + s2
{

  return (s + m);

}

Student Student:: operator+(char name[])   //s1 + "Ahmed"
{
   Student temp;
   char pname[20];

   temp.ID = ID;

   delete(temp.Name);

   strcpy(pname,Name);
   strcat(pname," ");
   strcat(pname,name);
   temp.Name = new char[strlen(pname)+1];
   strcpy(temp.Name,pname);

  return temp;
}

Student operator+(char name[],Student s)   //"Ahmed" + s2
{
   char pname[20];

   strcpy(pname,name);
   strcat(pname," ");
   strcat(pname,s.Name);

   delete(s.Name);
   s.Name = new char[strlen(pname)+1];
   strcpy(s.Name,pname);

  return s;
}

Student& Student:: operator=(Student s)    //s1 = s2
{
   ID = s.ID;

   delete(Name);
   Name = new char[strlen(s.Name)+1];
   strcpy(Name,s.Name);
   cout << "Equal";
  return *this;
}

Student Student:: operator++()         //Pre-increment ++s1
{
  ID++;
 return *this;
}

Student Student:: operator++(int d)    //Post-increment
{
   Student old;
   old = *this;
   ID++;
  return old;
}

Student:: operator int()
{
   return ID;
}

Student:: operator char*()
{
   return Name;
}

int Student:: operator==(Student s)
{
   return((ID == s.ID) && !(strcmp(Name,s.Name)));
}