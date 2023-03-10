#include <stdio.h>
#include <conio.h>
#include <string.h>

struct Student
{
  int ID;
  char Name[20];
  int Grade[3];
};

struct Student ar[10];
int size;

void Menu(void);
struct Student FillStudent(void);
void PrintAll(struct Student ar[]);
void BubbleSort(struct Student ar[]);
void MergeSort(int LB,int UB);
void Merge(int low,int mid,int high);
int BinarySearch(struct Student ar[],int LB,int UB,int data);

int main()
{
  Menu();

 return 0;
}

void Menu(void)
{
  int y,i,n,ret,data,studentno;
  char ch;
  struct Student s;

  clrscr();

  gotoxy(1,1);
  printf("1.BUBBLE SORT");
  gotoxy(1,2);
  printf("2.MERGE SORT");
  gotoxy(1,3);
  printf("3.BINARY SEARCH");
  gotoxy(1,4);
  printf("4.FILL STUDENT");
  gotoxy(1,5);
  printf("5.PRINT ALL");
  gotoxy(1,6);
  printf("6.EXIT");
  gotoxy(1,1);


  while(ch!=27)
  {
   ch = getch();
   y=wherey();

   if(ch==72)      //Up Arrow
   {
    if(y==1)
    {
      gotoxy(1,6);
    }
    else
    {
      gotoxy(1,y-1);
    }
   }

   if(ch==80)    //Down Arrrow
   {
    if(y==6)
    {
      gotoxy(1,1);
    }
    else
    {
     gotoxy(1,y+1);
    }
   }

   if(ch==49)     //End
   {
     gotoxy(1,6);
   }

   if(ch==55)    //Home
   {
     gotoxy(1,1);
   }

   switch(y)
   {
     case 1:
      {
		if(ch==13)
		{
		  clrscr();
		  BubbleSort(ar);
		  printf("Bubble Sort is Done...");
		  PrintAll(ar);
		  getch();

		  if(ch==13)
		  {
			clrscr();
			Menu();
		  }
		}
		break;
      }
     case 2:
      {
		if(ch==13)
		{
		  clrscr();
		  MergeSort(0,size-1);
		  printf("Merge Sort is Done...");
		  PrintAll(ar);
		  getch();

		  if(ch==13)
		  {
		  clrscr();
		  Menu();
		  }
		}
		break;
      }
       case 3:
      {
		if(ch==13)
		{
		  clrscr();
		  printf("Enter ID: ");
		  scanf("%d",&data);
		  ret = BinarySearch(ar,0,size-1,data);

		  if(ret != -1)
		  {
			 printf("\n\nStudent Data");
			 printf("\nID: %d",ar[ret].ID);
			 printf("\nName: %s",ar[ret].Name);

			 for(i=0;i<3;i++)
			 {
			printf("\nGrades[%d]: %d",i+1,ar[ret].Grade[i]);
			 }
			 printf("\n\nBinary Search is Done...");
		  }
		  else
		  {
		   printf("Not Found!\nThere is a problem!");
		  }
		  getch();

		  if(ch==13)
		  {
			clrscr();
			Menu();
		  }
		}
		break;
      }
       case 4:
      {
		if(ch==13)
		{
		  clrscr();
		  printf("Enter No. of Students : ");
		  scanf("%d",&studentno);
		  size = studentno;

		  for(n=0;n<studentno;n++)
		  {
			printf("\nStudent No. %d\n",n+1);
			ar[n] = FillStudent();
		  }

		  getch();

		  if(ch==13)
		  {
			clrscr();
			Menu();
		  }
		}
		break;
      }
      case 5:
      {
		if(ch==13)
		{
		  clrscr();
		  PrintAll(ar);
		  getch();

		  if(ch==13)
		  {
			clrscr();
			Menu();
		  }
		}
		break;
      }
      case 6:
      {
		   if(ch==13)
		   {
		 ch=27;
		   }
		break;
      }
    }
  }
}

struct Student FillStudent(void)
{
  struct Student s;
  int i;

  printf("Enter Your ID : ");
  scanf("%d",&s.ID);
  printf("Enter Your Name : ");
  scanf("%s",s.Name);

  for(i=0;i<3;i++)
  {
    printf("Enter Your Grades[%d] : ",i+1);
    scanf("%d",&s.Grade[i]);
  }

return s;
}

void PrintAll(struct Student ar[])
{
  int i,j;

  for(j=0;j<size;j++)
  {
    printf("\n\nStudent Data");
    printf("\nID: %d",ar[j].ID);
    printf("\nName: %s",ar[j].Name);

    for(i=0;i<3;i++)
    {
      printf("\nGrades[%d]: %d",i+1,ar[j].Grade[i]);
    }

  }

}

void BubbleSort(struct Student ar[])
{
  int i,j;
  struct Student temp;

  for(i=0;i<size-1;i++)
  {
    for(j=0;j<size-1-i;j++)
    {
      if(ar[j].ID > ar[j+1].ID)
      {
	temp = ar[j];
	ar[j] = ar[j+1];
	ar[j+1] = temp;

      }
    }
  }
}

/*int BinarySearch(struct Student ar[],int LB,int UB,int data)
{
  int middle;
  int loc = -1;

  BubbleSort(ar);

  while((LB <= UB) && (loc == -1))
  {
    middle = (LB + UB)/2;

    if(ar[middle].ID == data)
    {
      loc = middle;
    }
    else if(ar[middle].ID < data)
    {
      LB = middle + 1;
    }
    else
    {
      UB = middle - 1;
    }

  }

 return loc;
} */

int BinarySearch(struct Student ar[],int LB,int UB,int data) //By Recursion
{
  int middle;
  int loc = -1;

  BubbleSort(ar);

  if(LB <= UB)
  {
    middle = (LB + UB)/2;

    if(ar[middle].ID == data)
    {
      return middle;
    }
    else if(ar[middle].ID < data)
    {
      return BinarySearch(ar,middle + 1,UB,data);
    }
    else
    {
      return BinarySearch(ar,LB,middle - 1,data);
    }

  }
  else
  {
     return -1;
  }

}

void MergeSort(int LB,int UB)
{
  int middle;

  if(LB < UB)
  {
    middle = (LB + UB)/2;
    MergeSort(LB,middle);
    MergeSort(middle + 1,UB);
    Merge(LB,middle,UB);
  }
}

void Merge(int low,int mid,int high)
{
  struct Student temp[10];
  int list1,list2,i;

  list1 = low;
  list2 = mid + 1;
  i = low;

  while(list1 <= mid && list2 <= high)
  {
    if(strcmp(ar[list1].Name,ar[list2].Name) < 0)
    {
      temp[i] = ar[list1];
      list1++;
      i++;
    }
    else
    {
     temp[i] = ar[list2];
     list2++;
     i++;
    }
  }
  while(list1 <= mid)
  {
    temp[i] = ar[list1];
    list1++;
    i++;
  }
  while(list2 <= high)
  {
    temp[i] = ar[list2];
    list2++;
    i++;
  }

  for(i=low;i<=high;i++)
  {
    ar[i] = temp[i];
  }
}
