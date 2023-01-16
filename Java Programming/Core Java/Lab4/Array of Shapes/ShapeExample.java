import java.util.*;

class ShapeExample
{    
     public static void DrawShapes(List<? extends Shape> lists)
	 {
		 for(Shape s:lists)
		 {
			 s.draw();
		 }
	 }
	 public static void main(String args[])
	{
		Rectangle rect = new Rectangle();
		Circle C = new Circle();
		ArrayList<Shape> arraylist = new ArrayList<>();
		
		arraylist.add(rect);
		arraylist.add(C);
		
		DrawShapes(arraylist);
			
	}
}