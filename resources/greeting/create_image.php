<?php session_start(); ?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    
    <link rel="stylesheet" type="text/css" href="http://simplydevio.us/main.css" media="screen" />
    <link href='http://fonts.googleapis.com/css?family=Source+Sans+Pro:200,300,400,600,700,900' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:400italic,600italic,700italic,400,600,700' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Noticia+Text:400,400italic,700,700italic' rel='stylesheet' type='text/css'>
    
    <script src="../jquery.js"></script>
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.4.2/jquery.min.js"></script>
    <script type="text/javascript" src="http://www.simplydevio.us/jscolor/jscolor.js"></script>
    
    <script> 
        $(function(){
            $("#resnav").load("http://www.simplydevio.us/resources/resnav.html"); 
            $("#footer").load("http://www.simplydevio.us/footer.html");
            checkit();
        });
    </script> 
    
    <title>Profile Directory Creator</title>
    <link rel="icon" href="http://www.simplydevio.us/new128.png" sizes="128x128">
    
    
    <script>
      (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
      (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
      m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
      })(window,document,'script','//www.google-analytics.com/analytics.js','ga');
    
      ga('create', 'UA-45010841-2', 'simplydevio.us');
      ga('send', 'pageview');
    </script>

</head>

<body>



<div class="section w"><div class="tri tb"></div>

    <div class="content" id="resource">
    
        <table>
        
        <tr>
        
        <!-- Start main content -->
        <td id="left">
        
        <div class="title">Profile Directory Creator</div>
        <div class="map"><a href="http://www.simplydevio.us/resources/index.php">Resources</a> > Profile Creator</div>
        
        <div class="descript">
            <p>Create your own Profile Directories with this easy-to-use tool.
            To receive the codes that will allow you to install this directory onto your profile, please 
            <a href="http://fav.me/d73p9tr">purchase the password</a>.</p>
            
        </div>

<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">

DeviantART Username: <input type="text" name="username">
<br>

<input type="submit" value="Create Image" name="create_image">
<input type="submit" value="Delete" name="delete">

<?php
$username = $_POST['username'];
$filename = $username . ".php";

if(isset($_POST['create_image'])) 
{ 
	$file = fopen($filename, "w") or die("Unable to open file!");

	$_SESSION['username'] = $username;
	$string = "<?php session_start(); include \"info.php\"; ?>";

	fwrite($file, $string);

	echo "<br><a href=\"http://www.simplydevio.us/resources/greeting/" . $username . ".php\" target=\"_blank\">View Image</a>";

	fclose($file);
}

if(isset($_POST['delete']))
{
	unlink($filename);
	echo "deleted";
}

?>
</form>
</html>
</body>