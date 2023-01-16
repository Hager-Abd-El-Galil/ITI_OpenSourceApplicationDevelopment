/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package secondorderequ;

/**
 *
 * @author ITI
 */
class Roots
{
	double Root1,Root2;
        double Real,Imag;
        
	//Methods for Real Roots
	void SetRoot1(double a)
	{
		Root1 = a;
	}
	void SetRoot2(double b)
	{
		Root2 = b;
	}
	
	double GetRoot1()
	{
		return Root1;
	}
	double GetRoot2()
	{
		return Root2;
	}
        //Methods for Complex Roots
	void SetReal(double a)
	{
		Real = a;
	}
	void SetImag(double b)
	{
		Imag = b;
	}
	
	double GetReal()
	{
		return Real;
	}
	double GetImag()
	{
		return Imag;
	}
}



