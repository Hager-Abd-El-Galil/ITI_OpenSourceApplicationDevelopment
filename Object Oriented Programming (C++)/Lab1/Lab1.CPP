#include <iostream.h>
#include <conio.h>

struct Student
{
  int ID;
  char Name[15];
};

Student FillStudent(void);
void PrintStudent(Student std);

int main()
{
   int n;
   Student *pStudent;

   cout << "Enter No. Of Students: ";
   cin >> n;

   pStudent = new Student[n];

   if(pStudent != NULL)
   {

     for(int j=0;j<n;j++)
     {
       cout << endl << "Student" << j+1 << endl;
       *(pStudent+j) = FillStudent();
     }

     for(j=0;j<n;j++)
     {
       cout << endl << "Student" << j+1 << endl;
       PrintStudent(*(pStudent+j));
     }
     getch();
     delete(pStudent);
   }
 return 0;

}

Student FillStudent(void)
{
  Student std;

  cout << "Enter Your ID : ";
  cin >> std.ID;
  cout << "Enter Your Name : ";
  cin >> std.Name;

return std;
}

void PrintStudent(Student std)
{

  cout << endl << "ID: " << std.ID;
  cout << endl << "Name: " << std.Name << endl;

}