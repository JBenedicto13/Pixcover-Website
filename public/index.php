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

    <!-- JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.slim.min.js" integrity="sha512-6ORWJX/LrnSjBzwefdNUyLCMTIsGoNP6NftMy2UAm1JBm6PRZCO1d7OHBStWpVFZLO+RerTvqX/Z9mBFfCJZ4A==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.5/dist/umd/popper.min.js" integrity="sha384-Xe+8cL9oJa6tN/veChSP7q+mnSPaj5Bcu9mPX5F5xIGE0DVittaqT5lorf0EI7Vk" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.min.js" integrity="sha384-kjU+l4N0Yf4ZOJErLsIcvOU2qSb74wXpOhqTvwVx3OElZRweTnQ6d31fXEoRD1Jy" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/masonry-layout@4.2.2/dist/masonry.pkgd.min.js" integrity="sha384-GNFwBvfVxBkLMJpYMOABq3c+d3KnQxudP/mGPkzpZSTYykLBNsZEnG2D9G/X/+7D" crossorigin="anonymous" async></script>
    <script src="https://kit.fontawesome.com/01b3ba1a59.js" crossorigin="anonymous"></script>
    <script src="admin-js/admin-index.js"></script>

    <title>Pixcover</title>
</head>
<body>
    <div class="main-container container-fluid">
        <nav class="navbar fixed-top bg-white">
            <div class="container-fluid ms-5 me-5">
                <div class="col-2">
                    <a class="navbar-brand" href="index.php"><img src="images/Pixcover Geen Symol.png" alt="Pixcover-Logo" width="50" height="50" class="d-inline-block align-text-center"> Pixcover</a>
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
                            <a class="nav-link" href="pages/profile.php">Profile</a>
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
                            <a class="nav-link" href="#">Join</a>
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
                    <div class="col-6 align-self-center">
                        <form class="d-flex" role="search">
                            <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                            <button class="btn btn-search" type="submit">Search</button>
                        </form>
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

        <div class="row ms-3 me-3 pt-3" data-masonry='{"percentPosition": true }'>
            <div class="col-lg-4 col-md-6 col-6">
                <div class="card image">
                    <img src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/82/orange-tree.jpg" alt="" class="card-img-top card-v">
                    <div class="more">
                        <div class="photographer-info">
                            <a href="#"><img src="images/samplebg.jpg" alt=""></a>
                            <a href="#"><span>Photographer's Name</span></a>
                        </div>
                        <div class="icon-links">
                            <a href="#"><i class="fa-solid fa-heart"></i></a>
                            <a href="#"><i class="fa-solid fa-arrow-down"></i></a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 col-6">
                <div class="card image">
                    <img src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/82/submerged.jpg" alt="" class="card-img-top card-v">
                    <div class="more">
                        <div class="photographer-info">
                            <a href="#"><img src="images/samplebg.jpg" alt=""></a>
                            <a href="#"><span>Photographer's Name</span></a>
                        </div>
                        <div class="icon-links">
                            <a href="#"><i class="fa-solid fa-heart"></i></a>
                            <a href="#"><i class="fa-solid fa-arrow-down"></i></a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 col-6">
                <div class="card image">
                    <img src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/82/look-out.jpg" alt="" class="card-img-top card-v">
                    <div class="more">
                        <div class="photographer-info">
                            <a href="#"><img src="images/samplebg.jpg" alt=""></a>
                            <a href="#"><span>Photographer's Name</span></a>
                        </div>
                        <div class="icon-links">
                            <a href="#"><i class="fa-solid fa-heart"></i></a>
                            <a href="#"><i class="fa-solid fa-arrow-down"></i></a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 col-6">
                <div class="card image">
                    <img src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/82/one-world-trade.jpg" alt="" class="card-img-top card-v">
                    <div class="more">
                        <div class="photographer-info">
                            <a href="#"><img src="images/samplebg.jpg" alt=""></a>
                            <a href="#"><span>Photographer's Name</span></a>
                        </div>
                        <div class="icon-links">
                            <a href="#"><i class="fa-solid fa-heart"></i></a>
                            <a href="#"><i class="fa-solid fa-arrow-down"></i></a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 col-6">
                <div class="card image">
                    <img src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/82/drizzle.jpg" alt="" class="card-img-top card-v">
                    <div class="more">
                        <div class="photographer-info">
                            <a href="#"><img src="images/samplebg.jpg" alt=""></a>
                            <a href="#"><span>Photographer's Name</span></a>
                        </div>
                        <div class="icon-links">
                            <a href="#"><i class="fa-solid fa-heart"></i></a>
                            <a href="#"><i class="fa-solid fa-arrow-down"></i></a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 col-6">
                <div class="card image">
                    <img src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/82/cat-nose.jpg" alt="" class="card-img-top card-v">
                    <div class="more">
                        <div class="photographer-info">
                            <a href="#"><img src="images/samplebg.jpg" alt=""></a>
                            <a href="#"><span>Photographer's Name</span></a>
                        </div>
                        <div class="icon-links">
                            <a href="#"><i class="fa-solid fa-heart"></i></a>
                            <a href="#"><i class="fa-solid fa-arrow-down"></i></a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 col-6">
                <div class="card image">
                    <img src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/82/contrail.jpg" alt="" class="card-img-top card-v">
                    <div class="more">
                        <div class="photographer-info">
                            <a href="#"><img src="images/samplebg.jpg" alt=""></a>
                            <a href="#"><span>Photographer's Name</span></a>
                        </div>
                        <div class="icon-links">
                            <a href="#"><i class="fa-solid fa-heart"></i></a>
                            <a href="#"><i class="fa-solid fa-arrow-down"></i></a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 col-6">
                <div class="card image">
                    <img src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/82/golden-hour.jpg" alt="" class="card-img-top card-v">
                    <div class="more">
                        <div class="photographer-info">
                            <a href="#"><img src="images/samplebg.jpg" alt=""></a>
                            <a href="#"><span>Photographer's Name</span></a>
                        </div>
                        <div class="icon-links">
                            <a href="#"><i class="fa-solid fa-heart"></i></a>
                            <a href="#"><i class="fa-solid fa-arrow-down"></i></a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 col-6">
                <div class="card image">
                    <img src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/82/flight-formation.jpg" alt="" class="card-img-top card-v">
                    <div class="more">
                        <div class="photographer-info">
                            <a href="#"><img src="images/samplebg.jpg" alt=""></a>
                            <a href="#"><span>Photographer's Name</span></a>
                        </div>
                        <div class="icon-links">
                            <a href="#"><i class="fa-solid fa-heart"></i></a>
                            <a href="#"><i class="fa-solid fa-arrow-down"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>