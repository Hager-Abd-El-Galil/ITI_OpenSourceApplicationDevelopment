#include <stdio.h>
#include <conio.h>

void Menu(void);

int main()
{

  Menu();

 return 0;
}

void Menu(void)
{
  int y;
  char ch;
  int Num1;
  int Num2;

  clrscr();

  gotoxy(1,1);
  printf("1.ADD");
  gotoxy(1,2);
  printf("2.SUBTRACT");
  gotoxy(1,3);
  printf("3.MULTIPLY");
  gotoxy(1,4);
  printf("4.DIVIDE");
  gotoxy(1,5);
  printf("5.EXIT");
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
      gotoxy(1,5);
    }
    else
    {
      gotoxy(1,y-1);
    }
   }

   if(ch==80)    //Down Arrrow
   {
    if(y==5)
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
     gotoxy(1,5);
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
	  gotoxy(20,y);
	  printf("ADD is Pressed");
	  gotoxy(1,7);
	  printf("Enter First Num: ");
	  scanf("%d",&Num1);
	  printf("Enter Second Num: ");
	  scanf("%d",&Num2);
	  printf("RESULT is %d + %d = %d",Num1,Num2,Num1+Num2);

	  ch= getch();
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
	  gotoxy(20,y);
	  printf("SUBTRACT is Pressed");
	  gotoxy(1,7);
	  printf("Enter First Num: ");
	  scanf("%d",&Num1);
	  printf("Enter Second Num: ");
	  scanf("%d",&Num2);
	  printf("RESULT is %d - %d = %d",Num1,Num2,Num1-Num2);

	  ch= getch();
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
	  gotoxy(20,y);
	  printf("MULTIPLY is Pressed");
	  gotoxy(1,7);
	  printf("Enter First Num: ");
	  scanf("%d",&Num1);
	  printf("Enter Second Num: ");
	  scanf("%d",&Num2);
	  printf("RESULT is %d * %d = %d",Num1,Num2,Num1*Num2);

	  ch= getch();
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
	  gotoxy(20,y);
	  printf("DIVISION is Pressed");
	  gotoxy(1,7);
	  printf("Enter First Num: ");
	  scanf("%d",&Num1);
	  printf("Enter Second Num: ");
	  scanf("%d",&Num2);
	  printf("RESULT is %d / %d = %d",Num1,Num2,Num1/Num2);

	  ch= getch();
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
	 ch=27;
       }
	break;
      }
 }
 }
}