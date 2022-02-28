from django.urls import path
from . import views

urlpatterns = [
    path('', views.index, name="homepage"),
    path('view/<int:todo_id>', views.view_todo, name="view-todo"),
    path('create', views.TodoView.as_view()),
]
