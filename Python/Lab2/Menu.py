from Employee import Employee
from Manager import Manager
import sys


class Main:

    def menu(self):

        while True:
            print("\n1.Add New Employee")
            print("2.Add New Manager")
            print("3.List All Employees")
            print("4.Fire Employee")
            print("5.Exit program")

            choice = input("\nEnter your choice: ")

            if choice == "1":
                self.add_new_employee()
            elif choice == "2":
                self.add_new_manager()
            elif choice == "3":
                self.list_all_employees()
            elif choice == "4":
                self.fire_employee()
            elif choice == "5":
                self.quit_program()
            else:
                print("Invalid choice, Please Try Again")

    def add_new_employee(self):
        try:
            print("Please Enter The Employee Data:")
            first_name = input("First Name: ")
            last_name = input("Last Name: ")
            age = int(input("Age: "))
            department = input("Department: ")
            salary = float(input("Salary: "))
            Employee(first_name, last_name, age,
                     department, salary)
            print("An Employee has been Added Successfully")

        except:
            print('Error in Adding New Employee')

    def add_new_manager(self):
        try:
            print("Please Enter The Manager Data:")
            first_name = input("First Name: ")
            last_name = input("Last name: ")
            age = int(input("Age: "))
            department = input("Department: ")
            salary = float(input("Salary: "))
            managed_department = input("Managed Department: ")
            Manager(first_name, last_name, age,
                    department, salary, managed_department)
            print("A Manager has been Added Successfully")

        except:
            print('Error in Adding New Manager')

    def list_all_employees(self):
        try:
            Employee.list_employees()

        except:
            print('Error in Showing All Employees')

    def fire_employee(self):
        try:
            employee_id = input("Please Enter The Employee ID : ")
            Employee.fire(int(employee_id))

        except:
            print('Error in Firing An Employee')

    def quit_program(self):
        print("Exit The program...")
        sys.exit()

app = Main()
app.menu()
