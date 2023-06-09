from django.db import migrations, models


class Migration(migrations.Migration):

    initial = True

    dependencies = [
    ]

    operations = [
        migrations.CreateModel(
            name='Cast',
            fields=[
                ('id', models.BigAutoField(auto_created=True, primary_key=True, serialize=False, verbose_name='ID')),
                ('name', models.CharField(max_length=100)),
            ],
        ),
        migrations.CreateModel(
            name='Category',
            fields=[
                ('id', models.BigAutoField(auto_created=True, primary_key=True, serialize=False, verbose_name='ID')),
                ('name', models.CharField(max_length=100)),
            ],
        ),
        migrations.CreateModel(
            name='Series',
            fields=[
                ('id', models.BigAutoField(auto_created=True, primary_key=True, serialize=False, verbose_name='ID')),
                ('title', models.CharField(max_length=100)),
                ('description', models.TextField()),
                ('release_date', models.DateField()),
                ('duration', models.PositiveIntegerField()),
                ('cover_image', models.ImageField(upload_to='covers/')),
                ('casts', models.ManyToManyField(to='movies.cast')),
                ('categories', models.ManyToManyField(to='movies.category')),
            ],
            options={
                'abstract': False,
            },
        ),
        migrations.CreateModel(
            name='Movie',
            fields=[
                ('id', models.BigAutoField(auto_created=True, primary_key=True, serialize=False, verbose_name='ID')),
                ('title', models.CharField(max_length=100)),
                ('description', models.TextField()),
                ('release_date', models.DateField()),
                ('duration', models.PositiveIntegerField()),
                ('poster_image', models.ImageField(upload_to='posters/')),
                ('casts', models.ManyToManyField(to='movies.cast')),
                ('categories', models.ManyToManyField(to='movies.category')),
            ],
            options={
                'abstract': False,
            },
        ),
    ]