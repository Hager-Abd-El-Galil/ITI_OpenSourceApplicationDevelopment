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
class Parameters 
{
	double parameter1,parameter2,parameter3;
	
	void SetParameter1(double a)
	{
		parameter1 = a;
	}
	void SetParameter2(double b)
	{
		parameter2 = b;
	}
	void SetParameter3(double c)
	{
		parameter3 = c;
	}

	double GetParameter1()
	{
		return parameter1;
	}
	double GetParameter2()
	{
		return parameter2;
	}
	double GetParameter3()
	{
		return parameter3;
	}
}
