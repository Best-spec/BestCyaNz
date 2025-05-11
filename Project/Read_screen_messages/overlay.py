import tkinter as tk
import pytesseract
import mss
import numpy as np
import cv2
import requests
from PIL import Image, ImageTk
import keyboard

# ตั้งค่าตำแหน่งของ Tesseract OCR
pytesseract.pytesseract.tesseract_cmd = r"C:\Program Files\Tesseract-OCR\tesseract.exe"

# ตั้งค่า API สำหรับแปลภาษา
TRANSLATE_API_URL = "http://localhost:8000/translate"  # หรือใช้ Google Translate API

# สร้างหน้าต่างหลัก
root = tk.Tk()
root.attributes("-topmost", True)  # ให้หน้าต่างอยู่ด้านบนสุด
root.overrideredirect(True)  # เอาขอบหน้าต่างออก (Borderless)
root.geometry("1400x400+271+340")  # ขนาดและตำแหน่งหน้าต่าง (กว้าง x สูง + ตำแหน่ง X + ตำแหน่ง Y)
root.configure(bg="black")  # ตั้งค่าสีพื้นหลังโปร่งใส
root.wm_attributes("-transparentcolor", "black")

# ข้อความที่จะแสดง
translated_text = tk.StringVar()

text_label = tk.Label(root, textvariable=translated_text, font=("tahoma", 20), fg="white", bg="black")
text_label.pack(expand=True)

def enhance_image(img):
    """เพิ่มคอนทราสต์และทำให้ภาพคมชัดขึ้น"""
    # ปรับคอนทราสต์
    lab = cv2.cvtColor(img, cv2.COLOR_BGR2Lab)
    l, a, b = cv2.split(lab)
    l = cv2.equalizeHist(l)  # ปรับ histogram
    lab = cv2.merge([l, a, b])
    img = cv2.cvtColor(lab, cv2.COLOR_Lab2BGR)

    # การทำให้ภาพคมชัด
    kernel = np.array([[0, -1, 0], [-1, 5,-1], [0, -1, 0]])  # Kernel สำหรับ sharpening
    img = cv2.filter2D(img, -1, kernel)

    # ปรับแสง
    img = cv2.convertScaleAbs(img, alpha=1.5, beta=0)
    return img

def preprocess_image(img):
    """ทำการแปลงภาพเพื่อเพิ่มความชัดเจน"""
    # แปลงเป็นขาวดำ
    img = cv2.cvtColor(img, cv2.COLOR_BGRA2GRAY)  # แปลงเป็น grayscale
    # ใช้ Otsu thresholding เพื่อแปลงภาพเป็น binary
    _, img = cv2.threshold(img, 0, 255, cv2.THRESH_BINARY + cv2.THRESH_OTSU)
    return img


def capture_screen():
    with mss.mss() as sct:
        # เลือกพื้นที่ของหน้าจอ (แก้ให้ตรงกับตำแหน่งซับเกม)
        monitor = {"top": 900, "left": 200, "width": 1400, "height": 200}
        screenshot = sct.grab(monitor)

        # แปลงภาพเป็น OpenCV
        img = np.array(screenshot)
        # img = cv2.cvtColor(img, cv2.COLOR_BGRA2GRAY)  # แปลงเป็นขาวดำ
        # img = cv2.threshold(img, 0, 255, cv2.THRESH_BINARY + cv2.THRESH_OTSU)[1]  # เพิ่ม contrast

        # img = enhance_image(img)  # ปรับคอนทราสต์และทำให้ภาพคมชัด
        # img = preprocess_image(img)  # ทำให้ภาพเป็นขาวดำและใช้ thresholding
        
        # ใช้ OCR ดึงข้อความ
        text = pytesseract.image_to_string(img, lang="eng")  # เปลี่ยน "eng" เป็น "tha" ถ้าเป็นภาษาไทย
        # pil_img = Image.fromarray(img)
        # pil_img.show()
        return text
        

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
        translated_text.set(translate_text(text))  # แสดงข้อความที่แปลแล้ว
    root.after(250, update_subtitles)  # อัพเดตทุก 1 วินาที

# ฟังก์ชันปิดโปรแกรม
def close_program(event=None):
    root.destroy()

# ฟังก์ชันให้หน้าต่างสามารถลากได้
def move_window(event):
    root.geometry(f"+{event.x_root}+{event.y_root}")
    print(event.x_root, event.y_root)

# จับ event การลากหน้าต่าง
text_label.bind("<B1-Motion>", move_window)

# จับปุ่ม F1 เพื่อปิดโปรแกรม
keyboard.add_hotkey('F2', close_program)

# เริ่มจับภาพและแปล
update_subtitles()

root.mainloop()
