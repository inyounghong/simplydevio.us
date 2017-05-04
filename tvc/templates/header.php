<?php include('includes/functions.php'); ?>

<!DOCTYPE html>
<html>
<head>
	<title><?php 
		if (defined('TITLE')) 
		{
			print TITLE;
		}
		else
		{
			print 'Tracy Volunteer Connection';
		}
		?>
	</title>
</head>
<body>
	<div id="container">
		<h1>Tracy Volunteer Connection</h1>
		<br>

		<?php
		if ( (is_admin() && (basename($_SERVER['PHP_SELF']) != 'logout.php')) OR (isset($loggedin) && $loggedin))
		{
			print '<h3>Site Admin</h3>
			<a href="add_entry.php">Add Entry</a> | 
			<a href="view_entries.php">View all Entries</a> | 
			<a href="logout.php">Log Out</a>';
		}
		?>

</body>
</html>