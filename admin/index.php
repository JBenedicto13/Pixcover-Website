<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="admin-css/main-style.css">
    <title>Admin Page</title>
</head>
<body>
    <div class="container-fluid" style="padding-top: 10px;">
        <div class="row justify-content-md-center">
            <form action="" id="frmAdminLogin" class="col-4 align-items-center">
                <div class="mb-3">
                    <label for="adminUsername" class="form-label">Username</label>
                    <input type="text" class="form-control" id="adminUsername" placeholder="Your Username">
                </div>
                <div class="mb-3">
                    <label for="adminPassword" class="form-label">Password</label>
                    <input type="text" class="form-control" id="adminPassword" placeholder="Your Password">
                </div>
                <div class="mb-3 form-check">
                    <input type="checkbox" class="form-check-input" id="showPass">
                    <label class="form-check-label" for="showPass">Show Password</label>
                </div>
                <button type="submit" class="btn btn-primary">Signin</button>
            </form>
        </div>
    </div>
</body>
</html>