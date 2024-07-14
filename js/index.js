function pressDown(){
    document.getElementById('button').style.transform = "translateY(0em)";
    document.getElementById('button').style.boxShadow = "0 0 0 0 white";
    document.getElementById('button').style.backgroundColor = "rgb(255, 63, 63)";
    document.getElementById('button').style.color = "white";
}

function defaultButtonSettings(){
    document.getElementById('button').style.transform = "translateY(0em)";
    document.getElementById('button').style.boxShadow = "0 0 0 0 white";
    document.getElementById('button').style.transitionDuration = "0.1s";
    document.getElementById('button').style.backgroundColor = "rgb(255, 166, 0)";
    document.getElementById('button').style.color = "black";
}

function hoverOverButton(){
    document.getElementById('button').style.transform = "translateY(-0.3em)";
    document.getElementById('button').style.boxShadow = "0em 0.25em 0em 0em rgb(44, 44, 44)";
    document.getElementById('button').style.backgroundColor = "rgb(255,215,0)";
}

let loginButton = document.getElementById('button');
loginButton.addEventListener('mousedown', pressDown);
loginButton.addEventListener('mouseleave', defaultButtonSettings);
loginButton.addEventListener('mouseover', hoverOverButton);