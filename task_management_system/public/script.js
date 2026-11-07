let typ = "password";
let eyeBtn = document.querySelector("#eyebtn");
let passwordInput = document.querySelector("#pass");
let eyeIcon = document.querySelector("#eye");
function eyeFun() {
    if (typ === "password") {
        passwordInput.type = 'text';
        eyeIcon.classList.remove('fa-eye-slash');
        eyeIcon.classList.add('fa-eye');
        typ = "text";
    }
    else {
        passwordInput.type = 'password';
        eyeIcon.classList.remove('fa-eye');
        eyeIcon.classList.add('fa-eye-slash');
        typ = "password";
    }
}


let brdc= document.querySelector("body");
let btn= document.querySelector("#bgcbtn");
let modeIcon= document.querySelector("#mode");
let mode= "light";
function bgcfun() {
    if(mode === "light")
    {
        mode= "dark";
        brdc.style.backgroundColor= "black";
        modeIcon.classList.remove('fa-sun');
        modeIcon.classList.remove('fa-spin');
        modeIcon.classList.add('fa-moon');
        modeIcon.classList.add('fa-fade');
        document.getElementById("headTitle").style.color= "white";
        document.getElementById("printIcon").style.color= "white";
    }
    else
    {
        mode= "light";
        brdc.style.backgroundColor= "white";
        modeIcon.classList.remove('fa-moon');
        modeIcon.classList.remove('fa-fade');
        modeIcon.classList.add('fa-sun');
        modeIcon.classList.add('fa-spin');
        document.getElementById("headTitle").style.color= "black";
        document.getElementById("printIcon").style.color= "black";
    }
}