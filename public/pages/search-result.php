<?php
    require ("../php/public-db.php");


    if (isset($_GET['btn_search'])) {
        $search_val = $_GET['search_bar'];
    }

    $search_result = mysqli_query($CON,"SELECT pu.idtblphotouploads, pu.photo_name, pu.creator_id, display_photo, ac.fname, ac.lname, pu.title, pu.tags, pu.location
        FROM tblphotouploads pu
          INNER JOIN tblaccounts ac ON pu.creator_id = ac.idtblaccounts
          INNER JOIN tbladdinfo ai ON pu.creator_id = ai.idtblaccounts
        WHERE title LIKE '%".$search_val."%' OR tags LIKE '%".$search_val."%';");
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
    <link rel="stylesheet" href="../css/header.css">
    <link rel="stylesheet" href="../css/card-group.css">

    <title>Pixcover</title>
</head>
<body>
    <style>
        .offcanvas-top {
            width: 100%;
            background-color: rgba(255, 255, 255, 0.25);
        }
    </style>
    <div class="main-container container-fluid">
        <nav class="navbar fixed-top bg-white">
            <div class="container-fluid ms-5 me-5">
                <div class="col-2">
                    <a class="navbar-brand" href="../index.php"><img src="images/Pixcover Geen Symol.png" alt="Pixcover-Logo" width="50" height="50" class="d-inline-block align-text-center"> Pixcover</a>
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
                            <a class="nav-link" href="#" id="profStat" onclick="indexCheckStatus()";><?php require('../php/session-changeStatus.php'); ?></a>
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
        <style type="text/css">
            .headersearch > .row > h1 {
                color: #007f5f;
                padding-left: 50px;
            }
            .black-btn button{
                color: #252627;
                background: none;
                border: 1px solid #252627;
            }
            .black-btn button:hover {
                color: #fff9fb;
                background-color: #252627;
                border: none;
            }
            .filter-btn button {
                color: #fff9fb;
                background-color: #252627;
                border: none;
            }
            .filter-btn button:hover {
                color: #fff9fb;
                background-color: #252627;
                border: none;
            }

        </style>
        <div class="row" style="margin-top: 100px;">
            <div class="headersearch col">
                <div class="row justify-content-center h-100">
                    <h1>Search Result for "<?php echo $search_val ?>"</h1>
                </div>
            </div>
        </div>
        <div class="row pt-5 ps-5 pe-5">
            <div class="col-md-1 black-btn">
                <button id="btnPhotos" type="button" class="btn btn-success">
                  Photos
                </button>
            </div>
            <div class="col-md-1 black-btn">
                <button id="btnVideos" type="button" class="btn btn-success">
                  Videos
                </button>
            </div>
            <div class="col-md-1 black-btn">
                <button id="btnUsers" type="button" class="btn btn-success">
                  Users
                </button>
            </div>
            <div class="col-md-1 ms-auto filter-btn">
                <div class="btn-group" role="group">
                    <button id="btnGroupDrop1" type="button" class="btn dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                      Filter
                    </button>
                    <ul class="dropdown-menu" aria-labelledby="btnGroupDrop1">
                      <li><a class="dropdown-item" href="#">By Latest</a></li>
                      <li><a class="dropdown-item" href="#">By Trending</a></li>
                    </ul>
                </div>
            </div>
        </div>

        <form id="frm_img" method="GET">
        <div class="row ms-3 me-3 pt-3 grp-masonry" data-masonry='{"percentPosition": true }'>
        <?php while ($ROW = mysqli_fetch_array($search_result)) { ?>
            <div class="col-lg-4 col-md-6 col-6">
                <div class="card image">
                    <img src="<?php echo '../accounts/photos_preview/'.$ROW['photo_name']; ?>" alt="<?php echo $ROW['title'].' by '.$ROW['lname']; ?>" id="<?php echo $ROW['idtblphotouploads']; ?>" class="card-img-top card-v photo_trigger" data-bs-toggle="offcanvas" data-bs-target="#offcanvas_photo">
                    <div class="more">
                        <div class="photographer-info">
                            <a href="<?php echo 'profile-visit.php?uid='.$ROW['creator_id']?>"><img id="img_avatar" src="<?php echo '../accounts/avatars/'.$ROW['display_photo']; ?>" alt="display-photo"></a>
                            <a href="<?php echo 'profile-visit.php?uid='.$ROW['creator_id']?>"><span id="fullname"><?php echo $ROW['fname'].' '.$ROW['lname']?></span></a>
                        </div>
                        <div class="icon-links">
                            <a href="#"><i class="fa-solid fa-heart"></i></a>
                            <a href="#"><i class="fa-solid fa-arrow-down"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        <?php } ?>
        </div>
        </form>

        <!-- Off Canvas when a photo was opened -->
        <div class="offcanvas offcanvas-top" tabindex="-1" id="offcanvas_photo" aria-labelledby="offcanvasTopLabel" style="height: 100vh;">
            <!-- <div class="offcanvas-header">
                <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
            </div> -->
            <div class="offcanvas-body" id="photo_detail">
                
            </div>
        </div>
    </div>
</body>
<!-- JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.5/dist/umd/popper.min.js" integrity="sha384-Xe+8cL9oJa6tN/veChSP7q+mnSPaj5Bcu9mPX5F5xIGE0DVittaqT5lorf0EI7Vk" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.min.js" integrity="sha384-kjU+l4N0Yf4ZOJErLsIcvOU2qSb74wXpOhqTvwVx3OElZRweTnQ6d31fXEoRD1Jy" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/masonry-layout@4.2.2/dist/masonry.pkgd.min.js" integrity="sha384-GNFwBvfVxBkLMJpYMOABq3c+d3KnQxudP/mGPkzpZSTYykLBNsZEnG2D9G/X/+7D" crossorigin="anonymous" async></script>
    <script src="https://kit.fontawesome.com/01b3ba1a59.js" crossorigin="anonymous"></script>
    <script src="../js/nav.js"></script>
    <script src="../js/public-script.js"></script>


    <script>
        $(document).ready(function(){
            $('.photo_trigger').on('click', function(e){
                var photo_id = $(this).attr('id');
                $.ajax({
                    method: "POST",
                    url: "../php/process-result.php",
                    data: {photo_id : photo_id},
                    success: function(data){
                        $('#photo_detail').html(data);
                    }
                });
                e.preventDefault();
            });
        });
    </script>
</html>