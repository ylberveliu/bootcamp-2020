from django.urls import path
from . import views

urlpatterns = [
    path('', views.index, name="home"),
    path('create', views.create, name="create"),
    path('update/<int:id>', views.update, name="update"),
    path('delete/<int:id>', views.delete, name="delete"),
    path('mark-as-completed/<int:id>',
         views.mark_as_completed, name="mark-as-completed"),
    path('search', views.search, name='search-todos'),
    path('methods', views.FormView.as_view(), name="methods"),
]
