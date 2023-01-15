/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package webrowset;

import com.sun.rowset.WebRowSetImpl;
import java.io.FileInputStream;
import java.io.FileNotFoundException;
import java.io.FileOutputStream;
import java.io.FileReader;
import java.io.FileWriter;
import java.io.IOException;
import java.sql.Connection;
import java.sql.DriverManager;
import java.sql.SQLException;
import javax.sql.rowset.WebRowSet;

/**
 *
 * @author ITI
 */
public class WebRowSet {

    public static void main(String[] args) throws SQLException, FileNotFoundException, IOException {
                
        String URL = "jdbc:mysql://localhost:3306/formdata";
        String UserName = "username";
        String Password = "password";
        
        WebRowSet fullNameList = new WebRowSetImpl();
        
        fullNameList.setUrl(URL);
        fullNameList.setUsername(UserName);
        fullNameList.setPassword(Password);
        
        int key[] = {1};
        fullNameList.setCommand("SELECT * FROM data");
        fullNameList.setKeyColumns(key);
        fullNameList.execute();
        
        while (fullNameList.next()) 
        {
               System.out.println("ID: "+fullNameList.getInt(1) + " , " +"Name: " + fullNameList.getString(2) + " " + fullNameList.getString(3) + " " + fullNameList.getString(4)+ " , " +"Email: " + fullNameList.getString(5)+ " , " + "Phone: " + fullNameList.getString(6));
        }
        //Write in XML File
        FileWriter writer = new FileWriter("empList.xml");
        fullNameList.writeXml(writer);
        writer.close();
    }
    
}
