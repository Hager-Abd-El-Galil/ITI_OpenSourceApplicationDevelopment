#include <stdio.h>
#include <conio.h>
#include <alloc.h>
#include <string.h>

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

struct Node *pHead;
struct Node *pTail;

void Menu(void);
struct Student FillStudent(void);
struct Node* CreateNode(struct Student s);
int AddNode(void);
int InsertNode(int loc);
struct Node* SearchByID(int id);
void SearchByName(char Name[20]);
void DeleteNode(int loc);
void DeleteNodeByID(int id);
void FreeList(void);
void PrintAll(void);
int SortLinkedList(struct Node* ptr);
void InsertToOrderedLinkedList(void);
int CountOddNo(struct Node* ptr);
int ReverseLinkedList(struct Node *ptr);


int main()
{

  Menu();

 return 0;
}

void Menu(void)
{
  int y;
  char ch;
  int id,loc,i,count;
  char Name[20];
  struct Node* psearch;
  struct Node* preverse;
  struct Node* pcount;

  clrscr();

  gotoxy(1,1);
  printf("1.ADD NODE");
  gotoxy(1,2);
  printf("2.INSERT NODE AUTOMATICALLY");
  gotoxy(1,3);
  printf("3.INSERT NODE BY LOCATION");
  gotoxy(1,4);
  printf("4.SEARCH BY ID");
  gotoxy(1,5);
  printf("5.SEARCH BY NAME");
  gotoxy(1,6);
  printf("6.DELETE NODE BY LOC");
  gotoxy(1,7);
  printf("7.DELETE NODE BY ID");
  gotoxy(1,8);
  printf("8.PRINT ALL");
  gotoxy(1,9);
  printf("9.FREE LIST");
  gotoxy(1,10);
  printf("10.REVERSE LIST");
  gotoxy(1,11);
  printf("11.COUNT ODD NODES");
  gotoxy(1,12);
  printf("12.EXIT");
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
      gotoxy(1,12);
    }
    else
    {
      gotoxy(1,y-1);
    }
   }

   if(ch==80)    //Down Arrrow
   {
    if(y==12)
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
     gotoxy(1,12);
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
		  AddNode();
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
		  InsertToOrderedLinkedList();
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
		  printf("\nEnter The Location: ");
		  scanf("%d",&loc);
		  InsertNode(loc);
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
		  printf("Enter ID: ");
		  scanf("%d",&id);
		  psearch = SearchByID(id);

		  if(psearch)
		  {
			printf("\n\nStudent Data");
			printf("\nID: %d",psearch -> Data.ID);
			printf("\nName: %s",psearch -> Data.Name);

			for(i=0;i<3;i++)
			{
			  printf("\nGrades[%d]: %d",i+1,psearch -> Data.Grade[i]);
			}
		  }
		  else
		  {
			printf("This ID isn't Exist,Try Again");
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
		  printf("Enter Name: ");
		  scanf("%s",Name);
		  SearchByName(Name);
		  
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
		  printf("\nEnter The Location: ");
		  scanf("%d",&loc);
		  DeleteNode(loc);
		  getch();

		  if(ch==13)
		  {
			clrscr();
			Menu();
		  }
		}
		break;
      }
       case 7:
      {
		if(ch==13)
		{
		  clrscr();
		  printf("Enter ID: ");
		  scanf("%d",&id);
		  DeleteNodeByID(id);
		  getch();

		  if(ch==13)
		  {
			clrscr();
			Menu();
		  }
		}
		break;
      }
      case 8:
      {
		if(ch==13)
		{
		  clrscr();
		  PrintAll();
		  getch();

		  if(ch==13)
		  {
			clrscr();
			Menu();
		  }
		}
		break;
      }
      case 9:
      {
		if(ch==13)
		{
		  clrscr();
		  FreeList();
		  getch();

		  if(ch==13)
		  {
			clrscr();
			Menu();
		  }
		}
		break;
      }
	 case 10:
     {
		if(ch==13)
		{
		  clrscr();
		  ReverseLinkedList(preverse);
		  getch();

		  if(ch==13)
		  {
			clrscr();
			Menu();
		  }
		}
		break;
     }
	 case 11:
     {
		if(ch==13)
		{
		  clrscr();
		  count = CountOddNo(pcount);
		  printf("No. of odd Linked Lists: %d ",count);

		  getch();

		  if(ch==13)
		  {
			clrscr();
			Menu();
		  }
		}
		break;
     }
     case 12:
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

struct Node* CreateNode(struct Student s)
{
  struct Node* ptr;
  ptr = (struct Node*) malloc(sizeof(struct Node));

  if(ptr)
  {
    ptr -> Data = s;
    ptr -> pPrev = NULL;
    ptr -> pNext = NULL;
  }
  return ptr;
}

int AddNode(void)
{
  int retval = 0;
  struct Node* ptr;
  struct Student s = FillStudent();
  ptr = CreateNode(s);

  if(ptr)
  {
    retval = 1;
    printf("\n\nData is Successfully Added...");

    if(pHead == NULL)
    {
      pHead = pTail = ptr;
    }
    else
    {
      pTail -> pNext = ptr;
      ptr -> pPrev = pTail;
      pTail = ptr;
    }

  }
  return retval;
}

/*int InsertNode(int loc) //pcur in location before
{
  int retval = 0;
  struct Node* ptr;
  struct Node* pcur;
  int i;

  struct Student s = FillStudent();
  ptr = CreateNode(s);

  if(ptr)
  {
    retval = 1;

    if(pHead == NULL)
    {
      pHead = pTail = ptr;
    }
    else
    {
      if(loc == 0)
      {
	ptr -> pNext = pHead;
	pHead -> pPrev = ptr;
	pHead = ptr;
      }
      else
      {
	pcur = pHead;

	for(i=0;i<loc-1&&pcur;i++)
	{
	  pcur = pcur -> pNext;
	}

	if(pcur == pTail || pcur == NULL)
	{
	   pTail -> pNext = ptr;
	   ptr -> pPrev = pTail;
	   pTail = ptr;
	}
	else
	{
	  (pcur -> pNext) -> pPrev = ptr;
	  ptr -> pNext = pcur -> pNext;
	  ptr -> pPrev = pcur;
	  pcur -> pNext = ptr;
	}
      }
    }

  }
  return retval;
}*/
int InsertNode(int loc) //pcur in location after
{
  int retval = 0;
  struct Node* ptr;
  struct Node* pcur;
  int i;

  struct Student s = FillStudent();
  ptr = CreateNode(s);

  if(ptr)
  {
    retval = 1;

    if(pHead == NULL)
    {
      pHead = pTail = ptr;
    }
    else
    {
      if(loc == 0)
      {
	ptr -> pNext = pHead;
	pHead -> pPrev = ptr;
	pHead = ptr;
      }
      else
      {
	pcur = pHead;

	for(i=0;i<loc&&pcur;i++)
	{
	  pcur = pcur -> pNext;
	}

	if(pcur == NULL) //Add in Last
	{
	   ptr -> pPrev = pTail;
	   pTail -> pNext = ptr;
	   pTail = ptr;
	}
	else //Add in Middle
	{
	  (pcur -> pPrev) -> pNext = ptr;
	   ptr -> pPrev = pcur -> pPrev;
	   ptr -> pNext = pcur;
	   pcur -> pPrev = ptr;
       }
      }
    }

  }
  return retval;
}

struct Node* SearchByID(int id)
{
    int i;
    struct Node* ptr = NULL;

    if(pHead)  //There is list
    {
       ptr = pHead;

       while(ptr -> Data.ID != id && ptr)
       {
	   ptr = ptr-> pNext;
       }
    }
    else
    {
      printf("There is No List\n");
    }
    return ptr;
}

void SearchByName(char Name[20])
{
   int i;
   struct Node* ptr;

   int cmpstr;

   if(pHead)
   {
    ptr = pHead;

    while(cmpstr != 0 && ptr)
    {
       cmpstr = strcmp(ptr -> Data.Name,Name);

      if(cmpstr != 0)
      {
	ptr = ptr-> pNext;
      }
    }

    if(ptr)
    {
      printf("\n\nStudent Data");
      printf("\nID: %d",ptr -> Data.ID);
      printf("\nName: %s",ptr -> Data.Name);

      for(i=0;i<3;i++)
      {
	printf("\nGrades[%d]: %d",i+1,ptr -> Data.Grade[i]);
      }
      ptr = ptr-> pNext;
    }
    else
    {
      printf("This Name isn't Exist,Try Again\n");
    }
   }
}

void DeleteNode(int loc) //Delete by location
{
  int i;
  struct Node* ptr;

  if(pHead)
  {
    ptr = pHead;

    if(loc == 0) //First Node
    {
      if(pTail == pHead) //Only One Node in List
      {
	pHead = pTail = NULL;
      }
      else
      {
	pHead = pHead -> pNext;
	pHead -> pPrev = NULL;
      }
      free(ptr);
      printf("Data is Successfully Deleted\n");
    }
    else //Middle or Last
    {
      for(i=0;(i<loc)&&ptr;i++)
      {
	ptr = ptr -> pNext;
      }

      if(ptr)  //There is a Node
      {
	if(ptr == pTail) //Last Node
	{
	  pTail = ptr -> pPrev;
	  ptr -> pNext = NULL;
	}
	else
	{
	  ptr -> pPrev -> pNext = ptr -> pNext;
	  ptr -> pNext -> pPrev = ptr -> pPrev;
	}

	free(ptr);
	printf("Data is Succefully Deleted\n");
      }
      else
      {
	printf("There is No Data Here\n");
      }
    }

  }
  else
  {
     printf("There is Empty List,Try Again\n");
  }
}

void DeleteNodeByID(int id) //Delete by Data
{
  int i;
  struct Node* ptr;

  while(ptr = SearchByID(id))  //if only one element (if(ptr))
  {
    if(ptr == pHead) //First Node
    {
      pHead = ptr -> pNext;
      pHead -> pPrev = NULL;
    }
    else if(ptr == pTail) //Last Node
    {
      pTail = pTail -> pPrev;
      pTail -> pNext = NULL;
    }
    else //Middle
    {
       ptr -> pPrev -> pNext = ptr -> pNext;
       ptr -> pNext -> pPrev = ptr -> pPrev;
    }
      free(ptr);
      printf("Data is Deleted Successfully\n");
  }

}
void PrintAll(void)
{
  int i;
  struct Node* temp;
  temp = pHead;

  while(temp)
  {
    printf("\n\nStudent Data");
    printf("\nID: %d",temp -> Data.ID);
    printf("\nName: %s",temp -> Data.Name);

    for(i=0;i<3;i++)
    {
      printf("\nGrades[%d]: %d",i+1,temp -> Data.Grade[i]);
    }
    temp = temp -> pNext;
  }

}

void FreeList(void)
{
  struct Node* temp;

  while(pHead)
  {
    temp = pHead;
    pHead = pHead -> pNext;
    free(temp);
  }
  pTail = NULL;
  printf("All Lists are Freed!");

}

int SortLinkedList(struct Node* ptr)
{
  struct Student temp;
  struct Node* psort;
  int retval = 0,flag = 1;
  psort = NULL;
  ptr = pHead;

  if(pHead) // There is list
  {
     if(pTail == pHead) //only one node
     {
	printf("Already Sorted...");
     }
     else
     {
      while(ptr && (ptr != psort) && flag)
      {
	flag = 0;

	while((ptr -> pNext) && ((ptr -> pNext) != psort))
	{
	  if((ptr -> Data.ID) > ((ptr -> pNext) -> Data.ID))
	  {
	    retval = 1;

	      temp = ptr -> Data;
	      ptr -> Data = (ptr -> pNext) -> Data;
	      (ptr -> pNext) -> Data = temp;
	      flag = 1;
	  }

	  ptr = ptr -> pNext;
	}
       psort = ptr;
       ptr = pHead;
      }
     }
  }
  return retval;
}

void InsertToOrderedLinkedList(void)
{
   struct Node* pcur;
   struct Student s;
   struct Node* ptr;

   SortLinkedList(pcur); //sorted List

   pcur = pHead;


   s = FillStudent();


   ptr = CreateNode(s);

   if(ptr)
   {
      if(pHead == pTail)  // Only One Node
      {
	if((pHead -> Data.ID) > (ptr ->Data.ID))  //Add to First Node
	{

	    ptr -> pNext = pHead;
	    pHead -> pPrev = ptr;;
	    pHead = ptr;
	}
	else //Add to Last Node
	{
	   pTail -> pNext = ptr;
	   ptr -> pPrev =  pTail;
	   pTail = ptr;
	}
      }
      else  //List Of Nodes
      {
	  while(pcur)
	  {
	   if((ptr -> Data.ID) > (pTail -> Data.ID)) //Add to Last Node
	   {
	     pTail -> pNext = ptr;
	     ptr -> pPrev =  pTail;
	     pTail = ptr;
	   }

	   if(((ptr -> Data.ID) > (pcur -> Data.ID)) && ((ptr -> Data.ID) < ((pcur -> pNext) -> Data.ID)) )
	   {

	     (pcur -> pNext) -> pPrev = ptr;
	     ptr -> pNext = pcur -> pNext;
	     pcur -> pNext = ptr;
	     ptr -> pPrev = pcur;
	     break;
	   }
	   else
	   {
	     pcur = pcur -> pNext;
	   }
	  }
      }
   }

}

int CountOddNo(struct Node* ptr) //Count by ID
{
   int count = 0;
   ptr = pHead;


   if(pHead) //There is List
   {
     while(ptr)
     {
       if(ptr -> Data.ID % 2 != 0)
       {
	 count++;
       }
       ptr = ptr -> pNext;
     }
   }
   return count;
}


int ReverseLinkedList(struct Node* ptr)
{
   struct Node* pReverse;
   struct Student temp;
   int retval = 0;

   pReverse = NULL;
   ptr = pHead;

   if(ptr) //There is a List
   {
     if(pHead == pTail) //Only One Node
     {
	printf("Already Reversed...");
     }
     else  //Multiple Nodes
     {
	while(ptr && (ptr != pReverse))
      {

	  while((ptr -> pNext) && ((ptr -> pNext) != pReverse))
	  {
	      temp = ptr -> Data;
	      ptr -> Data = (ptr -> pNext) -> Data;
	      (ptr -> pNext) -> Data = temp;

	      ptr = ptr -> pNext;
	  }

	  pReverse = ptr;
	  ptr = pHead;
      }
     }
   }


  return retval;
}
