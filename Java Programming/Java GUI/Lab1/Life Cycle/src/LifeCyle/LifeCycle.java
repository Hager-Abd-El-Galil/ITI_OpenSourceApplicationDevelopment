
package helloworld;

import javafx.application.Application;
import javafx.scene.Scene;
import javafx.scene.layout.StackPane;
import javafx.scene.text.Text;
import javafx.stage.Stage;

/**
 *
 * @author ITI
 */
public class LifeCycle extends Application
{
 
    public static void main(String[] args) 
    {
       launch(args);
    }
    
    public LifeCycle()
    {
        String name = Thread.currentThread().getName();
        System.out.println("Constructor Method: Current Thread: "+ name);
    }
    
    @Override
    public void init() throws Exception 
    {
        String name = Thread.currentThread().getName();
        System.out.println("init() Method: Current Thread: "+ name);
        super.init();
    }
    
    @Override
    public void start(Stage stage) throws Exception 
    {
        String name = Thread.currentThread().getName();
        System.out.println("start() Method: Current Thread: "+ name); 
        
        Text helloWorld = new Text("Hello World");
        StackPane rootPane = new StackPane(helloWorld);
        Scene scene = new Scene(rootPane,400,300);
        stage.setTitle("Hello World");
        stage.setScene(scene);
        stage.show();
    }
    
    @Override
    public void stop() throws Exception 
    {
        String name = Thread.currentThread().getName();
        System.out.println("stop() Method: Current Thread: "+ name);
        super.stop();
    }
    
    
}
