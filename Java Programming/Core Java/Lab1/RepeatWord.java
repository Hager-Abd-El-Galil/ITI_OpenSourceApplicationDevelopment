class RepeatWord
{    
    public static void main(String args[]) 
    {  
      if(args.length == 2)
      {
         String Str = args[0];
         int Num = Integer.parseInt(args[1]);
       
         if(Num != 0)
         { 
           for(int i = 0; i < Num;i++)
           { 
            System.out.println(Str);
           }
         }
        else
        {
           System.out.println("Please Enter The Number");
        }
     }
     else
     {
         System.out.println("No Argument");
     }
   }
}