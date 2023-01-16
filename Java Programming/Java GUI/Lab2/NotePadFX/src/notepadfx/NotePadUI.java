package notepadfx;

import java.io.File;
import java.io.FileInputStream;
import java.io.FileNotFoundException;
import java.io.FileOutputStream;
import java.io.IOException;
import java.util.logging.Level;
import java.util.logging.Logger;
import javafx.application.Platform;
import javafx.event.ActionEvent;
import javafx.event.EventHandler;
import javafx.scene.Parent;
import javafx.scene.control.Alert;
import javafx.scene.control.Alert.AlertType;
import javafx.scene.control.Menu;
import javafx.scene.control.MenuBar;
import javafx.scene.control.MenuItem;
import javafx.scene.control.TextArea;
import javafx.scene.input.KeyCode;
import javafx.scene.input.KeyCodeCombination;
import javafx.scene.input.KeyCombination;
import javafx.scene.layout.BorderPane;
import javafx.stage.FileChooser;
import javafx.stage.Stage;

public class NotePadUI extends BorderPane {

    protected final MenuBar menuBar;
    protected final Menu menu;
    protected final MenuItem menuItem;
    protected final MenuItem menuItem0;
    protected final MenuItem menuItem1;
    protected final MenuItem menuItem2;
    protected final Menu menu0;
    protected final MenuItem menuItem3;
    protected final MenuItem menuItem4;
    protected final MenuItem menuItem5;
    protected final MenuItem menuItem6;
    protected final MenuItem menuItem7;
    protected final Menu menu1;
    protected final MenuItem menuItem8;
    protected final TextArea textArea;
    
    FileChooser fileChooser = null;
    String currentText = null;
    String currentPath = null;
    String noteName = null;

    static Stage s = new Stage();
    
    public NotePadUI(Stage stage) {

        menuBar = new MenuBar();
        menu = new Menu();
        menuItem = new MenuItem();
        menuItem0 = new MenuItem();
        menuItem1 = new MenuItem();
        menuItem2 = new MenuItem();
        menu0 = new Menu();
        menuItem3 = new MenuItem();
        menuItem4 = new MenuItem();
        menuItem5 = new MenuItem();
        menuItem6 = new MenuItem();
        menuItem7 = new MenuItem();
        menu1 = new Menu();
        menuItem8 = new MenuItem();
        textArea = new TextArea();

        setMaxHeight(USE_PREF_SIZE);
        setMaxWidth(USE_PREF_SIZE);
        setMinHeight(USE_PREF_SIZE);
        setMinWidth(USE_PREF_SIZE);
        setPrefHeight(400.0);
        setPrefWidth(600.0);

        BorderPane.setAlignment(menuBar, javafx.geometry.Pos.CENTER);

        menu.setMnemonicParsing(false);
        menu.setText("File");

        menuItem.setMnemonicParsing(false);
        menuItem.setText("New");
        menuItem.setAccelerator(KeyCombination. keyCombination("CTRL+N"));
        menuItem.setOnAction((ActionEvent e) -> {
            textArea.clear();
                Stage s = (Stage) textArea.getScene().getWindow();
                Parent root = new NotePadUI(s);
                s.setTitle("NotePad - New");
                fileChooser = null;
                currentText = null;
                currentPath = null; 
                noteName = null;
        });

        menuItem0.setMnemonicParsing(false);
        menuItem0.setText("Open");
        menuItem0.setAccelerator(new KeyCodeCombination(KeyCode.P, KeyCombination.CONTROL_DOWN));
        menuItem0.setOnAction((ActionEvent e) -> {
                FileChooser fileChooser1 = new FileChooser();
                fileChooser1.setTitle("Select File");
                File selectedFile = fileChooser1.showOpenDialog(stage);
                if (selectedFile != null) {
                    String path = selectedFile.getPath();
                    currentPath = path;
                    try {
                        FileInputStream fileInputStream = new FileInputStream(path);
                        byte[] text = new byte[fileInputStream.available()];
                        fileInputStream.read(text);
                        textArea.setText(new String(text));
                        currentText = textArea.getText();
                        String noteName1 = selectedFile.getName();
                        stage.setTitle(noteName1);
                        fileInputStream.close();
                    }catch (FileNotFoundException ex)
                    {
                        Logger.getLogger(NotePadUI.class.getName()).log(Level.SEVERE, null, ex);
                    }catch (IOException ex)
                    {
                        Logger.getLogger(NotePadUI.class.getName()).log(Level.SEVERE, null, ex);
                    }
                }
            });


        menuItem1.setMnemonicParsing(false);
        menuItem1.setText("Save");
        menuItem3.setAccelerator(new KeyCodeCombination(KeyCode.S, KeyCombination.CONTROL_DOWN));
        menuItem1.setOnAction((ActionEvent e) -> {
            if (currentPath == null) {
                FileChooser fileChooser1 = new FileChooser();
                fileChooser1.setTitle("Save File"); 
                File selectedFile = fileChooser1.showSaveDialog(stage);
                if (selectedFile != null)
                {
                    String path = selectedFile.getPath();
                    currentPath = path;
                    noteName = selectedFile.getName();
                    stage.setTitle(noteName);
                }
            }
            else    //currentPath != null 
            {
                try (FileOutputStream fileOutputStream = new FileOutputStream(currentPath)) 
                {
                    byte[] text = textArea.getText().getBytes();
                    fileOutputStream.write(text);
                    textArea.setText(new String(text));
                    currentText = textArea.getText();
                } catch (IOException ex) {
                    Logger.getLogger(NotePadUI.class.getName()).log(Level.SEVERE, null, ex);
                }
            }
        });

        menuItem2.setMnemonicParsing(false);
        menuItem2.setText("Exit");
        menuItem2.setAccelerator(KeyCombination. keyCombination("ALT+F4"));
        menuItem2.setOnAction((ActionEvent e) -> {
            stage.close();
            System.exit(0);
            Platform.exit();
        });

        menu0.setMnemonicParsing(false);
        menu0.setText("Edit");

        menuItem3.setMnemonicParsing(false);
        menuItem3.setText("Cut");
        menuItem3.setAccelerator(new KeyCodeCombination(KeyCode.X, KeyCombination.CONTROL_DOWN));
        menuItem3.setOnAction((ActionEvent event) -> {
            textArea.cut();
        });

        menuItem4.setMnemonicParsing(false);
        menuItem4.setText("Copy");
        menuItem4.setAccelerator(new KeyCodeCombination(KeyCode.C, KeyCombination.CONTROL_DOWN));
        menuItem4.setOnAction((ActionEvent event) -> {
            textArea.copy();
        });

        menuItem5.setMnemonicParsing(false);
        menuItem5.setText("Paste");
        menuItem5.setAccelerator(new KeyCodeCombination(KeyCode.V, KeyCombination.CONTROL_DOWN));
        menuItem5.setOnAction((ActionEvent event) -> {
            textArea.paste();
        });

        menuItem6.setMnemonicParsing(false);
        menuItem6.setText("Delete");
        menuItem6.setAccelerator(new KeyCodeCombination(KeyCode.D, KeyCombination.CONTROL_DOWN));
        menuItem6.setOnAction((ActionEvent e) -> {
            textArea.deleteText(textArea.getSelection());
        });
        
        menuItem7.setMnemonicParsing(false);
        menuItem7.setText("Select All");
        menuItem7.setAccelerator(new KeyCodeCombination(KeyCode.A, KeyCombination.CONTROL_DOWN));
        menuItem7.setOnAction((ActionEvent e) -> {
            textArea.selectAll();
        });

        menu1.setMnemonicParsing(false);
        menu1.setText("Help");

        menuItem8.setMnemonicParsing(false);
        menuItem8.setText("About");
        setTop(menuBar);
        
        menuItem8.setOnAction((ActionEvent ae) ->
        {
                Alert alert = new Alert(AlertType.INFORMATION, "FX NotePad Version 2.0 \nCreated by: Hager Abd El Galil");
                alert.show();
        });

        BorderPane.setAlignment(textArea, javafx.geometry.Pos.CENTER);
        textArea.setPrefHeight(200.0);
        textArea.setPrefWidth(200.0);
        setCenter(textArea);

        menu.getItems().add(menuItem);
        menu.getItems().add(menuItem0);
        menu.getItems().add(menuItem1);
        menu.getItems().add(menuItem2);
        menuBar.getMenus().add(menu);
        menu0.getItems().add(menuItem3);
        menu0.getItems().add(menuItem4);
        menu0.getItems().add(menuItem5);
        menu0.getItems().add(menuItem6);
        menu0.getItems().add(menuItem7);
        menuBar.getMenus().add(menu0);
        menu1.getItems().add(menuItem8);
        menuBar.getMenus().add(menu1);

    }

   /*private NotePadUI(Stage stage) {
        throw new UnsupportedOperationException("Not supported yet."); //To change body of generated methods, choose Tools | Templates.
    }*/
}
