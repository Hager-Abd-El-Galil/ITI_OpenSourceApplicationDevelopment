import java.util.*;

class TemperatureConverter 
 {  
   public static void main(String args[])  
    { 
	  ConvertTemperature Temp = new ConvertTemperature();
          Double TempF = Temp.apply(Double.valueOf(10));		  
          System.out.println("Temperature in Fahrenheit is: "+TempF);  
    }
}   