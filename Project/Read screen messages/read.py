import pytesseract
from PIL import Image, ImageTk
import pyautogui

# จับภาพหน้าจอแล้วบันทึกเป็น screenshot.png
screenshot = pyautogui.screenshot()
screenshot.save("image.png")

# โหลดรูปภาพที่เป็น Screenshot
img = Image.open("image.png")  

# แปลงเป็นข้อความ
text = pytesseract.image_to_string(img, lang="eng")  

print(text)  # แสดงผลข้อความที่ดึงออกมา
