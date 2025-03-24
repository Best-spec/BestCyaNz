let input_bar = document.getElementById("input_num");
let history = document.getElementById("history");
let answer = document.getElementById("answer");

// Get all the buttons
const buttons = document.querySelectorAll('.img-border');

// Create object mapping button IDs to symbol values from alt attributes
const buttonMap = {};
buttons.forEach(button => {
    buttonMap[button.id] = button.querySelector('img').alt;
});

// Add event listeners to each button
buttons.forEach(button => {
    button.addEventListener('click', () => {
        const buttonId = button.id;
        const buttonValue = buttonMap[buttonId];

        // Add the "active" class to the clicked button
        button.classList.add('active');

        // Remove the "active" class after a short delay (e.g., 100ms)
        setTimeout(() => {
            button.classList.remove('active');
        }, 100);

        if (buttonId === 'btn16') { // Clear button
            clearInput();
            input_bar.value = "0";
        } 
        else if (buttonId === 'btn19') { // Equals button
            calculate();
        } 
        else if (buttonId === 'mode') { 
            toggleMode();
        }
        else if (buttonId === 'btn2') {
            clickNumber("%");
        }
        else if (buttonId === 'btn3') {
            clickNumber("/");
        }
        else if (buttonId === 'btn4') {
            clickNumber("*");
        }
        else if (buttonId === 'btn8') {
            clickNumber("-");
        }
        else if (buttonId === 'btn12') {
            clickNumber("+");
        }
        else if (buttonId === 'btn18') {
            clickNumber(".");
        }
        else {
            if (input_bar.value === "0") {
                clearInput();
                clickNumber(buttonValue);
            } else {
                clickNumber(buttonValue);
            }
        }
    });
});

function clickNumber(text) {
    input_bar.value += text;
    console.log(input_bar.value);
}

function clearInput() {
    input_bar.value = "";
}

function calculate() {
    try {
        history.innerHTML = input_bar.value;
        answer.innerHTML = '= ' + math.evaluate(input_bar.value);
        input_bar.value = math.evaluate(input_bar.value);
    } catch (error) {
        input_bar.value = "Error";
    }
}

function deleteLast() {
    input_bar.value = input_bar.value.slice(0, -1);
}

function toggleMode() {
    let islight = document.body.classList.toggle("light-mode");

    // เปลี่ยนไอคอนของปุ่ม
        buttons.forEach(button => {
            button.className = islight ? "img-border light-mode" : "img-border dark-mode";
        }
    );

    // บันทึกโหมดใน Local Storage
    localStorage.setItem("theme", islight ? "light" : "dark");
}

// เช็คค่า Theme ที่เคยเลือกไว้เมื่อเปิดหน้าเว็บ
window.onload = function () {
    if (localStorage.getItem("theme") === "light") {
        document.body.classList.add("light-mode");
    }
};