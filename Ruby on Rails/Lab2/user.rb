#Class User
class User
  #Variable instance name
  attr_accessor :name
  @@name = 'user'

  #Contructor
  def initialize(name = 'user')
    @name = name
  end

  #Class method called name return class variable
  def self.name()
    @@name
  end

  #Class method to change class variable
  def changeName(new_name)
    @name = new_name
  end

  #Create setter method for instance variable
  def setName(name)
    @name = name
  end

  # Create getter method to return instance variable
  def getName()
    @name
  end

end

#Test class User
user1= User.new
user2= User.new("Ahmed")
puts "User1 Name = #{user1.name}"
puts "User2 Name = #{user2.name}"
puts "User1 Name = #{user1.getName} From getter"
puts "User2 Name = #{user2.getName} From getter"
user1.setName("Alaa")
puts "User1 Name = #{user1.getName} After setting New Value"
