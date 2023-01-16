#include <stdio.h>
#include <conio.h>
#include <alloc.h>

struct Node
{
  int Data;
  struct Node* pLeft;
  struct Node* pRight;
};


void Menu(void);
struct Node* CreateNode(int d);
struct Node* InsertNode(struct Node* pNode,int d);
void InOrder(struct Node* root);
void PreOrder(struct Node* root);
void PostOrder(struct Node* root);

int main()
{

  Menu();

 return 0;
}

void Menu(void)
{
  int y;
  char ch;

  struct Node* pRoot = NULL;
  pRoot = InsertNode(pRoot,7);
  InsertNode(pRoot,8);
  InsertNode(pRoot,5);
  InsertNode(pRoot,4);
  InsertNode(pRoot,3);

  clrscr();

  gotoxy(1,1);
  printf("1.IN ORDER");
  gotoxy(1,2);
  printf("2.PRE ORDER");
  gotoxy(1,3);
  printf("3.POST ORDER");
  gotoxy(1,4);
  printf("4.EXIT");
  gotoxy(1,1);



  while(ch!=27)
  {
   ch = getch();
   y=wherey();

   if(ch==72)      //Up Arrow
   {
    if(y==1)
    {
      gotoxy(1,4);
    }
    else
    {
      gotoxy(1,y-1);
    }
   }

   if(ch==80)    //Down Arrrow
   {
    if(y==4)
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
     gotoxy(1,4);
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
		  printf("IN ORDER...");
		  InOrder(pRoot);
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
		  printf("PRE ORDER...");
		  PreOrder(pRoot);
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
		  printf("POST ORDER...");
		  PostOrder(pRoot);
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
		 ch=27;
		   }
		break;
      }
    }
  }
}


struct Node* CreateNode(int d)
{
  struct Node* ptr;
  ptr = (struct Node*) malloc(sizeof(struct Node));

  if(ptr)
  {
    ptr -> Data = d;
    ptr -> pLeft = ptr -> pRight = NULL;
  }
  return(ptr);
}

struct Node* InsertNode(struct Node* pNode,int d)
{
   if(pNode == NULL)
   {
     pNode = CreateNode(d);
   }
   else if(pNode -> Data >= d)
   {
     pNode -> pLeft = InsertNode(pNode -> pLeft,d);
   }
   else
   {
     pNode -> pRight = InsertNode(pNode -> pRight,d);
   }
   return pNode;
}

void InOrder(struct Node* root)
{
   if(root)
   {
     InOrder(root -> pLeft);
     printf("\n%d",root -> Data);
     InOrder(root -> pRight);

   }
}

void PreOrder(struct Node* root)
{
   if(root)
   {
     printf("\n%d",root -> Data);
     PreOrder(root -> pLeft);
     PreOrder(root -> pRight);
   }
}

void PostOrder(struct Node* root)
{
   if(root)
   {
     PostOrder(root -> pLeft);
     PostOrder(root -> pRight);
     printf("\n%d",root -> Data);

   }
}
