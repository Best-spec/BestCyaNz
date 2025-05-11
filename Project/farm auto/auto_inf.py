import pydirectinput
import keyboard
import time
import pygetwindow as gw

# ตั้งค่าชื่อหน้าต่างของ Roblox
APP_NAME = "Roblox"

# โฟกัสไปที่หน้าต่างเกม
try:
    game_window = gw.getWindowsWithTitle(APP_NAME)[0]
    game_window.activate()  # โฟกัสไปที่ Roblox
except IndexError:
    print(f"ไม่พบเกม {APP_NAME}")
    exit()

time.sleep(2)  # รอให้เกมพร้อม

# อ่านพิกัดของเมาส์ (กด 'p' เพื่อแสดงพิกัด)
def get_mouse_position():
    print("กด 'p' เพื่อบันทึกพิกัดเมาส์, กด 'q' เพื่อออก")
    while True:
        if keyboard.is_pressed('q'):
            print("ออกจากโปรแกรม")
            exit()
        time.sleep(0.1)  # รอให้กดปุ่ม
        # ถ้ากด 'p' จะบันทึกพิกัดเมาส์
        if keyboard.is_pressed('p'):
            x, y = pydirectinput.position()
            print(f"พิกัดที่บันทึก: {x}, {y}")
            return x, y

x, y = get_mouse_position()  # เรียกใช้ฟังก์ชันอ่านพิกัด
print(f"พิกัดที่บันทึก: {x}, {y}")

# เคลื่อนเมาส์ไปตำแหน่งที่กำหนด และคลิก
# def move_and_click(x, y):
#     pydirectinput.moveTo(x, y)  # เคลื่อนเมาส์
#     time.sleep(0.2)
#     pydirectinput.click()  # คลิกซ้าย

# กด 'm' เพื่อเคลื่อนเมาส์ไปที่ (500, 300) และคลิก
while not keyboard.is_pressed('q'):  # กด 'q' เพื่อหยุด
    # if keyboard.is_pressed('m'):
    #     move_and_click(x, y)
    pass