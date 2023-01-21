#include <iostream.h>
#include <conio.h>
#include <string.h>

class Student
{
 private:

   int ID;
   char Name[15];

 public:

 int GetID();
 char* GetName();
 void SetID(int id);
 void SetName(char name[15]);

};

Student FillStudent(void);
void PrintStudent(Student s);

int main()
{
 clrscr();
 Student s;

 s = FillStudent();
 PrintStudent(s);
 getch();


 return 0;
}


int Student:: GetID(void)
{
  return ID;
}

char* Student:: GetName(void)
{
  return Name;
}

void Student:: SetID(int id)
{
  ID = id;
}

void Student:: SetName(char name[15])
{
  strcpy(Name,name);
}

Student FillStudent(void)
{
  Student std;

  int ID;
  char Name[15];
  cout << "Enter Your ID : ";
  cin >> ID;
  std.SetID(ID);

  cout << "Enter Your Name : ";
  cin >> Name;
  std.SetName(Name);

return std;
}

void PrintStudent(Student s)
{

  cout << endl << "ID: " << s.GetID() ;
  cout << endl << "Name: " << s.GetName() << endl;

}