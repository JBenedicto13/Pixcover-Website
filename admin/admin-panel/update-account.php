<?php 
	require('../admin-database.php');

	if (isset($_POST['btnEdit'])) {
		$editId = $_POST['editId'];
		$editUsername = $_POST['editUsername'];
		$editPassword = $_POST['editPassword'];
        $editEmail = $_POST['email'];
        $editType = $_POST['type'];
		$editDisplayPhoto = $_POST['display_photo'];
	}

	if (isset($_POST['btnUpdate'])) {
		$updateId = $_POST['updateId'];
		$update_txtUsername = $_POST['update_txtUsername'];
		$update_txtPassword = $_POST['update_txtPassword'];
        $update_txtEmail = $_POST['update_email'];
		$update_txtType = $_POST['update_type'];
        $update_txtDisplayPhoto = $_POST['update_display_photo'];

		mysqli_query($CON, "UPDATE tbladminaccs SET  username = '$update_txtUsername', password = '$update_txtPassword', email = '$update_txtEmail', type = '$update_txtType', display_photo = '$update_txtDisplayPhoto' WHERE idtbladminaccs = '$updateId';");

		echo '<script> alert("Sucessfully Updated!") </script>';
		echo '<script> window.location.href = "manage-accounts.php" </script>';
	}
 ?>