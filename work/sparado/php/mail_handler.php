<?php 
	if(isset($_POST['submit'])){
	    $message = "New Subscriber: " . $_POST['email'];
	    mail("inyoung@sooryen.com", "New Subscriber", $message);
	    echo "Your email has been recorded!";
    }
?>