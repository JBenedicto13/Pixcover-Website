<?php 
	require('../admin-database.php');
	
	$RESULT = mysqli_query($CON,
    "SELECT * FROM tbladminaccs")
	or die("Error in executing query...");
 ?>