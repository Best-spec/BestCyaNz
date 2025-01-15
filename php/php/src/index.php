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
    <?php
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    }
    ?>
    <h1 class="text-center">ค้นหาข้อมูลตามคําสั่ง sql</h1>
    <form action="ShowData.php" method="post">
        <div class="container my-3">
            <label for="inputPassword5" class="form-label">Type</label>
            <input type="text" name="inputbox" id="inputPassword5" class="form-control" aria-describedby="passwordHelpBlock">
            <input type="submit" value="ค้นหาข้อมูล" class="btn btn-primary">
        </div>
    </form>
    <button onclick="ShowAllData()">แสดงข้อมูลทั้งหมด</button>
    <h1 class="text-center">แสดงข้อมูล</h1>
    <div id="data-container">

    </div>
    <script>
        function ShowAllData() {
            const xhr = new XMLHttpRequest(); // สร้าง XMLHttpRequest object
            xhr.open("GET", "ShowAllData.php", true); // ส่งคำขอไปยังไฟล์ PHP
            xhr.onload = function() {
                if (xhr.status === 200) {
                    // อัปเดตเนื้อหาภายใน div ที่มี id="data-container"
                    document.getElementById("data-container").innerHTML = xhr.responseText;
                } else {
                    alert("เกิดข้อผิดพลาดในการดึงข้อมูล");
                }
            };
            xhr.send(); // ส่งคำขอ
        }
    </script>
</body>


</html>