# Problem 1
puts "------Problem 1------"
def create_new_str(char, n)
  for i in 1..n
    puts char*i
  end
end
create_new_str('a', 5)

# Problem 2
puts "------Problem 2------"
def check_str(str)
  if str.start_with?("if")
    puts true
  else
    puts false
  end
end
check_str('ifstring')
check_str('string')

# Problem 3
puts "------Problem 3------"
def change_str(str)
  puts str[-1] << str[1...-1]  << str [0]
end
change_str('Ruby')
change_str('Programming')

# Problem 4
puts "------Problem 4------"
def change_str_by_char(str)
  if(str.length != 0)
    puts str[-1] << str[0..-1]  << str [-1]
  else
    puts "String Length Must be Greater than 1"
  end
end
change_str_by_char('Ruby')
change_str_by_char('')

# Problem 5
puts "------Problem 5------"
def test_leap_year(year)
  if (year % 4) == 0
    if (year % 100) == 0
      if (year % 400) == 0
        puts "#{year} is a Leap Year"
      else
        puts "#{year} is not Leap Year"
      end
    else
      puts "#{year} is Leap Year"
    end
  else
    puts "#{year} is not Leap Year"
  end
end
test_leap_year(2020)
test_leap_year(1500)

# Problem 6
puts "------Problem 6------"
def rotated_array(arr)
  if(arr.length != 3)
    puts "Array Length Must Equal to 3"
  else
    rotated_array = arr[1..-1] + [arr[0]]
    puts rotated_array
    return rotated_array
  end
end
rotated_array([1, 2, 3])
rotated_array([])

# Problem 7
puts "------Problem 7------"
def sum_except_17(arr)
  sum = 0
  skip_next = false

  arr.each_with_index do |num, index|
    if skip_next
      skip_next = false
      next
    end

    if num == 17
      skip_next = true
      next
    end

    sum += num
  end
  puts "Sum = #{sum}"
  return sum
end
sum_except_17([3, 5, 17, 6])

#BONUS
# Problem 8
puts "------Problem 8------"
def two_sum(nums, target)
  hash = {}
    nums.each_with_index do |num, index|
        return [hash[num], index] if hash.key? num

    hash[target - num] = index
  end
  nil
end
puts two_sum([2,7,11,15], 9)

# Problem 9
puts "------Problem 9------"
def isBalanced(s)
  length = -1
  while s.length != length
      length = s.length
      s = s.sub('()','')
      s = s.sub('[]','')
      s = s.sub('{}','')
      if s.length == 0
          return 'YES'
      end
  end
  return 'NO'
end
puts isBalanced('{[()]}')
puts isBalanced('{[(])}')

# Problem 10
puts "------Problem 10------"
def count_words(words1, words2)
  count = 0
  hash = {}

  words1.each do |word|
      if hash.key?(word)
          hash[word][0] += 1
      else
          hash[word] = [1, 0]
      end
  end

  words2.each do |word|
      if hash.key?(word)
          hash[word][1] += 1
      else
          hash[word] = [0, 1]
      end
  end

  hash.each do |_, val|
      if val[0] == 1 and val[1] == 1
          count += 1
      end
  end
  puts "Count = #{count}"
  return count
end
count_words(["leetcode","is","amazing","as","is"], ["amazing","leetcode","is"])
