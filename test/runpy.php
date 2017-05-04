<html>
<body>



<?php 

$url = $_POST['url'];
$output = array();
$output = exec("python h.py $url");

echo "<p>$output</p>";
?> 
</body>

</html>
