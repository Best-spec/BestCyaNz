import easyocr
import torch
from transformers import MarianMTModel, MarianTokenizer
import tkinter as tk
import mss
import numpy as np
import cv2
import keyboard  # ใช้จับคีย์กด

# โหลด OCR และ Translator
reader = easyocr.Reader(['en'])
model_name = 'Helsinki-NLP/opus-mt-th-en'
tokenizer = MarianTokenizer.from_pretrained(model_name)
model = MarianMTModel.from_pretrained(model_name).to('cuda' if torch.cuda.is_available() else 'cpu')

device = torch.device("cuda" if torch.cuda.is_available() else "cpu")

# ตัวแปรควบคุมการเปิด-ปิด
translation_enabled = True

# ฟังก์ชันแปลข้อความ
def translate(text):
    if not text.strip():
        return ""
    inputs = tokenizer(text, return_tensors="pt", padding=True, truncation=True, max_length=128).to(device)
    translated = model.generate(**inputs, max_new_tokens=60)
    return tokenizer.decode(translated[0], skip_special_tokens=True)

# GUI แสดงซับ
root = tk.Tk()
root.attributes("-topmost", True)
root.geometry("1200x100+300+200")
root.configure(bg="black")
root.overrideredirect(True)

text_var = tk.StringVar()
label = tk.Label(root, textvariable=text_var, font=("tahoma", 20), fg="white", bg="black", wraplength=1200)
label.pack(expand=True, fill="both")

# ฟังก์ชันจับภาพหน้าจอแล้วแปล
def capture_and_translate():
    global translation_enabled
    if translation_enabled:
        with mss.mss() as sct:
            monitor = {"top": 900, "left": 200, "width": 1400, "height": 200}
            img = np.array(sct.grab(monitor))
            img = cv2.cvtColor(img, cv2.COLOR_BGRA2BGR)
            cv2.imshow("Captured Region", img)
            result = reader.readtext(img, detail=0)
            full_text = " ".join(result)
            if full_text:
                translated = translate(full_text)
                text_var.set(translated)
            else:
                text_var.set("")
    else:
        text_var.set("")  # ถ้า pause ให้ล้างข้อความออก
    root.after(1000, capture_and_translate)

# ฟังก์ชันสลับสถานะแปล
def toggle_translation():
    global translation_enabled
    translation_enabled = not translation_enabled
    print(f"Translation Enabled: {translation_enabled}")

# ตั้งค่าให้กด F8 เพื่อสลับเปิด/ปิด
keyboard.add_hotkey('F8', toggle_translation)

# เริ่ม loop
capture_and_translate()
root.mainloop()
