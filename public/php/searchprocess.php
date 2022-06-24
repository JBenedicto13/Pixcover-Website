<?php
	
	require ("public-db.php");

	if ($_SERVER['REQUEST_METHOD'] == "POST") {
		$searchData = $_POST['searchData'];
		$searchQuery = "SELECT title FROM tblphotouploads WHERE title LIKE '%".$searchData."%' LIMIT 10";
		$result = mysqli_query($CON, $searchQuery);

		if (mysqli_num_rows($result)) {
			while ($ROW = mysqli_fetch_assoc($result)) {
				echo '<a href="#" id="select_result" class="nav-link list-group-item list-group-item-action border p-2">'.$ROW['title'].'</a>';
			}
		}
		else {
			echo '<p class="list-group list-group-item">No Result Found</p>';
		}
	}
?>