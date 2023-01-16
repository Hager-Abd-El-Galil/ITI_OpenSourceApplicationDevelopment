/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package secondorderequ;

import java.util.Scanner;

/**
 *
 * @author ITI
 */
class SecondOrderEquation
{
	public static void main(String args[])
	{
		Parameters Num = new Parameters();
		Roots OutputRoots = new Roots();
                
		System.out.println("Please Enter Equation Parameters");
                
                Scanner in = new Scanner(System.in);
                int Num1 = in.nextInt();
                int Num2 = in.nextInt();
                int Num3 = in.nextInt();
                
		Num.SetParameter1(Num1);
		Num.SetParameter2(Num2);
		Num.SetParameter3(Num3);
		
		Equation Output = new Equation();
		OutputRoots = Output.apply(Num);
                
		//Real Roots
		double ROOT1 = OutputRoots.GetRoot1();
		double ROOT2 = OutputRoots.GetRoot2();
                
                if(ROOT1 == 0 && ROOT2 == 0)  //Complex Roots
                {
                   System.out.format("Root1 = %.2f+%.2fi",OutputRoots.GetReal(), OutputRoots.GetImag());
		   System.out.format("\nRoot2 = %.2f-%.2fi\n", OutputRoots.GetReal(), OutputRoots.GetImag());
                }
                else    //Real Roots
                {
                   System.out.format("Root1 = %.2f",ROOT1);
                   System.out.format("\nRoot2 = %.2f\n",ROOT2);
                           
                }
		
		
	}
    
}
