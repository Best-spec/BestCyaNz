// หยุดเพลงเก่า
audio_stop_sound(ZZZ_Minigame_OST__Bizarre_Brigade__Zenless_Zone_Zero_);

// เล่นเพลงใหม่ในเครดิต
sound_bgm = ZZZ_Minigame_OST__Bizarre_Brigade__Zenless_Zone_Zero_; // เปลี่ยนเป็นเพลงที่ต้องการ
bgm = audio_play_sound(ZZZ_Minigame_OST__Bizarre_Brigade__Zenless_Zone_Zero_, 1, true);
audio_sound_gain(ZZZ_Minigame_OST__Bizarre_Brigade__Zenless_Zone_Zero_, 0.7, 0); // ตั้งค่าเสียง 70%
