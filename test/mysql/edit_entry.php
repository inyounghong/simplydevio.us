<!DOCTYPE html>
<head>
</head>
<body>

<h1>Edit An Entry</h1>

<?php

$dbc = mysql_connect ('simplysilent.db.11370614.hostedresource.com', 'simplysilent',  'AlfredFJones#7');
mysql_select_db('simplysilent', $dbc);

if(isset($_GET['id']) && is_numeric($_GET['id']))
{
	$query = "SELECT title, entry FROM entries WHERE entry_id={$_GET['id']}";
	if ($r = mysql_query($query, $dbc))
	{
		$row = mysql_fetch_array($r);

		print '<form action="edit_entry.php" method="post">
		<p>Entry Title: <input type="text" name="title" size="40" maxsize="100" value="' . htmlentities($row['title']) . '"/></p>
		<p>Entry Text: <textarea name="entry" size="40" rows="5">' . htmlentities($row['entry']) . '
		</textarea></p>
		<input type="hidden" name="id" value="' . $_GET['id'] . '">
		<input type="submit" name="submit" value="Update this entry!">
		</form>';
	}
	else{
		print 'fail';
	}
}
elseif(isset($_POST['id']) && is_numeric($_POST['id']))
{
	$problem = FALSE;
	if (!empty($_POST['title']) && !empty($_POST['entry'])) 
	{
		$title = mysql_real_escape_string(stripslashes(trim(strip_tags($_POST['title']))), $dbc);
		$entry = mysql_real_escape_string(stripslashes(trim(strip_tags($_POST['entry']))), $dbc); 
	} 
	else{
		print 'Submit both title and entry';
		$problem = TRUE;
	}

	if(!$problem)
	{
		$query = "UPDATE entries SET title='$title', entry='$entry' WHERE entry_id={$_POST['id']}";
		$r = mysql_query($query, $dbc);

		if(mysql_affected_rows($dbc) == 1)
		{
			print 'Success, your majesty. Your entry has been updated to:
			<h3>' . stripslashes(trim(strip_tags($_POST['title']))) . '</h3>
			<p>' . stripslashes(trim(strip_tags($_POST['entry']))) . '</p>
			See your <a href="view_entries.php">Updated Entries</a>.';
		}
		else
		{
			print 'No changes were logged. Go back to your <a href="view_entries.php">Entries</a>'; 
		}
	}
}
else{
	print 'fail much';
}

mysql_close($dbc);

?>
