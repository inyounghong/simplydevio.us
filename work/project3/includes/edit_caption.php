<?php
session_start();
// Show page if user is logged in
if (isset($_SESSION['logged_user_by_sql'])){

	// Get new caption
	$caption = filter_input( INPUT_GET, 'caption', FILTER_SANITIZE_STRING );

	// Validate caption
	if (strlen($caption) > 200){
		echo "Caption is too long!";
	}
	else{
		// Get album id
		$photo_id = $_GET['photo_id'];

		require_once 'config.php';
		$mysqli = new mysqli( DB_HOST, DB_USER, DB_PASSWORD, DB_NAME );
		if (!$mysqli) {
		    die('Could not connect: ' . mysqli_error($mysqli));
		}

		// Update title with given album id
		$query_str = "UPDATE Photos SET caption = '".$caption."' WHERE photo_id = $photo_id";
		$result = $mysqli->query($query_str); 

		// Check success
		if ($mysqli->affected_rows < 0){
			echo "Sorry, there was an error!";
		}
		else if ($mysqli->affected_rows > 0){
			echo "Caption successfully updated!";
		}

		$mysqli->close();
	}
}
else{
	print ('<p>Please login to access this page!</p>');
}
?>