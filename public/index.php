<?php
    require ("php/public-db.php");

    $home_result = mysqli_query($CON,"SELECT pu.idtblphotouploads, pu.photo_name, pu.creator_id, display_photo, ac.fname, ac.lname, pu.title, pu.tags, pu.location
    FROM tblphotouploads pu,tblaccounts ac,tbladdinfo ai
    WHERE ac.idtblaccounts = pu.creator_id AND pu.creator_id = ai.idtblaccounts
    ORDER BY RAND()");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    
    <link rel="stylesheet" href="css/index.css">
    <link rel="stylesheet" href="css/nav.css">
    <link rel="stylesheet" href="css/header.css">
    <link rel="stylesheet" href="css/card-group.css">

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
                    <a class="navbar-brand" href="index.php"><img src="images/Pixcover Geen Symol.png" alt="Pixcover-Logo" width="50" height="50" class="d-inline-block align-text-center">Pixcover</a>
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
                            <a class="nav-link" href="#" id="profStat" onclick="indexCheckStatus()";><?php require('php/session-changeStatus.php'); ?></a>
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
                        <a class="nav-link active" aria-current="page" href="index.php">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="pages/subscribe.php">Join</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="pages/profile.php">Profile</a>
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
            <div class="header col">
                <div class="row justify-content-center h-100">
                    <div class="card col-lg-6 m-auto" style="background: none; border: none;">
                            <div class="card-body">
                                <form method="GET" action="pages/search-result.php" class="form-inline d-flex" role="search">
                                    <input type="text" class="form-control me-2" name="search_bar" id="search_bar" placeholder="Search">
                                    <button type="submit" class="btn btn-success" name="btn_search" id="btn_search"><i class="fa-solid fa-magnifying-glass"></i></button>
                                </form>
                            </div>
                            <div class="card-body position-absolute" style="margin-top: 60px; width: 90%; z-index: 1;">
                                <div class="list-group list-group-item-action" id="search_result" style="background-color: #fff;">
                                </div>
                            </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row justify-content-end pt-5 ps-5 pe-5">
            <div class="col-md-1">
                <div class="btn-group" role="group">
                    <button id="btnGroupDrop1" type="button" class="btn btn-primary dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
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
        <?php while ($ROW = mysqli_fetch_array($home_result)) { ?>
            <div class="col-lg-4 col-md-6 col-6">
                <div class="card image">
                    <img src="<?php echo 'accounts/photos_preview/'.$ROW['photo_name']; ?>" alt="<?php echo $ROW['title'].' by '.$ROW['lname']; ?>" id="<?php echo $ROW['idtblphotouploads']; ?>" class="card-img-top card-v photo_trigger" data-bs-toggle="offcanvas" data-bs-target="#offcanvas_photo">
                    <div class="more">
                        <div class="photographer-info">
                            <a href="<?php echo 'pages/profile-visit.php?uid='.$ROW['creator_id']?>"><img id="img_avatar" src="<?php echo 'accounts/avatars/'.$ROW['display_photo']; ?>" alt="display-photo"></a>
                            <a href="<?php echo 'pages/profile-visit.php?uid='.$ROW['creator_id']?>"><span id="fullname"><?php echo $ROW['fname'].' '.$ROW['lname']?></span></a>
                        </div>
                        <div class="icon-links">
                            <a href="#"><i class="fa-solid fa-heart"></i></a>
                            <a href="#" id="dl-icon" data-bs-toggle="modal" data-bs-target="#dl-modal"><i class="fa-solid fa-arrow-down"></i></a>
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

        <!-- Modal -->
        <div class="modal fade" id="dl-modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Thank the creator!</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body row dlmodal-body">
                        
                    </div>
                </div>
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
    <script src="js/nav.js"></script>
    <script src="js/public-script.js"></script>
    <script>
        $(document).ready(function(){
            $('.photo_trigger').on('click', function(e){
                var photo_id = $(this).attr('id');
                $.ajax({
                    method: "POST",
                    url: "php/process.php",
                    data: {photo_id : photo_id},
                    success: function(data){
                        $('#photo_detail').html(data);
                    }
                });
                e.preventDefault();
            });

            $('#search_bar').keyup(function(){
                var Search = $('#search_bar').val();
                if (Search != "") {
                    $.ajax({
                        url: 'php/searchprocess.php',
                        method: 'POST',
                        data: {searchData : Search},
                        success: function(response){
                            $('#search_result').html(response);
                        }
                    })
                }
                else {
                    $('#search_result').html('');
                }

                $(document).on('click','a',function(){
                    $('#search_bar').val($(this).text());
                    $('#search_result').html('');
                });
            });

            $('.icon-links > #dl-icon').on('click', function(){
                var photo_id = $('.photo_trigger').attr('id');
                console.log("Checkpoint1");
                $.ajax({
                    method: "POST",
                    url: "php/download-img.php",
                    data: {photo_id : photo_id},
                    success: function(data){
                        $('.dlmodal-body').html(data);
                        console.log("Checkpoint1.1");
                    }
                })
            });
        });
    </script>
</html>