from django.urls import path
from . import views

urlpatterns = [
    path('', views.TodoView.as_view(), name="todo"),
    path('/edit/<int:id>', views.edit_todo, name="edit_todo"),
    path('mark-as-done/<int:id>', views.mark_as_done, name="mark_as_done"),
    path('login', views.LoginView.as_view(), name="login"),
    path('register', views.RegisterView.as_view(), name="register"),
    path('logout', views.logout, name="logout"),
]
