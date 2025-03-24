import tkinter as tk
import pytesseract
import mss
import numpy as np
import cv2
import requests
from PIL import Image, ImageTk

# ตั้งค่าตำแหน่งของ Tesseract OCR
pytesseract.pytesseract.tesseract_cmd = r"C:\Program Files\Tesseract-OCR\tesseract.exe"

# ตั้งค่า API สำหรับแปลภาษา
TRANSLATE_API_URL = "http://localhost:8000/translate"  # หรือใช้ Google Translate API

# สร้างหน้าต่างหลัก
root = tk.Tk()
root.title("Game Subtitle Translator")
root.geometry("800x400")

# ตัวแปรข้อความ
original_text = tk.StringVar()
translated_text = tk.StringVar()

# สร้าง Label สำหรับแสดงซับต้นฉบับและแปล
original_label = tk.Label(root, textvariable=original_text, font=("Arial", 14), fg="blue", wraplength=750)
original_label.pack(pady=10)
translated_label = tk.Label(root, textvariable=translated_text, font=("Arial", 14), fg="green", wraplength=750)
translated_label.pack(pady=10)

def capture_screen():
    with mss.mss() as sct:
        # เลือกพื้นที่ของหน้าจอ (แก้ให้ตรงกับตำแหน่งซับเกม)
        monitor = {"top": 900, "left": 200, "width": 1400, "height": 200}
        screenshot = sct.grab(monitor)

        # แปลงภาพเป็น OpenCV
        img = np.array(screenshot)
        img = cv2.cvtColor(img, cv2.COLOR_BGRA2GRAY)  # แปลงเป็นขาวดำ
        img = cv2.threshold(img, 0, 255, cv2.THRESH_BINARY + cv2.THRESH_OTSU)[1]  # เพิ่ม contrast
        
        # ใช้ OCR ดึงข้อความ
        text = pytesseract.image_to_string(img, lang="eng")  # เปลี่ยน "eng" เป็น "tha" ถ้าเป็นภาษาไทย
        return text.strip()

def translate_text(text):
    """ส่งข้อความไปยัง API แปลภาษา"""
    if not text:
        return ""
    data = {"text": text, "to": "th"}  # แปลเป็นภาษาไทย
    response = requests.post(TRANSLATE_API_URL, json=data)
    if response.status_code == 200:
        return response.json().get("translatedText", "แปลไม่ได้")
    return "เกิดข้อผิดพลาด"
    

def update_subtitles():
    """อัพเดตซับไตเติลเกมแบบ Realtime"""
    text = capture_screen()
    if text:
        original_text.set(text)  # แสดงข้อความต้นฉบับ
        translated_text.set(translate_text(text))  # แสดงข้อความที่แปลแล้ว
    root.after(250, update_subtitles)  # อัพเดตทุก 1 วินาที

# เริ่มจับภาพและแปล
update_subtitles()

root.mainloop()
