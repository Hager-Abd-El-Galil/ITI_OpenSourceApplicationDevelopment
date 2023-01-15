package database;

import static com.sun.corba.se.impl.presentation.rmi.StubConnectImpl.connect;
import static java.lang.Character.UnicodeBlock.forName;
import java.sql.DriverManager;
import java.sql.SQLException;
import java.util.logging.Level;
import java.util.logging.Logger;
import java.sql.*;
import java.math.*;

/**
 *
 * @author ITI
 */
public class ConnectToDatabase {
    
    Database1()
    {
       /** 1- Driver Loading */
        try {
            DriverManager.registerDriver(new com.mysql.jdbc.Driver());
            /** 2- Create Connection */
            String URL = "jdbc:mysql://localhost:3306/intake43";
            String UserName = "username";
            String Password = "password";
            try (Connection con = DriverManager.getConnection(URL,UserName,Password)) {
                if(con != null)
                {
                    System.out.println("Connected Succefully");
                }
                
                /** 3- Create Statement */
                try ( Statement state = con.createStatement(ResultSet.CONCUR_UPDATABLE,ResultSet.TYPE_SCROLL_SENSITIVE))
                {
                    String queryString = "select concat(e.Fname,' ',e.Lname) as Name,Pname\n" +
                                         "from employee e,project p,departments d\n" +
                                         "where e.Dno = p.Dnum and d.Dnum = p.Dnum\n" +
                                         "order by Pname";
                    String insertQueryString = "insert  into `employee`\n" +
                                                "(`Fname`,`Lname`,`SSN`,`Bdate`,`Address`,`gender`,`Dno`) \n" +
                                                "values('Hager','Abd El Galil',254789,'1999-12-24 00:00:00.000000','119 st maamora','F',30)";

                    /** 4- Execution */
                    
                    state.executeUpdate(insertQueryString);
                    ResultSet rs = state.executeQuery(queryString);
                   
                    while (rs.next()) {
                        System.out.println("Employee Name: "+rs.getString(1) + " , " +"Project Name: " + rs.getString(2));
                    }
                    /** 5- Close*/
                    con.close();
                    state.close();
                }
            }
        }catch(SQLException ex){
            System.out.println("There is a Problem!");
            ex.printStackTrace();
            }
    }
    public static void main(String[] args) 
    {
        new ConnectToDatabase();
    }
    
    
}
