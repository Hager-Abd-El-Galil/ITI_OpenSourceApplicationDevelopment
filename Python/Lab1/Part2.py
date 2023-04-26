#-------Part 2--------
import random
#----Number 1----
print("----Number 1----")
def reduce_duplicate_elements(list):
    result = []
    for num in list:
        if len(result) == 0 or num != result[-1]:
            result.append(num)
    return result
print(reduce_duplicate_elements([1,2,3,3]))  

#----Number 2----
print("----Number 2----")
def front_back(a, b):
    a_len = len(a)
    b_len = len(b)
    a_half = a_len // 2 + a_len % 2
    b_half = b_len // 2 + b_len % 2
    return a[:a_half] + b[:b_half] + a[a_half:] + b[b_half:]
print(front_back('abc', 'xy')) 

#----Number 3----
print("----Number 3----")
def all_different(seq):
    return len(set(seq)) == len(seq)
print(all_different([1,5,7,9]))  
print(all_different([1,5,5,7,9])) 

#----Number 4----
print("----Number 4----")
def bubble_sort(list):
    n = len(list)
    for i in range(n):
        swapped = False
        for j in range(0, n-i-1):
            if list[j] > list[j+1]:
                list[j], list[j+1] = list[j+1], list[j]
                swapped = True
        if not swapped:
            break
    return list
print(bubble_sort([2,1,5,7,6]))

#----Number 5----
print("----Number 5----")
def guessing_game():
    secret_number = random.randint(1, 100)
    num_tries = 10
    prev_guesses = []
    
    while num_tries > 0:
        user_guess = input("Guess a number between 1 and 100: ")
        if not user_guess.isdigit() or int(user_guess) < 1 or int(user_guess) > 100:
            print("Invalid input. Please enter a number between 1 and 100.")
            continue
        
        user_guess = int(user_guess)
        
        if user_guess in prev_guesses:
            print("You already guessed that number. Try again.")
            continue
        
        num_tries -= 1
        prev_guesses.append(user_guess)

        if user_guess == secret_number:
            print("Congratulations! You guessed the number in", 10 - num_tries, "tries.")
            play_again = input("Do you want to play again? (y/n): ")
            if play_again.lower() == 'y':
                guessing_game()
            else:
                print("Thanks for playing!")
            return
        
        elif user_guess < secret_number:
            print("Too low. Guess again.")
        else:
            print("Too high. Guess again.")

    print("Sorry, you ran out of tries. The number was", secret_number)
    play_again = input("Do you want to play again? (y/n): ")
    if play_again.lower() == 'y':
        guessing_game()
    else:
        print("Thanks for playing!")

guessing_game()

#----BONUS----
print("----BONUS----")
def diagonalDifference(arr):
    temp = 0
    emp = 0
    for i in range(0,len(arr)):
        temp = temp + arr[i][i]
    
    for j in range(0,len(arr)):
        emp = emp + arr[j][len(arr)-1-j]
    
    return abs(temp - emp)