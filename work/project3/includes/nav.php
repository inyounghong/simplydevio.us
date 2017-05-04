<?php 
// If user submits search query
if (isset($_POST['go_search'])){
	$search_text = $_POST['keywords'];
	// Redirect to search page
	header("Location: ../search.php?keywords=" . $search_text);
}

// IF USER IS LOGGED IN 
if (isset($_SESSION['logged_user_by_sql'])) {
	print '<div class="welcome">Howdy, ' . $_SESSION['logged_user_by_sql'] . '!</div>';
?>

<div class="menu">
	<a href="index.php">Home</a>
	<a href="view_albums.php">Albums</a>
	<a href="photos.php">Photos</a>
	<a href="upload.php">Upload</a>
	<a href="login.php">Logout</a>
</div>

<?php
}
else{
?>

<div class="menu">
	<a href="index.php">Home</a>
	<a href="view_albums.php">Albums</a>
	<a href="photos.php">Photos</a>
	<a href="login.php">Login</a>
</div>

<?php } ?>

<form class="small_search" action="includes/nav.php" method="post">
	<input type="text" name="keywords" placeholder="Search">
	<input type="submit" class="search_button" name="go_search" value="Go">
</form>