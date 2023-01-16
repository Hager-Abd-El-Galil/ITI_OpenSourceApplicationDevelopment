import java.util.StringTokenizer;

class SplitIP
{
	public static void main(String args[])
	{
		if(args.length == 1)
		{		
			StringTokenizer tokenizer = new StringTokenizer(args[0], ".");
			
			while(tokenizer.hasMoreTokens())
			{
				System.out.println(tokenizer.nextToken());
			}		
		}
		else
		{
			System.out.println("Please Enter The Correct IP");
		}
	}		
}