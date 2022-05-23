<?php
    require ('admin-database.php');

    session_start();

    if ($_SESSION['status'] == "invalid" || empty($_SESSION['status'])) {
        $_SESSION['status'] == "invalid";
    } else {
        echo "<script>window.location.href = 'admin-panel.php'</script>";
    }

    if (isset($_POST['btnLogin'])) {
        $txt_username = trim($_POST['txtUsername']);
        $txt_password = trim($_POST['txtPassword']);

        if (empty($txt_username) || empty($txt_password)) {
            echo "<script>alert('Please fill up all fields.');</script>";
        } else {
            
            $queryValidate = "SELECT * FROM tbladminaccs WHERE username = '$txt_username' AND password = '$txt_password'";
            $sqlValidate = mysqli_query($CON, $queryValidate);
            $rowValidate = mysqli_fetch_assoc($sqlValidate);

            if (mysqli_num_rows($sqlValidate) > 0) {
                $_SESSION['status'] = 'valid';
                $_SESSION['username'] = $rowValidate['username'];

                // echo "<script>clear_form();</script>";

                echo "<script>window.location.href = 'admin-panel.php'</script>";
            } else {
                $_SESSION['status'] = 'invalid';
                echo "Invalid Credentials";
            }
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="admin-css/main-style.css">
    <title>Admin Page</title>
</head>
<body>
    <div class="container-fluid" style="padding-top: 10px;">
        <div class="row justify-content-md-center">
            <form method="POST" id="frmAdminLogin" class="col-4 align-items-center">
                <div class="mb-3">
                    <label for="txtUsername" class="form-label">Username</label>
                    <input type="text" class="form-control" placeholder="Your Username" name="txtUsername">
                </div>
                <div class="mb-3">
                    <label for="txtPassword" class="form-label">Password</label>
                    <input type="text" class="form-control" placeholder="Your Password" name="txtPassword">
                </div>
                <div class="mb-3 form-check">
                    <input type="checkbox" class="form-check-input" id="showPass">
                    <label class="form-check-label" for="showPass">Show Password</label>
                </div>
                <button type="submit" class="btn btn-primary" name="btnLogin">Login</button>
            </form>
        </div>
    </div>
</body>
</html>