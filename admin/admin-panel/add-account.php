<?php 
	require('../admin-database.php');

	if (isset($_POST['btnAdd'])) {
		$txt_username = $_POST['txtUsername'];
		$txt_password = $_POST['txtPassword'];
        $txt_email = $_POST['txtEmail'];
        $txt_Type = $_POST['txtType'];
        $txt_DisplayPhoto = $_POST['txtDisplayPhoto'];

		mysqli_query($CON, "INSERT INTO tbladminaccs(username, password, email, type, display_photo) VALUES('$txt_username','$txt_password','$txt_email','$txt_Type','$txt_DisplayPhoto');");

		echo '<script> alert("Sucessfully Added!") </script>';
		echo '<script> window.location.href = "manage-accounts.php" </script>';
	}
	else {
		echo '<script> window.location.href = "manage-accounts.php" </script>';
	}
 ?>