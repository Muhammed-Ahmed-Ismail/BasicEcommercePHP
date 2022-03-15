var email_field = document.getElementById("email");
var password_field = document.getElementById("password");
var email;
var password;

function validate() {
    email = email_field.value;
    password = password_field.value;
    
    if (email == "") {
        showText("email field cannot be empty");
    }
    else if (password == "") {
        showText("password field cannot be empty");
    }
    else /*check the db*/ {
        //login();
    }
}

function showText(text) {
    document.getElementById("validator-text").innerText = text;
    document.getElementById("validator-text").style.display = 'block';
}

password_field.onfocus = function () {
    document.getElementById("message").style.display = "block";
}

password_field.onkeyup = function () {
    password = password_field.value;
    var lowerCaseLetters = /[a-z]/g;
    if (password.match(lowerCaseLetters)) {
        letter.classList.remove("invalid");
        letter.classList.add("valid");
    } else {
        letter.classList.remove("valid");
        letter.classList.add("invalid");
    }

    var upperCaseLetters = /[A-Z]/g;
    if (password.match(upperCaseLetters)) {
        capital.classList.remove("invalid");
        capital.classList.add("valid");
    } else {
        capital.classList.remove("valid");
        capital.classList.add("invalid");
    }

    var numbers = /[0-9]/g;
    if (password.match(numbers)) {
        number.classList.remove("invalid");
        number.classList.add("valid");
    } else {
        number.classList.remove("valid");
        number.classList.add("invalid");
    }

    if (password.length >= 8) {
        len.classList.remove("invalid");
        len.classList.add("valid");
    } else {
        len.classList.remove("valid");
        len.classList.add("invalid");
    }
}