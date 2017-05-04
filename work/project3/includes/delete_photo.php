<?php
session_start();
// Show page if user is logged in
if (isset($_SESSION['logged_user_by_sql'])){
	// Get ids
	$photo_id = $_GET['photo_id'];
	$album_id = "";

	// Mysql
	require_once 'config.php';
	$mysqli = new mysqli( DB_HOST, DB_USER, DB_PASSWORD, DB_NAME );
	if (!$mysqli) {
	    die('Could not connect: ' . mysqli_error($mysqli));
	}

	// Completely delete photo
	$result = $mysqli->query("DELETE FROM Photos WHERE photo_id = $photo_id"); 
	$result2 = $mysqli->query("DELETE FROM PhotoInAlbum WHERE photo_id = $photo_id");

	$mysqli->close();
	header("Location: ../photos.php");
}
else{
	print ('<p>Please login to access this page!</p>');
}

?>