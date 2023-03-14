#include <stdio.h>
#include <conio.h>

int main()
{
 int Size;
 int i;
 int r=0;
 int col=0;
 int Matrix;

 printf("Enter Size of Magic Box:");
 scanf("%d",&Size);

 if(Size%2==0)
 {
  printf("Error");
 }
 else
 {
  for(i=1;i<=Size*Size;i++)
  {
   if (i==1)
   { r=1;
     col=(Size+1)/2;
   }
   else
   {
    if(((i-1)%Size)==0)
    { r=r+1;
      col=col;
    }
    else
    {
      r=r-1;
      col=col-1;

      if(r<1)
      {
	r=Size;
      }
      if(col<1)
      {
	col=Size;
      }
    }
   }
 printf("Num %d in row: %d & col:%d \n",i,r,col);
 gotoxy(col,r);
// printf("%d",);
 }

 getch();
 }
 return 0;
}