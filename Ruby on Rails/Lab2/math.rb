#Class Math
class MathClass

  @@result = nil

  #instance method called calc
  def calc(num1, num2, operator)
    if(!num1.is_a? Numeric || !num2.is_a? || !num1.empty? || !num2.empty?)
      raise "Please Enter a Valid Number"
    elsif(operator != "+" && operator != "-" && operator != "*" && operator != "/" )
      raise "Not supported Operation, Please Enter a valid Operator"
    else
      case operator
        when "+"
          @@result = eval(num1.to_s + operator + num2.to_s)
        when "-"
          @@result = eval(num1.to_s + operator + num2.to_s)
        when "*"
          @@result = eval(num1.to_s + operator + num2.to_s)
        when "/"
            if(num2 != 0)
              @@result = eval(num1.to_s + operator + num2.to_s)
            else
                raise "Error!! Divide by 0"
            end
      end
      puts "The Result of #{num1} #{operator} #{num2} = #{@@result}"
    end
  end
end

#Test class Math
operation1 = MathClass.new
operation1.calc(2, 3, "+")
operation1.calc(2, 0, "/")
operation1.calc("d", 3, "+")
