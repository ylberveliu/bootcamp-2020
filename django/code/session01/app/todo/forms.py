from django import forms


class TodoForm(forms.Form):
    todo = forms.CharField(widget=forms.TextInput(
        attrs={'class': 'form-field'}), label="Enter todo: ", max_length=20)
