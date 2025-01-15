<?php
// เชื่อมต่อฐานข้อมูล
require 'dbconnect.php';

// สร้าง SQL Query เพื่อดึงข้อมูลทั้งหมด
$sql = "SELECT * FROM รหัสต่างๆ";
$result = $conn->query($sql);

// ตรวจสอบว่ามีข้อมูลหรือไม่
if ($result->num_rows > 0) {
    // เริ่มต้นตาราง
    echo '<table class="table table-bordered">';
    echo '<thead>';
    echo '<tr>';
    echo '<th scope="col">Type</th>';
    echo '<th scope="col">Username</th>';
    echo '<th scope="col">Password</th>';
    echo '</tr>';
    echo '</thead>';
    echo '<tbody>';

    // แสดงผลข้อมูล
    while ($row = $result->fetch_assoc()) {
        echo '<tr>';
        echo '<td>' . htmlspecialchars($row['Type']) . '</td>';
        echo '<td>' . htmlspecialchars($row['User_ID']) . '</td>';
        echo '<td>' . htmlspecialchars($row['Pass_ID']) . '</td>';
        echo '</tr>';
    }

    echo '</tbody>';
    echo '</table>';
} else {
    echo '<p class="text-center">ไม่มีข้อมูลในฐานข้อมูล</p>';
}

// ปิดการเชื่อมต่อฐานข้อมูล
$conn->close();
