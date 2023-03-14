#include <stdio.h>
#include <conio.h>
#include <ctype.h>
#include <alloc.h>
#include <stdlib.h>

void Extended_Keys(char ch,int i,int x);
void Enter_Key(char ch,char *ptr);

int main()
{

 int size,length = 0;
 char ch;
 char *ptr;
 int x;
 int i=0;
 int j,count=0;

 printf("Enter No. Of Characters: ");
 scanf("%d",&size);

 length = size+1;

 ptr = (char *) malloc(length * sizeof(char));
 memset(ptr,0,length * sizeof(char));

 gotoxy(1,2);
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
      if(x < length)
      {
	  *(ptr+(x-1))= ch;
	   printf("%c",ch);
	   x++;
	   count++;
      }
	i = x-1;
	count = count-1;

     }
     else
     {
       Enter_Key(ch,ptr);
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
	 gotoxy(x-1,3);
	 break;
       }

       case 77: //right arrow
       {
	gotoxy(x+1,3);
	 break;
       }
       case 72:     //End (up arrow)
       {
	gotoxy(i,3);
	break;
       }
       case 80:    //Home (down arrow)
       {
	gotoxy(1,3);
	break;
       }
     }
}
void Enter_Key(char ch,char *ptr)
{

     if(ch == 13) //enter
     {
       printf("\nYour Text is: %s",ptr);
     }
}