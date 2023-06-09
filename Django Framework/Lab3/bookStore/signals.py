from django.db.models.signals import pre_save 
from django.dispatch import receiver
from .models import Book , Isbn

@receiver(pre_save , sender=Book)
def create_and_assign_isbn_to(instance ,**kwargs):
    if instance.isbn:
        return;

    isbn = Isbn.objects.create(
    author_title='Mark Twain',
    book_title='The Adventures of Tom Sawyer'
    )
    instance.isbn = isbn

