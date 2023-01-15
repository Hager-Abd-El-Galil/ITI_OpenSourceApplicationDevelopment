/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package cachedrowset;

import java.sql.Connection;
import java.sql.DriverManager;
import java.sql.SQLException;
import javax.sql.rowset.CachedRowSet;
import javax.sql.rowset.RowSetFactory;
import javax.sql.rowset.RowSetProvider;

/**
 *
 * @author ITI
 */
public class CachedRowSet {


    public static void main(String[] args) throws SQLException {
      
        DriverManager.registerDriver(new com.mysql.jdbc.Driver());
        
        String URL = "jdbc:mysql://localhost:3306/formdata";
        String UserName = "username";
        String Password = "password";
        
        Connection con = DriverManager.getConnection(URL,UserName,Password);
        con.setAutoCommit(false);
        
        RowSetFactory factory = RowSetProvider.newFactory();
        CachedRowSet crs = factory.createCachedRowSet();

        crs.setCommand("select * from data");
        crs.execute(con);
        System.out.println("\nTABLE DATA BEFORE INSERTING ANY NEW DATA");
        while (crs.next()) 
        {
               System.out.println("ID: "+crs.getInt(1) + " , " +"Name: " + crs.getString(2) + " " + crs.getString(3) + " " + crs.getString(4)+ " , " +"Email: " + crs.getString(5)+ " , " + "Phone: " + crs.getString(6));
        }
        
        crs.first();
        crs.updateString(2, "Hager");
        crs.updateRow();
        crs.acceptChanges(con);
        crs.beforeFirst();
        System.out.println("\nTABLE DATA AFTER UPDATING FIRST DATA");
        while (crs.next()) 
        {
               System.out.println("ID: "+crs.getInt(1) + " , " +"Name: " + crs.getString(2) + " " + crs.getString(3) + " " + crs.getString(4)+ " , " +"Email: " + crs.getString(5)+ " , " + "Phone: " + crs.getString(6));
        }
        
        crs.moveToInsertRow();
        crs.updateInt(1, 6);
        crs.updateString(2, "Ali");
        crs.updateString(3, "Amr");
        crs.updateString(4, "Ali");
        crs.updateString(5, "Ali@gmail.com");
        crs.updateString(6, "01025678111");
        crs.insertRow();
        crs.moveToCurrentRow(); 
        crs.acceptChanges(con); 
        crs.beforeFirst();
        System.out.println("\nTABLE DATA AFTER INSERTING NEW DATA");    
        while (crs.next()) 
        {
                    System.out.println("ID: "+crs.getInt(1) + " , " +"Name: " + crs.getString(2) + " " + crs.getString(3) + " " + crs.getString(4)+ " , " +"Email: " + crs.getString(5)+ " , " + "Phone: " + crs.getString(6));
        }
        
        crs.last();
        crs.deleteRow();
        crs.acceptChanges(con);
        crs.beforeFirst();
        
        System.out.println("\nTABLE DATA AFTER DELETING LAST ROW");    
        while (crs.next()) 
        {
                    System.out.println("ID: "+crs.getInt(1) + " , " +"Name: " + crs.getString(2) + " " + crs.getString(3) + " " + crs.getString(4)+ " , " +"Email: " + crs.getString(5)+ " , " + "Phone: " + crs.getString(6));
        }
    }
}

