from django.shortcuts import render
from django.http import HttpResponse, Http404
from django.views.decorators.http import *
from django.views import View
from .forms import TodoForm

# Create your views here.

todos = {
    1: ["Buy milk", True],
    2: ["Pay bills", False],
    3: ["Test", True]
}


def index(request):
    # return HttpResponse("Welcome to todo application")
    context = {
        'title': "Welcome to todo application :)",
        'content': "Hi lorem ipsum dolor sit, amet consectetur adipisicing elit. Inventore repudiandae eligendi, expedita explicabo voluptatum eaque a labore iste odio sunt voluptas distinctio quia blanditiis. Assumenda similique molestiae minima consequatur esse?"
    }
    return render(request, 'todo/homepage.html', context)


def view_todo(request, todo_id):

    if todo_id not in todos.keys():
        # return HttpResponse("Todo with id " + str(todo_id) + " doesn't exist!")
        raise Http404("Todo with id " + str(todo_id) + " doesn't exist!")

    todo = todos[todo_id]
    context = {
        'todo': todo
    }
    return render(request, 'todo/view-todo.html', context)
    # return HttpResponse("Todo: " + str(todo_id))


# @require_POST
def create_todo(request):
    if request.method == "POST":
        # return HttpResponse(request.POST['todo'])
        new_todo = request.POST['todo']
        next_index = len(todos.keys()) + 1
        todos[next_index] = [new_todo, False]
        return render(request, 'todo/create-todo.html', {'todos': todos})

    return render(request, 'todo/create-todo.html')


# class-base views
class TodoView(View):
    template_location = 'todo/create-todo.html'

    def get(self, request):
        form = TodoForm
        context = {
            'form': form
        }
        return render(request, self.template_location, context)

    def post(self, request):
        form = TodoForm(request.POST)
        if form.is_valid():
            new_todo = request.POST['todo']
            next_index = len(todos.keys()) + 1
            todos[next_index] = [new_todo, False]
            context = {
                'form': form,
                'todos': todos
            }
            return render(request, self.template_location, context)
        else:
            return render(request, self.template_location, {'form': form})
