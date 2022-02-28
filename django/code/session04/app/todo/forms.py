from django import forms
from .models import *


class RegisterForm(forms.ModelForm):
    class Meta:
        model = User
        fields = '__all__'


class LoginForm(forms.Form):
    username = forms.CharField(max_length=50)
    password = forms.CharField(widget=forms.PasswordInput(), max_length=50)


class TodoForm(forms.ModelForm):
    class Meta:
        model = Todo
        fields = '__all__'
