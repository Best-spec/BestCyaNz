<?php
$servername = "db";
$username = "BestCyaNz";
$password = "123456a";
$dbname = "Pass etc";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
echo "Connected successfully";
