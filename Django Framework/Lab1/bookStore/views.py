from django.shortcuts import render, redirect
from django.http import HttpResponse, JsonResponse, HttpResponseRedirect

books_list = [
  {
    "index": 0,
    "id": 1,
    "name": "To Kill a Mockingbird",
    "price": 999,
    "description": "Harper Lee's Pulitzer Prize-winning masterwork of honor and injustice in the deep South—and the heroism of one man in the face of blind and violent hatred"
  },
  {
    "index": 1,
    "id": 2,
    "name": "The Great Gatsby",
    "price": 899,
    "description": "F. Scott Fitzgerald's masterpiece about the decadence and excess of the roaring twenties, and the disillusionment and tragedy that follows."
  },
  {
    "index": 2,
    "id": 3,
    "name": "Pride and Prejudice",
    "price": 799,
    "description": "Jane Austen's beloved novel of manners and social class, following the romantic lives of the Bennet sisters and their pursuit of marriage and happiness."
  },
  {
    "index": 3,
    "id": 4,
    "name": "The Catcher in the Rye",
    "price": 1099,
    "description": "J.D. Salinger's coming-of-age tale of teenage angst and rebellion, following the misadventures of Holden Caulfield as he tries to make sense of the world around him."
  }
]

def index(request):
    return render(request, 'main/base_layout.html')

def _get_book(book_id):
    for book in books_list:
        if 'id' in book and book['id'] == book_id:
            return book
    return None
   
def bookstore_list(request):
    my_context = {'books_list': books_list}
    return render(request, 'bookstore_list.html',context=my_context)

def book_add(request):
    new_index = max(book['index'] for book in books_list) + 1
    new_book = {
        'index': new_index,
        'id': new_index + 1,
        'name':"Book" + str(new_index),
        'price': 2000,
        'description': "Book description",
    }
    books_list.append(new_book)
    return redirect('books-list')

def book_details(request, **kwargs):
    book_id = kwargs.get('book_id')
    book_object = _get_book(book_id)
    my_context = {
        'book_id': book_object.get('id'),
        'book_name': book_object.get('name'),
        'book_price': book_object.get('price'),
        'book_description': book_object.get('description')
    }
    return render(request, 'book_details.html', context=my_context)

def book_update(request, **kwargs):
    book_id = kwargs.get('book_id')
    book_object = _get_book(book_id)
    for book in books_list:
        if book == book_object:
            book['name'] = f"Update {book_object['name']}"
    return redirect('books-list')

def book_delete(request, **kwargs):
    book_id = kwargs.get('book_id')
    book_object = _get_book(book_id)
    if books_list:
        books_list.remove(book_object)
    return redirect('books-list') 


