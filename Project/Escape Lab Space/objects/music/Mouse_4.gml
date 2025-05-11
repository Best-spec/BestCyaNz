if (musicPlaying) {
    audio_sound_gain(bgm, 0, 0); // ปรับความดังเป็น 0 (ปิดเพลง)
    musicPlaying = false;
} else {
    audio_sound_gain(bgm, 0.7, 0); // ปรับความดังกลับมา 70%
    musicPlaying = true;
}

if (musicPlaying) {
    sprite_index = Button9; // เปลี่ยนเป็นไอคอนปิดเสียง
} else {
    sprite_index = Button10; // เปลี่ยนเป็นไอคอนเปิดเสียง
}
