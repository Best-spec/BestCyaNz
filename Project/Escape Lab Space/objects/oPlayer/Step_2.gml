// Dash
if (isDashing) {
    sprite_index = spr_m_traveler_slide_anim;
    
    // เล่นเสียง Dash
    if (!dashSoundPlayed) {
        audio_play_sound(sound_dash, 1, false);
        dashSoundPlayed = true;
    }
    exit;
} else {
    dashSoundPlayed = false;
}

// Jump
if (moveY < 0) {
    sprite_index = spr_m_traveler_jump_complete_anim;
    
    // เล่นเสียงกระโดด
    if (!jumpSoundPlayed) {
        audio_play_sound(sound3, 1, false);
        jumpSoundPlayed = true;
    }
}
else if (inputX != 0) {
    image_xscale = sign(inputX);
    sprite_index = spr_m_traveler_run_anim;
}
else {
    sprite_index = spr_m_traveler_idle_anim;
}

// รีเซ็ต jumpSoundPlayed เมื่อแตะพื้น
if (moveY >= 0 && (place_meeting(x, y + 1, oPlatformParent) || place_meeting(x, y + 1, oPlatformMoving))) {
    jumpSoundPlayed = false;
}
