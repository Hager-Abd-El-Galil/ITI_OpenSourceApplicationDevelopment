from django.urls import path
from .views import index, bookstore_list, book_add, book_details, book_update, book_delete

urlpatterns = [
    path('', index, name='bookStore-index'),
    path('books_list/', bookstore_list, name="books-list"),
    path('book_add/', book_add, name="book-add"),
    path('book_details/<int:book_id>', book_details, name="book-details"),
    path('book_delete/<int:book_id>', book_delete, name="book-delete"),
    path('book_update/<int:book_id>', book_update, name="book-update")
]