<?php require ('../admin-session.php'); ?>
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
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
    <title>Dashboard</title>
</head>
<body>
    <h1>Hello Welcome <?php echo $_SESSION['username'] ?> to Admin Panel!</h1>
    <form action="admin-logout.php" method="post"><input class="btn btn-dark" type="submit" name="btnLogout" value="Logout"></form>

    <br>
    <div class="container-fluid">
        <div class="nav">
        <ul class="nav nav-pills">
            <li class="nav-item">
                <a class="nav-link" href="../admin-panel.php">Dashboard</a>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link" data-bs-toggle="dropdown" href="#" role="button">Contents</a>
                <ul class="dropdown-menu">
                <li><a class="dropdown-item" href="#">Home</a></li>
                <li><a class="dropdown-item" href="#">About</a></li>
                <li><a class="dropdown-item" href="#">Subscription</a></li>
                <li><a class="dropdown-item" href="#">Upload</a></li>
                <li><a class="dropdown-item" href="#">Error (404)</a></li>
                </ul>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">Submissions</a>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link active" data-bs-toggle="dropdown" href="#" role="button">Accounts</a>
                <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="#">My Profile</a></li>
                    <li><a class="dropdown-item" href="#">View Accounts</a></li>
                    <li><a class="dropdown-item" href="#">Update Accounts</a></li>
                    <li><a class="dropdown-item" href="#">Delete Accounts</a></li>
                </ul>
            </li>
        </ul>
        </div>
    </div>
</body>
</html>