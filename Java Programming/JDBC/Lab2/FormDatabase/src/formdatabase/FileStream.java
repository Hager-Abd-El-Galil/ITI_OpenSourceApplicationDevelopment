
package formdatabase;

import java.io.FileNotFoundException;
import java.io.FileOutputStream;
import java.io.IOException;
import java.io.OutputStream;
import java.util.Properties;
import java.sql.Statement;
import java.util.logging.Level;
import java.util.logging.Logger;



public class FileStream 
{
  
    public FileStream(){
        
          Properties prop = new Properties();
          OutputStream output = null;
        try {
            output = new FileOutputStream("db.properties");
            prop.setProperty("MYSQL_DB_URL","jdbc:mysql://localhost:3306/formdata");
            prop.setProperty("MYSQL_DB_USERNAME","username");
            prop.setProperty("MYSQL_DB_PASSWORD","password");
            prop.store(output,null);
        } catch (FileNotFoundException ex) {
            Logger.getLogger(FileStream.class.getName()).log(Level.SEVERE, null, ex);
        } catch (IOException ex) {
            Logger.getLogger(FileStream.class.getName()).log(Level.SEVERE, null, ex);
        }
        if(output != null)
        {
            try{
                output.close();
            }catch (IOException io) {
                io.printStackTrace();
            }
        }  
    }

}
