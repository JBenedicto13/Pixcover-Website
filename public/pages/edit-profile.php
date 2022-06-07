<?php
    require ('../php/public-db.php');
    require ('../php/public-session.php');

    $txt_Id = $_SESSION['userid'];
    
    $accounts_result = mysqli_query($CON,"
    SELECT tblaccounts.idtblaccounts, fname, lname, email, gcash_num, short_bio, website, socsci_handles, location
    FROM tblaccounts
    JOIN tbladdinfo
    ON tblaccounts.idtblaccounts = tbladdinfo.idtblaccounts
    WHERE tblaccounts.idtblaccounts = '$txt_Id';
    ");
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
    <link rel="stylesheet" href="../css/card-group.css">
    <link rel="stylesheet" href="../css/profile.css">

    <!-- JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.slim.min.js" integrity="sha512-6ORWJX/LrnSjBzwefdNUyLCMTIsGoNP6NftMy2UAm1JBm6PRZCO1d7OHBStWpVFZLO+RerTvqX/Z9mBFfCJZ4A==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.5/dist/umd/popper.min.js" integrity="sha384-Xe+8cL9oJa6tN/veChSP7q+mnSPaj5Bcu9mPX5F5xIGE0DVittaqT5lorf0EI7Vk" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.min.js" integrity="sha384-kjU+l4N0Yf4ZOJErLsIcvOU2qSb74wXpOhqTvwVx3OElZRweTnQ6d31fXEoRD1Jy" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/masonry-layout@4.2.2/dist/masonry.pkgd.min.js" integrity="sha384-GNFwBvfVxBkLMJpYMOABq3c+d3KnQxudP/mGPkzpZSTYykLBNsZEnG2D9G/X/+7D" crossorigin="anonymous" async></script>
    <script src="https://kit.fontawesome.com/01b3ba1a59.js" crossorigin="anonymous"></script>

    <title>Pixcover | Edit Profile</title>
</head>
<body>
    <div class="main-container container-fluid">
        <nav class="navbar fixed-top bg-white">
            <div class="container-fluid ms-5 me-5">
                <div class="col-2">
                    <a class="navbar-brand" href="../index.php"><img src="../images/Pixcover Geen Symol.png" alt="Pixcover-Logo" width="50" height="50" class="d-inline-block align-text-center"> Pixcover</a>
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
                            <a class="nav-link" href="pages/subscribe.php">Join</a>
                        </div>
                        <div class="col d-flex align-items-center nav-text">
                            <a class="nav-link" href="profile.php" id="navProfile">Profile</a>
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
                        <a class="nav-link active" aria-current="page" href="../index.php">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="pages/subscribe.php">Join</a>
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
        
        <div class="row justify-content-center edit-row">
            <div class="col-md-4 b-guide edit-profile-div">
                <?php while ($ROW = mysqli_fetch_array($accounts_result)) { ?>
                    <style>
                        .btnUpdate {
                            background-color: #007f5f;
                            color: #fff9fb;
                            border: none;
                        }
                        .btnUpdate:hover {
                            background: none;
                            color: #007f5f;
                            border: 1px solid #007f5f;
                        }
                        .btnCancel {
                            background: none;
                            color: #007f5f;
                            border: 1px solid #007f5f;
                        }
                        .btnCancel:hover {
                            background: none;
                            color: #007f5f;
                            border: 1px solid #007f5f;
                        }
                        .avatar_img img{
                            height: 75px;
                            width: 75px;
                            border: none;
                            border-radius: 50%;
                        }
                        #upload-button {
                            border-color: #007f5f;
                        }
                    </style>
                <form action="../php/accounts-php/public-update-account.php" method="POST" class="row g-3">
                    <input type="hidden" id="updateId" name="updateId" value="<?php echo $ROW['idtblaccounts']; ?>">
                    <div class="col-12">
                        <div class="row">
                            <div class="col-md-3 text-center"><h5>Avatar</h5></div>
                        </div>
                        <div class="row">
                            <div class="col-md-3 avatar_img"><img src="" alt="display photo" id="chosen-image"></div>
                            <div class="col-md-9"><input type="file" class="form-control" id="upload-button" accept="image/*" onclick="change_dp()"></div>
                        </div>
                    </div>
                    <div class="col-md-6">
                      <label for="txtFname" class="form-label">First Name</label>
                      <input type="text" class="form-control" id="txtFname" name="edit-txtFname" value="<?php echo $ROW['fname']; ?>" placeholder="Add your first name">
                    </div>
                    <div class="col-md-6">
                      <label for="txtLname" class="form-label">Last Name</label>
                      <input type="text" class="form-control" id="txtLname" name="edit-txtLname" value="<?php echo $ROW['lname']; ?>" placeholder="Add your last name">
                    </div>
                    <div class="col-12">
                        <label for="txtEmail" class="form-label">Email</label>
                        <input type="email" class="form-control" id="txtEmail" name="edit-txtEmail" value="<?php echo $ROW['email']; ?>" placeholder="Add your email">
                      </div>
                    <div class="col-12">
                      <label for="txtGcashNum" class="form-label">GCash Number</label>
                      <input type="text" class="form-control" id="txtGcashNum" name="edit-txtGcashNum" value="<?php echo $ROW['gcash_num']; ?>" placeholder="09*********">
                    </div>
                    <div class="col-12">
                      <label for="txtShortBio" class="form-label">Short Bio</label>
                      <textarea class="form-control" id="txtShortBio" name="edit-txtShortBio" rows="3" placeholder="Tell something about yourself"><?php echo $ROW['short_bio']; ?></textarea>
                    </div>
                    <div class="col-12">
                        <label for="txtWebsite" class="form-label">Website</label>
                        <input type="url" class="form-control" id="txtWebsite" name="edit-txtWebsite" value="<?php echo $ROW['website']; ?>" placeholder="Add your website link">
                    </div>
                    <div class="col-12">
                        <label for="txtSocialMedia" class="form-label">Social Media Handles</label>
                        <input type="text" class="form-control" id="txtSocialMedia" name="edit-txtSocialMedia" value="<?php echo $ROW['socsci_handles']; ?>" placeholder="Add your social media handles">
                    </div>
                    <div class="col-12">
                        <label for="txtLocation" class="form-label">Location</label>
                        <input type="text" class="form-control" id="txtLocation" name="edit-txtLocation" value="<?php echo $ROW['location']; ?>" placeholder="Add your location">
                    </div>
                    <div class="col pt-3 text-end div-btn">
                      <button type="submit" class="btn btn-primary btnUpdate" name="btnUpdate">Update Profile</button>
                      <button type="submit" class="btn btn-primary btnCancel" name="btnCancel">Cancel</button>
                    </div>
                </form>
                <?php } ?>
            </div>
        </div>
    </div>
    <script src="../js/upload.js"></script>
</body>
</html>