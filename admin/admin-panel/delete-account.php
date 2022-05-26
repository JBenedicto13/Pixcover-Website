<?php 
	require('../admin-database.php');
	if (isset($_POST['btnDelete'])) {

		$txt_deleteId = $_POST['delete-id'];

		mysqli_query($CON, "DELETE FROM tbladminaccs WHERE idtbladminaccs = '$txt_deleteId';");

		echo '<script> window.location.href = "manage-accounts.php" </script>';
	}
	else {
		echo '<script> window.location.href = "manage-accounts.php" </script>';
	}
 ?>