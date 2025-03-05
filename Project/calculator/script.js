let p = "";
function showNumber(text) {
    p += text;
    document.getElementById("row2").innerHTML = p;
}

const images = document.querySelectorAll('.img-border img');

// Create object mapping button IDs to symbol values from alt attributes
const buttonMap = {
    btn1: images[0].alt,
    btn2: images[1].alt, 
    btn3: images[2].alt,
    btn4: images[3].alt,
    btn5: images[4].alt,
    btn6: images[5].alt,
    btn7: images[6].alt,
    btn8: images[7].alt,
    btn9: images[8].alt,
    btn10: images[9].alt,
    btn11: images[10].alt,
    btn12: images[11].alt,
    btn13: images[12].alt,
    btn14: images[13].alt,
    btn15: images[14].alt,
    btn16: images[15].alt,
    btn17: images[16].alt,
    btn18: images[17].alt,
    btn19: images[18].alt
};

Object.entries(buttonMap).forEach([btnId, symbol]) => {
    document.getElementById(btnId).onclick = function() {
        if (btnId === "btn16") {
            p = "";
            document.getElementById("row2").innerHTML = "";
            document.getElementById("row1").innerHTML = "";
        }
        else if {
         showNumber(symbol);
        }
    
    }}

