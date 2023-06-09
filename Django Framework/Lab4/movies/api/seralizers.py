from rest_framework import serializers
from movies.models import Category, Cast, Movie, Series

class CategorySerializer(serializers.ModelSerializer):
    class Meta:
        model = Category
        fields = '__all__'

class CastSerializer(serializers.ModelSerializer):
    class Meta:
        model = Cast
        fields = '__all__'

class MediaSerializer(serializers.ModelSerializer):
    categories = CategorySerializer(many=True)
    casts = CastSerializer(many=True)

    class Meta:
        abstract = True
        fields = ['id', 'title', 'description', 'release_date', 'duration', 'categories', 'casts']

class MovieSerializer(MediaSerializer):
    poster_image = serializers.ImageField()

    class Meta(MediaSerializer.Meta):
        model = Movie
        fields = MediaSerializer.Meta.fields + ['poster_image']

class SeriesSerializer(MediaSerializer):
    cover_image = serializers.ImageField()

    class Meta(MediaSerializer.Meta):
        model = Series
        fields = MediaSerializer.Meta.fields + ['cover_image']