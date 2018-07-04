<?php
include('database.php');
	$get_query = mysqli_query($conn, "SELECT fname,lname,email FROM users");
	echo json_encode(mysqli_fetch_all($get_query));

?>