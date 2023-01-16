import java.util.*;

@FunctionalInterface
interface betterStringCheck
{
	boolean betterString(String str1,String str2);
}

class BetterString
{
	 public static void main(String args[])
	 {
	    if(args.length == 2)
		{
			 betterStringCheck longString = (str1,str2) -> (str1.length() > str2.length());
			 betterStringCheck equalString = (str1,str2) -> (str1.equals(str2));
			 
			 if(longString.betterString(args[0],args[1]) == true)
			 {
				System.out.println("String " +args[0]+" is longer than String "+args[1]);
			 }
			 else
			 {
				System.out.println("String " +args[0]+" is not longer than String "+args[1]); 
			 }
			 
			 if(equalString.betterString(args[0],args[1]) == true)
			 {
				System.out.println("String " +args[0]+" is equal to String "+args[1]);
			 }
			 else
			 {
				System.out.println("String " +args[1]+" is not equal to String "+args[0]); 
			 }
		}
		else
		{
			System.out.println("Please Enter Two Strings");
		}
	  
	 }
}