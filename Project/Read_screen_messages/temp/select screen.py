import mss
import numpy as np
import cv2
import pytesseract
import easyocr


# with mss.mss() as sct:
#     monitor = {"top": 900, "left": 200, "width": 1400, "height": 180}
#     screenshot = sct.grab(monitor)

#     # แปลงภาพเป็น OpenCV
#     img = np.array(screenshot)
#     img = cv2.cvtColor(img, cv2.COLOR_BGRA2BGR)

#     # แสดงภาพที่จับได้
#     cv2.imshow("Captured Region", img)
#     cv2.waitKey(0)
#     cv2.destroyAllWindows()

# เตรียมตัวอ่านภาษาอังกฤษ (หรือภาษาอื่นก็ได้)
reader = easyocr.Reader(['en'])  # 'en' = English

def capture_screen():
    with mss.mss() as sct:
        monitor = {"top": 900, "left": 200, "width": 1400, "height": 200}
        # monitor = {"top": 800, "left": 300, "width": 1300, "height": 300}
        
        while True:
            screeshot = sct.grab(monitor)
            img = np.array(sct.grab(monitor))
            img = cv2.cvtColor(img, cv2.COLOR_BGRA2BGR)
            cv2.imshow("Captured Region", img)

            if cv2.waitKey(1) & 0xFF == ord('q'):  # ถ้ากด q ให้ปิด
               break

cv2.destroyAllWindows()

# ทดสอบ
# text = capture_screen()
# print(text)
capture_screen()