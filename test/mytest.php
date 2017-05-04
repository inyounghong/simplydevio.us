<html>
<body>


<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">

URL: <textarea rows="10" cols="80" name="url" size="50"></textarea>


<br><br>

<input type="submit" value="Get output" name="submit_button" >

<input type="submit" value="URLs first" name="submitNum" >
<input type="submit" value="Backwards" name="submitAuthor" >

<?php

// If input is in form of thumb numbers, make urls

if(isset($_POST['submitNum']))
{
    $url = $_POST['url'];
    $urlList = explode("\n", $url); // make individual numbers
        
    foreach($urlList as $urlthing)
    {
        $output .= "http://www.deviantart.com/art/a-{$urlthing}<br>"; 
    }
    
    echo "<br><br>" . $output;
}


    
    
// If input is in form of URLs, proceed

if(isset($_POST['submit_button'])) 
{ 
    $url = $_POST['url'];
    $urlList = explode("\n", $url);

    
    foreach($urlList as $urlthing)
    {
        $output .= exec("python h.py $urlthing");
    }
    echo "<br><br><textarea rows=\"10\" cols=\"80\">";
    echo $output;
    echo "</textarea>";
    
}


if(isset($_POST['submitAuthor'])) 
{ 
    $url = $_POST['url'];
    $urlList = explode(" :dev", $url);
    
    echo "<br><br><textarea rows=\"10\" cols=\"80\">";

    foreach($urlList as $urlthing)
    {
        print "\n\n" . $urlthing;
        $output .= exec("python a.py $urlthing");
    }

    echo "</textarea>";
    echo $output;
    
    
}
?>

<?php
 $url = $_POST['url'];
 ?>


</form>
</html>