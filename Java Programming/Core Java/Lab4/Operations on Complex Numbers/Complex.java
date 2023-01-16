/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package complex;

import java.math.BigDecimal;

class Complex <T extends BigDecimal,R extends BigDecimal>
{
	T real;
	R imag;
	
	Complex(T r,R i)
	{
		real = r;
		imag = i;
	}
	
	public String toString()
	{
		StringBuffer sb = new StringBuffer();
		sb.append(real);
		sb.append('+');
		sb.append(imag);
		sb.append('i');
	  return sb.toString();	
	}
	
	public Complex<T,R> add(Complex<T,R> SecondComplex)
	{
		return new Complex<T,R>((T)(real.add(SecondComplex.real)),(R)(imag.add(SecondComplex.imag)));
	}
	
	public Complex<T,R> subtract(Complex<T,R> SecondComplex)
	{
		return new Complex<T,R>((T)(real.subtract(SecondComplex.real)),(R)(imag.subtract(SecondComplex.imag)));
	}
	
	public Complex<T,R> multiply(Complex<T,R> SecondComplex)
	{
		return new Complex<T,R>((T)((real.multiply(SecondComplex.real)).subtract(imag.multiply(SecondComplex.imag))),(R)((real.multiply(SecondComplex.imag)).add(imag.multiply(SecondComplex.real))));
	}
}



