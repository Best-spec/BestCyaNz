<?php
require('dbconnect.php');

$Property = $_POST["Property"];
$Username = $_POST["username"];
$Password = $_POST["pwd"];

$sql = "INSERT INTO รหัสต่างๆ (Property, ชื่อผู้ใช้, รหัสผ่าน) VALUES ('$Property','$Username', '$Password')";

if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}
