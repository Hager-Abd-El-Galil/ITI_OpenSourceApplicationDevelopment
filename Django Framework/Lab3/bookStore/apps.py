from django.apps import AppConfig


class BookstoreConfig(AppConfig):
    default_auto_field = 'django.db.models.BigAutoField'
    name = 'bookStore'

    def ready(self):     
        from .signals import create_and_assign_isbn_to
