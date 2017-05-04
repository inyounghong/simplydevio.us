<?php

define('TITLE', 'Add Entry');
include('templates/header.php');
print '<h2>Add an Entry</h2>';

if (!is_admin())
{
	print '<h2>Access Denied!</h1>
	<p class="error">Please <a href="login.php">login</a> to access this page.</p>';
	exit();
}

include('../mysql_connect.php');

$query = 'SELECT entry_id, name, entry, middle FROM entries ORDER BY date_entered DESC';

if ($r = mysql_query($query, $dbc))
{
	while($row = mysql_fetch_array($r))
	{
		print "
		<div class=\"entry_wrap\">
			<h3>{$row['name']}</h3>
			<div class=\"timestamp\">{$row['date_entered']}</div>
			<div class=\"work\">{$row['entry']}</div>\n";

		if ($row['middle'] == 1)
		{
			print "<div class=\"age\">6th-8th Graders</div>";
		}

		print "
		<a href=\"edit_entry.php?id={$row['entry_id']}\">Edit</a> 
		<a href=\"delete_entry.php?id={$row['entry_id']}\">Delete</a> \n";
	}

}
else
{
	print '<p class="error">Could not retrieve data</div>.';
}

mysql_close($dbc);

?>