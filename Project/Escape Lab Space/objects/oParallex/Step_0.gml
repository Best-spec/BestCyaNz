var back4 = layer_get_id("Back4");
var back3 = layer_get_id("Back3");
var back2 = layer_get_id("Back2");
var back1 = layer_get_id("Back1");


layer_x(back4, lerp(0, camera_get_view_x(view_camera[0]), 0.4 ) );
layer_x(back3, lerp(0, camera_get_view_x(view_camera[0]), 0.7 ) );
layer_x(back2, lerp(0, camera_get_view_x(view_camera[0]), 0.9 ) );
layer_x(back1, lerp(0, camera_get_view_x(view_camera[0]), 1 ) );
