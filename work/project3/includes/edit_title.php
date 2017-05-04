<?php
session_start();
// Show page if user is logged in
if (isset($_SESSION['logged_user_by_sql'])){
	// Get new title
	$q = filter_input( INPUT_GET, 'title', FILTER_SANITIZE_STRING );

	// Get album id
	$album_id = $_GET['album_id'];

	require_once 'config.php';
	$mysqli = new mysqli( DB_HOST, DB_USER, DB_PASSWORD, DB_NAME );
	if (!$mysqli) {
	    die('Could not connect: ' . mysqli_error($mysqli));
	}

	// Update title with given album id
	$query_str = "UPDATE Albums SET title = '".$q."' WHERE album_id = $album_id";
	$result = $mysqli->query($query_str); 

	// Check success
	if ($mysqli->affected_rows == 0){
		echo "";
	}
	else if ($mysqli->affected_rows > 0){
		echo "Title successfully updated!";
	}
	else{
		echo "Sorry, there was an error!";
	}

	$mysqli->close();
}
else{
	print ('<p>Please login to access this page!</p>');
}
?>