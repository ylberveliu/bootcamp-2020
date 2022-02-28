from django.shortcuts import render, redirect
from django.http import HttpResponse
from .forms import TodoForm
from .models import Todo
from django.views.decorators.http import require_POST
from django.views import View

# Create your views here.


def index(request):
    todos = Todo.objects.all()
    form = TodoForm
    context = {
        'form': form,
        'todos': todos
    }
    return render(request, 'todo/index.html', context)


def create(request):
    form = TodoForm(request.POST)
    if form.is_valid():
        form.save()
    return redirect('home')


def update(request, id):
    todo = Todo.objects.get(id=id)
    form = TodoForm(request.POST or None, instance=todo)
    if request.method == "POST":
        if form.is_valid():
            form.save()
            return redirect('home')
    context = {
        'todo': todo,
        'form': form
    }
    return render(request, 'todo/edit.html', context)


def delete(request, id):
    todo = Todo.objects.get(id=id)
    if todo:
        todo.delete()
    return redirect('home')


def mark_as_completed(request, id):
    todo = Todo.objects.get(id=id)
    todo.comleted = True
    todo.save()
    return redirect('home')


@require_POST
def search(request):
    if request.method == "POST":
        search_query = request.POST['search']
        # todos = Todo.objects.filter(title=search_query) # strict title search
        todos = Todo.objects.filter(
            title__contains=search_query)  # like equal (SQL)
        if todos:
            context = {
                'todos': todos
            }
            return render(request, 'todo/search.html', context)
        else:
            return redirect('home')


class FormView(View):
    http_method_names = ['get', 'post', 'put', 'delete']

    def dispatch(self, *args, **kwargs):
        method = self.request.POST.get('_method', '').lower()
        if method == 'put':
            return self.put(*args, **kwargs)
        if method == 'delete':
            return self.delete(*args, **kwargs)
        return super(FormView, self).dispatch(*args, **kwargs)

    def get(self, request):
        context = {
            'data': "I am " + self.request.method + " method."
        }
        return render(request, 'methods/index.html', context)

    def post(self, request):
        context = {
            'data': "I am " + self.request.method + " method."
        }
        return render(request, 'methods/index.html', context)

    def put(self, request):
        context = {
            'data': "I am " + self.request.POST.get('_method') + " method."
        }
        return render(request, 'methods/index.html', context)

    def delete(self, request):
        context = {
            'data': "I am " + self.request.POST.get('_method') + " method."
        }
        return render(request, 'methods/index.html', context)
