<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>
    <br>
    <h1 class="text-center">ระบบบันทึกรหัสผ่าน</h1>
    <form method="post">
        <div class="container my-3">
            <label for="inputPassword5" class="form-label">Type</label>
            <input type="text" name="type" id="inputPassword5" class="form-control" aria-describedby="passwordHelpBlock">
            <label for="inputPassword5" class="form-label">Username</label>
            <input type="text" name="username" id="inputPassword5" class="form-control" aria-describedby="passwordHelpBlock">
            <label for="inputPassword5" class="form-label">Password</label>
            <input type="password" name="pwd" id="inputPassword5" class="form-control" aria-describedby="passwordHelpBlock"><br>
            <input type="submit" value="บันทึกข้อมูล" class="btn btn-success">
            <input type="reset" value="ล้างข้อมูล" class="btn btn-danger"><br>
        </div>
    </form>

    <?php

    // กดบันทึกข้อมูลจากฟอร์ม
    if (empty($_POST["type"]) || empty($_POST["username"]) || empty($_POST["pwd"])) {
    ?>
        <h1 class="text-center"><?php echo "กรุณากรอกข้อมูล"; ?></h1>
        <?php
    } else {
        require('dbconnect.php');
        $Type = $_POST["type"];
        $Username = $_POST["username"];
        $Password = $_POST["pwd"];
        $sql = "INSERT INTO รหัสต่างๆ (Type, User_ID, Pass_ID) VALUES ('$Type','$Username', '$Password')";

        if ($conn->query($sql) === TRUE) {
        ?>
            <br>
            <h1 class="text-center">บันทึกข้อมูลสําเร็จแล้ว</h1>;
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


    <!-- ค้นหาข้อมูลตาม Type -->
    <h1 class="text-center">ค้นหาข้อมูลตาม Type</h1>
    <form onsubmit="event.preventDefault()">
        <div class=" container my-3">
            <label for="inputPassword5" class="form-label">Type</label>
            <input type="text" name="inputbox" id="inputPassword5" class="form-control" aria-describedby="passwordHelpBlock">
            <button onclick="ShowData('inputbox')">ค้นหาข้อมูล</button>
            <button onclick="ShowData('AllData')">แสดงข้อมูลทั้งหมด</button>
        </div>
    </form>
    <div class="container my-3">
        <h1 class="text-center" id="ShowType" style="display: none">แสดงข้อมูล</h1><br>
        <div id="data-container">
        </div>

    </div>
    <script src="script.js"></script>
    <script src="https://code.jquery.com/jquery-3.7.1.js"></script>
</body>


</html>