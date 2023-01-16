class NewCountString
{
	public static void main(String args[])
	{
		if(args.length == 2)
		{
			String Phrase = args[0];
			String Word = args[1];
        	        int Count = 0;
			int Begin;
			int End;
			
			while(Phrase.contains(Word))
			{
				Count++;
				Begin = Phrase.indexOf(Word);
				End = Begin + (Word.length());
				Phrase = Phrase.substring(0,Begin) + Phrase.substring(End,Phrase.length());
                                System.out.println(Phrase);
			}
			
			System.out.println("This Word appeared " + Count + " Times");	
		}
		else
		{
			System.out.println("Please Enter The Phrase and The Word");
		}
	}		
}