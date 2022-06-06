<?php 
	require('../public-db.php');

    if (isset($_POST['btnSignup'])) {
        if ($_POST['txtPassword'] === $_POST['txtConfirmPassword']) {
            $txt_date = date('m/d/Y');
            $txt_fname = $_POST['txtFname'];
            $txt_lname = $_POST['txtLname'];
            $txt_username = $_POST['txtUsername'];
            $txt_email = $_POST['txtEmail'];
            $txt_password = $_POST['txtPassword'];
            
            mysqli_query($CON, "INSERT INTO tblaccounts(reg_date, fname, lname, username, email, password) VALUES('$txt_date','$txt_fname','$txt_lname','$txt_username','$txt_email','$txt_password');");

            echo '<script> alert("Sucessfully Added!") </script>';
            echo '<script> window.location.href = "../../pages/profile.php" </script>';
        }
        else {
            echo '<script> alert("Password and Confirm Password does not match!") </script>';
            echo '<script> window.location.href = "../../pages/signup.html" </script>';
        }
    }
    else {
        echo '<script> window.location.href = "../../pages/signup.html" </script>';
    }
 ?>