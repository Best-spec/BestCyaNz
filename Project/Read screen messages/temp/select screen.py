import mss
import numpy as np
import cv2

with mss.mss() as sct:
    monitor = {"top": 900, "left": 200, "width": 1400, "height": 180}
    screenshot = sct.grab(monitor)

    # แปลงภาพเป็น OpenCV
    img = np.array(screenshot)
    img = cv2.cvtColor(img, cv2.COLOR_BGRA2BGR)

    # แสดงภาพที่จับได้
    cv2.imshow("Captured Region", img)
    cv2.waitKey(0)
    cv2.destroyAllWindows()
