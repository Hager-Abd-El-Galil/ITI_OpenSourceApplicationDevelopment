#include <stdio.h>
#include <conio.h>
#include <alloc.h>

struct student
{
   int ID;
   char Name[20];
   char Grade[3];
};

struct student FillStudent(void);
void PrintStudent(struct student std);

int main()
{
   int n,j;
   struct student *pStudent;

   printf("Enter No. Of Students: ");
   scanf("%d",&n);

   pStudent = (struct student *)malloc(n * (sizeof (struct student)));

   if(pStudent != NULL)
   {

     for(j=0;j<n;j++)
     {
       printf("\nStudent %d\n",j+1);
       *(pStudent+j) = FillStudent();
     }

     for(j=0;j<n;j++)
     {
       printf("\nStudent %d\n",j+1);
       PrintStudent(*(pStudent+j));
     }
     getch();
     free(pStudent);
   }
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
    printf("Enter Your Grade[%d] : ",i+1);
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
    printf("\nGrade[%d]: %d",i+1,std.Grade[i]);
  }

}