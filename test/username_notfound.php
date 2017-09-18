<html>
<body>


<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">

<b>Directions:</b>

<ol>
    <li>Add a watchers widget to your profile page.</li>
    <li>Click the button to see all of your watchers.</li>
    <li>Press CRTL + A to select all of the watchers on the list and then copy and paste this into the text box below.</li>
    <li>This thing is slow, so it may take a while to produce all of the icon codes.</li>
</ol>
<br>

<textarea rows="10" cols="80" name="members" size="50"></textarea>

<br><br>

<input type="submit" value="Get Icons" name="submit_members" >

<?php
    
// If input is in form of URLs, proceed

if(isset($_POST['submit_members'])) 
{ 
    $members = $_POST['members'];
    $memberList = explode("\n", $members);

    foreach($memberList as $icon)
    {
        $output .= exec("python username.py $icon");
    }
    echo "<br><br><textarea rows=\"10\" cols=\"80\">";
    echo $output;
    echo "</textarea>";
    
}

if(isset($_POST['submit_watchers'])) 
{ 
    $members = $_POST['members'];
    $memberList = explode("\n", $members);

    foreach($memberList as $icon)
    {
        $output .= exec("python username_watchers.py $icon");
    }
    #echo "<br><br><textarea rows=\"10\" cols=\"80\">";
    echo $output;

    
}

?>

<?php
 $url = $_POST['url'];
 ?>

<br><br>
Created by <a href="http://simplysilent.deviantart.com">SimplySilent</a>

</form>
</html>