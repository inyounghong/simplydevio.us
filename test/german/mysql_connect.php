<!DOCTYPE html>
<head>
</head>
<body>

<?php

if ($dbc = mysql_connect ('simplysilent.db.11370614.hostedresource.com', 'simplysilent',  'AlfredFJones#7')) 
{ 
	print '<p>Successfully connected to MySQL!</p>'; 
	
	if (!@mysql_select_db('simplysilent', $dbc)) {
		print '<p style="color: red;">Could not select the database because:<br />' .  mysql_error($dbc) . '.</p>';
		mysql_close($dbc);
		$dbc = FALSE; 
	} 
} 
else 
{ 
	print '<p style="color: red;">Could not connect to MySQL.</p>'; 
} 

if($dbc){
	$query = 'CREATE TABLE german (
	entry_id INT UNSIGNED NOT NULL   AUTO_INCREMENT PRIMARY KEY, 
	German VARCHAR(100) NOT NULL, 
	English VARCHAR(100) NOT NULL,
	date_entered DATETIME NOT NULL 
	)'; 

	// Execute the query:
	if (@mysql_query($query, $dbc)) {
	print '<p>The table has been     created!</p>'; 
	} else {
	print '<p style="color: red;">    Could not create the table     because:<br />' .     mysql_error($dbc) . '.</p>    <p>The query being run was: ' .     $query . '</p>'; 
	} 

	mysql_close($dbc); // Close the    connection. 
}



?>
</body>
