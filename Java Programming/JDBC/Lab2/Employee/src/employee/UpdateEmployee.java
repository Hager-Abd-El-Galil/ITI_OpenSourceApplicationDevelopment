package employee;

import java.sql.Connection;
import java.sql.PreparedStatement;
import java.sql.ResultSet;
import java.sql.SQLException;
import java.sql.Statement;
import javax.sql.DataSource;

/**
 *
 * @author ITI
 */
public class UpdateEmployee {   
    private static void UpdateEmployeeData() throws SQLException{
        DataSource ds =  MyDataSourceFactory.getMySQLDataSource();
        Connection con = null;
        Statement state = null;
        ResultSet rs = null;
       
        con = ds.getConnection();
        state = (Statement) con.createStatement();  
        con.setAutoCommit(false);
        
        /**Modify Records in Employee Table*/ 
        String ModifyVacationQuery = "UPDATE Employee\n" +
                                     "SET Vacation_Balance = 45\n" +
                                     "WHERE Age > 45;";
        state = con.createStatement();
        state.addBatch(ModifyVacationQuery);
        state.executeBatch();
        
       String ModifyFnameQuery1 =  "UPDATE Employee\n" +
                                    "SET Fname = CONCAT('MRs. ',Fname)\n" +
                                    "WHERE Sex LIKE 'Female'";
        
        state = con.createStatement();
        state.addBatch(ModifyFnameQuery1);
        state.executeBatch();
        
        String ModifyFnameQuery2 = "UPDATE Employee\n" +
                                    "SET Fname = CONCAT('MR. ',Fname)\n" +
                                    "WHERE Sex LIKE 'Male'";
        
        state = con.createStatement();
        state.addBatch(ModifyFnameQuery2);
        state.executeBatch();
        
        int [] Count = state.executeBatch();
        con.commit();
       
         rs = state.executeQuery("select * from Employee");
         while(rs.next())
         {
                   System.out.println("ID: "+rs.getInt(1) + " , " +"Name: " + rs.getString(2)+ " " +rs.getString(3)+ " , "+" Gender: " +rs.getString(4)+ " , " +"Age: "+ rs.getInt(5)+" , " +"Address: "+ rs.getString(6)+" , " +"Phone Number: " +rs.getString(7)+" , " +"Vacation Balance: " +rs.getString(8));
         }
        
    }
   
    public static void main(String[] args) {
        try {
            UpdateEmployeeData();
        } catch (SQLException ex) {
            ex.printStackTrace();
        }
        
    }
    
}
 
        