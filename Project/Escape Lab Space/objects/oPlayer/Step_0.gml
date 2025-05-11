/// @description 
// Horizontal movement

// ตัวแปรสำหรับกระโดดและพุ่ง
if (!dashCooldown) dashCooldown = 0; // คูลดาวน์การพุ่ง
var dashSpeed = 10; // ความเร็วในการพุ่ง
var dashDuration = 10; // จำนวนเฟรมที่พุ่ง
var inputDash = keyboard_check_pressed(vk_shift);

// การเคลื่อนที่พื้นฐาน
moveX = inputX * moveSpeed;

// กระโดด (Jump)
if (inputJump && jumpCount > 0) {
    moveY = -jumpSpeed;
    jumpCount--; // ลดจำนวนครั้งที่กระโดด
    show_debug_message("JumpCount: " + string(jumpCount));
}

// รีเซ็ต jumpCount เมื่อแตะพื้น
if (place_meeting(x, y + 1, oPlatformParent)) {
    jumpCount = 1;
}

// พุ่ง (Dash)
if (inputDash && !isDashing && dashCooldown <= 0) {
	isDashing = true;
	dashProgress = 0; // เริ่ม Dash ใหม่
	if (dashDirection == 0) dashDirection = 1;
    dashDirection = sign(inputX);
    dashCooldown = dashDuration + 15; // ตั้งค่าคูลดาวน์
}

// ถ้าอยู่ในสถานะ Dash
if (isDashing) {
    dashProgress += 1 / dashDuration; // ค่อยๆ เพิ่มค่าความคืบหน้าของ Dash (0 → 1)
    
    // ทำให้การ Dash ลื่นขึ้นโดยใช้ Ease Out
    var dashAmount = dashSpeed * (1 - power(dashProgress, 2)); // Smooth effect
    
    moveX = dashDirection * dashAmount;

    // จบ Dash เมื่อถึงจุดสูงสุด
    if (dashProgress >= 1) {
        isDashing = false;
        moveX = 0; // รีเซ็ตความเร็ว
    }
} else {
    // คูลดาวน์ลดลงเมื่อไม่ได้ Dash
    if (dashCooldown > 0) dashCooldown--;
		//show_debug_message("dashCooldown: " + string(dashCooldown));
}


// คำนวณความเร็วสุดท้าย
var _finalMoveX = moveX;
var _finalMoveY = moveY;

// ตรวจสอบว่าชนกำแพงด้านข้างหรือไม่
var isWallLeft  = place_meeting(x - 1, y, [oPlatform ,oPlatform_2, oPipe]);
var isWallRight = place_meeting(x + 1, y, [oPlatform, oPlatform_2, oPipe]);
var isWall      = isWallLeft || isWallRight;
var isOnGround = place_meeting(x, y + 1, [oPlatform, oPlatform_2, oPipe ]);

// การชนกับพื้นเคลื่อนที่
var _movingPlatform = instance_place(x, y + max(1, _finalMoveY), [oPlatformMoving,oPlatformMoving_1]);
if (_movingPlatform && bbox_bottom <= _movingPlatform.bbox_top) {
    if (_finalMoveY > 0) {
        while (!place_meeting(x, y + sign(_finalMoveY), [oPlatformMoving,oPlatformMoving_1])) {
            y += sign(_finalMoveY);
        }
        _finalMoveY = 0;
        moveY = 0;
    }
    _finalMoveX += _movingPlatform.moveX;
    _finalMoveY += _movingPlatform.moveY;
}


// การชนกับแพลตฟอร์ม (แนว X)
if (place_meeting(x + _finalMoveX, y, [oPlatform, oPlatform_2, oPipe ])) {
    while (!place_meeting(x + sign(_finalMoveX), y, [oPlatform, oPlatform_2, oPipe])) {
        x += sign(_finalMoveX);
    }
    _finalMoveX = 0;
	
	// ถ้ากระโดดอยู่แล้วชนกำแพง ให้ดันตัวออกนิดหน่อย
	if (moveY < 0) {
        x -= sign(_finalMoveX) * 2; // ดันออกจากกำแพง
    }
}

// การชนกับแพลตฟอร์ม (แนว Y) (ให้เช็กเฉพาะตอนที่ไม่ชนกำแพงด้านข้าง)
if (!isWall && place_meeting(x, y + _finalMoveY, [oPlatform, oPlatform_2, oPipe])) {
    while (!place_meeting(x, y + sign(_finalMoveY), [oPlatform, oPlatform_2, oPipe])) {
        y += sign(_finalMoveY);
    }
    _finalMoveY = 0;
    moveY = 0;
}

// 🚀 **ป้องกันการตกจากพื้นเมื่อชนกำแพง**
if (isWall && isOnGround && _finalMoveY > 0) {
    _finalMoveY = 0;
    moveY = 0;
}

// เคลื่อนที่
x += _finalMoveX;
y += _finalMoveY;


// แรงโน้มถ่วง
if (moveY < 10) {
    moveY += gravSpeed;
}



// change switch and unlock the door
if (place_meeting(x, y, oSwitch_0)) {
    if (keyboard_check_pressed(ord("E"))) {
        var target = instance_place(x, y, oSwitch_0);
        if (target != noone) {
            if (target.sprite_index == Switch__2_) {
                target.sprite_index = Switch__1;
                // ค้นหาประตูที่สัมพันธ์กับสวิตช์แล้วเปลี่ยนสถานะ
                var door = instance_nearest(target.x, target.y, oDoor_lock);
                if (door != noone) {
                    with (door) {
                        instance_change(oDoor_unlocked, false);
                    }
                }
            } 
            else if (target.sprite_index == Switch__1) {
                target.sprite_index = Switch__2_;
                var door = instance_nearest(target.x, target.y, oDoor_unlocked);
                if (door != noone) {
                    with (door) {
                        instance_change(oDoor_lock, false);
                    }
                }
            }
        }
    }
}

// open the door
if (place_meeting(x, y, oDoor_unlocked)) {
    with (oDoor_unlocked) {
        instance_change(oDoor_open, false);
    }
} else if !(place_meeting(x, y, oDoor_open)){
    with (oDoor_open) {
        instance_change(oDoor_unlocked, false);
    }
}

//enter the door for going to the next room
if (place_meeting(x, y, oDoor_open)) {
    if (keyboard_check_pressed(ord("E"))) {
        // เปลี่ยนไปยังห้องถัดไป
        room_goto_next();
    }
}
// collision
if (place_meeting(x,y, [OAcid,OAcid1,Spike1,OSAW])) {
    // ส่งตัวละครกลับไปที่ตำแหน่ง Checkpoint
    x = checkpointX;
    y = checkpointY;

    // รีเซ็ตความเร็วให้ตัวละคร
    moveX = 0;
    moveY = 0;
    show_debug_message("Respawn at checkpoint");
}

// checkpoint
if (place_meeting(x, y, oCheckpoint)) {
    var checkpoint = instance_place(x, y, oCheckpoint);
    if !(checkpoint.sprite_index = Barrel__2_) {
        if (checkpoint != noone) {
        checkpointX = checkpoint.x;
        checkpointY = checkpoint.y;
        show_debug_message("Checkpoint saved at: " + string(checkpointX) + ", " + string(checkpointY));
        }
    } 
}