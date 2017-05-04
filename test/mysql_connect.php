<?php
// Connects to and selects the database

$dbc = mysql_connect ('simplysilent.db.11370614.hostedresource.com', 'simplysilent',  'AlfredFJones#7');

mysql_select_db('simplysilent', $dbc);

/*
if($dbc){
	$query = 'CREATE TABLE entries (
	entry_id INT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY, 
	name VARCHAR(100) NOT NULL,
	street VARCHAR(100) NOT NULL,
	city VARCHAR(100) NOT NULL,
	zipcode VARCHAR(15) NOT NULL,
	email VARCHAR(100) NOT NULL,
	phone VARCHAR(15) NOT NULL,
	middleschool TINYINT(1) UNSIGNED NOT NULL, 
	freshmen TINYINT(1) UNSIGNED NOT NULL, 
	seniors TINYINT(1) UNSIGNED NOT NULL, 
	entry TEXT NOT NULL, 
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
*/

?>

