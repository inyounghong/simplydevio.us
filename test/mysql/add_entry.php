<!DOCTYPE html>
<head>
</head>
<body>
<h1>Add a Blog Entry</h1>

<?php

if ($_SERVER['REQUEST_METHOD'] == 'POST') 
{
	$dbc = mysql_connect ('simplysilent.db.11370614.hostedresource.com', 'simplysilent',  'AlfredFJones#7');
	mysql_select_db('simplysilent', $dbc);

	$problem = FALSE;

	if (!empty($_POST['title']) && !empty($_POST['entry'])) 
	{

		$title = mysql_real_escape_string(stripslashes(trim(strip_tags($_POST['title']))), $dbc);
		$entry = mysql_real_escape_string(stripslashes(trim(strip_tags($_POST['entry']))), $dbc); 
	} 
	else 
	{
		print '<p style="color: red;">Please submit both a title and an entry.</p>';
		$problem = TRUE;
	} 

	if (!$problem) 
	{

		// Define the query: 
		$query = "INSERT INTO entries (entry_id, title, entry, date_entered) VALUES (0, '$title', '$entry', NOW())"; 

		// Execute the query: 
		if (@mysql_query($query, $dbc)) { 
			print '<p>The blog entry has been added!</p>'; 
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

<form action="add_entry.php" method="post"> 
	<p>Entry Title: <input type="text" name="title" size="40" maxsize="100" /></p>
	<p>Entry Text: <textarea name="entry" cols="40" rows="5"></textarea></p> 
	<input type="submit" name="submit" value="Post This Entry!" /> 
	</form>
</body> 
</html>

