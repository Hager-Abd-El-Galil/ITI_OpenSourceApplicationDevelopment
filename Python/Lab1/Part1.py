#-------Part 1--------
import math
#----Number 1----
print("----Number 1----")
first_name = input("Enter your first name: ")
last_name = input("Enter your last name: ")
full_name = last_name + " " + first_name
print("Your name in reverse order is:", full_name)

#----Number 2----
print("----Number 2----")
n = int(input("Enter your Number: "))
nn = n * 10 + n
nnn = n * 100 + nn
result = n + nn + nnn
print("Your Result is:", result)

#----Number 3----
print("----Number 3----")
print('''a string that you "don't" have to escape
This
is a ....... multi-line
heredoc string --------> example''')

#----Number 4----
print("----Number 4----")
radius = 6
volume = (4/3) * math.pi * radius ** 3
print("The volume of the sphere with radius 6 is:", volume)

#----Number 5----
print("----Number 5----")
base = float(input("Enter the base of the triangle: "))
height = float(input("Enter the height of the triangle: "))
area = 0.5 * base * height
print(f"The area of the triangle with base {base} and height {height} is: {area}")

#----Number 6----
print("----Number 6----")
n = 5
for i in range(1, n+1):
    for j in range(i):
        print("*", end=" ")
    print()
for i in range(n-1, 0, -1):
    for j in range(i):
        print("*", end=" ")
    print()

#----Number 7----
print("----Number 7----")
word = input("Enter a word: ")
reversed_word = ""
for i in range(len(word)-1, -1, -1):
    reversed_word += word[i]
print("The reverse of the word is:", reversed_word)

#----Number 8----
print("----Number 8----")
for i in range(7):
    if i == 3 or i == 6:
        continue
    print(i)

#----Number 9----
print("----Number 9----")
a, b = 0, 1
print(b, end=" ")
while b <= 50:
    c = a + b
    print(c, end=" ")
    a, b = b, c

#----Number 10----
print("\n----Number 10----")
string = input("Enter a string: ")
digits = 0
letters = 0
for char in string:
    if char.isdigit():
        digits += 1
    elif char.isalpha():
        letters += 1
print("Number of digits:", digits)
print("Number of letters:", letters)



