import java.awt.BorderLayout;
import java.util.logging.Level;
import java.util.logging.Logger;
import javax.swing.JFrame;
import javax.swing.JLabel;

public class JavaWordApp extends JFrame implements Runnable 
{
    Thread th;
    String str = "Java World";
    JLabel Label = new JLabel();
    int x = 0;
    
    public JavaWordApp()
    {   
        this.setDefaultCloseOperation(JFrame.EXIT_ON_CLOSE);
        this.setTitle("Banner Application :)");
        Label.setHorizontalAlignment(JLabel.CENTER);
        Label.setText(str);
        this.add(Label,BorderLayout.WEST);
        th = new Thread(this);
        th.start();
    }
    public static void main(String[] args) {
       JavaWordApp app = new JavaWordApp();
       app.setBounds(50,50,600,400);
       app.setVisible(true);
    }
   

    @Override
    public void run() 
    {
        while(true)
        {
             Label.setText(str);
            try {  
                x = Label.getX();
                x++;
                Label.setLocation(x%(this.getWidth()),Label.getY());
                Thread.sleep(10);
            } catch (InterruptedException ex) {
                Logger.getLogger(JavaWordApp.class.getName()).log(Level.SEVERE, null, ex);
            }
            
        }
    }
    
    public Object getsize() {
        throw new UnsupportedOperationException("Not supported yet."); //To change body of generated methods, choose Tools | Templates.
    }
    
}
