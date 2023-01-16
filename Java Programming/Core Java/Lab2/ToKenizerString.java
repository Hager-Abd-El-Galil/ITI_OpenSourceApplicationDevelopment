import java.util.StringTokenizer;

class ToKenizerString
{
	public static void main(String args[])
	{
		if(args.length == 2)
		{	
                        String Phrase = args[0];
			String Word = args[1];
			int Count = 0;
			
			StringTokenizer str = new StringTokenizer(Phrase,Word);
			
			while(str.hasMoreTokens())
			{
				 System.out.println(str.nextToken());
					Count++;
			}
			
			System.out.println("This Word appeared " +(Count)+" Times");
			
		}
		else
		{
			System.out.println("Please Enter The Two Arguments");
		}
	}		
}