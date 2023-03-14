#include <stdio.h>
#include <conio.h>
#include <string.h>

int main()
{
  char str1[10];
  char str2[10];
  char full[30];

  printf("Enter First Name: ");
  scanf("%s",str1);
  printf("Enter Last Name: ");
  scanf("%s",str2);

  strcpy(full,str1);
  strcat(full," ");
  strcat(full,str2);

  printf("\nFirst Name: %s",str1);
  printf("\nLast Name: %s",str2);
  printf("\nFull Name: %s",full);

  getch();

 return 0;
}