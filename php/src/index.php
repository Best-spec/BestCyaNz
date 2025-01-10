<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>
    <h1 class="text-center">ระบบบันทึกรหัสผ่าน</h1>
    <form method="post">
        <div class="container my-3">
            <label for="inputPassword5" class="form-label">Property</label>
            <input type="text" name="Property" id="inputPassword5" class="form-control" aria-describedby="passwordHelpBlock">
            <label for="inputPassword5" class="form-label">Username</label>
            <input type="text" name="username" id="inputPassword5" class="form-control" aria-describedby="passwordHelpBlock">
            <label for="inputPassword5" class="form-label">Password</label>
            <input type="password" name="pwd" id="inputPassword5" class="form-control" aria-describedby="passwordHelpBlock"><br>
            <input type="submit" value="บันทึกข้อมูล" class="btn btn-success">
            <input type="reset" value="ล้างข้อมูล" class="btn btn-danger"><br>
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

            echo "<br>";
            echo "Property : " . $Property . "<br>";
            echo "Username : " . $Username . "<br>";
            echo "Password : " . $Password . "<br>";
            ?>
        </div>
    </form>


</body>

</html>