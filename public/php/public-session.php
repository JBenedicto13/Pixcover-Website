<?php
    session_start();
    if ($_SESSION['status'] == "invalid" || empty($_SESSION['status'])) {
        $_SESSION['status'] = "invalid";
        unset($_SESSION['username']);
        echo "<script>window.location.href = '../index.php'</script>";
    } else {
        echo "<script>
            var status = ".$_SESSION['status'].";
            if (status === 'valid') {
                alert(status);
            } else {
                document.getElementById('navProfile').innerHTML = 'Signin/Signup';
            }
        </script>";
    }
?>