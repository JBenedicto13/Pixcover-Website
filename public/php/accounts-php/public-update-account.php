<?php 
	require('../public-db.php');

	function compress_image($source_url, $destination_url, $quality) {
		$info = getimagesize($source_url);
		 
		if ($info['mime'] == 'image/jpeg') $image = imagecreatefromjpeg($source_url);
		elseif ($info['mime'] == 'image/gif') $image = imagecreatefromgif($source_url);
		elseif ($info['mime'] == 'image/png') $image = imagecreatefrompng($source_url);
		elseif ($info['mime'] == 'image/jpg') $image = imagecreatefromjpeg($source_url);
		 
		//save it
		imagejpeg($image, $destination_url, $quality);
			 
		//return destination file url
		return $destination_url;
	}
	
	if (isset($_POST['btnCancel'])) {
		echo '<script> window.location.href = "../../pages/profile.php" </script>';
	}

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
		$allowImageExt = array('jpg','png','jpeg','gif');
		$extension = pathinfo($update_displayPhoto,PATHINFO_EXTENSION);
		$rnd = rand(0,100000);
		$rename='DP'.date('dmy').$rnd;
		$newname = $rename.'.'.$extension;
		$updateDisplayPhoto = $newname;
		$imageQuality = 60;
		$filename=$_FILES['dp_image']['tmp_name'];
		$dest_photo = '../../accounts/avatars/'.$newname;
		$dest_photo_compress = '../../accounts/avatars_preview/'.$newname;

		if(empty($update_displayPhoto)){ 
			mysqli_query($CON, "UPDATE tblaccounts SET fname='$update_txtFname', lname='$update_txtLname', email='$update_txtEmail' 
			WHERE idtblaccounts='$updateId'");

			mysqli_query($CON, "UPDATE tbladdinfo SET gcash_num='$update_txtGcashNum', short_bio='$update_txtShortBio', website='$update_txtWebsite', socsci_handles='$update_txtSocialMedia', location='$update_txtLocation' WHERE idtblaccounts='$updateId'");

			echo '<script> alert("Sucessfully Updated!") </script>';
			echo '<script> window.location.href = "../../pages/profile.php" </script>';
		} else {
			if (in_array($extension, $allowImageExt)) {
				echo '<script>alert("Uploaded")</script>';
				
				if( !copy($filename, $dest_photo) ) { 
					echo '<script>alert("File can.'."'".'t be copied!")</script>';
				} 
				else {

					$compressimage = compress_image($filename, $dest_photo_compress, 60);
					echo '<script>alert("File has been copied!")</script>';
					mysqli_query($CON, "UPDATE tblaccounts SET fname='$update_txtFname', lname='$update_txtLname', email='$update_txtEmail' 
					WHERE idtblaccounts='$updateId'");

					mysqli_query($CON, "UPDATE tbladdinfo SET gcash_num='$update_txtGcashNum', short_bio='$update_txtShortBio', website='$update_txtWebsite', socsci_handles='$update_txtSocialMedia', location='$update_txtLocation', display_photo='$updateDisplayPhoto'
					WHERE idtblaccounts='$updateId'");

					echo '<script> alert("Sucessfully Updated!") </script>';
					echo '<script> window.location.href = "../../pages/profile.php" </script>';
				}
			} else {
				echo '<script>alert("File type not supported please upload .jpg, .png, .jpeg or .gif only.")</script>';
			}
		}
	}
 ?>