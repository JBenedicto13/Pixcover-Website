<?php

    require ("public-db.php");

    $txt_photoid = $_POST["photo_id"];

    $preview_result = mysqli_query($CON,"SELECT pu.idtblphotouploads, pu.photo_name, pu.creator_id, display_photo, ac.fname, ac.lname, pu.title, pu.tags, pu.location
    FROM tblphotouploads pu,tblaccounts ac,tbladdinfo ai
    WHERE ac.idtblaccounts = pu.creator_id AND pu.creator_id = ai.idtblaccounts AND pu.idtblphotouploads = ".$txt_photoid.";");

    while ($ROW = mysqli_fetch_array($preview_result)) {
?>

    <style>
        .col-body {
            background-color: #fff9fb;
            padding: 20px;
            border: none;
            border-radius: 10px;
            margin: 0 50px;
        }
        #avatar_pic {
            height: 50px;
            width: 50px;
            border: none;
            border-radius:100%;
        }

        #main_photo {
            height: 75vh;
            width: auto;
            margin: auto;
        }

        .btn-close {
            height: 35px;
            width: 35px;
            padding: 5px;
            z-index: 0;
            font-size: 30px;
        }
    </style>

    <button type="button" class="btn-close sticky-md-top" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    
    <div class="col col-body">
        <div class="row">
        <div class="d-flex mb-3">
            <div class="p-2">
                <a class="nav-link"><img id="avatar_pic" src="<?php echo 'accounts/avatars/'.$ROW['display_photo']; ?>" alt=""></a>
            </div>
            <div class="p-2">
                <div class="row"><h5><a class="nav-link" href="#"><?php echo $ROW['fname']." ".$ROW['lname']; ?></a></h5></div>
                <div class="row"><h5><a class="nav-link" href="#">Follow</a></h5></div>
            </div>
            <div class="ms-auto p-2"><button class="btn btn-success">Like</button></div>
            <div class="p-2">
                <div class="btn-group" role="group" aria-label="Button group with nested dropdown">
                    <button type="button" class="btn btn-success">Download</button>

                    <div class="btn-group" role="group">
                        <button id="btnGroupDrop1" type="button" class="btn btn-success dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false"></button>
                        <ul class="dropdown-menu" aria-labelledby="btnGroupDrop1">
                        <li><a class="dropdown-item" href="#">Dropdown link</a></li>
                        <li><a class="dropdown-item" href="#">Dropdown link</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        </div>
        <div class="row">
            <img id="main_photo" src="<?php echo 'accounts/photo_uploads/'.$ROW['photo_name']; ?>" alt="">
        </div>
        <div class="row">
            
        </div>
    </div>
<?php } ?>