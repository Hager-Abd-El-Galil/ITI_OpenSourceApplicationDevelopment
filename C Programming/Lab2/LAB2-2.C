#include <stdio.h>
#include <conio.h>
#include <math.h>

int main(){

  float a,b,c;
  float x1 = 0.0;
  float x2 = 0.0;
  float m = 0.0;
  float img = 0.0;
  float real = 0.0;

  printf ("Enter Equation Parameter");
  printf("\na = ");
  scanf("%f",&a);
  printf("\nb = ");
  scanf("%f",&b);
  printf("\nc = ");
  scanf("%f",&c);

  m =((b*b)-(4*a*c));

  if (m >= 0)
  {
    x1 =(-b + sqrt(m))/(2*a);
    x2 =(-b - sqrt(m))/(2*a);
    printf("\nx1 = %f",x1);
    printf("\nx2 = %f",x2);
  }
  else
  {
    real = -b/(2*a);
    img = sqrt(-m)/(2*a);
    printf("\nx1 = %f+%f i",real,img);
    printf("\nx2 = %f-%f i",real,img);
  }
  getch();


 return 0;
}