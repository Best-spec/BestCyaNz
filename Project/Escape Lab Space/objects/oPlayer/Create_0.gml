/// @description 
inputX = 0;
inputJump = 0;

moveX = 0;
moveY = 0;
moveSpeed = 2;
jumpSpeed = 8;
gravSpeed = 0.5;
jumpCount = 0;
dashCooldown = 0;
////    สร้างใน create player
isDashing = false;  // สถานะพุ่ง
dashProgress = 0;   // ค่าความคืบหน้าของ Dash (0-1)
dashDirection = 0;  // ทิศทาง Dash
var inputDash = keyboard_check_pressed(vk_shift);
checkpointX = x;
checkpointY = y;
jumpSoundPlayed = false;
dashSoundPlayed = false;