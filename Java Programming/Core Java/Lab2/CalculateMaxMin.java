import java.util.Random;

class CalculateMaxMin
{   
    public static int BinarySearch(int arr[],int LB,int UB,int Data)
	{
		int Middle;
		int Index = -1;
		
		while(LB <= UB && Index == -1)
		{
			Middle = (LB + UB)/2;
			
			if(arr[Middle] == Data)
			{
				Index = Middle;
			}
			else if(arr[Middle] < Data)
			{
				LB = Middle + 1;
			}
			else
			{
				UB = Middle - 1;
			}
		}
		return Index;
	}
	
	public static void main(String args[])
	{
		int arr[] = new int[1000];
		int temp = 0;
		int Max,Min;
		long TotalTime;
		
		long StartTime = System.nanoTime();
		
		Random rand = new Random();
		
                for(int i = 0; i < 1000;i++)        /**Fill Array by Random Values*/
		{			
			arr[i] = rand.nextInt(10);
		}
		
		for(int j = 0; j < 999;j++)         /**Bubble Sort */
		{
			for(int k = 0; k < 999 - j;k++)
			{
				if(arr[k] > arr[k+1])
				{
					temp = arr[k];
					arr[k] = arr[k+1];
					arr[k+1] = temp;
				}
			}
		}
		
		Min = arr[0];
		Max = arr[999];
		
		long EndTime = System.nanoTime();
		TotalTime = EndTime - StartTime;
		
		int index = BinarySearch(arr,0,999,3);
		
		System.out.println("Maximum Number is: " + Max);
		System.out.println("Minimum Number is: " + Min);
		System.out.println("Start Time in ns is: " + StartTime);
		System.out.println("End Time in ns is: " + EndTime);
		System.out.println("Total Time in ns is: " + TotalTime);
		System.out.println("Index of 3 is: " + index);
		
	}
}