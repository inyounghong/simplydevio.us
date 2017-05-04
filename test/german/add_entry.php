<!DOCTYPE html>
<head>
	<style>
	.float_form{
		position:fixed;
		top:50px;
		right:200px;
	}

	input{
		display:inline-block;
		padding:10px;
	}
	</style>
</head>
<body>

<?php

if ($_SERVER['REQUEST_METHOD'] == 'POST') 
{
	$dbc = mysql_connect ('simplysilent.db.11370614.hostedresource.com', 'simplysilent',  'AlfredFJones#7');
	mysql_select_db('simplysilent', $dbc);

	$problem = FALSE;

	if (!empty($_POST['german']) && !empty($_POST['english'])) 
	{

		$german = mysql_real_escape_string(stripslashes(trim(strip_tags($_POST['german']))), $dbc);
		$english = mysql_real_escape_string(stripslashes(trim(strip_tags($_POST['english']))), $dbc); 
	} 
	else 
	{
		print '<p style="color: red;">Please submit both the German and English words.</p>';
		$problem = TRUE;
	} 

	if (!$problem) 
	{

		// Define the query: 
		$query = "INSERT INTO german (entry_id, german, english, date_entered) VALUES (0, '$german', '$english', NOW())"; 

		// Execute the query: 
		if (@mysql_query($query, $dbc)) { 
			print '<p>The definition has been added!</p>'; 
		} 
		else 
		{ 
			print '<p style="color: red;">Could not add the entry because:<br />' . mysql_error($dbc) . '.</p><p>The query being run was: ' . $query . '</p>'; 
		} 

	} // No problem!

	mysql_close($dbc); 
	// Close the connection. 

} // End of form submission IF.

// Display the form: 
?> 
<div class="float_form">
<form action="add_entry.php" method="post"> 
	<p>German: <input type="text" name="german" size="40" maxsize="100" /></p>
	<p>English: <input type="text" name="english" size="40" maxsize="100" /></p>
	<input type="submit" name="submit" value="Post This Entry!" /> 
	</form>
</div>

</body> 
</html>

<?php include 'view_entries.php' ?>
