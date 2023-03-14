#include <stdio.h>
#include <conio.h>

int main(){
  int Num1,Num2,Num3,Num4,Num5;
  int Max = 0;
  int Min = 0;

  printf("Please Enter First Num Num1 = ");
  scanf("%d",&Num1);
  printf("\nPlease Enter Second Num Num2 = ");
  scanf("%d",&Num2);
  printf("\nPlease Enter Third Num Num3 = ");
  scanf("%d",&Num3);
  printf("\nPlease Enter Fourth Num Num4 = ");
  scanf("%d",&Num4);
  printf("\nPlease Enter Fifth Num Num5 = ");
  scanf("%d",&Num5);

  clrscr();

  //Check Maximum Number

  if((Num1>Num2)&&(Num1>Num3)&&(Num1>Num4)&&(Num1>Num5))
  { Max = Num1;
  }
  else if((Num2>Num1)&&(Num2>Num3)&&(Num2>Num4)&&(Num2>Num5))
  { Max = Num2;
  }
  else if((Num3>Num1)&&(Num3>Num2)&&(Num3>Num4)&&(Num3>Num5))
  { Max = Num3;
  }
  else if((Num4>Num1)&&(Num4>Num2)&&(Num4>Num3)&&(Num4>Num5))
  { Max = Num4;
  }
  else
  {
  Max = Num5;
  }

  printf("Maximum Number is %d",Max);

  //check Minimum Number

  if((Num1<Num2)&&(Num1<Num3)&&(Num1<Num4)&&(Num1<Num5))
  { Min = Num1;
  }
  else if((Num2<Num1)&&(Num2<Num3)&&(Num2<Num4)&&(Num2<Num5))
  { Min = Num2;
  }
  else if((Num3<Num1)&&(Num3<Num2)&&(Num3<Num4)&&(Num3<Num5))
  { Min = Num3;
  }
  else if((Num4<Num1)&&(Num4<Num2)&&(Num4<Num3)&&(Num4<Num5))
  { Min = Num4;
  }
  else
  {
  Min = Num5;
  }

  printf("\nMinimum Number is %d",Min);

  getch();

 return 0;
}