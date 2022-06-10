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

    if (isset($_POST['btnUpload'])) {

	$incremented_id = (int)$_POST['photoupload_id'] + 1;
	$txt_creator_id = $_POST['creator_id'];
	$txt_creator_fname = $_POST['creator_fname'];
	$txt_creator_lname = $_POST['creator_lname'];
	$txt_title = $_POST['file_title'];
	$txt_tags = $_POST['file_tags'];
	$txt_location = $_POST['file_location'];

	//Image Rename and Upload
	$uploadContent_name = $_FILES['uploadContent']['name'];
	$allowImageExt = array('jpg','png','jpeg','gif');
	$extension = pathinfo($uploadContent_name,PATHINFO_EXTENSION);
	$rename='pixcover-'.$txt_creator_fname.'-'.$txt_creator_lname.'-'.$incremented_id;
	$newname = strtolower($rename.'.'.$extension);
	$photo_name = $newname;
	$filename=$_FILES['uploadContent']['tmp_name'];
	$imageQuality = 60;
	$dest_photo = '../../accounts/photo_uploads/'.$photo_name;
	$dest_photo_compress = '../../accounts/photos_preview/'.$photo_name;

        if(empty($uploadContent_name)){ 
			$error="Please Select files..";
			return $error;
		  
		} else {
			if (in_array($extension, $allowImageExt)) {
				echo '<script>alert("Uploaded")</script>';
				
				if( !copy($filename, $dest_photo) ) { 
					echo '<script>alert("File can.'."'".'t be copied!")</script>';
				} 
				else {

					$compressimage = compress_image($filename, $dest_photo_compress, 60);
					mysqli_query($CON, "INSERT INTO tblphotouploads(creator_id, photo_name, title, tags, location) VALUES('$txt_creator_id','$photo_name','$txt_title','$txt_tags','$txt_location');");

					echo '<script> alert("Sucessfully Uploaded! Please wait for admin to approve your content.") </script>';
					echo '<script> window.location.href = "../../pages/profile.php" </script>';
					echo '<script>alert("File has been copied!")</script>';
				}
			} else {
				echo '<script>alert("File type not supported please upload .jpg, .png, .jpeg or .gif only.")</script>';
			}
		}
    }
    else {
        echo '<script> alert("An error has occured while uploading your content") </script>';
        echo '<script> window.location.href = "../../pages/upload.php" </script>';
    }
 ?>