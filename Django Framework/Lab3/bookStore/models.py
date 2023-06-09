from django.db import models
from django.utils.text import slugify
from django.contrib.auth.models import User
import uuid
from django.core.exceptions import ValidationError

class Isbn(models.Model):
    author_title = models.CharField(max_length=30)
    book_title = models.CharField(max_length=30)
    isbn = models.UUIDField(default=uuid.uuid4, editable=False, unique=True)

    def __str__(self):
        return self.author_title


class Category(models.Model):
    name = models.CharField(max_length=30)

    def __str__(self):
        return self.name

    def clean(self) -> None:
        if len(self.name) < 2:
            raise ValidationError("Category name must be more than 2 characters")
        return super().clean()

class Book(models.Model):
    title = models.CharField("Book Title", max_length=255, unique=True)
    author_name = models.CharField("Author Name", max_length=255)
    description = models.TextField("Book Description")
    price = models.DecimalField(max_digits=7, decimal_places=2)
    pages = models.IntegerField(default=0)
    created_at = models.DateTimeField(auto_now_add=True)
    updated_at = models.DateTimeField(auto_now=True)
    slug = models.SlugField(unique=True, max_length=255, blank=True, editable=False)
    user = models.ForeignKey(User, on_delete=models.PROTECT)
    isbn = models.OneToOneField(Isbn, on_delete=models.CASCADE)
    category = models.ManyToManyField(Category)

    def __str__(self):
        return f"Title {self.title}"
    
    def save(self, *args, **kwargs):
        if not self.slug:
            self.slug = slugify(self.title)
        super(Book, self).save(*args, **kwargs)

    def clean(self):
        if len(self.title) < 10:
            raise ValidationError("Title must be more than 10 characters")
        return super().clean()

