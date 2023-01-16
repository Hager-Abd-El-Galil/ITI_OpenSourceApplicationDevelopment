#include <stdio.h>
#include <conio.h>
#include <alloc.h>

struct Student
{
  char Name[20];
  int ID;
  int Grade[3];
};

struct Node
{
  struct Student Data;
  struct Node *pPrev;
  struct Node *pNext;
};

struct Node *pTail;
struct Node *pHead;

struct Student ar[10];

int TOQ;
int TOS;

void Menu(void);
struct Student FillStudent(void);
struct Node* CreateNode(struct Student s);
int Push(struct Student s);
struct Student Pop(void);
int ENQUEUE(struct Student s);
struct Student DEQUEUE(void);

int main()
{
   Menu();

return 0;
}

void Menu(void)
{
  int y,i,ret;
  char ch;
  struct Student s;
  struct Student std;

  clrscr();

  gotoxy(1,1);
  printf("------STACK------");
  gotoxy(1,2);
  printf("1.PUSH");
  gotoxy(1,3);
  printf("2.POP");
  gotoxy(1,4);
  printf("------QUEUE------");
  gotoxy(1,5);
  printf("3.ENQUEUE");
  gotoxy(1,6);
  printf("4.DEQUEUE");
  gotoxy(1,1);

  ch = getch();

  while(ch!=27)
  {
   ch=getch();
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
     case 2:
      {
		if(ch==13)
		{
		  clrscr();
		  s = FillStudent();
		  ret = Push(s);
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
		  s = Pop();

		  if(s.ID != -1)
		  {
			 printf("\n\nStudent Data");
			 printf("\nID: %d",s.ID);
			 printf("\nName: %s",s.Name);

			 for(i=0;i<3;i++)
			 {
			   printf("\nGrades[%d]: %d",i+1,s.Grade[i]);
			 }
		  }
		  else
		  {
			printf("Empty List");
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
		  std = FillStudent();
		  ret = ENQUEUE(std);
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
		  clrscr();
		  std = DEQUEUE();

		  if(std.ID != -1)
		  {
			 printf("\n\nStudent Data");
			 printf("\nID: %d",std.ID);
			 printf("\nName: %s",std.Name);

			 for(i=0;i<3;i++)
			 {
			   printf("\nGrades[%d]: %d",i+1,std.Grade[i]);
			 }
		  }
		  else
		  {
			printf("Empty Array");
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

struct Node* CreateNode(struct Student s)
{
  struct Node* ptr;
  ptr = (struct Node*) malloc(sizeof(struct Node));

  if(ptr)
  {
    ptr -> Data = s;
    ptr -> pPrev = NULL;
  }
  return ptr;
}

/*----------Stack Using Linked List----------*/

/*int Push(struct Student s)
{
   int retval = 0;
   struct Node* ptr;
   ptr = CreateNode(s);

   if(ptr)
   {
      retval = 1;
      printf("\n\nData is Successfully Pushed...");

    if(pTail == NULL)  //first node will push
    {
      pTail = ptr;
    }
    else
    {
      ptr -> pPrev = pTail;
      pTail = ptr;
    }

  }
  return retval;
}

struct Student Pop(void)
{
   struct Node* ptr;
   struct Student ret;

   ptr = pTail;

   if(ptr)
    {

      if(ptr -> pPrev != NULL)
      {
	pTail = ptr -> pPrev;
      }
      else
      {
	pTail = NULL;
      }
    }

    else if(pTail == NULL)
    {
       (ptr -> Data.ID) = -1;
    }

      ret = ptr -> Data;

    free(ptr);

    return ret;
} */

/*----------Stack Using Array----------*/

int Push(struct Student s)
{
  int retval = 0;

  if(TOS < 10)
  {
    ar[TOS] = s;
    TOS++;
    retval = 1;
  }
 return retval;
}

struct Student Pop(void)
{
   struct Student retval;

   if(TOS > 0)
   {
      TOS--;
      retval = ar[TOS];
   }
   else
   {
     retval.ID = -1;
   }
   return retval;
}
/*----------Queue Using Array----------*/

/*int ENQUEUE(struct Student std)
{
  int retval = 0;

  if(TOQ < 10)
  {
    ar[TOQ] = std;
    TOQ++;
    retval = 1;
  }
 return retval;
}

struct Student DEQUEUE(void)
{
  struct Student std;
  int i;

  if(TOQ > 0)
  {
     std = ar[0];

     for(i=0;i<TOQ;i++)
     {
       ar[i] = ar[i+1];
       TOQ--;
     }
  }
  else
  {
     std.ID = -1;
  }
  return std;
}*/

/*----------Queue Using Linked List----------*/

int ENQUEUE(struct Student std)
{
   int retval = 0;
   struct Node* ptr;

   ptr = CreateNode(std);

   if(ptr)
   {
      if(pHead == NULL) //No List
      {
	 pHead = pTail = ptr;  //Add as First Node
      }
      else
      {
	 pTail -> pNext = ptr;
	 pTail = ptr;
      }
      retval = 1;
   }
   return retval;
}

struct Student DEQUEUE(void)
{
   struct Student ret;
   struct Node* ptr;

   ptr = pHead;

   if(pHead)  //There is List
   {
     if(pHead == pTail) //Only One Node
     {
       pTail = pHead = NULL;
     }
     else
     {
	pHead = pHead -> pNext;
     }
   }
   else
   {
     ptr -> Data.ID = -1;
   }
     ret = ptr -> Data;
     free(ptr);

 return ret;
}

