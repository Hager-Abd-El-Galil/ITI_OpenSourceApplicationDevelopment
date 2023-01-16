package notepadfx;

import javafx.application.Application;
import javafx.fxml.FXMLLoader;
import javafx.scene.Parent;
import javafx.scene.Scene;
import javafx.stage.Stage;

/**
 *
 * @author ITI
 */
public class NotePadFX extends Application {
    
    @Override
    public void start(Stage stage) throws Exception {
        Parent root = new NotePadUI(stage);
        Scene scene = new Scene(root);
        stage.setTitle("NotePad");
        stage.setScene(scene);
        stage.show();
    }

    /**
     * @param args the command line arguments
     */
    public static void main(String[] args) {
        launch(args);
    }
    
}
