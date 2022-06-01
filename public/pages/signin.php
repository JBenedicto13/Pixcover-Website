<?php
    require ('../php/public-db.php');

    session_start();

    if ($_SESSION['status'] == "invalid" || empty($_SESSION['status'])) {
        $_SESSION['status'] == "invalid";
    } else {
        echo "<script>window.location.href = '../index.html'</script>";
    }

    if (isset($_POST['btnSignin'])) {
        $txt_usernameemail = trim($_POST['txtUsernameEmail']);
        $txt_password = trim($_POST['txtPassword']);

        if (empty($txt_usernameemail) || empty($txt_password)) {
            echo "<script>alert('Please fill up all fields.');</script>";
        } else {
            
            $queryValidate = "SELECT * FROM tblaccounts WHERE username = '$txt_usernameemail' AND password = '$txt_password' OR email = '$txt_usernameemail' AND password = '$txt_password'";
            $sqlValidate = mysqli_query($CON, $queryValidate);
            $rowValidate = mysqli_fetch_assoc($sqlValidate);

            if (mysqli_num_rows($sqlValidate) > 0) {
                $_SESSION['status'] = 'valid';
                $_SESSION['username'] = $rowValidate['username'];

                echo "<script>clear_form();</script>";

                echo "<script>window.location.href = 'profile.php'</script>";
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

    <link rel="stylesheet" href="../css/index.css">
    <link rel="stylesheet" href="../css/nav.css">
    <link rel="stylesheet" href="../css/registration.css">

    <!-- JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.slim.min.js" integrity="sha512-6ORWJX/LrnSjBzwefdNUyLCMTIsGoNP6NftMy2UAm1JBm6PRZCO1d7OHBStWpVFZLO+RerTvqX/Z9mBFfCJZ4A==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.5/dist/umd/popper.min.js" integrity="sha384-Xe+8cL9oJa6tN/veChSP7q+mnSPaj5Bcu9mPX5F5xIGE0DVittaqT5lorf0EI7Vk" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.min.js" integrity="sha384-kjU+l4N0Yf4ZOJErLsIcvOU2qSb74wXpOhqTvwVx3OElZRweTnQ6d31fXEoRD1Jy" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/masonry-layout@4.2.2/dist/masonry.pkgd.min.js" integrity="sha384-GNFwBvfVxBkLMJpYMOABq3c+d3KnQxudP/mGPkzpZSTYykLBNsZEnG2D9G/X/+7D" crossorigin="anonymous" async></script>
    <script src="https://kit.fontawesome.com/01b3ba1a59.js" crossorigin="anonymous"></script>
    <script src="../js/public-script.js"></script>

    <title>Pixcover | Signin</title>
</head>
<body>
    <div class="main-container container-fluid">
        <nav class="navbar fixed-top bg-white">
            <div class="container-fluid ms-5 me-5">
                <div class="col-2">
                    <a class="navbar-brand" href="#"><img src="../images/Pixcover Geen Symol.png" alt="Pixcover-Logo" width="50" height="50" class="d-inline-block align-text-center"> Pixcover</a>
                </div>
                <div class="col-6">
                    <form class="d-flex" role="search">
                        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                        <button class="btn btn-outline-success" type="submit">Search</button>
                    </form>
                </div>
                <div class="col-2">
                    <div class="row justify-content-center">
                        <div class="col d-flex align-items-center nav-text">
                            <a class="nav-link" href="#">Join</a>
                        </div>
                        <div class="col d-flex align-items-center nav-text">
                            <a class="nav-link" href="profile.php">Profile</a>
                        </div>
                        <div class="col d-flex align-items-center">
                            <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar">
                                <span><i class="fa-solid fa-bars"></i></i></span>
                            </button>
                        </div>
                    </div>
                </div>
                <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasNavbar" aria-labelledby="offcanvasNavbarLabel">
                    <div class="offcanvas-header">
                        <h5 class="offcanvas-title" id="offcanvasNavbarLabel">Pixcover</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                    </div>
                    <div class="offcanvas-body">
                    <ul class="navbar-nav justify-content-end flex-grow-1 pe-3">
                        <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="../index.html">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Join</a>
                        </li>
                        <li class="nav-item">
                          <a class="nav-link" href="profile.php">Profile</a>
                        </li>
                        <li class="nav-item">
                          <a class="nav-link" href="aboutus.html">About</a>
                      </li>
                    </ul>
                    <form class="d-flex" role="search">
                        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                        <button class="btn btn-outline-success" type="submit">Search</button>
                    </form>
                    </div>
                </div>
            </div>
        </nav>
        <div class="row justify-content-center" style="height:720px;">
          <div class="col-md-4 sign-div">
            <h2>Signin</h2>
            <form method="POST" class="row g-3 frmSign">
              <div class="col-12">
                <label for="txtUsernameEmail" class="form-label">Username or Email</label>
                <input type="text" class="form-control" id="txtUsernameEmail" placeholder="Username or Email" name="txtUsernameEmail">
              </div>
              <div class="col-12">
                <div class="row">
                    <div class="col">
                        <label for="txtPassword" class="form-label">Password</label>
                    </div>
                    <div class="col text-end">
                        <a class="forgot" href="#"><p>Forgot your password?</p></a>
                    </div>
                </div>
                <input type="password" class="form-control" id="txtPassword" placeholder="Password" name="txtPassword">
              </div>
              
              <div class="col-md-12 text-center">
                <button type="submit" class="btn btn-success btnSignin" name="btnSignin">Sign in</button>
                <a class="pass-sign" href="signup.html"><p>Doesn't have an account yet?</p></a>
              </div>
            </form>
          </div>
        </div>
    </div>
</body>
</html>