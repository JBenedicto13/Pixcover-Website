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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.slim.min.js" integrity="sha512-6ORWJX/LrnSjBzwefdNUyLCMTIsGoNP6NftMy2UAm1JBm6PRZCO1d7OHBStWpVFZLO+RerTvqX/Z9mBFfCJZ4A==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.5/dist/umd/popper.min.js" integrity="sha384-Xe+8cL9oJa6tN/veChSP7q+mnSPaj5Bcu9mPX5F5xIGE0DVittaqT5lorf0EI7Vk" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.min.js" integrity="sha384-kjU+l4N0Yf4ZOJErLsIcvOU2qSb74wXpOhqTvwVx3OElZRweTnQ6d31fXEoRD1Jy" crossorigin="anonymous"></script>
    <title>Profile</title>
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
                    <li><a class="dropdown-item" href="manage-accounts.php">Manage Accounts</a></li>
                    <li><a class="dropdown-item" href="#">My Profile</a></li>
                </ul>
            </li>
        </ul>
        </div>
    </div>
</body>
</html>