<html>
<body>


<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">

Type usernames separated by a space.<br>
<br>
<textarea rows="10" cols="80" name="names" size="50"></textarea>
<br>
<input value="3" name="thumbNumber">

<br><br>

<input type="submit" value="Most Popular" name="submit_popular" >
<input type="submit" value="Newest" name="submit_new" ><br>
<input type="submit" value="Testing Button" name="backup_button" >
<?php


    
// If input is in form of URLs, proceed

if(isset($_POST['submit_popular'])) 
{ 
    $names = $_POST['names'];

    $output = exec("python feature.py $names");

    echo "<br><br><textarea rows=\"10\" cols=\"80\">";
    echo $output;
    echo "</textarea>";
    
}


if(isset($_POST['submit_new'])) 
{ 
    $names = $_POST['names'];

    $output = exec("python feature_copy.py $names");

    echo "<br><br><textarea rows=\"10\" cols=\"80\">";
    echo $output;
    echo "</textarea>";
   
}

if(isset($_POST['backup_button'])) 
{ 
    $names = $_POST['names'];
    $number_of_thumbs = $_POST['thumbNumber'];

    $output = exec("python featurebackup.py $names $number_of_thumbs");

    echo "<br><br><textarea rows=\"10\" cols=\"80\">";
    echo $output;
    echo "</textarea>";  
}

?>

<?php
 $url = $_POST['url'];
 ?>


</form>
</html>