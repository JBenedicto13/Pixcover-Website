function toggle() {
    var temp = document.getElementById('txtPassword');
    if (temp.type === "password") {
        temp.type = "text";
    }
    else {
        temp.type = "password";
    }
}

function clear_form() {
    var username = document.getElementById('txtUsername');
    var password = document.getElementById('txtPassword');

    username.value = "";
    password.value = "";
}