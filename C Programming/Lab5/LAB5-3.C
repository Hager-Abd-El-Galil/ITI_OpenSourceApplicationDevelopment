#include <stdio.h>
#include <conio.h>

int main()
{
  int arr[4][3];
  int row,col;
  int sum;
  float avg;

  for(col=0;col<3;col++)
  {
    printf("Student No. %d\n",col+1);

    for(row=0;row<4;row++)
    {
      printf("Grade Subject %d for Student %d is ",row+1,col+1);
      scanf("%d",&arr[row][col]);
    }
   }

   clrscr();

   for(row=0;row<4;row++)
   {
     avg = 0;

     for(col=0;col<3;col++)
     {
       avg += arr[row][col];
     }
      avg = avg/3;
      printf("\nThe Average for Subject %d is %f ",row+1,avg);
   }

    for(col=0;col<3;col++)
    {
      sum =0;

      for(row=0;row<4;row++)
      {
	sum += arr[row][col];
      }
      printf("\nThe Sum for Student %d is %d ",col+1,sum);
    }


  getch();

 return 0;
}