from Employee import Employee
from prettytable import PrettyTable
from MYSQL_Handler import DBHandler


class Manager(Employee):

    db_conn = DBHandler("localhost", "root", "password", "database_name")

    def __init__(self, first_name, last_name, age, department, salary, managed_department):
        super().__init__(first_name, last_name, age, department, salary)
        self.managed_department = managed_department
        Manager.db_conn.update_manager_department(self.id , self.managed_department)

    def show(self):
        manager_table = PrettyTable()
        manager_table.field_names = ["ID", "First Name",
                                     "Last Name", "Age", "Department", "Salary", "Managed Department"]
        manager_table.add_row([self.id, self.first_name, self.last_name,
                              self.age, self.department, 'Confidential', self.managed_department])
        print("Manager Data")
        print(manager_table)
