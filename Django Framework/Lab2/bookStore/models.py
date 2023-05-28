from django.db import models


class Book(models.Model):
    title = models.CharField("Book Title", max_length=255, unique=True)
    author_name = models.CharField("Author Name", max_length=255)
    description = models.TextField("Book Description")
    price = models.DecimalField(max_digits=7, decimal_places=2)
    pages = models.IntegerField(default=0)
    created_at = models.DateTimeField(auto_now_add=True)
    updated_at = models.DateTimeField(auto_now=True)

    def __str__(self):
        return f"Title {self.title}"
