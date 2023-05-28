from django.forms import TextInput, NumberInput
from django import forms
from .models import Book


class BookForm(forms.ModelForm):
    class Meta:
        db_table = 'books'
        model = Book
        fields = ['title', 'author_name','description', 'price', 'pages']
        widgets = {
            'title': TextInput(attrs={
                'class': "form-control w-100",
                'placeholder': 'title'
                }),
            'author_name': TextInput(attrs={
                'class': "form-control w-100", 
                'placeholder': 'Author Name'
                }),
            'description': TextInput(attrs={
                'class': "form-control w-100", 
                'placeholder': 'Description'
                }), 
            'price': NumberInput(attrs={
                'class': "form-control w-100", 
                'placeholder': 'Price'
                }), 
            'pages': NumberInput(attrs={
                'class': "form-control w-100",
                'placeholder': 'Pages'
                }),   
        }