  #include <stdio.h>
  #include <conio.h>

  int main()
  {
  int Num1;
  int Num2;
  int Sum=0;
  printf("Please Enter First Number ");
  scanf("%d",&Num1);
  printf("\n Please Enter Second Number ");
  scanf("%d",&Num2);
  Sum = Num1 + Num2;
  printf("\n Sum = %d",Sum);
  getch();
  clrscr();
  return 0;
  }