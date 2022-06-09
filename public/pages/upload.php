<?php
    require ('../php/public-db.php');
    session_start();
    
    $txt_Id = $_SESSION['userid'];
    
    $accounts_result = mysqli_query($CON,"
    SELECT idtblaccounts, fname, lname FROM tblaccounts
    WHERE idtblaccounts = '$txt_Id';
    ");
    $idtblphotouploads_result = mysqli_query($CON,"
    SELECT idtblphotouploads FROM tblphotouploads
    ORDER BY idtblphotouploads DESC LIMIT 1;");
    
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
    <link rel="stylesheet" href="../css/upload.css">

    <!-- JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.slim.min.js" integrity="sha512-6ORWJX/LrnSjBzwefdNUyLCMTIsGoNP6NftMy2UAm1JBm6PRZCO1d7OHBStWpVFZLO+RerTvqX/Z9mBFfCJZ4A==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.5/dist/umd/popper.min.js" integrity="sha384-Xe+8cL9oJa6tN/veChSP7q+mnSPaj5Bcu9mPX5F5xIGE0DVittaqT5lorf0EI7Vk" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.min.js" integrity="sha384-kjU+l4N0Yf4ZOJErLsIcvOU2qSb74wXpOhqTvwVx3OElZRweTnQ6d31fXEoRD1Jy" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/masonry-layout@4.2.2/dist/masonry.pkgd.min.js" integrity="sha384-GNFwBvfVxBkLMJpYMOABq3c+d3KnQxudP/mGPkzpZSTYykLBNsZEnG2D9G/X/+7D" crossorigin="anonymous" async></script>
    <script src="https://kit.fontawesome.com/01b3ba1a59.js" crossorigin="anonymous"></script>
    <script src="../js/upload.js"></script>

    <title>Pixcover | Upload</title>
</head>
<body>
    <div class="main-container container-fluid" style="padding-top: 10%;">
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
                            <a class="nav-link" href="subscribe.php">Join</a>
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
                            <a class="nav-link" href="subscribe.php">Join</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="profile.php">Profile</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="pages/aboutus.html">About</a>
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
        
        <div class="row">
            <div class="col-md-8 offset-md-2 conditions-div">
                <ul class="col-md-8 offset-md-2">
                    <li class="title"><h3>Upload Photos and Videos</h3></li>
                    <li>Your uploads will be distributed for free under the Pexels license. Learn more</li>
                    <li>To increase the chance of being featured, please ensure that your submissions meet our guidelines.</li>
                    <li>We'll review your submission. If it gets selected, you will receive an email notification and your content will be featured in our search.</li>
                </ul>
            </div>
        </div>
        <?php while ($ROW = mysqli_fetch_array($idtblphotouploads_result)) {
            $txt_idtblphotoupload = $ROW['idtblphotouploads'];
        } ?>
        <?php while ($ROW = mysqli_fetch_array($accounts_result)) { ?>
        <form action="../php/accounts-php/public-upload-photo.php" method="POST" enctype="multipart/form-data">
        <!-- photoupload ID -->
            <input type="hidden" name="photoupload_id" value="<?php echo $txt_idtblphotoupload; ?>">
            <input type="hidden" name="creator_id" value="<?php echo $ROW['idtblaccounts']; ?>">
            <input type="hidden" name="creator_fname" value="<?php echo $ROW['fname']; ?>">
            <input type="hidden" name="creator_lname" value="<?php echo $ROW['lname']; ?>">
        <div class="row">
            <div class="col-md-8 offset-md-2 upload-div">
                <div class="input-group mb-3 w-50 mx-auto">
                    <input class="form-control uploadContent" type="file" name="uploadContent" id="uploadContent" accept="video/*,image/*" onclick="check_file()">
                </div>
            </div>
        </div>
        
        <div class="row justify-content-center" id="contentInfo">
            <div class="col-md-4">
                <img src="" alt="file selected" id="chosen-image">
            </div>
            <div class="col-md-4">
                <div class="mb-3">
                    <label for="file_title" class="form-label">Title</label>
                    <input type="text" class="form-control" id="file_title" name="file_title" placeholder="Title">
                </div>
                <div class="mb-3">
                    <label for="file_tags" class="form-label">Tags</label>
                    <input type="text" class="form-control" id="file_tags" name="file_tags" placeholder="Tags">
                </div>
                <div class="mb-3">
                    <label for="file_location" class="form-label">Location</label>
                    <input type="text" class="form-control" id="file_location" name="file_location" placeholder="Location">
                </div>
            </div>
        </div>

       <div class="row">
            <div class="col-md-8 offset-md-2 upload-div">
                <input class="btn btn-primary btnUpload" type="submit" value="Upload" id="btnUpload" name="btnUpload">
            </div>
       </div>
       </form>
       <?php } ?>
       <br><br>
    </div>
</body>
</html>