<?php 
	require('../public-db.php');

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
		$extension = pathinfo($uploadContent_name,PATHINFO_EXTENSION);
        $rename='pixcover-'.$txt_creator_fname.'-'.$txt_creator_lname.'-'.$incremented_id;
		$newname = strtolower($rename.'.'.$extension);
		$photo_name = $newname;

		$filename=$_FILES['uploadContent']['tmp_name'];
        if(move_uploaded_file($filename, '../../accounts/photo_uploads/'.$photo_name)) {
			mysqli_query($CON, "INSERT INTO tblphotouploads(creator_id, photo_name, title, tags, location) VALUES('$txt_creator_id','$photo_name','$txt_title','$txt_tags','$txt_location');");

            echo '<script> alert("Sucessfully Uploaded! Please wait for admin to approve your content.") </script>';
            echo '<script> window.location.href = "../../pages/profile.php" </script>';
		} else {
			echo '<script> alert("An error has occured while uploading your content") </script>';
            echo '<script> window.location.href = "../../pages/upload.php" </script>';
		}
    }
    else {
        echo '<script> alert("An error has occured while uploading your content") </script>';
        echo '<script> window.location.href = "../../pages/upload.php" </script>';
    }
 ?>