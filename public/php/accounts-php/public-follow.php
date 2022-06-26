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

			$userid_result = mysqli_query($CON,"SELECT * FROM tblfollow WHERE follower_id = ".$myFollowId.";");
		    $followid_result = mysqli_query($CON,"SELECT * FROM tblfollow WHERE follower_id = ".$othersFollowId.";");

		    $ROWuser = mysqli_fetch_array($userid_result);
		    $ROWfollow = mysqli_fetch_array($followid_result);

			$col_followers_fo = $ROWfollow['followers'];
			$col_following_user = $ROWuser['following'];

			$myFollowId = $myFollowId.',';
			$othersFollowId = $othersFollowId.',';

			$update_following = str_replace($myFollowId, '', $col_followers_fo);
			$update_otherfollow = str_replace($othersFollowId, '', $col_following_user);

			mysqli_query($CON, "UPDATE tblfollow SET followers='".$update_following."', followersNum=followersNum-1 WHERE follower_id = ".$othersFollowId.";");
			
			mysqli_query($CON, "UPDATE tblfollow SET following='".$update_otherfollow."', followingNum=followingNum-1 WHERE follower_id = ".$myFollowId.";");
		}
	}

 ?>


