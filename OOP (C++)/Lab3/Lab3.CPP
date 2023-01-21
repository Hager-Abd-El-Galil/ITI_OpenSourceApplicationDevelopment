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
  }

  Student(int d,char n[])   //Parameterized Constructor
  {
    ID = d;
    Name = new char[strlen(n)+1];
    strcpy(Name,n);
  }

  Student (Student &std);  //Copy Constructor

  ~ Student()   //Destructor
  {
    delete(Name);
  }

  int GetID();
  char* GetName();
  void SetID(int id);
  void SetName(char name[]);
  Student& operator=(Student s);

};

Student FillStudent();
void PrintStudent(Student s);

int main()
{
  Student s;
  Student sp(2,"Hager");
  clrscr();

 /* cout << "Default Data";
  PrintStudent(sd);

  cout << endl << "Parameterized Data";
  PrintStudent(sp); */

  s= FillStudent();
  PrintStudent(s);

  getch();

 return 0;
}

Student:: Student(Student &std)
{
   ID = std.ID;
   Name = new char[strlen(std.Name)+1];
   strcpy(Name,std.Name);
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
  cout << endl << "Student Data" << endl;
  cout << "ID: " << s.GetID() << endl;
  cout << "Name: " <<s.GetName() <<endl;
}

Student& Student:: operator=(Student s)
{
   ID = s.ID;

   delete(Name);
   Name = new char[strlen(s.Name)+1];
   strcpy(Name,s.Name);
   cout << "Equal";
  return *this;
}