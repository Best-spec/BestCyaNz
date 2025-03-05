// Refactored code for better readability and maintainability

// Utility function to update text
function changeText(value) {
  const selectElement = document.getElementById("select");
  selectElement.innerHTML = value;
  return value;
}

// Initialize variables
let x = "";
let remain = 0;
let p = 0;

// Tab click event handlers
document.getElementById("tab1").onclick = () => {
  x = changeText("เงินที่เหลือ");
};

document.getElementById("tab2").onclick = () => {
  x = changeText("วันนี้ใช้เงิน");
};

document.getElementById("tap").onclick = () => {
  const result = document.getElementById("num-input").value;
  const int1 = parseInt(result, 10);

  if (x === "เงินที่เหลือ") {
    if (remain !== 0) {
      remain = 0;
    } else {
      remain += int1;
      updateElement("my-cash", remain, "#dd75b5");
    }
  } else if (x === "วันนี้ใช้เงิน") {
    if (!isNaN(int1)) {
      p += int1;
      updateElement("use-cash", p, "cyan");
    } else {
      updateElement("use-cash", "กรุณากรอกตัวเลขที่ถูกต้อง!", "red");
    }
  }
};

// Clear button click event handler
document.getElementById("clear").onclick = () => {
  updateElement("use-cash", "", "");
  p = 0;
};

// Minus button click event handler
document.getElementById("minus").onclick = () => {
  remain -= p;
  updateElement("my-cash", remain, "");
  console.log(remain, p);
};

// Utility function to update an element's content and style
function updateElement(elementId, content, color) {
  const element = document.getElementById(elementId);
  element.innerHTML = content;
  if (color) {
    element.style.color = color;
  }
}
