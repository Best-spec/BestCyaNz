<?php
// แสดงข้อมูลตาม Type เมื่อมีการค้นหา
require 'dbconnect.php';

$inputbox = $_POST["type"];
$sql = "SELECT * FROM รหัสต่างๆ WHERE Type LIKE '%$inputbox%' ";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo '<table class="table">';
    echo '<thead class="table-dark">';
    echo '<tr>';
    echo '<th scope="col">Type</th>';
    echo '<th scope="col">Username</th>';
    echo '<th scope="col">Password</th>';
    echo '<th scope="col">Modify</th>';
    echo '</tr>';
    echo '</thead>';
    echo '<tbody>';

    while ($row = $result->fetch_assoc()) {
        echo '<tr>';
        echo '<td>' . $row['Type'] . '</td>';
        echo '<td>' . $row['User_ID'] . '</td>';
        echo '<td>' . $row['Pass_ID'] . '</td>';
        echo '<td><a onclick="DeleteData(' . $row['ID'] . ')" class="btn btn-danger">ลบข้อมูล</a></td>';
        echo '</tr>';
    }
    echo '</tbody>';
    echo '</table>';
} else {
    echo "<h1>0 results</h1>";
}
$conn->close();
