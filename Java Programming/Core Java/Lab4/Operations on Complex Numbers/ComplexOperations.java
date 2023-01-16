/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package complex;

import java.math.BigDecimal;

class ComplexOperations
{
	public static void main(String args[])
	{
		Complex<BigDecimal,BigDecimal> Complex1 = new Complex<BigDecimal,BigDecimal> (new BigDecimal(2) , new BigDecimal(4));
		Complex<BigDecimal,BigDecimal> Complex2 = new Complex<BigDecimal,BigDecimal> (new BigDecimal(1) , new BigDecimal(2));
		
		Complex<BigDecimal,BigDecimal> AddComplex = Complex1.add(Complex2);
		Complex<BigDecimal,BigDecimal> SubtractComplex = Complex1.subtract(Complex2);
		Complex<BigDecimal,BigDecimal> MultiplyComplex = Complex1.multiply(Complex2);
		
		System.out.println("The Result of Addition Two Complex is : " + AddComplex.toString());
		System.out.println("The Result of Subtraction Two Complex is : " + SubtractComplex.toString());
		System.out.println("The Result of Multiplication Two Complex is : " + MultiplyComplex.toString());
		
		
	}
}
