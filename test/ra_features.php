<html>
<body>

<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">

    Type the number of the thumbs codes, each separated by a space.

    <br><br>

    <textarea rows="10" cols="80" name="thumbs" size="50"></textarea>

    <br><br>

    <input type="submit" value="Create Feature" name="ra_features" >

    <?php

    if(isset($_POST['ra_features'])) # For the monthly wrap up feature journals (Digitally delicious)
    { 
        $thumbs = $_POST['thumbs'];
        $output = exec("python ra_features.py $thumbs");
        echo $output; 
    }

    ?>

</form>
</html>