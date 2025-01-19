<?php
require 'dbconnect.php';

$ID = $_POST["id"];

$sql = "DELETE FROM รหัสต่างๆ WHERE ID = '$ID'";
if ($conn->query($sql) === TRUE) {
    header("Location: ../ShowAllData.php");
} else {
    echo "Error deleting record: " . $conn->error;
}
