// หยุดเพลงเก่า
audio_stop_sound(ZZZ_Minigame_OST__Bizarre_Brigade__Zenless_Zone_Zero_);

// เล่นเพลงใหม่ในเครดิต
sound_bgm = Hopes_And_Dreams; // เปลี่ยนเป็นเพลงที่ต้องการ
bgm = audio_play_sound(Hopes_And_Dreams, 1, true);
audio_sound_gain(Hopes_And_Dreams
, 0.7, 0); // ตั้งค่าเสียง 70%
