/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package dictionary;

/**
 *
 * @author ITI
 */
import java.util.*;
import java.util.stream.Collectors;
import java.util.stream.Stream;

class Dictionary
{
	public static void main(String[] args)
	{
		Map<Character, TreeSet<String>> MyDictionary = new TreeMap<Character, TreeSet<String>>();
		
		TreeSet<String> str = new TreeSet<String>();
		Collections.addAll(str,"Agree","America","Angry","Apple","Ball","Banana","Beautiful",
					"Boat","Careful","Cat","Cell","Chair","Dance","Danger","Deep",
					"Dress","Eat","Eggs","Energy","Eye","Face","Fat","Flower","Food",
					"Gold","Green","Group","Grow","Hat","Help","History","Home","Ice",
					"India","Internet","Island","Jar","Job","Join","Just","Key","Kill",
					"King","Know","Lady","Lack","Learn","Look","Milk","Money","Morning",
					"Mountain","Nation","Network","Notebook","Nurse","Online","Opinion",
					"Outside","Oxygen","Page","Park","Pen","Poor","Question","Quickly",
					"Quiet","Quite","Rain","Read","Red","Room","Schedule","School","Sea",
					"Sick","Time","Train","Travel","Trip","Uncle","Understand","Up","Upset",
					"Vally","Voice","Voice","Vote","Water","Wet","Wind","Wood","Xenial",
					"Xenolalia","Xoanon","Xper","Yard","Year","Young","Yourself","Zebra","Zoo",
					"Zero","Zip");
							   
		char key = ' ';
                Iterator<String> iter =  str.iterator();
		while(iter.hasNext())
		{
			String value = iter.next();
                        key = value.charAt(0);
			
			if(MyDictionary.containsKey(key))
			{	
				(MyDictionary.get(key)).add(value);
			}
			else
			{
			     MyDictionary.put(key,new TreeSet<String>());
			    (MyDictionary.get(key)).add(value);

			}
			
		}
                
		if(args.length == 1)
		{
			Search(args[0],MyDictionary);
		}
		else
		{
			DisplayAll(MyDictionary);
		}
				
	}
	
	public static void DisplayAll(Map<Character, TreeSet<String>> map)
	{
		map.forEach((key,value) -> System.out.println("Key " +key+" is: " + value));
	}
	
	public static void Search(String str,Map<Character, TreeSet<String>> map)
	{
	        char c = Character.toUpperCase(str.charAt(0));
			System.out.println("Key " + c + " is: " + map.get(c));
			
	}	

}

