<?php
require('dbconnect.php');
//เซ็ตค่าตัวแปร ให้เป็นชื่อคอลัมน์ในฐานข้อมูล ที่ต้องการบันทึก

$Type_name = 'Type';
$User_ID = 'User_ID';
$Pass_ID = 'Pass_ID';

// กดบันทึกข้อมูลจากฟอร์ม
$Type = $_POST["type"];
$Username = $_POST["username"];
$Password = $_POST["pwd"];

if (empty($Type) || empty($Username) || empty($Password)) {
?>
    <h1 class="text-center"><?php echo "กรุณากรอกข้อมูล"; ?></h1>
    <hr>
    <?php
} else {

    $sql = "INSERT INTO รหัสต่างๆ ($Type_name, $User_ID, $Pass_ID) VALUES ('$Type','$Username', '$Password')";

    if ($conn->query($sql) === TRUE) {
    ?>
        <!-- แสดงข้อมูลที่เพิ่มเข้าไป -->
        <br>
        <h1 class="text-center">บันทึกข้อมูลสําเร็จแล้ว</h1>
        <div class="container my-3">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">Type</th>
                        <th scope="col">Username</th>
                        <th scope="col">Password</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td><?php echo $Type; ?></td>
                        <td><?php echo $Username; ?></td>
                        <td><?php echo $Password; ?></td>
                    </tr>
                </tbody>
            </table>
        </div>
<?php
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
?>