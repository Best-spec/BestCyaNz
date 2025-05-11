<?php
// เชื่อมต่อฐานข้อมูล
require 'dbconnect.php';

// สร้าง SQL Query เพื่อดึงข้อมูลทั้งหมด
$sql = "SELECT * FROM รหัสต่างๆ";
$result = $conn->query($sql);

// ตรวจสอบว่ามีข้อมูลหรือไม่
if ($result->num_rows > 0) { ?>
    <!-- // เริ่มต้นตาราง -->
    <table class="table">
        <thead class="table-dark">
            <tr>
                <th scope="col">Type</th>
                <th scope="col">Username</th>
                <th scope="col">Password</th>
                <th scope="col">ลบข้อมูล</th>
            </tr>
        </thead>
        <tbody class="table-group-divider">
            <!-- แสดงผลข้อมูล -->
            <?php while ($row = $result->fetch_assoc()) { ?>
                <tr>
                    <td><?php echo $row['Type']; ?></td>
                    <td><?php echo $row['User_ID']; ?></td>
                    <td><?php echo $row['Pass_ID']; ?></td>
                    <td>
                        <a onclick="DeleteData('<?php echo $row['ID']; ?>')" class="btn btn-danger">ลบข้อมูล</a>
                    </td>
                </tr>
            <?php
            }
            ?>
            <script src="script.js"></script>

        <?php
        echo '</tbody>';
        echo '</table>';
    } else {
        echo '<p class="text-center">ไม่มีข้อมูลในฐานข้อมูล</p>';
    }

    // ปิดการเชื่อมต่อฐานข้อมูล
    $conn->close();
