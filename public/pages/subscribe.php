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
    <link rel="stylesheet" href="../css/subscribe.css">

    <!-- JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.slim.min.js" integrity="sha512-6ORWJX/LrnSjBzwefdNUyLCMTIsGoNP6NftMy2UAm1JBm6PRZCO1d7OHBStWpVFZLO+RerTvqX/Z9mBFfCJZ4A==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.5/dist/umd/popper.min.js" integrity="sha384-Xe+8cL9oJa6tN/veChSP7q+mnSPaj5Bcu9mPX5F5xIGE0DVittaqT5lorf0EI7Vk" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.min.js" integrity="sha384-kjU+l4N0Yf4ZOJErLsIcvOU2qSb74wXpOhqTvwVx3OElZRweTnQ6d31fXEoRD1Jy" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/masonry-layout@4.2.2/dist/masonry.pkgd.min.js" integrity="sha384-GNFwBvfVxBkLMJpYMOABq3c+d3KnQxudP/mGPkzpZSTYykLBNsZEnG2D9G/X/+7D" crossorigin="anonymous" async></script>
    <script src="https://kit.fontawesome.com/01b3ba1a59.js" crossorigin="anonymous"></script>
    <script src="js/nav.js"></script>

    <title>Pixcover | Subscribe</title>
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
        <div class="row subs-cover">
            <div class="col-md-6">
                <h2>Unleash your creativity</h2>
                <p>Get access to over 26,183,000  Premium Photo/Video. Download what you want, cancel when you want</p>
            </div>
        </div>
        <div class="row pt-5">
            <div class="col-md-5">
                <table class="table table-hover table-borderless" style="width: 100%;">
                    <thead>
                      <tr>
                        <th scope="col-md-6"></th>
                        <th scope="col">Free</th>
                        <th scope="col">Premium</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <td><p>
                            Access to Free Photo and Video contents of Pixcover
                        </p></td>
                        <td><i class="fa-solid fa-check"></i></td>
                        <td><i class="fa-solid fa-check"></td>
                      </tr>
                      <tr>
                        <td><p>
                            Access to Premium Photo and Video contents of Pixcover
                        </p></td>
                        <td><i class="fa-solid fa-xmark"></i></td>
                        <td><i class="fa-solid fa-check"></td>
                      </tr>
                      <tr>
                        <td><p>
                            The daily download limit has been increased to 100 contents (including any type of photos/videos).
                        </p></td>
                        <td><i class="fa-solid fa-xmark"></i></td>
                        <td><i class="fa-solid fa-check"></td>
                      </tr>
                      <tr>
                        <td><p>
                            When using Pixcover photos, no attribution is required.
                        </p></td>
                        <td><i class="fa-solid fa-xmark"></i></td>
                        <td><i class="fa-solid fa-check"></td>
                      </tr>
                      <tr>
                        <td><p>
                            While using the website, no advertisements will be displayed.
                        </p></td>
                        <td><i class="fa-solid fa-xmark"></i></td>
                        <td><i class="fa-solid fa-check"></td>
                      </tr>
                      <tr>
                        <td><p>
                            When submitting a request ticket, you will receive priority support from our team
                        </p></td>
                        <td><i class="fa-solid fa-xmark"></i></td>
                        <td><i class="fa-solid fa-check"></td>
                      </tr>
                    </tbody>
                </table>
            </div>
            <div class="col-md-5">
                <div class="row subs-card">
                    <div class="col-md-8">
                        <h5>12 MONTHS</h5>
                        <h5><b class="price">P400</b>/month</h5>
                        <p>P4,800 every 12 months</p>
                    </div>
                    <div class="col-md-4 d-flex align-items-center justify-content-end"><button class="btn btn-primary">Subscribe</button></div>
                </div>
                <br><br>
                <div class="row subs-card">
                    <div class="col-md-8">
                        <h5>1 MONTH</h5>
                        <h5><b class="price">P500</b>/month</h5>
                    </div>
                    <div class="col-md-4 d-flex align-items-center justify-content-end"><button class="btn btn-primary diverted-btn">Subscribe</button></div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>