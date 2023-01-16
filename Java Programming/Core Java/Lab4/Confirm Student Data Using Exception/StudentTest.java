import java.util.*;

public class StudentTest {
    public static void main(String[] args) {
        StudentData Student = new StudentData();
		
               if(args.length == 3)
	       {
			try 
			{
				Integer StudentID = Integer.parseInt(Student.checkID(args[0]));
				String StudentName = Student.checkName(args[1]);
				String StudentSubject = Student.checkSubject(args[2]);
			} 
			catch (StudentNotFoundException ex) 
			{
				System.err.print(ex);
			}
		}
		else
		{
			System.out.println("Please Enter 3 Arguments");
		}
    }
}
