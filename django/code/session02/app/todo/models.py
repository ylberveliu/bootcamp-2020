from django.db import models

# Create your models here.


class Todo(models.Model):
    title = models.CharField(max_length=100)
    comleted = models.BooleanField(default=False)

    def __str__(self):
        return self.title


# ONE to MANY
class Article(models.Model):
    title = models.CharField(max_length=50)
    content = models.CharField(max_length=200)

    def __str__(self):
        return self.title


class Comment(models.Model):
    article = models.ForeignKey(Article, on_delete=models.CASCADE)
    content = models.CharField(max_length=200)

    def __str__(self):
        return self.content


# MANY to MANY
# Order - Product (m-to-m)
class Order(models.Model):
    title = models.CharField(max_length=50)

    def __str__(self):
        return self.title


class Product(models.Model):
    name = models.CharField(max_length=50)

    def __str__(self):
        return self.name


class OrderProduct(models.Model):
    order = models.ForeignKey(Order, on_delete=models.CASCADE)
    product = models.ForeignKey(Product, on_delete=models.CASCADE)

    def __str__(self):
        return str(self.order) + " " + str(self.product)
