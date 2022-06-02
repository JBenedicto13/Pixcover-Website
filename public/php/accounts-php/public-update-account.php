<?php 
	require('../public-db.php');

    if(isset($_POST['btnCancel'])) {
        echo 'Yehey!';
    } else {
        echo 'Nah';
    }

	// if (isset($_POST['btnUpdate'])) {
	// 	$updateId = $_POST['edit-id'];
	// 	$update_txtUsername = $_POST['edit-username'];
	// 	$update_txtPassword = $_POST['edit-password'];
    //     $update_txtEmail = $_POST['edit-email'];
	// 	$update_txtType = $_POST['edit-type'];
    //     $update_txtDisplayPhoto = $_POST['edit-display-photo'];

	// 	mysqli_query($CON, "UPDATE tbladminaccs SET username = '$update_txtUsername', password = '$update_txtPassword', email = '$update_txtEmail', type = '$update_txtType', display_photo = '$update_txtDisplayPhoto' WHERE idtbladminaccs = '$updateId';");

	// 	echo '<script> alert("Sucessfully Updated!") </script>';
	// 	echo '<script> window.location.href = "manage-accounts.php" </script>';
    //     $update_Id = $_POST['updateId'];
        
    //     echo '<script> alert("Sucessfully Updated!") </script>';
	// }
 ?>