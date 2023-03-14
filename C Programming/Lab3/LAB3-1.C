#include <stdio.h>
#include <conio.h>

int main(){
  int Num;
  int i;
  int Number;
  int Max=0;
  int Min=0;

  printf("Enter No Of Numbers:");
  scanf("%d",&Num);

  for(i=1;i<=Num;i++)
  {
    printf("Enter Num %d :",i);
    scanf("%d",&Number);

    if(i==0)
    {
     Min = Number;
    }

    if(Number>Max)
    {
     Max = Number;
    }
    if(Number<Min)
    {
     Min = Number;
    }

    }
    printf("\nMaximum No. is %d",Max);
    printf("\nMinimum No. is %d",Min);
    getch();

 return 0;
 }