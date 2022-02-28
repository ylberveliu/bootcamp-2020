from django.shortcuts import render, redirect
from django.http import HttpResponse
from .models import Todo
from django.views import View
import datetime

# Create your views here.

# Session (set, get, delete)

cart = [
    {'name': 'Coca cola 1l'},
    {'name': 'Pepsi 0.5l'},
    {'name': 'Nutella'}
]


def set_session(request):
    request.session['name'] = 'Ylber'
    request.session['email'] = 'ylber.veliu@yahoo.com'
    request.session['cart'] = cart

    return HttpResponse("Session name and email were set successfully")


def get_session(request):
    name = request.session.get('name')
    email = request.session.get('email')
    cart = request.session.get('cart')
    # return HttpResponse("Name: " + name + "<br />Email: " + email)
    context = {
        'name': name,
        'email': email,
        'cart': cart
    }
    return render(request, 'sessions.html', context)


def delete_session(request):
    # request.session['name'] = None
    # request.session['email'] = None
    del(request.session['email'])
    return redirect('get_sessions')


# Cookies (set, get, delete)
def set_cookies(request):
    email_expires = 1 * 60
    response = HttpResponse("Cookies were created successfully")
    response.set_cookie('is_logged_in', 'Yes')
    response.set_cookie(
        'email', request.session['email'], max_age=email_expires)  # , expires="2020-12-23 20:28:07.127171")
    return response


def get_cookies(request):
    email = request.COOKIES.get('email')
    return HttpResponse("Is logged in: " + request.COOKIES.get('is_logged_in') + " <br /> Email: " + str(email))


# SELECT * FROM todos WHERE title = ""                .filter(kolona=vlera)
# SELECT * FROM todos WHERE title LIKE "%...%"        .filter(kolona__contains=vlera)


def index(request):
    query = request.GET.get('q')
    if query and len(query):
        todos = Todo.objects.filter(title__contains=query)
    else:
        todos = Todo.objects.all()

    context = {
        'todos': todos
    }

    return render(request, 'index.html', context)


# def index(request):
#     if request.method == "POST":
#         todos = Todo.objects.filter(title=request.POST['q'])
#         context = {
#             'todos': todos
#         }
#         return render(request, 'index.html', context)
#     else:
#         todos = Todo.objects.all()
#         context = {
#             'todos': todos
#         }
#         return render(request, 'index.html', context)


class MethodsView(View):
    http_method_names = ['get', 'post', 'put', 'delete']

    def dispatch(self, *args, **kwargs):
        method = self.request.POST.get('_method', '').lower()
        if method == 'put':
            return self.put(*args, **kwargs)
        if method == 'delete':
            return self.delete(*args, **kwargs)

        return super(MethodsView, self).dispatch(*args, **kwargs)

    def get(self, request):
        context = {
            'data': 'I am ' + self.request.method + ' method'
        }
        return render(request, 'methods.html', context)

    def post(self, request):
        context = {
            'data': 'I am ' + self.request.method + ' method'
        }
        return render(request, 'methods.html', context)

    def put(self, request):
        context = {
            'data': 'I am ' + self.request.POST.get('_method') + ' method'
        }
        return render(request, 'methods.html', context)

    def delete(self, request):
        context = {
            'data': 'I am ' + self.request.POST.get('_method') + ' method'
        }
        return render(request, 'methods.html', context)
