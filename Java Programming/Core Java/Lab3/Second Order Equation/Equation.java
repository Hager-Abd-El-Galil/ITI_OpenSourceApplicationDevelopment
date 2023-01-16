/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package secondorderequ;

import java.util.function.Function;

class Equation implements Function<Parameters,Roots> 
{
	public Roots apply (Parameters p) 
	{
		double determinant = (p.GetParameter2() * p.GetParameter2()) - (4 * p.GetParameter1() * p.GetParameter3());
                Roots r = new Roots(); 
		
		if (determinant > 0) 
		{
		  r.SetRoot1((-p.GetParameter2() + Math.sqrt(determinant)) / (2 * p.GetParameter1()));
		  r.SetRoot2((-p.GetParameter2() - Math.sqrt(determinant)) / (2 * p.GetParameter1()));
                  System.out.println("Not Equal Real Roots");
		  
		}
		else if (determinant == 0) 
		{
		  r.SetRoot1(-p.GetParameter2() / (2 * p.GetParameter1()));
		  r.SetRoot2(-p.GetParameter2() / (2 * p.GetParameter1()));
		  System.out.println("Equal Real Roots");
		}
		else 
		{
		  double real = -p.GetParameter2() / (2 * p.GetParameter1());
		  double imaginary = Math.sqrt(-determinant) / (2 * p.GetParameter1());
                  r.SetReal(real);
                  r.SetImag(imaginary);
 
		  /*r.SetRoot1(c);
		  r.SetRoot2(c);*/
		  System.out.println("Complex Roots");
		}
		return r;
        }
        
} 
