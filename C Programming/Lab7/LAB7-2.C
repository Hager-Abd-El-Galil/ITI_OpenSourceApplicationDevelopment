#include <stdio.h>
#include <conio.h>

struct student
{
   int ID;
   char Name[20];
   int Grade[3];
};

struct student FillStudent(void);
void PrintStudent(struct student std);

int main()
{
   int j;
   struct student Student[3];

   for(j=0;j<3;j++)
   {
     printf("\nStudent %d\n",j+1);
     Student[j] = FillStudent();
   }

   for(j=0;j<3;j++)
   {
     printf("\nStudent %d\n",j+1);
     PrintStudent(Student[j]);
   }
   getch();

 return 0;

}

struct student FillStudent(void)
{
  struct student std;
  int i;

  printf("Enter Your ID : ");
  scanf("%d",&std.ID);
  printf("Enter Your Name : ");
  scanf("%s",std.Name);

  for(i=0;i<3;i++)
  {
    printf("Enter Your Grades[%d] : ",i+1);
    scanf("%d",&std.Grade[i]);
  }


return std;
}

void PrintStudent(struct student std)
{
  int i;

  printf("\nID: %d",std.ID);
  printf("\nName: %s",std.Name);

  for(i=0;i<3;i++)
  {
    printf("\nGrades[%d]: %d",i+1,std.Grade[i]);
  }

}
