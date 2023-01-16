import java.util.*;

@FunctionalInterface
interface CheckStringLetters
{
	boolean isOnlyLetters(String s);
}

class CheckLetters
{	
	
	public static void main(String args[])
	{
		if(args.length == 1)
		{
			String Word = args[0];

			CheckStringLetters Flag = (s) ->
									{
										char ch = ' ';
										boolean LettersOnly = false, safe = LettersOnly;
										int FailCount = 0;
										
										for(int i=0;i<Word.length();i++)
										{
											ch = s.charAt(i);
											
											if(Character.isLetter(ch))
											{
												LettersOnly = true;
											}
											else
											{
												LettersOnly = false;
												FailCount += 1;
											}
										}
										if(FailCount == 0 && s.length() > 0)
										{
											safe = true;
										}
										else
										{
											safe = false;
										}
										
									  return safe;	
									};
									
			if(Flag.isOnlyLetters(Word) == true)
			{
				System.out.println("The Word Contains Letters Only");
			}
			else
			{
				System.out.println("The Word Contains Letters and Other Symbols");
			}
		}
		else
		{
			System.out.println("Please Enter one String");
		}
   }
}