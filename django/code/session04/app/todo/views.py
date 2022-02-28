from django.shortcuts import render, redirect
from django.http import HttpResponse
from django.views import View
from .forms import *
from .models import User, Todo

# Create your views here.


def logout(request):
    del(request.session['username'])
    del(request.session['is_logged_in'])
    return redirect('login')


def mark_as_done(request, id):
    todo = Todo.objects.filter(id=id, user_id=request.session.get(
        'user_id')).update(completed=True)
    return redirect('todo')


def edit_todo(request, id):
    todo = Todo.objects.filter(id=id, user_id=request.session.get(
        'user_id')).first()
    form = TodoForm(request.POST or None, instance=todo)
    context = {
        'form': form,
        'todo': todo,
    }
    return render(request, 'edit.html', context)


class LoginView(View):
    def get(self, request):
        if request.session.get('is_logged_in'):
            return redirect('todo')

        form = LoginForm()
        context = {
            'form': form
        }
        return render(request, 'login.html', context)

    def post(self, request):
        form = LoginForm(request.POST)
        if form.is_valid():
            username = request.POST['username']
            password = request.POST['password']
            user = User.objects.filter(username=username, password=password)
            if user:
                request.session['is_logged_in'] = True
                request.session['username'] = username
                request.session['user_id'] = user[0].id
                # set cookie
                return redirect('todo')
        context = {
            'form': form
        }
        return render(request, 'login.html', context)


class RegisterView(View):
    def get(self, request):
        if request.session.get('is_logged_in'):
            return redirect('todo')

        form = RegisterForm()
        context = {
            'form': form
        }
        return render(request, 'register.html', context)

    def post(self, request):
        form = RegisterForm(request.POST)
        if form.is_valid():
            form.save()
            return redirect('login')
        context = {
            'form': form
        }
        return render(request, 'register.html', context)


class TodoView(View):
    http_method_names = ['get', 'post', 'put', 'delete']

    def dispatch(self, *args, **kwargs):
        method = self.request.POST.get('_method', '').lower()
        if method == 'put':
            return self.put(*args, **kwargs)
        if method == 'delete':
            return self.delete(*args, **kwargs)

        return super(TodoView, self).dispatch(*args, **kwargs)

    def get(self, request):
        if not request.session.get('is_logged_in'):
            return redirect('login')

        todos = Todo.objects.filter(user_id=request.session.get('user_id'))

        context = {
            'username': request.session.get('username'),
            'todos': todos,
            'form': TodoForm(),
            'user_id': request.session.get('user_id')
        }

        return render(request, 'dashboard.html', context)

    def post(self, request):
        form = TodoForm(request.POST)
        if form.is_valid():
            form.save()

        return redirect('todo')

    def put(self, request):
        todo = Todo.objects.filter(id=request.POST['id'], user_id=request.session.get(
            'user_id')).first()
        form = TodoForm(request.POST or None, instance=todo)
        if form.is_valid():
            form.save()
            return redirect('todo')

        context = {
            'form': form
        }

        return render(request, 'edit.html', context)

    def delete(self, request):
        Todo.objects.filter(id=request.POST['id'], user_id=request.session.get(
            'user_id')).delete()
        return redirect('todo')
