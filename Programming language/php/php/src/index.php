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
    <form id="insertform">
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

    <div class="container my-3">
        <p id="ShowInsertData"></p>
    </div>



    <!-- ค้นหาข้อมูลตาม Type -->
    <h1 class="text-center">ค้นหาข้อมูลตาม Type</h1>
    <form onsubmit="event.preventDefault()">
        <div class=" container my-3">
            <label for="inputPassword5" class="form-label">Type</label>
            <input type="text" name="inputbox" id="inputPassword5" class="form-control" aria-describedby="passwordHelpBlock">
            <button onclick="ShowData('inputbox')" class="btn btn-outline-primary">ค้นหาข้อมูล</button>
            <button onclick="ShowData('AllData')" class="btn btn-outline-info">แสดงข้อมูลทั้งหมด</button>
        </div>
    </form>
    <div class="container my-3">
        <h1 class="text-center" id="ShowType" style="display: none">แสดงข้อมูล</h1><br>
        <div id="data-container">
        </div>

    </div>
    <script src="https://code.jquery.com/jquery-3.7.1.js"></script>
    <script src="script.js"></script>
</body>


</html>