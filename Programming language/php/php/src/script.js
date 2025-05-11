//Ajax Jquery สำหรับการเพิ่มข้อมูล
$("#insertform").on("submit", function (e) {
  e.preventDefault();
  $.ajax({
    url: "InsertData.php",
    type: "POST",
    data: $("#insertform").serialize(),
    success: function (output) {
      $("#insertform")[0].reset();
      $("#ShowInsertData").html(output);
      console.log(output);
    },
  });
});

//Ajax แบบดั้งเดิม สำหรับการแสดงข้อมูล
function ShowData(value) {
  // ตรวจสอบค่าที่เลือก
  if (value == "AllData") {
    var phpfiles = "ShowAllData.php";
  } else if (value == "inputbox") {
    var type = document.querySelector('input[name="inputbox"]').value;
    var phpfiles = "ShowData.php";
  }

  const xhr = new XMLHttpRequest(); // สร้าง XMLHttpRequest object
  xhr.open("POST", phpfiles, true); // ส่งคำขอไปยังไฟล์ PHP
  xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
  xhr.onload = function () {
    if (xhr.status === 200) {
      // อัปเดตเนื้อหาภายใน div ที่มี id="data-container" และแสดง tag แสดงข้อมูล
      document.getElementById("ShowType").style.display = "block";
      document.getElementById("data-container").innerHTML = xhr.responseText;
    } else {
      alert("เกิดข้อผิดพลาดในการดึงข้อมูล");
    }
  };
  xhr.send(`type=${encodeURIComponent(type)}`); // ส่งคำขอ
}

//Ajax แบบดั้งเดิม สำหรับการลบข้อมูล
function DeleteData(ID) {
  const xhr = new XMLHttpRequest(); // สร้าง XMLHttpRequest object
  xhr.open("POST", "DeleteData.php", true); // ส่งคำขอไปยังไฟล์ PHP
  xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
  xhr.onload = function () {
    if (xhr.status === 200) {
      // อัปเดตเนื้อหาภายใน div ที่มี id="data-container" และแสดง tag แสดงข้อมูล
      document.getElementById("data-container").innerHTML = xhr.responseText;
    } else {
      alert("เกิดข้อผิดพลาดในการลบข้อมูล");
    }
  };
  xhr.send(`id=${encodeURIComponent(ID)}`); // ส่งคำขอ
}
