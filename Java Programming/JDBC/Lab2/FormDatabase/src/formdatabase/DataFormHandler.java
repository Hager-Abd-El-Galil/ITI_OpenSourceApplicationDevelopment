package formdatabase;

import java.sql.Connection;
import java.sql.PreparedStatement;
import java.sql.ResultSet;
import java.sql.SQLException;
import java.sql.Statement;
import javafx.event.ActionEvent;
import javafx.scene.control.Alert;
import javafx.scene.control.Alert.AlertType;
import javafx.scene.control.Button;
import javafx.scene.control.Separator;
import javafx.scene.control.TextField;
import javafx.scene.control.ToolBar;
import javafx.scene.layout.Pane;
import javafx.scene.text.Font;
import javafx.scene.text.Text;
import javafx.stage.Stage;
import javax.sql.DataSource;

public class DataFormHandler extends Pane {

    protected final Text text;
    protected final TextField textField;
    protected final Text text0;
    protected final TextField textField0;
    protected final Text text1;
    protected final TextField textField1;
    protected final Text text2;
    protected final TextField textField2;
    protected final Text text3;
    protected final TextField textField3;
    protected final Text text4;
    protected final TextField textField4;
    protected final Button button;
    protected final Button button0;
    protected final Button button1;
    protected final Button button2;
    protected final Button button3;
    protected final Button button4;
    protected final Button button5;
    protected final Button button6;
    protected final ToolBar toolBar;
    protected final Text text5;
    protected final Separator separator;
    protected final Separator separator0;
    protected final Separator separator1;
    protected final Separator separator2;
    protected final Separator separator3;
    protected final Text text6;
    protected int row = 1;

    public DataFormHandler(Stage stage) {
        stage.setTitle("Form");
        text = new Text();
        textField = new TextField();
        text0 = new Text();
        textField0 = new TextField();
        text1 = new Text();
        textField1 = new TextField();
        text2 = new Text();
        textField2 = new TextField();
        text3 = new Text();
        textField3 = new TextField();
        text4 = new Text();
        textField4 = new TextField();
        button = new Button();
        button0 = new Button();
        button1 = new Button();
        button2 = new Button();
        button3 = new Button();
        button4 = new Button();
        button5 = new Button();
        button6 = new Button();
        toolBar = new ToolBar();
        text5 = new Text();
        separator = new Separator();
        separator0 = new Separator();
        separator1 = new Separator();
        separator2 = new Separator();
        separator3 = new Separator();
        text6 = new Text();

        setMaxHeight(USE_PREF_SIZE);
        setMaxWidth(USE_PREF_SIZE);
        setMinHeight(USE_PREF_SIZE);
        setMinWidth(USE_PREF_SIZE);
        setPrefHeight(400.0);
        setPrefWidth(600.0);

        text.setLayoutX(64.0);
        text.setLayoutY(83.0);
        text.setStrokeType(javafx.scene.shape.StrokeType.OUTSIDE);
        text.setStrokeWidth(0.0);
        text.setText("ID");
        text.setFont(new Font("System Bold", 14.0));

        textField.setAlignment(javafx.geometry.Pos.BOTTOM_LEFT);
        textField.setLayoutX(164.0);
        textField.setLayoutY(65.0);
        textField.setPrefHeight(26.0);
        textField.setPrefWidth(196.0);

        text0.setLayoutX(44.0);
        text0.setLayoutY(128.0);
        text0.setStrokeType(javafx.scene.shape.StrokeType.OUTSIDE);
        text0.setStrokeWidth(0.0);
        text0.setText("First Name");
        text0.setFont(new Font("System Bold", 14.0));

        textField0.setLayoutX(164.0);
        textField0.setLayoutY(110.0);
        textField0.setPrefHeight(26.0);
        textField0.setPrefWidth(196.0);

        text1.setLayoutX(35.0);
        text1.setLayoutY(173.0);
        text1.setStrokeType(javafx.scene.shape.StrokeType.OUTSIDE);
        text1.setStrokeWidth(0.0);
        text1.setText("Middle Name");
        text1.setFont(new Font("System Bold", 14.0));

        textField1.setLayoutX(164.0);
        textField1.setLayoutY(155.0);
        textField1.setPrefHeight(26.0);
        textField1.setPrefWidth(196.0);

        text2.setLayoutX(45.0);
        text2.setLayoutY(218.0);
        text2.setStrokeType(javafx.scene.shape.StrokeType.OUTSIDE);
        text2.setStrokeWidth(0.0);
        text2.setText("Last Name");
        text2.setFont(new Font("System Bold", 14.0));

        textField2.setLayoutX(164.0);
        textField2.setLayoutY(200.0);
        textField2.setPrefHeight(26.0);
        textField2.setPrefWidth(196.0);

        text3.setLayoutX(54.0);
        text3.setLayoutY(263.0);
        text3.setStrokeType(javafx.scene.shape.StrokeType.OUTSIDE);
        text3.setStrokeWidth(0.0);
        text3.setText("Email");
        text3.setFont(new Font("System Bold", 14.0));

        textField3.setLayoutX(164.0);
        textField3.setLayoutY(245.0);
        textField3.setPrefHeight(26.0);
        textField3.setPrefWidth(196.0);

        text4.setLayoutX(51.0);
        text4.setLayoutY(308.0);
        text4.setStrokeType(javafx.scene.shape.StrokeType.OUTSIDE);
        text4.setStrokeWidth(0.0);
        text4.setText("Phone");
        text4.setFont(new Font("System Bold", 14.0));

        textField4.setLayoutX(164.0);
        textField4.setLayoutY(290.0);
        textField4.setPrefHeight(26.0);
        textField4.setPrefWidth(196.0);

        button6.setLayoutX(30.0);
        button6.setLayoutY(354.0);
        button6.setMinHeight(10.0);
        button6.setMnemonicParsing(false);
        button6.setPrefHeight(33.0);
        button6.setPrefWidth(58.0);
        button6.setText("Clear");
        button6.setOnAction((ActionEvent event) -> {
        if((textField.getText()).isEmpty()){
                Alert alert = new Alert(AlertType.INFORMATION, "Altready Clear!");
                alert.show();
        }
        else{
              PersonData(0);
        }
        });
        
        button.setLayoutX(100.0);
        button.setLayoutY(354.0);
        button.setMinHeight(10.0);
        button.setMnemonicParsing(false);
        button.setPrefHeight(33.0);
        button.setPrefWidth(58.0);
        button.setText("New");
        button.setOnAction((ActionEvent event) -> {
            if((textField.getText()).isEmpty()){
                Alert alert = new Alert(AlertType.INFORMATION, "There is No Data Submitted \n Please Enter Your Data");
                alert.show();
            }
            else{
                PersonData(1);
                Alert alert = new Alert(AlertType.INFORMATION, "Data Submitted Successfully");
                alert.show();
            }
        });

        button0.setLayoutX(170.0);
        button0.setLayoutY(354.0);
        button0.setMinHeight(10.0);
        button0.setMnemonicParsing(false);
        button0.setPrefHeight(33.0);
        button0.setPrefWidth(58.0);
        button0.setText("Update");
        button0.setOnAction((ActionEvent event) -> {
            if((textField.getText()).isEmpty()){
                Alert alert = new Alert(AlertType.INFORMATION, "There is No Data Entered");
                alert.show();
            }
            else{
              PersonData(2);
            }
        });

        button1.setLayoutX(240.0);
        button1.setLayoutY(354.0);
        button1.setMinHeight(10.0);
        button1.setMnemonicParsing(false);
        button1.setPrefHeight(33.0);
        button1.setPrefWidth(58.0);
        button1.setText("Delete");
        button1.setOnAction((ActionEvent event) -> {
            PersonData(3);
        });

        button2.setLayoutX(310.0);
        button2.setLayoutY(354.0);
        button2.setMinHeight(10.0);
        button2.setMnemonicParsing(false);
        button2.setPrefHeight(33.0);
        button2.setPrefWidth(58.0);
        button2.setText("First");
        button2.setOnAction((ActionEvent event) -> {
            PersonData(4);
        });

        button3.setLayoutX(380.0);
        button3.setLayoutY(354.0);
        button3.setMinHeight(10.0);
        button3.setMnemonicParsing(false);
        button3.setPrefHeight(33.0);
        button3.setPrefWidth(58.0);
        button3.setText("Previous");
        button3.setOnAction((ActionEvent event) -> {
            PersonData(5);
        });

        button4.setLayoutX(450.0);
        button4.setLayoutY(354.0);
        button4.setMinHeight(10.0);
        button4.setMnemonicParsing(false);
        button4.setPrefHeight(33.0);
        button4.setPrefWidth(58.0);
        button4.setText("Next");
        button4.setOnAction((ActionEvent event) -> {
            PersonData(6);
        });

        button5.setLayoutX(520.0);
        button5.setLayoutY(354.0);
        button5.setMinHeight(10.0);
        button5.setMnemonicParsing(false);
        button5.setPrefHeight(33.0);
        button5.setPrefWidth(58.0);
        button5.setText("Last");
        button5.setOnAction((ActionEvent event) -> {
            PersonData(7);
        });

        toolBar.setLayoutX(-5.0);
        toolBar.setLayoutY(-6.0);
        toolBar.setOpacity(0.75);
        toolBar.setPrefHeight(45.0);
        toolBar.setPrefWidth(606.0);

        text5.setFill(javafx.scene.paint.Color.BLACK);
        text5.setFontSmoothingType(javafx.scene.text.FontSmoothingType.LCD);
        text5.setStrokeType(javafx.scene.shape.StrokeType.OUTSIDE);
        text5.setStrokeWidth(0.0);
        text5.setText("       Employee Information");
        text5.setWrappingWidth(259.9669530391693);
        text5.setFont(new Font("System Bold", 16.0));

        separator.setLayoutX(14.0);
        separator.setLayoutY(51.0);
        separator.setPrefHeight(3.0);
        separator.setPrefWidth(90.0);

        separator0.setLayoutX(243.0);
        separator0.setLayoutY(53.0);
        separator0.setPrefHeight(3.0);
        separator0.setPrefWidth(334.0);

        separator1.setLayoutX(11.0);
        separator1.setLayoutY(52.0);
        separator1.setOrientation(javafx.geometry.Orientation.VERTICAL);
        separator1.setPrefHeight(290.0);
        separator1.setPrefWidth(4.0);

        separator2.setLayoutX(11.0);
        separator2.setLayoutY(340.0);
        separator2.setPrefHeight(3.0);
        separator2.setPrefWidth(566.0);

        separator3.setLayoutX(574.0);
        separator3.setLayoutY(54.0);
        separator3.setOrientation(javafx.geometry.Orientation.VERTICAL);
        separator3.setPrefHeight(290.0);
        separator3.setPrefWidth(4.0);

        text6.setLayoutX(124.0);
        text6.setLayoutY(58.0);
        text6.setStrokeType(javafx.scene.shape.StrokeType.OUTSIDE);
        text6.setStrokeWidth(0.0);
        text6.setText("Personal Details");
        text6.setWrappingWidth(100);
        text6.setFont(new Font("System Italic", 14.0));

        getChildren().add(text);
        getChildren().add(textField);
        getChildren().add(text0);
        getChildren().add(textField0);
        getChildren().add(text1);
        getChildren().add(textField1);
        getChildren().add(text2);
        getChildren().add(textField2);
        getChildren().add(text3);
        getChildren().add(textField3);
        getChildren().add(text4);
        getChildren().add(textField4);
        getChildren().add(button);
        getChildren().add(button0);
        getChildren().add(button1);
        getChildren().add(button2);
        getChildren().add(button3);
        getChildren().add(button4);
        getChildren().add(button5);
        getChildren().add(button6);
        toolBar.getItems().add(text5);
        getChildren().add(toolBar);
        getChildren().add(separator);
        getChildren().add(separator0);
        getChildren().add(separator1);
        getChildren().add(separator2);
        getChildren().add(separator3);
        getChildren().add(text6);
        

    }
    public  void PersonData(int flag)
    {
       DataSource ds =  MyDataSourceFactory.getMySQLDataSource();
       Connection con = null;
       Statement state = null;
       ResultSet rs = null;
       int lastIndex = 0;

       try{ 
               con = ds.getConnection();
               state = (Statement) con.createStatement(ResultSet.TYPE_SCROLL_SENSITIVE, ResultSet.CONCUR_UPDATABLE);
               rs = state.executeQuery("SELECT ID, Fname, Mname, Lname, Email, Phone FROM data");

                while (rs.next()) {
                    lastIndex++;
                }
               rs.beforeFirst();
              try {
                       
               switch(flag)
               {
                   case 0:    //Clear
                   {
                        textField.clear();
                        textField0.clear();
                        textField1.clear();
                        textField2.clear();
                        textField3.clear();
                        textField4.clear();
                       break;
                   }
                   case 1:    //New
                   {
                        lastIndex++;
                        rs.absolute(lastIndex);
                        rs.moveToInsertRow(); 
                        PreparedStatement pstate = con.prepareStatement("INSERT INTO data (ID, Fname, Mname, Lname, Email, Phone) VALUES(?,?,?,?,?,?)");
                        pstate.setInt(1,Integer.parseInt(textField.getText()));
                        pstate.setString(2, textField0.getText());
                        pstate.setString(3, textField1.getText());
                        pstate.setString(4, textField2.getText());
                        pstate.setString(5, textField3.getText());
                        pstate.setString(6, textField4.getText());
                        pstate.executeUpdate();
    
                       break;
                   }
                   case 2:    //Update
                   {
                        rs.absolute(row);
                        rs.updateString(1, textField.getText());
                        rs.updateString(2, textField0.getText());
                        rs.updateString(3, textField1.getText());
                        rs.updateString(4, textField2.getText());
                        rs.updateString(5, textField3.getText());
                        rs.updateString(6, textField4.getText());
                        rs.updateRow();    
                       break;
                   } 
                   case 3:    //Delete
                   {
                        rs.absolute(row);
                        rs.deleteRow();
                        row--;    
                        rs.absolute(row);
                       break;
                   } 
                   case 4:    //First
                   {
                       rs.first();
                       row = 1;
                   
                       break;
                   } 
                   case 5:    //Previous
                   {
                        row--;
                        if (row < 1) {
                            row = lastIndex;
                        }
                        rs.absolute(row);  
                       break;
                   } 
                   case 6:    //Next
                   {
                        row++;
                        if (row > lastIndex) {
                            row = 1;
                        }
                        rs.absolute(row);     
                       break;
                   } 
                   case 7:    //Last
                   {
                       rs.last();
                       row = lastIndex;
                       break;
                   } 
               }
               
               if(flag != 1)
                {
                    textField.setText(Integer.toString(rs.getInt(1)));
                    textField0.setText(rs.getString(2));
                    textField1.setText(rs.getString(3));
                    textField2.setText(rs.getString(4));
                    textField3.setText(rs.getString(5));
                    textField4.setText(rs.getString(6));
                    state.close();
                    con.close();
                }
             } catch (Exception e) {
                 e.printStackTrace();
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
}
