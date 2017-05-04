<!DOCTYPE HTML>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="description" content="Userscripts, userstyles, and other bits of script for DeviantART">
    <meta name="keywords" content="deviantart, simplysilent, profile, gallery, directory, css, journal">
    <meta name="author" content="SimplySilent">
    <link rel="stylesheet" type="text/css" href="../css/main.css" media="screen" />

    <link href='http://fonts.googleapis.com/css?family=Source+Sans+Pro:200,300,400,600,700,900' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:400italic,600italic,700italic,400,600,700' rel='stylesheet' type='text/css'>

    <script src="../js/jquery.js"></script>

    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.4.2/jquery.min.js"></script>
    <script type="text/javascript" src="http://www.simplydevio.us/jscolor/jscolor.js"></script>
   
    
    <title>Watcher Graph</title>
    <link rel="icon" href="../images/new128.png" sizes="128x128">

    <!-- PAGE SPECIFIC CSS -->
    <style>
	.date{
		width:2px;
		background:#e03e56;
		display:inline-block;
		position:relative;

	}

	.info{
		display:none;
		position:absolute;
		bottom:-40px;
		font-size:13px;
		width:100px;
		text-align:center;
	}
	.date:hover{background:#888;}
	.date:hover .info{display:block;}
	</style>
    
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

	<?php include '../includes/menu1.html' ?>

	<div class="section w"><div class="tri tb"></div>

	    <div class="content" id="resource">

	    	<div id="left">
	        
		        <div class="title">Watcher Graph Creator</div>
		        <div class="map"><a href="index.php">Scripts</a> > Watcher Graph Creator</div>
		        
		        <div class="description">
		            <p>Type a username below to view that deviant's watcher graph. Graph starts from the day the deviant received his/her first watch and displays new watchers gained per day (up to 10,000 watchers total).</p>
		        </div>

				<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
				<input type="text" name="name" size="50" placeholder="Username">
				<input type="submit" value="Submit" name="submit" >
				<br>

				<?php

					if(isset($_POST['submit'])) 
					{ 
					    $name = $_POST['name'];
					    $second = exec("python watcher_counting.py $name");
					    echo $second;
					}

				?>

				</form>
				<br><br><br>

			</div>
		</div>
		<?php include '../includes/footer.html' ?>

</body>
</html>