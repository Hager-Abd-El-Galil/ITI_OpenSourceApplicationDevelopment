
package helloworld;

import java.awt.Color;
import java.awt.MultipleGradientPaint.CycleMethod;
import static java.lang.ProcessBuilder.Redirect.to;
import javafx.application.Application;
import javafx.scene.Scene;
import javafx.scene.effect.Reflection;
import javafx.scene.layout.StackPane;
import javafx.scene.paint.LinearGradient;
import javafx.scene.paint.Stop;
import javafx.scene.text.Font;
import javafx.scene.text.Text;
import javafx.stage.Stage;


/**
 *
 * @author ITI
 */
public class HelloWorld extends Application
{   
    @Override
    public void start(Stage primaryStage) throws Exception
    {
        Text helloWorld = new Text("Hello World");
        StackPane rootPane = new StackPane(helloWorld);
        Scene scene = new Scene(rootPane,400,300);
        Reflection reflection = new Reflection();
        reflection.setFraction(0.7);
                
        helloWorld.setStyle("-fx-fill:RED");
        helloWorld.setFont(Font.font ("Verdana", 30));
        helloWorld.setEffect(reflection);
        
        Stop[] stops;
        stops = new Stop[] {
            new Stop(0, javafx.scene.paint.Color.BLACK),
            new Stop(0.5, javafx.scene.paint.Color.WHITE),
            new Stop(1, javafx.scene.paint.Color.BLACK)
        };
        LinearGradient gradient;
        gradient = new LinearGradient(0, 0, 0, 1, true, javafx.scene.paint.CycleMethod.NO_CYCLE, stops);
        scene.setFill(gradient);
        
        primaryStage.setTitle("Hello World");
        primaryStage.setScene(scene);
        primaryStage.show();
        
    }

   
    public static void main(String[] args) 
    {
        Application.launch(args);
    }
    
}
