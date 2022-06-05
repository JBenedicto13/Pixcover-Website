function indexCheckStatus() {
    var varprofStat = document.getElementById('profStat');
    if (varprofStat.innerText == "Signin") {
        window.location.href = 'pages/signin.php';
    } else {
        window.location.href = 'pages/profile.php';
    }
}

function checkStatus() {
    var varprofStat = document.getElementById('profStat');
    if (varprofStat.innerText == "Signin") {
        window.location.href = '../pages/signin.php';
    } else {
        window.location.href = '../pages/profile.php';
    }
}