#include <stdio.h>
#include <conio.h>
#include <ctype.h>
#include <string.h>
#include <stdlib.h>

int main()
{
 char ch;
 char *ptr;
 int size,x;
 int i=0;
 int j,count=0;

 printf("Please Enter Size Of Array: ");
 scanf("%d",&size);
 ptr = malloc(size*sizeof(char));
 memset(ptr,0,size*sizeof(char));
 gotoxy(1,2);
 printf("Enter Your Text: ");

 if(ptr != NULL)
 {
 do
 {
  ch = getch();
  x = wherex();

   if(ch == 0)
    {
     ch = getch();

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
	gotoxy(i+17,2);
	break;
       }
       case 80:    //Home (down arrow)
       {
	gotoxy(18,2);
	break;
       }

     }
    }
  else
    {
     if(isprint(ch))
     {
       if(i < size)
       {
	  *(ptr + count) = ch;
	   printf("%c",ch);
	   i++;

	/* if(*(ptr + count) = 0)
	 {
	   *(ptr + count) = ch;
	   printf("%c",ch);
	   i++;
	   count++;
	 }
	 else
	 {
	   *(ptr + count) = ch;
	   printf("%c",ch);
	   count++;
	 }*/
       }
     }
     else
     {
       if(ch == 13) //enter
       {
	 printf("\nYour Text is: ");

	 for(j=0;j<i;j++)
	 {
	   printf("%c",*(ptr+j));
	 }

	 getch();
	 ch = 27;
       }
     }
    }

 } while(ch != 27);
 free(ptr);
}

 return 0;
}