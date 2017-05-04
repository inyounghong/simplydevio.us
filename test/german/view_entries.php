<!DOCTYPE html>
<head>
<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,600,300,700' rel='stylesheet' type='text/css'>
	<style>
		body{
			font-family:'Open Sans';
			max-width:1000px;
			margin:0 auto;
		}

		a{
			color:#000;
		}

		table{
			border-collapse: collapse;
			text-align:left;
		}

		table, th, td{
			border:1px solid #000;
		}


		th{
			font-weight:700;
		}

		th, td{
			padding:5px 10px;
		}

		.german, .english{
			min-width:200px;
		}

		.english{
			opacity:0;
			transition:opacity .2s;
		}

		.english:hover{
			opacity:1;
		}
	</style>
</head>
<body>

<?php
$dbc = mysql_connect ('simplysilent.db.11370614.hostedresource.com', 'simplysilent',  'AlfredFJones#7');
mysql_select_db('simplysilent', $dbc);

$query = 'SELECT * FROM german ORDER BY date_entered DESC';

print '
<br>
	<table>
		<tr>
			<th>German</th>
			<th>English</th>
			<th>Edit</th>
			<th>Delete</th>
		</tr>';

if ($r = mysql_query($query, $dbc))
{
	while ($row = mysql_fetch_array($r))
	{
		if (strpos($row['german'],'der') !== false){
			$color = 'blue';
		}
		else{
			$color = "#000";
		}

		print "
		<tr>
			<td class=\"german\" style=\"color:$color\">{$row['german']}</td>
			<td class=\"english\" >{$row['english']}</td>
			<td class=\"edit\"><a href=\"edit_entry.php?id={$row['entry_id']}\">Edit</a></td>
			<td class=\"delete\"><a href=\"delete_entry.php?id={$row['entry_id']}\">Delete</a></td>";


		print "</tr>";
	}
}
else{
	print 'Could not retrieve data because ' . mysql_error($dbc) . '<br>the query was ' . $query;
}

mysql_close($dbc);
?>

</body>