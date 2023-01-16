import java.util.*;
import java.util.function.Function;

class ConvertTemperature implements Function<Double,Double>
 {  
   public Double apply (Double Celsius)  
    { 
	  Double Fahrenheit;   
          Fahrenheit =((Celsius*9)/5)+32; 
        return 	Fahrenheit;	   
    }
} 