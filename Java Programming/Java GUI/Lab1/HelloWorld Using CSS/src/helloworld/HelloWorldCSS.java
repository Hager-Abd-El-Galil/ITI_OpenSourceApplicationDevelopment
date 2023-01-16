package helloworld;

import javafx.application.Application;
import javafx.scene.Scene;
import javafx.scene.layout.StackPane;
import javafx.scene.text.Text;
import javafx.stage.Stage;
import javafx.application.Application;
import javafx.scene.Scene;
import javafx.scene.effect.Reflection;
import javafx.scene.layout.StackPane;
import javafx.scene.shape.Rectangle;
import javafx.scene.text.Text;
import javafx.stage.Stage;


/**
 *
 * @author ITI
 */
public class HelloWorldCSS extends Application
{   
    @Override
    public void start(Stage primaryStage) throws Exception
    {
        Text helloWorld = new Text("Hello World");
        helloWorld.setId("Text");
        Text reflectedhelloWorld = new Text("Hello World");
        reflectedhelloWorld.setId("ReflectedText");
        
        Rectangle rectangle = new Rectangle(0, 0, 400, 300);
        rectangle.setId("Background");
        
        StackPane rootPane = new StackPane();
        rootPane.getChildren().add(rectangle);
        rootPane.getChildren().add(helloWorld);
        rootPane.getChildren().add(reflectedhelloWorld);
        
        Scene scene = new Scene(rootPane,400,300);
        scene.getStylesheets().add("style.css");
        
        
        primaryStage.setTitle("Hello World");
        primaryStage.setScene(scene);
        primaryStage.show();
        
    }
    
    public static void main(String[] args) 
    {
       Application.launch(args);
    }
    
}
