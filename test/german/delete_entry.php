<!DOCTYPE html>
<head>
</head>
<body>

<h1>Delete An Entry</h1>

<?php

$dbc = mysql_connect ('simplysilent.db.11370614.hostedresource.com', 'simplysilent',  'AlfredFJones#7');
mysql_select_db('simplysilent', $dbc);

if(isset($_GET['id']) && is_numeric($_GET['id']))
{
	$query = "SELECT german, english FROM german WHERE entry_id={$_GET['id']}";
	if ($r = mysql_query($query, $dbc))
	{
		$row = mysql_fetch_array($r);

		print '<form action="delete_entry.php" method="post">
		<p>Are you sure you want to delete this entry?</p>
		<h3>' . $row['german'] . '</h3>' .
		$row['english'] . '<br>
		<input type="hidden" name="id" value="' . $_GET['id'] . '">
		<input type="submit" name="submit" value="Delete this Entry!">
		</form>';
	}
	else
	{
		print 'fail';
	}
}
elseif(isset($_POST['id']) && is_numeric($_POST['id']))
{
	$query = "DELETE FROM german WHERE entry_id={$_POST['id']} LIMIT 1";
	$r = mysql_query($query, $dbc);

	if(mysql_affected_rows($dbc) == 1)
	{
		print '<p>The blog entry has been deleted. Go back to <a href="add_entry.php">Add Entries</a>.</p>';
	}
	else{
		print '<p>Could not delete</p>' . mysql_error($dbc) . $query;
	}
}
else{
	print 'This page accessed in errror.';
}

mysql_close($dbc);
?>