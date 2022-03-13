from django.contrib.auth.forms import UserCreationForm
from django.contrib.auth.models import User


class MyRegistrationForm(UserCreationForm):
    class Meta:
        model = User
        fields = ("username", "password1", "password2", "is_staff")
