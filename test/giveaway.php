<html>
<body>


<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">

Type usernames separated by a space.<br>
<br>
<textarea rows="10" cols="80" name="names" size="50"></textarea>


<br><br>

<input type="submit" value="Favorite List" name="submit_favs" >
<br>
<?php


    

if(isset($_POST['submit_favs'])) 
{ 
    $members = $_POST['names'];
    $memberList = explode("\n", $members);

    foreach($memberList as $icon)
    {
        $output .= exec("python username_watchers.py $icon");
    }
    $second = exec("python giveaway.py $output");
    #echo "<br><br><textarea rows=\"10\" cols=\"80\">";
    echo $second;
    
}

?>

<?php
 $url = $_POST['url'];
 ?>


</form>
</html>