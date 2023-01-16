/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package datatimeapp;

import java.awt.BorderLayout;
import java.util.Date;
import java.util.logging.Level;
import java.util.logging.Logger;
import javax.swing.JFrame;
import javax.swing.JLabel;

/**
 *
 * @author ITI
 */
public class DataTimeApp extends JFrame implements Runnable 
{
    Thread th;
    Date d = new Date();
    JLabel timeLabel = new JLabel();
    
    public DataTimeApp()
    {
        this.setDefaultCloseOperation(JFrame.EXIT_ON_CLOSE);
        this.setTitle("Date and Time Frame Application");
        timeLabel.setHorizontalAlignment(JLabel.CENTER);
        timeLabel.setText(d.toString());
        this.add(timeLabel,BorderLayout.CENTER);
        th = new Thread(this);
        th.start();
    }
    public static void main(String[] args) {
       DataTimeApp app = new DataTimeApp();
       app.setBounds(50,50,600,400);
       app.setVisible(true);
    }
   

    @Override
    public void run() 
    {
        while(true)
        {
            d = new Date();
            timeLabel.setText(d.toString());
            try {
                Thread.sleep(1000);
            } catch (InterruptedException ex) {
                Logger.getLogger(DataTimeApp.class.getName()).log(Level.SEVERE, null, ex);
            }
            
        }
    }
    
}
