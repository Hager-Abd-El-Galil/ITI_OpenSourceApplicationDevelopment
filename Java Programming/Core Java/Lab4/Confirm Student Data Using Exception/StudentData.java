public class StudentData{
 
    public String checkID(String ID) throws StudentNotFoundException {
	Integer studentID = Integer.parseInt(ID);
        if (studentID > 0 && studentID < 100) 
	{
            return ID;
        } 
	else 
	{
            throw new StudentNotFoundException(
                "Could not find student with ID " + studentID);
        }
    }
 
    public String checkName(String Name) throws StudentNotFoundException {
        if (Name.equals("Hager")) 
	{
            return Name;
        } 
	else 
	{
            throw new StudentNotFoundException(
                "Could not find student with Name " + Name);
        }
    }
	
    public String checkSubject(String Subject) throws StudentNotFoundException {
        if (Subject.equals("Math")) 
	{
            return Subject;
        } 
	else 
	{
            throw new StudentNotFoundException(
                "Could not find student Studies Subject " + Subject);
        }
    }
}