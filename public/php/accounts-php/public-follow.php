<?php 
	require('../public-db.php');

	print_r(json_encode($_POST));

	if (isset($_POST['othersFollowId'])) {
		$myFollowId = $_POST['myFollowId'];
	    $othersFollowId = $_POST['othersFollowId'];
		if ($_POST['state'] == "Follow") {
		    mysqli_query($CON, "UPDATE tblfollow SET following=CONCAT(following,'".$othersFollowId.",'), followingNum=followingNum+1 WHERE follower_id = ".$myFollowId.";");

		    mysqli_query($CON, "UPDATE tblfollow SET followers=CONCAT(followers,'".$myFollowId.",'), followersNum=followersNum+1 WHERE follower_id = ".$othersFollowId.";");
		}
		else {
			
		}
	}

 ?>


