module PersonModule
  require 'date'

  #Class Person
  class Person

    attr_accessor :fname, :lname, :birth_date, :age

    def initialize()
      @fname = ""
      @lname = ""
      @birth_date = Date.today
      @age = 0
    end

    #Instance method get person data take input from user
    def getData()
      puts "Enter Your First Name: "
      @fname = gets.chomp
      puts "Enter Your Last Name: "
      @lname = gets.chomp
      puts "Enter Your Birth Date (yyyy-mm-dd): "
      @birth_date = Date.parse(gets.chomp)
      @age = self.calculate_age
    end

    #Calculate age in years, month, days
    def calculate_age()
      current_date = Date.today
      age_in_years = current_date.year - @birth_date.year
      age_in_months = current_date.month - @birth_date.month
      age_in_days = current_date.day - @birth_date.day

      if age_in_months < 0 || (age_in_months.zero? && age_in_days < 0)
        age_in_years -= 1
        age_in_months += 12
      end

      if age_in_days < 0
        age_in_months -= 1
        age_in_days += Date.new(current_date.year, current_date.month - 1, @birth_date.day).day
      end

      "#{age_in_years} years, #{age_in_months} months, and #{age_in_days} days"
    end

    #Welcome Method
    def sendWelcomeMessage()
      puts "Welcome #{fname} #{lname}"
      puts "Your age is #{age}"
    end
  end
end

#Test Module PersonModule
person = PersonModule::Person.new()
person.getData()
person.sendWelcomeMessage()

