class CountString
{
	public static void main(String args[])
	{
		if(args.length == 2)
		{
			String Phrase = args[0];
			String Word = args[1];
			String SplittedString[];
			int Count = 0;
			
			SplittedString = Phrase.split(Word);
			
			for(int i = 0;i < SplittedString.length;i++)
			{
                                System.out.println(SplittedString[i]);
				Count++;
			}
			
			int WordNo = Count - 1;
			
			System.out.println("This Word appeared " + WordNo + " Times");
			
		}
		else
		{
			System.out.println("Please Enter The Phrase and The Word");
		}
	}		
}