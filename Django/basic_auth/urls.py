from django.urls import path, include
from .views import HomePageView, registration

urlpatterns = [
    path('', HomePageView.as_view(), name='home'),
    path('authorization/', include('django.contrib.auth.urls')),                            # by default name='login'
    path('registration/', registration, name='registration'),
]
