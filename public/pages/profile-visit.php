<?php
    require ('../php/public-db.php');

    session_start();
    if ($_SESSION['status'] == "invalid" || empty($_SESSION['status'])) {
        $_SESSION['status'] = "invalid";
        unset($_SESSION['username']);
        
    } else {
        echo "<script>
            var status = '".$_SESSION['status']."';
            if (status === 'valid') {
                
            } else {
                document.getElementById('navProfile').innerHTML = 'Signin/Signup';
            }
        </script>";
    }
    $getuserId = $_SESSION['userid'];
    $getfollowId = $_GET['uid'];
    
    $accounts_result = mysqli_query($CON,"SELECT * FROM tblaccounts a
    JOIN tbladdinfo ai ON a.idtblaccounts = ai.idtblaccounts
    JOIN tblfollow f ON a.idtblaccounts = f.user_id
    WHERE a.idtblaccounts = '".$getfollowId."';
    ");

    $userid_result = mysqli_query($CON,"SELECT follower_id FROM tblfollow WHERE user_id = ".$getuserId.";");
    $followid_result = mysqli_query($CON,"SELECT * FROM tblfollow WHERE user_id = ".$getfollowId.";");

    $ROWuser = mysqli_fetch_array($userid_result);
    $ROWfollow = mysqli_fetch_array($followid_result);

    $userId = $ROWuser['follower_id'];
    $followId = $ROWfollow['follower_id'];

    $followingNum = $ROWfollow['followingNum'];
    $followersNum = $ROWfollow['followersNum'];
    $following = $ROWfollow['following'];

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">

    <link rel="stylesheet" type="text/css" href="../css/index.css">
    <link rel="stylesheet" type="text/css" href="../css/nav.css">
    <link rel="stylesheet" type="text/css" href="../css/card-group.css">
    <link rel="stylesheet" type="text/css" href="../css/profile-style.css">

    <title>Pixcover | Profile</title>
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
            <div class="header col">
                <div class="row justify-content-center">
                    <div class="col">
                        <div class="card avatar-card justify-content-center">
                        <?php while ($ROW = mysqli_fetch_array($accounts_result)) { ?>
                            <div class="avatar-image">
                                <img src="<?php echo '../accounts/avatars_preview/'.$ROW['display_photo']; ?>" class="card-img-top" alt="...">
                            </div>
                            <div class="card-body pt-3">
                                <h5 class="card-title text-uppercase text-center"><?php echo $ROW['fname'].' '.$ROW['lname']?></h5>
                                <p id="bio-content">
                                    <?php echo $ROW['short_bio']?>
                                </p>
                                <a class="btn btn-success" id="btnFollow">Follow</a>
                                <a href="#" class="btn btn-success">Donate</a>
                        <?php } ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row justify-content-start mt-5 ms-5 me-5">
            <div class="col">
                <ul class="nav nav-pills">
                    <li class="nav-item">
                      <a class="nav-link active" aria-current="page" href="#">Download <span class="badge text-bg-light rounded-pill">0</span></a></a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" href="#">Followers <span id="followersbadge" class="badge text-bg-dark rounded-pill"><?php echo $followersNum ?></span></a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" href="#">Following <span class="badge text-bg-dark rounded-pill"><?php echo $followingNum ?></span></a>
                    </li>
                </ul>
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
    <script type="text/javascript">

            $(document).ready(function(){
                // $('.nav-pills > li > .active').removeClass('active');
                var searchfollowing = "<?php echo $followId ?>";
                console.log(searchfollowing);
                var followinglist = "<?php echo $following ?>";
                console.log(followinglist);
                var found = followinglist.indexOf(searchfollowing);
                console.log(found);
                if (found == -1) {
                    $('#btnFollow').html('Follow');
                } else {
                    $('#btnFollow').html('Following');
                }

                $('#btnFollow').on('click', function(){
                    var btnFollow = $(this);
                    if (btnFollow.html() === "Follow"){
                        var btnState = "Follow";
                        var othersFollowId = "<?php echo $followId ?>";
                        var myFollowId = "<?php echo $userId ?>"
                        $.ajax({
                            method: "POST",
                            url: "../php/accounts-php/public-follow.php",
                            data: {myFollowId:myFollowId, othersFollowId:othersFollowId, state:btnState},
                            success: function(response){
                                var data = JSON.parse(response);
                                $('#btnFollow').text('Following');
                                $('#followersbadge').html(<?php echo $followersNum+1 ?>);
                            }
                        })
                    }
                    else {
                        var btnState = "Following";
                        var othersFollowId = "<?php echo $followId ?>";
                        var myFollowId = "<?php echo $userId ?>"
                        $.ajax({
                            method: "POST",
                            url: "../php/accounts-php/public-follow.php",
                            data: {myFollowId:myFollowId, othersFollowId:othersFollowId, state:btnState},
                            success: function(response){
                                var data = JSON.parse(response);
                                $('#btnFollow').text('Follow');
                                $('#followersbadge').html(<?php echo $followersNum-1 ?>);
                            }
                        })
                    }
                });
            });
    </script>
</html>