#include <iostream.h>
#include <conio.h>

void Swap(int& Num1,int& Num2);
inline void Print(int& Num1,int& Num2);

int main()
{
  clrscr();

  int a = 3,b = 4;

  cout << "Before Swapping" << endl;
  Print(a,b);
  Swap(a,b);
  cout << "After Swapping" << endl;
  Print(a,b);
  getch();

 return 0;
}

void Swap(int& Num1,int& Num2)
{
   int temp;
   temp = Num1;
   Num1 = Num2;
   Num2 = temp;
}

void Print(int& Num1,int& Num2)
{
     cout << "Num1 = " << Num1 << endl;
     cout << "Num2 = " << Num2 << endl;
}