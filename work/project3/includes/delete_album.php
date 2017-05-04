<?php
session_start();
// Show page if user is logged in
if (isset($_SESSION['logged_user_by_sql'])){
	// Get id
	$album_id = $_GET['album_id'];

	require_once 'config.php';
	$mysqli = new mysqli( DB_HOST, DB_USER, DB_PASSWORD, DB_NAME );
	if (!$mysqli) {
	    die('Could not connect: ' . mysqli_error($mysqli));
	}

	// Update title with given album id
	$result = $mysqli->query("DELETE FROM PhotoInAlbum WHERE album_id = $album_id"); 
	$result2 = $mysqli->query("DELETE FROM Albums WHERE album_id = $album_id"); 
	$mysqli->close();

	header("Location: ../view_albums.php");
}
else{
	print ('<p>Please login to access this page!</p>');
}
?>