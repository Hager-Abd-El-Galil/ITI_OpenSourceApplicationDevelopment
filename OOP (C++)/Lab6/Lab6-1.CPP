include <iostream.h>
#include <conio.h>
#include <string.h>


class Person
{
  protected:

  int ID;
  char Name[15];

  public:

  Person()   //Default Constructor
  {
    ID = 0;
    strcpy(Name,"N/A");
  }

  Person(int d,char n[])   //Parameterized Constructor
  {
    ID = d;
    strcpy(Name,n);
  }

  int GetID()
  {
    return ID;
  }

  char* GetName()
  {
    return Name;
  }

  void SetID(int id)
  {
     ID = id;
  }

  void SetName(char name[])
  {
     strcpy(Name,name);
  }

};

class Employee : public Person
{
  protected:

  int Salary;

  public:

  Employee()   //Default Constructor
  {
    Salary = 0;
  }

  Employee(int d,char n[],int s) : Person(d,n)
  {
    Salary = s;
  }

  int GetSalary()
  {
    return Salary;
  }

  void SetSalary(int s)
  {
     Salary = s;
  }
};

class Customer : public Person
{
  protected:

  char Phone[11];

  public:

  Customer()   //Default Constructor
  {
    strcpy(Phone,"012");
  }

  Customer(int d,char n[],char p[]) : Person(d,n)
  {
    strcpy(Phone,p);
  }

  char* GetPhone()
  {
    return Phone;
  }

  void SetPhone(char p[])
  {
     strcpy(Phone,p);
  }
};

void main()
{
   clrscr();

   Employee emp(1,"Hager",10000);

   cout << endl << "Employee" << endl;
   cout << endl << "ID " << emp.GetID() << endl;
   cout << "Name: " << emp.GetName() << endl;
   cout << "Salary: " << emp.GetSalary() << endl;
   cout << "------------------------------" << endl;

   Customer customer(1,"Hager","01201422915");

   cout << endl << "Customer" << endl;
   cout << endl << "ID " << customer.GetID() << endl;
   cout << "Name: " << customer.GetName() << endl;
   cout << "Phone: " << customer.GetPhone() << endl;

   getch();
}




