<?php
    require ('../admin-session.php');
    require ('../admin-database.php');
    require ('view-accounts.php');

    $adminaccs_result = mysqli_query($CON,"SELECT * FROM tbladminaccs");

    $txt_ID = "";
    $txt_Username = "";
    $txt_Password = "";
    $txt_Email = "";
    $txt_Display_Photo = "";



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
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
    <title>Manage Accounts</title>
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
                    <li><a class="dropdown-item" href="#">Manage All Accounts</a></li>
                    <li><a class="dropdown-item" href="profile.php">My Profile</a></li>
                </ul>
            </li>
        </ul>
        </div>
        <div class="table-responsive">
            <table class="table">
                <thead class="table-light">
                    <td>ID</td>
                    <td>Username</td>
                    <td>Password</td>
                    <td>Email</td>
                    <td>Type</td>
                    <td>Display Photo</td>
                    <td colspan="2">Manage</td>
                </thead>
                <tbody>
                    <?php while ($ROW = mysqli_fetch_array($adminaccs_result)) { ?>
                    <tr>
                        <td><?php echo $ROW['idtbladminaccs']; ?></td>
                        <td><?php echo $ROW['username']; ?></td>
                        <td><?php echo $ROW['password']; ?></td>
                        <td><?php echo $ROW['email']; ?></td>
                        <td><?php echo $ROW['type']; ?></td>
                        <td><?php echo $ROW['display_photo']; ?></td>
                        <td><a href="#">Edit</a></td>
                        <td>
                            <form action="delete-account.php" method="POST">
                                <input type="submit" name="btnDelete" value="Delete">
                                <input type="hidden" name="btnDeleteId" value="<?php echo $ROW['idtbladminaccs']; ?>">
                            </form>
                        </td>
                    </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>

        <!-- Delete Confirmation Modal -->
        <div class="modal fade" id="confirmDelete" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="staticBackdropLabel">Modal title</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        ...
                    </div>
                    <div class='modal-footer' style='background-color:#1F4E78;'>
                        <a class='btn btn-danger'> Delete</a>
                    </div>
                </div>
            </div>
        </div>

    </div>
</body>
</html>