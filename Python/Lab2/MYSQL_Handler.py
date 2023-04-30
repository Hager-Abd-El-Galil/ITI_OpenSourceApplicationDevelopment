import mysql.connector


class DBHandler:
    conn = {}

    def __init__(self, host, user, password, database):
        self.host = host
        self.user = user
        self.password = password
        self.database = database
        self.conn = None

    def connect(self):
        try:
            self.conn = mysql.connector.connect(
                host=self.host,
                user=self.user,
                password=self.password,
                database=self.database
            )
            return self.conn

        except mysql.connector.Error as e:
            print(f"Error in Connection With Database: {e}")
            return None

    def disconnect(self):
        self.conn.close()

    def create_table(self):
        try:
            self.connect()
            cur = self.conn.cursor()
            cur.execute('''drop table if exists employees''')
            cur.execute('''create table employees(
                            id INT AUTO_INCREMENT PRIMARY KEY,
                            first_name VARCHAR(255),
                            last_name VARCHAR(255),
                            age INT,
                            department VARCHAR(255),
                            salary INT,
                            managed_department VARCHAR(255) DEFAULT NULL
                            );''')
            self.conn.commit()
            print('A Table has been created successfully')
            cur.close()
            self.disconnect()

        except mysql.connector.Error as e:
            print(f"Error in Creating Table in Database: {e}")
            return None

    def insert_employee(self, employee):
        try:
            self.connect()
            cur = self.conn.cursor()
            sql = '''Insert into employees(first_name, last_name, age, department, salary, managed_department)
                            values(%s, %s, %s, %s, %s, %s)'''
            values = (employee.first_name, employee.last_name, employee.age,
                      employee.department, employee.salary, 'NULL')
            cur.execute(sql, values)
            employee_id = cur.lastrowid
            self.conn.commit()
            print('An Employee has been inserted successfully')
            cur.close()
            self.disconnect()
            return employee_id

        except mysql.connector.Error as e:
            print(f"Error in Creating Table in Database: {e}")
            return None

    def update_employee_department(self, employee_id, dept):
        try:
            self.connect()
            cur = self.conn.cursor()
            sql = '''UPDATE employees
                    SET department = %s
                    WHERE id = %s'''
            values = (dept, employee_id)
            cur.execute(sql, values)
            self.conn.commit()
            print('An Employee departement has been updated successfully')
            cur.close()
            self.disconnect()

        except mysql.connector.Error as e:
            print(f"Error in Updating Employee Department: {e}")
            return None

    def delete_employee(self, employee_id):
        try:
            self.connect()
            cur = self.conn.cursor()
            sql = '''DELETE FROM employees
                    WHERE id = %s'''
            values = (employee_id)
            cur.execute(sql, values)
            self.conn.commit()
            print('An Employee has been deleted successfully')
            cur.close()
            self.disconnect()

        except mysql.connector.Error as e:
            print(f"Error in Deleting Employee from Database {e}")
            return None

    def get_all_employees(self):
        try:
            self.connect()
            cur = self.conn.cursor()
            sql = '''SELECT id, first_name, last_name, age, department, salary, managed_department
                    FROM employees'''
            cur.execute(sql)
            employees = cur.fetchall()
            cur.close()
            self.disconnect()
            return employees

        except mysql.connector.Error as e:
            print(f"Error in Getting All Employees from Database {e}")
            return None

    def update_manager_department(self, employee_id, dept):
        try:
            self.connect()
            cur = self.conn.cursor()
            sql = '''UPDATE employees
                    SET managed_department = %s
                    WHERE id = %s'''
            values = (dept, employee_id)
            cur.execute(sql, values)
            self.conn.commit()
            print('A Manager departement has been updated successfully')
            cur.close()
            self.disconnect()

        except mysql.connector.Error as e:
            print(f"Error in Updating Manager Managed Departement from Database {e}")
            return None
