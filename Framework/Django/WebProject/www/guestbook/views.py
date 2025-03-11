from django.shortcuts import render
from django.contrib.auth.decorators import login_required
from django.contrib.auth.models import User
from django.contrib.auth import login
from django.shortcuts import redirect
from .forms import UserProfileForm

# Create your views here.
@login_required(login_url='login')
def home(request):
    if request.method == 'POST':
        form = UserProfileForm(request.POST, instance=request.user)  # ใช้ instance เป็นผู้ใช้ที่ล็อกอินอยู่
        if form.is_valid():
            form.save()  # บันทึกการเปลี่ยนแปลง
            return redirect('home')  # เปลี่ยนเส้นทางไปหน้า Home หลังจากบันทึกข้อมูล
    else:
        form = UserProfileForm(instance=request.user)  # แสดงฟอร์มพร้อมข้อมูลของผู้ใช้ปัจจุบัน

    return render(request, 'home.html', {'form': form})

def signup(request):
    if request.method == 'POST':
        first_name = request.POST.get('first_name')
        username = request.POST.get('username')
        password = request.POST.get('password')
        user = User.objects.create_user(username=username, password=password, first_name=first_name)
        user.save()
        login(request, user)
        return redirect('home')
    return render(request, 'signup.html')