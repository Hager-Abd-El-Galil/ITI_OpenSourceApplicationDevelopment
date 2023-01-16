package moveball;

import java.awt.BorderLayout;
import java.awt.FlowLayout;
import java.awt.Image;
import java.awt.Label;
import java.awt.image.BufferedImage;
import java.io.File;
import java.io.IOException;
import java.util.logging.Level;
import java.util.logging.Logger;
import javax.imageio.ImageIO;
import javax.swing.ImageIcon;
import javax.swing.JFrame;
import javax.swing.JLabel;

public class MoveBall extends JFrame implements Runnable 
{
    Thread th;
    JLabel imageLabel = new JLabel();
    int x = 0;
    int y = 0;
    boolean newx = true;
    boolean newy = true;
    
    public MoveBall()
    {   
        this.setDefaultCloseOperation(JFrame.EXIT_ON_CLOSE);
        this.setTitle("JavaApp Frame Application");
        
        ImageIcon image = new ImageIcon( new ImageIcon("images/ball.png").getImage().getScaledInstance(50,50,Image.SCALE_DEFAULT)); 
        imageLabel = new JLabel(image, JLabel.CENTER);
        imageLabel.setIcon(image);
        imageLabel.setLocation(JLabel.CENTER,JLabel.CENTER);
        this.add(imageLabel,BorderLayout.CENTER);
        th = new Thread(this);
        th.start();
    }
    public static void main(String[] args) {
       MoveBall app = new MoveBall();
       app.setBounds(50,50,600,400);
       app.setVisible(true);
    }
   

    @Override
    public void run() 
    {
        while(true)
        {
              if((newx && x+30 < this.getWidth()/2) || x-30 < -this.getWidth()/2)
              {
                  if((newy && y+40 <this.getHeight()/2) || y-50 < -this.getHeight()/2)
                  {
                    x++;
                    y++;
                    newx = true;
                    newy = true;
                  }
                  else
                  {
                    x++;
                    y--;
                    newx = true;
                    newy = false;  
                  }
              }
              else
              {
                  if((newy && y+25 <this.getHeight()/2) || y-25 < -this.getHeight()/2)
                  {
                    x--;
                    y++;
                    newx = false;
                    newy = true;
                  }
                  else
                  {
                    x--;
                    y--;
                    newx = false;
                    newy = false;  
                  }
               }
              
               imageLabel.setLocation(x,y);
               this.repaint();
             try {
                    th.sleep(10);
                } 
             catch (InterruptedException ex) {
                    Logger.getLogger(MoveBall.class.getName()).log(Level.SEVERE, null, ex);
                }
        }
    }
    
    public Object getsize() {
        throw new UnsupportedOperationException("Not supported yet."); //To change body of generated methods, choose Tools | Templates.
    }
    
}

