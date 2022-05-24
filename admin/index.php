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

                echo "<script>clear_form();</script>";

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
    <!-- CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <link rel="stylesheet" href="admin-css/main-style.css">
    
    <!-- JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.slim.min.js" integrity="sha512-6ORWJX/LrnSjBzwefdNUyLCMTIsGoNP6NftMy2UAm1JBm6PRZCO1d7OHBStWpVFZLO+RerTvqX/Z9mBFfCJZ4A==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.5/dist/umd/popper.min.js" integrity="sha384-Xe+8cL9oJa6tN/veChSP7q+mnSPaj5Bcu9mPX5F5xIGE0DVittaqT5lorf0EI7Vk" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.min.js" integrity="sha384-kjU+l4N0Yf4ZOJErLsIcvOU2qSb74wXpOhqTvwVx3OElZRweTnQ6d31fXEoRD1Jy" crossorigin="anonymous"></script>
    <script src="admin-js/admin-index.js"></script>
    <title>Admin Page</title>
</head>
<body>
    <div class="container-fluid" style="padding-top: 10px;">
        <div class="row justify-content-md-center">
            <form method="POST" id="frmAdminLogin" class="col-4 align-items-center">
                <div class="mb-3">
                    <label for="txtUsername" class="form-label">Username</label>
                    <input type="text" class="form-control" placeholder="Your Username" name="txtUsername" id="txtUsername">
                </div>
                <div class="mb-3">
                    <label for="txtPassword" class="form-label">Password</label>
                    <input type="password" class="form-control" placeholder="Your Password" name="txtPassword" id="txtPassword">
                </div>
                <div class="mb-3 form-check">
                    <input type="checkbox" class="form-check-input" id="showPass" name="showPass" onclick="toggle()">
                    <label class="form-check-label" for="showPass">Show Password</label>
                </div>
                <button type="submit" class="btn btn-primary" name="btnLogin">Login</button>
            </form>
        </div>
    </div>
</body>

</html>