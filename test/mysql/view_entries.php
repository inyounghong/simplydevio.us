<!DOCTYPE html>
<head>
</head>
<body>

<h1>My blog</h1>

<?php
$dbc = mysql_connect ('simplysilent.db.11370614.hostedresource.com', 'simplysilent',  'AlfredFJones#7');
mysql_select_db('simplysilent', $dbc);

$query = 'SELECT * FROM entries ORDER BY date_entered DESC';

if ($r = mysql_query($query, $dbc))
{
	while ($row = mysql_fetch_array($r))
	{
		print "<p><h3>{$row['title']}</h3>
		{$row['date_entered']}<br>
		{$row['entry']}<br>
		<a href=\"edit_entry.php?id={$row['entry_id']}\">Edit</a>
		<a href=\"delete_entry.php?id={$row['entry_id']}\">Delete</a>
		</p><hr>\n";
	}
}
else{
	print 'Could not retrieve data because ' . mysql_error($dbc) . '<br>the query was ' . $query;
}

mysql_close($dbc);
?>

</body>