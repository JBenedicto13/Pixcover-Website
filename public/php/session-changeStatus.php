<?php 
    session_start();
    if ($_SESSION['status'] == "invalid" || empty($_SESSION['status'])) {
        $_SESSION['status'] = "invalid";
        echo "<script>document.getElementById('profStat').innerText = 'Signin';</script>";
    }
    else {
        echo "<script>document.getElementById('profStat').innerText = 'Profile';</script>";
    }
?>