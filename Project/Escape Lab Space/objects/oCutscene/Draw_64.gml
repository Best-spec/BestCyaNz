/// @description Draw Cutscene Text & Fade Effect

// แสดงข้อความ
// ตั้งค่าความโปร่งใสและสีสำหรับข้อความแรก
draw_set_alpha(textAlpha);
draw_set_color(c_white);
draw_text_transformed(room_width / 2, room_height / 2, "Thank you for playing!", 2, 2, 0);

// ตั้งค่าความโปร่งใสและสีสำหรับข้อความที่สอง


// ตั้งค่าความโปร่งใสกลับเป็นปกติ
draw_set_alpha(1);

// เอฟเฟกต์ Fade In / Out
draw_set_alpha(fadeAlpha);
draw_set_color(c_black);
draw_rectangle(0, 0, room_width, room_height, false);
draw_set_alpha(1);
