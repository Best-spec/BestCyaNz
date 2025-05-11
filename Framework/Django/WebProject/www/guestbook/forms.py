# forms.py
from django import forms
from django.contrib.auth.models import User

class UserProfileForm(forms.ModelForm):
    class Meta:
        model = User
        fields = ['is_staff', 'is_superuser']  # ฟิลด์ที่จะแก้ไข

    # กำหนด widget สำหรับ is_staff และ is_superuser ให้เป็น Checkbox
    is_staff = forms.BooleanField(required=False, label='Is Staff')
    is_superuser = forms.BooleanField(required=False, label='Is Superuser')
