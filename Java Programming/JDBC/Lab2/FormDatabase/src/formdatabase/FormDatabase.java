
package formdatabase;

import com.mysql.cj.jdbc.MysqlDataSource;
import java.sql.Connection;
import java.sql.ResultSet;
import java.sql.Statement;
import java.sql.SQLException;
import javafx.application.Application;
//import javafx.fxml.FXMLLoader;
import javafx.scene.Scene;
import javafx.stage.Stage;
import javax.sql.DataSource;


/**
 *
 * @author ITI
 */
public class FormDatabase extends Application {
    
    @Override
    public void start(Stage stage) throws Exception {
     
        Scene scene = new Scene(new DataFormHandler(stage));
        
        stage.setScene(scene);
        stage.show();
    }

    @Override
    public void init() throws Exception {
        super.init(); //To change body of generated methods, choose Tools | Templates.
         Database();
    }

  private static void Database()
   {
       DataSource ds =  MyDataSourceFactory.getMySQLDataSource();
       Connection con = null;
       Statement state = null;
       ResultSet rs = null;
       
       try{ 
               con = ds.getConnection();
               state = (Statement) con.createStatement();
               rs = state.executeQuery("select * from data");
               
               while(rs.next())
               {
                    System.out.println("ID: "+rs.getInt(1) + " , " +"Name: " + rs.getString(2)+ " " +rs.getString(3)+ " " +rs.getString(4));
               }

      } catch (SQLException ex) {
            ex.printStackTrace();
        }finally{
           try{
               if(rs != null)  rs.close();
               if(state != null)  state.close();
               if(con != null)  con.close();
           }catch (SQLException ex) {
               System.out.println("Error!!");
               ex.printStackTrace();
        }
       }
       
   }
    public static void main(String[] args) {
        launch(args);
       
    }
    
}
