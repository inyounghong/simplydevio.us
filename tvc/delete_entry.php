<?php

define('TITLE', 'Delete Entry');
include('templates/header.php');
print '<h2>Delete an Entry</h2>';

if (!is_admin())
{
	print '<h2>Access Denied!</h1>
	<p class="error">Please <a href="login.php">login</a> to access this page.</p>';
	exit();
}

include('../mysql_connect.php');

if (isset($_GET['id']) && is_numeric($_GET['id']) && ($_GET['id'] > 0))
{
	$query = 'SELECT entry_id, name, entry, middle FROM entries ORDER BY date_entered DESC';

	if ($r = mysql_query($query, $dbc))
	{
		$row = mysql_fetch_array($r);

		print "<p>Are you sure you want to delete this entry?</p><form action=\"delete_entry.php\" method=\"post\">
		<div class=\"entry_wrap\">
			<h3>" . $row['name'] . "</h3>
			<div class=\"timestamp\">" . $row['date_entered'] . "</div>
			<div class=\"work\">" . $row['entry'] . "</div>\n";

		if ($row['middle'] == 1)
		{
			print "<div class=\"age\">6th-8th Graders</div>";
		}

		print '
		<br>
		<input type="hidden" name="id" value="' . $_GET['id'] . '">
		<input type="submit" name="submit" value="Delete this Entry">
		</form>';

	}
	else
	{
		print '<p class="error">Could not retrieve data</div>.';
	}
}
elseif (isset($_POST['id']) && is_numeric($_POST['id']) && ($_POST['id'] > 0))
{
	$query = "DELETE FROM entries WHERE entry_id={$_POST['id']} LIMIT 1";
	$r = mysql_query($query, $dbc);

	if (mysql_affected_rows($dbc) == 1)
	{
		print '<p>Your entry successfully been deleted.</p>';
	}
	else
	{
		print '<p class="error">Could not add the entry</p>.' . mysql_error($dbc) . $query ;
	}
		
}
else
{
	print '<p class="error">This page has ben accessed in error.</p>';
}

mysql_close($dbc);

