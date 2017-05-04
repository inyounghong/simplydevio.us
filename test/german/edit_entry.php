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
	$query = "SELECT german, english FROM german WHERE entry_id={$_GET['id']}";
	if ($r = mysql_query($query, $dbc))
	{
		$row = mysql_fetch_array($r);

		print '<form action="edit_entry.php" method="post">
		<p>German: <input type="text" name="german" size="40" maxsize="100" value="' . htmlentities($row['german']) . '"/></p>
		<p>English: <input type="text" name="english" size="40" maxsize="100" value="'  . htmlentities($row['english']) . '"/></p>
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
	if (!empty($_POST['german']) && !empty($_POST['english'])) 
	{
		$german = mysql_real_escape_string(stripslashes(trim(strip_tags($_POST['german']))), $dbc);
		$english = mysql_real_escape_string(stripslashes(trim(strip_tags($_POST['english']))), $dbc); 
	} 
	else{
		print 'Submit both the German and English words';
		$problem = TRUE;
	}

	if(!$problem)
	{
		$query = "UPDATE german SET german='$german', english='$english' WHERE entry_id={$_POST['id']}";
		$r = mysql_query($query, $dbc);

		if(mysql_affected_rows($dbc) == 1)
		{
			print 'Success, your majesty. Your entry has been updated to:
			<h3>' . stripslashes(trim(strip_tags($_POST['german']))) . '</h3>
			<p>' . stripslashes(trim(strip_tags($_POST['english']))) . '</p>
			See your <a href="view_entries.php">Updated Entries</a>.';
		}
		else
		{
			print 'No changes were logged. Go back to your <a href="add_entry.php">Entries</a>'; 
		}
	}
}
else{
	print 'fail much';
}

mysql_close($dbc);

?>
