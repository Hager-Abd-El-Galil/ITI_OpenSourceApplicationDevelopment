from django.db import models

class Category(models.Model):
    name = models.CharField(max_length=100)

    def __str__(self):
        return self.name

class Cast(models.Model):
    name = models.CharField(max_length=100)

    def __str__(self):
        return self.name

class Media(models.Model):
    title = models.CharField(max_length=100)
    description = models.TextField()
    release_date = models.DateField()
    duration = models.PositiveIntegerField()
    categories = models.ManyToManyField(Category)
    casts = models.ManyToManyField(Cast)

    class Meta:
        abstract = True

    def __str__(self):
        return self.title

class Movie(Media):
    poster_image = models.ImageField(upload_to='posters/')

class Series(Media):
    cover_image = models.ImageField(upload_to='covers/')
