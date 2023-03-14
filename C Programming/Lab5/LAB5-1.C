#include <stdio.h>
#include <conio.h>

int main()
{
  int arr[5];
  int i,j;
  int min,max;

  for(i=0;i<5;i++)
  {
    printf("Enter Number %d: ",i+1);
    scanf("%d",&arr[i]);
  }

  min = arr[0];
  max = arr[0];

  for(j=0;j<5;j++)
  {
    if(arr[j] > max)
    {
      max = arr[j];
    }
    if(arr[j] < min)
    {
      min = arr[j];
    }
  }

  printf("\nMaximum Number is %d",max);
  printf("\nMinimum Number is %d",min);

  getch();

 return 0;
}