from django.contrib import admin
from .models import Book
from .models import Isbn , Category

admin.site.register(Book)
class BookAdmin(admin.ModelAdmin):
    list_filter = ('author_name' , 'rate' , 'isbn' , 'category' , 'user')

admin.site.register(Isbn) 
admin.site.register(Category) 