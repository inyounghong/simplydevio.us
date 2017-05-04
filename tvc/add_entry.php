<?php

define('TITLE', 'Add Entry');
include('templates/header.php');
print '<h2>Add an Entry</h2>';


if($_SERVER['REQUEST_METHOD'] == 'POST')
{
	if(!empty($_POST['name']) && !empty($_POST['entry']))
	{
		include('../mysql_connect.php');

		$name = mysql_real_escape_string(trim(strip_tags($_POST['name'])), $dbc);
		$entry = mysql_real_escape_string(trim(strip_tags($_POST['entry'])), $dbc);

		if(isset($_POST['middle']))
		{
			$middle = 1;
		}
		else
		{
			$middle = 0;
		}

		$query = "INSERT INTO entries (name, entry, middle, date_entered) VALUES ('$name', '$entry', '$middle', NOW())";
		$r = mysql_query($query, $dbc);

		if (mysql_affected_rows($dbc) == 1)
		{
			print '<p>Your entry has been added to the Organization Database.</p>';
		}
		else
		{
			print '<p class="error">Could not add the entry</p>.' . mysql_error($dbc) . $query ;
		}
		
	}
	else
	{
		print '<p class="error">Please enter all of the required information.</p>';
	}

}

?>

<form action="add_entry.php" method="post">
	<p><label>Contact Name <input type="text" name="name"></label></p>
	<p><label>Description of Work <textarea name="entry"></textarea></label></p>
	<p><label>6th-8th Graders <input type="checkbox" name="middle"></label></p>
	<p><input type="submit" name="submit" value="Add Entry"></p>
</form>