<?php 
	require('../public-db.php');

	if (isset($_POST['btnUpdate'])) {
		$updateId = $_POST['updateId'];
		$update_txtFname = $_POST['edit-txtFname'];
		$update_txtLname = $_POST['edit-txtLname'];
		$update_txtEmail = $_POST['edit-txtEmail'];
		// $update_txtPassword = $_POST['edit-txtPassword'];
		$update_txtGcashNum = $_POST['edit-txtGcashNum'];
        $update_txtShortBio = $_POST['edit-txtShortBio'];
		$update_txtWebsite = $_POST['edit-txtWebsite'];
		$update_txtSocialMedia = $_POST['edit-txtSocialMedia'];
		$update_txtLocation = $_POST['edit-txtLocation'];

		//Image Rename and Upload
		$update_displayPhoto = $_FILES['dp_image']['name'];
		$extension = pathinfo($update_displayPhoto,PATHINFO_EXTENSION);
		$rnd = rand(0,100000);
		$rename='DP'.date('dmy').$rnd;
		$newname = $rename.'.'.$extension;
		$updateDisplayPhoto = $newname;

		$filename=$_FILES['dp_image']['tmp_name'];
		if(move_uploaded_file($filename, 'dp-images/'.$newname)) {
			echo '<script>alert("Uploaded")</script>';
		} else {
			echo '<script>alert("Not Uploaded")</script>';
		}

		mysqli_query($CON, "UPDATE tblaccounts SET fname='$update_txtFname', lname='$update_txtLname', email='$update_txtEmail' 
		WHERE idtblaccounts='$updateId'");

		mysqli_query($CON, "UPDATE tbladdinfo SET gcash_num='$update_txtGcashNum', short_bio='$update_txtShortBio', website='$update_txtWebsite', socsci_handles='$update_txtSocialMedia', location='$update_txtLocation', display_photo='$updateDisplayPhoto'
		WHERE idtblaccounts='$updateId'");

		echo '<script> alert("Sucessfully Updated!") </script>';
		echo '<script> window.location.href = "../../pages/profile.php" </script>';
	}

	if (isset($_POST['btnCancel'])) {
		echo '<script> window.location.href = "../../pages/profile.php" </script>';
	}

 ?>