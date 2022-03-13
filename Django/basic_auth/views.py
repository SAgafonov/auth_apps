from django.views.generic import TemplateView
from django.shortcuts import redirect, render
from .forms import MyRegistrationForm


class HomePageView(TemplateView):
    template_name = 'home.html'


def registration(request):
    if request.method == 'POST':
        form = MyRegistrationForm(request.POST)
        if form.is_valid():
            form.save()
            return redirect('login')
    else:
        form = MyRegistrationForm()
    return render(request, 'registration/registration.html', {'form': form})
