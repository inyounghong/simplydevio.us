<?php

$conn = mysql_connect ('simplysilent.db.11370614.hostedresource.com', 'simplysilent',  'AlfredFJones#7') or die ("fail");

$rsl = @mysql_create_db($_REQUEST['db']);

$rs2 = @mysql_list_dbs($conn);
for($row = 0; $row < mysql_num_rows($rs2); $row++ ) {
	$list .= mysql_tablename($rs2, $row) . " | " ;

?>


