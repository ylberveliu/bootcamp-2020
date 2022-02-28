from django.urls import path
from . import views

from django.conf import settings
from django.conf.urls.static import static

urlpatterns = [
    path('', views.index, name="index"),
    path('methods/', views.MethodsView.as_view(),
         name="methods"),  # GET, POST, PUT, DELETE
    path('set-sessions', views.set_session, name="set_sessions"),
    path('get-sessions', views.get_session, name="get_sessions"),
    path('delete-sessions', views.delete_session, name="delete_sessions"),
    path('set-cookies', views.set_cookies, name="set_cookies"),
    path('get-cookies', views.get_cookies, name="get_cookies"),
] + static(settings.STATIC_URL)
