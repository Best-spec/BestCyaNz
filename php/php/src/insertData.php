<?php
// บันทึกข้อมูลจากฟอร์ม post
require('dbconnect.php');

$Type = $_POST["type"];
$Username = $_POST["username"];
$Password = $_POST["pwd"];
$sql = "INSERT INTO รหัสต่างๆ (Type, User_ID, Pass_ID) VALUES ('$Type','$Username', '$Password')";

if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}
