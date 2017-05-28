<?php
header("Content-Type: application/json");
echo $_GET['callback'] . '({code: "' . $_GET["code"] . '"})';

?>
