from django.forms import ModelForm
from django import forms
from .models import Todo

# class TodoForm(forms.Form):
#     title = forms.CharField(widget=forms.TextInput(attrs={
#         'class': 'form-control',
#         'placeholder': 'Enter task here...'
#     }), label="Task: ", max_length=20)
#     completed = forms.BooleanField()


class TodoForm(ModelForm):
    class Meta:
        model = Todo
        fields = '__all__'
