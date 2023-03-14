#include <stdio.h>
#include <conio.h>

int main()
{
  char ch;
  ch = getch();

  if(ch == 0)
    {
     ch = getch();
     printf("Extended Key with code %d",ch);
    }
  else
    {
     printf("Normal Key with code %d",ch);
    }
    getch();
   return 0;
}