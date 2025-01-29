<?php
// เก็บข้อมูลจากไฟล์ txt ลงในฐานข้อมูล MySQLโดยใช้ PHP และ MySQL ในการเขียน code 
require('dbconnect.php');
$filename = "..txt";

// อ่านไฟล์เป็นอาร์เรย์
//format 
// =======================================
// [Type]
// [Username]
// [Password]
// =======================================
$lines = file($filename, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);

$Type = [];
$Username = [];
$Password = [];
$values = [];

// Filter and separate the equal sign from the data in the file and import it into an array
foreach ($lines as $i => $line) {
    if (($i % 4) != 0) {
        $result = str_replace("=", '', $line);
        $values[] = $result;
    }
}

// Separate the data in the array into 3 parts: Type, Username, Password and import it into the specified arrays
foreach ($values as $index => $value) {
    switch ($index % 3) {
        case 0:
            $Type[] = $value;
            break;
        case 1:
            $Username[] = $value;
            break;
        case 2:
            $Password[] = $value;
            break;
    }
}

foreach ($Type as $index => $type) {
    echo "Type : " . $type . "<br>";
    echo "Username : " . $Username[$index] . "<br>";
    echo "Password : " . $Password[$index] . "<br>";
    echo "-----------------------------------------------<br>";

    $sql = "INSERT INTO รหัสต่างๆ (Type, User_ID, Pass_ID) VALUES ('$type','$Username[$index]', '$Password[$index]')";

    if ($conn->query($sql) === TRUE) {
        echo "New record created successfully<br>";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
