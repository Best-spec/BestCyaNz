/// @description Cutscene Logic
if (fadeAlpha > 0) {
    fadeAlpha -= transitionSpeed; // ทำให้หน้าจอค่อยๆ ปรากฏ (Fade In)
}

switch (cutsceneStep) {
    case 0: // แสดงข้อความแรก
        textAlpha += transitionSpeed; // ค่อยๆ ทำให้ข้อความชัดขึ้น
        if (keyboard_check_pressed(vk_space))
		{ 
		   
           room_goto(Room8); // ไปที่ห้องเมนูหลัก
		   
        }
        break;
}
//    case 1: // แสดงข้อความที่สอง
//        textAlpha = max(0, textAlpha - transitionSpeed); // ทำให้ข้อความแรกจางลง
//        if (textAlpha <= 0) {
//            textAlpha = 0;
//            cutsceneStep++; // ไปยังขั้นต่อไป
//        }
//        break;

//    case 2: // จบ Cutscene และไปหน้าเมนู
//        fadeAlpha += transitionSpeed; // ทำให้จอมืดลง (Fade Out)
//        if (fadeAlpha >= 1) {
//            room_goto(rmMenu); // ไปที่ห้องเมนูหลัก
//        }
//        break;
//}
