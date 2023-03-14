#include <stdio.h>
#include <conio.h>
#include <ctype.h>

void Extended_Keys(char ch,int i,int x);
void Enter_Key(char ch,char arr[11]);

int main()
{
 char ch;
 char arr[11]={0};
 int x;
 int i=0;
 int j,count=0;

 gotoxy(1,1);
 printf("Enter Your Text: \n");


 do
 {
  ch = getch();
  x = wherex();

   if(ch == 0)
    {
     ch = getch();
     Extended_Keys(ch,i,x);
    }
  else
    {
     if(isprint(ch))
     {
      if(x < 11)
      {
	   arr[x-1]= ch;
	   printf("%c",ch);
	   x++;
	   count++;
      }
	i = x-1;
	count = count-1;

     }
     else
     {
       Enter_Key(ch,arr);
       getch();
       ch = 27;
     }
    }

 } while(ch != 27);


 return 0;
}
void Extended_Keys(char ch,int i,int x)
{
    switch(ch)
     {
       case 75: //left arrow
       {
	 gotoxy(x-1,2);
	 break;
       }

       case 77: //right arrow
       {
	gotoxy(x+1,2);
	 break;
       }
       case 72:     //End (up arrow)
       {
	gotoxy(i,2);
	break;
       }
       case 80:    //Home (down arrow)
       {
	gotoxy(1,2);
	break;
       }
     }
}
void Enter_Key(char ch,char arr[11])
{

     if(ch == 13) //enter
     {
       printf("\nYour Text is: %s",arr);
     }
}